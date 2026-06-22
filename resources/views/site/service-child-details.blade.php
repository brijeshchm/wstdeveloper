@extends('site.layouts.app')
@section('title')
{{ !empty($serviceChildDetails->meta_title) ? $serviceChildDetails->meta_title : 'WebSolutionTechnology - Website Development & Software Solutions' }}@endsection
@section('keyword')
{{ !empty($serviceChildDetails->meta_keywords) ? $serviceChildDetails->meta_keywords : 'website development, software development, web design, SEO services, digital marketing, IT solutions' }}@endsection
@section('description')
{{ !empty($serviceChildDetails->meta_description) ? $serviceChildDetails->meta_description : 'WebSolutionTechnology provides website development, software development, digital marketing, SEO, web hosting, and IT solutions for businesses worldwide.' }}@endsection
@section('content')
<section class="page-title-section bg-img cover-background mx-lg-1-6 mx-xl-2-5 mx-xxl-2-9 left-overlay-dark" data-overlay-dark="8" data-background="img/banner/page-title.jpg">
<div class="container">
<div class="row">
<div class="col-md-12"><?php //echo "<pre>";print_r($service); die; ?>
<div class="position-relative">
 
</div>  
<ul>
<li><a href="{{url('/')}}">Home</a></li>
<li><a href="{{$serviceChildDetails->slug}}">{{$serviceChildDetails->name}}</a></li>
</ul>


@php
$schemaservice = [];

if (!empty($serviceChildDetails->name)) {
        $schemaservice[] = [
            '@context'    => 'https://schema.org',
            '@type'       => 'Service',
            'name'        => $serviceChildDetails->name ?? '',
            'description' => $serviceChildDetails->meta_description ?? '',
            'url'         => url()->current(),
            'areaServed'  => "Noida"?? null,
            'provider'    => [
                '@type' => 'Organization',
                'name'  => 'Web Solution Technology',
                'url'   => url('/'),
            ],
        ];
    }

@endphp


@if(!empty($schemaservice))
<script type="application/ld+json">
{!! json_encode(
    count($schemaservice) === 1 ? $schemaservice[0] : $schemaservice,
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
) !!}
</script>
@endif

