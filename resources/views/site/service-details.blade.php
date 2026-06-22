@extends('site.layouts.app')
@section('title')
{{ !empty($categoryDetails->meta_title) ? $categoryDetails->meta_title : 'WebSolutionTechnology - Website Development & Software Solutions' }} @endsection
@section('keyword')
{{ !empty($categoryDetails->meta_keywords) ? $categoryDetails->meta_keywords : 'website development, software development, web design, SEO services, digital marketing, IT solutions' }} @endsection
@section('description')
{{ !empty($categoryDetails->descripion) ? $categoryDetails->descripion : 'WebSolutionTechnology provides website development, software development, digital marketing, SEO, web hosting, and IT solutions for businesses worldwide.' }} @endsection
@section('content')


@php
$schemaservice = [];

if (!empty($categoryDetails->name)) {
        $schemaservice[] = [
            '@context'    => 'https://schema.org',
            '@type'       => 'Service',
            'name'        => $categoryDetails->name ?? '',
            'description' => $categoryDetails->meta_description ?? '',
            'url'         => url()->current(),
            'areaServed'  => "Noida" ?? null,
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

<section class="page-title-section bg-img cover-background mx-lg-1-6 mx-xl-2-5 mx-xxl-2-9 left-overlay-dark" data-overlay-dark="8" data-background="{{asset('site/img/banner/page-title.jpg')}}">
            <div class="container">
                <div class="row">
					 
                    <div class="col-md-12">
			
                        <div class="position-relative">
                           
                        </div>
					
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('services')}}"> Serivce</a></li>
                        </ul>
						
						{{-- Replace text-yellow-400 with this exact color --}}
 
@if(!empty($categoryDetails))
								<?php
						$rating = $categoryDetails->rating;
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
										<h1 title="<?php  if (!empty($categoryDetails->name)) { $key = $categoryDetails->name;
							echo trim($key); } ?>"><?php  if (!empty($categoryDetails->name)) { $key = $categoryDetails->name;
							echo trim($key); } ?></h1>
									</div>
									<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
										<img loading="lazy" itemprop="image" src="{{ asset('site/' . $stars) }}"
											alt="5 Star Rating: Very Good" />
										<span itemprop="ratingValue"><?php if (!empty($categoryDetails->rating)) {
							echo number_format((float) $categoryDetails->rating, 1, '.', '');
						} else {
							echo "1.0";
						} ?></span> out of <span itemprop="bestRating"></span>based on <span itemprop="ratingCount">{{$categoryDetails->total_rating }}</span> ratings
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
                <div class="section-title mb-1-9 mb-md-6 text-center wow fadeInUp" data-wow-delay="200ms">
					
                    <span class="sm-title">Sevice</span>
					
                    <h2 class="mb-0 h1">We Provide The Best Services</h2>
					<p>{{$categoryDetails->subTital}}</p>
                </div>
                <div class="row mt-n2-9">
			
				
				<?php
				if($services){ 
					foreach($services as $service){				 
						
				?>	
                    <div class="col-md-6 col-xl-4 mt-2-9 wow fadeInUp" data-wow-delay="200ms">
                        <div class="card-style-02 h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="card-icon">
									<?php if(!empty($service->image)){
									$vicons= unserialize($service->image);   
									?>
									<img src="<?php echo asset('/'.$vicons['image']['src']); ?>" alt="">
									<?php  }else{  ?>
									<img src="{{asset('site/img/icons/01.png')}}" alt="...">

									<?php  } ?>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ms-lg-4">
                                    <h3 class="h5 mb-3"><a href="{{url('services/'.$categoryDetails->slug.'/'.$service->service_slug)}}"><?php echo $service->name; ?> </a></h3>
                                  
                                    <a href="{{url('services/'.$categoryDetails->slug.'/'.$service->service_slug)}}"> {{$service->meta_title}}<i class="ti-arrow-right align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php  } } ?>	
                    
                </div>
            </div>
        </section>
		
		
		@php
$paragraphs = [];
for ($n = 1; $n <= 5; $n++) {
    $p = $categoryDetails->{'paragraph' . $n} ?? null;
    if ($p) $paragraphs[] = $p;
}

// Parse bullet points from about field (each line = one point)
$bullets = [];
if (!empty($categoryDetails->about)) {
    $bullets = array_filter(
        array_map('trim', explode("\n", $categoryDetails->about))
    );
}
@endphp

<section class="bg-white rounded-xl shadow-sm p-6 md:p-8">

    {{-- Heading --}}
    @if(!empty($categoryDetails->about_heading))
    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-blue-900 leading-tight">
        {{ $categoryDetails->about_heading }}
    </h2>
    <div class="w-24 h-1 bg-teal-500 rounded-full mt-4 mb-6"></div>
    @endif

 {{-- Bullet Points from about field --}}
    @if(count($bullets) > 0)
    <div class="grid md:grid-cols-2 gap-4 mt-2">
        @foreach($bullets as $bullet)
        <div class="flex items-start gap-3">
            <span class="text-green-600 text-lg flex-shrink-0">✓</span>
            <span class="text-gray-700">{{ $bullet }}</span>
        </div>
        @endforeach
    </div>
    @endif
    {{-- Paragraphs --}}
    @foreach($paragraphs as $para)
    <p class="text-gray-700 text-base md:text-lg leading-8 mb-6">
        {{ $para }}
    </p>
    @endforeach

   

</section>
		
		
		
		 
 

    
     @php
$faqs = [];
for ($n = 1; $n <= 5; $n++) {
    $q = $categoryDetails->{'faqq' . $n} ?? null;
    $a = $categoryDetails->{'faqa' . $n} ?? null;
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



 
        <section class="jarallax dark-overlay" data-overlay-dark="65" style="background-image: url(img/content/vide-bg-img.jpg);" data-jarallax data-speed="0.8" data-video-src="https://www.youtube.com/watch?v=pDWUf_g2zsc">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-xl-11 wow fadeIn" data-wow-delay="200ms">
                        <h2 class="mb-1-9 display-13 display-sm-8 display-md-6 display-lg-3 text-white">Mission is to Growth Your Business & More</h2>
                        <a href="{{url('contact-us')}}" class="btn-style1 white-border"><span>Contact Us</span></a>
                    </div>
                </div>
            </div>
        </section>
		
		
		
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
	@endsection