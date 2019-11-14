@extends('layouts.customer')

@section('additional_vendor_css')
<style type="text/css">
  .ref-inner {
    color: #0685e2;
    margin-top: 11px;
    font-size: 16px;
    font-weight: bold;
  }
  .ref-link-box {
      background: rgba(255, 255, 255, 0.25) none repeat scroll 0 0;
      border-radius: 3px;
      display: inline-block;
      height: 40px;
      position: relative;
      width: 94.5%;
  }
  .ref-link-box input {
    background: transparent none repeat scroll 0 0;
    border: medium none;
    color: #0bcae4;
    height: 40px;
    width: 100%;
    padding: 0 0 0 5px;
  }
  .btn.ref-banner-btn {
      background: #0685e2 none repeat scroll 0 0;
      border: medium none;
      margin: 3px;
      padding: 5px 20px;
      position: absolute;
      right: 0;
      top: 0;
      color: white;
  }

  .btn.ref-btn {
      background: #0685e2 none repeat scroll 0 0;
      height: 40px;
      color: white;
  }

  .ref-link p {
    margin-top: 15px;
    color: #0685e2;
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
        <a href="{{url('/Customers/Referrals')}}">My Followers</a>
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
            <h5 class="over-title margin-bottom-15"><span class="text-bold">My Followers</span></h5>
            <hr>
              <div class="row">
                <div class="col-md-12 col-sm-2 col-lg-2">
                  <div class="ref-inner">Affiliate Link: </div> 
                </div>
                <div class="col-md-8 col-sm-8 col-lg-8">
                  <div class="ref-link-box">
                      <input type="text" readonly id="identity-ref" value="{{url('/')}}/follow-me/{{$user->ref_id}}"> 
                  </div>
                </div>
                <div class="col-md-2 col-sm-2 col-lg-2">
                  <button data-clipboard-action="copy"  data-clipboard-target="#identity-ref" id="btn-copy" class="btn ref-btn">Copy</button>
                </div>
              </div>
              <br><br>
              <div class="row">
                <div class="alert alert-info">
                  This table shows your followers.
                </div>
              </div>
            
            <div class="table-responsive">
              @if(count($dfollowers)>0)
              <table class="table table-bordered table-hover" id="sample-table-1">
                <thead>
                  <tr>
                    <th class="text-center">Legal Name</th>
                    <th class="text-center">Registration Time</th>
                    <th class="text-center">Tokens Amounts</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($dfollowers as $follower)
                  <tr>
                    <td class="text-center">{{$follower->lname}}</td>
                    <td class="text-center">{{$follower->created_at}}</td>
                    <td class="text-center">{{$follower->acgc}}</td>

                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
              <div class="bottom-part-area text-center">
                You have not referrals
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
<script src="{{asset('customer/custom/js/clipboard.min.js')}}"></script>
@endsection

@section('additional_js')
<script>
  var clipboard1 = new Clipboard('#btn-copy', {
        text: function (trigger) {
            $('#btn-copy').blur();
            return trigger.getAttribute('aria-label');
        }
    });


    clipboard1.on('success', function (e) {
        $('#btn-copy').html('Copied').attr('disabled', true);
        setTimeout(function () {
            $('#btn-copy').html('Copy').removeAttr('disabled');
        }, 5000);
    });
</script>
@endsection