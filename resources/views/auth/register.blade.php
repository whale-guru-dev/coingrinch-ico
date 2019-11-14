@extends('layouts.customer')

@section('additional_css')
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />


<link href="{{asset('customer/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('customer/assets/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
<style type="text/css">
    body{
        background-color: #0667d0;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 14px;
        line-height: 20px;
    }

    .navbar-laravel{
        background-color: #0667d0;  
    }

    .navbar-laravel a{
        color:white !important;
    }

    .header{
        margin-bottom: 40px;
        height: 34px;
        font-size: 30px;
        font-weight: 400;
        line-height: 1.13;
        text-align: center;
        color: #ffffff;
    }

    .reg-form{
        z-index: 1000;
    }

    @media(max-width: 992px){
        .justify-content-center{
            /*max-width: 60%;*/
            margin: 40px auto;
        }
    }

    @media(min-width: 992px){
        .justify-content-center{
            max-width: 60%;
            margin: 40px auto;
        }
    }
    
    
    .checkbox{
        float: left;
    }

    #login{
        float: right;
    }

    .card{
        background: #ffffff;
        -webkit-box-shadow: 0px 1px 46px 4px rgba(0,0,0,0.28);
        box-shadow: 0px 1px 46px 4px rgba(0,0,0,0.28);
        border-radius: 4px;
        
    }
    
    .card-body{
        padding: 32px 24px
    }

    .account-extras{
        text-align: center;
        padding: 30px 0 0;
        font-size: 13px;
    }

    .account-extras a{
        font-size: 15px;
        color: #ffffff !important;
    }

    label {
        float: left;
    }

    .intl-tel-input .flag-container {
        height: 35px !important;
        padding: 0px !important;
    }

    .help-block{
        color: red;
        font-size: 12px;
        font-weight: bold;
    }

</style>
@endsection

