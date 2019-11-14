<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Crypto;
use App\Models\Kyc;
use App\Models\User_Messages;

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function coinfund()
    {
    	return view('admin.coinfund');
    }

    public function coinwithdraw()
    {
        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = Client::create($configuration);
        $rates = $client->getExchangeRates();
        $btcx = $client->getSpotPrice('BTC-USD');
        $btc = $client->decodeLastResponse();
        $ethx = $client->getSpotPrice('ETH-USD');
        $eth = $client->decodeLastResponse();
        return view('admin.userwithdraw',['btc'=>$btc['data']['amount'],'eth'=>$eth['data']['amount']]);
    }

    // public function kyc()
    // {
    //     $dkyc = Kyc::all();
    //     $duser = User::all();
    //     $breview = "normal";
    // 	return view('admin.kyc',['dkyc' => $dkyc, 'duser' => $duser,'breview' => $breview]);
    // }

    // public function kycmanage(Request $request)
    // {
    //     if($request){
    //         if($request['verf']){
    //             $kyc = Kyc::where('id' , $request['id_kyc'])->first();
    //             $user = User::where('email',$kyc->username)->first();
    //             $kyc->status = "accepted";

    //             $user->kyc_verified = 1;

    //             if($kyc->save() && $user->save()){
    //                 $msg=['Updated Successfully!','','success'];
    //             }else{
    //                $msg=['Some Problem Occurs!','Please Try Again...','error']; 
    //             }

    //             return redirect('/Admins/KYC/'.$request['id_kyc'])->with( ['msg' => $msg] );
    //         }else if($request['declined']){
    //             $kyc = Kyc::where('id' , $request['id_kyc'])->first();
    //             $user = User::where('email',$kyc->username)->first();

    //             $kyc->status = "declined";
    //             $user->kyc_verified = 0;

    //             $message_txt = "Dear ".$user['fname']." ".$user['lname']."!";
    //             $message_txt = $message_txt . "Thanks for uploading your documents. We have to inform you that your KYC Verification " ; 
                
    //             if(!isset($_POST['pPass'])){
                    
    //                 if ((file_exists("../account/".$kyc['front_orig'])) AND ($kyc['front_orig'] !== NULL)) {
    //                     unlink("../account/".$kyc['front_orig']); //delete
    //                 }
                    
    //                 if ((file_exists("../account/".$kyc['back_orig'])) AND ($kyc['back_orig'] !== NULL)) {
    //                     unlink("../account/".$kyc['back_orig']); //delete
    //                 }

    //                 $kyc->front_orig = NULL;
    //                 $kyc->back_orig = NULL;
                    
    //                 $message_txt = $message_txt . " Passport";
    //             }
                
    //             if(!isset($_POST['pUtility'])){
                    
    //                 if ((file_exists("../account/".$kyc['bill_orig'])) AND ($kyc['bill_orig'] !== NULL)) {
    //                     unlink("../account/".$kyc['bill_orig']); //delete
    //                 }

    //                 $kyc->bill_orig = NULL;
                    
    //                 $message_txt = $message_txt . " Utility";
    //             }
                
    //             if(!isset($_POST['pSelfie'])){
                    
    //                 if ((file_exists("../account/".$kyc['selfie_orig'])) AND ($kyc['selfie_orig'] !== NULL)) {
    //                     unlink("../account/".$kyc['selfie_orig']); //delete
    //                 }                    

    //                 $kyc->selfie_orig = NULL;
                    
    //                 $message_txt = $message_txt . " Selfie Photo";
    //             }
                
    //             $message_txt = $message_txt . " cannot be acceptable. Please follow the instructions correctly, and kindly upload again. Thanks.";
                
    //             $title = "About your KYC Verification";
                
    //             // abiremail($rowfuk['username'], $title, $rowuser['firstname']." ".$rowuser['lastname'], $message_txt);  

    //             $user_message = new User_Messages;
    //             $user_message->user_id = $user['id'];
    //             $user_message->title = $title;
    //             $user_message->content = $message_txt;
    //             $user_message->date = now();
    //             $user_message->state = 0;
    //             $user_message->save();

    //             if($user->save() && $kyc->save()){
    //                 $msg=['Decline/Send Message Successfully!','','success'];
    //                 $message_txt="";
    //             }else{
    //                 $msg=['Some Problem Occurs!','Please Try Again...','error'];
    //             }
                
    //             return redirect('/Admins/KYC/'.$request['id_kyc'])->with( ['msg' => $msg] );
    //         }    
    //     }
    // }

    // public function kycreview($id)
    // {
    //     $dkyc = Kyc::where('id',$id)->first();
    //     $breview = "review";
    //     $duser = User::all();
    //     return view('admin.kyc',['dkyc' => $dkyc, 'duser' => $duser,'breview' => $breview]);
    // }

    public function tokenlogs()
    {
    	return view('admin.tokenlogs');
    }

    public function admingeneratedfund()
    {
        $dadmingenerated = Transaction::where('byy',0)->paginate(15);
        

        return view('admin.admingeneratedfund',['dadmingenerated' => $dadmingenerated]);
    }

    public function usertrxs()
    {
        $dtrx = Transaction::orderBy('tm','DESC')->paginate(15);

        return view('admin.usertransactions',['dtrx' => $dtrx]);
    }

    public function userdepositedfund()
    {
        $ddeposit = Crypto::orderBy('tm','DESC')->where('details','Deposit')->paginate(15);
        return view('admin.userdepositedfund',['ddeposit' => $ddeposit]);
    }

    public function trxsearch(Request $request)
    {
        if($request){
            if(isset($request['username'])){
                if($request['sType']=='admin'){
                    $duser = User::where('uname','LIKE',$request['username'])->first();
                    print_r($duser);exit;
                    if($duser){
                        $dadmingenerated = Transaction::where('byy',0)->where('who', $duser->id)->paginate(15);
                        print_r($dadmingenerated);exit;
                        if($dadmingenerated){
                            return view('admin.admingeneratedfund',['dadmingenerated' => $dadmingenerated,'duser' => $duser]);
                        }else {
                            return view('admin.admingeneratedfund',['dadmingenerated' => [],'duser' => []]);
                        }
                    }
                    else{
                        return view('admin.admingeneratedfund',['dadmingenerated' => [],'duser' => $duser]);
                    }
                }
            }else if(isset($request['mail'])){

                if($request['sType']=='admin'){
                    $duser = User::where('email',$request['mail'])->first();
                    if($duser){
                        $dadmingenerated = Transaction::where('byy',0)->where('who', $duser->id)->paginate(15);
                        if($dadmingenerated){
                            return view('admin.admingeneratedfund',['dadmingenerated' => $dadmingenerated,'duser' => $duser]);
                        }else {
                            return view('admin.admingeneratedfund',['dadmingenerated' => [],'duser' => []]);
                        }
                    }
                    else{
                        return view('admin.admingeneratedfund',['dadmingenerated' => [],'duser' => $duser]);
                    }
                }

            }else if(isset($request['mobile'])){

                if($request['sType']=='admin'){
                    $duser = User::where('mobile',$request['mobile'])->first();
                    if($duser){
                        $dadmingenerated = Transaction::where('byy',0)->where('who', $duser->id)->paginate(15);

                        if($dadmingenerated){
                            return view('admin.admingeneratedfund',['dadmingenerated' => $dadmingenerated,'duser' => $duser]);
                        }else {
                            return view('admin.admingeneratedfund',['dadmingenerated' => [],'duser' => []]);
                        }
                    }
                    else{
                        return view('admin.admingeneratedfund',['dadmingenerated' => [],'duser' => $duser]);
                    }
                }

            }
        }
    }
}
