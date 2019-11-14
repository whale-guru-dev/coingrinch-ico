@extends('layouts.customer')

@section('additional_vendor_css')
<style>
    a {
        color: #3885E2;
    }
    p {
        margin-top: 0.7em;
        margin-bottom: 0.7em;
    }
    #loading, .error {
        top: 150px;
        width: 100%;
        position: absolute;
    }
    .error {
        color: red;
    }
    #loading {
        display: none;
    }
    #ChartContainer {
        height: 100%;
    }
    .top {
        margin-top: 8px;
    }
    #relation-selection {
        margin-left: 18px;
    }
    .top2 {
        margin-top: 8px;
    }
    .buttons {
        display: inline-block;
    }
    .buttons > a, .help-button {
        display: inline-block;
        padding-top: 4px;
        padding-bottom: 3px;
        padding-left: 4px;
        padding-right: 4px;
        margin-left: 7px;
        margin-right: 3px;
        border: 1px solid transparent;
        border-radius: 4px;
        transition: all ease-out 0.2s;
        text-decoration: none;
        min-width: 25px;
    }
    .buttons > a:hover {
        color:#95c7f1;
        border-color: #95c7f1;
    }
    .buttons > a.active {
        color: #0685e2;
        border-color: #0685e2;
    }
    #average-button.active {
        color: #5494D3;
        border-color: #5494D3;
    }
    #average-button {
        margin-left: 10px;
    }


    .coin-btc{
        background-color: #f7761a;
    }

    .coin-eth{
        background-color: #969696;
    }

    .coin-grt{
        background-color: #258bd6;
    }

    .coins{
        border-radius: 10px;
    }

    @media (max-width: 992px) {

        .coin-div{
            display: inline-block;
        }

        .coin-left{
            display: inline-block;
        }

        .coin-right{
            display: inline-table;
        }

        .coins{
            display: inline-block;
        }

        .coins-panel{
            text-align: center;
        }

    }

    .progress-bar-purple {
        background-color: #858585 !important;
    }


    #ico-coin{
        text-align: left;
    }

    #pro-coin{
        width: 25%;
    }

    #val-coin{
        text-align: right;
    }

    tr{
        height: 50px;
    }

    #loading {
        display: none !important;
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
            <a href="{{url('/Customers/Dashboard')}}">Dashboard</a>
        </li>
    </ul>
</div>
@endsection

@section('content')
<?php

$user = Auth::user();
$sold_amount = App\Models\User::sum('acgc');
$cur = App\Models\General_setting::find(1)->cur;
$dbatch = App\Models\Batch::all();
$i = 1;

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

$total_bal_usd = $total_btc_usd + $total_eth_usd + $total_grt_usd;

if($total_bal_usd == 0){
    $btc_percent = 0;
    $eth_percent = 0;
    $grt_percent = 0;
}else{
    $btc_percent = $total_btc_usd*100/$total_bal_usd;
    $eth_percent = $total_eth_usd*100/$total_bal_usd;
    $grt_percent = $total_grt_usd*100/$total_bal_usd;
}


// $dogs = Dogs::orderBy('id', 'desc')->take(5)->get();
$dtrx = App\Models\Transaction::orderBy('tm','DESC')->where('who',Auth::user()->id)->take(3)->get();

$now = new \Carbon\Carbon(now());

$start = new \Carbon\Carbon($dbatch[0]->date_from); 
$end = new \Carbon\Carbon($dbatch[5]->date_to);

$total_days = $end->diffInDays($start); 
if(now()->gt($dbatch[5]->date_to)){
    $passed_days = $total_days;
}else{
    if(now()->gt($dbatch[0]->date_from)){
        $passed_days = $start->diffInDays($now);
    }else{
        $passed_days = 0;
    }
}

$percent_days = $passed_days*100/$total_days;

?>
<script>
	g_btc_price = parseFloat(<?php echo $btc['data']['amount']; ?>).toFixed(2);
	g_eth_price = parseFloat(<?php echo $eth['data']['amount']; ?>).toFixed(2);
</script>