@if(!empty($serviceChildDetails))
								<?php
						$rating = $serviceChildDetails->rating;
						$stars = 'star_4.75_new.png';
						$ext = '.png';
						switch ($rating) {
							case 0:
								$stars = 'star_1' . $ext;
								break;
							case 2:
								$stars = 'star_2' . $ext;
								break;
							case 3:
								$stars = 'star_3' . $ext;
								break;
							case 3.5:
								$stars = 'star_3.5_new' . $ext;
								break;
							case 4:
								$stars = 'star_4' . $ext;
								break;
							case 4.5:
								$stars = 'star_4.5_new' . $ext;
								break;
							case 4.75:
								$stars = 'star_4.75_new' . $ext;
								break;
							case 5:
								$stars = 'star_5_new' . $ext;
								break;
						}
										?>
								<div itemscope itemtype="https://schema.org/Product" style="font-size: 12px;font-weight: 500;">
									<div class="text-primary" itemprop="name">
										<h1 title="<?php  if (!empty($serviceChildDetails->name)) { $key = $serviceChildDetails->name;
							echo trim($key); } ?>"><?php  if (!empty($serviceChildDetails->name)) { $key = $serviceChildDetails->name;
							echo trim($key); } ?></h1>
									</div>
									<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
										<img loading="lazy" itemprop="image" src="{{ asset('site/' . $stars) }}"
											alt="5 Star Rating: Very Good" />
										<span itemprop="ratingValue"><?php if (!empty($serviceChildDetails->rating)) {
							echo number_format((float) $serviceChildDetails->rating, 1, '.', '');
						} else {
							echo "1.0";
						} ?></span> out of <span itemprop="bestRating"></span>based on <span itemprop="ratingCount">{{$serviceChildDetails->total_rating }}</span> ratings
									</div>
								</div>
					@endif
 





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
                <div class="row">
                    <div class="col-xl-4 order-2 order-xl-1">
                        <div class="sidebar me-xxl-1-9">
						
                            <div class="widget bg-secondary mb-1-9 wow fadeIn" data-wow-delay="200ms">
                                <div class="widget-content">
                                    <h5 class="mb-4 text-white">Main Services</h5>
                                    <ul class="category-list list-unstyled mb-0">
									
									@if(!empty($services))
										@foreach($services as $service)
                                        <li class="<?php  if($service->service_slug == $serviceChildDetails->service_slug ){ echo "active"; } ?> "><a href="{{url('services/'.$categories->slug.'/'.$service->service_slug)}}"><span>{{$service->name}}</span></a></li>
											@endforeach
										@endif
									
                                        
                                    </ul>
                                </div>
                            </div>
                          
                            <div class="widget bg-secondary wow fadeIn" data-wow-delay="600ms">
                                <div class="widget-content">
                                    <h5 class="mb-4 text-white">Follow Us</h5>
                                    <ul class="social-icon-style2 list-unstyled ps-0">
                                        <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 mb-2-9 mb-xl-0 order-1 order-xl-2">
                        <div>
                            <div class="mb-5 text-center wow fadeIn" data-wow-delay="200ms">
							<?php if($serviceChildDetails->image){
							$vicons= unserialize($serviceChildDetails->image);   
							?>
                            <img src="<?php echo asset('/'.$vicons['image']['src']); ?>" alt="">
						<?php  }else{ ?> 
						 <img src="{{asset('site/img/service/service-details-1.jpg')}}" alt="...">
						<?php } ?>
                                
                            </div>
                            <div class="wow fadeIn" data-wow-delay="20ms">
                                <h2 class="h4 mb-3"><?php echo $serviceChildDetails['name'];?></h2>
                                <p class="mb-5"><?php echo $serviceChildDetails['meta_description'];?></div>
                                <p class="mb-5"><?php echo $serviceChildDetails['description'];?>
						</div>
                            <div class="row mb-1-9">
                                <div class="col-lg-12 mb-4 mb-lg-0 wow fadeIn" data-wow-delay="200ms">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
										<div class="mb-5 text-center wow fadeIn" data-wow-delay="200ms">
                							<?php if($serviceChildDetails->image_one){
                							$vicons= unserialize($serviceChildDetails->image_one);   
                							?>
                                            <img src="<?php echo asset('/'.$vicons['image_one']['src']); ?>" class="rounded-circle" alt="...">
                							<?php  }else{ ?> 
                							<img src="{{asset('site/img/service/service-details-2.jpg')}}" class="rounded-circle" alt="...">
                							<?php } ?>
                                
                                        </div>
                                           
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h5"><?php echo $serviceChildDetails['heading_one'];?></h4>
                                            <p class="mb-0"><?php echo $serviceChildDetails['description_one'];?></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                           
                           
                            <div class="row mb-1-9">
                                <div class="col-lg-12 wow fadeIn" data-wow-delay="200ms">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
											<?php if($serviceChildDetails->image_two){$vicons= unserialize($serviceChildDetails->image_two);   ?>
											<img src="<?php echo asset('/'.$vicons['image_two']['src']); ?>" class="rounded-circle" alt="...">
											<?php  }else{ ?> 
											<img src="{{asset('site/img/service/service-details-3.jpg')}}" class="rounded-circle" alt="...">
											<?php } ?>
                                            
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h5"><?php echo $serviceChildDetails['heading_two'];?></h4>
                                            <p class="mb-0"><?php echo $serviceChildDetails['description_two'];?></p>
                                        </div>
                                    </div>
                                </div>
                             </div>   
                             
                             
                            
                             
                             
                            
                            
							<div>
							    
							   
                                
                                          
                                  
						<div class="mb-5 text-center wow fadeIn" data-wow-delay="200ms">
								<?php if($serviceChildDetails->image_three){
								$vicons= unserialize($serviceChildDetails->image_three);   
								?>
								<img src="<?php echo asset('/'.$vicons['image_three']['src']); ?>" alt="">
								<?php  }else{ ?> 
								<img src="{{asset('site/img/service/service-details-1.jpg')}}" alt="...">
								<?php } ?>
									
								</div>
								<div class="wow fadeIn" data-wow-delay="20ms">
									<h2 class="h4 mb-3"><?php echo $serviceChildDetails['heading_three'];?></h2>
									
							</div>
                            <p class="mb-2-3 wow fadeIn" data-wow-delay="200ms"><?php echo $serviceChildDetails['description_three'];?><div id="accordion" class="accordion-style wow fadeIn" data-wow-delay="200ms">
                                </p>
                                 
                                
                                
                                  
						<div class="mb-5 text-center wow fadeIn" data-wow-delay="200ms">
								<?php if($serviceChildDetails->image_four){
								$vicons= unserialize($serviceChildDetails->image_four);   
								?>
								<img src="<?php echo asset('/'.$vicons['image_four']['src']); ?>" alt="">
								<?php  }else{ ?> 
								<img src="{{asset('site/img/service/service-details-1.jpg')}}" alt="...">
								<?php } ?>
									
								</div>
								<div class="wow fadeIn" data-wow-delay="20ms">
									<h2 class="h4 mb-3"><?php echo $serviceChildDetails['heading_four'];?></h2>
									
							</div>
                            <p class="mb-2-3 wow fadeIn" data-wow-delay="200ms"><?php echo $serviceChildDetails['description_four'];?><div id="accordion" class="accordion-style wow fadeIn" data-wow-delay="200ms">
                                </p>
                                
                                
                                
                                
                                
                                <div class="card mb-3">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">1. Why we are best company?</button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            Web Solution Technology stands out as the best company because of our commitment to delivering innovative, high-quality digital solutions with a customer-first approach, backed by a skilled team and years of industry experience.
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">2. How the template process works?</button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                        <div class="card-body">
                                           At Web Solution Technology, the template process works by seamlessly integrating dynamic data into reusable design structures, allowing us to deliver consistent, efficient, and scalable web solutions tailored to each client's needs.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">3. What should be listed on a business card?</button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            A business card for Web Solution Technology should include the company name, logo, tagline, contact person's name, job title, phone number, email address, website URL, office address, and a brief mention of key services like Web Development, App Development, and Cloud Solutions.
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		
		

    
     @php
