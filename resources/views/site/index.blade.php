@extends('site.layouts.app')
@section('title')
WebSolutionTechnology | Website Development, Software Development & Digital Marketing Services @endsection 
@section('keyword')
WebSolutionTechnology, website development services, web development company, custom software development, software development company, web application development, digital marketing agency, SEO services, search engine optimization, ecommerce website development, online store development, responsive web design, professional website design, business website development, corporate website solutions, website maintenance services, web hosting services, cloud hosting solutions, IT consulting services, technology solutions provider, custom web applications, mobile-friendly websites, digital transformation services, branding and marketing solutions, website redesign services. @endsection
@section('description')
WebSolutionTechnology is a trusted IT solutions company specializing in website development, custom software solutions, web application development, digital marketing, SEO, web hosting, and ongoing maintenance services. We empower businesses with secure, scalable, and innovative technology solutions designed to enhance online presence, improve operational efficiency, and drive sustainable growth @endsection
@section('content')
        <section class="py-0 mx-lg-1-6 mx-xl-2-5 mx-xxl-2-9">
            <div class="slider-fade1 owl-carousel owl-theme w-100">
                <div class="item bg-img cover-background pt-14 pb-22 py-sm-18 py-lg-20 py-xl-24" data-background="{{asset('site/img/banner/home-banner.png')}}">
                    <div class="container position-relative z-index-9">
                        <div class="row align-items-center justify-content-xl-end">
                            <div class="col-lg-9 col-xl-7 col-xxl-6">
                                <h1 class="display-16 display-sm-7 display-lg-4 display-xl-3 mb-2-9">The quickest path to success.</h1>
                                <p class="mb-2-3 font-weight-500 lead d-none d-sm-block">Our priority is to provide outstanding service to our customers while equipping our employees with the best training.</p>
                                <!--<a href="contact.html" class="btn-style1"><span>Begin your journey</span></a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item bg-img cover-background pt-14 pb-22 py-sm-18 py-lg-20 py-xl-24" data-background="{{asset('site/img/banner/slide-02.jpg')}}">
                    <div class="container position-relative z-index-9">
                        <div class="row align-items-center justify-content-xl-end">
                            <div class="col-lg-9 col-xl-7 col-xxl-6">
                                <h1 class="display-16 display-sm-7 display-lg-4 display-xl-3 mb-2-9">Premium services designed for your success.</h1>
                                <p class="mb-2-3 font-weight-500 lead d-none d-sm-block">We are committed to delivering exceptional customer service while ensuring our employees receive the finest training.</p>
                                <!--<a href="contact.html" class="btn-style1"><span>Start now</span></a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item bg-img cover-background pt-14 pb-22 py-sm-18 py-lg-20 py-xl-24" data-background="{{asset('site/img/banner/slide-03.jpg')}}">
                    <div class="container position-relative z-index-9">
                        <div class="row align-items-center justify-content-xl-end">
                            <div class="col-lg-9 col-xl-7 col-xxl-6">
                                <h1 class="display-16 display-sm-7 display-lg-4 display-xl-3 mb-2-9">Turn your digital ideas into reality with us.</h1>
                                <p class="mb-2-3 font-weight-500 lead d-none d-sm-block">We prioritize delivering exceptional service to our customers while empowering our employees with top-quality training.</p>
                               <!-- <a href="contact.html" class="btn-style1"><span>Kickstart your journey</span></a>-->
                            </div>
                        </div>
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

        <!-- SERVICES
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-title mb-1-9 mb-md-6 text-center wow fadeIn" data-wow-delay="200ms">
                    <span class="sm-title">Our Services</span>
                    <h2 class="mb-0 h1">Growth-driven solutions for you.</h2>
                </div>
				
				
                <div class="row mt-n1-9">
				<?php //echo "<pre>";print_r($categories); die; 
				
					if($categories){ 
					foreach($categories as $categorie){
				//echo "<pre>"; print_r($categorie);
				?>
                    <div class="col-md-6 col-xl-4 mt-1-9 wow fadeIn" data-wow-delay="200ms">
                        <div class="card card-style01 border-0 rounded-0">
						<?php if($categorie->image){
							$vicons= unserialize($categorie->image);   
							?>
                            <img src="<?php echo asset('/'.$vicons['image']['src']); ?>" alt="">
						<?php  }else{ ?> 
						 <img src="{{asset('site/img/content/01.jpg')}}" alt="...">
						<?php } ?>
                            <div class="title">
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('site/img/icons/09.png')}}" alt="...">
                                    <h4 class="h5 mb-0 ms-3"><a href="{{url('services/'.$categorie['slug'])}}"><?php echo $categorie["name"];?></a></h4>
                                </div>
                                <a href="#!"><i class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="overlay text-center">
                                <div>
                                    <img src="{{asset('site/img/icons/icon-web-development.png')}}" class="mb-3" alt="...">
                                    <h3 class="text-white h4 mb-3"><a href="{{url('services/'.$categorie['slug'])}}" class="text-white text-primary-hover"><?php echo $categorie["name"];?></a></h3>
                                    <p class="mb-0 text-white"><a href="{{url('services/'.$categorie['slug'])}}"><?php echo $categorie["subTital"];?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
					<?php  } } ?>	
                </div>
				
				    <!--<div class="row mt-n1-9">
                    <div class="col-md-6 col-xl-4 mt-1-9 wow fadeIn" data-wow-delay="200ms">
                        <div class="card card-style01 border-0 rounded-0">
                            <img src="{{asset('site/img/content/01.jpg')}}" alt="...">
                            <div class="title">
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('site/img/icons/09.png')}}" alt="...">
                                    <h4 class="h5 mb-0 ms-3"><a href="{{url('service')}}">Hosting Services</a></h4>
                                </div>
                                <a href="#!"><i class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="overlay text-center">
                                <div>
                                    <img src="{{asset('site/img/icons/icon-web-development.png')}}" class="mb-3" alt="...">
                                    <h3 class="text-white h4 mb-3"><a href="{{url('service')}}" class="text-white text-primary-hover">Hosting Services</a></h3>
                                    <p class="mb-0 text-white">We focus on the best practices for it solutions and services</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-1-9 wow fadeIn" data-wow-delay="400ms">
                        <div class="card card-style01 border-0 rounded-0">
                            <img src="{{asset('site/img/content/02.jpg')}}" alt="...">
                            <div class="title">
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('site/img/icons/10.png')}}" alt="...">
                                    <h4 class="h5 mb-0 ms-3"><a href="{{url('service')}}">Industries Projects</a></h4>
                                </div>
                                <a href="#!"><i class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="overlay text-center">
                                <div>
                                    <img src="{{asset('site/img/icons/icon-branding.png')}}" class="mb-3" alt="...">
                                    <h3 class="text-white h4 mb-3"><a href="{{url('service')}}" class="text-white text-primary-hover">Industries Projects</a></h3>
                                    <p class="mb-0 text-white">We focus on the best practices for it solutions and services</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-1-9 wow fadeIn" data-wow-delay="600ms">
                        <div class="card card-style01 border-0 rounded-0">
                            <img src="{{asset('site/img/content/03.jpg')}}" alt="...">
                            <div class="title">
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('site/img/icons/11.png')}}" alt="...">
                                    <h4 class="h5 mb-0 ms-3"><a href="{{url('service')}}">Digital Marketing</a></h4>
                                </div>
                                <a href="#!"><i class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="overlay text-center">
                                <div>
                                    <img src="{{asset('site/img/icons/icon-digital-marketing.png')}}" class="mb-3" alt="...">
                                    <h3 class="text-white h4 mb-3"><a href="{{url('service')}}" class="text-white text-primary-hover">Digital Marketing</a></h3>
                                    <p class="mb-0 text-white">We focus on the best practices for it solutions and services</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </section>

        <!-- ABOUT
        ================================================== -->
        <section class="pt-0">
            <div class="container position-relative z-index-3">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-1-9 mb-lg-0 wow fadeIn" data-wow-delay="400ms">
                        <div class="position-relative text-center pb-sm-22 me-xl-1-9">
                            <img src="{{asset('site/img/content/about3.jpg')}}" class="position-relative z-index-2" alt="...">
                            <img src="{{asset('site/img/content/about4.jpg')}}" class="position-absolute bottom bottom-sm-10 left z-index-3 d-none d-sm-block" alt="...">
                            <img src="{{asset('site/img/content/about5.jpg')}}" class="position-absolute bottom-0 right z-index-1 d-none d-sm-block" alt="...">
                            <div class="p-4 bg-white shadow right right-sm-5 top-10 position-absolute z-index-3">
                                <img src="{{asset('site/img/content/chart.png')}}" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-2-9">
                            <div class="section-title wow fadeIn" data-wow-delay="100ms">
                                <span class="sm-title">About Us</span>
                                <h2 class="h1 mb-1-9">Innovative Marketing Solutions for Your Success</h2>
                            </div>
                            <p class="mb-1-9 wow fadeInUp" data-wow-delay="200ms">Our team is a dynamic group of web experts and industry professionals with a global perspective and a collaborative approach. We dive deep into your challenges, ask the right questions, and craft innovative solutions to bring your vision to life.</p>
                            <div class="d-sm-flex align-items-center mb-2-9">
                                <div class="pe-sm-1-9 border-sm-end text-sm-center mb-3 mb-sm-0 wow fadeInUp" data-wow-delay="200ms">
                                    <h3 class="display-16 display-sm-10 display-lg-7 text-primary">12</h3>
                                    <p class="mb-0 text-secondary">Years Experience</p>
                                </div>
                                <div class="ps-sm-1-9">
                                    <ul class="list-style2 mb-0">
                                        <li class="wow fadeInUp" data-wow-delay="300ms">Seamless Data Integration & Synchronization</li>
                                        <li class="wow fadeInUp" data-wow-delay="400ms">Mobile-Friendly & Responsive Designs</li>
                                        <li class="wow fadeInUp" data-wow-delay="500ms">Secure & Reliable Web Solutions</li>
                                        <li class="wow fadeInUp" data-wow-delay="500ms">24/7 Maintenance & Support</li>
                                        <li class="wow fadeInUp" data-wow-delay="500ms">Custom Website Development</li>
                                        <li class="wow fadeInUp" data-wow-delay="500ms">Web Application Development</li>
                                    </ul>
                                </div>
                            </div>
                           <!-- <a href="about.html" class="btn-style1 wow fadeIn" data-wow-delay="200ms"><span>Read more</span></a>-->
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{asset('site/img/bg/bg-05.png')}}" class="position-absolute bottom-0 right" alt="...">
        </section>

        <!-- SERVICES
        ================================================== -->
        <section class="bg-dark">
            <div class="container position-relative z-index-3">
                <div class="section-title mb-1-9 mb-md-6 text-center wow fadeIn" data-wow-delay="200ms">
                    <span class="sm-title">Our Services</span>
                    <h2 class="mb-0 h1 text-white">We Provide The Best Services</h2>
                </div>
                <div class="row mt-n2-9">
                    <div class="col-md-6 col-xl-4 mt-2-9 wow fadeIn" data-wow-delay="300ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
                                        <img src="{{asset('site/img/icons/01.png')}}" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5 mb-3"><a href="#" class="text-white">Website Development Services</a></h3>
                                    <p class="mb-3 text-white opacity7">We craft modern, responsive, and high performing websites tailored to your business needs,From sleek corporate sites to dynamic e-commerce platforms.</p>
                                    <a href="#!" class="text-white">Read more <i class="ti-arrow-right align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-9 wow fadeIn" data-wow-delay="400ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
                                        <img src="{{asset('site/img/icons/02.png')}}" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5 mb-3"><a href="#" class="text-white">Digital Marketing</a></h3>
                                    <p class="mb-3 text-white opacity7">Boost your brand’s visibility with our result driven digital marketing strategies, we help you attract the audience and convert leads into loyal customers.</p>
                                    <a href="#!" class="text-white">Read more <i class="ti-arrow-right align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-9 wow fadeIn" data-wow-delay="500ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
                                        <img src="{{asset('site/img/icons/03.png')}}" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5 mb-3"><a href="#" class="text-white">Web Application Development</a></h3>
                                    <p class="mb-3 text-white opacity7">We build powerful, scalable, and user friendly web applications tailored to your business needs, Transform your ideas into dynamic web solutions.</p>
                                    <a href="#!" class="text-white">Read more <i class="ti-arrow-right align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-9 wow fadeIn" data-wow-delay="600ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
                                        <img src="{{asset('site/img/icons/04.png')}}" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5 mb-3"><a href="#" class="text-white">Optimization & Security</a></h3>
                                    <p class="mb-3 text-white opacity7">Enhance your website’s speed, performance, and security with our expert optimization services, Stay with a secure, high performing digital presence.</p>
                                    <a href="#!" class="text-white">Read more <i class="ti-arrow-right align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-9 wow fadeIn" data-wow-delay="700ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
                                        <img src="{{asset('site/img/icons/05.png')}}" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5 mb-3"><a href="#" class="text-white">Maintenance & Support</a></h3>
                                    <p class="mb-3 text-white opacity7">Keep your website running smoothly with our reliable maintenance and support services, Focus on your business while we take care of the technical side.</p>
                                    <a href="#!" class="text-white">Read more <i class="ti-arrow-right align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mt-2-9 wow fadeIn" data-wow-delay="800ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
                                        <img src="{{asset('site/img/icons/06.png')}}" alt="...">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5 mb-3"><a href="#" class="text-white">Content Management</a></h3>
                                    <p class="mb-3 text-white opacity7">Effortlessly manage, update and organize your website content with our streamlined content management solutions.</p>
                                    <a href="#!" class="text-white">Read more <i class="ti-arrow-right align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{asset('site/img/bg/bg-01.png')}}" class="position-absolute bottom-0 left" alt="...">
        </section>

        <!-- FAQ
        ================================================== -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-1-9 mb-lg-0">
                        <div class="pe-lg-6 wow fadeInUp" data-wow-delay="200ms">
                            <h2 class="h1 mb-2-3">We’re Delivering The Best Customer Experience!</h2>
                            <div class="row mb-2-3">
                                <div class="col-sm-5 mb-3 mb-sm-0">
                                    <img src="{{asset('site/img/content/05.jpg')}}" alt="...">
                                </div>
                                <div class="col-sm-7">
                                    <p class="mb-0">We craft high performing, user-friendly websites that are fast, secure, and designed to match your business needs. Our focus on innovation, quality, and ongoing support ensures a smooth digital experience. With a client centric approach, we build solutions that drive success.</p>
                                </div>
                            </div>
                            <div class="progress-style1">
                                <div class="progress-text">
                                    <div class="row">
                                        <div class="col-6 fw-bold">Digital Marketing</div>
                                        <div class="col-6 text-end">70%</div>
                                    </div>
                                    
                                </div>
                                 
                                <div class="custom-progress progress rounded-3">
                                    <div class="animated custom-bar progress-bar slideInLeft" style="width:70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-delay="400ms">
                            <div id="accordion" class="accordion-style">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">1.Why to choose us?</button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            We focus on creating high quality, customized solutions that drive results. Our team combines expertise, security, and innovation to build smooth digital experiences. With a commitment to excellence and continuous support, we help businesses grow and stay ahead.
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">2. What makes us different?</button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                        <div class="card-body">
                                             We prioritize innovation, security, and user experience to create tailored digital solutions. Our customer-centric approach ensures we understand your unique needs and deliver beyond expectations. With a focus on quality, reliability, and long-term support, we help businesses stay ahead in the digital world.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">3.What Is Our Process?</button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            We begin with a detailed consultation to understand your goals and requirements. Our team then designs and develops a customized solution with a focus on quality and performance. After thorough testing, we launch your project and provide ongoing support to ensure long-term success.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-primary px-1-9 py-2-9 mt-2-9 primary-shadow wow fadeInUp" data-wow-delay="200ms">
                    <div class="row align-items-center text-center text-lg-start">
                        <div class="col-lg-4">
                            <h2 class="mb-0 text-white">Give Us a Call.</h2>
                        </div>
                        <div class="col-lg-4 my-2-2 my-lg-0">
                            <div class="contact-icon">
                                <img src="{{asset('site/img/icons/07.png')}}" class="w-30px" alt="...">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h4 class="font-weight-700 text-white">93183 45497</h4>
                            <h4 class="mb-0 font-weight-700 text-white">info@websolutiontechnology.com</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
        .portfolio-img img{
            width:300px;
            height:200px;
            
        }
        </style>

        <!-- PORTFOLIO
        ================================================== -->
        <section class="pt-0 pb-0 bg-dark">
            <div class="container-fluid px-0">
                <div class="portfolio-carousel owl-carousel owl-theme wow fadeIn" data-wow-delay="200ms">
                <div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/oral Health.PNG')}}" alt="..." style>
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website Development</span>
                                <h3 class="mb-3 h4"><a href="#">Oral Health</a></h3>
                               <!-- <a href="portfolio-details.html" class="portfolio-link">Read more <i class="ti-arrow-right align-middle"></i></a>-->
                            </div>
                        </div>
                        <!--<div class="portfolio-style01 mb-2-3">-->
                        <!--    <div class="portfolio-img">-->
                        <!--        <img src="{{asset('site/img/portfolio/blog.jpg')}}" alt="...">-->
                        <!--    </div>-->
                        <!--    <div class="portfolio-content">-->
                        <!--        <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website Development</span>-->
                        <!--        <h3 class="mb-3 h4"><a href="#">Education </a></h3>-->
                                
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="portfolio-style01 mb-2-3">-->
                        <!--    <div class="portfolio-img">-->
                        <!--        <img src="{{asset('site/img/portfolio/captiware.jpg')}}" alt="...">-->
                        <!--    </div>-->
                        <!--    <div class="portfolio-content">-->
                        <!--        <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website Development</span>-->
                        <!--        <h3 class="mb-3 h4"><a href="#">Website Testing</a></h3>-->
                                
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="portfolio-style01 mb-2-3">-->
                        <!--    <div class="portfolio-img">-->
                        <!--        <img src="{{asset('site/img/portfolio/certificate.jpg')}}" alt="...">-->
                        <!--    </div>-->
                        <!--    <div class="portfolio-content">-->
                        <!--        <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Landing Page</span>-->
                        <!--        <h3 class="mb-3 h4"><a href="#">Employee Engage</a></h3>-->
                               
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/client-leads.jpg')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Admin Penal</span>
                                <h3 class="mb-3 h4"><a href="#">Leads Mangement</a></h3>
                               
                            </div>
                        </div>
                         
                        <div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/it company.PNG')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website Development</span>
                                <h3 class="mb-3 h4"><a href="#">IT Company</a></h3>
                               
                            </div>
                        </div>
                        <!--<div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/itconsultings.jpg')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website Development</span>
                                <h3 class="mb-3 h4"><a href="#">IT Counsulting</a></h3>
                               
                            </div>
                        </div>-->
                        <!--<div class="portfolio-style01 mb-2-3">-->
                        <!--    <div class="portfolio-img">-->
                        <!--        <img src="{{asset('site/img/portfolio/job-back.jpg')}}" alt="...">-->
                        <!--    </div>-->
                        <!--    <div class="portfolio-content">-->
                        <!--        <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Job Portals</span>-->
                        <!--        <h3 class="mb-3 h4"><a href="#">Jobs Portal</a></h3>-->
                               
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/jobportal.jpg')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website Developement</span>
                                <h3 class="mb-3 h4"><a href="#">job Protals</a></h3>
                              
                            </div>
                        </div>
                        <div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/language.jpg')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website Developement</span>
                                <h3 class="mb-3 h4"><a href="#">Language</a></h3>
                               
                            </div>
                        </div>-->
                        <div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/Mecci Engineers.PNG')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">SEO</span>
                                <h3 class="mb-3 h4"><a href="#">Technology </a></h3>
                              
                            </div>
                        </div>
                        <div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/portfolio_02.jpg')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website Developement</span>
                                <h3 class="mb-3 h4"><a href="#">Labs Test</a></h3>
                               
                            </div>
                        </div>
                        <div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/bizydesk.png')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website </span>
                                <h3 class="mb-3 h4"><a href="#">Cospace Property</a></h3>
                                
                            </div>
                        </div>
                        <div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/portfolio_04.jpg')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Admin Penals</span>
                                <h3 class="mb-3 h4"><a href="#">Leads Portal</a></h3>
                                
                            </div>
                        </div>
                        
                        <div class="portfolio-style01 mb-2-3">
                            <div class="portfolio-img">
                                <img src="{{asset('site/img/portfolio/song-websolutiontechnology.jpg')}}" alt="...">
                            </div>
                            <div class="portfolio-content">
                                <span class="text-primary d-block mb-1 text-uppercase font-weight-600 small">Website Developement</span>
                                <h3 class="mb-3 h4"><a href="#"> DJ Music</a></h3>
                            
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <!-- TESTIMONIAL
        ================================================== -->
        <section class="bg-dark pt-7 pt-lg-10 pb-lg-16">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-9">
                        <div class="section-title text-center mb-1-9 mb-md-2-3 wow fadeIn" data-wow-delay="200ms">
                            <span class="sm-title">Testimonials</span>
                            <h2 class="mb-0 h1 text-white">What Our Clients Say</h2>
                        </div>
                        <div class="position-relative">
                            <div class="testimonial-carousel1 owl-carousel owl-theme wow fadeIn" data-wow-delay="400ms">
                                <div class="position-relative mt-4">
                                    <img src="{{asset('site/img/avatars/avatar-01.jpg')}}" class="rounded-circle mb-3" alt="...">
                                    <p class="mb-1-9 display-25 display-lg-23 text-white">Working with Web Solution Technology for TechPratham.com has been an outstanding experience! They understood our vision and built a high-performing, user-friendly website that perfectly aligns with our goals. Their expertise, professionalism, and attention to detail set them apart. Highly recommended for top-notch web development.</p>
                                    <h4 class="h5 mb-0 text-primary">Techpratham</h4>
                                    <p class="mb-0 text-white">Company</p>
                                </div>
                                <div class="position-relative mt-4">
                                    <img src="{{asset('site/img/avatars/avatar-02.jpg')}}" class="rounded-circle mb-3" alt="...">
                                    <p class="mb-1-9 display-25 display-lg-23 text-white">IT solution is the most valuable business resource we have EVER purchased. I am completely blown away. I love your system. It's exactly what I've been looking for. I love business. It really saves me time and effort.</p>
                                    <h4 class="h5 mb-0 text-primary">Gemma Krischock</h4>
                                    <p class="mb-0 text-white">Web Designer</p>
                                </div>
                                <div class="position-relative mt-4">
                                    <img src="{{asset('site/img/avatars/avatar-03.jpg')}}" class="rounded-circle mb-3" alt="...">
                                    <p class="mb-1-9 display-25 display-lg-23 text-white">It's the perfect solution for our business. Just what I was looking for. We were treated like royalty. Absolutely wonderful! It really saves me time and effort. business is exactly what our business has been lacking.</p>
                                    <h4 class="h5 mb-0 text-primary">Daniel Hester</h4>
                                    <p class="mb-0 text-white">Web Developer</p>
                                </div>
                            </div>
                            <h6 class="testimonial-quote">“</h6>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{asset('site/img/content/04.png')}}" class="position-absolute top-n10 right" alt="...">
            <img src="{{asset('site/img/content/06.png')}}" class="position-absolute bottom-0 left" alt="...">
        </section>

        <!-- TABS
        ================================================== -->
        <section class="pt-lg-0 overflow-visible">
            <div class="container position-relative z-index-1">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="horizontaltab tab-style1 top-margin">
                            <ul class="resp-tabs-list hor_1 text-center wow fadeIn" data-wow-delay="200ms">
                                <li>Mission</li>
                                <li>Our challenges</li>
                                <li>Partners</li>
                                <!--<li>Our team</li>-->
                                <li>Careers with us</li>
                            </ul>
                            <div class="resp-tabs-container hor_1 p-0 wow fadeIn" data-wow-delay="400ms">
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 mb-1-9 mb-lg-0">
                                            <img src="{{asset('site/img/content/mission.png')}}" alt="...">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="ps-lg-4">
                                                <h3 class="mb-3">Our Mission</h3>
                                                <p class="mb-0">At Web Solution Technology, we are committed to transforming ideas into powerful digital experiences. Our goal is to build secure, high performance websites that enhance user engagement and business growth.</p>
                                                <div class="row mt-2-3">
                                                    <div class="col-md-8">
                                                        <div class="pe-lg-4">
                                                            <p class="mb-0">By blending innovation with a client-focused approach, we craft web solutions that are scalable, visually compelling, and built for long-term success in the digital landscape.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 d-none d-md-block">
                                                        <div class="text-end">
                                                            <img src="{{asset('site/img/content/tab-01.jpg')}}" alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 mb-1-9 mb-lg-0">
                                            <p class="mb-0">At Web Solution Technology, we navigate the fast paced world of web development by staying
											updated with evolving technologies while ensuring security, performance and reliability. Balancing 
											client expectations with practical, SEO friendly solutions across various devices is a constant challenge. 
											Managing multiple projects within tight deadlines while maintaining quality demands strong time management.
											Despite these challenges, we remain committed to delivering excellence through adaptability and expertise.</p>
                                            <p class="d-flex align-items-center mb-4"><span class="fw-bold text-dark me-2">Mahender Verma</span> -<label class="ms-2 mb-0">Head Of Company</label></p>
                                            <p>We are dedicated to delivering exceptional service to our customers while empowering our employees with the best training and growth opportunities.</p>
                                            <!--<a href="about.html" class="btn-style1 secondary"><span>Read more</span></a>-->
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{asset('site/img/content/our challenges.png')}}" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1-9 mb-lg-0">
                                            <div class="pe-xl-1-9">
                                                <img src="{{asset('site/img/content/Partners.png')}}" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h3>Our Partners</h3>
                                            <p class="w-lg-80 mb-md-2-9 mb-1-9">We collaborated with Technology Managers to enhance capabilities at every stage of the product development journey.</p>
                                            <!--<div class="row mb-2-9 mt-n1-9">
                                                <div class="col-6 col-sm-3 mt-1-9">
                                                    <img src="{{asset('site/img/clients/01.png')}}" alt="...">
                                                </div>
                                                <div class="col-6 col-sm-3 mt-1-9">
                                                    <img src="{{asset('site/img/clients/02.png')}}" alt="...">
                                                </div>
                                                <div class="col-6 col-sm-3 mt-1-9">
                                                    <img src="{{asset('site/img/clients/03.png')}}" alt="...">
                                                </div>
                                                <div class="col-6 col-sm-3 mt-1-9">
                                                    <img src="{{asset('site/img/clients/04.png')}}" alt="...">
                                                </div>
                                            </div>-->
                                            <!--<a href="contact.html" class="btn-style1 secondary"><span>Become a partner</span></a>-->
                                        </div>
                                    </div>
                                </div>
                                <!--<div>
                                   <h3 class="mb-1-9">Meet Our Leaders</h3>
                                    <div class="row mt-n1-9">
                                        <div class="col-sm-6 col-lg-3 mt-1-9">
                                            <div class="team-style01">
                                                <div class="image">
                                                    <div>
                                                        <img src="{{asset('site/img/team/team-01.jpg')}}" alt="...">
                                                        <ul class="mb-0 social ps-0">
                                                            <li>
                                                                <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#!"><i class="fab fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#!"><i class="fab fa-linkedin-in"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pt-3">
                                                    <h3 class="h5 mb-0"><a href="team-details.html">Hamish French</a></h3>
                                                    <p class="mb-0 small">Computer Scientist</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 mt-1-9">
                                            <div class="team-style01">
                                                <div class="image">
                                                    <div>
                                                        <img src="{{asset('site/img/team/team-02.jpg')}}" alt="...">
                                                        <ul class="mb-0 social ps-0">
                                                            <li>
                                                                <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#!"><i class="fab fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#!"><i class="fab fa-linkedin-in"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pt-3">
                                                    <h3 class="h5 mb-0"><a href="team-details.html')}}">Zara Matheson</a></h3>
                                                    <p class="mb-0 small">CEO</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 mt-1-9">
                                            <div class="team-style01">
                                                <div class="image">
                                                    <div>
                                                        <img src="{{asset('site/img/team/team-03.jpg')}}" alt="...">
                                                        <ul class="mb-0 social ps-0">
                                                            <li>
                                                                <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#!"><i class="fab fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#!"><i class="fab fa-linkedin-in"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pt-3">
                                                    <h3 class="h5 mb-0"><a href="team-details.html">Dylan Bonney</a></h3>
                                                    <p class="mb-0 small">Process Analyst</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 mt-1-9">
                                            <div class="team-style01">
                                                <div class="image">
                                                    <div>
                                                        <img src="{{asset('site/img/team/team-04.jpg')}}" alt="...">
                                                        <ul class="mb-0 social ps-0">
                                                            <li>
                                                                <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#!"><i class="fab fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#!"><i class="fab fa-linkedin-in"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pt-3">
                                                    <h3 class="h5 mb-0"><a href="team-details.html">Skye Finney</a></h3>
                                                    <p class="mb-0 small">Web Developer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <div>
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 mb-1-9 mb-lg-0">
                                            <h4 class="mb-4">Why work with us?</h4>
                                            <div class="row mb-1-9">
                                                <div class="col-md-6 mb-2 mb-md-0">
                                                    <ul class="list-style2 mb-0">
                                                        <li>Work on innovative, cutting edge projects.</li>
                                                        <li>Enjoy flexible hours & remote work options.</li>
                                                        <li>Elevate your skills with continuous learning</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="list-style2 mb-0">
                                                        <li>Develop in a collaborative & supportive culture.</li>
                                                        <li>Get rewarded with competitive pay & perks.</li>
                                                        <li>Grow alongside industry-leading experts.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--<a href="contact.html" class="btn-style1 secondary"><span>Join Us</span></a>-->
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{asset('site/img/content/Careerr.png')}}" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- COUNTER
        ================================================== -->
        <section class="pt-0">
            <div class="container">
                <div class="row text-center mt-n1-9 position-relative z-index-1">
                    <div class="col-6 col-lg-3 mt-1-9">
                        <div class="counter-style2 wow fadeInUp" data-wow-delay="200ms">
                            <h3 class="display-14 display-sm-12 display-lg-10 text-primary"><span class="countup">1</span>k</h3>
                            <span class="fw-bold text-uppercase">Customers</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mt-1-9">
                        <div class="counter-style2 wow fadeInUp" data-wow-delay="350ms">
                            <h3 class="display-14 display-sm-12 display-lg-10 text-primary"><span class="countup">2</span>+</h3>
                            <span class="fw-bold text-uppercase">Branches</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mt-1-9">
                        <div class="counter-style2 wow fadeInUp" data-wow-delay="500ms">
                            <h3 class="display-14 display-sm-12 display-lg-10 text-primary"><span class="countup">15</span>+</h3>
                            <span class="fw-bold text-uppercase">Employees</span>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 mt-1-9">
                        <div class="wow fadeInUp" data-wow-delay="650ms">
                            <h3 class="display-14 display-sm-12 display-lg-10 text-primary"><span class="countup">2</span>+</h3>
                            <span class="fw-bold text-uppercase">Countries</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CALL TO ACTION
        ================================================== -->
        <section class="jarallax dark-overlay" data-overlay-dark="65" style="background-image: url(img/content/vide-bg-img.jpg);" data-jarallax data-speed="0.8" data-video-src="https://www.youtube.com/watch?v=pDWUf_g2zsc">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-xl-11">
                        <h2 class="mb-1-9 display-13 display-sm-8 display-md-6 display-lg-3 text-white">Our mission is to elevate your business and drive unstoppable growth</h2>
                        <!--<a href="contact.html" class="btn-style1 white-border"><span>Contact Us</span></a>-->
                    </div>
                </div>
            </div>
        </section>
        
        <!-- BLOG
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-title mb-1-9 mb-md-6 text-center wow fadeIn" data-wow-delay="200ms">
                    <span class="sm-title">Our Blog</span>
                    <h2 class="mb-0 h1">Read Our Latest Insights</h2>
                </div>
                <div class="row g-xl-5 mt-n2-2">
                    <div class="col-md-6 col-lg-4 mt-2-2 wow fadeInUp" data-wow-delay="300ms">
                        <article class="card card-style-04 h-100 rounded-0">
                            <div class="blog-img position-relative overflow-hidden">
                                <img src="{{asset('site/img/blog/blog-01.jpg')}}" alt="...">
                                <div class="card-list">
                                    <a href="#!">Solutions</a>
                                </div>
                            </div>
                            <div class="card-body p-1-9">
                                <span class="text-primary d-block mb-2 font-weight-600">June 01, 2023</span>
                                <h3 class="h4 mb-0"><a href="#">10 reliable sources to learn about IT solution.</a></h3>
                            </div>
                            <!--<div class="d-flex fw-bold border-top px-1-9 py-3 border-color-light-black justify-content-between">
                                <a href="blog-details.html">Read more</a>
                                <a href="blog-details.html"><i class="ti-arrow-right"></i></a>
                            </div>-->
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-2-2 wow fadeInUp" data-wow-delay="450ms">
                        <article class="card card-style-04 h-100 rounded-0">
                            <div class="blog-img position-relative overflow-hidden">
                                <img src="{{asset('site/img/blog/blog-02.jpg')}}" alt="...">
                                <div class="card-list">
                                    <a href="#!">Marketing</a>
                                </div>
                            </div>
                            <div class="card-body p-1-9">
                                <span class="text-primary d-block mb-2 font-weight-600">May 29, 2024</span>
                                <h3 class="h4 mb-0"><a href="#">How digital marketing can increase your profit!</a></h3>
                            </div>
                            <!--<div class="d-flex fw-bold border-top px-1-9 py-3 border-color-light-black justify-content-between">
                                <a href="blog-details.html">Read more</a>
                                <a href="blog-details.html"><i class="ti-arrow-right"></i></a>
                            </div>-->
                        </article>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-2-2 wow fadeInUp" data-wow-delay="600ms">
                        <article class="card card-style-04 h-100 rounded-0">
                            <div class="blog-img position-relative overflow-hidden">
                                <img src="{{asset('site/img/blog/blog-03.jpg')}}" alt="...">
                                <div class="card-list">
                                    <a href="#!">Development</a>
                                </div>
                            </div>
                            <div class="card-body p-1-9">
                                <span class="text-primary d-block mb-2 font-weight-600">Jan 25, 2025</span>
                                <h3 class="h4 mb-0"><a href="#">Simple guidance for you in web development.</a></h3>
                            </div>
                            <!--<div class="d-flex fw-bold border-top px-1-9 py-3 border-color-light-black justify-content-between">
                                <a href="blog-details.html">Read more</a>
                                <a href="blog-details.html"><i class="ti-arrow-right"></i></a>
                            </div>-->
                        </article>
                    </div>
                </div>
            </div>
        </section>


	@endsection