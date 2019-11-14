<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;
use App\Models\Addresses;
Use App\Models\User;
use App\Models\Crypto;
use App\Models\Logs;
use App\Models\General_setting;

class CoinbaseController extends Controller
{
	public function __construct()
	{

	}

    public function Ipn_Manage()
    {

        $raw_body = file_get_contents('php://input');
        
        $data = json_decode($raw_body,true);


		if( ($data['resource'] == 'notification') && ($data['type'] == 'wallet:addresses:new-payment') && (!empty(Addresses::where('useremail', $data['data']['name'])->first())) && (empty(Crypto::where('hash', '0x'.$data['additional_data']['hash'])->first())) ){

			$logs = new Logs;
	        $logs->log = 'IPN Message Arrived '.print_r($raw_body, true);
	        $logs->date = now();
	        $logs->save();

	        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
			$client = Client::create($configuration);
	        $signature = $_SERVER['HTTP_CB_SIGNATURE'];
			$authenticity = $client->verifyCallback($raw_body, $signature);

			$logs = new Logs;
	        $logs->log = 'IPN Message verifyCallback '.print_r($authenticity, true);
	        $logs->date = now();
	        $logs->save();

	        $trid = $data['id']; // notification id

			$type = $data['type'];

			$resource = $data['resource']; // must be notification

			$address  = $data['data']['address'];
			$name     = $data['data']['name'];  // de asociat cu user

			$hash     = $data['additional_data']['hash'];  // de asociat cu user

			$ad_cur   = $data['additional_data']['amount']['currency'];
			$ad_value = $data['additional_data']['amount']['amount'];
			$ad_trid  = $data['additional_data']['transaction']['id']; //transaction id

			$deanostru = Addresses::where('useremail', $name)->first();

			$fak = User::where('email', $name)->first();
			$hash = '0x'.$hash;

	    	$crypto = new Crypto;
		    $crypto->who = $fak->id;
		    $crypto->address = $address; 
		    $crypto->coin = $ad_cur;
		    $crypto->amount = $ad_value;
		    $crypto->trxid = $ad_trid;
		    $crypto->tm = now();
		    $crypto->sig = '+';
		    $crypto->notification = $trid;
		    $crypto->hash = $hash;
		    $crypto->user = $name;
		    $crypto->details = 'Deposit';
		    $crypto->type = 'deposit';
		    $crypto->status = 'pending';
		    $crypto->save();

		    $logs = new Logs;
	        $logs->log = 'IPN Message Arrived '.'Deposit At '.$address.'  '.$ad_cur.':'.$ad_value;
	        $logs->date = now();
	        $logs->save();

		    if($ad_cur =='BTC'){
		    	// $fak->btc = $fak->btc + $ad_value;
		     //    $fak->save();

		        $to = $name;
		        $uname = $fak->fname;
		        $subject = "Your Deposit is under pending!";
		        $txt = "You have deposited ".$ad_value." BTC, This amount of BTC has been added to your Grinch wallet after confirmation. Now current status for your deposit is pending. Please wait...";
		        $this->sendemail($to, $subject, $uname, $txt);
		    }

		    if($ad_cur =='ETH'){
		        // $fak->eth = $fak->eth + $ad_value;
		        // $fak->save();

		        $to = $name;
		        $uname = $fak->fname;
		        $subject = "Deposit Successfully Done!";
		        $txt = "You have deposited ".$ad_value." ETH, This amount of ETH has been added to your Grinch wallet after confirmation. Now current status for your deposit is pending. Please wait...";
		        $this->sendemail($to, $subject, $uname, $txt);
		    }

		    return response()->json(['status'=>'ok']);
		}
    }

    public function sendemail($to,$subject,$uname,$txt){
        $setting =General_setting::first();

        $headers = "From: ".$setting->sitetitle."<".$setting->notimail."> \r\n";
        $headers .= "Reply-To: ".$setting->sitetitle."<".$setting->notimail."> \r\n";
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
}
