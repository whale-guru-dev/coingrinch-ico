@extends('layouts.admin')

@section('content')
<?php $i=0;  ?>
@if($breview == "normal")
<div class="page-content-wrapper">

	<div class="page-content">
	    <h3 class="page-title uppercase bold"> View KYC Requests</h3>
	    <hr>

	    <div class="row">

		    <div class="col-md-12">

			    <div class="portlet light bordered">
			        <div class="portlet-title">
			            <div class="caption font-dark">

			            </div>

			            <div class="tools"> </div>
			        </div>

				    <div class="portlet-body">

				        <table class="table table-striped table-bordered table-hover" id="sample_1">
				            <thead>
					            <tr>
					                <th>ID</th>
					                <th class="right">E-mail</th>
					                <th>First Name</th>
					                <th>Last Name</th>
					                <th>Status</th>
					                <th>View</th>
					            </tr>
				            </thead>
				            <tbody>
				            	@foreach($dkyc as $kyc)
				            	<tr>
				                    <td>{{$i++}}</td>
				                    <td>{{$kyc->username}}</td>
				                    <td>{{$duser->where('email',$kyc->username)->first()->fname}}</td>
				                    <td>{{$duser->where('email',$kyc->username)->first()->lname}}</td>
				                    @if($kyc->status=='pending')
				                    	<td>Pending</td>
				                    @elseif($kyc->status=='declined')
										<td>Declined</td>
				                    @elseif($kyc->status=='accepted')
										<td>Accepted</td>
				                    @else
										<td>More details</td>
				                    @endif 
				                    <td><a href="{{url('/Admins/KYC/').'/'.$kyc->id}}"><button class="btn">View</button></a></td>
				                </tr>
				                @endforeach
				            </tbody>
				        </table>
				    </div>
			    </div>
		    </div>
	    </div>
	</div>

</div>
@elseif($breview=="review")
<?php
if (($dkyc['front_orig'] != NULL ) AND ($dkyc['back_orig'] != NULL)) $passed_passport = "checked" ; 
else $passed_passport = "";

if ($dkyc['bill_orig'] != NULL ) $passed_utility = "checked" ; 
else $passed_utility = "";

if ($dkyc['selfie_orig'] != NULL ) $passed_selfie = "checked" ; 
else $passed_selfie = "";
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> Review KYC
            <a href="{{url('/Admins')}}/KYC" class="btn btn-primary btn-md pull-right">
              Back
            </a>
        </h3>
        
        <hr>

		<div class="row">
		    <div class="col-md-12">
			    <div class="portlet light bordered">
			                            
			        <h1>Status: 
						@if($dkyc->status=='pending')
	                    	Pending
	                    @elseif($dkyc->status=='declined')
							Declined
	                    @elseif($dkyc->status=='accepted')
							Accepted
	                    @else
							More details
	                    @endif 
			        </h1>
			                            
			        <div class="portlet-title">
			            <div class="caption font-dark">

			            </div>

			            <div class="tools"> </div>
			        </div>

			        <div class="portlet-body">
					    <div class="row">
					        <div class="col-md-4">
					            <div class="form-group"><label class="control-label" for="id_first_name">User
					                    name</label>
					                <div class="form-control">{{$dkyc->username}}</div>
					            </div>
					        </div>
					        <div class="col-md-4">
					            <div class="form-group"><label class="control-label" for="id_last_name">First
					                    Name</label>
					                <div class="form-control">{{$duser->where('email',$dkyc->username)->first()->fname}}</div>
					            </div>
					        </div>
					        <div class="col-md-4">
					            <div class="form-group"><label class="control-label" for="id_last_name">Last
					                    Name</label>
					                <div class="form-control">{{$duser->where('email',$dkyc->username)->first()->fname}}</div>
					            </div>
					        </div>
					    </div>

					    <div class="row">
					        <div class="col-md-4">
					            <div class="form-group"><label class="control-label"
					                                           for="id_first_name">Gender</label>
					                <div class="form-control">{{$duser->where('email',$dkyc->username)->first()->gender}}</div>
					            </div>
					        </div>
					        <div class="col-md-4">
					            <div class="form-group"><label class="control-label" for="id_last_name">Date of
					                    Birth</label>
					                <div class="form-control">{{$duser->where('email',$dkyc->username)->first()->dob}}</div>
					            </div>
					        </div>
					        <div class="col-md-4">
					            <div class="form-group"><label class="control-label"
					                                           for="id_last_name">Country</label>
					                <div class="form-control">{{$duser->where('email',$dkyc->username)->first()->location}}</div>
					            </div>
					        </div>
					    </div>

					    <div class="row well">
					        <div class="col-md-3">
					            <a href="">
					                
					            </a>
					        </div>


					        <div class="col-md-3">
					            <a href="">
					                
					            </a>
					        </div>
					        
					        <div class="col-md-3">
					            <a href="">
					               
					            </a>
					        </div>

					        <div class="col-md-3">
					            <a href="">
					               
					            </a>
					        </div>
					    </div>
			    
			    
					    <div class="form-actions text-center">
					        <div class="form-group">
					            <form method="POST" action="{{url('/Admins/KycManage')}}">
					            	{{ csrf_field() }}
					                <input type="hidden" name="id_kyc" value="{{$dkyc->id}}">
					                <input type="submit" name="verf" value="Upgrade Account" class="btn btn-primary btn-lg">
					            </form>
					            
					            <br><br>
					            <hr style="border-top: 2px solid #040404;">
					            
					            <form method="POST" class="form-horizontal" action="{{url('/Admins/KycManage')}}">
					            	{{ csrf_field() }}
					                <div class="row">
					                    
					                    <div class="col-md-4">
					                        <div class="form-group">
					                        <label class="col-md-12"><strong>Passport Allow</strong></label>
					                        <div class="col-md-12">
					                        <input data-toggle="toggle" {{$passed_passport}} data-onstyle="success" data-offstyle="danger" data-on="Allow" data-off="Disallow"  data-width="100%" type="checkbox" name="pPass">
					                        </div>
					                        </div>
					                    </div>
					                    <div class="col-md-4">
					                        <div class="form-group">
					                        <label class="col-md-12"><strong>Selfie Photo Allow</strong></label>
					                        <div class="col-md-12">
					                        <input data-toggle="toggle" {{$passed_selfie}} data-onstyle="success" data-offstyle="danger" data-on="Allow" data-off="Disallow"  data-width="100%" type="checkbox" name="pSelfie">
					                        </div>
					                        </div>
					                    </div>
					                    <div class="col-md-4">
					                        <div class="form-group">
					                        <label class="col-md-12"><strong>Utility Bill Allow</strong></label>
					                        <div class="col-md-12">
					                        <input data-toggle="toggle" {{$passed_selfie}} data-onstyle="success" data-offstyle="danger" data-on="Allow" data-off="Disallow"  data-width="100%" type="checkbox" name="pUtility">
					                        </div>
					                        </div>
					                    </div>
					                </div>
					            
					                <input type="hidden" name="id_kyc" value="{{$dkyc->id}}">
					                <input type="submit" name="declined" value="Decline" class="btn btn-primary btn-lg">
					            </form>
					        </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endif

@endsection