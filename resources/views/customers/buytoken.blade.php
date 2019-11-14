@extends('layouts.customer')

@section('additional_vendor_css')

<?php
$user = Auth::user();

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;

$configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
$client = Client::create($configuration);
$rates = $client->getExchangeRates();
$btcx = $client->getSpotPrice('BTC-USD');
$btc = $client->decodeLastResponse();
$ethx = $client->getSpotPrice('ETH-USD');
$eth = $client->decodeLastResponse();

$total_btc_usd=$user['btc']* $btc['data']['amount'];
$total_eth_usd=$user['eth']* $eth['data']['amount'];
$totalx=$total_btc_usd+$total_eth_usd;

$coin_price['eth'] = $eth['data']['amount'];
$coin_price['btc'] = $btc['data']['amount'];

$dbatch = App\Models\Batch::all();
$curBatch = App\Models\Batch::where('status',2)->first();
if($curBatch) {
  $ptoken = $curBatch->price;
  $dbonus = $curBatch->bonus;
  $curStatus = 1;
}else{
  $ptoken = 0;
  $dbonus = 0;
  if(App\Models\Batch::find(1)->status == 1){
    $curStatus = 0;//not started yet
  }elseif(App\Models\Batch::last()->status == 3){
    $curStatus = 2;//finished
  }
}


$cur = App\Models\General_setting::find(1)->cur;
$min_grt = App\Models\General_setting::find(1)->min_grt;
?>

