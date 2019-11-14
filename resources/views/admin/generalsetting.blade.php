@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title uppercase bold"> General Setting</h3>
		<hr>

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light bordered">

					<div class="portlet-body form">
						<form class="form-horizontal" action="{{url('/Admins/GeneralSettings')}}" method="post" role="form">
							{{ csrf_field() }}
							<div class="form-body">

										
								<div class="form-group">
									<label class="col-md-12 "><strong style="text-transform: uppercase;">Website Title</strong></label>
									<div class="col-md-12">
										<input class="form-control input-lg" name="title" value="Grinch" type="text">
									</div>
								</div>

								<br>
								<br>
								<br>

								<div class="row" style="display:none;">

									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-12"><strong style="text-transform: uppercase;">Site Base Color Code</strong> <i>(without #)</i></label>
											<div class="col-md-12">
												<input class="form-control input-lg" name="color" value="ffff" style="background: #ffff" type="text">
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-12"><strong style="text-transform: uppercase;"> Base Currency Text</strong></label>
											<div class="col-md-12">
												<input class="form-control input-lg" name="currency" value="Grinch" type="text">
											</div>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-12"><strong style="text-transform: uppercase;">Base Currency Symbol</strong></label>
											<div class="col-md-12">
												<input class="form-control input-lg" name="cur" value="GRT" type="text">
											</div>
										</div>
									</div>

								</div><!-- row -->


								<div class="row">

									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-12"><strong style="text-transform: uppercase;">REGISTRATION</strong></label>
											<div class="col-md-12">
												<input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="reg">
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-12"><strong style="text-transform: uppercase;">EMAIL VERIFICATION</strong></label>
											<div class="col-md-12">
												<input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="ev">
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-12"><strong style="text-transform: uppercase;">SMS VERIFICATION</strong></label>
											<div class="col-md-12">
												<input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="mv">
											</div>
										</div>
									</div>

								</div><!-- row -->

								<br>
								<br>
								<br>

								<div class="row">

									<div class="col-md-4" style="display:none;">
										<div class="form-group">
											<label class="col-md-12"><strong style="text-transform: uppercase;"> CoinGrinch Presale Date end</strong></label>
											<div class="col-md-12">
												<input type="datetime-local" name="deci" class="form-control" value="">
											</div>
										</div>
									</div>


									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-12"><strong style="text-transform: uppercase;">EMAIL NOTIFICATION</strong></label>
											<div class="col-md-12">
												<input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="en">
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-12"><strong style="text-transform: uppercase;">SMS NOTIFICATION</strong></label>
											<div class="col-md-12">
												<input data-toggle="toggle" checked data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" name="mn">
											</div>
										</div>
									</div>

								</div><!-- row -->

								<br>
								<br>
								<br>

								<div class="row">
									<div class="col-md-4">
										<label class="col-md-12"><strong style="text-transform: uppercase;">Minimum Purchase GRT Amount</strong></label>
										<div class="col-md-12">
											<input type="number" name="min_grt" class="form-control input-sm">
										</div>
									</div>
									
								</div>
								<br>
								<br>
								<br>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn blue btn-block btn-lg">UPDATE</button>
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
@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>

@endif
@endsection