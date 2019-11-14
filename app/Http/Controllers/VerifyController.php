<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\General_setting;

class VerifyController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('Checkverify');
    }

    public function VerifyEmail()
    {
        if(Auth::user()){
            if(Auth::user()->ev==1)
                return redirect('/Customers');
            else{
                if(Auth::user()->ev_sent==0){
                    $to=Auth::user()->email;
                    $evcode=Auth::user()->evcode;
                    $sitetitle = General_setting::first()->sitetitle;
                    $url = url('/Email-Verification-Link/').'/'.$evcode;
                    $txt="Thank you for registering to CoinGrinch, Please activate your account by verifying your email.<br> <a href='$url'>Please Click this link to verify your email.</a>";
                    $this->sendemail($to, "Grinch Email Verification",Auth::user()->lname,$txt);
                    Auth::user()->ev_sent = 1;
                    Auth::user()->save();
                }
                
                return view('customers.verifyemail',['msg'=>"sent"]);
            }
        }else{
            return redirect('/login');
        }
        
    }

    public function EmailVerify($verifycode)
    {
        if(Auth::user()){
            if(Auth::user()->ev==1)
                return redirect('/Customers');
            else{
                $user=Auth::user();
            
                if($verifycode==$user->evcode){
                    $user->ev=1;
                    $user->save();
                }else{
                    return view('customers.verifyemail',['msg'=>"sent"]);
                }

                return redirect('/Customers');
            }
        }else{
            return redirect('/login');
        }
        
        
    }

    public function ResendVerifyEmail(Request $request)
    {
        if(Auth::user()){
            if(Auth::user()->ev==1)
                return redirect('/Customers');
            else{
                $user=Auth::user();
                $to=Auth::user()->email;
                $evcode = rand(100000, 999999);
                $user->evcode=$evcode;
                $user->save();
                $sitetitle = General_setting::first()->sitetitle;
                $url = url('/Email-Verification-Link/').'/'.$evcode;
                $txt="Thank you for registering to CoinGrinch, Please activate your account by verifying your email.<br> <a href='$url'>Please Click this link to verify your email.</a>";
                $this->sendemail($to, "Grinch Email Verification",Auth::user()->lname,$txt);
                return redirect('/Customers');
                // return view('customers.verifyemail',['msg'=>"resent"]);  
            }
        }else{
            return redirect('/login');
        }
        
    }

    public function VerifyMobile()
    {
        if(Auth::user()->mv==1)
            return redirect('/Customers');
        else{
            $to=Auth::user()->mobile;
            $mvcode=Auth::user()->mvcode;
            $txt="Your Grinch Verification Code is $mvcode. Please Enter To Verify.";
            $this->sendsms($to,$txt);
            return view('customers.verifymobile');  
        }
        
    }

    public function MobileVerify(Request $request)
    {

        $user=Auth::user();
        
        if($request){
            if($request['code']==$user->mvcode){
                $user->mv=1;
                $user->save();
            }
        }

        return redirect('/Customers');
    }

    public function ResendVerifyMobile(Request $request)
    {   
        $user=Auth::user();
        $to=Auth::user()->mobile;
        $mvcode = rand(100000, 999999);
        $user->mvcode=$mvcode;
        $user->save();
        $txt="Your Grinch Verification Code is $mvcode. Please Enter To Verify.";
        $this->sendsms($to,$txt);
        return view('customers.verifymobile');  
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

    public function sendemail($to,$subject,$uname,$txt){
        $setting =General_setting::first();

        $headers = "From: $setting->sitetitle $setting->notimail \r\n";
        $headers .= "Reply-To: $setting->sitetitle <$setting->notimail> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $mm = str_replace("{{name}}",$uname,$setting->emailtemp);     
        $message = str_replace("{{message}}",$txt,$mm); 

        if (mail($to, $subject, $message, $headers)) {
          // echo 'Your message has been sent.';
        } else {
        // echo 'There was a problem sending the email.';
        }

    }
//live
    public function closeaccount(Request $request)
    {
        if($request){
            $user = Auth::user();
            $user->delete();

            $request->session()->invalidate();

            return redirect('/register');

        }
    }

}
