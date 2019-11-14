@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper">

    <div class="page-content">
        <h3 class="page-title uppercase bold"> Send SMS
			<a href="{{url('/Admins/UserDetails/'.$duser->id)}}" class="btn btn-success btn-md">
				<i class="fa fa-list"></i>  Back
			</a>
        </h3>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">

                    <div class="portlet-body form">
                        <form class="form-horizontal" action="{{url('/Admins/SendSms')}}" method="post" role="form">
                        	{{ csrf_field() }}
                        	<input type="hidden" name="id" value="{{$duser->id}}">
                            <div class="form-body">

                                
                                <div class="alert alert-info" style="text-transform: uppercase;">

                                    You are sending a SMS to number {{$duser->mobile}}.<br>

                                </div>
                                User Name: {{$duser->uname}}<br>
                                E-mail: {{$duser->email}}
                                <br><br><br>

                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Content</strong></label>
                                    <div class="col-md-12">
                                        <textarea  placeholder="Hello!" class="form-control" rows="3" name="smscontent"></textarea>
                                    </div>
                                </div>

                                <br>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn blue btn-block btn-lg">SEND SMS</button>
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