<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\TokenStatus;

class TokenController extends Controller
{
    public function index()
    {
    	$users = User::where('acgc','>',0)->paginate(15);
    	return view('admin.tokencontrol',['duser'=>$users]);
    }

    public function tokenholders()
    {
    	$token_holders = TokenStatus::where('amount','>',0)->paginate(15);
    	return view('admin.tokenholders',['dtoken_holders'=>$token_holders]);
    }

    public function mintFinish(Request $request)
    {
    	if($request){
    		$trxHash = $request->trxHash;
    		$trxOperation = $request->operation;
    		$time = now();

    		$tokenstatus = new TokenStatus;
    		$tokenstatus->transactionhash = $trxHash;
    		$tokenstatus->operation = $trxOperation;
    		$tokenstatus->status = 'mint finished';
    		$tokenstatus->time = $time;
    		$tokenstatus->save();

    		return response()->json(['status'=>'ok','message'=>'Token Mint was successfully finished']);
    	}
    }

    public function allowTransfer(Request $request)
    {
    	if($request){
    		$trxHash = $request->trxHash;
    		$trxOperation = $request->operation;
    		$time = now();


    		$tokenstatus = new TokenStatus;
    		$tokenstatus->transactionhash = $trxHash;
    		$tokenstatus->operation = $trxOperation;
    		$tokenstatus->status = 'transfer allowed';
    		$tokenstatus->time = $time;
    		$tokenstatus->save();

    		return response()->json(['status'=>'ok','message'=>'Token Transfer was successfully allowed']);
    	}
    }

    public function minttoken(Request $request)
    {
    	if($request){
    		if($request->operation == 'mint-token-to-users'){
    			$trxHash = $request->trxHash;
	    		$trxOperation = $request->operation;
	    		$to = $request->to;
	    		$amount = $request->amount/1000;
	    		$time = now();

	    		$user1 = User::where('ether_addr', $to)->first();
    			$user1->GRT = $amount;
    			$user1->save();

	    		$tokenstatus = new TokenStatus;
	    		$tokenstatus->transactionhash = $trxHash;
	    		$tokenstatus->operation = $trxOperation;
	    		$tokenstatus->amount = $amount;
	    		$tokenstatus->to_user = $to;
	    		$tokenstatus->status = 'successfully minted to user '.$user1->email;
	    		$tokenstatus->time = now();
	    		$tokenstatus->save();

	    		$user2 = User::whereRaw('acgc > GRT')->first();
	    		if($user2){
	    			$addr = $user2->ether_addr;
	    			$amount2 = $user2->acgc - $user2->GRT;

		    		return response()->json(['status'=>'ok','message'=>'Token '.$amount.' GRT at '.$user1->email.' was successfully minted', 'addr'=>$addr, 'amount'=>$amount2*1000]);
	    		}else{
	    			return response()->json(['status'=>'finish','message'=>'Token '.$amount.' GRT at '.$user1->email.' was successfully minted'.'<br> And Token Mint to users have been finished, All users have their tokens now']);
	    		}
    			
    		}else if($request->operation == 'mint-token-to-admin-dev-loyalty'){
    			$trxHash = $request->trxHash;
	    		$trxOperation = $request->operation;
	    		$to = $request->to;
	    		$amount = $request->amount/1000;
	    		$time = now();

	    		$user = User::where('ether_addr', $to)->first();
	    		if($user){
	    			$user->GRT =$user->GRT + $amount;
	    			$user->save();
	    		}

	    		$tokenstatus = new TokenStatus;
	    		$tokenstatus->transactionhash = $trxHash;
	    		$tokenstatus->operation = $trxOperation;
	    		$tokenstatus->amount = $amount;
	    		$tokenstatus->to_user = $to;
	    		$tokenstatus->status = 'successfully minted to admin , loyalty, dev';
	    		$tokenstatus->time = now();
	    		$tokenstatus->save();

	    		return response()->json(['status'=>'ok','message'=>'Token '.$amount.' GRT at '.$to.' was successfully minted']);
    		}

    		
    	}
    }

    public function MintUserToken(Request $request)
    {
    	if($request){
    		if($request->operation=="mint-token-to-users"){
    			$user = User::whereRaw('acgc > GRT')->first();
    			$addr = $user->ether_addr;
    			$amount = $user->acgc - $user->GRT;
    			return response()->json(['addr' => $addr, 'amount'=>$amount*1000]);
    		}
    		// $trxHash = $request->trxHash;
    		// $trxOperation = $request->operation;
    		// $to = $request->to;
    		// $amount = $request->amount/1000;
    		// $time = now();
    		// return response()->json(['status'=>'ok','message'=>'Token '.$amount.' GRT at '.$to.' was successfully minted']);
    	}
    }

    public function freezeAccount(Request $request)
    {
    	if($request){
    		$trxHash = $request->trxHash;
    		$trxOperation = $request->operation;
    		$addr = $request->freeze_addr;
    		$status = $request->freeze_status;
    		if($status == TRUE)
    			$txt = 'Frozen';
    		elseif($status == FALSE) $txt = 'UnFrozen';
    		$time = now();

    		$tokenstatus = new TokenStatus;
    		$tokenstatus->transactionhash = $trxHash;
    		$tokenstatus->operation = $trxOperation;
    		$tokenstatus->to_user = $addr;
    		$tokenstatus->status = ' user ethere wallet account freezed';
    		$tokenstatus->time = $time;
    		$tokenstatus->save();

    		return response()->json(['status'=>'ok','message'=>'Account '.$addr.' was successfully '.$txt]);
    	}
    }
}
