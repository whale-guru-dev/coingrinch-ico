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

</style>

@endsection

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="header text-center" style="color:white;">Verify mobile number</h2>
            <div class="card card-class">
                
                <div class="card-body card-body-class">
                    <div class="form-group">
                        <form method="POST" action="{{ route('VerifyMobile') }}">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="card-header">
                                    <div class="caption">
                                    <i class="fa fa-check"></i> VERIFY NOW </div>
                                </div>

                                <div class="card-body">
                                    <strong class="uppercase text-center">INPUT THE CODE TO VERIFY YOUR ACCOUNT</strong>                                   
                                    <br><br><input type="text" class="form-control input-lg"  name="code" placeholder="CODE" required><br>
                                    <input type="hidden" name="verify" value="1">
                                    <button type="submit" class="btn btn-success btn-block btn-lg">VERIFY ME</button><br>

                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="form-group">
                        <form method="POST" action="{{ route('ResendVerifyMobile') }}">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="card-header">
                                    <div class="caption uppercase">
                                    <i class="fa fa-repeat"></i> Request The Code </div>
                                </div>

                                <div class="card-body">
                                  
                                    <form action="" method="post">
                                    <strong class="uppercase text-center">Your Mobile Number</strong>
                                    <br><br><input type="text" disabled class="form-control input-lg"  value="{{Auth::user()->mobile}}" placeholder="Your Mobile Number"><br>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">RE-SEND CODE TO ABOVE Mobile Number</button><br>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

