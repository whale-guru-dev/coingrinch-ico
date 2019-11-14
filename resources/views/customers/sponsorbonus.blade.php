@extends('layouts.customer')

@section('additional_vendor_css')
<link href="{{asset('customer/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" media="screen">
<link rel="stylesheet" href="{{asset('customer/vendor/sweetalert/dist/sweetalert.css')}}">
<script src="{{asset('customer/vendor/sweetalert/dist/sweetalert.min.js')}}"></script>

@endsection

@section('additional_css')
<style type="text/css">
    .cs-placeholder{
        display: none;
    }
    .vertical{
        margin-top: auto;
        margin-bottom: auto;
    }
</style>
@endsection

@section('breadcrumb')
<div class="breadcrumb-wrapper">
    <ul class="pull-right breadcrumb">
        <li>
            <a href="{{url('/Customers')}}"><i class="fa fa-home margin-right-5 text-large text-white"></i>Home</a>
        </li>
        <li>
            <a href="{{url('/Customers/Sponsorbonus')}}">Sponsor Bonus</a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<?php 
    $i=1;
    $avail_btc = App\Models\Sponsor_bonus::where('user_id', Auth::user()->id)->first()->btc_bonus;
    $avail_eth = App\Models\Sponsor_bonus::where('user_id', Auth::user()->id)->first()->eth_bonus;
?>
<div class="wrap-content container" id="container">
    <!-- start: BREADCRUMB -->

    <!-- end: BREADCRUMB -->
    <!-- start: DYNAMIC TABLE -->
    <div class="container-fluid container-fullw">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <h5 class="over-title margin-bottom-15"><span class="text-bold">Your Bonus Balance</span></h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-blue">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-4">
                                                <img src="{{asset('customer/custom/img/bitcoinx50.png')}}" width="50"> <span style="font-size: 15px;">BTC</span>
                                            </div>
                                            <div class="col-md-5">
                                                <br>
                                                <span>{{$avail_btc}}</span> BTC
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-blue">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-4">
                                                <img src="{{asset('customer/custom/img/ethx50.png')}}" width="50">  <span style="font-size: 15px;">ETH</span>
                                            </div>
                                            <div class="col-md-5">
                                                <br>
                                                <span>{{$avail_eth}}</span> ETH
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-white">
                    <div class="panel-body">
                        <h5 class="over-title margin-bottom-15 text-bold">Bonus History</h5>
                        <hr>
                        <p>
                            You can see your affilate bonus history in this table.
                        </p>
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="hidden-xs">Time</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th class="hidden-xs">Details</th>
                                </tr>
                            </thead>
                            @if(count($dcrypto)>0)
                            <tbody>

                                @foreach($dcrypto as $crypto)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td class="hidden-xs">{{$crypto->tm}}</td>
                                    <td><span class="label label-sm label-success">{{$crypto->coin}}</span></td>
                                    <td>{{$crypto->amount}}</td>
                                    <td class="hidden-xs">{{$crypto->details}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                            @else
                            <tr id="no-item-found-alert" class="enabled">
                              <td colspan="5"><div class="text-center">You have not any bonus. Once you have, they will appear here.</div></td>
                          </tr>
                          @endif
                        </table>
                    </div>
                </div>

                <div class="panel panel-white">
                    <div class="panel-body">
                        <h5 class="over-title margin-bottom-15"><span class="text-bold">Withdraw</span></h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <form role="form" class="form-vertical">
                                    {{ csrf_field() }}
                                    <div class="form-group">
									    <label for="form-field-select-2"> Select a Currency </label>
                                        <select class="cs-select cs-skin-elastic"  id="currency">
                                            <option value="" disabled selected>Select a Currency</option>
                                            <option value="eth"></option>
                                            <option value="btc"></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="form-field-select-2"> Address </label>
                                        <input type="text" placeholder="Address"  id="address" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-field-select-2"> Amount </label>
                                        <input type="number" placeholder="Amount"  id="amount" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <hr>
                                    <div class="col-md-offset-1 col-md-10" style="text-align: justify;">
                                        <p style="font-size:13px;"><b>Note</b> : This withdrawal function is only opened for sponsors of Grinch Token.<br>
                                        Thanks for your participation into our affiliate program.<br><br>
                                        <b>Attention</b> : You can not withdraw your sponsor bonus if it is smaller than 0.001ETH or 0.00000001BTC.</p>
                                        <hr>
                                    </div>

                                    <div class="col-md-offset-4 col-md-3">
                                        <button class="btn btn-primary" type="button" onclick="event.preventDefault();verify();">Withdraw</button>
                                        <hr>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
        <!-- end: DYNAMIC TABLE -->
</div>




@endsection

@section('modal')
<!-- Modal -->
<div id="withdrow" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Withdrawal</h3>
            </div>
            <div class="modal-body">
                <form role="form" class="form-vertical" action="{{url('/Customers/Sponsorwithdraw')}}" method="POST" id="withdraw_form">
                {{ csrf_field() }}
                <h4>Please check your email. This is a security check for withdrawal. Please input the verification code here.</h4>
                Code : <input type="text" name="code">
                <br><br>
                <input type="hidden" name="currency" id="curr">
                <input type="hidden" name="address" id="addr">
                <input type="hidden" name="amount" id="amt">
                <button class="btn btn-primary" type="button" onclick="event.preventDefault();document.getElementById('withdraw_form').submit();">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_vendor_js')

@endsection

@section('additional_js')

<script src="{{asset('customer/vendor/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('customer/custom/js/selectFx/classie.js')}}"></script>
<script src="{{asset('customer/custom/js/selectFx/selectFx.js')}}"></script>
<script src="{{asset('customer/custom/js/form-elements.js')}}"></script>

<script src="{{asset('customer/vendor/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('customer/vendor/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

<!-- start: JavaScript Event Handlers for this page -->
<script src="{{asset('customer/custom/js/table-data.js')}}"></script>
<script>
    jQuery(document).ready(function() {
        TableData.init();
		$("li[data-value='btc']").html("<img src='{{asset('customer/custom/img/bitcoinx50.png')}}' width='20'>&nbsp;&nbsp;BTC");
		$("li[data-value='eth']").html("<img src='{{asset('customer/custom/img/ethx50.png')}}' width='20'>&nbsp;&nbsp;ETH");
    });

    
    function verify(){
        if($("#currency").val() != null && $("#address").val()!='' && $("#amount").val()!=''){
                $.ajax({
                url: '{{url('/Customers/SponsorwithdrawVerify')}}',
                type: 'POST',
                data: {
                    '_token' : '{{csrf_token()}}',
                    'curr' : $("#currency").val(),
                    'amount' : $("#amount").val()
                },
                dataType: 'html',
                success: function (data) {
                   data= jQuery.parseJSON(data);
                  if(data['status']=='ok'){
                        $("#withdrow").modal('show'); 
                        $("#curr").val($("#currency").val());
                        $("#addr").val($("#address").val());
                        $("#amt").val($("#amount").val());
                  }else{
                    swal({title: "Something went wrong",text: "Please try again!" , type: "error",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
                  }
                },
                error: function () {
                    alert("Something went wrong!");
                }
            });
            }else{
                swal({title: "Something went wrong",text: "Please input all information!" , type: "error",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
            }
        
        
    }

    
    
</script>



@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
@endsection