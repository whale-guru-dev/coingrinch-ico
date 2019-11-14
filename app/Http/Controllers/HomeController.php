<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TokenRequest;
use App\Models\NewsLetter;
use App\Models\General_setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('Checkverify');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home'); 
    }

    public function tosupport(Request $Request)
    {
        if($Request){
            $fname = $Request['name'];
            $lname = $Request['surname'];
            $email = $Request['email'];
            $phone = $Request['phone'];
            $message = $Request['message'];
            $to = "support@coingrinch.com";
            $subject = "From Users~";

            $headers = "From: $fname $email \r\n";
            $headers .= "Reply-To: $fname <$email> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = "Firstname : $fname <br> Lastname : $lname <br> Email : $email <br> Phone : $phone <br> Message : $message";

            if (mail($to, $subject, $message, $headers)) {
                
            }

            
        }
    }

    public function FAQ()
    {
        return view('landing.faq');
    }


    public function Referral($referral)
    {
        session(['refer_by'=>$referral]);

        return redirect('/'); 
    }

    public function AddToken()
    {
        return view('landing.addtoken');
    }

    public function RegisterToken(Request $request)
    {

        $validatedData = $request->validate([
            'proj_name' => 'required',
            'token_symbol' => 'required',
            'token_addr' => 'required',
            'mail_addr' => 'required',
            'website_url' => 'required',
            'description' => 'required',
            'token_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $token = new TokenRequest;
        $token->proj_name = $request->proj_name;
        $token->token_symbol = $request->token_symbol;
        $token->token_addr = $request->token_addr;

        $token->mail_addr = $request->mail_addr;
        $token->website_url = $request->website_url;
        $token->reddit_link = $request->reddit_link;

        $token->telegram_link = $request->telegram_link;
        $token->bitcointalk_link = $request->bitcointalk_link;
        $token->twitter_link = $request->twitter_link;

        $token->coinmarketcap_link = $request->coinmarketcap_link;
        $token->description = $request->description;
        
        $token->date_request = now();

        if($request->hasFile('token_logo')){

            $logo = $request->file('token_logo');

            $name = $this->generateRandomString().'.'.$logo->getClientOriginalExtension();
            
            $token->icon_image = $name;

            $destinationPath = public_path('assets/token_logo');
            
            if($token->save() && $logo->move($destinationPath, $name)){
                $to = $request->mail_addr;

                $sitetitle = General_setting::first()->sitetitle;

                $txt="Thank you for your trust in COINGRINCH! We will contact you within 3 working days.";
                $this->sendemail($to, "List New Coin",$request->proj_name.' Team',$txt);

                $msg = ['Token Requst successfully Uploaded!', "Your feedback has been received. Thank you for your time!", "success"];
            }else{
                $msg = ['There was a problem uploading the Token Requst.', "", "error"];
            }
        }

        return redirect('/AddToken')->with(['msg' => $msg]);
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function privacypolicy()
    {
        return view('landing.privacypolicy');
    }

    public function termsofuse()
    {
        return view('landing.termsofuse');
    }

    public function NewsLetter(Request $request)
    {
        if($request){
            $newsletter_email = $request->email;
            $time = now();

            $to = "newsletter@coingrinch.com";
            $subject = "NewsLetter $time";

            $headers = "From: NewsLetter $newsletter_email \r\n";
            $headers .= "Reply-To: <$newsletter_email> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = "Email : $newsletter_email <br> Date-Time : $time";

            mail($to, $subject, $message, $headers);

            $newsletter = new NewsLetter;
            $newsletter->email = $newsletter_email;
            $newsletter->created_at = $time;
            if($newsletter->save()){
                return redirect('/');
            }
        }
    }

    public function sendemail($to,$subject,$name,$message){
        $setting =General_setting::first();

        $headers = "From: $setting->sitetitle $setting->notimail \r\n";
        $headers .= "Reply-To: $setting->sitetitle <$setting->notimail> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $mm = str_replace("{{name}}",$name,$setting->emailtemp);     
        $message = str_replace("{{message}}",$message,$mm); 

        if (mail($to, $subject, $message, $headers)) {
          // echo 'Your message has been sent.';
        } else {
        // echo 'There was a problem sending the email.';
        }

    }
}
