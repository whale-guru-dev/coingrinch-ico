@extends('layouts.admin')

@section('content')
<?php $i=1;?>
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title uppercase bold"> <i class="fa fa-envelope"></i> Send Message
			<br><br>
			<hr>
			<span class="pull-right">
				<button class="btn btn-success" data-toggle="modal" data-target="#sendAllModal" >
					<i class="fa fa-envelope"></i>  &nbsp; SEND MESSAGE TO ALL 
				</button>

				<button class="btn btn-warning" data-toggle="modal" data-target="#nameModal" href="javascript:;">
					<i class="fa fa-address-card"></i>  &nbsp; SEARCH BY USER NAME
				</button>

				<button class="btn btn-primary" data-toggle="modal" data-target="#emailModal" >
					<i class="fa fa-users"></i>  &nbsp; SEARCH BY EMAIL 
				</button>
			</span>
		</h3>

		<br><br>

		<div class="row">
			<div class="col-md-12">
				<div class="portlet box purple">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-list"></i>  Sending
						</div>
						@if($search!='')
						<div class="actions"> 
							Search By {{$search}}
						</div>       
						@endif 
					</div>
					<div class="portlet-body">
						@if(count($duser)==0)
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
										<th> SEND MESSAGE </th>
									</tr>
								</thead>
								<tbody>
								@foreach($duser as $user)
									<tr>
										<th> {{$i++}} </th>
										<th> {{$user->uname}} </th>
										<th> {{$user->email}} </th>
										<th> {{$user->mobile}} </th>
										<th>
											<button class='btn btn-success' data-id='{{$user->id}}' data-toggle='modal' data-target='#sendOneModal' id='sendOne'>
												<i class='fa fa-desktop'></i> SEND 
											</button> 
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
			</div><!-- ROW-->
		</div>
	</div>
</div>

<!-- modal for Send All -->
<div class="modal fade" id="sendAllModal" tabindex="-1" role="dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title uppercase bold">Send Message to All Users</h4>
		</div>

		<form action="{{url('/Admins/SendMsg')}}" method="post">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<input type="hidden" class="form-control input-lg" name="sendAll" >
							<label for="title">Title</label>
							<input type="text" class="form-control input-lg" name="titleA" id="title" value="">

							<label for="content">Content</label>
							<textarea  class="form-control input-lg" name="contentA" id="content" value=""></textarea>
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
						<button type="submit" class="btn btn-block green"> <i class="fa fa-envelope"></i> SEND MESSAGE</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- /.modal -->

<!-- modal for Send A User -->
<div class="modal fade" id="sendOneModal" tabindex="-1" role="dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title uppercase bold">Send Message</h4>
		</div>

		<form action="{{url('/Admins/SendMsg')}}" method="post">
			{{ csrf_field() }}
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<div class="col-md-12">
							<input type="hidden" class="form-control input-lg" id="sendId" name="sendOne">
							<label for="title">Title</label>
							<input type="text" class="form-control input-lg" name="title" id="title" value="">

							<label for="content">Content</label>
							<textarea  class="form-control input-lg" name="content" id="content" value=""></textarea>
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
						<button type="submit" class="btn btn-block green"> <i class="fa fa-envelope"></i> SEND MESSAGE</button>
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
			<input type="hidden" name="sType" value="msg">
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

<!-- modal for username -->
<div class="modal fade" id="nameModal" tabindex="-1" role="dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title uppercase bold">Search By Username</h4>
		</div>
		<form action="{{url('/Admins/Search')}}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="sType" value="msg">
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
@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endsection

@section('additional_js')
<script>
    $(document).on("click", "#sendOne", function () {
     var sendUserId = $(this).data('id');
     $(".modal-body #sendId").val( sendUserId );
    });
</script>
@endsection