<style type="text/css">
  .calculator {
      background: white;
      position: relative;
      text-align: center;
  }
  .calculator .left, .calculator .right {
      width: 50%;
      float: left;
      position: relative;
      padding-top: 25px;
  }

  .clear {
      clear: both;
      display: block;
      font-size: 0;
      line-height: 0;
      margin: 0;
  }

  .calculator .total, .calculator .bonus {
      padding: 15px 0;
      text-align: center;
      width: 50%;
      height: 65px;
      position: relative;
      float: left;
  }
  .calculator .form-group {
      display: inline-block;
      margin: 0 0 10px;
      vertical-align: top;
  }
  .calculator input.form-control {
      border-bottom: 1px solid #D2D2D2 !important;
      background-image: none;
  }
  .calculator .form-group label {
      font-family: 'mullermedium';
      font-size: 12px;
      color: black;
      display: block;
      text-align: center;
      word-break: break-all;
  }
  .calculator .direction {
      position: absolute;
      right: -21px;
      z-index: 10;
      background-color: #0685e2;
      color: rgb(255, 255, 255);
      border-radius: 50%;
      box-shadow: 0 1px 1.5px 0 rgba(0,0,0,0.12), 0 1px 1px 0 rgba(0,0,0,0.24);
      font-size: 24px;
      height: 42px;
      line-height: normal;
      margin-top: 15px;
      min-width: 42px;
      overflow: hidden;
      padding: 0;
      width: 42px;
  }

  .calculator .direction i {
      margin-top: 8px;
  }
  .fa {
      display: inline-block;
      font: normal normal normal 14px/1 FontAwesome;
      font-size: inherit;
      text-rendering: auto;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
  }

  .calculator .total>span, .calculator .bonus>span {
      display: block;
      font-family: 'mullermedium';
      font-size: 10px;
      color: black;
      margin-bottom: 2px;
      line-height: 1;
  }
  .calculator .total div, .calculator .bonus div {
      line-height: 1;
      font-family: 'mullermedium';
      font-size: 24px;
      color: black;
  }

  .buy-token-btn .btn{
    background-color: #0685e2;
  }

  .modal-header{
    background-color:#008CFF;
  }

  .modal-header h3{
    color:white;
  }

  .modal-body {
    color: black;
  }

  .modal-body a {
    color:#008CFF;
  }

  .modal-body button {
    background-color: #008cff;
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
        <a href="{{url('/Customers/BuyTokens')}}">Buy Tokens</a>
      </li>
    </ul>
  </div>
@endsection

@section('content')
<div class="wrap-content container" id="container">
  <!-- start: BREADCRUMB -->

  <!-- end: BREADCRUMB -->
  <!-- start: DYNAMIC TABLE -->
  <div class="container-fluid container-fullw">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-white">
          <div class="panel-body">
            <h5 class="over-title margin-bottom-15"><span class="text-bold">ICO CALENDAR</span></h5>
            <hr>
              @if($curStatus == 1)
              <div class="alert alert-info">
              Reminder: Now Crowdsale is in progress. During Crowdsale, you will only have the ability to deposit Funds. You will not be able to withdraw your funds until the ICO ends.
              </div>
              @elseif($curStatus == 0)
              <div class="alert bg-yellow">
              Reminder: Crowdsale will be started soon. Please deposit your funds to participate into token sale which starts from June 1st.
              </div>
              @elseif($curStatus == 2)
              <div class="alert alert-success">
              Reminder: ICO has been ended. Thanks for being part of CoinGrinch family. Please wait for us until we launch the world premier cryptocurrency exchange. Thank you.
              </div>
              @endif
            <div class="table-responsive">
              <table class="table table-bordered table-hover text-center" id="sample-table-1">
                <thead>
                  <tr>
                    <th class="text-center">Date From</th>
                    <th class="text-center">Date To</th>
                    <th class="text-center">Token Price</th>
                    <th class="text-center">Bonus</th>
                    <th class="text-center">Details</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dbatch as $batch)
                  <tr>
                    <td>{{$batch->date_from}}</td>
                    <td>{{$batch->date_to}}</td>
                    <td>{{$batch->price}} $</td>
                    <td>{{$batch->bonus}} %</td>
                    <td>
                      @if($batch->status == 3)
                      <span class="label label-sm label-success">Sold</span>
                      @elseif($batch->status == 2)
                      <span class="label label-sm label-warning">On Going</span>
                      @elseif($batch->status == 1)
                      <span class="label label-sm label-info">Waiting</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel panel-white">
          <div class="panel-body">
            <h5 class="over-title margin-bottom-15"><span class="text-bold">Buy Tokens</span></h5>
            <hr>
            <div class="row">
              <div class="col-md-6" style="border-right: 1px solid #060606;">
                <div class="text-center">There are {{$user['btc']}} BTC , {{$user['eth']}} ETH in your wallet.</div>
                <div class="calculator">
                  @if($curStatus == 0)
					  <div class="alert bg-yellow">
						ICO has not started yet.
					  </div>
                  @elseif($curStatus == 2)
					  <div class="alert bg-yellow">
						ICO has been ended.
					  </div>
                  @endif
                  <div class="row" >
                    <div class="left col-md-6">
                      <div class="form-group">
                        <label>GRT AMOUNT</label>
                        <input id="coin-amount" type="number" class="form-control" value="0">
                      </div>
                      <span class="direction" data-direction="right">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                      </span>
                    </div>
                    <div class="right  col-md-6">
                      <div class="form-group is-empty">
                        <label>BTC/ETH AMOUNT</label>
                        <input type="number" id="coin-price" class="form-control" value="" >
                        <br><span style="color:black">Pay with:</span> 
                        <select id="cpayw" name="cpaywith">
                          <option value="btc">BTC</option>
                          <option value="eth">ETH</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="clear"></div>
                  <div class="row">
                    <div class="bonus col-md-6">
                      <span><span id="coin-bonus-percent">{{$dbonus}} %</span> BONUS:</span>
                      <div><span id="coin-bonus">0.0</span> {{$cur}}</div>
                    </div>
                    <div class="total col-md-6">
                      <span>YOU WILL GET:</span>
                      <div><span id="coin-total">0.0</span> {{$cur}}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6" >
                <br>
                <div class="col-md-offset-1 col-md-10" style="text-align: center;">
                    <p style="font-size:15px; font-weight: bold;">Minimum amount to purchase: {{$min_grt}} GRT.</p>
                    <hr>
                </div>
                <div class="buy-token-btn text-center">
                      @if($curStatus == 1)
                        @if(($user->eth==0)&&($user->btc==0))
                          <p><button data-toggle="modal" data-target="#dipositx" class="btn btn-primary btn-lg">Buy GRT</button></p>
                        @else
                          <p><button onclick="kila();"  class="btn btn-primary btn-lg">Buy GRT</button></p>
                        @endif
                      @endif
                    <hr>
                </div>
                <div class="col-md-offset-1 col-md-10" style="text-align: center;">
                   <div id="response_kil"></div>
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
<div id="purchase_token" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Token Purchase</h3>
      </div>
      <div class="modal-body">
        <center>
          <div id="response_kil"></div>
          <p>Totally, you have <?php echo number_format($totalx,2,'.',',') ?> USD on your wallet. <br><br> How many tokens are you going to purchase?<br></p>
          <br><span style="color:black">Pay with:</span> 
          <select id="payw" name="paywith">
            <option value="btc">BTC</option>
            <option value="eth">ETH</option>
          </select>
          <br><br><span style="color:black;font-size:20px;">GRINCH</span><Br>
          <input name="grinchval" id="grinchval" type="number" step="0.001">
          <br><br><br><p>Price: <span id="updat">0.00</span> USD</p><p id="updatx"></p>  <br><br>
          <button type="submit" onclick="kila();" class="btn btn-primary btn-lg">Submit</button>
        </center>
      </div>
    </div>
  </div>
