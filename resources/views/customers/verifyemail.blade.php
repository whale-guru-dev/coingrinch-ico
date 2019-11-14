@extends('layouts.verify')

@section('additional_css')
<link href="{{asset('customer/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

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

    .checkbox{
        float: left;
    }

    #login{
        float: right;
    }

    .card {
        border-radius: 25px;
    }

    .card-class{
        background: #ffffff;
        -webkit-box-shadow: 0px 1px 46px 4px rgba(0,0,0,0.28);
        box-shadow: 0px 1px 46px 4px rgba(0,0,0,0.28);
        border-radius: 4px;
    }
    
    .card-body-class{
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

    .uppercase{
      text-transform: uppercase;
    }

    .text-center p, h2 {
        font-family: serif;
    }

</style>

@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <h2 class="header text-center" style="color:white;">Verify your email</h2> -->
            <div class="card card-class">
                <div class="card-body card-body-class">
                    <div class="row">
                        <img src="{{asset('customer/assets/img/emailbox2.jpg')}}" class="img-circle" width="100px" height="100px" style="margin-left: auto;margin-right: auto;">
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" >
                            <h2 style="font-weight: bold;">Email Confirmation</h2>
                        </div>

                        <div class="col-md-12 text-center" >
                            <p style="text-align:justify">We have {{$msg}} email to <span style="color:#0667d0">{{Auth::user()->email}}</span> to confirm the validity of our system. After receiving the email follow the link provided to complete your registration</p>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>
                        
                        <div class="col-md-12 text-center" >
                            <p>If you not got any email in your box, then be sure to check your spam box or <a href="javascript:;" style="text-decoration: none;color:#0667d0" onclick="event.preventDefault();document.getElementById('resendemail-form').submit();">Resend Confirmation Email</a></p>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="col-md-12 text-center" >
                            <p>Having problems on the email address? You can try signup again by clicking  <a href="javascript:;" style="text-decoration: none;color:#0667d0" onclick="event.preventDefault();document.getElementById('closeaccount-form').submit();">THIS</a></p>
                        </div>
                    </div>
  
                    <form method="POST" action="{{ route('ResendVerifyEmail') }}" id="resendemail-form">
                        {{ csrf_field() }}
                    </form>

                    <form method="POST" action="{{ route('CloseAccount') }}" id="closeaccount-form">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

