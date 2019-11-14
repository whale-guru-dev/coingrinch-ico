<!DOCTYPE html>
<html>
<head>
    <title>Coin Grinch</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="Coin Grinch is a wonderful, perfect genuine ICO project, everybody can take part in this ICO.">
    <meta name="keywords" content="ICO, successful, reliable, genuine, Coin Grinch, Grinch Token, WRT, Cryptocurrency, ERC20 token, BTC, ETH">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Racing+Sans+One" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/TimeCircles.css')}}" rel="stylesheet">  
    
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}"> 
    <script src="{{asset('customer/vendor/jquery/dist/jquery.min.js')}}"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script type="text/javascript" src="{{asset('assets/js/TimeCircles.js')}}"></script>
    <link rel="stylesheet" href="{{asset('customer/custom/css/progress.css')}}">
    <script>
    $( document ).ready(function() {
        $(".counter-cir").TimeCircles({
            "animation": "smooth",
            "bg_width": 0.5,
            "fg_width": 0.05,
            "direction": "Counter-clockwise",
            "circle_bg_color": "#ffffff",
            "time": {
                "Days": {
                    "text": "Days",
                    "color": "#0ca8db",
                    "show": true
                },
                "Hours": {
                    "text": "Hours",
                    "color": "#0ca8db",
                    "show": true
                },
                "Minutes": {
                    "text": "Minutes",
                    "color": "#0ca8db",
                    "show": true
                },
                "Seconds": {
                    "text": "Seconds",
                    "color": "#0ca8db",
                    "show": true
                }
            }
        });
    });
                 

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>

</head>
<body  data-spy="scroll" data-target=".navbar" data-offset="50">
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
            <div class="object"></div>
        </div>
        <img src="{{asset('assets/images/logo.png')}}" alt="Loading" /> 
    </div>

</div>
<a href="#" class="scrollToTop"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>

<!-- header -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <a id="logo" class="navbar-brand" href="#" data-aos="fade-right">Coin Grinch</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" data-aos="fade-left">
                <ul class="navbar-nav ml-auto mr-4">
                    <li class="nav-item active">
                        <a class="nav-link" href="#banner-hook">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-hook">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team-hook">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#roadmap-hook">Roadmap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">White Paper</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq-hook">FAQ</a>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <a class="btn btn-primary my-2 my-sm-0" href="{{route('login')}}">Log in</a>
                    <a class="btn btn-primary my-2 my-sm-0" href="{{route('register')}}">Sign up</a>
                </div>
            </div>
        </nav>
<!-- header -->
<div class="hooks" id="banner-hook"></div>
<!-- banner -->
<section id="banner">
    <div class="container">
       <div class="row">
           <div class="col-lg-8">
        <div class="jumbotron text-center" data-aos="fade-up">
           
           
            <h1>TRADE AND SHOP SECURELY</h1>
            <p class="lead">TRevolutionizing Auction And Freelance Hiring With <br>A Crypto Exchange Powered By
                Blockchain</p>
           
            <div class="ico-count">
                
            <h4>Pre ICO start in</h4>
            
            
                        <div class="count-area">
    
        <div class="counter-cir" data-timer="96000"></div>
            
                        </div>
            

            <div class="rates">
                <div class="row">
                    <div class="col-lg">
                        <img src="{{asset('assets/images/btc.png')}}" alt="" width="30"> 1 BTC = $ <span id="btc"></span>
                    </div>
                    <div class="col-lg">
                        <img src="{{asset('assets/images/eth.png')}}" alt="" width="30"> 1 ETH = $ <span id="eth"></span>
                    </div>
                    <div class="col-lg">
                        <img src="{{asset('assets/images/bidium.png')}}" alt="" width="30"> 1 GRT = $ 0.25
                    </div>
                </div>
            </div>
            <p class="lead">
                <a class="btn btn-lg token-a" href="{{route('register')}}" role="button">BUY TOKENS</a>
                <a class="btn btn-lg paper-a" href="#" role="button">WHITE PAPER</a>
            </p>
            </div>
        </div>
               
           </div>
           <div class="col-lg-4">
               <div class="right-side-img">
                   <img src="{{asset('assets/images/banner-coin.png')}}" alt="token">
               </div>
           </div>
       </div>
    </div>
