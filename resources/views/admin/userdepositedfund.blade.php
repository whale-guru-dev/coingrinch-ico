@extends('layouts.admin')

@section('content')
<?php 
$i=1; 
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> <i class="fa fa-list"></i> CryptoCurrency Deposit</h3>
        <hr>

        <div class="row">
            <div class="col-md-12">

                <div class="portlet box green">

                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-list"></i> Users Deposit 
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
                                	<th class="text-center">#</th>
                                	<th class="text-center">User Name</th>
                                	<th class="text-center">User Email</th>
                                    <th class="text-center">Time</th>
				                    <th class="text-center">Coin</th>
				                    <th class="text-center">Amount</th>
				                    <th class="text-center"> Sig </th>
				                    <th class="text-center">To Address</th>
				                    <th class="text-center">TRX</th>
				                    <th class="text-center">Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                	@foreach($ddeposit as $deposit)
                                	<?php 
                                		$user = App\Models\User::where('id',$deposit->who)->first();
                                	?>
				                      <tr>
				                      	<td class="text-center">{{$i++}}</td>
				                      	<td class="text-center">{{$user->uname}}</td>
				                      	<td class="text-center">{{$user->email}}</td>
				                        <td class="text-center">{{$deposit->tm}}</td>
				                        <td class="text-center">{{$deposit->coin}}</td>
				                        <td class="text-center">{{$deposit->amount}}</td>
				                        <td class="text-center label-info"><span style="color:black;font-size: 15px;" class="label label-lg ">{{$deposit->sig}}</span></td>
				                        <td class="text-center">{{$deposit->address}}</td>
				                        <td class="text-center">{{$deposit->hash}}</td>
				                        <td class="text-center">{{$deposit->details}}</td>
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