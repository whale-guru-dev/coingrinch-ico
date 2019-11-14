@extends('layouts.admin')

@section('content')

<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title  uppercase bold"> Logo and Icon Setting</h3>
		<hr>

		<div class="row">
			<div class="col-md-4">

				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-repeat"></i> CHANGE IMAGES
						</div>
					</div>
					<div class="portlet-body">

						<form action="{{url('/Admins/SetLogoSetting')}}" method="post" enctype="multipart/form-data" >
							{{ csrf_field() }}
							<div class="row">

								<div class="form-group">
									<label class="col-md-12"><strong style="text-transform: uppercase;">logo</strong></label>
									<div class="col-sm-12">
										<input name="bgimg" type="file" id="bgimg" />
									</div>
									<input name="abir" type="hidden" value="bgimg" />
									<br>
									<br>
								</div>
								<br>
								<br>
								<br>

								<div class="form-group">
									<label class="col-md-12">
										<strong style="text-transform: uppercase;">favicon</strong>
									</label>
									<div class="col-sm-12">
										<input name="bgimg2" type="file" id="bgimg" />
									</div>
									<br>
									<br>
								</div>
								<br>
								<br>
								<br>

								<div class="form-group">
									<div class="col-sm-12"> 
										<button type="submit" class="btn btn-primary btn-block">UPLOAD</button>
									</div>
								</div>

							</div>

						</form>

					</div>
				</div>
			</div>


			<div class="col-md-4"> 
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-desktop"></i> CURRENT ICON
						</div>
					</div>
					<div class="portlet-body">
						<img src="{{asset('assets/images/favicon.png')}}"  alt="icon" style="width: 100%;">
					</div>
				</div>
			</div>


			<div class="col-md-4"> 
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-desktop"></i> CURRENT LOGO
						</div>
					</div>
					<div class="portlet-body">
						<img src="{{asset('assets/images/logo.png')}}"  alt="LOGO" style="width: 100%;">
					</div>
				</div>
			</div>

		</div>

	</div>
</div>
@if(Session::get('msg1') || Session::get('msg2'))
	@if((Session::get('msg1')[2] =='success') && (Session::get('msg2')[2] =='success'))
	<script>
	swal({title: "{{Session::get('msg1')[0]}}   {{Session::get('msg2')[0]}}",text: "" , type: "success",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
	</script>
	@elseif(Session::get('msg1')[2] =='error' || Session::get('msg2')[2] =='error')
	<script>
	swal({title: "{{Session::get('msg1')[0]}}   {{Session::get('msg2')[0]}}",text: "" , type: "error",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
	</script>
	@endif
@endif
@endsection