</section>
<!-- banner -->
<div class="hooks" id="about-hook"></div>
<!-- about us -->
<section id="about" class="text-center">
    <div class="container-fluid" data-aos="fade-left">
        <h2 class="mb-3">What is Coin Grinch?</h2>
        <div class="row">
            <div class="col-lg-6 text-center">

               <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/g6iDZspbRMg"></iframe>
</div>
              <!--  <iframe width="425" height="263" title="video" src="https://www.youtube.com/embed/g6iDZspbRMg"
                        allowfullscreen class="border"></iframe> -->


            </div>
            <div class="col-lg-6 text-left">
                <p>Coin Grinch platform is a unique and all-encompassing decentralized financial hub that is designed to
                    make
                    cryptocurrency trading as easy as eating a pie. It is a one-of-its-kind solution that aims to
                    revolutionize
                    crypto investment as well as bring sanity to the cryptocurrency exchange industry. We are a
                    dedicated
                    two-way exchange platform where crypto enthusiasts and investors can exchange their cryptocurrency
                    to other
                    cryptocurrencies or to fiat and grow their portfolio via reduced remittance cost compared to other
                    exchanges.</p>
                <p>We also offer an E-trade hub where peer-to-peer trading of goods and services can be carried out. For
                    this,
                    we leverage on transparency, a core value of blockchain technology and the technological convenience
                    of
                    Ethereum smart contract to create a cryptocurrency backed ecommerce solution where goods and
                    services can be
                    bought so that income can be increased for sellers and buyers to enjoy very low transaction fee.</p>
                <p>At GRT, we understand that responsiveness and simplicity are the highest form of sophistication
                    and we
                    provide our platform users with just that. We are highly dedicated to your satisfaction and our goal
                    is to
                    provide you a seamless exchange and e-trade experience</p>
            </div>
        </div>
         
        </div>
    </section>
        
    <div class="token-area">
        <div class="container-fluid">
            
        <!--    token-->
                
        <div class="row">
            <div class="col-lg-4 text-left  what-right" data-aos="flip-left">
            <div class="text-center">
               <img src="{{asset('assets/images/token-a.png')}}" alt="token">
                <h2 class="title text-white mb-2">TOKEN DETAILS</h2>
                <h4 class="text-white sub-title"> Easily distinguishable and understood, highly secure with maximum
                    benefits to the token holders!!</h4>
            </div>
            </div>
            <div class="col-lg-4 text-left" data-aos="flip-left">
                <div class="table-responsive">
                    <table class="table text-white" role="presentation">

                        <tbody>
                        <tr>

                            <td>Token Name :</td>
                            <td>Coin Grinch</td>

                        </tr>
                        <tr>


                            <td>Ticker :</td>
                            <td>GRT</td>
                        </tr>
                        <tr>

                            <td>Total Supply :</td>
                            <td>2,00,000,000 GRT</td>
                        </tr>

                        <tr>

                            <td>Pre-ICO Start Date :</td>
                            <td>26th March 12pm IST</td>
                        </tr>
                        <tr>

                            <td>Pre-ICO End Date :</td>
                            <td>10th April 12PM IST</td>
                        </tr>
                        <tr>

                            <td>Token Price (Pre-ICO) :</td>
                            <td>0.25 USD</td>
                        </tr>

                        <tr>
                            <td>Pre-ICO Hardcap :</td>
                            <td>1 Million USD</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4 text-left" data-aos="flip-left">
                <div class="table-responsive">
                    <table class="table text-white" role="presentation">

                        <tbody>


                        <tr>

                            <td>ICO Start Date :</td>
                            <td>26th April 12pm IST</td>
                        </tr>

                        <tr>

                            <td>ICO End Date :</td>
                            <td>17th May 12pm IST</td>
                        </tr>

                        <tr>

                            <td>Token Price (Crowdsale) :</td>
                            <td>0.25 USD</td>
                        </tr>

                        <tr>

                            <td>Currencies Accepted :</td>
                            <td>BTC and ETH</td>
                        </tr>

                        <tr>

                            <td>Minimum Purchase Limit :</td>
                            <td>50 USD</td>
                        </tr>

                        <tr>

                            <td>Maximum Purchase Limit :</td>
                            <td>10000 USD</td>
                        </tr>

                        <tr>
                            <td>ICO Hardcap :</td>
                            <td>10 Million USD</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
        <!--    /token-->


<!-- about us -->


<!-- token-area -->
 <!-- <div class="bg-animation-sec">
