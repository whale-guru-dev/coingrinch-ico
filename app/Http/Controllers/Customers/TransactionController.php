<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$dtrx = Transaction::orderBy('tm','DESC')->where('who',Auth::user()->id)->get();
        return view('customers.transaction',['dtrx' => $dtrx]); 
    }
}