</div>

      
      <!-- Modal -->
<div id="dipositx" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Make Deposit</h3>
      </div>
      <div class="modal-body">
        <p>You haven’t deposited any funds. To purchase tokens , please make a deposit on <a class="ajax-link" href="Wallet">Wallet page</a></p>
      </div>
    </div>
  </div>
</div>

<!-- For ether wallet address not registed user -->
<div id="notiamount" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Warning !</h3>
      </div>
      <div class="modal-body">
        <p>Minimum purchasing amount is {{$min_grt}} GRT.  Please input proper GRT amount to buy.</p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('additional_vendor_js')

@endsection

@section('additional_js')
<script type="text/javascript">
    function kila() {

      if($('#coin-amount').val() >= {{$min_grt}}){
        $.ajax({
            url: '{{url('/Customers/PurchaseToken')}}',
            type: 'POST',
            data: {
                '_token' : '{{csrf_token()}}',
                'caxa': $('#cpayw').val(),
                'amount': $('#coin-amount').val(),
                'eth' : token_price['eth'],
                'btc' : token_price['btc']
            },
            dataType: 'html',
            success: function (data) {
               data= jQuery.parseJSON(data);
              if(data['status']=='ok'){
                    $('#response_kil').html('<div class="alert alert-success">\n' +
                        '  <strong>Success!</strong> '+data['message'] +
                        '</div>'); // success
              }else if(data['status']=='no'){
                    $('#response_kil').html('<div class="alert alert-warning">\n' +
                        '  <strong>Error!</strong> '+data['message'] +
                        '</div>'); // error
              }else{
                  $('#response_kil').html('<div class="alert alert-warning">\n' +
                      '  <strong>Error!</strong> '+data['message']  +
                      '</div>');
                }

            },
            error: function () {
                alert("Something went wrong!");
            }
        });
      }else{
        $("#notiamount").modal('show');
      }
        

    }

   var tok_val={{$ptoken}};
   var grinch = $('#grinchval');
   var payw = $('#payw');

   var token_price = {
      'eth'  : {{$coin_price['eth']}},
      'btc': {{$coin_price['btc']}}
    };

    var pret_cur = 0;

    if($('#payw').val()=='eth')
        pret_cur = token_price['eth'];
    else
        pret_cur = token_price['btc'];


   $('#payw').on('change', function() {
    if($('#payw').val()=='eth')
        pret_cur = token_price['eth'];
    else
        pret_cur = token_price['btc'];
       $("#updatx").html('Estimated cryptocurrency: <span id="updatxa">' + ((grinch.val() * tok_val) / pret_cur) + '</span> ' + $('#payw').val().toUpperCase());
   });


   grinch.keyup(function (t) {
       $("#updat").html((tok_val*grinch.val()).toFixed(2));
       if($('#payw').val()!='usd') {
           $("#updatx").html('Estimated cryptocurrency: <span id="updatxa">' + ((grinch.val() * tok_val) / pret_cur) + '</span> ' + $('#payw').val().toUpperCase());
       }
   });

   var calc_cgc_amt = $('#coin-amount');
   var calc_coin_amt = $('#coin-price');
   var bonus = {{$dbonus}};
   var cpret_cur = 0;

   if($('#cpayw').val()=='eth')
        cpret_cur = token_price['eth'];
    else
        cpret_cur = token_price['btc'];


   $('#cpayw').on('change', function() {

    if($('#cpayw').val()=='eth')
        cpret_cur = token_price['eth'];
    else
        cpret_cur = token_price['btc'];
      
       $("#coin-price").val(((calc_cgc_amt.val() * tok_val) / cpret_cur));
   });

   calc_cgc_amt.bind("paste keyup",function (event) {
       var _this = this;
        // Short pause to wait for paste to complete
        setTimeout( function() {
           $('#coin-bonus').html((bonus*$(_this).val()/100).toFixed(2));
           $('#coin-total').html(((100+bonus)*$(_this).val()/100).toFixed(2));

           if($('#cpayw').val()!='usd') {
               $("#coin-price").val((($(_this).val() * tok_val) / cpret_cur));
           }
        }, 100);
   });
        

   calc_coin_amt.bind("paste keyup",function(event){
       var _this = this;
        // Short pause to wait for paste to complete
        setTimeout( function() {
           $('#coin-bonus').html((bonus*$(_this).val() * cpret_cur / tok_val/100).toFixed(2));
           $('#coin-total').html(((100+bonus)*$(_this).val() * cpret_cur / tok_val/100).toFixed(2));

           if($('#cpayw').val()!='usd') {
               $("#coin-amount").val((($(_this).val() * cpret_cur / tok_val)));
           } 
        }, 100);
   });

</script>
@endsection