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
        <a href="{{url('/Customers/Wallet')}}">Wallet</a>
      </li>
      <li>
        <a href="{{url('/Customers/WalletHistory')}}">History</a>
      </li>
    </ul>
  </div>
@endsection

@section('content')
<?php
$user = Auth::user();
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
            <h5 class="over-title margin-bottom-15">Deposit <span class="text-bold">&</span> Withdrawal</h5>
            <hr>
            <div class="alert alert-info">
              This table shows your cryptocurrency transactions.
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="sample-table-1">
                <thead>
                  <tr>
                    <th class="text-center">Time</th>
                    <th class="text-center">Coin</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center"> Sig </th>
                    <th class="text-center">To Address</th>
                    <th class="text-center">TRX</th>
                    <th class="text-center">Details</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>
                @if(count($dcrypto)>0)
                        <tbody>
                        @foreach($dcrypto as $crypto)
                          <tr>
                            <th class="text-center">{{$crypto->tm}}</th>
                            <th class="text-center">{{$crypto->coin}}</th>
                            <th class="text-center">{{$crypto->amount}}</th>
                            <th class="text-center label-info"><span style="color:black;font-size: 15px;" class="label label-lg ">{{$crypto->sig}}</span></th>
                            <th class="text-center">{{$crypto->address}}</th>
                            <th class="text-center">{{$crypto->hash}}</th>
                            <th class="text-center">{{$crypto->details}}</th>
                            <th class="text-center">{{$crypto->status}}</th>
                          </tr>
                        @endforeach
                        </tbody>
                      @else
                      <tr id="no-item-found-alert" class="enabled">
                          <td colspan="8"><div class="text-center">You have not made any deposits. Once you do, they will appear here.</div></td>
                      </tr>
                      @endif                
              </table>
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

@endsection

@section('additional_js')

@endsection