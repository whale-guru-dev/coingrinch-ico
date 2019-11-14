
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!-->
    <html class="no-js" lang="en"><!--<![endif]-->
    <head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Coin Grinch</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Racing+Sans+One" rel="stylesheet">

    <meta name="description"  content="Creative Template" />
    <meta name="author" content="IG Design">
    <meta name="keywords"  content="ICO, GRT, token, success, purchase, " />
    <meta property="og:title" content="Coin Grinch" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://coingrinch.com" />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="470" />
    <meta property="og:image:height" content="246" />
    <meta property="og:site_name" content="coingrinch" />
    <meta property="og:description" content="Professional Coingrinch ICO Website" />
    <meta property="og:description" content="Coin Grinch" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:domain" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:description" content="Coin Grinch" />
    <meta name="twitter:image" content="" />

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="theme-color" content="#212121"/>
    <meta name="msapplication-navbutton-color" content="#212121"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#212121"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Web Fonts 
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i" rel="stylesheet"/> 
    
    <link href="https://fonts.googleapis.com/css?family=Racing+Sans+One" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('landing/css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/css/owl.transitions.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('landing/css/colors/color.css')}}"/>
    <link rel="stylesheet" href="{{asset('customer/custom/css/progress.css')}}">

    <link rel="stylesheet" href="{{asset('landing/css/responsive.css')}}">  

    <!-- Favicons
    ================================================== -->
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="{{asset('customer/vendor/sweetalert/dist/sweetalert.css')}}">
    <script src="{{asset('customer/vendor/sweetalert/dist/sweetalert.min.js')}}"></script>
    <!-- Favicons ================================================== -->
    
    <style type="text/css">
        #logo{
            width: 154px;
            padding: 0;
            margin: 0;
            display: block;
            background-size: 154px 40px;
            text-indent: -9000px;
        }

        .regBtn{
                display: block;
                cursor: pointer;
                border: 1px solid #0667d0;
                color: #0667d0;
                text-decoration: none;
                transition: all 150ms ease 0s;
                background-color: white !important;
        }

        .scroll-to-top {
            left: 10px !important;
        }

        .text-uppercase {
            text-transform: lowercase;
        }

        #faq {
            padding: 100px 0;
            text-align: left;
            background-color: rgb(237, 240, 243);

        }

        .form-control {
            background-color: #fffefe!important;
            border: 1px solid black;

        }

        label {
            color:black;
        }
        
        .file-input {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .file-input + label {
            width: 250px;
            font-size: 1.25em;
            font-weight: 700;
            color: #f1e5e6;
            background: linear-gradient(to right,#163961, #3bd1d3);
            cursor: pointer;
            border-radius: 20px;
            max-width: 80%;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: inline-block;
            overflow: hidden;
            padding: 0.625rem 1.25rem;
        }

        .full-height {
            height: 50vh;
        }

        #container{
            -webkit-box-shadow: 0 2px 5px 1px rgba(124,124,124,.2);
            box-shadow: 0 2px 5px 1px rgba(124,124,124,.2);
            background: white;
        }

        .form-group{
            margin-left: 20px;
        }

        .help-block{
            color: red;
            font-size: 12px;
            font-weight: bold;
        }

        .nav-item .btn{
            border-radius: 5px !important;
            padding: 15px 16px !important;
        }
    </style>
    
</head>
<body>

    <div class="loader">
       <div class="loader-inner"><img src="{{asset('landing/img/loading.gif')}}" alt="loading..."></div>
    </div>


  <div class="top-social-area">
      <div class="container">
      </div>
  </div>
  
  
    <!-- Nav and Logo
    ================================================== -->

    <div id="menu-wrap" class="menu-back cbp-af-header">
        <div class="container">
           
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light mx-lg-0">
                        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('landing/img/logo.png')}}" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <span class="menu-icon__line menu-icon__line-left"></span>
                                <span class="menu-icon__line"></span>
                                <span class="menu-icon__line menu-icon__line-right"></span>
                            </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#home')}}" data-ps2id-offset="120">home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#process')}}">Process</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://coingrinch.com/customer/custom/whitepaper.pdf">Whitepaper</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#roadmap')}}">Roadmap</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#affiliate')}}">affiliate</a>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#faq')}}">FAQ</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/#contact')}}">Contact</a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="btn btn-primary js-tilt __mPS2id" href="{{url('/login')}}" role="button" data-tilt-perspective="300" data-tilt-speed="700" data-tilt-max="24"><span>LOGIN</span></a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="btn btn-primary js-tilt regBtn __mPS2id" href="{{url('/register')}}" role="button" data-tilt-perspective="300" data-tilt-speed="700" data-tilt-max="24"><span>REGISTER</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="hooks" id="faq-hook"></div>
    <div id="faq">
        <!-- <div id="particles-js" class="min-height"></div> -->
        <div class="container" data-aos="fade-up" id="container">
            <div class="row">
                <div class="col-md-12 text-center section full-height height-auto-lg hide-over top-home">
                    <div class="hero-center-wrap relative-on-lg">
                        <h2>Token Listing Request</h2>
                        <p class="mt-3 mb-4 pb-3 font-weight-normal" style="color: #F9F9F9;letter-spacing: 1px;">Thank you for your trust in COINGRINCH! This form need to be filled by your team members, those filled by community members will be ignored. Once your token is seleted into our listing, we will contact you within 3 working days.</p>
                    </div>
                    
                    <div class="ocean">
                        <div class="wave"></div>
                        <div class="wave"></div>
                    </div>
                    <div id="particles-js" class="min-height"><canvas class="particles-js-canvas-el" width="1227" height="874" style="width: 100%; height: 100%;"></canvas></div>
                </div>
                <div class="col-md-12">
                    <form id="token-form"  method="post" action="{{url('/AddToken')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="messages text-center"></div>
                            </div>
                        </div>
                        <div class="controls">
                            <div class="row justify-content-left">
                                <div class="col-md-6">
                                    <div class="form-group  has-error has-danger">
                                        <label class="form_name">Project Name <span style="color: red;">*</span></label>
                                        <input id="form_name" type="text" name="proj_name" class="form-control" required>

                                        @if ($errors->has('proj_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('proj_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="form-group ">
                                        <label for="form_Symbol">Token Symbol. <span style="color: red;">*</span></label>
                                        <input id="form_Symbol" type="text" name="token_symbol" class="form-control" required>
                                        @if ($errors->has('token_symbol'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('token_symbol') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="form-group ">
                                        <label for="form_addr">Token Addr. <span style="color: red;">*</span></label>
                                        <input id="form_addr" type="text" name="token_addr" class="form-control" required>
                                        @if ($errors->has('token_addr'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('token_addr') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="form-group ">
                                        <label for="form_mail">Mail Address. <span style="color: red;">*</span></label>
                                        <input id="form_mail" type="text" name="mail_addr" class="form-control" required>
                                        @if ($errors->has('mail_addr'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('mail_addr') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="form-group ">
                                        <label for="form_website">Project Website. <span style="color: red;">*</span></label>
                                        <input id="form_website" type="text" name="website_url" class="form-control" required>
                                        @if ($errors->has('website_url'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('website_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="form-group ">
                                        <label for="form_reddit">Reddit Link.</label>
                                        <input id="form_reddit" type="text" name="reddit_link" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="form-group ">
                                        <label for="form_telegram">Telegram Link.</label>
                                        <input id="form_telegram" type="text" name="telegram_link" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="form-group ">
                                        <label for="form_Bitcointalk">Bitcointalk Link.</label>
                                        <input id="form_Bitcointalk" type="text" name="bitcointalk_link" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="form-group ">
                                        <label for="form_Twitter">Twitter Link.</label>
                                        <input id="form_Twitter" type="text" name="twitter_link" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 mt-md-0">
                                    <div class="form-group ">
                                        <label for="form_CoinMarketCap">CoinMarketCap Link (if listed).</label>
                                        <input id="form_CoinMarketCap" type="text" name="coinmarketcap_link" class="form-control">
                                    </div>
                                </div>

                            </div>
                            
                            <div class="row justify-content-left">
                                <div class="col-md-8 mt-3">
                                    <div class="form-group">
                                        <label>General Descriptions <span style="color: red;">*</span></label>
                                        <p>Information about the date of ICO, total supply, whether it has been listed on other exchanges, etc..</p>
                                        <textarea id="form_description" name="description" class="form-control" rows="4" required data-error="Please,leave us a description."></textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3">
                                    <div class="form-group">
                                        <label>Logo of your token <span style="color: red;">*</span></label>
                                        <p>500px*500px, PNG or JPG with transparent background</p>
                                        <p>Image formats like .jpg, .png, .gif, .bmp, .psd, .tiff are supported.</p>
                                        <div>
                                            <input type="file" name="token_logo" class="file-input" id="file">                        
                                            <label for="file" class="uppercase text-center">
                                                <span>Browse</span>
                                            </label>
                                        </div>
                                        <div>
                                            <img id="token_preview" src="#" alt="Your Token Logo" style="display: none" width="400" />
                                        </div>
                                        
                                        @if ($errors->has('token_logo'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('token_logo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8 mt-3 text-center">
                                    <input type="submit" class="btn btn-primary btn-send text-center" value="Submit">
                                </div>
                            </div>
                            <br><br>
                        </div>
                    </form>
                </div>

            </div>
            
        </div>

    </div>

    <!-- OLD Files END-->

    <style>
        footer .social-1 {
            font-size: 30px;
            padding: 5px 0 10px;
            max-width: 600px;
        }
        footer .social-1 a{
            color:#fff;
            padding-bottom: 10px;           
        }
        
        .m-auto {
            margin: auto!important;
        }

        .logo__steemit {
            fill: #ffffff;
            transition: 0.25s all ease-in-out;
        }   
    </style>

    <!-- OLD Files END-->

    <div class="section padding-top-big">
        <div class="background-parallax" style="background-image: url('{{asset('landing/img/parallax-5.jpg')}}')" data-enllax-ratio=".5" data-enllax-type="background" data-enllax-direction="vertical"></div>
        
        <footer>
            <div class="container padding-bottom-small">
                <div class="row">
                    <div class="col-sm-3  text-center">
                        <h6 class="text-white mb-4">NEWS LETTER</h6>
                        <div class="suscribe">
                            <form action="{{url('/NewsLetter')}}" method="POST">
                                {{csrf_field()}}
                                <input class="form-control text-left" placeholder="Enter your email" type="email" name="email" />
                                <button type="submit" class="btn btn-primary m-0 js-tilt" data-tilt-perspective="300" data-tilt-speed="700" data-tilt-max="24">
                                    <span>subscribe</span>
                                </button>
                            </form>
                        </div>
                        <p class="text-left text-white mb-0"><small>*We will never spam you.</small></p>
                    </div>
                    <div class="col-sm-3 text-center">
                        <div>
                            <img src="{{asset('landing/img/logo-white.png')}}" class="mb-4" alt="">
                        </div>
                        <div class="box-c">
                            <!--p>Contact us : <a href="#">support@coingrinch.com</a></p-->
                                <h6 class="text-white mb-4">Contact Us:</h6>
                                <p>
                                    <i class="fa fa-envelope"></i>&nbsp;<a href="mailto:support@coingrinch.com">support@coingrinch.com</a>
                                </p>
                                <p>
                                    <i class="fa fa-envelope"></i>&nbsp;<a href="mailto:affiliate@coingrinch.com">affiliate@coingrinch.com</a>
                                </p>
                        </div>
                    </div>
                    <div class="col-sm-3 text-center">
                        <h6 class="text-white mb-4">Useful Links:</h6>
                        <div class="col-sm-6">
                            <div class="footer-menu">
                                <ul class="ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/#home')}}">home</a>
                                    </li>         
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/#process')}}">Process</a>
                                    </li>       
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/#whitepaper')}}">Whitepaper</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/AddToken')}}">List New Coin</a>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-menu">
                                <ul class="ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/#affiliate')}}">affiliate</a>
                                    </li>                                
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/#faq')}}">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/#roadmap')}}">Roadmap</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 text-center">
                        <h6 class="text-white mb-4">Legal</h6>
                        <div class="offset-sm-2 col-sm-8 footer-menu">
                            <ul class="ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/Privacy-Policy')}}">Privacy Policy</a>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/Terms-of-Use')}}">Terms of Use</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer> 
        <div class="section py-4 background-dark-blue">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 footer text-center text-lg-left">
                        <p>Copyright © 2018. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="scroll-to-top">to top</div>

    <!-- JAVASCRIPT
    ================================================== -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5b0a35ef10b99c7b36d4570b/1ceggbrod';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->

    <script type="text/javascript">
       function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#token_preview').css('display','block')
                $('#token_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#file").change(function() {
          readURL(this);
        }); 
    </script>
    
  <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <script src="{{asset('landing/js/popper.min.js')}}"></script>
    <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('landing/js/plugins.js')}}"></script>
    <script src="{{asset('landing/js/particles.js')}}"></script>
    <script src="{{asset('landing/js/custom.js')}}"></script>

    <!-- End Document
================================================== -->
    @if(Session::get('msg'))
    <script>
    swal({title: "{{Session::get('msg')[0]}}",text: "{{Session::get('msg')[1]}}" , type: "{{Session::get('msg')[2]}}",showCancelButton: false,confirmButtonClass: "btn-success" ,confirmButtonText: 'OKAY'});
    </script>
    @endif
</body>
</html>