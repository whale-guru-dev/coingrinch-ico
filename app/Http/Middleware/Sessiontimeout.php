<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Auth;

class Sessiontimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     protected $session;
    /**
     * Time for user to remain active, set to 900secs( 15minutes )
     * @var timeout
     */
    protected $timeout = 120;
    public function __construct(Store $session){
        $this->session        = $session;
        $this->redirectUrl    = '/login';
        $this->sessionLabel   = 'warning';
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!$request->session()->get('lastActivityTime'))
        {
            $request->session()->put('lastActivityTime', time());
        }
        elseif(time() - $request->session()->get('lastActivityTime') > $this->timeout)
        {

            $request->session()->forget('lastActivityTime');
            Auth::logout();
            // return redirect($this->getRedirectUrl())->with([ $this->getSessionLabel() => 'You have been inactive for '. $this->timeout/60 .' minutes ago.']);
            return redirect('/');
        }
        $request->session()->put('lastActivityTime',time());

        return $next($request);
    }
    /**
     * Get timeout from laravel default's session lifetime, if it's not set/empty, set timeout to 15 minutes
     * @return int
     */
    private function getTimeOut()
    {
        return  (env('SESSION_LIFETIME')) ?: $this->timeout;
    }
    /**
     * Get redirect url from env file
     * @return string
     */
    private function getRedirectUrl()
    {
        return  (env('SESSION_TIMEOUT_REDIRECTURL')) ?: $this->redirectUrl;
    }
    /**
     * Get Session label from env file
     * @return string
     */
    private function getSessionLabel()
    {
        return  (env('SESSION_LABEL')) ?: $this->sessionLabel;
    }
}
