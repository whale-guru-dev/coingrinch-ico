<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User_Messages;
use Auth;


class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
    	$user = Auth::user();
    	$dmsg = User_Messages::orderBy('date','DESC')->where('user_id', $user->id)->get();
        return view('customers.message',['dmsg'=>$dmsg]); 
    }

    public function GetMsg(Request $request)
    {
    	$msg = User_Messages::orderBy('date','DESC')->where('id', $request->id)->first();
    	$msg->state = 1;
    	$msg->save();
    	return response()->json($msg);
    }

    public function GetNewMsg()
    {
    	$user = Auth::user();
    	$dmsg = User_Messages::orderBy('date','DESC')->where('user_id', $user->id)->where('state', 0)->get();
        return view('customers.message',['dmsg'=>$dmsg]); 
    }

    public function DelAllMsg(Request $request)
    {
    	$user = Auth::user();
    	$dmsg = User_Messages::orderBy('date','DESC')->where('user_id', $user->id)->get();
    	foreach ($dmsg as $msg) {
    		$msg->delete();
    	}
    	$dmsg = User_Messages::orderBy('date','DESC')->where('user_id', $user->id)->get();
    	if(count($dmsg)==0)
    		return response()->json(['status'=>'ok']);
    	else
    		return response()->json(['status'=>'error']);
    }

    public function DelMsg(Request $request)
    {
    	$user = Auth::user();
    	$dmsg = User_Messages::orderBy('date','DESC')->where('user_id', $user->id)->first();
    	if($dmsg->delete())
    		return response()->json(['status'=>'ok']);
    	else
    		return response()->json(['status'=>'error']);
    }

    public function NewMsgCount()
    {
    	$user = Auth::user();
    	$dmsg = User_Messages::orderBy('date','DESC')->where('user_id', $user->id)->where('state',0)->get();
    	$cnew = count($dmsg);
    	return response()->json(['count'=>$cnew,'msg'=>$dmsg]);
    }
}
