<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Addresses;

use Auth;
use App\Models\Crypto;
use App\Models\Logs;
use App\Models\Sponsor_bonus;

use LinusU\Bitcoin\AddressValidator;

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Exception\ValidationException;

use App\Models\General_setting;

class WalletController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
        $user = Auth::user();
        $coin_address = Addresses::where('useremail', $user->email)->first();

        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = Client::create($configuration);
        $client->enableActiveRecord();

        $btc_wal = $client->getAccount(env('BTC_ACCOUNT_ID'));
        $eth_wal=  $client->getAccount(env('ETH_ACCOUNT_ID'));

        if(!$coin_address){

            $address = new Address(['name' => $user->email]);
            $client->createAccountAddress($btc_wal, $address);
            $btc_data = $client->decodeLastResponse();

            $client->createAccountAddress($eth_wal, $address);
            $eth_data = $client->decodeLastResponse();

            $coin_address = new Addresses;
            $coin_address->useremail = $user->email;
            $coin_address->btc = $btc_data['data']['address'];
            $coin_address->btc_more = $btc_data['data']['id'];
            $coin_address->eth = $eth_data['data']['address'];
            $coin_address->eth_more = $eth_data['data']['id'];
            $coin_address->save();

            $logs = new Logs;
            $logs->log = 'User '.$user->email.'BTC, ETH Addresses was created in Coinbase Account';
            $logs->date = now();
            $logs->save();

        }

        $pending_crypto = Crypto::where('who',$user->id)->where('status','pending')->get();

        if($pending_crypto->count()>0){
            foreach($pending_crypto as $tranz){
                try{
                    if ($tranz['coin'] == 'BTC') {
                        $transaction = $client->getAccountTransaction($btc_wal, $tranz['trxid']);
                        $data = $client->decodeLastResponse();

                        $desc = $data['data']['description'];
                        if(!is_null($desc) && !empty($desc)){
                            $desc = str_word_count($data['data']['description'], 1)[0];
                        }

                        if($desc=='Withdraw') {
                            if ($data['data']['status'] == 'completed'){
                                if($tranz['type'] == 'withdraw'){
                                    $tranz->status = 'confirm';
                                    $tranz->save();
                                }
                            }
                        }else{

                            if ($data['data']['status'] == 'completed'){
                                if($tranz['type'] == 'deposit'){
                                    $tranz->status = 'confirm';
                                    $tranz->save();

                                    $btc_bal = $user->btc;
                                    $user->btc = $btc_bal + $tranz['amount'];
                                    $user->save();
                                                  
                                }
                            }
                        }

                    }
                    if ($tranz['coin'] == 'ETH') {
                        $transaction = $client->getAccountTransaction($eth_wal, $tranz['trxid']);
                        $data = $client->decodeLastResponse();

                        $desc = $data['data']['description'];
                        if(!is_null($desc) && !empty($desc)){
                            $desc = str_word_count($data['data']['description'], 1)[0];
                        }

                        if($desc=='Withdraw') {
                            if ($data['data']['status'] == 'completed'){
                                if($tranz['type'] == 'withdraw'){
                                    $tranz->status = 'confirm';
                                    $tranz->save();
                                }
                            }
                        }else{
                        
                            if ($data['data']['status'] == 'completed'){
                                if($tranz['type'] == 'deposit'){
                                    $tranz->status = 'confirm';
                                    $tranz->save();

                                    $eth_bal = $user->eth;
                                    $user->eth = $eth_bal + $tranz['amount'];
                                    $user->save();
                                }
                            }
                        }

                    }
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            }
        }
        

        return view('customers.wallet'); 
    }

    public function history()
    {
        $dcrypto = Crypto::orderBy('tm','DESC')->where('who' , Auth::user()->id)->get();

        $user = Auth::user();

        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = Client::create($configuration);
        $client->enableActiveRecord();

        $btc_wal = $client->getAccount(env('BTC_ACCOUNT_ID'));
        $eth_wal=  $client->getAccount(env('ETH_ACCOUNT_ID'));

        $pending_crypto = Crypto::where('who',$user->id)->where('status','pending')->get();

        if($pending_crypto->count()>0){
            foreach($pending_crypto as $tranz){
                try{
                    if ($tranz['coin'] == 'BTC') {
                        $transaction = $client->getAccountTransaction($btc_wal, $tranz['trxid']);
                        $data = $client->decodeLastResponse();

                        $desc = $data['data']['description'];
                        if(!is_null($desc) && !empty($desc)){
                            $desc = str_word_count($data['data']['description'], 1)[0];
                        }

                        if($desc=='Withdraw') {
                            if ($data['data']['status'] == 'completed'){
                                if($tranz['type'] == 'withdraw'){
                                    $tranz->status = 'confirm';
                                    $tranz->save();
                                }
                            }
                        }else{

                            if ($data['data']['status'] == 'completed'){
                                if($tranz['type'] == 'deposit'){
                                    $tranz->status = 'confirm';
                                    $tranz->save();

                                    $btc_bal = $user->btc;
                                    $user->btc = $btc_bal + $tranz['amount'];
                                    $user->save();
                                                  
                                }
                            }
                        }

                    }
                    if ($tranz['coin'] == 'ETH') {
                        $transaction = $client->getAccountTransaction($eth_wal, $tranz['trxid']);
                        $data = $client->decodeLastResponse();

                        $desc = $data['data']['description'];
                        if(!is_null($desc) && !empty($desc)){
                            $desc = str_word_count($data['data']['description'], 1)[0];
                        }

                        if($desc=='Withdraw') {
                            if ($data['data']['status'] == 'completed'){
                                if($tranz['type'] == 'withdraw'){
                                    $tranz->status = 'confirm';
                                    $tranz->save();
                                }
                            }
                        }else{
                        
                            if ($data['data']['status'] == 'completed'){
                                if($tranz['type'] == 'deposit'){
                                    $tranz->status = 'confirm';
                                    $tranz->save();

                                    $eth_bal = $user->eth;
                                    $user->eth = $eth_bal + $tranz['amount'];
                                    $user->save();
                                }
                            }
                        }

                    }
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            }
        }

        
        return view('customers.wallethistory',['dcrypto' => $dcrypto]);
    }

    public function sponsorbonus()
    {
        $dcrypto = Crypto::orderBy('tm','DESC')->where('type','bonus')->where('who',Auth::user()->id)->get();
        return view('customers.sponsorbonus',['dcrypto' => $dcrypto]);
    }

    public function withdraw_verify(Request $request)
    {
        if($request){

            if($request['curr']=='eth')
                $currency = 'ETH';
            elseif($request['curr']=='btc')
                $currency = 'BTC';
            $amount = $request['amount'];

            $user = Auth::user();
            $user->with_code = $this->generateRandomString();
            $user->save();

            $to = Auth::user()->email;
            $evcode = $user->with_code;
            $sitetitle = General_setting::first()->sitetitle;

            $txt="We are sending this email because you have requested $amount $currency withdrawal from CoinGrinch cloud wallet. If this is you then please copy and paste this code. If not, please ignore this.<br> Code : $evcode<br>";

            if($this->sendemail($to, "COINGRINCH Withdraw Verification Code",Auth::user()->lname,$txt)){
                return response()->json(['status' => 'ok']);
            }else{
                return response()->json(['status' => 'error']);
            }
        }
    }

    public function withdraw(Request $request)
    {
        
        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = Client::create($configuration);
        $client->enableActiveRecord();

        $btc_wal = $client->getAccount(env('BTC_ACCOUNT_ID'));
        $eth_wal = $client->getAccount(env('ETH_ACCOUNT_ID'));

        if($request){
            if($request->code == Auth::user()->with_code){
                $currency = $request->currency;
                $address = $request->address;
                $amount = $request->amount;

                $sponsor = Sponsor_bonus::where('user_id', Auth::user()->id)->first();
                $avail_eth = $sponsor->eth_bonus;
                $avail_btc = $sponsor->btc_bonus;

                $check = true;
                // if($currency == 'eth'){
                //     $check = $this->isAddress($address);
                // }elseif($currency == 'btc'){
                //     $check = AddressValidator::isValid($address);
                // }

                if($check){
                    if((($currency == 'eth') && ($amount <= $avail_eth)) || (($currency == 'btc') && ($amount <= $avail_btc))){
                        if($currency == 'eth'){
                            if($amount*105/100 < $eth_wal->getBalance()->getAmount()){
                                if($amount > 0.001){
                                    $transaction = Transaction::send([
                                        'toBitcoinAddress' => $address,
                                        'amount'           => new Money($amount, CurrencyCode::ETH),
                                        'description'      => 'Withdraw ETH Bonus From '.Auth::user()->email
                                    ]);

                                    try{
                                        $client->createAccountTransaction($eth_wal, $transaction);
                                    }catch (ValidationException  $e){
                                        $msg = ['Please enter a valid Ethereum address','','error'];
                                        return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                                    }

                                }else{
                                    $msg = ['Amount is below the minimum (0.00100000 ETH) required to send on-blockchain.','','error'];
                                    return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                                }
                                
                            }else{
                                $msg = ['You have to wait for some days to withdraw your money. Sorry for the inconvenience and please try again later.','','error'];
                                return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                            }
                            
                        }elseif($currency == 'btc'){
                            if($amount*105/100 < $btc_wal->getBalance()->getAmount()){
                                if($amount > 0.00000001){
                                    $transaction = Transaction::send([
                                        'toBitcoinAddress' => $address,
                                        'amount'           => new Money($amount, CurrencyCode::BTC),
                                        'description'      => 'Withdraw BTC Bonus From '.Auth::user()->email
                                    ]);

                                    try{
                                        $client->createAccountTransaction($btc_wal, $transaction);// where $btc_wal means btc account which is made by 
                                    }catch (ValidationException  $e){
                                        $msg = ['Please enter a valid Bitcoin address','','error'];
                                        return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                                    }
                                }else{
                                    $msg = ['Amount is below the minimum (0.00000001 BTC) required to send on-blockchain.','','error'];
                                    return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                                }
                                
                            }else{
                                $msg = ['You have to wait for some days to withdraw your money. Sorry for the inconvenience and please try again later.','','error'];
                                return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                            }
                        }

                        $data = $client->decodeLastResponse();

                        $logs = new Logs;
                        $logs->log = print_r($data, true);
                        $logs->date = now();
                        $logs->save();


                        if($data['data']['status']!='pending'){
                            $msg = ['There was an error on withdraw funds, Please try again later~','','error'];
                            return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                        }else{
                            //Database operation
                            if($currency == 'eth'){
                               $sponsor->eth_bonus = $sponsor->eth_bonus - $amount;
                               Auth::user()->eth = Auth::user()->eth - $amount;

                                $crypto_log = new Crypto;
                                $crypto_log->who = Auth::user()->id;
                                $crypto_log->address = $address;
                                $crypto_log->coin = 'ETH';
                                $crypto_log->amount = $amount;
                                $crypto_log->trxid = $data['data']['id'];
                                $crypto_log->tm = now();
                                $crypto_log->sig = '-';
                                $crypto_log->details = 'Withdrawal ETH From Bonus';
                                $crypto_log->type = 'withdraw';
                                $crypto_log->user = Auth::user()->email;
                                $crypto_log->status = "pending";

                            }elseif($currency == 'btc'){
                                $sponsor->btc_bonus = $sponsor->btc_bonus - $amount;
                                Auth::user()->btc = Auth::user()->btc - $amount;

                                $crypto_log = new Crypto;
                                $crypto_log->who = Auth::user()->id;
                                $crypto_log->address = $address;
                                $crypto_log->coin = 'BTC';
                                $crypto_log->amount = $amount;
                                $crypto_log->trxid = $data['data']['id'];
                                $crypto_log->tm = now();
                                $crypto_log->sig = '-';
                                $crypto_log->details = 'Withdrawal BTC From Bonus';
                                $crypto_log->type = 'withdraw';
                                $crypto_log->user = Auth::user()->email;
                                $crypto_log->status = "pending";
                            }

                            $sponsor->save();
                            Auth::user()->save();
                            $crypto_log->save();

                            $msg = ['Your Withdraw Transaction status is Pending ! After some time , please check your withdraw address','','success'];
                            return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                        }

                    }else{
                        $msg = ['Your Withdrawal Amount is larger than your available amount ! Please check your available amount.','','error'];
                        return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                    }
                }else{
                    $msg = ['Your Withdrawal Address is invalid ! Please enter valid address, if not you will lose your assets.','','error'];
                    return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
                }
            }else{
                $msg = ['You input wrong Verification code!','','error'];
                return redirect('/Customers/Sponsorbonus')->with(['msg' => $msg]);
            }
            
        }
    }

    public function isAddress($address) {
        if (!preg_match('/^(0x)?[0-9a-f]{40}$/i',$address)) {
            // check if it has the basic requirements of an address
            return false;
        } elseif (!preg_match('/^(0x)?[0-9a-f]{40}$/',$address) || preg_match('/^(0x)?[0-9A-F]{40}$/',$address)) {
            // If it's all small caps or all all caps, return true
            return true;
        } else {
            // Otherwise check each case
            return $this->isChecksumAddress($address);
        }
    }

    public function isChecksumAddress($address) {
        // Check each case
        $address = str_replace('0x','',$address);
        $addressHash = hash('sha3-256',strtolower($address));
        $addressArray=str_split($address);
        $addressHashArray=str_split($addressHash);

        for($i = 0; $i < 40; $i++ ) {
            // the nth letter should be uppercase if the nth digit of casemap is 1
            if ((intval($addressHashArray[$i], 16) > 7 && strtoupper($addressArray[$i]) !== $addressArray[$i]) || (intval($addressHashArray[$i], 16) <= 7 && strtolower($addressArray[$i]) !== $addressArray[$i])) {
                return false;
            }
        }
        return true;
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

    public function sendemail($to,$subject,$uname,$txt){
        $setting =General_setting::first();

        $headers = "From: $setting->sitetitle $setting->notimail \r\n";
        $headers .= "Reply-To: $setting->sitetitle <$setting->notimail> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


        $mm = str_replace("{{name}}",$uname,$setting->emailtemp);     
        $message = str_replace("{{message}}",$txt,$mm); 

        if (mail($to, $subject, $message, $headers)) {
          return true;
        } else {
            return false;
        }

    }


}
