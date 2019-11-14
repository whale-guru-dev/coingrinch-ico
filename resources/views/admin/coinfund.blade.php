@extends('layouts.admin')

@section('content')
<?php 
$dcryptos = App\Models\Crypto::where('status','confirm')->orWhere('status','pending')->get();
$total_btc = App\Models\Crypto::where('status','confirm')->where('coin','BTC')->where('type','deposit')->sum('amount');
$total_eth = App\Models\Crypto::where('status','confirm')->where('coin','ETH')->where('type','deposit')->sum('amount');
$withdraw_btc = App\Models\Crypto::where('status','confirm')->where('coin','BTC')->where('type','withdraw')->sum('amount');
$withdraw_eth = App\Models\Crypto::where('status','confirm')->where('coin','ETH')->where('type','withdraw')->sum('amount');
$real_btc = $total_btc - $withdraw_btc;
$real_eth = $total_eth - $withdraw_eth;

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

$total_btc_usd = $total_btc * $btc['data']['amount'];
$total_eth_usd = $total_eth * $eth['data']['amount'];
$real_btc_usd = $real_btc * $btc['data']['amount'];
$real_eth_usd = $real_eth * $eth['data']['amount'];
$total_usd = $total_btc_usd + $total_eth_usd;
$rea_usd = $real_btc_usd + $real_eth_usd;
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title uppercase bold"> <i class="fa fa-money"></i> Crypto Deposit/Withdraw Log
			<!-- <span class=" pull-right">
				<a class="btn btn-primary" data-toggle="modal" data-target="#srsModal" href="javascript:;">
					<i class="fa fa-search"></i>  &nbsp; SEARCH BY TRANSACTION ID 
				</a>

				<a class="btn btn-info" data-toggle="modal" data-target="#emailModal" href="javascript:;">
					<i class="fa fa-search"></i>  &nbsp; SEARCH BY EMAIL 
				</a>

				<a class="btn btn-warning" data-toggle="modal" data-target="#userModal" href="javascript:;">
					<i class="fa fa-search"></i>  &nbsp; SEARCH BY USERNAME 
				</a>
			</span> -->
		</h3>

        <hr>

        <div class="row">
            <div class="col-md-12">

                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i>  User Deposit/Withdraw Log   &nbsp;&nbsp;Total BTC:{{$total_btc}} Real BTC:{{$real_btc}} Total ETH:{{$total_eth}} Real ETH:{{$real_eth}} Total USD:{{$total_usd}} Real USD:{{$rea_usd}}
                        </div>

                    </div>

                    <div class="portlet-body">
                        @if(count($dcryptos)==0)
						<h1 class='text-center'> NO RESULT FOUND !</h1>
                        @else
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> USER </th>
                                    <th> AMOUNT </th>
                                    <th> USD WORTH </th>
                                    <th> COIN </th>
                                    <th> TIME </th>
                                    <th> METHOD </th>
                                    <th> TRX # </th>
                                    <th> INTERNAL ADDRESS </th>
                                    <th> STATUS </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($dcryptos as $crypt)
                                        <tr class="<?php if($crypt->type == 'deposit') echo 'success';else echo 'danger';?>">
                                            <th> {{ $i++ }} </th>
                                            <th> {{ App\Models\User::where('id',$crypt->who)->first()->uname }} </th>
                                            <th> {{ $crypt->amount.' '.$crypt->coin }} </th>
                                            @if($crypt->coin == 'ETH')
                                            <th> {{ $crypt->amount*$eth['data']['amount'] }} </th>
                                            @elseif($crypt->coin == 'BTC')
                                            <th> {{ $crypt->amount*$btc['data']['amount'] }} </th>
                                            @endif
                                            <th> {{ $crypt->coin }} </th>
                                            <th> {{ $crypt->tm }} </th>
                                            <th> {{ $crypt->details }} </th>
                                            <th> {{ $crypt->hash }} </th>
                                            <th> {{ $crypt->address }} </th>
                                            @if($crypt->status == 'pending')
                                            <th> PENDING </th>
                                            @elseif($crypt->status == 'confirm')
                                            <th> COMPLETED </th>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>

                
                <!-- print pagination -->
                <div class="row">
                    <div class="text-center">
                        <ul class="pagination">

                        </ul>
                    </div>
                </div><!-- row -->
                <!-- END print pagination -->
            </div>
        </div>
    </div>
</div><!-- ROW-->
<!-- modal for srs -->
<div class="modal fade" id="srsModal" tabindex="-1" role="dialog">

    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title uppercase bold">Search By TRANSACTION ID</h4>
        </div>
        <form action="" method="post">


            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control input-lg" name="trx" placeholder="TRANSACTION ID" required="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-block dark btn-outline" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block green"> <i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </div>

        </form>


    </div>
</div>
<!-- /.modal -->

<!-- modal for srs -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog">

    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title uppercase bold">Search By EMAIL</h4>
        </div>
        <form action="" method="post">


            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control input-lg" name="email" placeholder="Email" required="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-block dark btn-outline" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block green"> <i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </div>

        </form>


    </div>
</div>
<!-- /.modal -->

<!-- modal for srs -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog">

    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title uppercase bold">Search By Username</h4>
        </div>
        <form action="" method="post">


            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control input-lg" name="user" placeholder="Username" required="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-block dark btn-outline" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block green"> <i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </div>

        </form>


    </div>
</div>
<!-- /.modal -->
@endsection