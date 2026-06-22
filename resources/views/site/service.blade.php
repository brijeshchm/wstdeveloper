@extends('site.layouts.app')
@section('title')
Professional IT Services & Business Solutions | Web Development, Software & Digital Marketing @endsection 
@section('keyword')
IT Services, Business Solutions, Web Development Services, Software Development, Website Design, Web Application Development, Digital Marketing Services, SEO Services, Mobile App Development, Ecommerce Development, Content Writing Services, Graphic Design Services, IT Consulting, Technology Solutions, Online Business Growth @endsection
@section('description')
Explore professional IT services and business solutions including website development, software development, web applications, digital marketing, SEO, content writing, ecommerce solutions, and technology consulting. We deliver innovative, scalable, and result-driven solutions to help businesses grow and succeed online. @endsection
@section('content')
<section class="page-title-section bg-img cover-background mx-lg-1-6 mx-xl-2-5 mx-xxl-2-9 left-overlay-dark" data-overlay-dark="8" data-background="{{asset('site/img/banner/page-title.jpg')}}">
            <div class="container">
                <div class="row">
					 
                    <div class="col-md-12">
					
                        <div class="position-relative">
                            <h1> Service</h1>
                        </div>
					
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('services')}}"> Serivce</a></li>
                        </ul>
                    </div>
 
                </div>
            </div>
            <div class="line-animated">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </section>

 
        <section>
            <div class="container">
                <div class="section-title mb-1-9 mb-md-6 text-center wow fadeInUp" data-wow-delay="200ms">
					
                    <span class="sm-title">Sevice</span>
					
                    <h2 class="mb-0 h1">We Provide The Best Services</h2>
                </div>
                <div class="row mt-n2-9">
			
				
				<?php
				if($categories){ 
					foreach($categories as $category){				 
						
				?>	
                    <div class="col-md-6 col-xl-4 mt-2-9 wow fadeInUp" data-wow-delay="200ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
									<?php if(!empty($category->image)){
									$vicons= unserialize($category->image);   
									?>
									<img src="<?php echo asset('/'.$vicons['image']['src']); ?>" alt="">
									<?php  }else{  ?>
									<img src="{{asset('site/img/icons/01.png')}}" alt="...">

									<?php  } ?>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5 mb-3"><a href="{{url('services/'.$category->slug)}}"><?php echo $category->name; ?> </a></h3>
                                  
                                    <a href="{{url('services/'.$category->slug)}}"> {{$category->subTital}}<i class="ti-arrow-right align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php  } } ?>	
                    
                </div>
            </div>
        </section>
 
        <section class="jarallax dark-overlay" data-overlay-dark="65" style="background-image: url(img/content/vide-bg-img.jpg);" data-jarallax data-speed="0.8" data-video-src="https://www.youtube.com/watch?v=pDWUf_g2zsc">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-xl-11 wow fadeIn" data-wow-delay="200ms">
                        <h2 class="mb-1-9 display-13 display-sm-8 display-md-6 display-lg-3 text-white">Mission is to Growth Your Business & More</h2>
                        <a href="contact.html" class="btn-style1 white-border"><span>Contact Us</span></a>
                    </div>
                </div>
            </div>
        </section>
	@endsection