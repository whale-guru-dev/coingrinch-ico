@extends('layouts.customer')
<?php
$user = Auth::user();
?>
@section('content')
<div class="row">
  <div id="breadcrumb" class="col-xs-12">
    <a href="#" class="show-sidebar">
      <i class="fa fa-bars"></i>
    </a>
    <ol class="breadcrumb pull-left">
      <li><a href="{{url('/Customers')}}">Home</a></li>
      <li><a href="{{url('/Customers/Dashboard')}}">Dashboard</a></li>
      <li><a href="{{url('/Customers/Verification')}}">Verification</a></li>
    </ol>
  </div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 2-->
<div class="row">
  <div class="top-title text-center">
    <h2>Verification</h2>
    <h4>Please upload the following document in order to fully verify your FILLIT account</h4>
  </div>
</div>
<div class="row margin-top">
  <div class="col-sm-12">
    <div class="box">
      <div class="box-content">
        <div class="info-box">
          <p style="font-size:20px;">
          As a regulated financial service company , we are periodically required to identify users on our platform. This ensures we remain in compliance with KYC/AML laws in the jurisdictions in which we operate, something that is necessary for us to be able to continue to offer our services to our customers. We would like to inform you that you have to send a Proof of Identity (POI) like ID or passport, a Proof of Address (POA) and a selfie photo with your face shown clear. This selfie photo must contain your POI.
          </p>

          <h2>Instructions</h2>

          <h3>When uploading your photo ID: </h3>
          <p>Ensure that your document is valid and not expired, without hole punches or other modifications</p>
          <p>
            Ensure your document is in a well-lit area without glare. Natural sunlight is best
            Photograph the entire document and avoid cutting off any corners or sides
          </p>
          <p> Ensure the ID is fully visible and in focus</p>
          <p>
            Make sure the app or program you use to take the pictures does not add any logos or watermarks
            Do not obfuscate any information on the ID
          </p>

          <h3>When providing a "selfie" photo of your face:</h3>
          <p>Make sure the light is coming from in front of you, not behind you, such that your face is clearly visible without backlighting</p>
          <p>Face the camera directly and include from your shoulders to the top of your head, similar to a passport or ID photo</p>
          <p>
            Use a plain wall as a background if possible
            Do not wear sunglasses or hats
          </p>
          <p>If you are wearing glasses in your ID photo, wear them in your selfie photo. If you are not wearing glasses in your ID photo, remove them for your selfie photo</p>

          <p>The acceptable file formats are .pdf, .jpg, .jpeg, .png. The file size should not exceed 10MB.</p>

          <hr>
        </div>
      </div>
    </div>
    <div class="box">
      <form method="POST" action='' novalidate="" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="verification">
        <div class="box-content">
          <div class="info-box">
            <h3>Identification Document</h3>

            <p>Please provide photo of the front and back side of your identification document.</p>
            <p>Document must be of a good quality, with all details clearly visible.</p>

            <div class="form-group">
              <label for="id_passport">Frontside Of Your Identification Document</label>
              <p>
                <input class="form-control" type="file" multiple accept="image/jpg, image/jpeg, image/png ,application/pdf" name="passport" id="id_passport" onchange="document.getElementById('result').src = window.URL.createObjectURL(this.files[0])">
              </p>
              <div id="result" ></div>
              <label for="id_passport_backside">Backside Of Your Identification Document</label>
              <p>
                <input class="form-control" type="file" multiple accept="image/jpg, image/jpeg, image/png ,application/pdf" name="passport_backside" id="id_passport_backside" onchange="document.getElementById('result1').src = window.URL.createObjectURL(this.files[0])">
              </p>
              <div id="result1" ></div>
            </div>

            <p><small>Supported file formats: JPEG, JPG or PDF (max, 50MB)</small></p>
            <br>
            <h3>Clear Selfie Photo</h3>
            <p>Please provide a clear photo of your face.</p>
            <p>Document must be of a good quality, with all details clearly visible.</p>

            <div class="form-group">
              <label for="id_selfie_pho">Selfie Photo</label>
              <p>
                <input class="form-control" type="file" multiple accept="image/jpg, image/jpeg, image/png " name="selfie_pho" id="id_selfie_pho" onchange="document.getElementById('result2').src = window.URL.createObjectURL(this.files[0])">
              </p>
              <div id="result2" ></div>
            </div>
            <p><small>Supported file formats: JPEG, JPG or PNG (max, 50MB)</small></p>
            <br>
            <h3>Residence Document</h3>
            <p>You need to send us utility bill to aprove your address.</p> 


            <p>Document must be of a good quality, with all details clearly visible.</p>

            <div class="form-group">
              <label for="id_utility_bill">Residence Document</label>
              <p>
                <input class="form-control" type="file" multiple accept="image/jpg, image/jpeg, image/png " name="utility_bill" id="id_utility_bill" onchange="document.getElementById('result3').src = window.URL.createObjectURL(this.files[0])">
              </p>

              <div id="result3" ></div>

              <p><small>Supported file formats: JPEG, JPG or PDF (max, 50MB)</small></p>
            </div>
          </div>      
        </div>
        <div class="row"> 
          <div class="col-sm-12 text-center">
            <div class="button">
              
              <p><button type="submit" name="verify" class="btn btn-primary btn-lg">Upload and Verify</button></p>
              
              <br>Your last request was declined. Please reupload the correct information.<br>
              <p><button type="submit" name="reupload" class="btn btn-primary btn-lg">Reupload and verify</button></p>
              
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  
<!--End Dashboard 2 -->
<div style="height: 40px;"></div>
@endsection