@section('content')
<?php
    $error = Session::get('error');

    $sponsor = null;
    if(session('refer_by')){
        $sponsor = App\Models\User::where('ref_id', session('refer_by'))->first();
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <h2 class="header text-center">Create your account</h2>
        <div class="col-md-8 reg-form">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        @if($error == 1)
                            <div class="alert alert-danger">
                              <strong>Wrong Captcha !</strong> 
                            </div>
                        @elseif($error == 4)
                            <div class="alert alert-danger">
                              <strong>Captcha not completed !</strong> 
                            </div>
                        @endif
                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input id="uname" type="text" class="form-control{{ $errors->has('uname') ? ' is-invalid' : '' }}" placeholder="User Name" name="uname" value="{{ old('uname') }}" required>

                                @if ($errors->has('uname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('uname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" placeholder="Full Name" name="lname" value="{{ old('lname') }}" required>

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row"> 

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}"  required autofocus autocomplete="username">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"> 

                            <div class="col-md-12">

                                <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" id="mobile" name="mobile" type="text" value="{{ old('mobile') }}" placeholder="Mobile Number With Country Code" required>
                                <input id="hidden" type="hidden" name="mobilex">

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label ">Country</label>

                            <div class="col-md-8">
                                <select id="country" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" required>
                                        <option value="">Select country...</option>
                                        <option value="AL" {{ old('country') == "AL" ? 'selected' : '' }}>Albania</option>
                                        <option value="DZ" {{ old('country') == "DZ" ? 'selected' : '' }}>Algeria</option>
                                        <option value="AD" {{ old('country') == "AD" ? 'selected' : '' }}>Andorra</option>
                                        <option value="AO" {{ old('country') == "AO" ? 'selected' : '' }}>Angola</option>
                                        <option value="AI" {{ old('country') == "AI" ? 'selected' : '' }}>Anguilla</option>
                                        <option value="AG" {{ old('country') == "AG" ? 'selected' : '' }}>Antigua and Barbuda</option>
                                        <option value="AR" {{ old('country') == "AR" ? 'selected' : '' }}>Argentina</option>
                                        <option value="AM" {{ old('country') == "AM" ? 'selected' : '' }}>Armenia</option>
                                        <option value="AW" {{ old('country') == "AW" ? 'selected' : '' }}>Aruba</option>
                                        <option value="AU" {{ old('country') == "AU" ? 'selected' : '' }}>Australia</option>
                                        <option value="AT" {{ old('country') == "AT" ? 'selected' : '' }}>Austria</option>
                                        <option value="AZ" {{ old('country') == "AZ" ? 'selected' : '' }}>Azerbaijan Republic</option>
                                        <option value="BS" {{ old('country') == "BS" ? 'selected' : '' }}>Bahamas</option>
                                        <option value="BH" {{ old('country') == "BH" ? 'selected' : '' }}>Bahrain</option>
                                        <option value="BD" {{ old('country') == "BD" ? 'selected' : '' }}>Bangladesh</option>
                                        <option value="BB" {{ old('country') == "BB" ? 'selected' : '' }}>Barbados</option>
                                        <option value="BE" {{ old('country') == "BE" ? 'selected' : '' }}>Belgium</option>
                                        <option value="BZ" {{ old('country') == "BZ" ? 'selected' : '' }}>Belize</option>
                                        <option value="BJ" {{ old('country') == "BJ" ? 'selected' : '' }}>Benin</option>
                                        <option value="BM" {{ old('country') == "BM" ? 'selected' : '' }}>Bermuda</option>
                                        <option value="BT" {{ old('country') == "BT" ? 'selected' : '' }}>Bhutan</option>
                                        <option value="BO" {{ old('country') == "BO" ? 'selected' : '' }}>Bolivia</option>
                                        <option value="BA" {{ old('country') == "BA" ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                        <option value="BW" {{ old('country') == "BW" ? 'selected' : '' }}>Botswana</option>
                                        <option value="BR" {{ old('country') == "BR" ? 'selected' : '' }}>Brazil</option>
                                        <option value="BN" {{ old('country') == "BN" ? 'selected' : '' }}>Brunei</option>
                                        <option value="BG" {{ old('country') == "BG" ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="BF" {{ old('country') == "BF" ? 'selected' : '' }}>Burkina Faso</option>
                                        <option value="BI" {{ old('country') == "BI" ? 'selected' : '' }}>Burundi</option>
                                        <option value="KH" {{ old('country') == "KH" ? 'selected' : '' }}>Cambodia</option>
                                        <option value="CA" {{ old('country') == "CA" ? 'selected' : '' }}>Canada</option>
                                        <option value="CV" {{ old('country') == "CV" ? 'selected' : '' }}>Cape Verde</option>
                                        <option value="KY" {{ old('country') == "KY" ? 'selected' : '' }}>Cayman Islands</option>
                                        <option value="TD" {{ old('country') == "TD" ? 'selected' : '' }}>Chad</option>
                                        <option value="CL" {{ old('country') == "CL" ? 'selected' : '' }}>Chile</option>
                                        <option value="C2" {{ old('country') == "C2" ? 'selected' : '' }}>China Worldwide</option>
                                        <option value="CO" {{ old('country') == "CO" ? 'selected' : '' }}>Colombia</option>
                                        <option value="KM" {{ old('country') == "KM" ? 'selected' : '' }}>Comoros</option>
                                        <option value="CK" {{ old('country') == "CM" ? 'selected' : '' }}>Cook Islands</option>
                                        <option value="CR" {{ old('country') == "CR" ? 'selected' : '' }}>Costa Rica</option>
                                        <option value="HR" {{ old('country') == "HR" ? 'selected' : '' }}>Croatia</option>
                                        <option value="CY" {{ old('country') == "CY" ? 'selected' : '' }}>Cyprus</option>
                                        <option value="CZ" {{ old('country') == "CZ" ? 'selected' : '' }}>Czech Republic</option>
                                        <option value="CD" {{ old('country') == "CD" ? 'selected' : '' }}>Democratic Republic of the Congo</option>
                                        <option value="DK" {{ old('country') == "DK" ? 'selected' : '' }}>Denmark</option>
                                        <option value="DJ" {{ old('country') == "DJ" ? 'selected' : '' }}>Djibouti</option>
                                        <option value="DM" {{ old('country') == "DM" ? 'selected' : '' }}>Dominica</option>
                                        <option value="DO" {{ old('country') == "DO" ? 'selected' : '' }}>Dominican Republic</option>
                                        <option value="EC" {{ old('country') == "EC" ? 'selected' : '' }}>Ecuador</option>
                                        <option value="EG" {{ old('country') == "EG" ? 'selected' : '' }}>Egypt</option>
                                        <option value="SV" {{ old('country') == "SV" ? 'selected' : '' }}>El Salvador</option>
                                        <option value="ER" {{ old('country') == "ER" ? 'selected' : '' }}>Eritrea</option>
                                        <option value="EE" {{ old('country') == "EE" ? 'selected' : '' }}>Estonia</option>
                                        <option value="ET" {{ old('country') == "ET" ? 'selected' : '' }}>Ethiopia</option>
                                        <option value="FK" {{ old('country') == "FK" ? 'selected' : '' }}>Falkland Islands</option>
                                        <option value="FO" {{ old('country') == "FO" ? 'selected' : '' }}>Faroe Islands</option>
                                        <option value="FJ" {{ old('country') == "FJ" ? 'selected' : '' }}>Fiji</option>
                                        <option value="FI" {{ old('country') == "FI" ? 'selected' : '' }}>Finland</option>
                                        <option value="FR" {{ old('country') == "FR" ? 'selected' : '' }}>France</option>
                                        <option value="GF" {{ old('country') == "GF" ? 'selected' : '' }}>French Guiana</option>
                                        <option value="PF" {{ old('country') == "PF" ? 'selected' : '' }}>French Polynesia</option>
                                        <option value="GA" {{ old('country') == "GA" ? 'selected' : '' }}>Gabon Republic</option>
                                        <option value="GM" {{ old('country') == "GM" ? 'selected' : '' }}>Gambia</option>
                                        <option value="GE" {{ old('country') == "GE" ? 'selected' : '' }}>Georgia</option>
                                        <option value="DE" {{ old('country') == "DE" ? 'selected' : '' }}>Germany</option>
                                        <option value="GI" {{ old('country') == "GI" ? 'selected' : '' }}>Gibraltar</option>
                                        <option value="GR" {{ old('country') == "GR" ? 'selected' : '' }}>Greece</option>
                                        <option value="GL" {{ old('country') == "GL" ? 'selected' : '' }}>Greenland</option>
                                        <option value="GD" {{ old('country') == "GD" ? 'selected' : '' }}>Grenada</option>
                                        <option value="GP" {{ old('country') == "GP" ? 'selected' : '' }}>Guadeloupe</option>
                                        <option value="GT" {{ old('country') == "GT" ? 'selected' : '' }}>Guatemala</option>
                                        <option value="GN" {{ old('country') == "GN" ? 'selected' : '' }}>Guinea</option>
                                        <option value="GW" {{ old('country') == "GW" ? 'selected' : '' }}>Guinea Bissau</option>
                                        <option value="GY" {{ old('country') == "GY" ? 'selected' : '' }}>Guyana</option>
                                        <option value="HN" {{ old('country') == "HN" ? 'selected' : '' }}>Honduras</option>
                                        <option value="HK" {{ old('country') == "HK" ? 'selected' : '' }}>Hong Kong</option>
                                        <option value="HU" {{ old('country') == "HU" ? 'selected' : '' }}>Hungary</option>
                                        <option value="IS" {{ old('country') == "IS" ? 'selected' : '' }}>Iceland</option>
                                        <option value="IN" {{ old('country') == "IN" ? 'selected' : '' }}>India</option>
                                        <option value="ID" {{ old('country') == "ID" ? 'selected' : '' }}>Indonesia</option>
                                        <option value="IE" {{ old('country') == "IE" ? 'selected' : '' }}>Ireland</option>
                                        <option value="IL" {{ old('country') == "IL" ? 'selected' : '' }}>Israel</option>
                                        <option value="IT" {{ old('country') == "IT" ? 'selected' : '' }}>Italy</option>
                                        <option value="JM" {{ old('country') == "JM" ? 'selected' : '' }}>Jamaica</option>
                                        <option value="JP" {{ old('country') == "JP" ? 'selected' : '' }}>Japan</option>
                                        <option value="JO" {{ old('country') == "JO" ? 'selected' : '' }}>Jordan</option>
                                        <option value="KZ" {{ old('country') == "KZ" ? 'selected' : '' }}>Kazakhstan</option>
                                        <option value="KE" {{ old('country') == "KE" ? 'selected' : '' }}>Kenya</option>
                                        <option value="KI" {{ old('country') == "KI" ? 'selected' : '' }}>Kiribati</option>
                                        <option value="KW" {{ old('country') == "KW" ? 'selected' : '' }}>Kuwait</option>
                                        <option value="KG" {{ old('country') == "KG" ? 'selected' : '' }}>Kyrgyzstan</option>
                                        <option value="LA" {{ old('country') == "LA" ? 'selected' : '' }}>Laos</option>
                                        <option value="LV" {{ old('country') == "LV" ? 'selected' : '' }}>Latvia</option>
                                        <option value="LS" {{ old('country') == "LS" ? 'selected' : '' }}>Lesotho</option>
                                        <option value="LI" {{ old('country') == "LI" ? 'selected' : '' }}>Liechtenstein</option>
                                        <option value="LT" {{ old('country') == "LT" ? 'selected' : '' }}>Lithuania</option>
                                        <option value="LU" {{ old('country') == "LU" ? 'selected' : '' }}>Luxembourg</option>
                                        <option value="MG" {{ old('country') == "MG" ? 'selected' : '' }}>Madagascar</option>
                                        <option value="MW" {{ old('country') == "MW" ? 'selected' : '' }}>Malawi</option>
                                        <option value="MY" {{ old('country') == "MY" ? 'selected' : '' }}>Malaysia</option>
                                        <option value="MV" {{ old('country') == "MV" ? 'selected' : '' }}>Maldives</option>
                                        <option value="ML" {{ old('country') == "ML" ? 'selected' : '' }}>Mali</option>
                                        <option value="MT" {{ old('country') == "MT" ? 'selected' : '' }}>Malta</option>
                                        <option value="MH" {{ old('country') == "MH" ? 'selected' : '' }}>Marshall Islands</option>
                                        <option value="MQ" {{ old('country') == "MQ" ? 'selected' : '' }}>Martinique</option>
                                        <option value="MR" {{ old('country') == "MR" ? 'selected' : '' }}>Mauritania</option>
                                        <option value="MU" {{ old('country') == "MU" ? 'selected' : '' }}>Mauritius</option>
                                        <option value="YT" {{ old('country') == "YT" ? 'selected' : '' }}>Mayotte</option>
                                        <option value="MX" {{ old('country') == "MX" ? 'selected' : '' }}>Mexico</option>
                                        <option value="FM" {{ old('country') == "FM" ? 'selected' : '' }}>Micronesia</option>
                                        <option value="MN" {{ old('country') == "MN" ? 'selected' : '' }}>Mongolia</option>
                                        <option value="MS" {{ old('country') == "MS" ? 'selected' : '' }}>Montserrat</option>
                                        <option value="MA" {{ old('country') == "MA" ? 'selected' : '' }}>Morocco</option>
                                        <option value="MZ" {{ old('country') == "MZ" ? 'selected' : '' }}>Mozambique</option>
                                        <option value="NA" {{ old('country') == "NA" ? 'selected' : '' }}>Namibia</option>
                                        <option value="NR" {{ old('country') == "NR" ? 'selected' : '' }}>Nauru</option>
                                        <option value="NP" {{ old('country') == "NP" ? 'selected' : '' }}>Nepal</option>
                                        <option value="NL" {{ old('country') == "NL" ? 'selected' : '' }}>Netherlands</option>
                                        <option value="AN" {{ old('country') == "AN" ? 'selected' : '' }}>Netherlands Antilles</option>
                                        <option value="NC" {{ old('country') == "NC" ? 'selected' : '' }}>New Caledonia</option>
                                        <option value="NZ" {{ old('country') == "NZ" ? 'selected' : '' }}>New Zealand</option>
                                        <option value="NI" {{ old('country') == "NI" ? 'selected' : '' }}>Nicaragua</option>
                                        <option value="NE" {{ old('country') == "NE" ? 'selected' : '' }}>Niger</option>
                                        <option value="NU" {{ old('country') == "NU" ? 'selected' : '' }}>Niue</option>
                                        <option value="NF" {{ old('country') == "NF" ? 'selected' : '' }}>Norfolk Island</option>
                                        <option value="NO" {{ old('country') == "NO" ? 'selected' : '' }}>Norway</option>
                                        <option value="OM" {{ old('country') == "OM" ? 'selected' : '' }}>Oman</option>
                                        <option value="PW" {{ old('country') == "PW" ? 'selected' : '' }}>Palau</option>
                                        <option value="PA" {{ old('country') == "PA" ? 'selected' : '' }}>Panama</option>
                                        <option value="PK" {{ old('country') == "PK" ? 'selected' : '' }}>Pakistan</option>
                                        <option value="PG" {{ old('country') == "PG" ? 'selected' : '' }}>Papua New Guinea</option>
                                        <option value="PE" {{ old('country') == "PE" ? 'selected' : '' }}>Peru</option>
                                        <option value="PH" {{ old('country') == "PH" ? 'selected' : '' }}>Philippines</option>
                                        <option value="PN" {{ old('country') == "PN" ? 'selected' : '' }}>Pitcairn Islands</option>
                                        <option value="PL" {{ old('country') == "PL" ? 'selected' : '' }}>Poland</option>
                                        <option value="PT" {{ old('country') == "PT" ? 'selected' : '' }}>Portugal</option>
                                        <option value="QA" {{ old('country') == "QA" ? 'selected' : '' }}>Qatar</option>
                                        <option value="CG" {{ old('country') == "CG" ? 'selected' : '' }}>Republic of the Congo</option>
                                        <option value="RE" {{ old('country') == "RE" ? 'selected' : '' }}>Reunion</option>
                                        <option value="RO" {{ old('country') == "RO" ? 'selected' : '' }}>Romania</option>
                                        <option value="RU" {{ old('country') == "RU" ? 'selected' : '' }}>Russia</option>
                                        <option value="RW" {{ old('country') == "RW" ? 'selected' : '' }}>Rwanda</option>
                                        <option value="KN" {{ old('country') == "KN" ? 'selected' : '' }}>Saint Kitts and Nevis Anguilla</option>
                                        <option value="PM" {{ old('country') == "PM" ? 'selected' : '' }}>Saint Pierre and Miquelon</option>
                                        <option value="VC" {{ old('country') == "VC" ? 'selected' : '' }}>Saint Vincent and Grenadines</option>
                                        <option value="WS" {{ old('country') == "WS" ? 'selected' : '' }}>Samoa</option>
                                        <option value="SM" {{ old('country') == "SM" ? 'selected' : '' }}>San Marino</option>
                                        <option value="ST" {{ old('country') == "ST" ? 'selected' : '' }}>São Tomé and Príncipe</option>
                                        <option value="SA" {{ old('country') == "SA" ? 'selected' : '' }}>Saudi Arabia</option>
                                        <option value="SN" {{ old('country') == "SN" ? 'selected' : '' }}>Senegal</option>
                                        <option value="RS" {{ old('country') == "RS" ? 'selected' : '' }}>Serbia</option>
                                        <option value="SC" {{ old('country') == "SC" ? 'selected' : '' }}>Seychelles</option>
                                        <option value="SL" {{ old('country') == "SL" ? 'selected' : '' }}>Sierra Leone</option>
                                        <option value="SG" {{ old('country') == "SG" ? 'selected' : '' }}>Singapore</option>
                                        <option value="SK" {{ old('country') == "SK" ? 'selected' : '' }}>Slovakia</option>
                                        <option value="SI" {{ old('country') == "SI" ? 'selected' : '' }}>Slovenia</option>
                                        <option value="SB" {{ old('country') == "SB" ? 'selected' : '' }}>Solomon Islands</option>
                                        <option value="SO" {{ old('country') == "SO" ? 'selected' : '' }}>Somalia</option>
                                        <option value="ZA" {{ old('country') == "ZA" ? 'selected' : '' }}>South Africa</option>
                                        <option value="KR" {{ old('country') == "KR" ? 'selected' : '' }}>South Korea</option>
                                        <option value="ES" {{ old('country') == "ES" ? 'selected' : '' }}>Spain</option>
                                        <option value="LK" {{ old('country') == "LK" ? 'selected' : '' }}>Sri Lanka</option>
                                        <option value="SH" {{ old('country') == "SH" ? 'selected' : '' }}>St. Helena</option>
                                        <option value="LC" {{ old('country') == "LC" ? 'selected' : '' }}>St. Lucia</option>
                                        <option value="SR" {{ old('country') == "SR" ? 'selected' : '' }}>Suriname</option>
                                        <option value="SJ" {{ old('country') == "SJ" ? 'selected' : '' }}>Svalbard and Jan Mayen Islands</option>
                                        <option value="SZ" {{ old('country') == "SZ" ? 'selected' : '' }}>Swaziland</option>
                                        <option value="SE" {{ old('country') == "SE" ? 'selected' : '' }}>Sweden</option>
                                        <option value="CH" {{ old('country') == "CH" ? 'selected' : '' }}>Switzerland</option>
                                        <option value="TW" {{ old('country') == "TW" ? 'selected' : '' }}>Taiwan</option>
                                        <option value="TJ" {{ old('country') == "TJ" ? 'selected' : '' }}>Tajikistan</option>
                                        <option value="TZ" {{ old('country') == "TZ" ? 'selected' : '' }}>Tanzania</option>
                                        <option value="TH" {{ old('country') == "TH" ? 'selected' : '' }}>Thailand</option>
                                        <option value="TG" {{ old('country') == "TG" ? 'selected' : '' }}>Togo</option>
                                        <option value="TO" {{ old('country') == "TO" ? 'selected' : '' }}>Tonga</option>
                                        <option value="TT" {{ old('country') == "TT" ? 'selected' : '' }}>Trinidad and Tobago</option>
                                        <option value="TN" {{ old('country') == "TN" ? 'selected' : '' }}>Tunisia</option>
                                        <option value="TR" {{ old('country') == "TR" ? 'selected' : '' }}>Turkey</option>
                                        <option value="TM" {{ old('country') == "TM" ? 'selected' : '' }}>Turkmenistan</option>
                                        <option value="TC" {{ old('country') == "TC" ? 'selected' : '' }}>Turks and Caicos Islands</option>
                                        <option value="TV" {{ old('country') == "TV" ? 'selected' : '' }}>Tuvalu</option>
                                        <option value="UG" {{ old('country') == "UG" ? 'selected' : '' }}>Uganda</option>
                                        <option value="UA" {{ old('country') == "UA" ? 'selected' : '' }}>Ukraine</option>
                                        <option value="AE" {{ old('country') == "AE" ? 'selected' : '' }}>United Arab Emirates</option>
                                        <option value="GB" {{ old('country') == "GB" ? 'selected' : '' }}>United Kingdom</option>
                                        <option value="US" {{ old('country') == "US" ? 'selected' : '' }}>United States</option>
                                        <option value="UY" {{ old('country') == "UY" ? 'selected' : '' }}>Uruguay</option>
                                        <option value="VU" {{ old('country') == "VU" ? 'selected' : '' }}>Vanuatu</option>
                                        <option value="VA" {{ old('country') == "VA" ? 'selected' : '' }}>Vatican City State</option>
                                        <option value="VE" {{ old('country') == "VE" ? 'selected' : '' }}>Venezuela</option>
                                        <option value="VN" {{ old('country') == "VN" ? 'selected' : '' }}>Vietnam</option>
                                        <option value="VG" {{ old('country') == "VG" ? 'selected' : '' }}>Virgin Islands (British)</option>
                                        <option value="WF" {{ old('country') == "WF" ? 'selected' : '' }}>Wallis and Futuna Islands</option>
                                        <option value="YE" {{ old('country') == "YE" ? 'selected' : '' }}>Yemen</option>
                                        <option value="ZM" {{ old('country') == "ZM" ? 'selected' : '' }}>Zambia</option>
                                    </select>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label ">Gender</label>

                            <div class="col-md-8">

                                <select name="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" id="gender"  value="{{ old('gender') }}" required>
                                    <option value="">I am...</option>
                                    <option value="male" {{ old('gender') == "male" ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == "female" ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == "other" ? 'selected' : '' }}>Other</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="birth" class="col-md-4 col-form-label ">Sponsor</label>

                            <div class="col-md-8">
                                <input id="sponsor" type="text" class="form-control" placeholder="Your Sponsor" value="<?php if($sponsor) echo $sponsor->lname;?>"  readonly="">
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Choose A Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <br>
                                <div class="alert alert-danger" id="pCheck">The password must be at least 8 characters.</div>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="g-recaptcha" data-theme="dark" data-sitekey="{{env('RE_CAP_SITE')}}"></div><br>

                        <div class="form-group row mb-0">
                            <!-- <div class="col-md-12"> -->
                                <input type="submit" name="commit" value="Create account" class="btn btn-primary" style="width: 100%;" data-disable-with="Creating Account...">
                            <!-- </div> -->
                        </div>
                    </form>
                </div>
            </div>
            <div class="account-extras">
                <p><a href="{{route('login')}}">Already have an account?</a></p>
            </div>
        </div>
    </div>
</div>
@endsection


@section('additional_js')
<script src="{{asset('customer/assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="{{asset('customer/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

<script src="{{asset('customer/assets/js/app.min.js')}}" type="text/javascript"></script>

<script src="{{asset('customer/assets/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('customer/assets/js/components-date-time-pickers.min.js')}}" type="text/javascript"></script>

<link rel="stylesheet" href="{{asset('customer/assets/css/intlTelInput.css')}}">
<script src="{{asset('customer/assets/js/intlTelInput.js')}}"></script>
<script>
    $("#mobile").intlTelInput({

         geoIpLookup: function(callback) {
           $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
             var countryCode = (resp && resp.country) ? resp.country : "";
             callback(countryCode);
           });
         },

         initialCountry: "auto",

         separateDialCode: true,
        utilsScript: "{{asset('customer/assets/js/utils.js')}}"
    });

    $("form").submit(function() {
        $("#hidden").val($("#mobile").intlTelInput("getNumber"));
    });

    var pass = $("#password");
    pass.keyup(function(){
        if(pass.val().length>=8) p8=1; else p8=0;
        // if(/[0-9]/.test(pass.val())) pD=1; else pD=0;
        // if(/[a-z]/.test(pass.val())) pL=1; else pL=0;
        // if(/[A-Z]/.test(pass.val())) pU=1; else pU=0;
        // if(/[!@#$%^&*_()]/.test(pass.val())) pS=1; else pS=0;
        // if(p8==1 && pD==1 && pL==1 && pU==1 && pS==1)
        if(p8==1)
            $("#pCheck").hide();
        else{
            $("#pCheck").show();
        }
    });

    $.validate({
        lang: 'en'
      });
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    var width = $('.g-recaptcha').parent().width();
    if (width < 302) {
        var scale = width / 302;
        $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
        $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
        $('.g-recaptcha').css('transform-origin', '0 0');
        $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
    }
</script>
@endsection