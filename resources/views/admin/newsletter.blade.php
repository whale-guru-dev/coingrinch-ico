@extends('layouts.admin')

@section('content')
<?php $i=1;?>

<div class="page-content-wrapper">
	<div class="page-content" id="first">
		<h3 class="page-title uppercase bold"> <i class="fa fa-desktop"></i> View All Newsletter Subscribers
			<span class=" pull-right">

				<button class="btn btn-warning" id="send-btn">
					<i class="fa fa-address-card"></i>  &nbsp; SEND EMAIL
				</button>
			</span>
		</h3>
		<hr>

		<div class="row">
			<div class="col-md-12">
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="caption font-dark">
							<i class="fa fa-list"></i>  Subscribers List
						</div>
					</div>

					<div class="portlet-body">
						@if(count($dnewsletter)==0)
							<h1 class='text-center'> NO RESULT FOUND !</h1>
						@endif
						<!-- <div class="table-scrollable"> -->
							<table class="table table-bordered table-hover" id="sample_1">
								<thead>
									<tr>
										<th> # </th>
										<th> EMAIL </th>
										<th> DATE </th>
										<th> # </th>
									</tr>
								</thead>
								<tbody>
									@foreach($dnewsletter as $user)
										<tr>
											<th>{{$i++}}</th>
											<th>{{$user->email}}</th>
											<th>{{$user->created_at}}</th>
											<th><input type="checkbox" name="subs[]" value="{{$user->Id}}"></th>
										</tr>
									@endforeach
								</tbody>
							</table>
						<!-- </div> -->

						<!-- print pagination -->
						<div class="row">
							<div class="text-center">
								 {{$dnewsletter->render()}}
							</div>
						</div><!-- row -->
						<!-- END print pagination -->
					</div>
				</div>
			</div>
		</div><!-- ROW-->
	</div>
	<div class="page-content" id="second" style="display: none;">
		<h3 class="page-title uppercase bold"> SET EMAIL TEMPLATE</h3>
		<hr>

		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet light bordered">

					<div class="portlet-body form">
						<form class="form-horizontal" action="{{url('/Admins/SendSubscribers')}}" method="post" role="form">
							{{ csrf_field() }}
							<div class="form-body">									
								<input type="hidden" name="subscribers" id="subscribers">
								<div class="form-group">
									<label class="control-label"><strong style="text-transform: uppercase;">Email Sent From</strong><br></label>
									<div class="col-md-112">
										<input class="form-control input-lg" name="notimail" value="{{$dgeneral_setting->notimail}}" type="text">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label"><strong style="text-transform: uppercase;">Title</strong><br></label>
									<div class="col-md-112">
										<input class="form-control input-lg" name="title" value="" type="text">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label"><strong style="text-transform: uppercase;">Email Template</strong><br></label>
									<div class="col-md-12">
										<textarea id="shaons" class="form-control" rows="30" name="btext">{{$dgeneral_setting->email_newsletter}}</textarea>
									</div>
								</div>

								<br>
								<br>
								<br>

								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn blue btn-block btn-lg">SEND</button>
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
	// $( document ).ready(function() {
	    $("#first").show();
		$("#second").hide();
	// });
	bkLib.onDomLoaded(function () {
        new nicEditor({fullPanel: true}).panelInstance('shaons');
    });
</script>
<script type="text/javascript">

</script>
<script type="text/javascript">
	$("#send-btn").click(function(){

		$("#first").hide();
		$("#second").show();

		var subs = []
		$("input[name='subs[]']:checked").each(function ()
		{
		    subs.push(parseInt($(this).val()));
		});
		$('#subscribers').val(JSON.stringify(subs));
		console.log(subs);
	});
</script>
@endsection