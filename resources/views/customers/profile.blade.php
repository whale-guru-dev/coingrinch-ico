@extends('layouts.customer')

@section('additional_vendor_css')
<link rel="stylesheet" href="{{asset('customer/vendor/bootstrap-jasny/dist/css/jasny-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('customer/vendor/sweetalert/dist/sweetalert.css')}}">
<script src="{{asset('customer/vendor/sweetalert/dist/sweetalert.min.js')}}"></script>
<style type="text/css">
 #profile-pic .fileinput-preview{
    width: 100%;
    height: 100%;
  }
 #profile-pic  .fileinput-new{
    width: 100%;
    height: 100%;
  }
</style>
@endsection

@section('breadcrumb')
<div class="breadcrumb-wrapper">
  <ul class="pull-right breadcrumb">
    <li>
      <a href="{{url('/Customers')}}"><i class="fa fa-home margin-right-5 text-large text-white"></i>Home</a>
    </li>

    <li>
      <a href="{{url('/Customers/Profile')}}">Profile</a>
    </li>
  </ul>
</div>
@endsection

@section('content')
<?php
  $user = Auth::user();
  $ga = new PHPGangsta_GoogleAuthenticator;
  $qrcode_url =  $ga->getQRCodeGoogleUrl('Ginch', $user['google2f']);
  if(App\Models\Logins::orderBy('tm','DESC')->where('usid',$user->id)->first())
    $dlastlogin = App\Models\Logins::orderBy('tm','DESC')->where('usid',$user->id)->first()->tm;
  else $dlastlogin = null;
  $dlogin = App\Models\Logins::orderBy('tm','DESC')->where('usid',$user->id)->get();
?>

<div class="wrap-content container" id="container">
  <!-- start: BREADCRUMB -->
  
  <!-- end: BREADCRUMB -->
  <!-- start: USER PROFILE -->
  <div class="container-fluid container-fullw">
    <div class="row">
      <div class="col-md-12">

        <div class="tabbable">
          <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
            <li class="active">
              <a data-toggle="tab" href="#panel_overview"> Overview </a>
            </li>
            <li>
              <a data-toggle="tab" href="#panel_edit_account"> Edit Account </a>
            </li>
          </ul>
          <div class="tab-content">
            <div id="panel_overview" class="tab-pane fade in active">
              <div class="row">
                <div class="col-sm-5 col-md-4">
                  <div class="user-left">
                    <div class="center">
                      <h4>{{$user->lname}}</h4>
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="user-image">
                          <div class="fileinput-new thumbnail"><img src="{{asset('assets/propic/').'/'.$user->propic}}"  width="150px" height="150px" alt="">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          
                        </div>
                      </div>
                      
                      <hr>
                    </div>
                    <table class="table table-condensed">
                      <thead>
                        <tr>
                          <th colspan="3">Contact Information</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>email:</td>
                          <td><a href=""> {{$user->email}} </a></td>
                          <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                        </tr>
                        <tr>
                          <td>phone:</td>
                          <td>{{$user->mobile}}</td>
                          <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="3">General information</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Name</td>
                          <td>{{$user->lname}}</td>
                          <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                        </tr>
                        <tr>
                          <td>Last Logged In</td>
                          <td>{{$dlastlogin}}</td>
                          <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                        </tr>
                        <tr>
                          <td>Country</td>
                          <td>{{$user->location}}</td>
                          <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                        </tr>
                        <tr>
                          <td>Gender</td>
                          <td>{{$user->gender}}</td>
                          <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td><span class="label label-sm label-info">Verified</span></td>
                          <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
                <div class="col-sm-7 col-md-8">
                  <div class="panel panel-white" id="activities">
                    <div class="panel-heading border-light">
                      <h4 class="panel-title text-primary">Recent Activities</h4>
                      <paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
                    </div>
                    <div collapse="activities" ng-init="activities=false" class="panel-wrapper">
                      <div class="panel-body">
                        <ul class="timeline-xs">
                          @foreach($dlogin as $login)
                          <li class="timeline-item success">
                            <div class="margin-left-15">
                              <div class="text-muted text-small">
                                {{$login->tm}}
                              </div>
                              <p>
                                <a class="text-info" href> {{$login->ip}} </a>
                                {{$login->location.' '.$login->ua}}
                              </p>
                            </div>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="panel_edit_account" class="tab-pane fade">
              
              <fieldset>
                <legend>
                  Account Info
                </legend>
                <div class="row">
                  
                  <div class="col-md-6">
                    <form action="#" role="form" id="form">
                      <div class="form-group">
                        <label class="control-label"> User Name </label>
                        <input type="text" placeholder="First Name" class="form-control" id="username" name="username" value="{{$user->uname}}" readonly>
                      </div>
                      <div class="form-group">
                        <label class="control-label"> Full Name </label>
                        <input type="text" placeholder="Full Name" class="form-control" id="legalname" name="legalname" value="{{$user->lname}}" readonly>
                      </div>
                      <div class="form-group">
                        <label class="control-label"> Email Address </label>
                        <input type="email" placeholder="test@example.com" class="form-control" id="email" name="email" value="{{$user->email}}"  readonly>
                      </div>
                      <div class="form-group">
                        <label class="control-label"> Phone </label>
                        <input type="email" placeholder="(641)-734-4763" class="form-control" id="phone" name="phone" value="{{$user->mobile}}"  readonly>
                      </div>
                      <div class="form-group">
                        <label class="control-label">2-Factor Authentication</label>
                        <button type="button" data-toggle="modal" data-target="#2factor" class="btn btn-primary">{{$user['g2fauth']==0 ? 'Enable' : 'Disable'}}</button>
                      </div>
                    </form>
                    <form  method="post" action="{{url('/Customers/ChangePassword')}}" class="form-horizontal">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label"> Password </label>
                        <input type="password" placeholder="password" class="form-control" name="password" id="password">
                      </div>
                      <div class="form-group">
                        <label class="control-label"> Confirm Password </label>
                        <input type="password"  placeholder="password" class="form-control" id="password_again" name="password_confirmation">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label"> Gender </label>
                      <div class="clip-radio radio-primary">
                        <?php 
                          $gender_male='';$gender_female='';
                          ($user->gender == 'male')?$gender_male = 'checked':'' ;
                          ($user->gender == 'female')?$gender_female = 'checked':'' ; 
                        ?>
                        <input type="radio" value="female" name="gender" id="us-female" {{$gender_female}}>
                        <label for="us-female"> Female </label>
                        <input type="radio" value="male" name="gender" id="us-male" {{$gender_male}}>
                        <label for="us-male"> Male </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <form action="{{url('/Customers/SetEthAddr')}}" method='post' class="form-horizontal">
                        {{ csrf_field() }}
                        <label class="control-label"> Ether Wallet Address </label>
                        <div class="clip-radio radio-primary">
                          <input type="text" name="ether_wallet" class="form-control" value="{{$user->ether_addr}}">
                        </div>
                        <div class="form-group">
                          <div class="col-sm-9 col-sm-offset-3">
                            <input type='submit' name="ether_post" value='Save' class="btn btn-primary">
                          </div>
                        </div>
                      </form>
                    </div>
                    <form action="{{url('/Customers/ProfileImage')}}" method='post' enctype="multipart/form-data" id="profile-pic">
                          {{ csrf_field() }}
                      <div class="form-group">
                        
                        <label> Image Upload </label>

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail"><img src="{{asset('assets/propic/').'/'.$user->propic}}"  width="150px" height="150px" alt="">
                          </div>
                          
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          
                          <div class="user-edit-image-buttons">
                            <span class="btn btn-azure btn-file">
                              <span class="fileinput-new">
                                <i class="fa fa-picture"></i> Select image
                              </span>
                              <span class="fileinput-exists">
                                <i class="fa fa-picture"></i> Change
                              </span>
                              <input type="file" name="profileImage" id="profileImage">
                            </span>
                            <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput"> <i class="fa fa-times"></i> Remove </a>
                            <input type='submit' name='photo_submit' value='Profile Photo Upload' class="btn btn-primary">
                          </div>
                        </div>
                        
                      </div>
                    </form>
                  </div>
                </div>
              </fieldset>
                

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end: USER PROFILE -->
</div>