<div class="inner-sec">
   <div class="video-area">
       
                    <video id="bg" poster="img/poster.jpg')}}" autoplay="true" muted="true" loop="true">
                    <source src="{{asset('assets/images/drops.MP4')}}" type="video/mp4"/>
       </video>
   </div>
   
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
               <div class="inner-box">
                    <div class="token-img">
                        <img src="{{asset('assets/images/token.png')}}" alt="token">
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis necessitatibus iure temporibus culpa porro laboriosam.
                    </p>
               </div>
            </div>
        </div>
    </div>
</div>
</div> --->
<!-- token-area end -->


<!--articles-->
<section id="articles">
    <div class="container pr-0 pl-0 reading-area" data-aos="fade-left">
       
<div  class=" reading-box">
        <div class="row no-gutters" data-aos="flip-left">
            <div class="col-md-6 content-box text-center">
                <img src="{{asset('assets/images/article.png')}}" class="crypto-to-crypto" alt="">
            </div>
            <div class="col-md-6 content-box crypto-exchange p-4">
                <h3 class="">Crypto-to-Crypto Exchange </h3>
                <p>This unit will handle trading purely in Binocoin, Bitcoin, and other credible altcoins. it is
                    fashioned to enable sport trading, margin trading, future trading and anonymous instant coin
                    exchange with great speed, flexibility and security.

                    <br>Binocoin exchange will support trading pairs in the following major coins.</p>

            </div>
        </div>
        </div>

    </div>
    <div class="container pr-0 pl-0 reading-area" data-aos="fade-left">
       

<div  class=" reading-box">

        <div class="row no-gutters " data-aos="flip-right">
            <div class="col-md-6 content-box crypto-fiat p-4">
                <h3 class="">CRYPTO-FIAT EXCHANGE </h3>
                <p>This is the second phase of our platform that enables a peer to peer and instant exchange of coins to
                    fiat (paper money). This is purposefully integrated to reduce transaction cost for our clients who
                    might want to exchange coins for cash. All these can be done on the site without hassle.
                </p>

            </div>
            <div class="col-md-6 content-box text-center">
                <img src="{{asset('assets/images/money.png')}}" class="crypto-to-crypto" alt="">
            </div>
        </div>
        </div>
    </div>
</section>
<!--/articles-->
<!--why coin origin-->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h2>Why Coin Grinch</h2>


                    <h4 class="mb-3">Discover the Coin Grinch Difference!</h4>
                </div>
            </div>
        </div>
        <div class="row service-wrapper">
            <div class="col-lg-4 col-md-6 reveal-0" data-aos="flip-left">
                <div class="text-center service-block">
                    <img src="{{asset('assets/images/fast.png')}}" alt="">
                    <h3>Decentralization</h3>
                    <h6>BIDIUM is proposed as a completely decentralized exchange by utilizing already existing
                        blockchain application. Decentralization allows the use of network on peer-to-peer basis. <br>Each
                        individual user of Auction and Freelance platform will have their own copy of data.</h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 reveal-0" data-aos="flip-left">
                <div class="text-center service-block">
                    <img src="{{asset('assets/images/down.png')}}" alt="">
                    <h3>Functionality</h3>
                    <h6>Transactions will be done by the customer at their preferred time in the marketplace;
                        Cryptocurrency can also be sold to our community market makers for cash. <br> The BIDIUM token
                        can be transferred to two other parties as payment for goods and services after bids for</h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 reveal-0" data-aos="flip-left">
                <div class="text-center service-block">
                    <img src="{{asset('assets/images/private.png')}}" alt="">
                    <h3>Cost Effectiveness</h3>
                    <h6>As compared to other payment services that require large procedures &amp; huge transaction fee,
                        the BIDIUM token is cost effective and minimizes time. <br> You will only be charged little or
                        no amount thereby making you deploy a payment service of your own</h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 reveal-0" data-aos="flip-left">
                <div class="text-center service-block">
                    <img src="{{asset('assets/images/secure.png')}}" alt="">
                    <h3>Immediatate Payment</h3>
                    <h6>It enables the transfer of money with the aid of smart contracts that are regulated. There are
                        certain procedures that will aid you to keep the address of the receiver in mind. <br>This makes
                        the transfer of money a seamless exercise. </h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 reveal-0" data-aos="flip-left">
                <div class="text-center service-block">
                    <img src="{{asset('assets/images/reliable.png')}}" alt="">
                    <h3>Peer to Peer Payment</h3>
                    <h6>BIDIUM uses integrated mobile wallet which is basically for the receiving and sending of
                        payments. <br> This shows that you will be able to transfer funds for payment of goods and
                        services in the bid marketplace in a secured and improved manner without requiring any document
                        or possessing a bank account</h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 reveal-0" data-aos="flip-left">
                <div class="text-center service-block">
                    <img src="{{asset('assets/images/simple.png')}}" alt="">
                    <h3>Secure Wallet</h3>
                    <h6>BIDIUM uses integrated mobile wallet which is basically for the receiving and sending of
                        payments. This shows that you will be able to transfer funds for payment of goods and services
                        in the bid marketplace in a secured and improved manner without requiring any document or
                        possessing a bank account</h6>
                </div>
            </div>

        </div>
    </div>
