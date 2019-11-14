@extends('layouts.admin')

@section('content')
<?php $i=1; ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> <i class="fa fa-list"></i> User Withdrawal</h3>
        <hr>

        <div class="row">
            <div class="col-md-12">

                <div class="portlet box green">

                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-list"></i>  Withdrawal History Of {{$duser->uname}}
                        </div>
                    </div>

                    <div class="portlet-body">
						@if(count($dwithdraw)==0)
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
                                	@foreach($dwithdraw as $withdraw)
									<tr>
	                                    <th> {{$i++}} </th>
	                                    <th> {{$withdraw->amount}} </th>
	                                    <th> {{$withdraw->coin}} </th>
	                                    <th> {{$withdraw->trxid}} </th>
	                                    <th> {{($withdraw->tm)}} </th>
	                                </tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- print pagination -->
						<div class="row">
							<div class="text-center">
								 {{$dwithdraw->render()}}
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