$faqs = [];
for ($n = 1; $n <= 5; $n++) {
    $q = $serviceChildDetails->{'faqq' . $n} ?? null;
    $a = $serviceChildDetails->{'faqa' . $n} ?? null;
    if ($q && $a) {
        $faqs[] = ['q' => $q, 'a' => $a];
    }
}
@endphp

@if(count($faqs) > 0)

<section class="faq-section">
  <div class="faq-header">
        <span class="faq-badge">FAQ</span>
        <h2>Got questions? We've got answers.</h2>
        <p>Everything you need to know about our platform. Can't find what you're looking for?
            
        </p>
    </div>
    <div class="faq-list">
        @foreach($faqs as $i => $faq)
        <div class="faq-item">
            <button class="faq-btn" aria-expanded="false" aria-controls="faq-body-{{ $i }}">
                <span class="faq-q">{{ $faq['q'] }}</span>
                <div class="faq-icon-wrap" aria-hidden="true">
                    <i class="ti ti-plus"></i>
                </div>
            </button>
            <div class="faq-body" id="faq-body-{{ $i }}" role="region">
                <div class="faq-body-inner">
                    <p class="faq-body-text">{{ $faq['a'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
 

@endif
	 
	 
	  
 

{{-- FAQ Schema for SEO --}}
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($faqs as $faq)
    {
      "@type": "Question",
      "name": "{{ $faq['q'] }}",
      "acceptedAnswer": { "@type": "Answer", "text": "{{ $faq['a'] }}" }
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}

</script>
<script>

// faq.js — pure vanilla, no jQuery
document.querySelectorAll('.faq-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const item = btn.closest('.faq-item');
        const isOpen = item.classList.contains('open');

        // Close all open items
        document.querySelectorAll('.faq-item.open').forEach(el => {
            el.classList.remove('open');
            el.querySelector('.faq-btn').setAttribute('aria-expanded', 'false');
        });

        // Open clicked item if it was closed
        if (!isOpen) {
            item.classList.add('open');
            btn.setAttribute('aria-expanded', 'true');
        }
    });
});
</script>

<style>
/* faq.css */
.faq-section {
   
    margin: 0 auto;
    padding: 5rem 1.5rem;
    font-family: 'Inter', sans-serif;
}

.faq-header { margin-bottom: 3rem; }

.faq-badge {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #185FA5;
    background: #E6F1FB;
    padding: 4px 12px;
    border-radius: 20px;
}

.faq-header h2 {
    font-size: 28px;
    font-weight: 500;
    color: #111;
    margin-top: 14px;
    line-height: 1.3;
}

.faq-header p {
    font-size: 14px;
    color: #666;
    margin-top: 8px;
    line-height: 1.6;
}

.faq-header a { color: #185FA5; text-decoration: none; }
.faq-header a:hover { text-decoration: underline; }

/* Items */
.faq-item { border-bottom: 1px solid #ebebeb; overflow: hidden; }
.faq-item:first-child { border-top: 1px solid #ebebeb; }

.faq-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 20px 0;
    background: none;
    border: none;
    cursor: pointer;
    text-align: left;
}

.faq-q {
    font-size: 15px;
    font-weight: 500;
    color: #111;
    line-height: 1.5;
    transition: color 0.2s;
}

.faq-item.open .faq-q { color: #185FA5; }

.faq-icon-wrap {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 1px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.25s;
    background: #fff;
}

.faq-item.open .faq-icon-wrap {
    background: #185FA5;
    border-color: #185FA5;
}

.faq-icon-wrap i {
    font-size: 14px;
    color: #888;
    transition: all 0.25s;
}

.faq-item.open .faq-icon-wrap i {
    color: #fff;
    transform: rotate(45deg);
}

/* Smooth grid animation */
.faq-body {
    display: grid;
    grid-template-rows: 0fr;
    transition: grid-template-rows 0.35s cubic-bezier(0.4, 0, 0.2, 1);
}

.faq-item.open .faq-body { grid-template-rows: 1fr; }

.faq-body-inner { overflow: hidden; }

.faq-body-text {
    font-size: 14px;
    color: #555;
    line-height: 1.8;
    padding-bottom: 20px;
    padding-right: 44px;
    opacity: 0;
    transform: translateY(-6px);
    transition: opacity 0.3s ease 0.05s, transform 0.3s ease 0.05s;
}

.faq-item.open .faq-body-text {
    opacity: 1;
    transform: translateY(0);
}
</style>



		
		
		
	@endsection