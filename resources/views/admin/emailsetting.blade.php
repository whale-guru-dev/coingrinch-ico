@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title uppercase bold"> SET EMAIL TEMPLATE</h3>
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
										<td> <pre><?php echo("{{message}}")?></pre> </td>
										<td> Details Text From Script</td>
									</tr>

									<tr>
										<td> 2 </td>
										<td> <pre><?php echo("{{name}}")?></pre> </td>
										<td> Users Name. Will Pull From Database and Use in EMAIL text</td>
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
						<form class="form-horizontal" action="{{url('/Admins/SetEmailSetting')}}" method="post" role="form">
							{{ csrf_field() }}
							<div class="form-body">									

								<div class="form-group">
									<label class="control-label"><strong style="text-transform: uppercase;">Email Sent From</strong><br></label>
									<div class="col-md-112">
										<input class="form-control input-lg" name="notimail" value="{{$dgeneral_setting->notimail}}" type="text">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label"><strong style="text-transform: uppercase;">Email Template</strong><br></label>
									<div class="col-md-12">
										<textarea id="shaons" class="form-control" rows="30" name="btext">{{$dgeneral_setting->emailtemp}}</textarea>
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

@section('additional_js')
<script type="text/javascript">
    bkLib.onDomLoaded(function () {
        new nicEditor({fullPanel: true}).panelInstance('shaons');
    });
</script>
@endsection