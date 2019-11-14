<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<?php
$user = Auth::user();
?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">

        <title>{{ config('app.name', 'Grinch') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        @yield('additional_css')

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" style="margin-top: 4px !important;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <li>
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a class="nav-link btn" style="border: 2px solid #fff;" href="{{ route('register') }}">Register</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
            
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>

            @yield('additional_js')
    </body>
</html>