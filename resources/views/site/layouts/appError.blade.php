<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="keywords" content="@yield('keyword')">
<meta name="description" content="@yield('description')">
<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
<meta name="google-site-verification" content="LFZ78S5IvrX1soxewYLtjXZXo8gCefgIMMJAtgf4QuM" /> 
<meta name="author" content="Website Devopment">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="robots" content="noindex, nofollow">
<link rel="shortcut icon" href="{{asset('site/img/logos/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('site/img/logos/apple-touch-icon-57x57.JPG')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('site/img/logos/apple-touch-icon-72x72.JPG')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('site/img/logos/apple-touch-icon-114x114.JPG')}}"> 
<link rel="stylesheet" href="{{asset('site/css/plugins.css')}}"> 
<link rel="stylesheet" href="{{asset('site/search/search.css')}}"> 
<link rel="stylesheet" href="{{asset('site/quform/css/base.css')}}"> 
<link href="{{asset('site/css/styles.css')}}" rel="stylesheet">
  
</head>
<body>
 

 
    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
        <header class="header-style2">

            <div class="top-bar bg-primary">
                <div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <div class="top-bar-info">
                                <ul class="ps-0">
                                    <li><i class="ti-mobile"></i>+91-93-183-454-97</li>
                                    <li class="d-none d-sm-inline-block"><i class="ti-email"></i>info@websolutiontechnology.com</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3 d-none d-md-block">
                            <ul class="top-social-icon ps-0">
                                <li><a href="https://www.facebook.com/websolutiondeveloper/" target="_blank"><i class="fab fa-facebook-f" ></i></a></li>
                                <li><a href="https://x.com/websolutiontechnology" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/websolutiontechnology/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/websolutiontechnology/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-default border-bottom border-color-light-white">

                <!-- start top search -->
                <div class="top-search bg-secondary">
                    <div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
                        <form class="search-form" action="" method="GET" accept-charset="utf-8">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                                <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end top search -->

                <div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light p-0">
                                    <div class="navbar-header navbar-header-custom">
                                        <!-- start logo -->
                                        <a href="{{url('/')}}"><img src="{{asset('site/img/logos/webs.png')}}" alt="..." width="150" height="200"></a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler bg-primary"></div>

                                    <!-- start menu area -->
                                    <ul class="navbar-nav ms-auto" id="nav" style="display: none;">
									
										<li>
                                            <a href="{{url('/')}}">Home</a>    
                                        </li>
										<li>
                                            <a href="{{url('about-us')}}">About Us</a>    
                                        </li>
										<li>
                                            <a href="{{url('services')}}">Service</a>
                                            <ul class="row megamenu">
												<?php 	$categoryList = App\Categories::where('status','1')->get();
														if($categoryList){
															foreach($categoryList as $catValue){   ?>
                                                <li class="col-lg-3">
												
												
                                                    <span class="mb-0 mb-lg-2 d-block py-2 p-lg-0 px-4 px-lg-0 text-uppercase sub-title font-weight-700 display-30"><a href="{{url('services/'.$catValue->slug)}}">{{$catValue->name}}</a></span>
                                                    <ul>
													<?php  $serviceList = App\Services::where('status','1')->where('categories_id',$catValue->id)->get();

														if($serviceList){
															foreach($serviceList as $serviceValue){
														?>
                                                        <li><a href="{{url('services/'.$catValue->slug.'/'.$serviceValue->service_slug)}}"><i class="fas fa-sliders-h me-2"></i>{{$serviceValue->name}}</a></li>
                                                        
														<?php  } } ?>
                                                    </ul>
												
													
                                                </li>
                                                
												<?php } } ?>	
                                            </ul>
                                        </li>
										<li>
                                            <a href="{{url('portfolio')}}">Portfolio</a>    
                                        </li>
									 
                                    </ul>
                                    <!-- end menu area -->

                                    <!-- start attribute navigation -->
                                    <div class="attr-nav align-items-xl-center ms-xl-auto main-font">
                                        <ul>
                                            <!--<li class="search"><a href="#!"><i class="fas fa-search"></i></a></li>-->
                                            <li class="d-none d-xl-inline-block"><a href="{{url('contact-us')}}" class="btn-style1 medium"><span>Contact Us</span></a></li>
                                        </ul>
                                    </div>
                                    <!-- end attribute navigation -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    <!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->
		
		
		 @yield('content') 
		 
	<!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->
	
	

     <!-- FOOTER
        ================================================== -->
         </div>

   
   
   
   

    <!-- SCROLL TO TOP
    ================================================== -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

    <!-- all js include start -->

    <!-- jQuery -->
    <script src="{{asset('site/js/jquery.min.js')}}"></script>

    <!-- popper js -->
    <script src="{{asset('site/js/popper.min.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{asset('site/js/bootstrap.min.js')}}"></script>

    <!-- jquery -->
    <script src="{{asset('site/js/core.min.js')}}"></script>

    <!-- Search -->
    <script src="{{asset('site/search/search.js')}}"></script>

    <!-- custom scripts -->
    <script src="{{asset('site/js/main.js')}}"></script>

    <!-- form plugins js -->
    <script src="{{asset('site/quform/js/plugins.js')}}"></script>

    <!-- form scripts js -->
    <script src="{{asset('site/quform/js/scripts.js')}}"></script>

    <!-- all js include end -->

</body>
</html>


		
		