@extends('layouts.admin')

@section('content')
<?php $i=1; ?>
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title uppercase bold"> <i class="fa fa-desktop"></i> View Banned USERS</h3>
		<hr>

		<button class="btn btn-warning" data-toggle="modal" data-target="#nameModal" >
			<i class="fa fa-address-card"></i>  &nbsp; SEARCH BY USER NAME 
		</button>

		<button class="btn btn-info" data-toggle="modal" data-target="#mobileModal" >
			<i class="fa fa-mobile"></i>  &nbsp; SEARCH BY MOBILE 
		</button>

		<button class="btn btn-primary" data-toggle="modal" data-target="#emailModal" >
			<i class="fa fa-envelope"></i>  &nbsp; SEARCH BY EMAIL 
		</button>

		<span class="pull-right">
			<button class='btn btn-danger' data-toggle='modal' data-target='#deleteAllModal'>
				<i class='fa fa-times' aria-hidden='true'></i>  &nbsp; DELETE ALL
			</button>
		</span>

		<br/><br/>
		<div class="row">
			<div class="col-md-12">

				<div class="portlet box red">

					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-list"></i>  BANNED USERS LIST
						</div>
						@if($search!='')
						<div class="actions">
							Search Result For {{$search}}
						</div>
						@endif
					</div>

					<div class="portlet-body">
						@if($duser->count()==0)
							<h1 class='text-center'> NO RESULT FOUND !</h1>
						@endif
						<div class="table-scrollable">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th> # </th>
										<th> NAME </th>
										<th> EMAIL </th>
										<th> MOBILE </th>
										<th> BALANCE </th>
										<th> DETAILS </th>
									</tr>
								</thead>
								<tbody>
									@foreach($duser as $user)
										<tr>
											<th> {{$i++}} </th>
											<th> {{$user->uname}} </th>
											<th> {{$user->email}} </th>
											<th> {{$user->mobile}} </th>
											<th> {{$user->acgc}} CGC</th>
											<th> 
												<a href="{{url('/Admins/UserDetails/').'/'.$user->id}}" class='btn btn-success btn-md'>
											        <i class='fa fa-desktop'></i> VIEW DETAILS
											    </a> 
											    
											    <a class='btn btn-danger' data-id='{{$user->id}}' data-toggle='modal' data-target='#deleteAModal' id='delUser'>
											        <i class='fa fa-times' aria-hidden='true'></i>  &nbsp; DELETE 
											    </a> 
											</th>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>


						<!-- print pagination -->
						<div class="row">
							<div class="text-center">
								{{$duser->render()}}
							</div>
						</div><!-- row -->
						<!-- END print pagination -->

					</div>
				</div>

			</div>
		</div><!-- ROW-->
	</div>
</div>

<!-- Start DELETE User Modal -->

<div class="modal fade" id="deleteAModal" tabindex="-1" role="dialog">

	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title uppercase bold">Delete user</h4>
		</div>
		<form action="{{url('/Admins/DelBannedUser')}}" method="post">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<input type="hidden" class="form-control input-lg" id="deleId" name="deleId">
							<h4 >Are you sure to delete this user?</h4>
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
						<button type="submit" class="btn btn-block red"> <i class="fa fa-times" aria-hidden="true"></i> DELETE</button>
					</div>
				</div>
			</div>

		</form>
	</div>
</div>

<!-- End DELETE User Modal -->

<!-- Start DELETE ALL Modal -->

<div class="modal fade" id="deleteAllModal" tabindex="-1" role="dialog">

	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title uppercase bold">Delete all users</h4>
		</div>
		<form action="{{url('/Admins/DelBannedUser')}}" method="post">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<input type="hidden" class="form-control input-lg" val="all" name="deleAll">
							<h4 >Are you sure to delete all users?</h4>
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
						<button type="submit" class="btn btn-block red"> <i class="fa fa-times" aria-hidden="true"></i> DELETE</button>
					</div>
				</div>
			</div>

		</form>
	</div>
</div>


<!-- End DELETE ALL Modal -->

<!-- modal for username -->
<div class="modal fade" id="nameModal" tabindex="-1" role="dialog">

	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title uppercase bold">Search By Username</h4>
		</div>
		<form action="{{url('/Admins/Search')}}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="sType" value="ban">
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

		<form action="{{url('/Admins/Search')}}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="sType" value="all">
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
		<form action="{{url('/Admins/Search')}}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="sType" value="all">
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

@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endsection

@section('additional_js')
<script>
	$(document).on("click", "#delUser", function () {
     var delUserId = $(this).data('id');
     $(".modal-body #deleId").val( delUserId );
	});
</script>
@endsection