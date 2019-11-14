<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @guest
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">

        <title>{{ config('app.name', 'CoinGrinch') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        @yield('additional_css')
        <style type="text/css">
           /* #regBtn{
                border: 2px solid #fff;
            }

            #regBtn:hover{
                color: rgb(6, 103, 208);
                background: rgb(255, 255, 255) none repeat scroll 0% 0%;
            }*/
            #lgBtn:hover{
                color: grey !important;
            }

            #lgBtn{
                display: block;
                margin-left: 6px;
                padding: 10px 16px;
                font-weight: 500;
                cursor: pointer;
                border-radius: 4px;
                color: rgb(255, 255, 255);
                text-decoration: none;
                transition: all 150ms ease 0s;
                background-color: #0667d0;
            }

            #regBtn:hover {
                color: rgb(6, 103, 208) !important;
                background: rgb(255, 255, 255) none repeat scroll 0% 0%;
            }
            #regBtn {
                display: block;
                margin-left: 6px;
                padding: 10px 16px;
                font-weight: 500;
                cursor: pointer;
                border-radius: 4px;
                color: rgb(255, 255, 255);
                text-decoration: none;
                transition: all 150ms ease 0s;
                background-color: #0667d0;
            }

            .navbar-laravel {
                background-color: #ffffff;
                z-index: 1000;
            }

            #particles-js{
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1;
                width: 100%;
                height: 100%;
            }
            #particles-js.min-height{
                height: calc(100% );
            }
            #particles-js.min-height-snd{
                height: calc(100% );
            }

            #canvas-x-o {
                width: 100%;
                height: 100%;
                opacity: 0.25;
            }

        </style>
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
                                <a class="nav-link text-center" id="lgBtn" href="{{ route('login') }}" >Login</a>
                            </li>
                            <li >
                                <a class="nav-link text-center" id="regBtn" href="{{ route('register') }}">Register</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
            
            <main class="py-4">
                @yield('content')
                <div id="particles-js" class="min-height"></div>
            </main>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{asset('customer/custom/js/particles.js')}}"></script> 

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119433366-1"></script>
        <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());

         gtag('config', 'UA-119433366-1');
        </script>

            @yield('additional_js')
    </body>

    @else
    <?php
    $user = Auth::user();
    $general_setting = App\Models\General_setting::find(1);
    $cnoti = ($user->ether_addr==NULL) ? 1 :0;

    $cur = App\Models\General_setting::find(1)->cur;

    if(!App\Models\Sponsor_bonus::where('user_id',Auth::user()->id)->first()){
        $sponsor = new App\Models\Sponsor_bonus;
        $sponsor->user_id = Auth::user()->id;
        $sponsor->eth_bonus = 0;
        $sponsor->btc_bonus = 0;
        $sponsor->save();
    }

    $sponsor_bonus = App\Models\Sponsor_bonus::where('user_id', Auth::user()->id)->first();

    
    ?>

    <!-- start: HEAD -->
    <head>
        <title>{{ config('app.name', 'COINGRINCH') }}</title>
        <!-- start: META -->
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="Grinch Project" name="description" />
        <meta content="Jin Ji" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- end: META -->
        <!-- start: GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <!-- end: GOOGLE FONTS -->
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="{{asset('customer/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('customer/vendor/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('customer/vendor/themify-icons/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('customer/vendor/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{asset('customer/vendor/animate.css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('customer/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css')}}">
        <!-- <link rel="stylesheet" href="{{asset('customer/vendor/switchery/dist/switchery.min.css')}}"> -->
        <!-- <link rel="stylesheet" href="{{asset('customer/vendor/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css')}}"> -->
        <link rel="stylesheet" href="{{asset('customer/vendor/ladda/dist/ladda-themeless.min.css')}}">
        <link rel="stylesheet" href="{{asset('customer/vendor/slick.js/slick/slick.css')}}">
        <link rel="stylesheet" href="{{asset('customer/vendor/slick.js/slick/slick-theme.css')}}">
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        @yield('additional_vendor_css')
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: Packet CSS -->
        <link rel="stylesheet" href="{{asset('customer/custom/css/styles.css')}}">
        <link rel="stylesheet" href="{{asset('customer/custom/css/plugins.css')}}">
        <link rel="stylesheet" href="{{asset('customer/custom/css/themes/lyt2-theme-1.css')}}" >
        <!-- end: Packet CSS -->
        <link rel="stylesheet" href="{{asset('customer/custom/css/progress.css')}}">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">

        <style type="text/css">
            a.btn{
                border-radius: 10px !important;
            }

            #profileImage{
                border-radius: 10px !important;
            }

            input.btn {
                border-radius: 10px !important;
            }

            button {
                border-radius: 10px !important;
            }

            .btn:hover{
                background-color: #0093ffbd !important;
            }

            .navbar {
                z-index: 10000;
            }

            @media (min-width: 992px) {
                .main-navigation-menu {
                    display: inline-flex;
                }

                .sidebar {
                    width: 100% !important;
                    position: relative !important;
                    padding-top: 0px !important;
                    height: 60px;
                    /*height: 100%;*/
                }

                #sidebar > div nav{
                    padding-top: 0px !important;
                }

                #sidebar > div nav > ul {
                    padding: 0 0 0 0 !important;
                }

                .lyt-2 .main-content {
                    margin-left: 0px !important;
                }

                .main-content {
                    margin-left: 0px !important;
                }

                #sidebar {
                    background: #0685e2;
                }

                .sidebar-container {
                    width: 990px; 
                    margin-left: auto !important;
                    margin-right: auto !important;
                    box-shadow: none !important;
                    overflow: visible !important; 
                    z-index: 10000 !important;
                }

                .main-content .container-fluid > div.row {
                    width: 990px;
                    margin-left: auto;
                    margin-right: auto;
                }

                #sidebar > div nav > ul{
                    margin-bottom: 0px !important;
                }

                #sidebar:before {
                    background-color: #0685e2 !important;
                }

                .lyt-2 #sidebar > div nav > ul > li .item-media {
                    padding: 10px 0px !important;
                }

                ul.sub-menu li a { 
                    padding-left: 10px !important;
                }

                .item-content {
                  font-size: 16px;
                  align-items: center;
                  display: inline-table;
                }

                .main-navigation-menu{
                    margin-top:4px !important;
                }



                ul.sub-menu { /* level 2 */
                    display: none;
                    left: 0px;
                    position: absolute;
                    margin-top: 8px;
                    z-index: 9999;
                }

                ul.sub-menu ul.sub-menu { /* level 3+ */
                    margin-top: -1px;
                    padding-top: 0;
                    left: 149px;
                    top: 0px;
                }

                ul.sub-menu > li > a {
                    border: 1px solid #444;
                    border-top: none;
                    color: #bbb;
                    display: block;
                    font-size: 12px;
                    line-height: 15px;
                    padding: 10px 12px;
                }

                ul.sub-menu > li > a:hover {
                    color: #1a6ca9; 
                    /*color: #fff;*/
                }

                #main-menu li:hover > ul.sub-menu {
                    display: block; /* show the submenu */
                }

                .sidebar .breadcrumb-wrapper{
                    margin-top: -60px;
                    background: transparent !important;
                }

                .breadcrumb a {
                    color: white !important;
                }

            }

            .loader-new {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                background-color: #fff;
                z-index: 9999999;
            }

            .loader-inner {
                width: 100%;
                position: relative;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                text-align: center;
            }

          .modal-header{
            background-color:#008CFF;
          }

          .modal-header h3{
            color:white;
          }

          .modal-body {
            color: black;
          }

          .modal-body a {
            color:#008CFF;
          }

          .modal-body button {
            background-color: #008cff;
          }
        </style>
        
        @yield('additional_css')
    </head>
    <!-- end: HEAD -->
    <body>
        <!-- <div class="loader-new">
           <div class="loader-inner"><img src="{{asset('landing/img/loading.gif')}}" alt="loading..."></div>
        </div> -->


        <div id="app" class="lyt-2">
            <!-- sidebar -->
            <div class="sidebar app-aside" id="sidebar">
                <div class="sidebar-container">
                    <div>
                        <nav>
                            <!-- start: MAIN NAVIGATION MENU -->
                            <ul class="main-navigation-menu">
                                <li>
                                    <a href="{{url('/Customers/Dashboard')}}">
                                        <div class="item-content">
                                            <div class="item-media">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <div class="item-inner">
                                                <span class="title"> Dashboard </span>
                                            </div>
                                        </div> 
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('/Customers/BuyTokens')}}">
                                        <div class="item-content">
                                            <div class="item-media">
                                                <i class="fa fa-diamond"></i>
                                            </div>
                                            <div class="item-inner">
                                                <span class="title"> Buy Tokens </span>
                                            </div>
                                        </div> 
                                    </a>
                                </li>


                                <li>
                                    <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title"> Wallet </span> &nbsp;&nbsp; <i class="icon-arrow"></i>
                                        </div>
                                    </div> </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{url('/Customers/Wallet')}}"> <span class="title"> <i class="fa fa-exchange" aria-hidden="true"></i>  Deposit & Withdrawals </span> </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/Customers/WalletHistory')}}"> <span class="title"> <i class="fa fa-h-square" aria-hidden="true"></i>  Wallet History </span> </a>
                                        </li>
                                        @if($sponsor_bonus)
                                            
                                            <li>
                                                <a href="{{url('/Customers/Sponsorbonus')}}"> <span class="title"><i class="fa fa-money" aria-hidden="true"></i>  Sponsor Bonus </span> </a>
                                            </li>
                                            
                                        @endif
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="{{url('/Customers/Transactions')}}">
                                        <div class="item-content">
                                            <div class="item-media">
                                                <i class="fa fa-database"></i>
                                            </div>
                                            <div class="item-inner">
                                                <span class="title"> Transaction </span>
                                            </div>
                                        </div> 
                                    </a>
                                </li>


                                <li>
                                    <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="fa fa-paper-plane"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title"> Affilate </span> &nbsp;&nbsp; <i class="icon-arrow"></i>
                                        </div>
                                    </div> </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{url('/Customers/Referrals')}}"> <span class="title"><i class="fa fa-users" aria-hidden="true"></i>  My Followers </span> </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/Customers/Share')}}"> <span class="title"><i class="fa fa-share-alt-square" aria-hidden="true"></i>  Share </span> </a>
                                        </li>
                                        
                                    </ul>
                                </li>

                                <li>
                                    <a href="{{url('/Customers/Profile')}}">
                                        <div class="item-content">
                                            <div class="item-media">
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                            </div>
                                            <div class="item-inner">
                                                <span class="title"> Settings </span>
                                            </div>
                                        </div> 
                                    </a>
                                </li>

                            </ul>

                            
                        </nav>
                    </div>

                </div>
                @yield('breadcrumb')

            </div>
            <!-- / sidebar -->
            <div class="app-content">
                <!-- start: TOP NAVBAR -->
                <header class="navbar navbar-default navbar-static-top">
                    <!-- start: NAVBAR HEADER -->
                    <div class="navbar-header">
                        <button href="#" class="sidebar-mobile-toggler pull-left btn no-radius hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="{{url('/Customers/Dashboard')}}"> 
                            <img src="{{asset('assets/images/logo.png')}}" alt="Packet" style="margin-top: -7px !important;"/> 
                        </a>
                        <a class="navbar-brand navbar-brand-collapsed" href="{{url('/Customers/Dashboard')}}"> 
                            <img src="{{asset('assets/images/logo.png')}}" alt="" style="margin-top: -7px !important;"/> 
                        </a>

                        <button class="btn pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse" data-toggle-class="menu-open">
                            <i class="fa fa-folder closed-icon"></i>
                            <i class="fa fa-folder-open open-icon"></i>
                            <small> 
                                <i class="fa fa-caret-down margin-left-5"></i>
                            </small>
                        </button>
                    </div>
                    <!-- end: NAVBAR HEADER -->
                    
                    <!-- start: NAVBAR COLLAPSE -->
                    <div class="navbar-collapse collapse">

                        <ul class="nav navbar-right">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle coin-val">
                                    BTC:  <span id="btcxa" class="badge-coin bg-orange"></span> USD
                                </a>                 
                           </li>
                           <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle coin-val">
                                    ETH:  <span id="ethxa" class="badge-coin bg-blue-grey"></span> USD
                                </a>                   
                           </li>
                           <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle coin-val">
                                    {{$cur}}:  <span id="ldxxa" class="badge-coin bg-light-green">0.25</span> USD
                                </a>                   
                           </li>
                            <!-- start: MESSAGES DROPDOWN -->
                            <li class="dropdown">
                                <a href class="dropdown-toggle" data-toggle="dropdown"> <span class="badge" id="msgBadge">  </span> <i class="fa fa-envelope"></i> </a>
                                <ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large animated fadeInUpShort">
                                    <li>
                                        <span class="dropdown-header"> Unread messages</span>
                                    </li>
                                    <li>
                                        <div class="drop-down-wrapper ps-container">
                                            <ul id="newmsg-panel">
                                                
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="view-all">
                                        <a href="{{url('/Customers/Message')}}"> See All </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end: MESSAGES DROPDOWN -->
                            <!-- start: ACTIVITIES DROPDOWN -->
                            <li class="dropdown">
                                <a href class="dropdown-toggle" data-toggle="dropdown"> 
                                    <span class="badge" id="notiBadge">  </span>
                                    <i class="fa fa-bell"></i> 
                                </a>
                                @if($user->ether_addr==NULL)
                                <ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large animated fadeInUpShort">
                                    
                                    <li>
                                        <span class="dropdown-header"> You have new notifications</span>
                                    </li>
                                    <li>
                                        <div class="drop-down-wrapper ps-container">
                                            <div class="list-group no-margin">
                                                <a class="media list-group-item" data-target="#notificationEtherModal" data-toggle="modal"> 
                                                    <span class="media-body block no-margin"> About Ethereum wallet address
                                                    </span> 
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                                @endif
                            </li>
                            <!-- end: ACTIVITIES DROPDOWN -->
                            <!-- start: LANGUAGE SWITCHER -->
                            <li class="dropdown">
                                <a href class="dropdown-toggle" data-toggle="dropdown" class="profile-card-photo"> 
                                    <img alt="Avatar" src="{{asset('assets/propic/').'/'.$user->propic}}" class="img-circle" width="50px" height="50px">
                                    <span class="media-heading text-dark">{{$user->lname}}</span>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large animated fadeInUpShort">
                                    <li>
                                        <span class="dropdown-header"> My Account</span>
                                    </li>
                                    <li>
                                        <div class="drop-down-wrapper ps-container">
                                            <div class="list-group no-margin">
                                                <a class="media list-group-item" href="{{url('/Customers/Profile')}}"> 
                                                    <img class="img-circle" alt="..." src="{{asset('assets/propic/').'/'.$user->propic}}" width="50px" height="50px"> 
                                                    <span class="media-body block no-margin" style="font-size: 20px;"> {{$user->lname}}
                                                        <small class="block text-grey">{{$user->email}}</small> 
                                                    </span> 
                                                </a>
                                                <a class="media list-group-item" href="{{url('/Customers/Profile')}}"> 
                                                    <span class="media-body block no-margin"> Profile 
                                                    </span> 
                                                </a>
                                                <a class="media list-group-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"> 
                                                    <span class="media-body block no-margin"> Log out
                                                    </span> 
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </li>
                            <!-- end: LANGUAGE SWITCHER -->
                        </ul>
                        <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
                        <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                            <div class="arrow-left"></div>
                            <div class="arrow-right"></div>
                        </div>
                        <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
                    </div>
                    
                    <!-- end: NAVBAR COLLAPSE -->
                </header>
                <!-- end: TOP NAVBAR -->
                <div class="main-content" >
                   @yield('content')
                </div>
            </div>
            <!-- start: FOOTER -->
            <footer>
                <div class="footer-inner">
                    <div class="pull-left">
                        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> COINGRINCH</span>. <span>All rights reserved</span>
                    </div>
                    <div class="pull-right">
                        <span class="go-top"><i class="ti-angle-up"></i></span>
                    </div>
                </div>
            </footer>
            <!-- end: FOOTER -->
        </div>

        <!-- modal for ethereum wallet address -->
        <div id="notificationEtherModal"  tabindex="-1" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title uppercase">Notification</h3>
                  </div>
                  <div class="modal-body">
                      <center>
                       <p>You have to set your Ethereum wallet address on the profile settings for you to recieve your {{$cur}} Token</p>
                      </center>
            
                  </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        @yield('modal')
        <!-- start: MAIN JAVASCRIPTS -->
        <script src="{{asset('customer/vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('customer/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('customer/vendor/components-modernizr/modernizr.js')}}"></script>
        <script src="{{asset('customer/vendor/js-cookie/src/js.cookie.js')}}"></script>
        <script src="{{asset('customer/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>
        <!-- <script src="{{asset('customer/vendor/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script> -->
        <!-- <script src="{{asset('customer/vendor/switchery/dist/switchery.min.js')}}"></script> -->
        <!-- <script src="{{asset('customer/vendor/jquery.knobe/dist/jquery.knob.min.js')}}"></script> -->
        <!-- <script src="{{asset('customer/vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script> -->
        <script src="{{asset('customer/vendor/slick.js/slick/slick.min.js')}}"></script>
        <!-- <script src="{{asset('customer/vendor/jquery-numerator/jquery-numerator.js')}}"></script> -->
        <!-- <script src="{{asset('customer/vendor/ladda/dist/spin.min.js')}}"></script> -->
        <script src="{{asset('customer/vendor/ladda/dist/ladda.min.js')}}"></script>
        <script src="{{asset('customer/vendor/ladda/dist/ladda.jquery.min.js')}}"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        @yield('additional_vendor_js')
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: Packet JAVASCRIPTS -->
        <script src="{{asset('customer/custom/js/letter-icons.js')}}"></script>
        <script src="{{asset('customer/custom/js/main.js')}}"></script>
        <!-- end: Packet JAVASCRIPTS -->
        <!-- start: JavaScript Event Handlers for this page -->

        <script>
            // jQuery("#loading").show();
            jQuery(document).ready(function() {
                Main.init();
                // jQuery("#loader").hide();
            });


            // !function(t){"use strict";t(window).on("load",function(a){t(".loader-new").fadeOut("fast")})}(jQuery);

            
            setInterval(function () {
                $('#newmsg-panel').text('');
                $('#notiBadge').text({{$cnoti}});
                $.getJSON('{{url('/Customers/NewMsgCount')}}', function(data) {
                    // document.getElementById('btcxa').innerHTML = data['data']['amount'];
                    // pretbtc = data['data']['amount'];
                    
                    $('#msgBadge').text(data['count']);

                    for(var i=0;i<data['count'];i++){
                        var inner = "<li class='unread'>"
                                    +"<a href='javascript:;' class='unread'>"
                                        +"<div class='clearfix'>"
                                            +"<div class='thread-image'>"
                                               + "<img src='{{asset('assets/images/favicon.png')}}' style='width:40px;height:40px' alt=''>"
                                            +"</div>"
                                            +"<div class='thread-content'>"
                                                +"<span class='author'>"+data['msg'][i]['title']+"</span>"
                                                +"<span class='preview'>"+data['msg'][i]['content']+"</span>"
                                                +"<span class='time'>"+data['msg'][i]['date'] +"</span>"
                                           + "</div>"
                                       + "</div>" 
                                   + "</a>"
                              + "</li>";
                        $('#newmsg-panel').append(inner) ;
                    }

                });
            }, 5000);
			
            setInterval(function () {
                $.getJSON('https://api.coinbase.com/v2/prices/BTC-USD/spot', function(data) {
                    document.getElementById('btcxa').innerHTML = data['data']['amount'];
					g_btc_price = document.getElementById('btcxa').innerHTML = data['data']['amount'];

                });
                $.getJSON('https://api.coinbase.com/v2/prices/ETH-USD/spot', function(data) {
                    document.getElementById('ethxa').innerHTML = data['data']['amount'];
					g_eth_price = document.getElementById('ethxa').innerHTML = data['data']['amount'];
                });
				try{
					var tspanText = $('.highcharts-subtitle').children()[1].innerHTML;
					if(tspanText.lastIndexOf('BTC')>0){
						$('.highcharts-subtitle').children()[1].innerHTML = g_btc_price +" " + "USD/BTC";
					}
					if(tspanText.lastIndexOf('ETH')>0){
						$('.highcharts-subtitle').children()[1].innerHTML = g_eth_price +" " + "USD/ETH";
					}
				}catch(err){}
            }, 1000);
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119433366-1"></script>
        <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());

         gtag('config', 'UA-119433366-1');
        </script>
        @yield('additional_js')
        <!-- end: JavaScript Event Handlers for this page -->
    </body>

          
    @endguest
</html>
    