@endsection

@section('modal')
<div id="2factor" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Google Authentication</h3>
      </div>
      <div style="color:white;" class="modal-body">

        <div class="form-group text-center">
          <img src="{{$qrcode_url}}" />
        </div>

        <h5>Authenticator Secret Code:  <strong class="text-success">{{ $user->google2f }}</strong></h5>

        <ul style="color: black;">
          <li><p>Install Google 2Factor Authenticator app on your mobile device.</p></li>
          <li><p>Scan QR code with the authenticator.</p></li>
          <li><p>Do not share it with anyone. Be aware of phishing scams. We will never ask you for this key.</p></li>
        </ul>

        <b style="color: black;">Enter the 2-step verification code provided by your authentication app.</b>
        <div style="margin-top:15px;">
          <form method="post" id="cax" action="{{url('/Customers/SetGoogle2fa')}}" role="form">
            {{ csrf_field() }}
            @if($user['g2fauth']==1)
              <input type="hidden" name="disablex" value="y">
            @endif
            
            <div class="form-group">
              <input type="text" class="new-look form-control" name="auth-sec" id="auth-sec">
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-lg"  id="btn-enable-authy">
                {{$user['g2fauth']== 0? 'Enable' : 'Disable'}}
              </button>
            </div>
            
          </form>
        </div>

        
      </div>
    </div>
  </div>
</div>
@endsection

@section('additional_vendor_js')
<script src="{{asset('customer/vendor/bootstrap-jasny/dist/js/jasny-bootstrap.min.js')}}"></script>
@endsection

@section('additional_js')
@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif

@if(Session::get('errors'))
<script>
swal({title: "{{$errors->first('password')}}",text: "" , type: "error",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endsection