</section>
<!--/why coin origin-->

<div class="hooks" id="articles-hook"></div>


<div class="hooks" id="team-hook"></div>
<!-- team -->
<!-- <section id="team" class="text-center">
    <div class="container" data-aos="fade-up">
        <h2 class="mb-5 mb-3">OUR TEAM</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4" data-aos="flip-left">
                <div class="member">
                    <img src="{{asset('assets/images/member-1.jpg')}}" style="width:100%" alt="">
                    <div class="p-3">
                        <h6 class="mb-1">Shawshank Redemption</h6>
                        <small class="mb-1 d-block">Head Of Marketing</small>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur necessitatibus ullam,
                            culpa odio.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="flip-left">
                <div class="member">
                    <img src="{{asset('assets/images/member-2.jpg')}}" style="width:100%" alt="">
                    <div class="p-3">
                        <h6 class="mb-1">Luis Anthon</h6>
                        <small class="mb-1 d-block">Finance Advisor</small>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur necessitatibus ullam,
                            culpa odio.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="flip-left">
                <div class="member">
                    <img src="{{asset('assets/images/member-3.jpg')}}" style="width:100%" alt="">
                    <div class="p-3">
                        <h6 class="mb-1">Jonathon Andrew</h6>
                        <small class="mb-1 d-block">Head Of Management</small>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur necessitatibus ullam,
                            culpa odio.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="flip-left">
                <div class="member">
                    <img src="{{asset('assets/images/member-4.jpg')}}" style="width:100%" alt="">
                    <div class="p-3">
                        <h6 class="mb-1">Michael Jonson</h6>
                        <small class="mb-1 d-block">Head Of Marketing</small>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur necessitatibus ullam,
                            culpa odio.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="flip-left">
                <div class="member">
                    <img src="{{asset('assets/images/member-5.jpg')}}" style="width:100%" alt="">
                    <div class="p-3">
                        <h6 class="mb-1">Andrew Danny</h6>
                        <small class="mb-1 d-block">Awesome Developer</small>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur necessitatibus ullam,
                            culpa odio.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="flip-left">
                <div class="member">
                    <img src="{{asset('assets/images/member-6.jpg')}}" style="width:100%" alt="">
                    <div class="p-3">
                        <h6 class="mb-1">Chikini Kurri</h6>
                        <small class="mb-1 d-block">Head Of Management</small>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur necessitatibus ullam,
                            culpa odio.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- team -->
