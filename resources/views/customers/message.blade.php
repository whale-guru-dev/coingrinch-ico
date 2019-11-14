@extends('layouts.customer')

@section('additional_vendor_css')
<link rel="stylesheet" href="{{asset('customer/vendor/toastr/toastr.min.css')}}">
@endsection

@section('content')
<?php
$user = Auth::user();
use App\Models\User_Messages;
$camsg = count(User_Messages::where('user_id', $user->id)->get());
$cnmsg = count(User_Messages::where('user_id', $user->id)->where('state',0)->get());
?>
<div class="wrap-content container" id="container">
  <div class="wrap-messages">
    <div id="inbox" class="inbox">
      <!-- start: EMAIL OPTIONS -->
      <div class="col email-options perfect-scrollbar">
        <div class="padding-15">
          <ul class="main-options padding-15">
            <li>
              <a href="{{url('/Customers/Message')}}" > <span class="title"><i class="ti-import"></i> Inbox</span> <span class="badge pull-right">{{$camsg}}</span> </a>
            </li>
            <li>
              <a href="{{url('/Customers/GetNewMsg')}}" > <span class="title"><i class="ti-upload"></i> New Unread Message</span> <span class="badge pull-right">{{$cnmsg}}</span></a>
            </li>
          </ul>
        </div>
      </div>
      <!-- end: EMAIL OPTIONS -->
      <!-- start: EMAIL LIST -->
      <div class="col email-list">
        <div class="wrap-list">
          <div class="wrap-options">
            <div class="messages-options padding-15">
              <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button">
                  <span class="caret"></span>
                </button>
                <ul role="menu" class="dropdown-menu dropdown-light">
                  <li>
                    <a href="{{url('/Customers/Message')}}" > <span class="title"><i class="ti-import"></i> Inbox</span> <span class="badge pull-right">{{$camsg}}</span> </a>
                  </li>
                  <li>
                    <a href="{{url('/Customers/GetNewMsg')}}" > <span class="title"><i class="ti-upload"></i> New Unread Message</span> <span class="badge pull-right">{{$cnmsg}}</span></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="messages-search">
              <form>
                <input type="text" placeholder="Search messages..." class="form-control underline">
              </form>
            </div>
          </div>
          <ul class="messages-list perfect-scrollbar">
            @if(count($dmsg)>0)
            @foreach($dmsg as $msg)
            <li class="messages-item"  id="{{$msg->id}}">
              <a href="#">
                <span class="messages-item-star" title="Delete" onclick="delMsg({{$msg->id}})"><i class="fa fa-times-circle"></i></span>
                <img class="messages-item-avatar bordered border-primary" alt="Support" src="{{asset('assets/images/favicon.png')}}" onclick="getMsg({{$msg->id}})">  
                <span class="messages-item-from">Grinch Support</span>
                <div class="messages-item-time">
                  <span class="text">{{$msg->date}}</span>
                </div> 
                <span class="messages-item-subject">{{$msg->title}}</span> 
                <span class="messages-item-content" style="height: 40px;overflow-y: hidden;">{{$msg->content}}</span> 
              </a>
            </li>
            @endforeach
            @else
            <p>There is no result.</p>
            @endif
          </ul>
        </div>
      </div>
      <!-- end: EMAIL LIST -->
      <!-- start: EMAIL READER -->
      <div class="email-reader perfect-scrollbar">
        <div>
          <div class="message-actions">
            <ul class="actions no-margin no-padding block">
              <li class="email-list-toggle">
                <a href="#"><i class="fa fa-angle-left"></i> All Inboxes </a>
              </li>
              <li class="actions-dropdown">
                <span class="dropdown"> <a class="dropdown-toggle" href=""> <i class="caret"></i> </a>
                  <ul class="dropdown-menu dropdown-light">
                    <li>
                      <a href="#"> Read </a>
                    </li>

                    <li>
                      <a href="#" onclick="delAllMsg()"> Delete All</a>
                    </li>
                  </ul> 
                </span>
              </li>
              <li class="no-padding">
                <a href="#" class="text-info"> Read </a>
              </li>

              <li class="no-padding">
                <a href="#" onclick="delAllMsg()"> Delete All</a>
              </li>
            </ul>
          </div>
          <div class="message-header" id="msg-panel">
            
            <div class="message-time" id="msg-date">

            </div>

            <div class="message-from" id="msg-from">
              
            </div>
            
          </div>
          <div class="message-subject" id="msg-title">

          </div>
          <div class="message-content" id="msg-content">
            
          </div>
        </div>
      </div>
      <!-- end: EMAIL READER -->
    </div>
  </div>
</div>
@endsection

@section('additional_vendor_js')
<script src="{{asset('customer/custom/js/pages-messages.js')}}"></script>
<script src="{{asset('customer/vendor/toastr/toastr.min.js')}}"></script>
@endsection

@section('additional_js')
<script>
  jQuery(document).ready(function() {
    Messages.init();
  });
</script>
<script>
  toastr.options = {
    "closeButton": false,
    "positionClass": "toast-top-right",
    "onclick": null,
    "showDuration": "1000",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  function getMsg(id){
    $.ajax({
        url: '{{url('/Customers/GetMsg')}}',
        type: 'POST',
        data: {
            '_token' : '{{csrf_token()}}',
            'id': id
        },
        dataType: 'html',
        success: function (data) {
          msg = jQuery.parseJSON(data);
          $('#msg-date').html(msg.date);
          $('#msg-from').html('Grinch Support');
          $('#msg-title').html(msg.title);
          $('#msg-content').html(msg.content);
        },
        error: function () {
            console.log("Something went wrong!");
        }
    });
  }

  function delAllMsg(){
    $.ajax({
        url: '{{url('/Customers/DelAllMsg')}}',
        type: 'POST',
        data: {
            '_token' : '{{csrf_token()}}'
        },
        dataType: 'html',
        success: function (data) {
          msg = jQuery.parseJSON(data);
          if(msg.status=='ok'){
            toastr.success('Successfullly Deleted All', 'Success');
            $('#msg-panel').html('Successfullly Deleted All');
          }
          else{
            toastr.warning('There was an problem on Deleting All Message', 'Sorry');
            $('#msg-panel').html('There was an problem on Deleting All Message');
          }
        },
        error: function () {
            toastr.error('Something went wrong', 'Whoops!');
            $('#msg-panel').html('Something went wrong');
        }
    });
  }

  function delMsg(id){
    $.ajax({
        url: '{{url('/Customers/DelMsg')}}',
        type: 'POST',
        data: {
            '_token' : '{{csrf_token()}}',
            'id': id
        },
        dataType: 'html',
        success: function (data) {
          msg = jQuery.parseJSON(data);
          if(msg.status=='ok'){
              
            toastr.success('Successfullly Message Deleted', 'Success');
            $('#'+id).css('display','none');
          }
          else{
            toastr.warning('There was an problem on Deleting All Message', 'Sorry');
            // $('#'+id).html('There was an problem on Deleting All Message');
          }
          alert
        },
        error: function () {
            toastr.error('Something went wrong!', 'Whoops!');
            console.log("Something went wrong!");
            // $('#msg-panel').html('Something went wrong!');
        }
    });
  }
</script>
@endsection