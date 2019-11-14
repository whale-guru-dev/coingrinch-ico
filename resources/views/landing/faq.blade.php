
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
    <link href="{{asset('assets/css/TimeCircles.css')}}" rel="stylesheet">  
    <link rel="stylesheet" href="{{asset('landing/css/responsive.css')}}">  

    <!-- Favicons
    ================================================== -->
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    
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

        #faq-logo{
            margin-left: auto;
            margin-right: auto;
        }

        #faq-content{
            margin-top: 50px;
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
        <div class="container" data-aos="fade-up">
            <div class="row">
               <img src="{{asset('assets/images/token-final.png')}}" width="25%" height="25%" id="faq-logo">
            </div>
            <div class="row" id="faq-content">
                <div class="col-md-12">

                    <h2>Frequently Asked Questions</h2>
                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example1">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example1" aria-expanded="false" aria-controls="collapse-example1">
                        <i class="fa fa-chevron-down pull-right"></i>
                        What is CoinGrinch?
                    </a>
                            </h5>
                        </div>
                        <div id="collapse-example1" class="collapse " aria-labelledby="heading-example1">
                            <div class="card-block">
                                <p><br>CoinGrinch is a next level crypto exchange that shares it's daily trading profits with all Grinch Token(GRT) holders.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example2">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapse-example2" aria-expanded="false" aria-controls="collapse-example2">
                        <i class="fa fa-chevron-down pull-right"></i>
                        WHEN WILL THE ICO BEGIN?
                    </a>
                            </h5>
                        </div>
                        <div id="collapse-example2" class="collapse " aria-labelledby="heading-example2">
                            <div class="card-block">
                                <p><br>The ICO will begin on JUNE 1, 2018 and last till JULY 15, 2018. Early birds get a higher bonus.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example3">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example3" aria-expanded="false" aria-controls="collapse-example3">
                        <i class="fa fa-chevron-down pull-right"></i>
                        Does CoinGrinch have it's own coin?
                    </a>
                            </h5>
                        </div>
                        <div id="collapse-example3" class="collapse " aria-labelledby="heading-example3">
                            <div class="card-block">
                                <p><br>Yes,  it is based on ERC-20 token.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example4">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapse-example4" aria-expanded="true" aria-controls="collapse-example4">
                        <i class="fa fa-chevron-down pull-right"></i>
                        WHAT IS THE DIFFERENCE BETWEEN COINGRINCH AND BINANCE?
                    </a>
                            </h5>
                        </div>
                        <div id="collapse-example4" class="collapse " aria-labelledby="heading-example4">
                            <div class="card-block">
                                <p> <br>In many ways the 2 platforms are similar.  We are not trying to re-invent the wheel, just improve on it.  Coingrinch strives to be a NEWER, CLEANER, FASTER trading platform than all of it's predecessors. In addition to that, we also offer 50% profit sharing program that pays out daily to all GRT holders. We believe this will propel CoinGrinch and the GRT token further and faster than any other exchange platform.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example5">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example5" aria-expanded="true" aria-controls="collapse-example5">
                        <i class="fa fa-chevron-down pull-right"></i>
                        Do we need to buy GRT token in order to trade on the platform?
                    </a>
                            </h5>
                        </div>
                        <div id="collapse-example5" class="collapse " aria-labelledby="heading-example5">
                            <div class="card-block">
                                <p> <br>No, once the exchange is launched, you can trade using any other the available alt coins we support on the site. If you trade with a regular coin such as Bitcoin or Litecoin, you will be charged a 0.1% fee for all buy and sell trades.  If you use the GRT token when trading you will save 50% on those same fees.  Using the GRT, you will be charged only 0.05%, exactly half off of the normal trading fee.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-left">
                        <div class="card-header" id="heading-example6">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapse-example6" aria-expanded="false" aria-controls="collapse-example6">
                        <i class="fa fa-chevron-down pull-right"></i>
                        HOW MANY COINS WILL YOU HOST/SUPPORT WHEN THE EXCHANGE STARTS?
                    </a>
                            </h5>
                        </div>
                        <div id="collapse-example6" class="collapse" aria-labelledby="heading-example6">
                            <div class="card-block">
                                <p><br>
                                We will support 10 - 15  alt coins when the exchange is fully launched. ( We will add more and more coins each month.)
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example7">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example7" aria-expanded="false" aria-controls="collapse-example7">
                        <i class="fa fa-chevron-down pull-right"></i>
                        What alt coins will you host when exchange launches?
                    </a>
                            </h5>
                        </div>
                        <div id="collapse-example7" class="collapse " aria-labelledby="heading-example7">
                            <div class="card-block">
                                <p style="display: block;">
                                <br>
                                Bitcoin, Ethereum, Ripple, Bitcoin Cash, EOS, Litecoin, Cardano, Stellar, IOTA, NEO, Monero, Dash, Tron, NEM and GRT,  but we will keep adding new currencies every month.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example8">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example8" aria-expanded="false" aria-controls="collapse-example8">
                        <i class="fa fa-chevron-down pull-right"></i>
                        Will you be Mining, Staking, or Lending on CoinGrinch?
                    </a>
                            </h5>
                        </div>
                        <div id="collapse-example8" class="collapse " aria-labelledby="heading-example8">
                            <div class="card-block">
                                <p style="display: block;">
                                <br>
                                No, CoinGrinch is purely a trading platform.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-howtodeposit">

                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-howtodeposit" aria-expanded="false" aria-controls="#collapse-howtodeposit">
                        <i class="fa fa-chevron-down pull-right"></i>
                        How do I buy GRT token?
                    </a>
                            </h5>
                        </div>
                        <div id="collapse-howtodeposit" class="collapse " aria-labelledby="heading-howtodeposit">
                            <div class="card-block">
                                <p><br>On June 1, 2018 you will be able to buy GRT by: </p>
                                <p>1. Sign-up.</p>
                                <p>2. Click Wallet - Deposits and Withdrawals, (Deposit Btc or Eth).</p>
                                <p>3. Click Buy Token tab.</p>
                                <p>4. Choose whether you are using Btc or Eth.</p>
                                <p>5. Enter the amount of GRT you want to purchase.</p>
                                <p>6. Click the Buy Token Button.</p>
                                <p>That's it. Your (GRT) Tokens will be in your portfolio on the dashboard.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example9">

                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example9" aria-expanded="false" aria-controls="collapse-example9">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    How do I start earning with the profit sharing program?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-example9" class="collapse " aria-labelledby="heading-example9">
                            <div class="card-block">
                                <p><br>All GRT holders (meaning you purchased GRT and you're holding it on the CoinGrinch site) will automatically start earning (various alt coins) on a daily basis, once the exchange is fully launched.</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example10">

                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example10" aria-expanded="false" aria-controls="collapse-example10">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    When will the exchange be fully launched?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-example10" class="collapse " aria-labelledby="heading-example10">
                            <div class="card-block">
                                <p><br>We are shooting for the middle of September, to possibly the first week in October.</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example11">

                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example11" aria-expanded="false" aria-controls="collapse-example11">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    Who are the founders of CoinGrinch?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-example11" class="collapse " aria-labelledby="heading-example11">
                            <div class="card-block">
                                <p><br>Ray Malakovski - Founder</p>
                                <p>Michael Adler - Founder</p>
                                <p>Joseph Natale - Founder</p>

                                <p>San Loi - Technical Advisor</p>
                                <p>Meiy Kannoy - Developer</p>
                                <p>Hanase Cenrrue - Developer</p>
                                <p>Najim Sadir - Advertising/marketing</p>

                                <p>Beth Margret - Chat Staff</p>
                                <p>Wilma Sorento - Chat Staff</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example12">

                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example12" aria-expanded="false" aria-controls="collapse-example12">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    Do I need an Ethereum wallet that accepts ERC-20 tokens before I can buy GRT tokens?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-example12" class="collapse " aria-labelledby="heading-example12">
                            <div class="card-block">
                                <p><br>No, you can buy GRT at any time, and add your ETH address at your convenience.</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example13">

                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example13" aria-expanded="false" aria-controls="collapse-example13">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    Will I be forced to get an EXTERNAL Eth wallet address?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-example13" class="collapse " aria-labelledby="heading-example13">
                            <div class="card-block">
                                <p><br>No it's optional.</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example14">

                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example14" aria-expanded="false" aria-controls="collapse-example14">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    How much do you pay sponsors for sending people who buy GRT?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-example14" class="collapse " aria-labelledby="heading-example14">
                            <div class="card-block">
                                <p><br>There is a 2 level affiliate system set up for the ICO phase. CoinGrinch pays 10% for any GRT sold to your 1st level referrals. CoinGrinch pays 3% for any GRT sold to your 2nd level referrals. If the referral pays in btc, then the sponsor gets paid in btc. If the referral pays using eth, the sponsor will get your payment in eth.
(Sponsors will be able to withdrawals their btc and eth earnings immediately after their referrals purchase GRT from CoinGrinch.)</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example15">

                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example15" aria-expanded="false" aria-controls="collapse-example15">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    How much do you pay sponsors for referrals who trade on the CoinGrinch exchange when it launches?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-example15" class="collapse " aria-labelledby="heading-example15">
                            <div class="card-block">
                                <p><br>CoinGrinch will pay 25% of the total amount of trading fees the sponsors referrals generate each day. Yes sponsors get paid when their affiliates trade. (sponsors receive payment in the form of multiple altcoins that their referral traded).</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card" data-aos="fade-right">
                        <div class="card-header" id="heading-example16">

                            <h5 class="mb-0">
                                <a data-toggle="collapse" class="text-uppercase" href="#collapse-example16" aria-expanded="false" aria-controls="collapse-example16">
                                    <i class="fa fa-chevron-down pull-right"></i>
                                    Why should I consider buying into this ICO?
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-example16" class="collapse " aria-labelledby="heading-example16">
                            <div class="card-block">
                                <p><br>For many reasons!  When you look at the growth of crypto exchanges in the past you see they are a growing industry.  Once Binance came in and changed the game by adding a COIN w/blockchain to a crypto currency exchange, in a very short time they surpassed all of the other crypto exchanges in the market. In only 8 months they hit over 800,000,000 million dollars market cap. (That's more than Deutsche Bank.) CoinGrinch simply took that idea and added profit sharing to the mix, thus giving our GRT token even more strength and stability.  We believe we will be the number one exchange in UNDER A YEAR.</p>
                                
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
        </div>

    </div>


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

    <div class="section padding-top-big landing-section">
        <div class="background-parallax" style="background-image: url('{{asset('landing/img/parallax-5.jpg')}}')" data-enllax-ratio=".5" data-enllax-type="background" data-enllax-direction="vertical"></div>
        
        <footer>
            <div class="container padding-bottom-small">
                <div class="row">
                    <div class="col-sm-3  text-center">
                        <h6 class="text-white mb-4">NEWS LETTER</h6>
                        <div class="suscribe">
                            <form action="{{url('/NewsLetter')}}" method="POST">
                                {{csrf_field()}}
                                <input class="form-control text-left" placeholder="Enter your email" type="email" name="email" required="" />
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
                <!--
				<hr>
                <div class="row justify-content-between">
                    <div class="col-sm-2">
                    <h6 class="text-white mb-4" style="padding-top:10px">
                        Join Us On:  
                    </h6>
                        <!--span class="col" style="
                            display: flex;
                            align-items: center;
                            font-size:20px;
                            ">Social Contacts: 
                        </span-->
                    <!--
					</div>
                    <div class="col-sm-10">
                        <div class="row social-1 m-auto">
                            <a class="col" href="https://twitter.com/coingrinch?lang=en" target="_blank">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a class="col" href="https://t.me/joinchat/I2s2FA3VmCnBMAuUHcEHng" target="_blank">
                                <i class="fa fa-telegram" aria-hidden="true"></i>
                            </a>
                            <a class="col" href="https://www.youtube.com/channel/UCdvs4OaJ-W_aS7y9C-ooN5w" target="_blank">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                            </a>
                            <a class="col" href="https://www.reddit.com/user/CoinGrinch" target="_blank">
                                <i class="fa fa-reddit-alien" aria-hidden="true"></i>
                            </a>
                            <a class="col" href="https://medium.com/@CoinGrinch" target="_blank">
                                <i class="fa fa-medium" aria-hidden="true"></i>
                            </a>                            
                            <a class="col" href="https://discord.gg/93cs4Jp" target="_blank">
                                <svg aria-hidden="true" data-prefix="fab" data-icon="discord" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-discord fa-w-14" style="width: 30px;">
                                    <path fill="currentColor" d="M297.216 243.2c0 15.616-11.52 28.416-26.112 28.416-14.336 0-26.112-12.8-26.112-28.416s11.52-28.416 26.112-28.416c14.592 0 26.112 12.8 26.112 28.416zm-119.552-28.416c-14.592 0-26.112 12.8-26.112 28.416s11.776 28.416 26.112 28.416c14.592 0 26.112-12.8 26.112-28.416.256-15.616-11.52-28.416-26.112-28.416zM448 52.736V512c-64.494-56.994-43.868-38.128-118.784-107.776l13.568 47.36H52.48C23.552 451.584 0 428.032 0 398.848V52.736C0 23.552 23.552 0 52.48 0h343.04C424.448 0 448 23.552 448 52.736zm-72.96 242.688c0-82.432-36.864-149.248-36.864-149.248-36.864-27.648-71.936-26.88-71.936-26.88l-3.584 4.096c43.52 13.312 63.744 32.512 63.744 32.512-60.811-33.329-132.244-33.335-191.232-7.424-9.472 4.352-15.104 7.424-15.104 7.424s21.248-20.224 67.328-33.536l-2.56-3.072s-35.072-.768-71.936 26.88c0 0-36.864 66.816-36.864 149.248 0 0 21.504 37.12 78.08 38.912 0 0 9.472-11.52 17.152-21.248-32.512-9.728-44.8-30.208-44.8-30.208 3.766 2.636 9.976 6.053 10.496 6.4 43.21 24.198 104.588 32.126 159.744 8.96 8.96-3.328 18.944-8.192 29.44-15.104 0 0-12.8 20.992-46.336 30.464 7.68 9.728 16.896 20.736 16.896 20.736 56.576-1.792 78.336-38.912 78.336-38.912z" class=""></path>
                                </svg>
                            </a>
                            <!--a class="col" href="https://medium.com/@CoinGrinch" target="_blank">
                                <svg aria-hidden="true" data-prefix="fab" data-icon="medium" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-medium fa-w-14" style="width: 30px;">
                                    <path fill="currentColor" d="M0 32v448h448V32H0zm372.2 106.1l-24 23c-2.1 1.6-3.1 4.2-2.7 6.7v169.3c-.4 2.6.6 5.2 2.7 6.7l23.5 23v5.1h-118V367l24.3-23.6c2.4-2.4 2.4-3.1 2.4-6.7V199.8l-67.6 171.6h-9.1L125 199.8v115c-.7 4.8 1 9.7 4.4 13.2l31.6 38.3v5.1H71.2v-5.1l31.6-38.3c3.4-3.5 4.9-8.4 4.1-13.2v-133c.4-3.7-1-7.3-3.8-9.8L75 138.1V133h87.3l67.4 148L289 133.1h83.2v5z" class=""></path>
                                </svg>
                            </a-->
							<!--
                            <a class="col" href="https://steemit.com/@coingrinch" target="_blank">
                                <svg width="140" height="30" viewBox="0 0 150 40" version="1.1">
                                    <g id="steemit">
                                        <path class="logo__steemit" d="M49,24.015935 C49.4429506,26.9151335 51.8962153,28.6681372 55.43982,28.6681372 C58.8471321,28.6681372 61.33447,26.8477103 61.33447,23.8810886 C61.33447,21.689834 60.0396914,20.2402347 57.4501341,19.6334258 L54.2472607,18.8917704 C53.1569208,18.6220775 52.6798971,18.1838265 52.6798971,17.5095944 C52.6798971,16.329688 53.9065295,15.7903022 55.0990888,15.7903022 C56.6664524,15.7903022 57.5523535,16.4645344 57.8590116,17.4421711 L61.1981775,17.4421711 C60.6870807,14.7115307 58.6767665,13.0259503 55.1331619,13.0259503 C51.8280691,13.0259503 49.4088775,15.0149352 49.4088775,17.711864 C49.4088775,20.1728115 51.0103142,21.3190062 53.1569208,21.8246804 L56.291648,22.5663358 C57.5523535,22.8697403 58.0634503,23.3079913 58.0634503,24.1170699 C58.0634503,25.2969762 57.0412567,25.9037852 55.4738931,25.9037852 C53.9746757,25.9037852 52.8502627,25.2632646 52.4754584,24.015935 L49,24.015935 Z M65.4573177,24.2856279 C65.4573177,27.2522496 67.3654125,28.6681372 70.0571891,28.6681372 C71.1134559,28.6681372 72.0334302,28.4658675 72.6126732,28.1287514 L72.6126732,25.060995 C72.1356495,25.3981111 71.3519677,25.6678039 70.6705053,25.6678039 C69.5460923,25.6678039 68.8646298,25.1284182 68.8646298,23.9148002 L68.8646298,16.16113 L72.271942,16.16113 L72.271942,13.3630664 L68.8646298,13.3630664 L68.8646298,9.35138478 L65.4573177,9.35138478 L65.4573177,11.0538211 C65.4573177,11.2294024 65.4573177,11.439697 65.4573177,11.6847049 C65.4573177,12.8974247 64.4479015,13.3630664 63.7557912,13.3630664 C63.2943843,13.3630664 63.0665204,13.3630664 63.0721992,13.3630664 L63.0721992,16.16113 L65.4573177,16.16113 L65.4573177,24.2856279 Z M140.737621,24.2856279 C140.737621,27.2522496 142.645715,28.6681372 145.337492,28.6681372 C146.393759,28.6681372 147.313733,28.4658675 147.892976,28.1287514 L147.892976,25.060995 C147.415953,25.3981111 146.632271,25.6678039 145.950808,25.6678039 C144.826395,25.6678039 144.144933,25.1284182 144.144933,23.9148002 L144.144933,16.16113 L147.552245,16.16113 L147.552245,13.3630664 L144.144933,13.3630664 L144.144933,9.35138478 L140.737621,9.35138478 L140.737621,11.0538211 C140.737621,11.2294024 140.737621,11.439697 140.737621,11.6847049 C140.737621,12.8974247 139.728205,13.3630664 139.036094,13.3630664 C138.574687,13.3630664 138.346823,13.3630664 138.352502,13.3630664 L138.352502,16.16113 L140.737621,16.16113 L140.737621,24.2856279 Z M85.2112099,23.6788189 L88.3459371,23.6788189 C87.8348403,26.6454406 85.6200874,28.6681372 81.9742634,28.6681372 C77.7491963,28.6681372 74.8189078,25.4992459 74.8189078,20.8807553 C74.8189078,16.3971113 77.7832694,13.0259503 81.9061171,13.0259503 C86.1652573,13.0259503 88.4822296,16.0262835 88.4822296,20.4087928 L88.4822296,21.6224107 L78.1580738,21.6224107 C78.2602931,24.2519163 79.7935836,25.836362 81.9742634,25.836362 C83.6097732,25.836362 84.8364056,25.1284182 85.2112099,23.6788189 Z M81.9401902,15.8577255 C80.0661685,15.8577255 78.6691706,17.0039202 78.2602931,19.1614632 L85.1089905,19.1614632 C85.0749174,17.3410363 84.0186507,15.8577255 81.9401902,15.8577255 Z M100.952992,23.6788189 L104.087719,23.6788189 C103.576622,26.6454406 101.36187,28.6681372 97.7160455,28.6681372 C93.4909785,28.6681372 90.5606901,25.4992459 90.5606901,20.8807553 C90.5606901,16.3971113 93.5250516,13.0259503 97.6478993,13.0259503 C101.907039,13.0259503 104.224012,16.0262835 104.224012,20.4087928 L104.224012,21.6224107 L93.8998558,21.6224107 C94.0020751,24.2519163 95.5353656,25.836362 97.7160455,25.836362 C99.3515552,25.836362 100.578188,25.1284182 100.952992,23.6788189 Z M97.6819724,15.8577255 C95.8079509,15.8577255 94.4109529,17.0039202 94.0020751,19.1614632 L100.850773,19.1614632 C100.816699,17.3410363 99.760433,15.8577255 97.6819724,15.8577255 Z M118.428244,15.0149352 C117.644563,13.8687405 116.145345,13.0259503 114.441689,13.0259503 C112.738033,13.0259503 111.375108,13.6664708 110.659573,14.6103959 L110.659573,13.3630664 L107.25226,13.3630664 L107.25226,28.3310211 L110.659573,28.3310211 L110.659573,18.2849614 C110.966231,16.8016506 112.124717,16.0599951 113.351349,16.0599951 C115.020932,16.0599951 115.838687,17.2736131 115.838687,19.1277516 L115.838687,28.3310211 L119.245999,28.3310211 L119.245999,18.2849614 C119.552657,16.8016506 120.711143,16.0599951 121.937776,16.0599951 C123.607359,16.0599951 124.425114,17.2736131 124.425114,19.1277516 L124.425114,28.3310211 L127.832426,28.3310211 L127.832426,18.5883659 C127.832426,15.1834933 126.02655,13.0259503 122.925896,13.0259503 C120.881509,13.0259503 119.484511,13.8013173 118.428244,15.0149352 Z M135.247589,13.3209268 L131.840277,13.3209268 L131.840277,28.2888816 L135.247589,28.2888816 L135.247589,13.3209268 Z M135.673503,9.10697561 C135.673503,7.93259576 134.677414,7 133.543933,7 C132.410452,7 131.414363,7.93259576 131.414363,9.10697561 C131.414363,10.2813555 132.410452,11.2139512 133.543933,11.2139512 C134.677414,11.2139512 135.673503,10.2813555 135.673503,9.10697561 Z"></path>
                                        <path class="logo__steemit" d="M32.7004951,11.3807248 C31.1310771,9.81140963 29.3043776,8.66313021 27.3619013,7.92312792 C28.4939405,4.59311764 32.5075339,3.38104493 32.5075339,3.38104493 C32.5075339,3.38104493 23.1424826,-1.48000457 12.7997611,0.459311764 C9.35218721,1.00793415 6.0461183,3.12587173 3.62767097,5.92001831 C-1.62087426,11.9803819 -0.926213868,21.1028239 5.18422484,26.3083572 C6.1233028,27.1121528 8.22014805,28.3625014 8.2587403,28.4262947 C6.8822836,31.9221676 2.48276772,32.8790671 2.48276772,32.8790671 C2.48276772,32.8790671 8.29733255,36.5152853 16.10583,37.4594261 C18.1769471,37.7145993 20.3767051,37.7783926 22.6536475,37.5359781 C26.2684544,37.2425289 29.8703972,35.3287299 32.6104465,32.6366526 C38.5407881,26.7931863 38.5922444,17.2752258 32.7004951,11.3807248 Z M30.0247661,30.3145765 C27.8121441,32.4835487 24.5060752,33.861484 21.9589871,34.0528639 C20.1580157,34.2314851 18.2284034,34.2570024 16.3759757,34.0273465 C13.6487905,33.6956214 11.680586,32.9428604 9.75097374,32.2156168 C10.7286439,31.271476 11.7063141,29.9700926 12.1051006,28.8473305 C12.3623823,28.1838802 12.3366541,27.4438779 12.0279162,26.7931863 C9.95679906,22.5317938 10.8572848,17.4283297 14.2662664,14.1110781 C16.73617,11.6996913 20.1322875,10.5641706 23.5798614,10.9852064 C26.1140854,11.2914142 28.416756,12.4014176 30.2177274,14.2003887 C34.5915151,18.5893678 34.4371461,26.014908 30.0247661,30.3145765 Z"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
				-->
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
    <script type="text/javascript" src="{{asset('assets/js/TimeCircles.js')}}"></script>

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

	<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <script src="{{asset('landing/js/popper.min.js')}}"></script>
    <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('landing/js/plugins.js')}}"></script>
    <script src="{{asset('landing/js/particles.js')}}"></script>
    <script src="{{asset('landing/js/custom.js')}}"></script>

    <!-- End Document
================================================== -->
</body>
</html>