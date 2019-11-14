<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <!--<meta name="author" content="Abir Khan - abirkhan75@gmail.com"/>-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">

    <title>{{'ADMIN' .' | '. config('app.name', 'Grinch') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="{{asset('admin/assets/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('admin/assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/bootstrap-modal-bs3patch.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/bootstrap-modal.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <script src="{{asset('admin/assets/js/sweetalert.js')}}"></script>
    <link rel="stylesheet" href="{{asset('admin/assets/css/sweetalert.css')}}">
    <script type="text/javascript" src="{{asset('assets/js/nicEdit.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        // bkLib.onDomLoaded(function () {
        //     new nicEditor({fullPanel: true}).panelInstance('shaons');
        // });
    </script>
    @yield('additional_css')
    <style type="text/css">
        .page-header.navbar .page-logo .logo-default {
            margin-top: 3px !important;
            /*filter: brightness(0) invert(1);*/
        }
    </style>

    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo">

        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="{{url('/Admins/')}}">
                        <img src="{{asset('assets/images/logo.png')}}" alt="logo" class="logo-default">
                    </a>
                    <div class="menu-toggler sidebar-toggler"></div>
                </div>

                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username"> ADMIN </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{url('/Admins/ChangeProfile')}}"><i class="fa fa-cog"></i> Change Profile</a>
                                </li>

                                <li>
                                    <a href="{{url('/Admins/Logout')}}"><i class="fa fa-sign-out"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="page-container">
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler"></div>
                        </li>
                        <li class="nav-item start">
                            <a href="{{url('/Admins/Dashboard')}}" class="nav-link ">
                                <i class="fa fa-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-bars"></i>
                                <span class="title">Website Control</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{url('/Admins/GeneralSetting')}}" class="nav-link">
                                        <i class="fa fa-cogs"></i> General Setting 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/EmailSetting')}}" class="nav-link">
                                        <i class="fa fa-envelope"></i> Email Setting 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/SMSSetting')}}" class="nav-link">
                                        <i class="fa fa-mobile"></i> SMS Setting
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/AffilateBonus')}}" class="nav-link">
                                        <i class="fa fa-get-pocket"></i> Affilate Bonus Setting
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/CalendarICO')}}" class="nav-link">
                                        <i class="fa fa-money"></i> ICO Calendar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/Invested')}}" class="nav-link">
                                        <i class="fa fa-money"></i> Invested Currencies 
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{url('/Admins/Blog')}}" class="nav-link">
                                        <i class="fa fa-id-card"></i> Blog Management 
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{url('/Admins/ModalSetting')}}" class="nav-link">
                                        <i class="fa fa-envelope"></i> Landing Page Modal Setting 
                                    </a>
                                </li>
                            
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-desktop"></i>
                                <span class="title">Interface Control</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">

                                <li class="nav-item">
                                    <a href="{{url('/Admins/LogoSetting')}}" class="nav-link">
                                        <i class="fa fa-cogs"></i> Logo+icon Setting
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-download"></i>
                                <span class="title">DEPOSIT/WITHDRAW LOGS</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">

                                <li class="nav-item">
                                    <a href="{{url('/Admins/CoinFund')}}" class="nav-link">
                                        <i class="fa fa-desktop"></i> Deposit/Withdraw Log
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{url('/Admins/CoinFundWithdraw')}}" class="nav-link">
                                        <i class="fa fa-desktop"></i> Withdraw Log
                                    </a>
                                </li>
                                
                                <!--   -->

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-gg-circle"></i>
                                <span class="title">Token Control</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">

                                <li class="nav-item">
                                    <a href="{{url('/Admins/TokenControl')}}" class="nav-link">
                                        <i class="fa fa-play"></i> Token management
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{url('/Admins/TokenHolders')}}" class="nav-link">
                                        <i class="fa fa-grav"></i> Token Holders
                                    </a>
                                </li>
                                

                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{url('/Admins/TokenLogs')}}" class="nav-link">
                                <i class="fa fa-desktop"></i> +/- Virtual TOKEN LOGS
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span class="title"> Token Management</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="{{url('/Admins/TokenTransfer')}}" class="nav-link">
                                        <i class="fa fa-rocket" aria-hidden="true"></i> Token Transfer
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/TokenHolders')}}" class="nav-link">
                                        <i class="fa fa-user-secret" aria-hidden="true"></i> Token Holders
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                          

                        <li class="nav-item">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">Users Management</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <!-- <li class="nav-item">
                                    <a href="{{url('/Admins/Staffs')}}" class="nav-link">
                                        <i class="fa fa-desktop"></i> Staff
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="{{url('/Admins/AllUsers')}}" class="nav-link">
                                        <i class="fa fa-desktop"></i> All Users
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{url('/Admins/NewsLetter')}}" class="nav-link">
                                        <i class="fa fa-desktop"></i> Newsletter subscribers
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="{{url('/Admins/BannedUsers')}}" class="nav-link">
                                        <i class="fa fa-times"></i> Banned Users
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/MobileUnverifiedUsers')}}" class="nav-link">
                                        <i class="fa fa-mobile"></i> Mobile Unverified
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/VerifiedUsers')}}" class="nav-link">
                                        <i class="fa fa-check"></i> Verified Users
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/EmailUnverifiedUsers')}}" class="nav-link">
                                        <i class="fa fa-envelope"></i> Email Unverified
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/Admins/KYCUnverifiedUsers')}}" class="nav-link">
                                        <i class="fa fa-envelope"></i> KYC Unverified
                                    </a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="{{url('/Admins/SendMessage')}}" class="nav-link">
                                        <i class="fa fa-envelope"></i> Sending Message
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            @yield('content')

        </div>

        <div class="page-footer">
            <div class="page-footer-inner"> {{date("Y")}} &copy; Grinch</div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>

        <!-- JavaScripts -->
        
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/app.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/datatable.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/datatables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/table-datatables-buttons.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/bootstrap-modalmanager.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/bootstrap-modal.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/assets/js/bootstrap-toggle.min.js')}}"></script>
        @yield('additional_vendor_js')
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        @yield('additional_js')
    </body>
</html>