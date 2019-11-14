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


</style>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 reset-form">
            <div class="card">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
