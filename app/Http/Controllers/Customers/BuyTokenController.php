<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Crypto;
use App\Models\Transaction;
use App\Models\Batch;
use App\Models\Addresses;
use App\Models\Logs;
use App\Models\AffilateBonus;
use App\Models\Sponsor_bonus;

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;


class BuyTokenController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('customers.buytoken'); 
    }

    public function purchase(Request $request)
    {

        if($request){

            $user = Auth::user();

            $coin = $request['caxa'];
            $amount = $request['amount'];
            $eth_price = $request['eth'];
            $btc_price = $request['btc'];

            $user_total_btc_usd=$user->btc * $btc_price;
            $user_total_eth_usd=$user->eth * $eth_price;



            $token_price = Batch::where('status', 2)->first()->price;
            $bonus = Batch::where('status', 2)->first()->bonus;
            $trxid = $this->generateRandomString();
            $time = now();


            if($coin == 'eth'){
                if($user_total_eth_usd < $token_price*$amount){
                    return response()->json(['status' => 'no', 'message' => 'Your ETH amount is not sufficient for your request']);
                }else{
                    $eth_amount = $token_price*$amount/$eth_price;
                    $user->acgc = $user->acgc + $amount + $amount*$bonus/100;
                    $user->eth = $user->eth - $eth_amount;

                    
                    $this->affilate($user->id, $eth_amount, $coin,1);



                    $trx1 = new Transaction;
                    $trx1->who = $user->id;
                    $trx1->byy = 2;
                    $trx1->amount = $amount;
                    $trx1->sig = '+';
                    $trx1->typ = 'Add by Purchase';
                    $trx1->tm = $time;
                    $trx1->trxid = $trxid;

                    $trx2 = new Transaction;
                    $trx2->who = $user->id;
                    $trx2->byy = 4;
                    $trx2->amount = $amount*$bonus/100;
                    $trx2->sig = '+';
                    $trx2->typ = 'Add by Bonus';
                    $trx2->tm = $time;
                    $trx2->trxid = $this->generateRandomString();

                    $crypto_log = new Crypto;
                    $crypto_log->who = $user->id;
                    $crypto_log->address = Addresses::where('useremail', $user->email)->first()->eth;
                    $crypto_log->coin = 'ETH';
                    $crypto_log->amount = $eth_amount;
                    $crypto_log->hash = $trxid;
                    $crypto_log->tm = $time;
                    $crypto_log->sig = '-';
                    $crypto_log->details = 'User have purchased Token By ETH';
                    $crypto_log->type = 'purchase';
                    $crypto_log->user = $user->email;

                    if(($user->save())&&($trx1->save())&&($trx2->save())&&($crypto_log->save())){

                        $logs = new Logs;
                        $logs->log = 'User '.$user->email .' Purchased Token Amount '.$amount.', Bonus: '.$amount*$bonus/100;
                        $logs->date = now();
                        $logs->save();

                        return response()->json(['status' => 'ok' , 'message' => 'Successfully Purchased! .<br>'.'Amount: '.$amount.' , Bonus: '.$amount*$bonus/100]);
                    }else{
                        return response()->json(['status' => 'error' , 'message' => 'There was an error , Please contact support']);
                    }
                }
            }elseif($coin == 'btc'){
                if($user_total_btc_usd < $token_price*$amount){
                    return response()->json(['status' => 'no', 'message' => 'Your BTC amount is not sufficient for your request']);
                }else{
                    $btc_amount = $token_price*$amount/$btc_price;
                    $user->acgc = $user->acgc + $amount + $amount*$bonus/100;

                    $this->affilate($user->id, $btc_amount, $coin,1);


                    $user->btc = $user->btc - $btc_amount;

                    $trx1 = new Transaction;
                    $trx1->who = $user->id;
                    $trx1->byy = 2;
                    $trx1->amount = $amount;
                    $trx1->sig = '+';
                    $trx1->typ = 'Add by Purchase';
                    $trx1->tm = $time;
                    $trx1->trxid = $this->generateRandomString();

                    $trx2 = new Transaction;
                    $trx2->who = $user->id;
                    $trx2->byy = 4;
                    $trx2->amount = $amount*$bonus/100;
                    $trx2->sig = '+';
                    $trx2->typ = 'Add by Bonus';
                    $trx2->tm = $time;
                    $trx2->trxid = $this->generateRandomString();

                    $crypto_log = new Crypto;
                    $crypto_log->who = $user->id;
                    $crypto_log->address = Addresses::where('useremail', $user->email)->first()->btc;
                    $crypto_log->coin = 'BTC';
                    $crypto_log->amount = $btc_amount;
                    $crypto_log->hash = $trxid;
                    $crypto_log->tm = $time;
                    $crypto_log->sig = '-';
                    $crypto_log->notification = 'User have purchased Token By BTC';
                    $crypto_log->user = $user->email;
                    $crypto_log->details = 'Token Purchase';
                    $crypto_log->type = 'purchase';
                    $crypto_log->user = $user->email;

                    if(($user->save())&&($trx1->save())&&($trx2->save())&&($crypto_log->save())){

                        $logs = new Logs;
                        $logs->log = 'User '.$user->email .' Purchased Token Amount '.$amount.', Bonus: '.$amount*$bonus/100;
                        $logs->date = now();
                        $logs->save();
                        
                        return response()->json(['status' => 'ok' , 'message' => 'Successfully Purchased! .<br>'.'Amount: '.$amount.' , Bonus: '.$amount*$bonus/100]);
                    }else{
                        return response()->json(['status' => 'error' , 'message' => 'There was an error , Please contact support']);
                    }
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

    public function affilate($id, $amount, $coin, $level)
    {
        $user = User::where('id', $id)->first();

        $bonus = AffilateBonus::where('level', $level)->first();

        if($bonus && ($user->ref_by != '0'))
        {
            

            $affilatebonus = $bonus->percentage;

            $user_ref = User::where('ref_id', $user->ref_by)->first();


            $coin_bonus = $amount * $affilatebonus / 100;

            $user_ref_eth = $user_ref->eth;
            $user_ref_btc = $user_ref->btc;

            $sponsor_bonus = Sponsor_bonus::where('user_id',$user_ref->id)->first();
            if($sponsor_bonus){
                $sponsor_bonus_eth = $sponsor_bonus->eth_bonus;
                $sponsor_bonus_btc = $sponsor_bonus->btc_bonus;
            }else{
                $sponsor_bonus = new Sponsor_bonus;
                $sponsor_bonus->user_id = $user_ref->id;
                $sponsor_bonus->eth_bonus = 0;
                $sponsor_bonus->btc_bonus = 0;
                $sponsor_bonus->save();

                $sponsor_bonus_eth = 0;
                $sponsor_bonus_btc = 0;
            }
            

            $addr = Addresses::where('useremail', $user_ref->email)->first();
            if($coin == 'eth'){
                $user_ref->eth = $user_ref_eth + $coin_bonus;

                $crypto_log = new Crypto;
                $crypto_log->who = $user_ref->id;
                $crypto_log->address = $addr?$addr->eth:null;
                $crypto_log->coin = 'ETH';
                $crypto_log->amount = $coin_bonus;
                $crypto_log->hash = $this->generateRandomString();
                $crypto_log->tm = now();
                $crypto_log->sig = '+';
                $crypto_log->details = 'Affilate Bonus Level '.$level;
                $crypto_log->type = 'bonus';
                $crypto_log->user = $user_ref->email;

                
                $sponsor_bonus->eth_bonus = $sponsor_bonus_eth + $coin_bonus;
                $sponsor_bonus->save();
            }
            else{
                $user_ref->btc = $user_ref_btc + $coin_bonus;

                $crypto_log = new Crypto;
                $crypto_log->who = $user_ref->id;
                $crypto_log->address = $addr?$addr->btc:null;
                $crypto_log->coin = 'BTC';
                $crypto_log->amount = $coin_bonus;
                $crypto_log->hash = $this->generateRandomString();
                $crypto_log->tm = now();
                $crypto_log->sig = '+';
                $crypto_log->details = 'Affilate Bonus Level '.$level;
                $crypto_log->type = 'bonus';
                $crypto_log->user = $user_ref->email;

                $sponsor_bonus->btc_bonus = $sponsor_bonus_btc + $coin_bonus;
                $sponsor_bonus->save();
            }

            
            if($user_ref->save() && $crypto_log->save()){
                $this->affilate($user_ref->id, $amount, $coin, $level+1);
            }

            
        }else{
            return true;
        }
       
    }
}
