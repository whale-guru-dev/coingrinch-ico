<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Checkverify
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
        if (Auth::user()->ev == 0) 
        {
            return redirect('/VerifyEmail');
        }
        

        if(Auth::user()->mv == 0)
        {
            return redirect('/VerifyMobile');
        }
        

       return $next($request);
    }


}
