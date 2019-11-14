@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title uppercase bold"> SET EMAIL TEMPLATE</h3>
		<hr>

		<div class="row">

			<div class="col-md-12">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light bordered">

					<div class="portlet-body form">
						<form class="form-horizontal" action="{{url('/Admins/ModalSetting')}}" method="post" role="form">
							{{ csrf_field() }}
							<div class="form-body">									

								<div class="form-group">
									<label class="control-label"><strong style="text-transform: uppercase;">Modal Title</strong><br></label>
									<div class="col-md-112">
										<input class="form-control input-lg" name="title" value="{{$dgeneral_setting->modal_title}}" type="text">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label"><strong style="text-transform: uppercase;">Modal Status</strong><br></label>
									<div class="col-md-112">
										<select name="status">
											<option value="0">Disable</option>
											<option value="1" >Enable</option>
										</select>
									</div>
								</div>


								<div class="form-group">
									<label class="control-label"><strong style="text-transform: uppercase;">Modal content</strong><br></label>
									<div class="col-md-12">
										<textarea id="shaons" class="form-control" rows="10" name="content">{{$dgeneral_setting->modal_content}}</textarea>
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