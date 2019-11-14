<!DOCTYPE html>
<html>
    <head>
        <title>{{ config('app.name', 'Grinch') }}</title>
        <!-- start: META -->
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="Grinch Project" name="description" />
        <meta content="Jin Ji" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- start: GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <!-- end: GOOGLE FONTS -->
        <link rel="stylesheet" href="{{asset('customer/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('customer/vendor/font-awesome/css/font-awesome.min.css')}}">
        
        <!-- Related css to this page -->   
        

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
        <style type="text/css">
        	.error-title {
			    color: #0685e2;
			    font-size: 220px;
			    line-height: 1;
			    margin-bottom: 20px;
			    font-weight: 900;
			    text-stroke: 1px transparent;
			    display: block;
			    text-shadow: #c6c6c6 1px 1px, #c8c8c8 2px 2px, #cacaca 3px 3px, #cccccc 4px 4px, #cecece 5px 5px, #d0d0d0 6px 6px, #d1d1d1 7px 7px, lightgrey 8px 8px, #d5d5d5 9px 9px, #d7d7d7 10px 10px, #d9d9d9 11px 11px, #dbdbdb 12px 12px, gainsboro 13px 13px, #dedede 14px 14px, #e0e0e0 15px 15px, #e2e2e2 16px 16px, #e4e4e4 17px 17px, #e6e6e6 18px 18px, #e8e8e8 19px 19px;
			    height: 100%;
			    width: 100%;
			    text-align: center;
			}
			#container{
				margin-top: 10%;
			}
        </style>
    </head>

    <body id="mainbody">
        <div id="container" class="container-fluid text-center skin-3">            
            
            <!-- main content  -->
            <div id="main" class="main">
                <div class="row">
                    <div id="content">
						<!-- if you want active dragable panel, you should add #sortable-panel. handler drag-drop configured on .panel -->
						 <div class="col-md-12 text-center">
                            <h1 class="error-title">Unkown Error</h1>                            
                            <h3 class="bold">Oops, Unkown Error!</h3>

                            <div class="row">
                                <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                                    <form action="#" class="main-search" >                                    
                                        <p class="bold">
                                        	The server encountered something unexpected that didn't allow it to complete the request. We apologize.You can go back to main page
                                        </p>
                                        <br>
                                        <div class="well">
                                            <h5 class="bold">Try one of the following:</h5>
                                            <ul class="list-unstyled margin-left-15" >                                                
                                                <li>
                                                    <i class="bold fa fa-hand-o-right"></i>
                                                    Read the faq
                                                </li>
                                                <li>
                                                    <i class="bold fa fa-hand-o-right"></i>
                                                    Give us more info on how this specific error occurred!
                                                </li>
                                            </ul>
                                        </div>
                                        
                                                                                   
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="javascript:history.back()" class="btn btn-default btn-block">
                                                    <i class=" fa fa-arrow-left"></i>
                                                    Go Back
                                                </a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-primary btn-block">
                                                    <i class=" fa fa-tachometer"></i>
                                                    Dashboard
                                                </a>
                                            </div>

                                        </div>
                                    
                                    </form>
                                </div>
                            </div>
                        </div>
					</div><!-- end #content -->
                </div><!-- end .row -->
            </div>
            <!-- ./end #main  -->
            
                 
        </div>
        <!-- end #container -->         

        <!-- General JS script library-->
        <script src="{{asset('customer/vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('customer/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>                                                                    


    </body>
</html>