<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use PHPGangsta_GoogleAuthenticator;
use App\Traits\CaptchaTrait;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers, CaptchaTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Customers';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $data['captcha'] = $this->captchaCheck();

        return Validator::make($data, [
            'uname' => 'required|string|max:255',
            'lname' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|numeric|unique:users',
            'country' => 'required|string',
            'gender' => 'required|string',
            // 'password' => 'required|regex:/^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])[\w\d!@#$%_]{8,40}$/|min:8|confirmed',
            'password' => 'required|min:8|confirmed',
            'g-recaptcha-response' => 'required',
            'captcha' => 'required|min:1'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $ga = new PHPGangsta_GoogleAuthenticator;
        $mvcode = rand(100000, 999999);
        $evcode = rand(1000000, 9999999);

        if(empty(session('refer_by'))){
            $referat_de ='0';
        }else{
            $referat_de = session('refer_by');
        }

        
        return User::create([
            'uname' => $data['uname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'mobile' => $data['mobilex'],
            'location' => $data['country'],
            'gender' => $data['gender'],
            'password' => bcrypt($data['password']),
            'mvcode' => $mvcode,
            'evcode' => $evcode,
            'ref_id' => $this->generateRandomString(),
            'google2f' => $ga->createSecret(),
            'ref_by' => $referat_de
        ]);
       
    }

    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
