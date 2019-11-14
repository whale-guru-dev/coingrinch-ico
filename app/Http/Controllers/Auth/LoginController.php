<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Logins;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use PHPGangsta_GoogleAuthenticator;

class LoginController extends Controller 
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/Customers';

    protected $hasher;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HasherContract $hasher)
    {
        $this->hasher = $hasher;
        // $this->provider = $provider;
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $error = 0;
        if(isset($request['g-recaptcha-response']) && !empty($request['g-recaptcha-response'])) {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $datab = array(
                'secret' => env('RE_CAP_SECRET'),
                'response' => $request["g-recaptcha-response"]
            );
            $options = array(
                'http' => array(
                    'header' => "Content-Type: application/x-www-form-urlencoded",
                    'method' => 'POST',
                    'content' => http_build_query($datab),

                )
            );
            $context = stream_context_create($options);
            $verify = file_get_contents($url, false, $context);
            $captcha_success = json_decode($verify);
            
            if ($captcha_success->success == false) {
                $error = 1; //Wrong Captcha
            }elseif ($captcha_success->success == true){

                $this->validateLogin($request);

                if ($this->hasTooManyLoginAttempts($request)) {
                    $this->fireLockoutEvent($request);

                    return $this->sendLockoutResponse($request);
                }

                $user = User::where('email', $request->email)->first();

                if($user){
                    if ($this->hasher->check($request->password, $user->getAuthPassword())) {          

                        $user = User::where('email', $request->email)->first();
                        if($user->block == 1 ){

                            $error = 3; //User blocked to login 
                            return redirect('/login')->with(['error' => $error]);
                        }
                        if($user->g2fauth == 1){
                            return redirect('/login')->with(['google2fa' => 1, 'email' => $user->email, 'password' => $request->password]);
                        }
                        if(($user->block == 0)&&($user->g2fauth == 0)){

                            $this->attemptLogin($request);

                            $user_os        =   $this->getOS();
                            $user_browser   =   $this->getBrowser();

                            $device_details =   "".$user_browser." on ".$user_os."";

                            
                            // $ip = $_SERVER['REMOTE_ADDR'];
                            $ip = $this->getRealIpAddr();
                            $ua = $_SERVER['HTTP_USER_AGENT'];

                            $co = $this->ip_info("Visitor", "Country"); // India
                            $cc = $this->ip_info("Visitor", "countrycode"); // IN
                            $ca = $this->ip_info("Visitor", "Address"); // Proddatur, Andhra Pradesh, India

                            $loc = "$ca ($cc)";

                            $logins = new Logins([
                                'usid' => $user->id,
                                'ip' => $ip,
                                'location' => $loc,
                                'ua' => $device_details
                            ]);

                            $logins->save();

                            // return $this->sendLoginResponse($request);
                            return redirect('/Customers/Dashboard');
                        }

                    }
                }

                // If the login attempt was unsuccessful we will increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                $this->incrementLoginAttempts($request);

                return $this->sendFailedLoginResponse($request);
            }
        }

        if(isset($request['fauth'])){
            $ga = new PHPGangsta_GoogleAuthenticator;

            $cucu = str_replace(' ', '', $request['fauth']);
            $user = User::where('email',$request->email)->first();
            $data = $user->google2f;
            $valid = $ga->verifyCode($data, $cucu, 2); 
            
            if ($valid) {

                $this->attemptLogin($request);

                $user_os        =   $this->getOS();
                $user_browser   =   $this->getBrowser();

                $device_details =   "".$user_browser." on ".$user_os."";

                
                // $ip = $_SERVER['REMOTE_ADDR'];
                $ip = $this->getRealIpAddr();
                $ua = $_SERVER['HTTP_USER_AGENT'];

                $co = $this->ip_info("Visitor", "Country"); // India
                $cc = $this->ip_info("Visitor", "countrycode"); // IN
                $ca = $this->ip_info("Visitor", "Address"); // Proddatur, Andhra Pradesh, India

                $loc = "$ca ($cc)";

                $logins = new Logins([
                    'usid' => $user->id,
                    'ip' => $ip,
                    'location' => $loc,
                    'ua' => $device_details
                ]);

                $logins->save();

                // return $this->sendLoginResponse($request);
                return redirect('/Customers/Dashboard');
            } else {
                $error = 2; //Wrong authenticator one-time code
                return redirect('/login')->with(['error' => $error]);
            }
        }
        $error = 4; //Captcha not completed
        return redirect('login')->with(['error' => $error]);

    }


    public function getOS() { 

        global $user_agent;

        $os_platform    =   "Unknown OS Platform";
        
        $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

        $os_array       =   array(
                                '/windows nt 10/i'     =>  'Windows 10',
                                '/windows nt 6.3/i'     =>  'Windows 8.1',
                                '/windows nt 6.2/i'     =>  'Windows 8',
                                '/windows nt 6.1/i'     =>  'Windows 7',
                                '/windows nt 6.0/i'     =>  'Windows Vista',
                                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                                '/windows nt 5.1/i'     =>  'Windows XP',
                                '/windows xp/i'         =>  'Windows XP',
                                '/windows nt 5.0/i'     =>  'Windows 2000',
                                '/windows me/i'         =>  'Windows ME',
                                '/win98/i'              =>  'Windows 98',
                                '/win95/i'              =>  'Windows 95',
                                '/win16/i'              =>  'Windows 3.11',
                                '/macintosh|mac os x/i' =>  'Mac OS X',
                                '/mac_powerpc/i'        =>  'Mac OS 9',
                                '/linux/i'              =>  'Linux',
                                '/ubuntu/i'             =>  'Ubuntu',
                                '/iphone/i'             =>  'iPhone',
                                '/ipod/i'               =>  'iPod',
                                '/ipad/i'               =>  'iPad',
                                '/android/i'            =>  'Android',
                                '/blackberry/i'         =>  'BlackBerry',
                                '/webos/i'              =>  'Mobile'
                            );

        foreach ($os_array as $regex => $value) { 

            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }   

        return $os_platform;

    }

    public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }

    public function getBrowser() {

        global $user_agent;

        $browser        =   "Unknown Browser";

        $browser_array  =   array(
                                '/msie/i'       =>  'Internet Explorer',
                                '/firefox/i'    =>  'Firefox',
                                '/safari/i'     =>  'Safari',
                                '/chrome/i'     =>  'Chrome',
                                '/edge/i'       =>  'Edge',
                                '/opera/i'      =>  'Opera',
                                '/netscape/i'   =>  'Netscape',
                                '/maxthon/i'    =>  'Maxthon',
                                '/konqueror/i'  =>  'Konqueror',
                                '/mobile/i'     =>  'Handheld Browser'
                            );

        foreach ($browser_array as $regex => $value) { 

            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }

        }

        return $browser;

    }

    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}
