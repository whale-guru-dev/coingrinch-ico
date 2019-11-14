 @extends('layouts.customer')

@section('additional_css')

<style type="text/css">
    body{
        background-color: #0667d0;
    }

    .navbar-laravel{
        background-color: #0667d0;  
    }

    .navbar-laravel a{
        color:white !important;
    }

    .header{
        margin-bottom: 40px;
        height: 34px;
        font-size: 30px;
        font-weight: 400;
        line-height: 1.13;
        text-align: center;
        color: #ffffff;
    }

    .justify-content-center{
        max-width: 70%;
        margin: 40px auto;
    }

    .log-form{
        z-index: 1000;
    }

    .checkbox{
        float: left;
    }

    #login{
        float: right;
    }

    .card{
        background: #ffffff;
        -webkit-box-shadow: 0px 1px 46px 4px rgba(0,0,0,0.28);
        box-shadow: 0px 1px 46px 4px rgba(0,0,0,0.28);
        border-radius: 4px;
    }
    
    .card-body{
        padding: 32px 24px
    }

    .account-extras{
        text-align: center;
        padding: 30px 0 0;
        font-size: 13px;
    }

    .account-extras a{
        font-size: 15px;
        color: #ffffff !important;
    }

    .modal{
        top:30%;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #0667d0;
        color: white;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
    }


/*    .modal-body {padding: 2px 16px;}*/


    .modal-footer {
        padding: 2px 16px;
        background-color: #0667d0;
        color: white;
    }



 
