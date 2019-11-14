@extends('layouts.admin')

@section('content')
<?php $i=1; ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> <i class="fa fa-list"></i> User Deposit</h3>
        <hr>

        <div class="row">
            <div class="col-md-12">

                <div class="portlet box green">

                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-list"></i>  Deposit History Of {{$duser->uname}}
                        </div>
                    </div>

                    <div class="portlet-body">
						@if(count($ddeposit)==0)
							<h1 class='text-center'> NO RESULT FOUND !</h1>
						@else
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> AMOUNT </th>
                                    <th> COIN </th>
                                    <th> TRX # </th>
                                    <th> TIME </th>
                                </tr>
                                </thead>
                                <tbody>
                                	@foreach($ddeposit as $deposit)
									<tr>
	                                    <th> {{$i++}} </th>
	                                    <th> {{$deposit->amount}} </th>
	                                    <th> {{$deposit->coin}} </th>
	                                    <th> {{$deposit->trxid}} </th>
	                                    <th> {{($deposit->tm)}} </th>
	                                </tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- print pagination -->
						<div class="row">
							<div class="text-center">
								 {{$ddeposit->render()}}
							</div>
						</div><!-- row -->
						<!-- END print pagination -->
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- ROW-->
    </div>
</div>
@endsection