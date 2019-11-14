<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Crypto;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

    	$count_all_users = User::count();
        $count_banned_users = User::where('block', 1)->get()->count();
        $count_pending_users = User::where('mv', 0)->orWhere('ev',0)->get()->count();
        $count_verified_users = User::where('mv', 1)->where('ev', 1)->get()->count();
        $count_emailun_users = User::where('ev', 0)->get()->count();
        $count_mobileun_users = User::where('mv', 0)->get()->count();
        // $count_kycun_users = User::where('kyc_verified', 0)->get()->count();

        $token_amount_all_users = User::sum('acgc');
        $toekn_amount_added_admin = Transaction::where('byy', 0)->sum('amount') - Transaction::where('byy', 1)->sum('amount');

        $count_trx = Transaction::count();
        $token_amount_transacted = Transaction::sum('amount');

        $count_deposit = Crypto::where('type','deposit')->count();

        // echo $toekn_amount_added_admin;exit;
        return view('admin.dashboard',['call' => $count_all_users, 'cbanned' => $count_banned_users, 'cpending' => $count_pending_users, 'cverified' => $count_verified_users, 'cemailun' => $count_emailun_users, 'cmobileun' => $count_mobileun_users, /*'ckycun' => $count_kycun_users,*/ 'auAcgc' => $token_amount_all_users, 'aadminAcgc' => $toekn_amount_added_admin, 'ctrxnum' => $count_trx, 'atransacted' => $token_amount_transacted, 'cdeposit' => $count_deposit]); 
    }

   
}
