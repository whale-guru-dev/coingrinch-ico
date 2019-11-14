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

    .reset-form{
        z-index: 1000;
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
        color: #000 !important;
    }


</style>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 reset-form">
            <div class="card">
                <div class="card-header">Forgot your password?</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
 
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>

                        <div class="account-extras">
                            <p>
                                Don't have an account yet?
                                <strong><a href="{{ route('register') }}">Register</a></strong>
                            </p>
                            <p>
                                Already have an account?
                                <strong><a href="{{ route('login') }}">Log In</a></strong>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
