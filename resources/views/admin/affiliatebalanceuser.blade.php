@extends('layouts.admin')

@section('content')
<?php
$cur = App\Models\General_setting::find(1)->cur;
$sponsor_bonus = App\Models\Sponsor_bonus::where('user_id',$duser->id)->first();
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"><i class="fa fa-money"></i> add / substruct affiliate balance</h3>
        <hr>

        <div class="row">
            <div class="col-md-8">


                <!-- BTC -->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-cog"></i> add / substruct affiliate btc balance to {{$duser->uname}}
                        </div>
                    </div>
                    <div class="portlet-body">

                        <form action="{{url('/Admins/AddUserAffiliateBalance')}}" method="post">
                        	{{ csrf_field() }}
							<input type="hidden" name="btc">
							<input type="hidden" name="id" value="{{$duser->id}}">
                            <div class="row uppercase">

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong>OPERATION</strong></label>
                                        <div class="col-md-12">
                                            <input data-toggle="toggle" checked data-onstyle="success"
                                                   data-offstyle="danger" data-on="Add BTC" data-off="substruct BTC"
                                                   data-width="100%" data-height="46" type="checkbox" name="operation">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Amount</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group mb15">
                                                <input type="hidden" value="btc" name="coin">
                                                <input class="form-control input-lg" name="amount" type="text"
                                                       required="">
                                                <span class="input-group-addon">BTC</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- row -->

                            <br><br>

                            <div class="row uppercase">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Message</strong></label>
                                        <div class="col-md-12">
                                            <textarea name="message" rows="2" class="form-control"
                                                      placeholder="if any"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- row -->

                            <br><br>
                            <div class="row uppercase">
                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-success btn-lg btn-block"> SUBMIT</button>

                                </div>
                            </div><!-- row -->

                        </form>
                    </div>
                </div>

                <!-- ETH -->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-cog"></i> add / substruct affiliate eth balance to {{$duser->uname}}
                        </div>
                    </div>
                    <div class="portlet-body">

                        <form action="{{url('/Admins/AddUserAffiliateBalance')}}" method="post">
                        	{{ csrf_field() }}
							<input type="hidden" name="eth">
							<input type="hidden" name="id" value="{{$duser->id}}">
                            <div class="row uppercase">

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong>OPERATION</strong></label>
                                        <div class="col-md-12">
                                            <input data-toggle="toggle" checked data-onstyle="success"
                                                   data-offstyle="danger" data-on="Add ETH" data-off="substruct ETH"
                                                   data-width="100%" data-height="46" type="checkbox" name="operation">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Amount</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group mb15">
                                                <input type="hidden" value="eth" name="coin">
                                                <input class="form-control input-lg" name="amount" type="text"
                                                       required="">
                                                <span class="input-group-addon">ETH</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- row -->

                            <br><br>

                            <div class="row uppercase">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Message</strong></label>
                                        <div class="col-md-12">
                                            <textarea name="message" rows="2" class="form-control"
                                                      placeholder="if any"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- row -->

                            <br><br>
                            <div class="row uppercase">
                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-success btn-lg btn-block"> SUBMIT</button>

                                </div>
                            </div><!-- row -->

                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-money"></i> CURRENT BALANCE
                        </div>
                    </div>
                    <div class="portlet-body uppercase text-center">

                        <h1>CURRENT AFFILIATE BONUS BALANCE OF <br> <strong>{{$duser->uname}}</strong></h1>
                        <br>

                        <h1><strong>{{number_format($sponsor_bonus->btc_bonus,8,'.','')}} BTC</strong></h1>
                        <br><br>
                        <h1><strong>{{number_format($sponsor_bonus->eth_bonus,8,'.','')}} ETH</strong></h1>
                        <br><br>

                    </div>
                </div>
            </div>

        </div><!-- ROW-->

    </div>
</div>

@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endsection

@section('additional_js')

@endsection