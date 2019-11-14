<?php
use App\Models\General_setting;
$title = General_setting::find(1)->sitetitle;
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="" name="description"/>
		<!--<meta name="author" content="Abir Khan - abirkhan75@gmail.com"/>-->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{'ADMIN' .' | '. $title }}</title>
		<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">


		<link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin/assets/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
		<link href="{{asset('admin/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin/assets/css/login.min.css')}}" rel="stylesheet" type="text/css" />

		<style>
		    
			.abir{
				display: fixed;
				z-index: 299;
				position: absolute;
				width: 85%;
				color: #FFF;
				background-color: #26a1ab;
				border-color: #26a1ab;
			}

			.slow-spin {
				-webkit-animation: fa-spin 2s infinite linear;
				animation: fa-spin 2s infinite linear;
			}
		</style>

	</head>



	<body class="login">


		<div class="menu-toggler sidebar-toggler"></div>
			<div class="logo">
				<a href="#">
					<img src="{{asset('assets/images/logo.png')}}" alt="X"  />
				</a>
			</div>

		<div class="content">

			<form id="login-form" name="login-form" class="nobottommargin" action="{{ route('Admins.Login') }}" method="post">
				{{ csrf_field() }}
				<h3 class="form-title font-green uppercase">Sign In</h3>

				<div class="form-group">
					<input name="username" class="form-control input-lg {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username" type="text" value="{{ old('username') }}" required autofocus>
					@if ($errors->has('username'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
				</div>

				<div class="form-group">
					<input name="password" class="form-control input-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" type="password" required autofocus>
					@if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
				</div>

				<div class="form-actions">
					<div id="working"></div>
					<button class="btn green uppercase btn-block" id="login-form-submit" name="login-form-submit" data-disable-with="Signing in...">Login</button>
				</div>

				<div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

			</form>

			<div id="error">
			</div>

		</div>
		<div class="copyright"> <?php echo date("Y"); ?> © {{$title}} </div>

		<script src="{{asset('admin/assets/js/jquery.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('admin/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('admin/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>

	</body>

</html>