<div class="wrap-content container" id="container">

    <div class="container-fluid container-fullw">

        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-body">
                            <div class="token-progress">
                                <div class="contianer">
                                    <div class="row">
                                        <div class="col-sm-12  p-5 pre-ico-progr">
                                            <div class="height_line">
                                            </div>

                                            <div class="row">
                                                @foreach($dbatch as $batch)
                                                    @if($batch->status == 3)
                                                        <div class="col-sm-2 stage-ended">
                                                    @else
                                                        <div class="col-sm-2">
                                                    @endif
                                                        <div class="top-progress-bar ">
                                                            <div class="progress-line-text ">
                                                                <div>STAGE {{$i++}}</div>
                                                                <div>{{$batch->bonus}}% BONUS</div> 
                                                                <div>{{\Carbon\Carbon::parse($batch->date_from)->toFormattedDateString()}} &nbsp; ~  &nbsp;{{\Carbon\Carbon::parse($batch->date_to)->toFormattedDateString()}}</div>
                                                            </div>
                                                            <div class="progress-verticle-line">
                                                            </div>
                                                            <div class="progress-horizontal-line">
                                                            </div>
                                                        </div>
                                                    </div>  
                                                @endforeach
                                            </div>
                                            <div class="progress-wrap prog_2 progress progress--active" data-progress-percent="{{$percent_days}}">
                                                <div class="progress-bar bar_200 progress progress--active" style="left: {{$percent_days}}%;"></div>
                                                <div class="col-sm-2 p-0 multisection">
                                                    <div class="coin_GIF">0.25 US dollars</div>
                                                    <div class="GIF_GIF">1 GRT</div>
                                                </div>
                                                <div class="col-sm-2 p-0 multisection">
                                                    <div class="coin_GIF">0.25 US dollars</div>
                                                    <div class="GIF_GIF">1 GRT</div>
                                                </div>
                                                <div class="col-sm-2 p-0 multisection">
                                                    <div class="coin_GIF">0.25 US dollars</div>
                                                    <div class="GIF_GIF">1 GRT</div>
                                                </div>
                                                <div class="col-sm-2 p-0 multisection">
                                                    <div class="coin_GIF">0.25 US dollars</div>
                                                    <div class="GIF_GIF">1 GRT</div>
                                                </div>
                                                <div class="col-sm-2 p-0 multisection">
                                                    <div class="coin_GIF">0.25 US dollars</div>
                                                    <div class="GIF_GIF">1 GRT</div>
                                                </div>
                                                <div class="col-sm-2 p-0 multisection">
                                                    <div class="coin_GIF">0.25 US dollars</div>
                                                    <div class="GIF_GIF">1 GRT</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-body">
                            <div class="pull-right" style="margin-top: 10px;">
                                <div id="chart-selection" class="buttons"><strong>Chart:</strong> </div>
                                <div id="relation-selection" class="buttons"><strong>Compared to: </strong></div>
                                
                            </div>
                            <div class="top2">
                                <div id="ranges" class="buttons"><strong>Range: </strong></div>
                                <div class="buttons">
                                    <a href="#" id="average-button"><strong>Average</strong></a>
                                </div>
                            </div>
                            <div id="loading">
                                Loading ...
                            </div>
                            <hr>
                            <div id="ChartContainer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class=" panel panel-white">
                        <div class="panel-body coins-panel">
                            <h3 class="over-title">Your Portfolio</h3>
                            <hr>
                            <table class="table" id="sample-table-1">
                                <tbody>
                                    <tr>
                                        <td id="ico-coin"><img src="{{asset('customer/custom/img/bitcoinx50.png')}}" width="30">  Bitcoin</td>
                                        <td  id="pro-coin">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <span class="block padding-top-0">
                                                        <div class="progress progress-xs no-radius background-dark no-margin">
                                                            <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="{{$btc_percent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$btc_percent}}%;">
                                                                
                                                            </div>
                                                        </div>
                                                        <span class=""> {{number_format($btc_percent,2,'.','')}} % </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                        </td>
                                        <td id="val-coin">{{number_format($user->btc,4,'.','')}} BTC</td>
                                        <td class="hidden-xs">$ {{number_format($total_btc_usd,2,'.','')}}</td>
                                    </tr>
                                    <tr>
                                        <td  id="ico-coin"><img src="{{asset('customer/custom/img/ethx50.png')}}" width="30">  Ethereum</td>
                                        <td  id="pro-coin">
                                            <span class="block padding-top-0">
                                                <div class="progress progress-xs no-radius background-dark no-margin">
                                                    <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="{{$eth_percent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$eth_percent}}%;">
                                                        
                                                    </div>
                                                </div>
                                                <span class=""> {{number_format($eth_percent,2,'.','')}} % </span>
                                            </span>
                                        </td>
                                        <td id="val-coin">{{number_format($user->eth,4,'.','')}} ETH</td>
                                        <td class="hidden-xs">$ {{number_format($total_eth_usd,2,'.','')}}</td>
                                    </tr>
                                    <tr>
                                        <td  id="ico-coin"><img src="{{asset('assets/images/favicon.png')}}" width="30">  Grinch Token</td>
                                        <td  id="pro-coin">
                                            <span class="block padding-top-0">
                                                <div class="progress progress-xs no-radius background-dark no-margin">
                                                    <div class="progress-bar progress-bar-azure" role="progressbar" aria-valuenow="{{$grt_percent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$grt_percent}}%;">
                                                        
                                                    </div>
                                                </div>
                                                <span class=""> {{number_format($grt_percent,2,'.','')}}% </span>
                                            </span>
                                        </td>
                                        <td id="val-coin">{{number_format($user->acgc,4,'.','')}} GRT</td>
                                        <td class="hidden-xs">$ {{number_format($total_grt_usd,2,'.','')}}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <div class="text-center">Total Balance &nbsp;≈&nbsp; $ {{number_format($total_bal_usd,2,'.','')}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-body">
                            <h3 class="over-title">Recent Transactions</h3>
                            <hr>
                            @if(count($dtrx)>0)
                            <table class="table" id="sample-table-1">
                                <tbody>
                                @foreach($dtrx as $trx)
                                    <tr>
                                        <td> {{\Carbon\Carbon::parse($trx->tm)->toFormattedDateString()}}</td>

                                        <td class="text-center">{{$trx->typ}}</td>

                                        <td class="text-center">&nbsp;+&nbsp;{{$trx->amount.' '. $cur}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="text-center">
                                <p>You have not made any transactions. Once you do, they will appear here.</p>            
                            </div>
                            <hr>
                            @endif
                            <div class="text-center"><a href="{{url('/Customers/Transactions')}}">View Your Transactions &nbsp;>&nbsp;</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_vendor_js')
<script src="{{asset('customer/custom/js/highstock.js')}}"></script>
<script src="{{asset('customer/custom/js/theme.js')}}"></script>
<script src="{{asset('customer/custom/js/cryptochart.js')}}"></script>
@endsection