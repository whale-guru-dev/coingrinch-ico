@extends('layouts.admin')

@section('content')
<?php 
	$i = 1;
	use App\Models\User;
	$duser = User::all();
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> <i class="fa fa-list"></i> ADMIN GENERATED FUNDS</h3>
        <hr>
        <span class=" pull-right">

			<button class="btn btn-warning" data-toggle="modal" data-target="#nameModal" >
				<i class="fa fa-address-card"></i>  &nbsp; SEARCH BY USER NAME 
			</button>

			<button class="btn btn-info" data-toggle="modal" data-target="#mobileModal" >
				<i class="fa fa-mobile"></i>  &nbsp; SEARCH BY MOBILE 
			</button>

			<button class="btn btn-primary" data-toggle="modal" data-target="#emailModal" >
				<i class="fa fa-envelope"></i>  &nbsp; SEARCH BY EMAIL 
			</button>
		</span>
        <div class="row">
            <div class="col-md-12">

                <div class="portlet box green">

                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-list"></i>  ADMIN GENERATED FUNDS LOG
                        </div>
                    </div>

                    <div class="portlet-body">
						@if(count($dadmingenerated)==0)
							<h1 class='text-center'> NO RESULT FOUND !</h1>
						@endif

                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
	                                <tr>
	                                    <th> # </th>
	                                    <th> USER </th>
	                                    <th> AMOUNT </th>
	                                    <th> TIME </th>
	                                    <th> TRX ID </th>
	                                    <th> DETAILS </th>
	                                    <th> MESSAGE </th>
<!-- 	                                    <th> FROM (Affilate) </th> -->
	                                </tr>
                                </thead>

                                <tbody>
									@foreach($dadmingenerated as $trx)
										<tr>
											<th> {{ $i++ }} </th>
		                                    <th> {{ $duser->where('id', $trx->who)->first()->uname}} </th>
		                                    <th> {{ $trx->amount }} </th>
		                                    <th> {{ $trx->tm }} </th>
		                                    <th> {{ $trx->trxid }} </th>
		                                    <th> {{ $trx->typ }} </th>
		                                    <th> {{ $trx->msg }} </th>
		                                    
										</tr>
									@endforeach
                                </tbody>
                            </table>
                        </div>
						@if($dadmingenerated != [])
                        <!-- print pagination -->
						<div class="row">
							<div class="text-center">
								 {{$dadmingenerated->render()}}
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
<!-- modal for username -->
<div class="modal fade" id="nameModal" tabindex="-1" role="dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title uppercase bold">Search By Username</h4>
		</div>

		<form action="{{url('/Admins/TrxSearch')}}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="sType" value="admin">
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control input-lg" name="username" placeholder="User Name" required="" >
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div class="row">
					<div class="col-md-6">
						<button type="button" class="btn btn-block dark btn-outline" data-dismiss="modal">Close</button>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-block green"> <i class="fa fa-address-card"></i> Search</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- /.modal -->

<!-- modal for Email -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title uppercase bold">Search By Email</h4>
		</div>

		<form action="{{url('/Admins/TrxSearch')}}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="sType" value="admin">
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control input-lg" name="mail" placeholder="Email Address" required="">
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div class="row">
					<div class="col-md-6">
						<button type="button" class="btn btn-block dark btn-outline" data-dismiss="modal">Close</button>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-block green"> <i class="fa fa-search"></i> Search</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- /.modal -->

<!-- modal for Mobile -->
<div class="modal fade" id="mobileModal" tabindex="-1" role="dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title uppercase bold">Search By Mobile</h4>
		</div>
		<form action="{{url('/Admins/TrxSearch')}}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="sType" value="admin">
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control input-lg" name="mobile" placeholder="Mobile Number" required="">
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<div class="row">
					<div class="col-md-6">
						<button type="button" class="btn btn-block dark btn-outline" data-dismiss="modal">Close</button>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-block green"> <i class="fa fa-search"></i> Search</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- /.modal -->
@endsection