@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title uppercase bold"> Change Profile</h3>
		<hr>

		<div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
					<div class="portlet-body form">
						<div class="row">
							<form class="form-horizontal" action="{{'/Admins/SetNewPassword'}}" method="post" role="form">
								{{ csrf_field() }}
								<div class="form-body">
																
									<div class="form-group">
										<label class="col-md-3 control-label"><strong>Current Password</strong></label>
										<div class="col-md-6">
											<input class="form-control input-lg" name="oldpass" placeholder="Your Current Password" type="password">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"><strong>New Password</strong></label>
										<div class="col-md-6">
											<input class="form-control input-lg" name="newpass" placeholder="New Password" type="password">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"><strong>New Password Again</strong></label>
										<div class="col-md-6">
											<input class="form-control input-lg" name="newpass_confirm" placeholder="New Password Again" type="password">
										</div>
									</div>

									<div class="row">
										<div class="col-md-offset-3 col-md-6">
											<button type="submit" class="btn blue btn-block">Submit</button>
										</div>
									</div>

								</div>
							</form>
						</div>
						<hr>
						<div class="row">
							<form class="form-horizontal" action="{{'/Admins/SetNewUsername'}}" method="post" role="form">
								{{ csrf_field() }}
								<div class="form-body">
																
									<div class="form-group">
										<label class="col-md-3 control-label"><strong>Current Username</strong></label>
										<div class="col-md-6">
											<input class="form-control input-lg" name="oldusername" placeholder="Your Current Username" type="text">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"><strong>New Username</strong></label>
										<div class="col-md-6">
											<input class="form-control input-lg" name="newusername" placeholder="New Username" type="text">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label"><strong>New Username Again</strong></label>
										<div class="col-md-6">
											<input class="form-control input-lg" name="newusername_confirm" placeholder="New Username Again" type="text">
										</div>
									</div>

									<div class="row">
										<div class="col-md-offset-3 col-md-6">
											<button type="submit" class="btn blue btn-block">Submit</button>
										</div>
									</div>

								</div>
							</form>
						</div>
						
					</div>
				</div>
			</div>		
		</div><!---ROW-->		

	</div>
</div>
@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endsection