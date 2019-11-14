<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Admin;
use Session;

class LoginController extends Controller
{

	use AuthenticatesUsers;

	// protected $redirectTo = '/Admins';

    public function __construct()
    {
	  
      $this->middleware('guest:admin')->except('logout');
      $this->middleware('checkalone')->except('logout');
    }
    public function showLoginForm()
    {
      return view('auth.adminlogin');
    }
    public function login(Request $request)
    {

      // Validate the form data
      $this->validate($request, [
        'username' => 'required',
        'password' => 'required|min:6'
      ]);


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

      	$admin = Admin::find(1);
      	


	      // Attempt to log the user in
	      if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
	        // if successful, then redirect to their intended location
	        $sid = md5(time().$admin->username);
	        $admin->sid = $sid;
      		$admin->save();
      		// Session::put('sid',$sid);
      		session(['sid' => $sid]);
	        return redirect('/Admins/Dashboard');
          // return $this->sendLoginResponse($request);
	      }
	      // if unsuccessful, then redirect back to the login with the form data
	      // return redirect()->back()->withInput($request->only('username', 'remember'));
        $this->incrementLoginAttempts($request);
     
        return $this->sendFailedLoginResponse($request);
	    
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        // $request->session()->flush();
        // $request->session()->regenerate();
        return redirect()->guest(route( 'Admins.Login' ));
    }
}
