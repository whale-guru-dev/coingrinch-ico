<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      //   switch ($guard) {
      //       case 'admin':
      //         if (Auth::guard($guard)->check()) {
      //           return redirect('/Admins');
      //         }
      //         break;
      //       default:
      //         if (Auth::guard($guard)->check()) {
      //             return redirect('/Customers');
      //         }
      //       break;
      // }
      // return $next($request);

      if (Auth::guard($guard)->check()) {
          if ($guard == 'admin')
            return redirect()->route('/Admins');
            return redirect($request->get('redirect_uri', '/Customers'));
        }

        return $next($request);
    }

}
