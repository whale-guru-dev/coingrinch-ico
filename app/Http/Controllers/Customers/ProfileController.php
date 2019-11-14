<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use PHPGangsta_GoogleAuthenticator;
use App\Models\Logs;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('customers.profile'); 
    }

    protected function validator(array $data)
    {


        return Validator::make($data, 
            ['password' => 'required|min:8|confirmed']
        );
    }

    public function changepassword(Request $request)
    {
    	$user = Auth::user();

    	if($request){

    	$this->validate($request, ['password' => 'required|min:8|confirmed']);

    		// Validate the form data
	      // $this->validator([$request->password,$request->password_confirmation]);

    		if($request['password'] == $request['password_confirmation']){
    			$user->password = bcrypt($request['password']);
    			if($user->save()){

                    $logs = new Logs;
                    $logs->log = 'User '.$user->email.' Changed Password';
                    $logs->date = now();
                    $logs->save();

    				$msg = ['Password Updated Successfullly!','','success'];
    			}else{
    				$msg = ['There was an problem!','Please try again','error'];
    			}

    		}else{
    			$msg = ['Password Updated Failed~','Password and Confirm Password should be same!','error'];
    		}

    		return redirect('/Customers/Profile')->with(['msg' => $msg]);
    	}
    }

    public function setethaddr(Request $request)
    {
    	$user = Auth::user();
    	if($request){
    		// if($this->isAddress($request['ether_wallet'])){
            // if(($request['ether_wallet'])){    
    			$user->ether_addr = $request['ether_wallet'];
    			if($user->save()){

                    $logs = new Logs;
                    $logs->log = 'User '.$user->email.' Set Ethereum Wallet Address';
                    $logs->date = now();
                    $logs->save();

    				$msg = ['Ethereum Wallet Address Updated Successfullly!','','success'];
    			}else
    				$msg = ['There was an error during Set Ethereum Wallet Address!','','error'];
    		// }else 
    			// $msg = ['Invalid Ethereum Wallet Address!','','error'];
    		return redirect('/Customers/Profile')->with(['msg' => $msg]);
    	}
    }

    public function isAddress($address) {
	    if (!preg_match('/^(0x)?[0-9a-f]{40}$/i',$address)) {
	        // check if it has the basic requirements of an address
	        return false;
	    } elseif (!preg_match('/^(0x)?[0-9a-f]{40}$/',$address) || preg_match('/^(0x)?[0-9A-F]{40}$/',$address)) {
	        // If it's all small caps or all all caps, return true
	        return true;
	    } else {
	        // Otherwise check each case
	        return $this->isChecksumAddress($address);
	    }
	}

	public function isChecksumAddress($address) {
	    // Check each case
	    $address = str_replace('0x','',$address);
	    $addressHash = hash('sha3-256',strtolower($address));
	    $addressArray=str_split($address);
	    $addressHashArray=str_split($addressHash);

	    for($i = 0; $i < 40; $i++ ) {
	        // the nth letter should be uppercase if the nth digit of casemap is 1
	        if ((intval($addressHashArray[$i], 16) > 7 && strtoupper($addressArray[$i]) !== $addressArray[$i]) || (intval($addressHashArray[$i], 16) <= 7 && strtolower($addressArray[$i]) !== $addressArray[$i])) {
	            return false;
	        }
	    }
	    return true;
	}

	public function setprofileimage(Request $request)
	{
		$user = Auth::user();

		if($request){
            if($request->hasFile('profileImage')){
                $this->validate($request, [
                    'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $profileImage = $request->file('profileImage');

                if($user->propic != 'default.jpg')
                    $name = $user->propic;

                else 
                    $name = $this->generateRandomString().'.'.$profileImage->getClientOriginalExtension();

                $user->propic = $name;
                
                $destinationPath = public_path('assets/propic');
                
                if($user->save() && $profileImage->move($destinationPath, $name)){
                    $msg = ['Profile Image Uploaded successfully !', "", "success"];
                }else{
                    $msg = ['There was a problem uploading the profile image.', "", "error"];
                }
            }else{
                $msg = [ "You have not selected Image for this profile, Please select the image and upload again", '',"error"];
            }

            return redirect('/Customers/Profile')->with(['msg' => $msg]);
        }
	}

	public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function setgoogle2fa(Request $request)
    {
    	$user =Auth::user();
    	$ga = new PHPGangsta_GoogleAuthenticator;
    	$secret = str_replace(' ', '', $_POST['auth-sec']);

	    $valid =  $ga->verifyCode($user['google2f'], $secret, 2);
	    
	    if ($valid) {
	    	$user->g2fauth = 1;
	        
	        if(!isset($request['disablex'])) {
	            $disable=1;
	        }
	        if(isset($request['disablex'])){
	            $user->g2fauth = 0;
	            $disable=0;
	        }
		    if($user->save()){
		    	if($disable == 0)
		    		$msg = ['Google 2FA Disabled successfully !', "", "success"];
		    	else 
		    		$msg = ['Google 2FA Set successfully !', "", "success"];
		    }
	    } else {
	    	$msg = ['There was a problem by setting Google Authentication !', "", "error"];
	    }

	    return redirect('/Customers/Profile')->with(['msg' => $msg]);
    }
}
