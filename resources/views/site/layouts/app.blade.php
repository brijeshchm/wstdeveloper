<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>@yield('title')</title>
<meta name="keywords" content="@yield('keywords')">
<meta name="description" content="@yield('description')">
<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
<meta name="google-site-verification" content="LFZ78S5IvrX1soxewYLtjXZXo8gCefgIMMJAtgf4QuM" /> 
<meta name="author" content="Web Solution Technology">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="index, follow">
@if (request()->is('/'))
<link rel="canonical" href="https://www.websolutiontechnology.com/" />
@else
<link rel="canonical" href="{{ url()->current() }}" />
@endif
<link rel="shortcut icon" href="{{asset('site/img/logos/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('site/img/logos/webs.png')}}">
<meta property="og:title" content="@yield('title', 'Web Solution technology')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="website" />
<meta property="og:image" content="@yield('og_image', asset('site/img/logos/webs.png'))" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:description" content="@yield('description')" />
<meta name="twitter:image" content="@yield('og_image', asset('site/img/logos/webs.png'))" />
<meta name="geo.region" content="@yield('geo_region', 'IN')" />
<meta name="geo.placename" content="@yield('geo_city', 'India')" />
<meta name="geo.position" content="@yield('geo_position', '')" />

<link rel="stylesheet" href="{{asset('site/css/plugins.css')}}"> 
<link rel="stylesheet" href="{{asset('site/search/search.css')}}"> 
<link rel="stylesheet" href="{{asset('site/quform/css/base.css')}}"> 
<link href="{{asset('site/css/styles.css')}}" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142182046-1"></script><script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142182046-1');
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7HLPRGBW58"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7HLPRGBW58');
</script>


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WTQV4TPQ');</script>

@php
   
    $schemas = [];

  
    $schemas[] = [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => 'Web Solution Technology',
        'url'      => url('/'),
        'logo'     => asset('site/img/logos/webs.png'),
        'sameAs'   => [
            'https://www.facebook.com/websolutiondeveloper',
            'https://x.com/websolutiontechnology',
            'https://www.linkedin.com/company/web-solution-technology-developer/',
            'https://www.instagram.com/websolutiontechnology19/',
            
        ],
    ];
    
    
    @endphp
    
    
