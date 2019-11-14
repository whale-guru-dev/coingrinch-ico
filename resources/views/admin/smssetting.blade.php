@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title  uppercase bold"> SET SMS API</h3>
		<hr>

		<div class="row">

		<div class="col-md-12">
			<!-- BEGIN SAMPLE TABLE PORTLET-->
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-bookmark"></i>Short Code
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-scrollable">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th> # </th>
									<th> CODE </th>
									<th> DESCRIPTION </th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td> 1 </td>
									<td> <pre><?php echo("{{message}}");?></pre> </td>
									<td> Details Text From Script</td>
								</tr>

								<tr>
									<td> 2 </td>
									<td> <pre><?php echo("{{number}}");?></pre> </td>
									<td> Destination Number</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- END SAMPLE TABLE PORTLET-->
		</div>

		<div class="col-md-12">
			<!-- BEGIN SAMPLE FORM PORTLET-->
			<div class="portlet light bordered">

				<div class="portlet-body form">
					<form class="form-horizontal" action="{{url('/Admins/SetSmsSetting')}}" method="post" role="form">
						{{ csrf_field() }}
						<div class="form-body">								

							<div class="form-group">
								<label class="control-label"><strong>SMS API</strong><br></label>
								<div class="col-md-12">
									<textarea  class="form-control" rows="3" name="smsapi">{{$dgeneral_setting->smsapi}}</textarea>
								</div>
							</div>

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