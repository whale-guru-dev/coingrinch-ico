@extends('layouts.admin')

@section('content')
<?php
$cur = App\Models\General_setting::find(1)->cur;
?>
    <div class="page-content-wrapper">
        <div class="page-content">

            <h3 class="page-title uppercase bold"> Dashboard <small>Statistics</small></h3>
            <hr>


            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-users"></i> USERS STATISTICS 
                            </div>
                        </div>
                        <div class="portlet-body text-center">
                            <div class="row">


                                <!-- START -->
                                <a href="{{url('/Admins/AllUsers')}}">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat blue">
                                            <div class="visual">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" data-value="{{ $call }}">{{ $call }}</span>
                                                </div>
                                                <div class="desc uppercase"> TOTAL  USERS </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->


                                <!-- START -->
                                <a href="{{url('/Admins/BannedUsers')}}">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat red">
                                            <div class="visual">
                                                <i class="fa fa-times"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" data-value="{{ $cbanned }}">{{ $cbanned }}</span>
                                                </div>
                                                <div class="desc uppercase"> BANNED  USERS </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->

                                <!-- START -->
                                <a href="{{url('/Admins/VerifiedUsers')}}">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat green">
                                            <div class="visual">
                                                <i class="fa fa-check"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" data-value="{{ $cverified }}">{{ $cverified }}</span>
                                                </div>
                                                <div class="desc uppercase"> Verified  USERS </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->

                                <!-- START -->
                                <a href="{{url('/Admins/PendingUsers')}}">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat yellow">
                                            <div class="visual">
                                                <i class="fa fa-deaf"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" data-value="{{ $cpending }}">{{ $cpending }}</span>
                                                </div>
                                                <div class="desc uppercase"> Pending USERS  </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->

                                <!-- START -->
                                <a href="{{url('/Admins/EmailUnverifiedUsers')}}">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat yellow">
                                            <div class="visual">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" data-value="{{ $cemailun }}">{{ $cemailun }}</span>
                                                </div>
                                                <div class="desc uppercase"> Email Unverified Users </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->

                                <!-- START -->
                                <a href="{{url('/Admins/MobileUnverifiedUsers')}}">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat yellow">
                                            <div class="visual">
                                                <i class="fa fa-mobile"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" data-value="{{ $cmobileun }}">{{ $cmobileun }}</span>
                                                </div>
                                                <div class="desc uppercase"> Mobile Unverified Users </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->

                               
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <!-- ############################ row ################################# -->

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-dollar"></i> FUND STATISTICS
                            </div>
                        </div>
                        <div class="portlet-body text-center">
                            <div class="row">


                                <!-- START -->
                                <a href="{{url('/Admins/AllUsers')}}">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat blue">
                                            <div class="visual">
                                                <i class="fa fa-viacoin"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">{{$cur}}
                                                    <span data-counter="counterup" data-value="{{ $auAcgc }}"> {{ $auAcgc }}</span>
                                                </div>
                                                <div class="desc uppercase"> ALL USERS BALANCE </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->


                                <!-- START -->
                                <a href="{{url('/Admins/AdminGeneratedFund')}}">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat red">
                                            <div class="visual">
                                                <i class="fa fa-cog"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">{{$cur}}
                                                    <span data-counter="counterup" data-value="{{ $aadminAcgc }}"> {{ $aadminAcgc }}</span>
                                                </div>
                                                <div class="desc uppercase"> ADMIN GENERATED </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->

                            </div> 
                        </div>
                    </div>
                </div>
            </div>


            <!-- ############################ row ################################# -->



            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box purple">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-th"></i> TRANSACTION STATISTICS 
                            </div>
                        </div>
                        <div class="portlet-body text-center">
                            <div class="row">

                                <!-- START -->
                                <a href="{{url('/Admins/Transactions')}}">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat green">
                                            <div class="visual">
                                                <i class="fa fa-th"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" data-value="{{ $ctrxnum }}">{{ $ctrxnum }}</span>
                                                </div>
                                                <div class="desc uppercase"> Number of Trx </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->

                                <!-- START -->
                                <a href="{{url('/Admins/Transactions')}}">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat purple">
                                            <div class="visual">
                                                <i class="fa fa-dollar"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">{{$cur}}
                                                    <span data-counter="counterup" data-value="{{ $atransacted }}"> {{ $atransacted }}</span>
                                                </div>
                                                <div class="desc uppercase"> Amount TRANSACTED </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->

                                <!-- START -->
                                <a href="{{url('/Admins/UserDepositedFund')}}">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                        <div class="dashboard-stat blue">
                                            <div class="visual">
                                                <i class="fa fa-dollar"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" data-value="{{ $cdeposit }}">{{ $cdeposit }}</span>
                                                </div>
                                                <div class="desc uppercase">Number Of Deposit </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <!-- END -->

                            </div> 
                        </div>
                    </div>
                </div>
            </div>





            <style>
                .details .number span{
                    margin-left:77px;
                }
            </style>
            <!-- ############################ row ################################# -->


        </div>
    </div>
@endsection