/*    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        animation-name: animatetop;
        animation-duration: 0.4s
    }


    @keyframes animatetop {
        from {top: -300px; opacity: 0}
        to {top: 0; opacity: 1}
    }*/

    .box___LHA_k {
        width: 480px;
        margin: 0 auto;
        padding: 24px 48px;
        background: #fff;
        border-radius: 3px;
        -webkit-box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .box___LHA_k .title___3JWCl {
        text-align: center;
        font-size: 19px;
        font-weight: bold;
        margin-bottom: 24px;
        padding-top: 16px;
    }

    .mb-24 {
        margin-bottom: 24px;
    }

    .ant-checkbox-group {
        font-size: 14px;
    }

    .mt-30 {
        margin-top: 30px;
    }
    .font-weight {
        font-weight: bold;
    }

    .mt-16 {
        margin-top: 16px;
    }

    .mb-12 {
        margin-bottom: 12px;
    }

    .ant-checkbox-wrapper:not(:last-child) {
        margin-right: 8px;
    }
    .ant-checkbox-wrapper {
        cursor: pointer;
        font-size: 14px;
        display: inline-block;
    }

    .ant-checkbox {
        white-space: nowrap;
        cursor: pointer;
        outline: none;
        display: inline-block;
        line-height: 1;
        position: relative;
        vertical-align: text-bottom;
    }

    .ant-checkbox-input {
        position: absolute;
        left: 0;
        z-index: 1;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        top: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    .ant-checkbox-inner {
        position: relative;
        top: 0;
        left: 0;
        display: block;
        width: 14px;
        height: 14px;
        border: 1px solid #d9d9d9;
        border-radius: 2px;
        background-color: #fff;
        -webkit-transition: all .3s;
        -o-transition: all .3s;
        transition: all .3s;
    }

    .ant-checkbox-inner:after {
        -webkit-transform: rotate(45deg) scale(0);
        -ms-transform: rotate(45deg) scale(0);
        transform: rotate(45deg) scale(0);
        position: absolute;
        left: 4px;
        top: 1px;
        display: table;
        width: 5px;
        height: 8px;
        border: 2px solid #fff;
        border-top: 0;
        border-left: 0;
        content: ' ';
        -webkit-transition: all 0.1s cubic-bezier(0.71, -0.46, 0.88, 0.6);
        -o-transition: all 0.1s cubic-bezier(0.71, -0.46, 0.88, 0.6);
        transition: all 0.1s cubic-bezier(0.71, -0.46, 0.88, 0.6);
    }

    .ml-24 {
        margin-left: 24px;
    }

    .mr-6 {
        margin-right: 6px;
    }

    .sslImg___128UO {
        display: inline-block;
        vertical-align: middle;
        height: 28px;
    }

    .mt-16 {
        margin-top: 16px;
    }

    .ant-btn-primary.disabled.ant-btn, .ant-btn-primary[disabled].ant-btn, .ant-btn-primary.disabled:hover.ant-btn, .ant-btn-primary[disabled]:hover.ant-btn, .ant-btn-primary.disabled:focus.ant-btn, .ant-btn-primary[disabled]:focus.ant-btn, .ant-btn-primary.disabled:active.ant-btn, .ant-btn-primary[disabled]:active.ant-btn, .ant-btn-primary.disabled.active.ant-btn, .ant-btn-primary[disabled].active.ant-btn {
        color: #fff;
        border-color: #73b6f6;
        background-color: #73b6f6;
    }

    .pull-left {
        float: left;
    }

    .full-width {
        width: 100%;
    }

    .ant-checkbox-checked .ant-checkbox-inner, .ant-checkbox-indeterminate .ant-checkbox-inner {
        background-color: #0e75ee;
        border-color: #0e75ee;
    }

    .ant-checkbox-inner {
        position: relative;
        top: 0;
        left: 0;
        display: block;
        width: 14px;
        height: 14px;
        border: 1px solid #d9d9d9;
        border-radius: 2px;
        background-color: #fff;
        -webkit-transition: all .3s;
        -o-transition: all .3s;
        transition: all .3s;
    }

    .ant-btn-primary {
        color: #fff;
        background-color: #0e75ee;
        border-color: #0e75ee;
    }   

    input[type="checkbox"]:focus {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }
    input[type="checkbox"] {
        line-height: normal;
    }
    .ant-checkbox-input {
        position: absolute;
        left: 0;
        z-index: 1;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        top: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    .ant-checkbox-checked:after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 2px;
        border: 1px solid #0e75ee;
        content: '';
        -webkit-animation: antCheckboxEffect 0.36s ease-in-out;
        animation: antCheckboxEffect 0.36s ease-in-out;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        visibility: hidden;
    }

    .container-check {
        display: block;
        position: relative;
        padding-left: 24px;
        margin-bottom: 12px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container-check input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 12px;
        width: 12px;
        background-color: #fff;
        border: 1px solid #d9d9d9;
    }

    /* On mouse-over, add a grey background color */
    .container-check:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container-check input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container-check input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container-check .checkmark:after {
        left: 4px;
        top: 0px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

</style>

@endsection

@section('content')
<?php
    $error = Session::get('error');
?>
<div id="google2fa" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            
            <form id="xax" method="post" action="{{url('/Google2fa')}}">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h2 class="modal-title">Google Authenticator Verification</h2>
                </div>
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>Please input your one-time code given by Google Authenticator below.</p>
                    <input name="fauth" class="form-control" type="text">
                    <input name="email" type="hidden"  value="{{Session::get('email')}}">
                    <input name="password" type="hidden"  value="{{Session::get('password')}}">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-default" type="submit" >Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 log-form" id="form1">
            
            <div class="box___LHA_k" style="width: 100%;">
                <div class="title___3JWCl">Please ensure that you meet the following conditions for login / registration</div>
                <div class="mb-24">
                    <div>
                        <div class="ant-checkbox-group" id="checkbox-group">

                            <div class="mb-12">
                                <label class="container-check">Please confirm the URL https://coingrinch.com
                                  <input type="checkbox" name="confirm1" id="confirm1" class="ant-checkbox-input">
                                  <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="mb-12">
                                <label class="container-check"><span>Comply with the laws and regulations of anti money laundering of your countries and accept the review of digital assets under the necessary circumstances.</span>
                                  <input type="checkbox" name="confirm2" id="confirm2" class="ant-checkbox-input">
                                  <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="mb-12">
                                <label class="container-check"><span>With more than two years of experiences in securities, funds, futures, gold and foreign exchange.</span>
                                  <input type="checkbox" name="confirm3" id="confirm3" class="ant-checkbox-input">
                                  <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="mb-12">
                                <label class="container-check"><span>Official age over 18 years old.</span>
                                  <input type="checkbox" name="confirm4" id="confirm4" class="ant-checkbox-input">
                                  <span class="checkmark"></span>
                                </label>
                            </div>

                        </div>

                        <div class="mt-30 font-weight">
                            <label class="container-check"><span>I confirm that I fully meet the above conditions, clearly understand all the existing risks, and voluntarily undertake all the corresponding consequences.</span>
                              <input type="checkbox" name="confirm5" id="confirm5" class="ant-checkbox-input">
                              <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="mt-16">
                            <button disabled="" type="button" id="confirm-btn" class="ant-btn full-width ant-btn-primary ant-btn-lg">
                                <span>Confirm</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-md-8 log-form" style="display: none;"  id="form2">
            <h2 class="header text-center" style="color:white;">Sign in to Grinch</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        @if($error == 3)
                            <div class="alert alert-danger">
                              <strong>Your Account is Currently Blocked From Login !</strong> 
                            </div>
                        @elseif($error == 1)
                            <div class="alert alert-danger">
                              <strong>Wrong Captcha !</strong> 
                            </div>
                        @elseif($error == 2)
                            <div class="alert alert-danger">
                              <strong>Wrong authenticator one-time code !</strong> 
                            </div>
                        @elseif($error == 4)
                            <div class="alert alert-danger">
                              <strong>Captcha not completed !</strong> 
                            </div>
                        @endif
                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="g-recaptcha" data-theme="dark" data-sitekey="{{env('RE_CAP_SITE')}}"></div>

                        <div class="form-group clearfix">
                            <input type="submit" id="login"  value="Log In" class="btn btn-primary pull-right"  data-disable-with="Signing in...">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
  
                    </form>
                </div>
            </div>
            <div class="account-extras">
                <p>
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                    · <a href="{{ route('register') }}">Don't have an account? Sign Up</a> <br>
                </p>
            </div>
        </div>
    </div>
    
</div>


@endsection

@section('additional_js')
<script src='https://www.google.com/recaptcha/api.js'></script>

@if(Session::get('google2fa')==1)
    <script>$('#google2fa').modal('show');</script>
@endif
@if(old('email') || $error != 0)
<script type="text/javascript">
console.log("testing");
$("#form1").css("display","none");
$("#form2").css("display","block");
</script>
@endif
<script type="text/javascript">
    $(function(){
        $("input[name='confirm5']").change(function() {
            if($("input[name='confirm5']").is(':checked')){

                $("input[name='confirm1']").prop('checked', true);
                $("input[name='confirm2']").prop('checked', true);
                $("input[name='confirm3']").prop('checked', true);
                $("input[name='confirm4']").prop('checked', true);

                $("#confirm-btn").prop( "disabled", false );
            }else{
                $("input[name='confirm1']").prop('checked', false);
                $("input[name='confirm2']").prop('checked', false);
                $("input[name='confirm3']").prop('checked', false);
                $("input[name='confirm4']").prop('checked', false);
                $("#confirm-btn").prop( "disabled", true );
            }
        });

        $(':checkbox').change(function() {

            if(($("input[name='confirm1']").is(':checked'))&&($("input[name='confirm2']").is(':checked'))&&($("input[name='confirm3']").is(':checked'))&&($("input[name='confirm4']").is(':checked'))){
                console.log("all")
                $("#confirm-btn").prop( "disabled", false );
                $("input[name='confirm5']").prop('checked', true)
            }else{
                $("#confirm-btn").prop( "disabled", true );
                $("input[name='confirm5']").prop('checked', false)
            }
        }); 

        $( "#confirm-btn" ).click(function() {
            $("#form1").css("display","none");
            $("#form2").css("display","block");
            var width = $('.g-recaptcha').parent().width();
            if (width < 302) {
                var scale = width / 302;
                $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('transform-origin', '0 0');
                $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
            }
        });
    });

</script>

@endsection