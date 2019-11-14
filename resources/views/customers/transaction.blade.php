@extends('layouts.customer')

@section('additional_vendor_css')

@endsection

@section('breadcrumb')
<div class="breadcrumb-wrapper">
  <ul class="pull-right breadcrumb">
    <li>
      <a href="{{url('/Customers')}}"><i class="fa fa-home margin-right-5 text-large text-white"></i>Home</a>
    </li>
    <li>
      <a href="{{url('/Customers/Transactions')}}">Transaction</a>
    </li>
  </ul>
</div>
@endsection

@section('content')
<?php
$user = Auth::user();

$duser = App\Models\User::all();

$cur = App\Models\General_setting::find(1)->cur;
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
            <h5 class="over-title margin-bottom-15"><span class="text-bold">Transactions</span></h5>
            <hr>
            
            <div class="alert alert-info">
              This table shows your token purchase history.
            </div>
            <div class="table-responsive">
              @if(count($dtrx)>0)
              <table class="table table-bordered table-hover" id="sample-table-1">
                <thead>
                  <tr>
                    <th class="text-center">Date</th>
                    <th class="text-center">Transaction hash</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Details</th>
                    <th class="text-center">BTC/ETH amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dtrx as $trx)
                        <tr>    
                          <td class="text-center">{{$trx->tm}}</td>
                          <td class="text-center">{{$trx->trxid}}</td>
                          <td class="text-center">{{$trx->amount.' '. $cur}}</td>
                          <td class="text-center label-info">{{$trx->typ}}</td>
                          <td class="text-center">
                            @if($trx->typ == 'Add by Purchase')
                              <?php
                              $crypto = App\Models\Crypto::where('hash',$trx->trxid)->first();
                              ?>
                              @if($crypto)
                                {{number_format($crypto->amount,8,'.','').' '.$crypto->coin}}
                                @endif
                            @endif
                          </td>
                        </tr>
                        @endforeach
                </tbody>
              </table>
              @else
                  <div class="bottom-part-area text-center">
                    <p>You have not made any transactions. Once you do, they will appear here.</p>            
                  </div>
                  @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end: DYNAMIC TABLE -->
</div>
@endsection

@section('additional_vendor_js')
<!-- <script src="{{asset('customers/custom/js/table-data.js')}}"></script> -->
@endsection

@section('additional_js')
<!-- <script>
  jQuery(document).ready(function() {
    TableData.init();
  });
</script> -->
@endsection