<div class="bg-group">
    <!--token distribution-->
    <div id="tokenDistribution">
        <div class="container" data-aos="fade-up">
            <h2 class="mb-3"> TOKEN DISTRIBUTION</h2>
            <div class="col-sm-6 m-auto" data-aos="flip-left">
                <canvas id="myChart"></canvas>
                <script>
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            datasets: [{
                                data: [
                                    80, 5, 2, 3, 10
                                ],
                                backgroundColor: [
                                    '#6495ed',
                                    '#6b8e23',
                                    '#ffa500',
                                    '#ff6347',
                                    '#ed143d'
                                ],
                                label: 'Dataset 1'
                            }],
                            labels: [
                                'Crowdsale 80%',
                                'Bounty 5%',
                                'Advisor 2% ',
                                'Founder (Locked for 1 year) 3% ',
                                'Reserve (Every year 2% will dilute) 10% '
                            ]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: ''
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        }
                    });

                </script>
            </div>
        </div>
    </div>
    <!--/token distribution-->
    <div class="hooks" id="roadmap-hook"></div>
    <!--Road Map-->
    <section id="roadmap">
        <h2 class="text-center mb-3" data-aos="fade-up">ROAD MAP</h2>

        <div class="container">

            <section id="timeline">


                <div class="main-timeline">
                    <div class="timeline" data-aos="fade-left">
                        <div class="timeline-icon"><span class="year">01</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q4 2017, November</h3>
                            <p class="description">

                                Research on Market Opportunities – Global Analysis
                            </p>
                        </div>
                    </div>
                    <div class="timeline" data-aos="fade-right">
                        <div class="timeline-icon"><span class="year">02</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q4 2017, December</h3>
                            <p class="description">

                                Initial Research Completed and Concept Finalized
                            </p>
                        </div>
                    </div>
                    <div class="timeline" data-aos="fade-left">
                        <div class="timeline-icon"><span class="year">03</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q1 2018, January</h3>
                            <p class="description">

                                Designing of User Interface for ‘Bidding Marketplace’ and ‘Freelance’ platform
                            </p>
                        </div>
                    </div>
                    <div class="timeline" data-aos="fade-right">
                        <div class="timeline-icon"><span class="year">04</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q1 2018, March</h3>
                            <p class="description">

                                Whitepaper Public Announcement and Pre-sale Kick off
                            </p>
                        </div>
                    </div>
                    <div class="timeline" data-aos="fade-left">
                        <div class="timeline-icon"><span class="year">05</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q2 2018, April</h3>
                            <p class="description">

                                Bidium to conduct ICO Sale
                                <br>
                                &nbsp;
                            </p>
                        </div>
                    </div>
                    <div class="timeline" data-aos="fade-right">
                        <div class="timeline-icon"><span class="year">06</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q2 2018, June</h3>
                            <p class="description">

                                Launching of Exchange &amp; Begin listing BIDM on Major exchanges
                            </p>
                        </div>
                    </div>
                    <div class="timeline" data-aos="fade-left">
                        <div class="timeline-icon"><span class="year">07</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q3 2018, July</h3>
                            <p class="description">

                                Exchange App Launching <br> &nbsp;
                            </p>
                        </div>
                    </div>
                    <div class="timeline" data-aos="fade-right">
                        <div class="timeline-icon"><span class="year">08</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q3 2018, July</h3>
                            <p class="description">

                                Preparation for Launch – Marketing Campaigns
                            </p>
                        </div>
                    </div>
                    <div class="timeline" data-aos="fade-right">
                        <div class="timeline-icon"><span class="year">12</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q4 2018, November</h3>
                            <p class="description">

                                E-Bid Marketplace Launch
                                <br> &nbsp;
                            </p>
                        </div>
                    </div>
                    <div class="timeline" data-aos="fade-left">
                        <div class="timeline-icon"><span class="year">13</span></div>
                        <div class="timeline-content">
                            <h3 class="title">Q4 2018, December</h3>
                            <p class="description">


                                E-Bid Market App Launch
                                <br> &nbsp;
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </section>
</div>
<!--/Road Map-->
<div class="hooks" id="faq-hook"></div>
<div id="faq">
    <div class="container" data-aos="fade-up">
        <h2>FAQ</h2>
        <div class="card" data-aos="fade-right">
            <div class="card-header" id="heading-example">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-example" aria-expanded="true"
                       aria-controls="collapse-example">
                        <i class="fa fa-chevron-down pull-right"></i>
                        What is crypto currency?
                    </a>
                </h5>
            </div>
            <div id="collapse-example" class="collapse " aria-labelledby="heading-example">
                <div class="card-block">
                    <p> A crypto currency is a decentralized digital assets design to work as a medium of exchange that
                        use encryption to secure its transaction, to control the creation of additional unit and to
                        verify the transfer of assets. Bitcoin which was created in 2009 was the first decentralized
                        crypto currency.</p>
                </div>
            </div>
        </div>
        <div class="card" data-aos="fade-left">
            <div class="card-header" id="heading-example2">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-example2" aria-expanded="false"
                       aria-controls="collapse-example2">
                        <i class="fa fa-chevron-down pull-right"></i>
                        What is Bitcoin?
                    </a>
                </h5>
            </div>
            <div id="collapse-example2" class="collapse" aria-labelledby="heading-example2">
                <div class="card-block">
                    <p>Coin Grinch is a decentralized digital currency in which encryption is used to regulate, generate
                        and confirm unit of transfer of funds.</p>
                </div>
            </div>
        </div>
        <div class="card" data-aos="fade-right">
            <div class="card-header" id="heading-example3">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-example3" aria-expanded="false"
                       aria-controls="collapse-example3">
                        <i class="fa fa-chevron-down pull-right"></i>
                        What is Coin Grinch?
                    </a>
                </h5>
            </div>
            <div id="collapse-example3" class="collapse " aria-labelledby="heading-example3">
                <div class="card-block">
                    <p>Coin Grinch is a new decentralized digital crypto currency created by ERC20 smart contract to be
                        used as the official coin of the Coin exchange for reduction of transaction fees, purchase of
                        gift cards, trading, medium of exchange on our e-trade hub and other e-commerce store. The total
                        number of Coin coin created is 100 million.</p>
                </div>
            </div>
        </div>
        <div class="card" data-aos="fade-right">
            <div class="card-header" id="heading-example4">
                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-example4" aria-expanded="false"
                       aria-controls="collapse-example4">
                        <i class="fa fa-chevron-down pull-right"></i>
                        How can I register?
                    </a>
                </h5>
            </div>
            <div id="collapse-example4" class="collapse " aria-labelledby="heading-example4">
                <div class="card-block">
                    <p style="display: block;">
                        To make an account, click on ”Sign Up” at the top-right of the website &amp; fill the
                        registration form.</p>

                    <p>You will get the activation link in your e-mail inbox which you have to click on.</p>
                    <p> Once you done activation process than after you can Login .
                    </p>
                </div>
            </div>
        </div>
        <div class="card" data-aos="fade-right">
            <div class="card-header" id="heading-example5">

                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-example5" aria-expanded="false"
                       aria-controls="collapse-example5">
                        <i class="fa fa-chevron-down pull-right"></i>
                        How can I buy?
                    </a>
                </h5>
            </div>
            <div id="collapse-example5" class="collapse " aria-labelledby="heading-example5">
                <div class="card-block">
                    <p> In order to buy BINO , you need to add USD into your BINO wallet.</p>

                    <p>1. Click on the ‘Wallet‘ after you log into your Bino ‘Account‘.</p>
                    <p>2. Click on 'Deposit' & Add Deposit amount (Usd Amount) and than click Generate BTC or ETH
                        Address.</p>
                    <p>3. Now you deposit from this address BTC or ETH amount.</p>
                    <p>4. Once deposit are confirmed than you can buy Bino Token.</p>
                    <p>5. Sidebar menu click ICO -> select Buy Bino Token.</p>
                    <p>6. Now you can buy token using your BTC or ETH balance.</p>

                </div>
            </div>
        </div>
        <div class="card" data-aos="fade-right">
            <div class="card-header" id="heading-example6">

                <h5 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-example6" aria-expanded="false"
                       aria-controls="collapse-example6">
                        <i class="fa fa-chevron-down pull-right"></i>
                        Which wallet support binocoin?
                    </a>
                </h5>
            </div>
            <div id="collapse-example6" class="collapse " aria-labelledby="heading-example6">
                <div class="card-block">
                    <p> ⚫ BTC </p>
                    <p>⚫ ETH</p>

                </div>
            </div>
        </div>
    </div>

</div>

<!--footer-->
<footer>
    <div class="container text-center" data-aos="fade-down">
        <h2>Contact Us On Social Media</h2>
        <div class="box-c">
        <div class="row social m-auto">
            <div class="col"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
            <div class="col"><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></div>
            <div class="col"><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></div>
            <div class="col"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></div>
        </div>
        <p>Contact us : <a href="#">support@coingrinch.com</a></p>
        </div>
        <p>Copyright © 2018. All rights reserved.</p>
    </div>
</footer>
<!--footer-->

<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<script>
    AOS.init({
        easing: 'ease-in-out-sine'
    });


    jQuery(window).load(function () {
        $("#loading").hide();
    });

    setInterval(function () {
        $.getJSON('https://api.coinbase.com/v2/prices/BTC-USD/spot', function(data) {
            document.getElementById('btc').innerHTML = data['data']['amount'];

        });
        $.getJSON('https://api.coinbase.com/v2/prices/ETH-USD/spot', function(data) {
            document.getElementById('eth').innerHTML = data['data']['amount'];

        });
    }, 10000);
</script>
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5acdd41d4b401e45400e87ab/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
</body>
</html>
                            