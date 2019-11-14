@extends('layouts.admin')

@section('content')
<?php $i=1;?>
<div class="page-content-wrapper">

    <div class="page-content">

        <h3 class="page-title uppercase bold"> <i class="fa fa-users"></i> Referrals list</h3>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue">

                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-list"></i>  Referrals list Of {{$duser->uname}}
                        </div>
                    </div>

                    <div class="portlet-body">
                    	@if(count($dreferal)==0)
                        	<h1 class='text-center'> NO RESULT FOUND !</h1>
						@endif
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> NAME </th>
                                        <th> EMAIL </th>
                                        <th> Received </th>
                                        <th> Confirmed E-mail </th>
                                        <th> Confirmed Phone </th>
                                    </tr>
                                </thead>

                                <tbody>

                                	@foreach($dreferal as $referral)
										<tr>
	                                        <th> {{$i++}} </th>
	                                        <th> <a href="{{url('/Admins/UserDetails/').'/'.$referral->id}}">{{$referral->uname}} </th>
	                                        <th> {{$referral->email}} </th>
	                                        <th> {{$atokenfrom[$referral->id]}} </th>
	                                        <th> <?php if($referral->ev==1) echo "Confirmed" ; else echo "UnConfirmed"; ?> </th>
	                                        <th> <?php if($referral->mv==1) echo "Confirmed" ; else echo "UnConfirmed"; ?> </th>
	                                    </tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- print pagination -->
						<div class="row">
							<div class="text-center">
								 {{$dreferal->render()}}
							</div>
						</div><!-- row -->
						<!-- END print pagination -->

                    </div>
                </div>
            </div>
        </div><!-- ROW-->
    </div>
</div>

@endsection