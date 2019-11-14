@extends('layouts.customer')

@section('additional_vendor_css')
<link rel="stylesheet" href="{{asset('customer/vendor/sweetalert/dist/sweetalert.css')}}">
<script src="{{asset('customer/vendor/sweetalert/dist/sweetalert.min.js')}}"></script>

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

#container-masonry {
    border: 1px solid;
    padding: 5px;
}

.banner {
    width: 300px;
    height: 250px;
    float: left;
    margin: 10px;
}

.banner.b1 {
    width: 728px;
    height: 90px;
}

.banner.b2 {
    height: 600px;
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

  .btn.shareBtn{
    color: white ;
  }

  .banner-row{
    padding-top: 15px;
  }

  .last-banner{
    padding-top: 15px;
    margin-left: 12%;
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
        <a href="{{url('/Customers/Share')}}">Affilate</a>
      </li>
    </ul>
  </div>
@endsection

@section('content')
<?php
$user = Auth::user();
?>
<div class="wrap-content container" id="container">

  <!-- end: BREADCRUMB -->
  <!-- start: DYNAMIC TABLE -->
  <div class="container-fluid container-fullw">
    <div class="row">
      <div class="col-md-12">
        <div class="portlet-body" style="font-style: italic;">
            <center>
              <h1><label for="#link">Please join into our affiliate system to enjoy high profit.</label></h1>
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
                  <button data-clipboard-action="copy"  data-clipboard-target="#identity-ref" id="btn-copy" class="btn ref-btn"><i class="fa fa-files-o" aria-hidden="true"></i></button>
                  <button  id="btn-share" class="btn ref-btn" data-toggle="modal" data-target="#shareModal"><span><i class="fa fa-share" aria-hidden="true"></i></span></button>
                </div>
              </div>
              
                <hr>
                <div class="row" style="margin: 15px;">
                  <h4>You can choose one of the banners, and please click on it to get the code.</h4>
                  <div class="row text-center banner-row">
                    <div class="col-md-4 icons-wrapper">
                      <div class="media-left">
                        <a href="#">
                          <div class="icons-effect">
                            <img src="{{asset('customer/assets/banner/300x250-1.gif')}}" class="img-responsive img-rounded " alt="">
                            <div class="mask mask-rounded">
                              <div class="icons-wrapper">
                                <div class="icons">
                                  <a href="#" data-toggle="modal" data-target="#bannerModal" class="icon" data-id="1" id="banner-btn"> <span class="fa-stack fa-2x"> <i class="fa fa-circle fa-stack-2x text-white"></i> <i class="fa fa-search fa-stack-1x text-extra-large text-light"></i> </span> </a>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </a>
                      </div>
                    </div>
                    <div class="col-md-4 icons-wrapper">
                      <div class="media-left">
                        <a href="#">
                          <div class="icons-effect">
                            <img src="{{asset('customer/assets/banner/300x250-2.gif')}}" class="img-responsive img-rounded " alt="">
                            <div class="mask mask-rounded">
                              <div class="icons-wrapper">
                                <div class="icons">
                                  <a href="#" data-toggle="modal" data-target="#bannerModal" class="icon" data-id="2" id="banner-btn"> <span class="fa-stack fa-2x"> <i class="fa fa-circle fa-stack-2x text-white"></i> <i class="fa fa-search fa-stack-1x text-extra-large text-light"></i> </span> </a>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </a>
                      </div>
                    </div>
                    <div class="col-md-4 icons-wrapper">
                      <div class="media-left">
                        <a href="#">
                          <div class="icons-effect">
                            <img src="{{asset('customer/assets/banner/300x250-3.gif')}}" class="img-responsive img-rounded " alt="">
                            <div class="mask mask-rounded">
                              <div class="icons-wrapper">
                                <div class="icons">
                                  <a href="#" data-toggle="modal" data-target="#bannerModal" class="icon" data-id="3" id="banner-btn"> <span class="fa-stack fa-2x"> <i class="fa fa-circle fa-stack-2x text-white"></i> <i class="fa fa-search fa-stack-1x text-extra-large text-light"></i> </span> </a>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="row text-center banner-row">
                    <div class="col-md-4 icons-wrapper">
                      <div class="media-left">
                        <a href="#">
                          <div class="icons-effect">
                            <img src="{{asset('customer/assets/banner/300x600-1.gif')}}" class="img-responsive img-rounded " alt="">
                            <div class="mask mask-rounded">
                              <div class="icons-wrapper">
                                <div class="icons">
                                  <a href="#" data-toggle="modal" data-target="#bannerModal" class="icon" data-id="4" id="banner-btn"> <span class="fa-stack fa-2x"> <i class="fa fa-circle fa-stack-2x text-white"></i> <i class="fa fa-search fa-stack-1x text-extra-large text-light"></i> </span> </a>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </a>
                      </div>
                    </div>
                    <div class="col-md-4 icons-wrapper">
                      <div class="media-left">
                        <a href="#">
                          <div class="icons-effect">
                            <img src="{{asset('customer/assets/banner/300x600-2.gif')}}" class="img-responsive img-rounded " alt="">
                            <div class="mask mask-rounded">
                              <div class="icons-wrapper">
                                <div class="icons">
                                  <a href="#" data-toggle="modal" data-target="#bannerModal" class="icon" data-id="5" id="banner-btn"> <span class="fa-stack fa-2x"> <i class="fa fa-circle fa-stack-2x text-white"></i> <i class="fa fa-search fa-stack-1x text-extra-large text-light"></i> </span> </a>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </a>
                      </div>
                    </div>
                    <div class="col-md-4 icons-wrapper">
                      <div class="media-left">
                        <a href="#">
                          <div class="icons-effect">
                            <img src="{{asset('customer/assets/banner/300x600-3.gif')}}" class="img-responsive img-rounded " alt="">
                            <div class="mask mask-rounded">
                              <div class="icons-wrapper">
                                <div class="icons">
                                  <a href="#" data-toggle="modal" data-target="#bannerModal" class="icon" data-id="6" id="banner-btn"> <span class="fa-stack fa-2x"> <i class="fa fa-circle fa-stack-2x text-white"></i> <i class="fa fa-search fa-stack-1x text-extra-large text-light"></i> </span> </a>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="row text-center banner-row">
                    <div class="row icons-wrapper last-banner">
                      <div class="media-left">
                        <a href="#">
                          <div class="icons-effect">
                            <img src="{{asset('customer/assets/banner/728x90-1.gif')}}" class="img-responsive img-rounded " alt="">
                            <div class="mask mask-rounded">
                              <div class="icons-wrapper">
                                <div class="icons">
                                  <a href="#" data-toggle="modal" data-target="#bannerModal" class="icon" data-id="7" id="banner-btn"> <span class="fa-stack fa-2x"> <i class="fa fa-circle fa-stack-2x text-white"></i> <i class="fa fa-search fa-stack-1x text-extra-large text-light"></i> </span> </a>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </a>
                      </div>
                    </div>
                    <div class="row icons-wrapper last-banner">
                      <div class="media-left">
                        <a href="#">
                          <div class="icons-effect">
                            <img src="{{asset('customer/assets/banner/728x90-2.gif')}}" class="img-responsive img-rounded " alt="">
                            <div class="mask mask-rounded">
                              <div class="icons-wrapper">
                                <div class="icons">
                                  <a href="#" data-toggle="modal" data-target="#bannerModal" class="icon" data-id="8" id="banner-btn"> <span class="fa-stack fa-2x"> <i class="fa fa-circle fa-stack-2x text-white"></i> <i class="fa fa-search fa-stack-1x text-extra-large text-light"></i> </span> </a>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </a>
                      </div>
                    </div>
                    <div class="row icons-wrapper last-banner">
                      <div class="media-left">
                        <a href="#">
                          <div class="icons-effect">
                            <img src="{{asset('customer/assets/banner/728x90-3.gif')}}" class="img-responsive img-rounded " alt="">
                            <div class="mask mask-rounded">
                              <div class="icons-wrapper">
                                <div class="icons">
                                  <a href="#" data-toggle="modal" data-target="#bannerModal" class="icon" data-id="9" id="banner-btn"> <span class="fa-stack fa-2x"> <i class="fa fa-circle fa-stack-2x text-white"></i> <i class="fa fa-search fa-stack-1x text-extra-large text-light"></i> </span> </a>
                                </div>
                              </div>
                            </div>
                          </div> 
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            </center>
          </div>
      </div>
    </div>

  </div>
</div>

@endsection

@section('additional_vendor_js')
<script src="{{asset('customer/custom/js/clipboard.min.js')}}"></script>
@endsection

@section('modal')  
      <!-- Modal -->
<div id="bannerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Your Referral Link Snippet</h3>
      </div>
      <div class="modal-body">
        <p>You can copy and paste this banner code snippet.</p>
        <textarea readonly="readonly" rows="3" class="margin-top new-look form-control" id="banner-embed">
        </textarea>
        <button data-clipboard-action="copy"  data-clipboard-target="#banner-embed" id="btn-banner-copy" class="btn ref-banner-btn"> Copy</button>
      </div>
    </div>
  </div>
</div>


<div id="shareModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Share your referral link</h3>
      </div>
      <div class="modal-body">
        <h4>You can send your referral link to your friend.</h4>
        <form role="form" action="{{url('/Customers/ShareLink')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Your Firend's Email Address</label>
            <input type="text" name="fEamil" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" class="btn form-control shareBtn">Send</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>

@endsection

@section('additional_js')
@if(Session::get('msg'))
<script>
swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
</script>
@endif
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

    var clipboard2 = new Clipboard('#btn-banner-copy', {
        text: function (trigger) {
            $('#btn-banner-copy').blur();
            return trigger.getAttribute('aria-label');
        }
    });


    clipboard2.on('success', function (e) {
        $('#btn-banner-copy').html('Copied').attr('disabled', true);
        setTimeout(function () {
            $('#btn-banner-copy').html('Copy').removeAttr('disabled');
        }, 5000);
    });

    $(document).on( "click", '#banner-btn',function(e) {

            var id = $(this).data('id');
            var embed_link = "";

            switch(id) {
                case 1:
 
                    embed_link = "<a href='{{url('/')}}/follow-me/{{$user->ref_id}}'><img src='{{asset('customer/assets/banner/300x250-1.gif')}}' style='width:40%;'></a>";
                    break;
                case 2:

                    embed_link = "<a href='{{url('/')}}/follow-me/{{$user->ref_id}}'><img src='{{asset('customer/assets/banner/300x250-2.gif')}}' style='width:40%;'></a>";
                    break;
                case 3:

                    embed_link = "<a href='{{url('/')}}/follow-me/{{$user->ref_id}}'><img src='{{asset('customer/assets/banner/300x250-3.gif')}}' style='width:40%;'></a>";
                    break;
                case 4:

                    embed_link = "<a href='{{url('/')}}/follow-me/{{$user->ref_id}}'><img src='{{asset('customer/assets/banner/300x600-1.gif')}}' style='width:40%;'></a>";
                    break;
                case 5:

                    embed_link = "<a href='{{url('/')}}/follow-me/{{$user->ref_id}}'><img src='{{asset('customer/assets/banner/300x600-2.gif')}}' style='width:40%;'></a>";
                    break;
                case 6:

                    embed_link = "<a href='{{url('/')}}/follow-me/{{$user->ref_id}}'><img src='{{asset('customer/assets/banner/300x600-3.gif')}}' style='width:40%;'></a>";
                    break;
                case 7:

                    embed_link = "<a href='{{url('/')}}/follow-me/{{$user->ref_id}}'><img src='{{asset('customer/assets/banner/728x90-1.gif')}}' style='width:40%;'></a>";
                    break;
                case 8:

                    embed_link = "<a href='{{url('/')}}/follow-me/{{$user->ref_id}}'><img src='{{asset('customer/assets/banner/728x90-2.gif')}}' style='width:40%;'></a>";
                    break;
                case 9:

                    embed_link = "<a href='{{url('/')}}/follow-me/{{$user->ref_id}}'><img src='{{asset('customer/assets/banner/728x90-3.gif')}}' style='width:40%;'></a>";
                    break;

            }

            $('#banner-embed').val(embed_link);
        });
</script>
@endsection