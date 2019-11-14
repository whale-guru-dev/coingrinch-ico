@extends('layouts.admin')

@section('content')
<?php
	$kyc_verified=$duser['kyc_verified']==1 ? "checked" : "";
	$ether_set=$duser['ether_addr'] != NULL ? "checked" : "";
	$bst = $duser['block']==0 ? "checked" : "";
	$evst = $duser['ev']==1 ? "checked" : "";
	$mvst = $duser['mv']==1 ? "checked" : "";
	$cur = App\Models\General_setting::find(1)->cur;
?>
<div class="page-content-wrapper">
	<div class="page-content">
		<h3 class="page-title uppercase bold"> USER Details</h3>
		<hr>

		<div class="row">

			<div class="col-md-3">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption uppercase bold">
							<i class="fa fa-user"></i> PROFILE
						</div>
					</div>
					<div class="portlet-body text-center">
						<img src="{{asset('assets/propic/').'/'.$duser['propic']}}" class="img-responsive propic" alt="Profile Pic"> 
						<h2 class="bold">{{ $duser['uname']}}</h2>
						<h3>{{$duser['email']}}</h3>
						<h3 class="bold">BALANCE : {{$duser['acgc']}} {{$cur}}</h3>
						<br><hr><br>
						<p class="bold">Active {{$dlogin['tm']}}</p>
						<br><hr><br>
						<p>
							<strong>Last Login From</strong> <br> {{$dlogin['ip'].' - '.$dlogin['location'] }}<br> Using {{$dlogin['ua']}} 
							<br>
							<i class="bold">{{$dlogin['tm']}}</i>
						</p>
						<br><hr><br>
						<p>
							<strong>ADDRESSES</strong><br>
							
							@if(App\Models\Addresses::where('useremail',$duser['email'])->first())
							<strong>BTC:</strong><br> 
							{{App\Models\Addresses::where('useremail',$duser['email'])->first()->btc}}
							<br><strong>ETH:</strong><br> 
							{{App\Models\Addresses::where('useremail',$duser['email'])->first()->eth}}
							
							@endif
						</p>
					</div>
				</div>
			</div>


			<div class="col-md-9">
				<div class="row">

					<div class="col-md-12">
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption uppercase bold">
									<i class="fa fa-desktop"></i> Details 
								</div>
							</div>
							<div class="portlet-body">

								<div class="row">

									<!-- START -->
									<a href="{{url('/Admins/UsersTransaction/'.$duser['id'])}}">

										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
											<div class="dashboard-stat blue">
												<div class="visual">
													<i class="fa fa-th"></i>
												</div>
												<div class="details">
													<div class="number">
														<span data-counter="counterup" data-value="{{$ctrx}}">{{$ctrx}}</span>
													</div>
													<div class="desc uppercase"> TRANSACTIONS </div>
												</div>
												<div class="more">
													<div class="desc uppercase bold text-center"> 
														{{$cur}}
														<span data-counter="counterup" data-value="{{$ctrx}}">{{$ctrx}}</span> TRANSACTED
													</div>
												</div>
											</div>
										</div>

									</a>
								<!-- END -->

								    <!-- START -->
								    <a href="{{url('/Admins/UsersDeposit/'.$duser['id'])}}">

								        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
								            <div class="dashboard-stat blue">
								                <div class="visual">
								                    <i class="fa fa-th"></i>
								                </div>
								                <div class="details">
								                    <div class="number">
								                        <span data-counter="counterup" data-value="{{$cdeposit}}">{{$cdeposit}}</span>
								                    </div>
								                    <div class="desc uppercase"> DEPOSITS </div>
								                </div>
								                <div class="more">
								                    <div class="desc uppercase bold text-center">
								                        {{$cur}}
								                        <span data-counter="counterup" data-value="{{$cdeposit}}">{{$cdeposit}}</span> TRANSACTED
								                    </div>
								                </div>
								            </div>
								        </div>
								    </a>
								    <!-- END -->

									<!-- START -->
									<a href="{{url('/Admins/UsersReferral/'.$duser['id'])}}">
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
											<div class="dashboard-stat green">
												<div class="visual">
													<i class="fa fa-download"></i>
												</div>
												<div class="details">
													<div class="number">
														<span data-counter="counterup" data-value="{{$creferral}}">{{$creferral}}</span>
													</div>
													<div class="desc uppercase"> Referrals </div>
												</div>
												<div class="more">
													<div class="desc uppercase bold text-center"> 
														<span data-counter="counterup" data-value="{{$creferral}}">{{$creferral}}</span> Total
													</div>
												</div>
											</div>
										</div>
									</a>
									<!-- END -->

									<!-- START -->
									<a href="{{url('/Admins/UsersWithdraw/'.$duser['id'])}}">
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
											<div class="dashboard-stat red">
												<div class="visual">
													<i class="fa fa-upload"></i>
												</div>
												<div class="details">
													<div class="number">
														<span data-counter="counterup" data-value="{{$cwithdrawal}}">{{$cwithdrawal}}</span>
													</div>
													<div class="desc uppercase"> WITHDRAW  Request</div>
												</div>
												<div class="more">
													<div class="desc uppercase bold text-center"> 
														{{$cur}}
														<span data-counter="counterup" data-value="{{$cwithdrawal}}">{{$cwithdrawal}}</span> WITHDRAWN
													</div>
												</div>
											</div>
										</div>
									</a>
									<!-- END -->

									<!-- START -->
									<a href="{{url('/Admins/UsersLogin/'.$duser['id'])}}">
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
											<div class="dashboard-stat yellow">
												<div class="visual">
													<i class="fa fa-sign-in"></i>
												</div>
												<div class="details">
													<div class="number">
														<span data-counter="counterup" data-value="{{$clogin}}">{{$clogin}}</span>
													</div>
													<div class="desc uppercase"> LOGINS</div>
												</div>
												<div class="more">
													<div class="desc uppercase bold text-center"> 
														view details
													</div>
												</div>
											</div>
										</div>
									</a>
									<!-- END -->

								</div>

							</div>
						</div>
					</div>


					<div class="col-md-12">
						<div class="portlet box blue-ebonyclay">
							<div class="portlet-title">
								<div class="caption uppercase bold">
									<i class="fa fa-cogs"></i> Operations
								</div>
							</div>
							<div class="portlet-body">
								<div class="row">

									<div class="col-md-3 uppercase">
										<a href="{{url('/Admins/BalanceUser/'.$duser['id'])}}" class="btn btn-primary btn-lg btn-block"> <i class="fa fa-money"></i> manage balance  </a>
									</div>

									<div class="col-md-3 uppercase">
										<a href="{{url('/Admins/AffiliateBalanceUser/'.$duser['id'])}}" class="btn btn-primary btn-lg btn-block"> <i class="fa fa-money"></i> manage affiliate balance  </a>
									</div>

									<div class="col-md-3 uppercase">
										<a href="{{url('/Admins/SMStoUser/'.$duser['id'])}}" class="btn btn-success btn-lg btn-block"> <i class="fa fa-envelope"></i> send SMS  </a>
									</div>

								    <div class="col-md-3 uppercase">
								        <a href="{{url('/Admins/EMAILtoUser/'.$duser['id'])}}" class="btn btn-success btn-lg btn-block"> <i class="fa fa-envelope"></i> send EMAIL  </a>
								    </div>

								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption uppercase bold">
									<i class="fa fa-cog"></i> Update Profile 
								</div>
							</div>
							<div class="portlet-body">

								<form action="{{url('/Admins/UserNormalUpdate')}}" method="post">
									{{ csrf_field() }}
									<input type="hidden" name="id" value="{{$duser->id}}">	
									<div class="row uppercase">

										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-12"><strong>user name</strong></label>
												<div class="col-md-12">
													<input class="form-control input-lg" name="username" value="{{$duser->uname}}" type="text">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-12"><strong>legal name</strong></label>
												<div class="col-md-12">
													<input class="form-control input-lg" name="legalname" value="{{$duser->lname}}" type="text">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-12"><strong>mobile</strong></label>
												<div class="col-md-12">
													<input class="form-control input-lg" name="mobile" value="{{$duser->mobile}}" type="text">
												</div>
											</div>
										</div>

									</div><!-- row -->

									<br><br>


									<div class="row uppercase">
									    <!-- <div class="col-md-4">
										    <div class="form-group">
											    <label class="col-md-12"><strong>KYC Verification</strong></label>
											    <div class="col-md-12">
											    	<input data-toggle="toggle" <?php echo $kyc_verified; ?> data-onstyle="success" data-offstyle="danger" data-on="Verified" data-off="Not Verified"  data-width="100%" type="checkbox" name="kyc_verified">
											    </div>
										    </div>
									    </div> -->



									    <div class="col-md-4">
									        <div class="form-group">
									            <label class="col-md-12"><strong>Ethereum Wallet Address Set</strong></label>
									            <div class="col-md-12"> 
									                <input data-toggle="toggle" <?php echo $ether_set; ?> data-onstyle="success" data-offstyle="danger" data-on="Set" data-off="Not Set"  data-width="100%" type="checkbox" disabled>
									            </div>
									        </div>
									    </div>

									</div>
									<br><br>

									<div class="row uppercase">

										<!-- <div class="col-md-4">
											<div class="form-group">
												<label class="col-md-12"><strong>Date of birth</strong></label>
												<div class="col-md-12">
													<input class="form-control input-lg" name="dob" value="{{$duser->dob}}" type="text">
												</div>
											</div>
										</div> -->

										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-12"><strong>gender</strong></label>
												<div class="col-md-12">
													<input class="form-control input-lg" name="gender" value="{{$duser->gender}}" type="text">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-12"><strong>Country</strong></label>
												<div class="col-md-12">
													<input class="form-control input-lg" name="location" value="{{$duser->location}}" type="text">
												</div>
											</div>
										</div>


									</div><!-- row -->

									<br><br>

									<div class="row uppercase">

										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-12"><strong>STATUS</strong></label>
												<div class="col-md-12">
													<input data-toggle="toggle" <?php echo $bst; ?> data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Blocked"  data-width="100%" type="checkbox" name="block">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-12"><strong>EMAIL VERIFICATION</strong></label>
												<div class="col-md-12">
													<input data-toggle="toggle" <?php echo $evst; ?> data-onstyle="success" data-offstyle="danger" data-on="Verified" data-off="Not Verified"  data-width="100%" type="checkbox" name="ev">
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-12"><strong>SMS VERIFICATION</strong></label>
												<div class="col-md-12">
													<input data-toggle="toggle" <?php echo $mvst; ?> data-onstyle="success" data-offstyle="danger" data-on="Verified" data-off="Not Verified"  data-width="100%" type="checkbox" name="mv">
												</div>
											</div>
										</div>

									</div><!-- row -->

									<br><br>

									<div class="row uppercase">

										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-12"><strong>E-mail</strong></label>
												<div class="col-md-12">

													<input type="text" name="email" class="form-control input-lg" value="{{$duser->email}}">

												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-12"><strong>Referred by(email converts to ref code)</strong></label>
												<div class="col-md-12">
													<input class="form-control input-lg" name="ref_by" placeholder="input referred by email" value="{{$duser->ref_by}}" type="text">
												</div>
											</div>
										</div>

									</div><!-- row -->

									<br><br>

									<div class="row">
										<div class="col-md-12">

											<button type="submit" class="btn blue btn-block btn-lg">UPDATE</button>

										</div>
									</div>

								</form>

							</div>
						</div>
					</div>

				</div>
			</div><!-- col-9 -->

		</div><!-- row -->

	</div>
</div>
@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endsection