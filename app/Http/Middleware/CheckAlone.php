<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
// use Session;
use Auth;

class CheckAlone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
        // $cursid = Session::get('sid');
        $cursid = session('sid'); 
        $orisid = Admin::find(1)->sid;

        if(isset($cursid)){
            // echo $cursid; echo "<br>"; echo $orisid;
            if($cursid != $orisid){
                Auth::guard('admin')->logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect()->guest(route( 'Admins.Login' ));
            }
            else 
                return $next($request);
        }else
            return $next($request);
        
        
        
    }
}
