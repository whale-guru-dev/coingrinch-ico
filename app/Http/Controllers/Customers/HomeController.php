<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sponsor_bonus;
use Auth;
use App\Models\Logs;

use App\Models\Crypto;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Transaction;

use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Enum\CurrencyCode;

use App\Models\Addresses;


class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        if(!Sponsor_bonus::where('user_id',$user->id)->first()){
            $sponsor = new Sponsor_bonus;
            $sponsor->user_id = $user->id;
            $sponsor->eth_bonus = 0;
            $sponsor->btc_bonus = 0;
            $sponsor->save();
        }

        
        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = Client::create($configuration);
        $client->enableActiveRecord();

        $btc_wal = $client->getAccount(env('BTC_ACCOUNT_ID'));
        $eth_wal=  $client->getAccount(env('ETH_ACCOUNT_ID'));

        $coin_address = Addresses::where('useremail', $user->email)->first();

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

        return view('customers.dashboard'); 
    }


}
