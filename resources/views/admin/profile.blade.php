@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title uppercase bold"> Profile Management</h3>
		<hr>

		<div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
					<div class="portlet-body form">
						<form class="form-horizontal" action="" method="post" role="form">
							<div class="form-body">
														
								<div class="form-group">
									<label class="col-md-3 control-label"><strong>FULL NAME</strong></label>
									<div class="col-md-6">
										<input class="form-control input-lg" name="name" value="XXX" placeholder="Your Full Name" type="text" required="">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label"><strong>EMAIL</strong></label>
									<div class="col-md-6">
										<input class="form-control input-lg" name="email" value="XX" placeholder="Your Email" type="email" required="">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label"><strong>MOBILE</strong></label>
									<div class="col-md-6">
										<input class="form-control input-lg" name="mobile" value="X" placeholder="Your Mobile Number" type="text" required="">
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
		</div><!---ROW-->		

	</div>
</div>
@endsection