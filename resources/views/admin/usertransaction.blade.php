@extends('layouts.admin')

@section('content')
<?php
use App\Models\User;

$alluser = User::all();
$i = 1;
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> <i class="fa fa-list"></i> Transactions</h3>
        <hr>
        <div class="row">
            <div class="col-md-12">

                <div class="portlet box green">

                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-list"></i>  Transactions Of {{$duser['uname']}}
                        </div>
                    </div>

                    <div class="portlet-body">
						@if(count($dtransaction)==0)
							<h1 class='text-center'> NO RESULT FOUND !</h1>
						@endif

                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
	                                <tr>
	                                    <th> # </th>
	                                    <th> FROM / TO </th>
	                                    <th> AMOUNT </th>
	                                    <th> TIME </th>
	                                    <th> TRX # </th>
	                                    <th> DETAILS </th>
	                                    <th> MESSAGE </th>
	                                </tr>
                                </thead>

                                <tbody>
									@foreach($dtransaction as $trx)
										<?php
											if($trx->byy == 0 || $trx->byy == 1) $from = "Admin";
											elseif($trx->byy == 2) $from = $duser['uname'];
											elseif($trx->byy == 3) $from = $alluser->where('id', $trx->fromWhom)->first()->uname;
										?>
										<tr>
		                                    <th> {{$i++}} </th>
		                                    <th> {{$from}} </th>
		                                    <th> {{$trx->amount}} </th>
		                                    <th> {{date($trx->tm)}} </th>
		                                    <th> {{$trx->trxid}} </th>
		                                    <th> {{$trx->typ}} </th>
		                                    <th> {{$trx->msg}} </th>
		                                </tr>
									@endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- print pagination -->
						<div class="row">
							<div class="text-center">
								 {{$dtransaction->render()}}
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