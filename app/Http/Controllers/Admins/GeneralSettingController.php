<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\General_setting;
use App\Models\Batch;
use App\Models\Blogs;
use App\Models\Logs;
use App\Models\AffilateBonus;

class GeneralSettingController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        return view('admin.generalsetting'); 
    }

    public function setgeneralsetting(Request $request)
    {
        if($request){
            $general_setting = General_setting::find(1);
            $general_setting->sitetitle = $request['title'];
            $general_setting->colorcode = $request['color'];
            $general_setting->currency = $request['currency'];
            $general_setting->cur = $request['cur'];
            $general_setting->reg = $request['reg'] == 'on' ? 1 : 0;
            $general_setting->ev = $request['ev'] == 'on' ? 1 : 0;
            $general_setting->mv = $request['mv'] == 'on' ? 1 : 0;
            $general_setting->deci = $request['deci'];
            $general_setting->en = $request['en'] == 'on' ? 1 : 0;
            $general_setting->mn = $request['mn'] == 'on' ? 1 : 0;
            $general_setting->min_grt = $request['min_grt'];
            if($general_setting->save()){
                $logs = new Logs;
                $logs->log = 'Admin Changed General Settings';
                $logs->date = now();
                $logs->save();
                $msg = ['General Settings updated successfully !', "", "success"];
            }else {
                $msg = ['There was a problem updating the General Settings.', "", "error"];
            }

            return redirect('/Admins/GeneralSetting')->with(['msg' => $msg]);
        }

    }

    public function emailsetting()
    {
        $dgeneral_setting = General_setting::find(1);
        return view('admin.emailsetting',['dgeneral_setting' => $dgeneral_setting]);
    }

    public function setemailsetting(Request $request)
    {
        if($request){
            $general_setting = General_setting::find(1);
            $general_setting->notimail = $request['notimail'];
            $general_setting->emailtemp = $request['btext'];
            if($general_setting->save()){
                $logs = new Logs;
                $logs->log = 'Admin Email Settings';
                $logs->date = now();
                $logs->save();
                $msg = ['Email Settings updated successfully !', "", "success"];
            }else{
                $msg = ['There was a problem updating the Email Settings.', "", "error"];
            }
        }

        return redirect('/Admins/EmailSetting')->with(['msg' => $msg]);
    }

    public function smssetting()
    {
        $dgeneral_setting = General_setting::find(1);
        return view('admin.smssetting',['dgeneral_setting' => $dgeneral_setting]);
    }

    public function setsmssetting(Request $request)
    {
        if($request){
            $general_setting = General_setting::find(1);
            $general_setting->smsapi = $request['smsapi'];

            if($general_setting->save()){
                $logs = new Logs;
                $logs->log = 'Admin SMS Settings';
                $logs->date = now();
                $logs->save();
                $msg = ['SMS Settings updated successfully !', "", "success"];
            }else{
                $msg = ['There was a problem updating the SMS Settings.', "", "error"];
            }

            return redirect('/Admins/SMSSetting')->with(['msg' => $msg]);
        }

    }


    public function calendarico()
    {   
        $dbatch = Batch::all();
        return view('admin.calendarico',['dbatch' => $dbatch]);
    }

    public function setcalendarico(Request $request)
    {
        if($request){
            if($request['type']=='edit'){

                $id = $request["id"];
                $date_from = $request["date_from"];

                $price = $request["price"];

                $date_to = $_POST["date_to"];

                $status = $request["status"];

                $batch = Batch::where('id',$id)->first();

                $batch->date_from = $date_from;
                $batch->date_to = $date_to;

                $batch->price = $price;

                $batch->status = $status;
                if($batch->save()){
                    $logs = new Logs;
                    $logs->log = 'Admin Editted ICO Calendar';
                    $logs->date = now();
                    $logs->save();
                    $msg = ['Updated Successfully!', "", "success"];
                }else{
                    $msg = ['Some Problem Occurs!', "Please Try Again...", "error"];
                }

                return redirect('/Admins/CalendarICO')->with(['msg' => $msg]);

            }else if($request['type']=='add'){
                $date_from = $request["date_from"];
                $price = $request["price"];

                $date_to = $_POST["date_to"];
                $bonus = $_POST['bonus'];
                $status = $request["status"];

                $batch = new Batch;
                $batch->date_from = $date_from;
                $batch->date_to = $date_to;

                $batch->price = $price;
                $batch->bonus = $bonus;
                $batch->status = $status;

                if($batch->save()){
                    $logs = new Logs;
                    $logs->log = 'Admin Added ICO Calendar';
                    $logs->date = now();
                    $logs->save();
                    $msg = ['Added Successfully!', "", "success"];
                }else{
                    $msg = ['Some Problem Occurs!', "Please Try Again...", "error"];
                }

                return redirect('/Admins/CalendarICO')->with(['msg' => $msg]);
            }
        }

        if(isset($request['delete'])){
            $id = $request['delete'];
            $batch = Batch::where('id', $id)->first();

            if($batch->delete()){
                $logs = new Logs;
                $logs->log = 'Admin Deleted ICO Calendar';
                $logs->date = now();
                $logs->save();
                echo "Deleted Successfully";
            }else{
                echo "Some Problem Occurs!";
            }
        }        
        
    }


    public function invested()
    {
        return view('admin.invested');
    }

    public function blog()
    {
        $bmanage = 'normal';
        $dblog = Blogs::paginate(15);
        return view('admin.blog',['dblog' => $dblog, 'bmanage' => $bmanage]);
    }

    public function manageblog(Request $request)
    {
        if($request){
            
            if($request['type']=='edit'){
                $blog = Blogs::where('postID', $request['postID'])->first();

                $blog->postTitle = $request->postTitle;
                $blog->postDesc = $request->postDesc;
                $blog->postCont = $request->postCont;
                $blog->postDate = now();

                if($request->changepic){
                    if($request->hasFile('blogImage')){
                        $this->validate($request, [
                            'blogImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        ]);
                        $blogImage = $request->file('blogImage');

                        $name = $blog->postImg;
                        
                        $destinationPath = public_path('assets/images/blog');
                        
                        if($blog->save() && $blogImage->move($destinationPath, $name)){
                            $logs = new Logs;
                            $logs->log = 'Admin Editted Blog';
                            $logs->date = now();
                            $logs->save();
                            $msg = ['Blog Editted successfully !', "", "success"];
                        }else{
                            $msg = ['There was a problem editing the blog.', "", "error"];
                        }
                    }else{
                        $msg = ['There was a problem editing the blog.', "You have not selected Image for this blog, Please select the image and edit again", "error"];
                    }
                }else{
                    if($blog->save()){
                        $logs = new Logs;
                        $logs->log = 'Admin Editted Blog';
                        $logs->date = now();
                        $logs->save();
                        $msg = ['Blog Editted successfully !', "", "success"];
                    }else{
                        $msg = ['There was a problem editing the blog.', "", "error"];
                    }
                }

                return redirect('/Admins/Blog')->with(['msg' => $msg]);

            }else if($request['type']=='add'){
                // echo "add";exit;
                $blog = new Blogs;
                $blog->postTitle = $request->postTitle;
                $blog->postDesc = $request->postDesc;
                $blog->postCont = $request->postCont;
                $blog->postDate = now();
                if($request->hasFile('blogImage')){
                    $this->validate($request, [
                        'blogImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $blogImage = $request->file('blogImage');

                    $name = $this->generateRandomString().'.'.$blogImage->getClientOriginalExtension();
                    
                    $destinationPath = public_path('assets/images/blog');
                    $blog->postImg = asset('assets/images/blog').'/'.$name;

                    if($blog->save() && $blogImage->move($destinationPath, $name)){
                        $logs = new Logs;
                        $logs->log = 'Admin Added Blog';
                        $logs->date = now();
                        $logs->save();
                        $msg = ['Blog Added successfully !', "", "success"];
                    }else{
                        $msg = ['There was a problem Adding the Blog.', "", "error"];
                    }
                }else{
                    if($blog->save()){
                        $logs = new Logs;
                        $logs->log = 'Admin Added Blog';
                        $logs->date = now();
                        $logs->save();
                        $msg = ['Blog Added successfully !', "", "success"];
                    }else{
                        $msg = ['There was a problem Adding the Blog.', "", "error"];
                    }
                }

                return redirect('/Admins/Blog')->with(['msg' => $msg]);

            }else if($request['del']){

                $blog = Blogs::where('postID', $request['del'])->first();
                
                if($blog->delete()){
                    $logs = new Logs;
                    $logs->log = 'Admin Deleted Blog';
                    $logs->date = now();
                    $logs->save();
                    $msg = ['Deleted Successfully!', "", "success"];
                }else{
                    $msg = ['Some Problem Occurs!', "Please Try Again...", "error"];
                }

                return redirect('/Admins/Blog')->with(['msg' => $msg]);
            }

            
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

    public function blogedit($id)
    {  
        if($id != 0){
            $bmanage = 'edit' ;
            $dblog = Blogs::where('postID', $id)->first();
            return view('admin.blog',['dblog' => $dblog, 'bmanage' => $bmanage]);
        }else if($id == 0){
            $bmanage = 'add' ;
            return view('admin.blog',['bmanage' => $bmanage]);
        }
    }

    public function logosetting()
    {
        return view('admin.logosetting');
    }

    public function setlogosetting(Request $request)
    {
        
        if ($request->hasFile('bgimg') || $request->hasFile('bgimg2')) {
            $msg1 =['','','success']; $msg2=['','','success'];
            if($request->hasFile('bgimg')){
                $this->validate($request, [
                    'bgimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $logo = $request->file('bgimg');

                $name = 'logo'.'.'.$logo->getClientOriginalExtension();
                $destinationPath = public_path('assets/images');

                if($logo->move($destinationPath, $name)){
                    $logs = new Logs;
                    $logs->log = 'Admin Uploaded New LOGO';
                    $logs->date = now();
                    $logs->save();
                    $msg1 = ['LOGO Uploaded successfully !', "", "success"];
                }else{
                    $msg1 = ['There was a problem uploading the logo.', "", "error"];
                }
            }
            if($request->hasFile('bgimg2')){
                $this->validate($request, [
                    'bgimg2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $favicon = $request->file('bgimg2');

                $name = 'favicon'.'.'.$favicon->getClientOriginalExtension();
                $destinationPath = public_path('assets/images');

                if($favicon->move($destinationPath, $name)){
                    $logs = new Logs;
                    $logs->log = 'Admin Uploaded new favicon';
                    $logs->date = now();
                    $logs->save();
                    $msg2 = ['FavIcon Uploaded successfully !', "", "success"];
                }else{
                    $msg2 = ['There was a problem uploading the FavIcon.', "", "error"];
                }
            }
            
        }

        return redirect('/Admins/LogoSetting')->with(['msg1' => $msg1, 'msg2' => $msg2]);
    }

    public function affilatebonus()
    {
        $daffilatebonus = AffilateBonus::all();
        return view('admin.affilatebonus',['daffilatebonus' => $daffilatebonus]);
    }

    public function setaffilatebonus(Request $request)
    {
        if($request){
            if($request['type']=='edit'){

                $id = $request["id"];

                $bonus = $request["bonus"];

                $affilatebonus = AffilateBonus::where('id',$id)->first();

                $affilatebonus->percentage = $bonus;
                if($affilatebonus->save()){
                    $logs = new Logs;
                    $logs->log = 'Admin Editted AffilateBonus';
                    $logs->date = now();
                    $logs->save();
                    $msg = ['Updated Successfully!', "", "success"];
                }else{
                    $msg = ['Some Problem Occurs!', "Please Try Again...", "error"];
                }

                return redirect('/Admins/AffilateBonus')->with(['msg' => $msg]);

            }else if($request['type']=='add'){
                $level = $request["level"];
                $bonus = $request["bonus"];

                $AffilateBonus = new AffilateBonus;
                $AffilateBonus->level = $level;
                $AffilateBonus->percentage = $bonus;

                if($AffilateBonus->save()){
                    $logs = new Logs;
                    $logs->log = 'Admin Added AffilateBonus';
                    $logs->date = now();
                    $logs->save();
                    $msg = ['Added Successfully!', "", "success"];
                }else{
                    $msg = ['Some Problem Occurs!', "Please Try Again...", "error"];
                }

                return redirect('/Admins/AffilateBonus')->with(['msg' => $msg]);
            }
        }

        if(isset($request['delete'])){
            $id = $request['delete'];
            $AffilateBonus = AffilateBonus::where('id', $id)->first();

            if($AffilateBonus->delete()){
                $logs = new Logs;
                $logs->log = 'Admin Deleted AffilateBonus';
                $logs->date = now();
                $logs->save();
                echo "Deleted Successfully";
            }else{
                echo "Some Problem Occurs!";
            }
        }        
    }

    public function modalsetting()
    {
        $dgeneral_setting = General_setting::find(1);
        return view('admin.modalsetting',['dgeneral_setting' => $dgeneral_setting]);
    }

    public function setmodalsetting(Request $request)
    {
        if($request){
            $general_setting = General_setting::find(1);
            $general_setting->modal_title = $request['title'];
            $general_setting->modal_content = $request['content'];
            $general_setting->modal_status = $request['status']==1?1:0;
            if($general_setting->save()){
                $logs = new Logs;
                $logs->log = 'Admin Modal Settings';
                $logs->date = now();
                $logs->save();
                $msg = ['Modal Settings updated successfully !', "", "success"];
            }else{
                $msg = ['There was a problem updating the Modal Settings.', "", "error"];
            }
        }

        return redirect('/Admins/ModalSetting')->with(['msg' => $msg]);
    }
}
