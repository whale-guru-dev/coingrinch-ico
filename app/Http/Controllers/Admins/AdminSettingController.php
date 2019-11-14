<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use App\Models\Logs;

class AdminSettingController extends Controller
{
    
    protected $hasher;

    public function __construct(HasherContract $hasher)
    {
        $this->middleware('auth:admin');
        $this->hasher = $hasher;
    }

    public function changeprofile()
    {
        return view('admin.changeprofile'); 
    }

    public function setnewpassword(Request $request)
    {
        
        $admin = Admin::find(1);
        $oldpass = $admin->password;

        if($request){
            if( $this->hasher->check($request['oldpass'], $oldpass)){

                if($request['newpass'] == $request['newpass_confirm']){
                    $admin->password = bcrypt($request['newpass']);

                    if($admin->save()){
                        $logs = new Logs;
                        $logs->log = 'Admin Changed Password';
                        $logs->date = now();
                        $logs->save();
                        $msg = ['Updated Successfully!','Successfully Changed Password','success'];
                    }else{
                        $msg = ['Some Problem Occurs!','Please Try Again...','error'];
                    }
                }else{
                    $msg = ['Some Problem Occurs!','Confirm Password and New Password should be same','error'];
                }
            }else{
                $msg = ['Some Problem Occurs!','You have to input correct old password','error'];
            }
        }else{
            $msg = ['Some Problem Occurs!','You have to fill the inputs','error'];
        }
        return redirect('/Admins/ChangeProfile')->with(['msg', $msg]);
    }

    public function setnewusername(Request $request)
    {
        $admin = Admin::find(1);
        $oldusername = $admin->username;

        if($request){
            if( $request['oldusername'] == $oldusername){

                if($request['newusername'] == $request['newusername_confirm']){
                    $admin->username = $request['newusername'];

                    if($admin->save()){
                        $logs = new Logs;
                        $logs->log = 'Admin Changed Username';
                        $logs->date = now();
                        $logs->save();
                        $msg = ['Updated Successfully!','Successfully Changed Username','success'];
                    }else{
                        $msg = ['Some Problem Occurs!','Please Try Again...','error'];
                    }
                }else{
                    $msg = ['Some Problem Occurs!','Confirm Username and New Username should be same','error'];
                }
            }else{
                $msg = ['Some Problem Occurs!','You have to input correct old Username','error'];
            }
        }else{
            $msg = ['Some Problem Occurs!','You have to fill the inputs','error'];
        }
        return redirect('/Admins/ChangeProfile')->with(['msg', $msg]);
    }

}
