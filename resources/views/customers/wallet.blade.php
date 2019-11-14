@extends('layouts.customer')

@section('additional_vendor_css')
<?php
$user = Auth::user();
$address = App\Models\Addresses::where('useremail',$user->email)->first();

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
$total_grt_usd=$user['acgc']* 0.25;
$totalx=$total_btc_usd+$total_eth_usd;

?>

<style type="text/css">
    .walletBtn{    
        position: relative;
        width: auto;
        font-weight: 600;
        color: rgb(255, 255, 255);
        cursor: pointer;
        font-family: "Avenir Next", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
        font-size: 12px;
        background-color: rgb(60, 144, 223);
        margin: 0px;
        padding: 5px 10px;
        border-radius: 4px;
        border-width: 1px;
        border-style: solid;
        border-color: rgb(46, 123, 196);
        border-image: initial;
    }
    table {
        font-size: 20px;
        height: 200px;
    }
    .dGAjpB {
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        flex-direction: row;
        flex: 1 1 auto;
    }
    .hgjLjo button {
        flex: 1 1 0%;
    }

    .hOAMEC {
        position: relative;
        width: auto;
        font-weight: 600;
        cursor: pointer;
        font-family: "Avenir Next", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
        font-size: 14px;
        color: white;
        background-color: rgb(6, 133, 226);
        margin: 0px;
        border-radius: 4px;
        padding: 10px 12px;
        border-width: 1px;
        border-style: solid;
        border-color: rgb(218, 225, 233);
        border-image: initial;
    }
    .dIAnBY {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        width: 100%;
        pointer-events: none;
    }

    .jvBcNs {
        display: flex;
        flex-direction: row;
    }

    .ewdOWc {
        fill: rgb(155, 166, 178);
        margin-right: 8px;
    }
    .dAfOoM {
        
        position: relative;
        width: auto;
        font-weight: 600;
        cursor: default;
        font-family: "Avenir Next", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
        font-size: 14px;
        color: rgb(25, 25, 25);
        background-color: rgb(249, 251, 252);
        margin: 0px;
        border-radius: 4px;
        padding: 10px 12px;
        border-width: 1px;
        border-style: solid;
        border-color: rgb(218, 225, 233);
        border-image: initial;
    }

    #Withdraw{
        margin-left: 15px;
    }

    .panel-body p{
        color: white;
    }

    .modal .portlet-body img {
        margin: 15px auto;
    }

    .modal-header{
        background-color:#008CFF;
    }

    .modal-header h3{
        color:white;
    }

    .modal-body h4 {
        color: black;
    }

    .modal-body a {
        color:#008CFF;
    }

    .modal-body button {
        background-color: #008cff;
    }

    table a {
        color: #0e75ee;
    }
    .usd-val{
        font-size: 12px;
    }
    .func-link a{
        font-size: 18px;
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
                <a href="{{url('/Customers/Wallet')}}">Wallet</a>
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
                        <div class="panel-heading border-light">
                            <h5 class="over-title margin-bottom-15"><span class="text-bold">Your Wallet</span></h5>
                            <div class="panel-tools">
                                <a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#">
                                    <i class="fa fa-circle-o"></i>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Coin</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Available amount</th>
                                            <th class="text-center">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{asset('customer/custom/img/bitcoinx50.png')}}" width="30"> BTC
                                            </td>
                                            <td class="text-center">
                                                Bitcoin
                                            </td>
                                            <td class="text-center">
                                                {{number_format($user->btc,8,'.','')}}
                                                <br>
                                                <span class="usd-val">&nbsp;≈&nbsp;{{$total_btc_usd}} USD</span>
                                            </td>
                                            <td class="text-center func-link">
                                                <p><a href="#" class="makeDeposit" data-balance="{{number_format($user->btc,8,'.','')}}" data-shortn="BTC"  data-toggle="modal" data-address="{{$address->btc}}" data-target="#diposit">Deposit
                                                </a></p>
                                                <p><a href="#"  id="Withdraw" data-toggle="modal" data-target="#withdrow">Withdrawal</a></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">
                                                <img src="{{asset('customer/custom/img/ethx50.png')}}" width="30"> ETH
                                            </td>
                                            <td class="text-center">Ethereum</td>
                                            <td class="text-center">
                                                {{number_format($user->eth,8,'.','')}}
                                                <br>
                                                <span class="usd-val">&nbsp;≈&nbsp;{{$total_eth_usd}} USD</span>
                                            </td>
                                            <td class="text-center func-link">
                                                <p><a href="#" class="makeDeposit" data-balance="{{number_format($user->eth,8,'.','')}}" data-shortn="ETH"  data-toggle="modal" data-address="{{$address->eth}}" data-target="#diposit">Deposit
                                                </a></p>
                                                <p><a href="#"  id="Withdraw" data-toggle="modal" data-target="#withdrow">Withdrawal</a></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-center">
                                                <img src="{{asset('assets/images/favicon.png')}}" width="30"> GRT
                                            </td>
                                            <td class="text-center">Grinch Token</td>
                                            <td class="text-center">
                                                {{number_format($user->acgc,8,'.','')}}
                                                <br>
                                                <span class="usd-val">&nbsp;≈&nbsp;{{$total_grt_usd}} USD</span>
                                            </td>
                                            <td class="text-center func-link">
                                                <p><a href="#" data-toggle="modal" data-target="#grt-deposit">Deposit
                                                </a></p>
                                                <p><a href="#"  id="Withdraw" data-toggle="modal" data-target="#grt-withdraw">Withdrawal</a></p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end: DYNAMIC TABLE -->
</div>

<style>
    .single-method{
        width:48.5% !important;
    }
</style>

<style>
    #qrCod > img{
        border:2px solid black;
    }
</style>

@endsection

@section('modal')
<!-- Modal -->
<div id="diposit" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Deposit Now</h3>
            </div>
            <div class="modal-body">
                <div class="portlet box blue">

                    <div class="portlet-body">


                        <h4 style="text-align: center;"> SEND HOW MANY
                            <strong id="namex"> </strong>
                            YOU WANT TO <strong id="adresix" style="word-wrap: break-word;"></strong>
                            <br>
                            <span id="qrCod" class="text-center"></span> 
                            <br>
                            <strong>SCAN TO SEND</strong> 
                            <br><br>
                            Current Balance: <span id="balancex"></span>  
                            <span id="namexx"></span>          
                            <br>
                            <strong style="color: #045088;">You can deposit any amount, there is no minimum.</strong>
                        </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -->




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
                <h4>This withdrawal function is only opened for sponsors of Grinch Token. </h4>
            </div>
        </div>
    </div>
</div>


<div id="grt-deposit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Deposit</h3>
            </div>
            <div class="modal-body">
                <h4>You can use this function only after ICO ended. </h4>
            </div>
        </div>
    </div>
</div>

<div id="grt-withdraw" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Withdrawal</h3>
            </div>
            <div class="modal-body">
                <h4>You can use this function only after ICO ended. </h4>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_vendor_js')
<script src="{{asset('customer/custom/js/qrcode.min.js')}}"></script>
@endsection

@section('additional_js')

<script>
var qrcode = new QRCode(document.getElementById("qrCod"), 'grinch');

$(document).on("click", ".makeDeposit", function () {
    qrcode.clear(); // clear the code.
    var adresa = $(this).data('address');
    var nume = $(this).data('shortn');
    var balance = $(this).data('balance');

    $("#adresix").text(adresa);
    $("#namex").text(nume);
    $("#namexx").text(nume);
    $("#balancex").text(balance);
    qrcode.makeCode(adresa);
});
</script>
@endsection