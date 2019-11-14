@extends('layouts.admin')

@section('content')
<?php
$cur = App\Models\General_setting::find(1)->cur;
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"><i class="fa fa-money"></i> add / substruct balance</h3>
        <hr>

        <div class="row">
            <div class="col-md-8">

                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-cog"></i> add / substruct balance to {{$duser->uname}}
                        </div>
                    </div>
                    <div class="portlet-body">

                        <form action="{{url('/Admins/AddUserBalance')}}" method="post">
                        	{{ csrf_field() }}
							<input type="hidden" name="cgc">
							<input type="hidden" name="id" value="{{$duser->id}}">
                            <div class="row uppercase">

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong>OPERATION</strong></label>
                                        <div class="col-md-12">
                                            <input data-toggle="toggle" checked data-onstyle="success"
                                                   data-offstyle="danger" data-on="Add Fillit" data-off="substruct Fillit"
                                                   data-width="100%" data-height="46" type="checkbox" name="operation">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="col-md-12"><strong>Amount</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group mb15">
                                                <input type="hidden" value="cgc" name="coin">
                                                <input class="form-control input-lg" name="amount" type="text"
                                                       required="">
                                                <span class="input-group-addon">{{$cur}}</span>
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

                <!-- BTC -->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption uppercase bold">
                            <i class="fa fa-cog"></i> add / substruct balance to {{$duser->uname}}
                        </div>
                    </div>
                    <div class="portlet-body">

                        <form action="{{url('/Admins/AddUserBalance')}}" method="post">
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
                            <i class="fa fa-cog"></i> add / substruct balance to {{$duser->uname}}
                        </div>
                    </div>
                    <div class="portlet-body">

                        <form action="{{url('/Admins/AddUserBalance')}}" method="post">
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

                        <h1>CURRENT BALANCE OF <br> <strong>{{$duser->uname}}</strong></h1>
                        <br>
                        <h1><strong>{{number_format($duser->acgc,3,'.','')}} {{$cur}}</strong></h1>
                        <br><br>
                        <h1><strong>{{number_format($duser->btc,8,'.','')}} BTC</strong></h1>
                        <br><br>
                        <h1><strong>{{number_format($duser->eth,8,'.','')}} ETH</strong></h1>
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