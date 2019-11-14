<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Auth;
use App\Models\User;
use App\Models\General_setting;

class AffilateController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function referrals()
    {
        $dfollowers = User::where('ref_by',Auth::user()->ref_id)->get();
        
        
        return view('customers.affilate',['dfollowers' => $dfollowers]); 
    }

    public function share()
    {
        return view('customers.share'); 
    }

    public function sharelink(Request $request)
    {
        if($request){
            $emailtemp = General_setting::find(1)->emailtemp1;
            $to = $request['fEamil'];
            $title = "JOIN INTO GRINCH FAMILY!";
            $url = url('/follow-me/').'/'.Auth::user()->ref_id;
            $message = "CoinGrinch promises the best thing for future cryptocurrency exchange. It will help you to fill your diminished pocket again. One of your friends/acquaintances <span style='font-weight:bold;'>".Auth::user()->uname."</span> , wants to introduce our ICO to you, so that you can enjoy the benefit of it. Please click on this link to visit our site and purchase our tokens during the much profitable period.<br><a href='$url'>Please use this link</a>";

            $this->sendemail($to, $title,$title,$message);

            $msg = ['We have sent your referral link to your friend successfully','','success'];
            
            return redirect('/Customers/Share')->with(['msg' => $msg]);
        }
    }

    public function sendemail($to,$subject,$title,$message){
        $setting =General_setting::first();

        $headers = "From: $setting->sitetitle $setting->notimail \r\n";
        $headers .= "Reply-To: $setting->sitetitle <$setting->notimail> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $mm = str_replace("{{title}}",$title,$setting->emailtemp1);     
        $message = str_replace("{{message}}",$message,$mm); 

        if (mail($to, $subject, $message, $headers)) {
          // echo 'Your message has been sent.';
        } else {
        // echo 'There was a problem sending the email.';
        }

    }
}
 