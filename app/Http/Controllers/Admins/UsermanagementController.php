<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Logins;
use App\Models\Transaction;
use App\Models\Crypto;
use App\Models\General_setting;
use App\Models\User_Messages;
use Session;
use App\Models\Logs;
use App\Models\NewsLetter;
use App\Models\Addresses;
use App\Models\Sponsor_bonus;

class UsermanagementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
  
    public function staffs()
    {
    	return view('admin.staffs');
    }

    public function allusers()
    {
        $users = User::paginate(15);
        $search = '';
    	return view('admin.allusers',['duser'=>$users,'search'=>$search]);
    }

 

    public function userdetails($id)
    {

        $duser = User::where('id', $id)->first();
        $dlogin = Logins::where('usid', $id)->orderBy('id', 'desc')->first();
        $clogin = Logins::where('usid', $id)->count();
        $ctrx = Transaction::where('who', $id)->count();
        $cdeposit = Crypto::where('who', $id)->where('type','deposit')->count();
        $creferral = User::where('ref_by', $duser->ref_id)->count();
        $cwithdrawal = Crypto::where('who', $id)->where('type', 'withdraw')->count();
        return view('admin.userdetails', ['duser' => $duser, 'dlogin' => $dlogin, 'clogin' => $clogin, 'ctrx' => $ctrx, 'cdeposit' => $cdeposit, 'creferral' => $creferral, 'cwithdrawal' => $cwithdrawal]);
    }

    public function usernormalupdate(Request $request)
    {
        if($request){
            // var_dump($request['block']);exit;
            $user = User::where('id', $request['id'])->first();
            $user->uname = $request['username'];
            $user->lname = $request['legalname'];
            $user->mobile = $request['mobile'];
            // $user->kyc_verified = ($request['kyc_verified'] == 'on') ? 1: 0;
            $user->dob = $request['dob'];
            $user->gender = $request['gender'];
            $user->location = $request['location'];
            $user->block = ($request['block'] == 'on') ? 0: 1;
            $user->ev = ($request['ev'] == 'on') ? 1: 0;
            $user->mv = ($request['mv'] == 'on') ? 1: 0;
            $user->email = $request['email'];
            if(User::where('ref_id', $request['ref_by'])->first()){
                $user->ref_by = User::where('ref_id', $request['ref_by'])->first()->ref_id;
            }
            else{
                if(User::where('email', $request['ref_by'])->first())
                    $user->ref_by = User::where('email', $request['ref_by'])->first()->ref_id;
            }

            if($user->save()){
                $logs = new Logs;
                $logs->log = 'Admin Updated user '.$user->email;
                $logs->date = now();
                $logs->save();
                $msg=['Updated Successfully!','','success'];
            }else{
               $msg=['Some Problem Occurs!','Please Try Again...','error']; 
            }

            return redirect('/Admins/UserDetails/'.$request['id'])->with( ['msg' => $msg] );
        }
    }

    public function usertransaction($id)
    {
        $dtransaction = Transaction::orderBy('tm','DESC')->where('who', $id)->paginate(15);
        $duser = User::where('id', $id)->first();
        return view('admin.usertransaction' , ['duser' => $duser, 'dtransaction' => $dtransaction]);
    }

    public function userdeposit($id)
    {
        $ddeposit = Crypto::orderBy('tm','DESC')->where('who', $id)->where('details','Deposit')->paginate(15);
        $duser = User::where('id', $id)->first();
        return view('admin.userdeposit' , ['duser' => $duser, 'ddeposit' => $ddeposit]);
    }

    public function referrals($id)
    {
        $atokenfrom = [];
        $duser = User::where('id', $id)->first();
        $dreferal = User::where('ref_by', $duser->ref_id)->paginate(15);
        $dreferals = User::where('ref_by', $duser->ref_id)->get();
        
        for($i = 0 ; $i < count($dreferals) ; $i++)
        {
            $atokenfrom[$dreferal[$i]['id']] = Transaction::where('fromWhom', $dreferal[$i]['id'])->where('sig','+')->sum('amount') - Transaction::where('fromWhom', $dreferal[$i]['id'])->where('sig','-')->sum('amount');
        }
        
        return view('admin.userreferral' , ['duser' => $duser, 'dreferal' => $dreferal, 'atokenfrom' => $atokenfrom]);
    }

    public function userwithdraw($id)
    {
        $dwithdraw = Crypto::orderBy('tm','DESC')->where('who', $id)->where('type','withdraw')->paginate(15);
        $duser = User::where('id', $id)->first();
        return view('admin.userwithdrawlog' , ['duser' => $duser, 'dwithdraw' => $dwithdraw]);
    }

    public function userlogins($id)
    {
        $duser = User::where('id', $id)->first();
        $dlogins = Logins::where('usid', $duser->id)->paginate(15);
        return view('admin.userlogins', ['duser' => $duser, 'dlogins' => $dlogins]);
    }

    public function balanceuser($id)
    {
        // echo Session::get('msg');exit;
        $duser = User::where('id', $id)->first();
        return view('admin.balanceuser', ['duser' => $duser]);
    }

    public function adduserbalance(Request $request)
    {
        if($request){
            $amount = $request['amount'];
            if($amount < 0){
                $msg = ['WRONG AMOUNT!','AMOUNT MUST BE A POSITIVE NUMBER','error'];
                return redirect('/Admins/BalanceUser/'.$request['id'])->with( ['msg' => $msg] );    
            }else{
                $user = User::where('id', $request['id'])->first();
                $addr = Addresses::where('useremail', $user->email)->first();
                // print_r($request);exit;
                if($request['operation'] == "on"){
                    if(isset($request['cgc'])){
                        $user->acgc = $user->acgc + $amount; 
                        $trx = new Transaction;
                        $trx->who = $request['id'];
                        $trx->byy = 0 ;
                        $trx->amount = $amount;
                        $trx->sig = '+' ;
                        $trx->typ = 'Add By Admin' ;
                        $trx->tm = now();
                        $trx->trxid = $this->generateRandomString();
                        $trx->msg = $request['message'];
                        $trx->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Added user '.$user->email .' Token Amount '.$amount;
                        $logs->date = now();
                        $logs->save();

                        // $this->affilate($request['id'], $amount);
                        $msg = ['Updated Successfully!','Successfully Added '.$amount.' Of CGC','success'];
                    }elseif(isset($request['btc'])){
                        $user->btc = $user->btc + $amount;

                        $crypto_log = new Crypto;
                        $crypto_log->who = $user->id;
                        $crypto_log->address = $addr?$addr->btc:null;
                        $crypto_log->coin = 'BTC';
                        $crypto_log->amount = $amount;
                        $crypto_log->hash = $this->generateRandomString();
                        $crypto_log->tm = now();
                        $crypto_log->sig = '+';
                        $crypto_log->details = 'Admin have added BTC';
                        $crypto_log->type = 'admin';
                        $crypto_log->user = $user->email;
                        $crypto_log->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Added user '.$user->email .' BTC Amount '.$amount;
                        $logs->date = now();
                        $logs->save();

                        $msg = ['Updated Successfully!','Successfully Added '.$amount.' Of BTC','success'];
                    }elseif(isset($request['eth'])){
                        $user->eth = $user->eth + $amount;

                        $crypto_log = new Crypto;
                        $crypto_log->who = $user->id;
                        $crypto_log->address = $addr?$addr->eth:null;
                        $crypto_log->coin = 'ETH';
                        $crypto_log->amount = $amount;
                        $crypto_log->hash = $this->generateRandomString();
                        $crypto_log->tm = now();
                        $crypto_log->sig = '+';
                        $crypto_log->details = 'Admin have added ETH';
                        $crypto_log->type = 'admin';
                        $crypto_log->user = $user->email;
                        $crypto_log->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Added user '.$user->email .' ETH Amount '.$amount;
                        $logs->date = now();
                        $logs->save();

                        $msg = ['Updated Successfully!','Successfully Added '.$amount.' Of ETH','success'];
                    }    

                } else {
                    if(isset($request['cgc'])){
                        

                        $trx = new Transaction;
                        $trx->who = $request['id'];
                        $trx->byy = 1 ;
                        if($user->acgc - $amount < 0)
                            $trx->amount = $user->acgc;
                        else 
                            $trx->amount = $amount;
                        $trx->sig = '-' ;
                        $trx->typ = 'Substructed By Admin' ;
                        $trx->tm = now();
                        $trx->trxid = $this->generateRandomString();
                        $trx->msg = $request['message'];
                        $trx->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Substructed user '.$user->email .' Token Amount '.$amount;
                        $logs->date = now();
                        $logs->save();

                        $user->acgc = $user->acgc - $amount;
                        if($user->acgc < 0)
                            $user->acgc = 0;

                        // $this->affilate($request['id'], 0 - $amount);
                        $msg = ['Updated Successfully!','Successfully Substructed '.$amount.' Of CGC','success'];
                    }elseif(isset($request['btc'])){
                        

                        $crypto_log = new Crypto;
                        $crypto_log->who = $user->id;
                        $crypto_log->address = $addr?$addr->btc:null;
                        $crypto_log->coin = 'BTC';
                        if($user->btc - $amount < 0 )
                            $crypto_log->amount = $user->btc;
                        else
                            $crypto_log->amount = $amount;
                        $crypto_log->hash = $this->generateRandomString();
                        $crypto_log->tm = now();
                        $crypto_log->sig = '-';
                        $crypto_log->details = 'Admin have Substructed BTC';
                        $crypto_log->type = 'admin';
                        $crypto_log->user = $user->email;
                        $crypto_log->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Substructed user '.$user->email .' BTC Amount '.$amount;
                        $logs->date = now();
                        $logs->save();

                        $user->btc = $user->btc - $amount;

                        if($user->btc < 0)
                            $user->btc = 0;

                        $msg = ['Updated Successfully!','Successfully Substructed '.$amount.' Of BTC','success'];
                    }elseif(isset($request['eth'])){
                        

                        $crypto_log = new Crypto;
                        $crypto_log->who = $user->id;
                        $crypto_log->address = $addr?$addr->eth:null;
                        $crypto_log->coin = 'ETH';
                        if($user->eth - $amount < 0 )
                            $crypto_log->amount = $user->eth;
                        else
                            $crypto_log->amount = $amount;
                        $crypto_log->hash = $this->generateRandomString();
                        $crypto_log->tm = now();
                        $crypto_log->sig = '-';
                        $crypto_log->details = 'Admin have Substructed ETH';
                        $crypto_log->type = 'admin';
                        $crypto_log->user = $user->email;
                        $crypto_log->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Substructed user '.$user->email .' ETH Amount '.$amount;
                        $logs->date = now();
                        $logs->save();

                        $user->eth = $user->eth - $amount;

                        if($user->eth < 0)
                            $user->eth = 0;

                        $msg = ['Updated Successfully!','Successfully Substructed '.$amount.' Of ETH','success'];
                    }
                }

                if($user->save()){
                    return redirect('/Admins/BalanceUser/'.$request['id'])->with( ['msg' => $msg] );     
                }else {
                    $msg = ['Some Problem Occurs!','Please Try Again...','error'];
                    return redirect('/Admins/BalanceUser/'.$request['id'])->with( ['msg' => $msg] );     
                }
            }
            
              
        }

    }

    public function add_by_admin_coin($id, $coin, $amount)
    {   //This function is about cypto table add record function for ETH and BTC
        // $crypto = new Crypto;
        // $crypto->who = $id;
        // $crypto->address = 
    }

    public function affilate($id, $amount)
    {
        $user = User::where('id', $id)->first();
        $user_ref_id = $user->ref_by;
        $user_lev_1 = User::where('ref_id', $user_ref_id)->first();
        if($user_lev_1){
            $user_lev_1->acgc = $user_lev_1->acgc + $amount*0.1;
            $user_lev_1->save();

            $trx = new Transaction;
            $trx->who = $user_lev_1->id;
            $trx->byy = 3 ;
            $trx->amount = $amount*0.1;
            $trx->sig = '+' ;
            $trx->typ = 'Add By Affilate : Level 1' ;
            $trx->tm = now();
            $trx->trxid = $this->generateRandomString();
            $trx->fromWhom = $id;
            $trx->save();

            $logs = new Logs;
            $logs->log = 'Added user '.$user_lev_1->email .' Token Amount '.$amount*0.1.'Add By Affilate : Level 1';
            $logs->date = now();
            $logs->save();

            $user_lev_2 = User::where('ref_id', $user_lev_1->ref_by)->first();
            if($user_lev_2){
                $user_lev_2->acgc = $user_lev_2->acgc + $amount*0.06;
                $user_lev_2->save();

                $trx = new Transaction;
                $trx->who = $user_lev_2->id;
                $trx->byy = 3 ;
                $trx->amount = $amount*0.06;
                $trx->sig = '+' ;
                $trx->typ = 'Add By Affilate : Level 2' ;
                $trx->tm = now();
                $trx->trxid = $this->generateRandomString();
                $trx->fromWhom = $id;
                $trx->save();

                $logs = new Logs;
                $logs->log = 'Added user '.$user_lev_2->email .' Token Amount '.$amount*0.06.'Add By Affilate : Level 2';
                $logs->date = now();
                $logs->save();

                $user_lev_3 = User::where('ref_id', $user_lev_2->ref_by)->first();
                if($user_lev_3){
                    $user_lev_3->acgc = $user_lev_3->acgc + $amount*0.04;
                    $user_lev_3->save();

                    $trx = new Transaction;
                    $trx->who = $user_lev_3->id;
                    $trx->byy = 3 ;
                    $trx->amount = $amount*0.04;
                    $trx->sig = '+' ;
                    $trx->typ = 'Add By Affilate : Level 3' ;
                    $trx->tm = now();
                    $trx->trxid = $this->generateRandomString();
                    $trx->fromWhom = $id;
                    $trx->save();

                    $logs = new Logs;
                    $logs->log = 'Added user '.$user_lev_3->email .' Token Amount '.$amount*0.04.'Add By Affilate : Level 3';
                    $logs->date = now();
                    $logs->save();
                }
                
            }
        
        }
        
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
                
    public function smstouser($id)
    {
        $duser = User::where('id', $id)->first();
        return view('admin.smstouser',['duser' => $duser]);
    }

    public function sendsmstouser(Request $request)
    {
        if($request){
            $user = User::where('id', $request['id'])->first();
            $to = $user->mobile;
            $content = $request['smscontent'];
            if(empty($content)){
                $msg = ['You have not input the message!', "Please Check..", "error"];
            }else{
                $this->sendsms($to,$content);

                $logs = new Logs;
                $logs->log = 'Sent sms to '.$to;
                $logs->date = now();
                $logs->save();

                $msg = ['SMS sent successfully !', "", "success"];
            }
            return redirect('/Admins/SMStoUser/'.$request['id'])->with( ['msg' => $msg] );  
        }
    }

    public function sendsms($to,$txt){
        $setting =General_setting::first();

        $sendtext = urlencode("$txt");
        $appi=$setting->smsapi;
        $to = str_replace('+', '', $to);
        $appi = str_replace("{{number}}",$to,$appi);
        $appi = str_replace("{{message}}",$sendtext,$appi); 
        $result = file_get_contents($appi);
    
    }

    public function emailtouser($id)
    {
        $duser = User::where('id', $id)->first();
        return view('admin.emailtouser',['duser' => $duser]);
    }

    public function sendemailtouser(Request $request)
    {
        if($request){
            $user = User::where('id', $request['id'])->first();
            $to = $user->email;
            $title = $request['title'];
            $content = $request['emailcontent'];
            if(empty($content) || empty($title)){
                $msg = ['You have not input the message!', "Please Check..", "error"];
            }else{
                if($this->sendemail($to,$title,$content,$user->uname)){
                    $logs = new Logs;
                    $logs->log = 'Sent Email to '.$to;
                    $logs->date = now();
                    $logs->save();
                    $msg = ['E-mail sent successfully !', "", "success"];
                }else{
                    $msg = ['There was a problem sending the email.', "", "error"];
                }
                
            }
            return redirect('/Admins/EMAILtoUser/'.$request['id'])->with( ['msg' => $msg] );  
        }
    }

    public function sendemail($to, $title, $content,$uname)
    {
        $setting = General_setting::first();
        $headers = "From: $setting->sitetitle $setting->notimail \r\n";
        $headers .= "Reply-To: $setting->sitetitle <$setting->notimail> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $mm = str_replace("{{name}}",$uname,$setting->emailtemp);     
        $message = str_replace("{{message}}",$content,$mm); 

        if (mail($to, $title, $message, $headers)) {
            return true;
        } else {
            return false;
        }

    }

    public function sendmessage()
    {
        $search='';
        $duser = User::paginate(15);
    	return view('admin.sendmessage',['duser' => $duser,'search'=>$search]);
    }

    public function sendmsg(Request $request)
    {
        $msg = [];
        if($request){
            if(isset($request['sendOne'])){
                $usid = $request['sendOne'];
                $title = $request['title'];
                $content = $request['content'];
                $umsg = new User_Messages;
                $umsg->user_id = $usid;
                $umsg->title = $title;
                $umsg->content = $content;
                $umsg->date = now();
                $umsg->state = 0 ;
                if($umsg->save()){

                    $logs = new Logs;
                    $logs->log = 'Sent Message to '.$usid;
                    $logs->date = now();
                    $logs->save();

                    $msg = ['Message sent successfully !', "", "success"];
                }else{
                    $msg = ['There was a problem sending the message.', "", "error"];
                }

            } 
            if(isset($request['sendAll'])){
                
                $title = $request['titleA'];
                $content = $request['contentA'];
                $users = User::all();
                foreach($users as $user){
                    $umsg = new User_Messages;
                    $umsg->user_id = $user->id;
                    $umsg->title = $title;
                    $umsg->content = $content;
                    $umsg->date = now();
                    $umsg->state = 0 ;
                    if($umsg->save()){

                        $msg = ['Message sent successfully !', "", "success"];
                    }else{
                        $msg = ['There was a problem sending the message.', "", "error"];
                    }
                }
                $logs = new Logs;
                $logs->log = 'Sent Message to All Users';
                $logs->date = now();
                $logs->save();
            }
            return redirect('/Admins/SendMessage')->with(['msg' => $msg]);
        }
    }

    

    public function bannedusers()
    {
        $search = '';
        $duser = User::where('block', 1)->paginate(15);
        return view('admin.bannedusers',['duser' => $duser, 'search' => $search]);
    }

    public function delBannedUser(Request $request)
    {
        if($request){
            if(isset($request['deleId'])){
                $user = User::where('id', $request['deleId'])->first();

                $logs = new Logs;
                $logs->log = 'User Deleted '.$user;
                $logs->date = now();
                $logs->save();
                
                if($user->delete()){

                    $msg = ['User removed successfully !', "", "success"];
                }else{
                    $msg = ['There was a problem removing the user.', "", "error"];
                }
            }else if(isset($request['deleAll'])){
                $users = User::where('block', 1)->get();
                foreach($users as $user){
                    if($user->delete()){

                        $logs = new Logs;
                        $logs->log = 'User Deleted '.$user;
                        $logs->date = now();
                        $logs->save();

                        $msg = ['User removed successfully !', "", "success"];
                    }else{
                        $msg = ['There was a problem removing the user.', "", "error"];
                    }
                }
            }
            return redirect('/Admins/BannedUsers')->with(['msg' => $msg]);
        }
    }

    public function verifiedusers()
    {   
        $search = '';
        $duser = User::where('mv', 1)->where('ev', 1)->paginate(15);
        return view('admin.verifiedusers',['duser' => $duser,'search' => $search ]);
    }

    public function pendingusers()
    {
        $search = '';
        $duser = User::where('mv', 0)->orWhere('ev', 0)->paginate(15);
        return view('admin.pendingusers',['duser' => $duser,'search' => $search ]);
    }

    public function emailunverifiedusers()
    {
        $search = '';
        $duser = User::where('ev', 0)->paginate(15);
        return view('admin.emailunverifiedusers',['duser' => $duser,'search' => $search ]);
    }

    public function mobileunverifiedusers()
    {
        $search = '';
        $duser = User::where('mv', 0)->paginate(15);
        return view('admin.mobileunverifiedusers',['duser' => $duser,'search' => $search ]);
    }

    // public function kycunverifiedusers()
    // {
    //     $search = '';
    //     $duser = User::where('kyc_verified', 0)->paginate(15);
    //     return view('admin.kycunverifiedusers',['duser' => $duser,'search' => $search ]);
    // }

    public function search(Request $request)
    {
         if($request) {
            $users=[];
            if(isset($request['username'])){

                $type = $request['sType'];
                $search = 'Username';
                if($type == 'all'){
                    $users = User::where('uname','LIKE',$request['username'])->paginate(15);
                    return view('admin.allusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'msg'){
                    $users = User::where('uname','LIKE',$request['username'])->paginate(15);
                    return view('admin.sendmessage',['duser' => $users,'search' => $search]);
                }elseif($type == 'ban'){
                    $users = User::where('block' ,1)->where('uname','LIKE',$request['username'])->paginate(15);
                    return view('admin.bannedusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'verified'){
                    $users = User::where('ev', 1)->where('mv', 1)->where('uname','LIKE',$request['username'])->paginate(15);
                    return view('admin.verifiedusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'pending'){
                    $users = User::where('ev', 0)->orWhere('mv', 0)->where('uname','LIKE',$request['username'])->paginate(15);
                    return view('admin.pendingusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'eunverified'){
                    $users = User::where('ev', 0)->where('uname','LIKE',$request['username'])->paginate(15);
                    return view('admin.emailunverifiedusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'munverified'){
                    $users = User::where('mv', 0)->where('uname','LIKE',$request['username'])->paginate(15);
                    return view('admin.mobileunverifiedusers',['duser' => $users,'search' => $search]);
                }
                // elseif($type == 'kunverified') {
                //     $users = User::where('kyc_verified', 0)->where('fname','LIKE',$request['username'])->orWhere('lname','LIKE',$request['username'])->paginate(15);
                //     return view('admin.kycunverifiedusers',['duser' => $users,'search' => $search]);
                // }
                
                
            }else if(isset($request['mail'])){

                $type = $request['sType'];
                $search = 'Email';
                if($type == 'all'  ){
                    $users = User::where('email', $request['mail'])->paginate(15);
                    return view('admin.allusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'msg'){
                    $users = User::where('email', $request['mail'])->paginate(15);
                    return view('admin.sendmessage',['duser' => $users,'search' => $search]);
                }elseif($type == 'ban'){
                    $users = User::where('block' ,1)->where('email', $request['mail'])->paginate(15);
                    return view('admin.bannedusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'verified'){
                    $users = User::where('ev', 1)->where('mv', 1)->where('email', $request['mail'])->paginate(15);
                    return view('admin.verifiedusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'pending'){
                    $users = User::where('ev', 0)->orWhere('mv', 0)->where('email', $request['mail'])->paginate(15);
                    return view('admin.pendingusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'eunverified'){
                    $users = User::where('ev', 0)->where('email', $request['mail'])->paginate(15);
                    return view('admin.emailunverifiedusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'munverified'){
                    $users = User::where('mv', 0)->where('email', $request['mail'])->paginate(15);
                    return view('admin.mobileunverifiedusers',['duser' => $users,'search' => $search]);
                }
                // elseif($type == 'kunverified') {
                //     $users = User::where('kyc_verified', 0)->where('email', $request['mail'])->paginate(15);
                //     return view('admin.kycunverifiedusers',['duser' => $users,'search' => $search]);
                // }

                
            }else if(isset($request['mobile'])){

                $type = $request['sType'];
                $search = 'Mobile';
                if($type == 'all' ){
                    $users = User::where('mobile', $request['mobile'])->paginate(15);
                    return view('admin.allusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'msg'){
                    $users = User::where('mobile', $request['mobile'])->paginate(15);
                    return view('admin.sendmessage',['duser' => $users,'search' => $search]);
                }elseif($type == 'ban'){
                    $users = User::where('block' ,1)->where('mobile', $request['mobile'])->paginate(15);
                    return view('admin.bannedusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'verified'){
                    $users = User::where('ev', 1)->where('mv', 1)->where('mobile', $request['mobile'])->paginate(15);
                    return view('admin.verifiedusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'pending'){
                    $users = User::where('ev', 0)->orWhere('mv', 0)->where('mobile', $request['mobile'])->paginate(15);
                    return view('admin.pendingusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'eunverified'){
                    $users = User::where('ev', 0)->where('mobile', $request['mobile'])->paginate(15);
                    return view('admin.emailunverifiedusers',['duser' => $users,'search' => $search]);
                }elseif($type == 'munverified'){
                    $users = User::where('mv', 0)->where('mobile', $request['mobile'])->paginate(15);
                    return view('admin.mobileunverifiedusers',['duser' => $users,'search' => $search]);
                }
                // elseif($type == 'kunverified') {
                //     $users = User::where('kyc_verified', 0)->where('mobile', $request['mobile'])->paginate(15);
                //     return view('admin.kycunverifiedusers',['duser' => $users,'search' => $search]);
                // }   

            }
  
        }
    }

    public function newsletter()
    {
        $newsletter = NewsLetter::paginate(15);
        $dgeneral_setting = General_setting::find(1);
        return view('admin.newsletter',['dnewsletter'=>$newsletter,'dgeneral_setting' => $dgeneral_setting]);
    }

    public function tosubscriber(Request $request)
    {

        if($request){
            $email_temp = $request->btext;
            $title = $request->title;
            $from = $request->notimail;
            $subs = json_decode($request['subscribers'], true);
            if(is_array($subs) || is_object($subs))
            {
                foreach($subs as $sub){
                    $to = NewsLetter::find($sub)->email;

                    $headers = "From: CoinGrinch $from \r\n";
                    $headers .= "Reply-To: CoinGrinch <$from> \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                    if(mail($to, $title, $email_temp, $headers)){
                        $msg = ['E-mail sent successfully !', "", "success"];
                    }else{
                        $msg = ['There was a problem sending the email.', "", "error"];
                    }
                }
            }else
                $msg = ['There was a problem sending the email.', "", "error"];


            return redirect('/Admins/NewsLetter')->with( ['msg' => $msg]);  

        }
    }

    public function affiliatebonus($id)
    {
        $duser = User::where('id', $id)->first();
        return view('admin.affiliatebalanceuser', ['duser' => $duser]);
    }

    public function adduseraffiliatebalance(Request $request)
    {
        
        if($request){
            $sponsor_bonus = Sponsor_bonus::where('user_id',$request['id'])->first();
            $amount = $request['amount'];
            if($amount < 0){
                $msg = ['WRONG AMOUNT!','AMOUNT MUST BE A POSITIVE NUMBER','error'];
                return redirect('/Admins/AffiliateBalanceUser/'.$request['id'])->with( ['msg' => $msg] );    
            }else{
                $user = User::where('id', $request['id'])->first();
                $addr = Addresses::where('useremail', $user->email)->first();
                // print_r($request);exit;
                if($request['operation'] == "on"){
                    if(isset($request['btc'])){
                        $sponsor_bonus->btc_bonus = $sponsor_bonus->btc_bonus + $amount;

                        $crypto_log = new Crypto;
                        $crypto_log->who = $user->id;
                        $crypto_log->address = $addr?$addr->btc:null;
                        $crypto_log->coin = 'BTC';
                        $crypto_log->amount = $amount;
                        $crypto_log->hash = $this->generateRandomString();
                        $crypto_log->tm = now();
                        $crypto_log->sig = '+';
                        $crypto_log->details = 'Admin have added BTC By Affiliate Bonus';
                        $crypto_log->type = 'bonus';
                        $crypto_log->user = $user->email;
                        $crypto_log->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Added user '.$user->email .' Affiliate Bonus BTC Amount '.$amount;
                        $logs->date = now();
                        $logs->save();
                        // $this->add_by_admin_coin($request['id'], 'BTC', $amount);
                        $msg = ['Updated Successfully!','Successfully Added '.$amount.' Of Affiliate Bonus BTC','success'];
                    }elseif(isset($request['eth'])){
                        $sponsor_bonus->eth_bonus = $sponsor_bonus->eth_bonus + $amount;

                        $crypto_log = new Crypto;
                        $crypto_log->who = $user->id;
                        $crypto_log->address = $addr?$addr->eth:null;
                        $crypto_log->coin = 'ETH';
                        $crypto_log->amount = $amount;
                        $crypto_log->hash = $this->generateRandomString();
                        $crypto_log->tm = now();
                        $crypto_log->sig = '+';
                        $crypto_log->details = 'Admin have added ETH By Affiliate Bonus';
                        $crypto_log->type = 'bonus';
                        $crypto_log->user = $user->email;
                        $crypto_log->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Added user '.$user->email .' Affiliate Bonus ETH Amount '.$amount;
                        $logs->date = now();
                        $logs->save();

                        $msg = ['Updated Successfully!','Successfully Added '.$amount.' Of Affiliate Bonus ETH','success'];
                    }    

                } else {
                    if(isset($request['btc'])){
                        
                        $crypto_log = new Crypto;
                        $crypto_log->who = $user->id;
                        $crypto_log->address = $addr?$addr->btc:null;
                        $crypto_log->coin = 'BTC';
                        if($sponsor_bonus->btc_bonus - $amount < 0)
                            $crypto_log->amount = $sponsor_bonus->btc_bonus;
                        else 
                            $crypto_log->amount = $amount;
                        $crypto_log->hash = $this->generateRandomString();
                        $crypto_log->tm = now();
                        $crypto_log->sig = '-';
                        $crypto_log->details = 'Admin have Substructed BTC By Affiliate Bonus ';
                        $crypto_log->type = 'bonus';
                        $crypto_log->user = $user->email;
                        $crypto_log->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Substructed user '.$user->email .' Affiliate Bonus BTC Amount '.$amount;
                        $logs->date = now();
                        $logs->save();

                        $sponsor_bonus->btc_bonus = $sponsor_bonus->btc_bonus - $amount;

                        if($sponsor_bonus->btc_bonus < 0)
                            $sponsor_bonus->btc_bonus = 0;

                        $msg = ['Updated Successfully!','Successfully Substructed '.$amount.' Of Affiliate Bonus BTC','success'];
                    }elseif(isset($request['eth'])){
                        

                        $crypto_log = new Crypto;
                        $crypto_log->who = $user->id;
                        $crypto_log->address = $addr?$addr->eth:null;
                        $crypto_log->coin = 'ETH';

                        if($sponsor_bonus->eth_bonus - $amount < 0)
                            $crypto_log->amount = $sponsor_bonus->eth_bonus;
                        else 
                            $crypto_log->amount = $amount;
                        $crypto_log->hash = $this->generateRandomString();
                        $crypto_log->tm = now();
                        $crypto_log->sig = '-';
                        $crypto_log->details = 'Admin have Substructed ETH By Affiliate Bonus';
                        $crypto_log->type = 'bonus';
                        $crypto_log->user = $user->email;
                        $crypto_log->save();

                        $logs = new Logs;
                        $logs->log = 'Admin Substructed user '.$user->email .' Affiliate Bonus ETH Amount '.$amount;
                        $logs->date = now();
                        $logs->save();

                        $sponsor_bonus->eth_bonus = $sponsor_bonus->eth_bonus - $amount;

                        if($sponsor_bonus->eth_bonus < 0)
                            $sponsor_bonus->eth_bonus = 0;

                        $msg = ['Updated Successfully!','Successfully Substructed '.$amount.' Of Affiliate Bonus ETH','success'];
                    }
                }

                if($sponsor_bonus->save()){
                    return redirect('/Admins/AffiliateBalanceUser/'.$request['id'])->with( ['msg' => $msg] );     
                }else {
                    $msg = ['Some Problem Occurs!','Please Try Again...','error'];
                    return redirect('/Admins/AffiliateBalanceUser/'.$request['id'])->with( ['msg' => $msg] );     
                }
            }
            
              
        }
    }
}
