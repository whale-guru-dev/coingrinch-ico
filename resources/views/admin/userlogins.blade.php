@extends('layouts.admin')

@section('content')
<?php
$i = 1;
?>
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title uppercase bold"> <i class="fa fa-sign-in"></i> Login Information</h3>
		<hr>

		<div class="row">
			<div class="col-md-12">

				<div class="portlet box blue">

					<div class="portlet-title">
						<div class="caption uppercase bold">
							<i class="fa fa-list"></i>  Login Information Of {{$duser->uname}}
						</div>
					</div>

					<div class="portlet-body">

						@if(count($dlogins)==0)
							<h1 class='text-center'> NO RESULT FOUND !</h1>
						@endif

						<div class="table-scrollable">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th> # </th>
										<th> USER </th>
										<th> IP </th>
										<th> IP LOCATION </th>
										<th> USING </th>
										<th> TIME </th>
									</tr>
								</thead>
								<tbody>
									@foreach($dlogins as $dlogin)
										<tr>
											<th> {{$i++}} </th>
											<th> <a href="{{url('/Admins/UserDetails/').'/'.$duser->id}}">{{$duser->uname}} </th>
											<th> {{$dlogin->ip}} </th>
											<th> {{$dlogin->location}} </th>
											<th> {{$dlogin->ua}} </th>
											<th> {{$dlogin->tm}} </th>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<!-- print pagination -->
						<div class="row">
							<div class="text-center">
								 {{$dlogins->render()}}
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