@if(!empty($schemas))
<script type="application/ld+json">
{!! json_encode(
    count($schemas) === 1 ? $schemas[0] : $schemas,
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
) !!}
</script>
@endif
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTQV4TPQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

 
 
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
                                            <a href="{{route('home')}}">Home</a>    
                                        </li>
										<li>
                                            <a href="{{route('about-us')}}">About Us</a>    
                                        </li>
										<li>
                                            <a href="{{route('services.list')}}">Service</a>
                                            <ul class="row megamenu">
												<?php 	$categoryList = App\Categories::where('status','1')->get();
														if($categoryList){
															foreach($categoryList as $catValue){   ?>
                                                <li class="col-lg-3">
												
												
                                                    <span class="mb-0 mb-lg-2 d-block py-2 p-lg-0 px-4 px-lg-0 text-uppercase sub-title font-weight-700 display-30"><a href="{{ route('service.details', ['slug' => $catValue->slug]) }}">{{$catValue->name}}</a></span>
                                                    <ul>
													<?php  $serviceList = App\Services::where('status','1')->where('categories_id',$catValue->id)->get();

														if($serviceList){
															foreach($serviceList as $serviceValue){
														?>
                                                        <li><a href="{{ route('child.details', ['slug' => $catValue->slug, 'mslug' => $serviceValue->service_slug]) }}"><i class="fas fa-sliders-h me-2"></i>{{$serviceValue->name}}</a></li>
                                                        
														<?php  } } ?>
                                                    </ul>
												
													
                                                </li>
                                                
												<?php } } ?>	
                                            </ul>
                                        </li>
										<li>
                                            <a href="{{route('portfolio')}}">Portfolio</a>    
                                        </li>
									 
                                    </ul>
                                    <!-- end menu area -->

                                    <!-- start attribute navigation -->
                                    <div class="attr-nav align-items-xl-center ms-xl-auto main-font">
                                        <ul>
                                         
                                            <li class="d-none d-xl-inline-block"><a href="{{route('contact-us')}}" class="btn-style1 medium"><span>Contact Us</span></a></li>
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
        <footer class="position-relative pt-0">
            <div class="bg-primary py-1-9 mb-6 mb-xxl-10">
                <div class="container">
                    <div class="row mt-n1-9 align-items-center">
                        <div class="col-md-6 col-lg-4 mt-1-9 wow fadeIn" data-wow-delay="200ms">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{asset('site/img/icons/07.png')}}" alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-0 text-white">Contact Us</p>
                                    <h3 class="mb-0 h5 text-white">(+91)93183 45497</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-1-9 text-start text-lg-center wow fadeIn" data-wow-delay="400ms">
                            <div class="footer-logo">
                                <a href="{{route('home')}}"><img src="{{asset('site/img/logos/webs.png')}}" alt="..." width="100" height="150"></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mt-1-9 wow fadeIn" data-wow-delay="600ms">
                            <div class="d-flex align-items-center text-lg-end">
                                <div class="flex-grow-1 ms-3 ms-lg-0 me-lg-3 order-2 order-lg-1">
                                    <p class="mb-0 text-white">Mail Us</p>
                                    <h3 class="mb-0 h5 text-white">info@websolutiontechnology.com</h3>
                                </div>
                                <div class="flex-shrink-0 order-1 order-lg-2">
                                    <img src="{{asset('site/img/icons/08.png')}}" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-n5 pb-6 pb-xxl-10">
                    <div class="col-md-6 col-lg-5 mt-5 wow fadeIn" data-wow-delay="200ms">
                        <h3 class="text-white h5 mb-1-9">About Company</h3>
                        <h4 class="text-white mb-1-9 fw-light w-75 display-27 lh-base opacity8">We have 12+ years experience. Helping you overcome technology challenges.</h4>
                         <ul class="social-icon-style1">
                            <li>
                                <a href="https://www.facebook.com/websolutiondeveloper/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="https://x.com/websolutiontechnology" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/websolutiontechnology/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#!"><i class="fab fa-youtube" target="_blank"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/websolutiontechnology/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3 mt-5 wow fadeIn" data-wow-delay="400ms">
                        <div class="ps-0">
                            <h3 class="text-white h5 mb-1-9">Contacts</h3>
                            <ul class="footer-link mb-0 list-unstyled">
                                <!--<li class="text-white mb-3">
                                    <strong>Adress:</strong> <span class="opacity8">Noida .</span>
                                </li>-->
                                <li class="text-white mb-3">
                                    <strong>Email:</strong> <span class="opacity8">info@websolutiontechnology.com</span>
                                </li>
                                <li class="text-white">
                                    <strong>Phone:</strong> <span class="opacity8">(+91)93183 45497</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mt-5 offset-lg-1 wow fadeIn" data-wow-delay="600ms">
                        <div class="ps-xl-4">
                              
                                <div class="quform-elements">
                                    <div class="row">

                                      <ul class="list-unstyled mb-0 footer-link-list">

    <li class="mb-2">
        <a href="{{ route('about-us') }}" class="footer-link">About Us</a>
    </li>

    <li class="mb-2">
        <a href="{{ route('contact-us') }}" class="footer-link">Contact Us</a>
    </li>

    <li class="mb-2">
        <a href="{{ route('careers') }}" class="footer-link">Careers</a>
    </li>

    <li class="mb-2">
        <a href="{{ route('blog.list') }}" class="footer-link">Blog</a>
    </li>

    <li class="mb-2">
        <a href="{{ route('privacy.policy') }}" class="footer-link">Privacy Policy</a>
    </li>

    <li class="mb-2">
        <a href="{{ route('terms.conditions') }}" class="footer-link">Terms of Service</a>
    </li>

    <li class="mb-2">
        <a href="{{ route('copyright.policy') }}" class="footer-link">Copyright Policy</a>
    </li>

    <li class="mb-2">
        <a href="{{ route('refund.policy') }}" class="footer-link">Refund Policy</a>
    </li>

</ul>
                                    </div>

                                </div>

                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4 border-top border-color-light-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 text-center wow fadeIn" data-wow-delay="100ms">
                            <p class="d-inline-block text-white mb-0"> &copy; 2019 to <span class="current-year"></span><a href="#!" class="text-primary text-white-hover"> Web Solution Technology IT Company. All Rights Reserved.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

   <style>
    .footer-link {
    color: #fff;       /* text-gray-500 equivalent */
    font-size: 0.875rem;  /* text-sm */
    text-decoration: none;
    transition: color 0.15s ease-in-out;
}
.footer-link:hover {
    color: var(--primary, #7c3aed); /* swap in your actual primary color/variable */
    text-decoration: none;
}
   </style>
   
   
   

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


		
		