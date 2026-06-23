@extends('site.layouts.app')
@section('title', $blogDetails['meta_title'] ?? '')
@section('description', $blogDetails['meta_description'] ?? '')
@section('keywords', $blogDetails['meta_keywords'] ?? '')
@section('content')

{{-- ═══════════════════════════════
     SCROLL PROGRESS BAR
════════════════════════════════ --}}
<div id="scroll-progress"></div>

{{-- ═══════════════════════════════
     BREADCRUMB
════════════════════════════════ --}}
<div class="bg-white border-bottom">
    <div class="container py-3 d-flex align-items-center breadcrumb-trail small">
        <a href="{{ route('home') }}" class="breadcrumb-link font-weight-medium">Home</a>
        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" class="mx-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
        <a href="{{ route('blog.list') }}" class="breadcrumb-link">{{ $blogDetails['name'] ?? 'Blog' }}</a>
        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" class="mx-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-truncate breadcrumb-current">{{ $blogDetails['title'] ?? '' }}</span>
    </div>
</div>

{{-- ═══════════════════════════════
     LIVE TICKER
════════════════════════════════ --}}
@if(count($tickerItems))
<div class="ticker-bar d-flex align-items-center py-2">
    <div class="ticker-live-badge ml-4">
        <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24" class="mr-1">
            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
        </svg>
        Live
    </div>
    <div class="ticker-viewport flex-grow-1">
        <div class="ticker-track">
            @foreach([$tickerItems, $tickerItems] as $group)
                @foreach($group as $item)
                <span class="ticker-item">
                    <span class="ticker-dot">•</span>
                    <a href="{{ route('blog.details', $item['slug']) }}" class="ticker-link">{{ $item['title'] ?? '' }}</a>
                </span>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- ═══════════════════════════════
     MAIN CONTENT
════════════════════════════════ --}}
<main class="container py-5">
    <div class="row">

        {{-- ══════════════════════════════════════
             ARTICLE
        ══════════════════════════════════════ --}}
        <article class="col-lg-8">

            {{-- ── HERO IMAGE ── --}}
            @php
                $vicons = null;
                if (isset($blogDetails) && !empty($blogDetails->image_banner)) {
                    $vicons = json_decode($blogDetails->image_banner);
                }
                $heroStyle = !empty($vicons->image_banner->src)
                    ? "background-image: url('" . asset($vicons->image_banner->src) . "'); background-size: cover; background-position: center;"
                    : 'background: linear-gradient(135deg,#1e3a5f 0%,#2563eb 50%,#0891b2 100%);';
            @endphp
            <div id="hero-card" class="reveal hero-card mb-5">
                <div class="hero-thumb" style="{{ $heroStyle }}">

                    @if(empty($vicons->image_banner->src))
                    <div class="hero-thumb-letter">
                        <span>{{ strtoupper(substr($blogDetails['name'] ?? 'Q', 0, 1)) }}</span>
                    </div>
                    @endif

                    <div class="hero-overlay"></div>

                    <div class="hero-badge">
                        <span>{{ $blogDetails['title'] ?? '' }}</span>
                    </div>
                </div>
            </div>

            {{-- ── TITLE & META ── --}}
            <div class="reveal mb-5" style="transition-delay:0.1s;">
                <h1 class="article-h1 mb-4">{{ $blogDetails['title'] ?? '' }}</h1>

                <div class="d-flex flex-wrap align-items-center meta-row mb-4" style="gap: 1rem;">
                    {{-- Author --}}
                    @if(!empty($blogDetails['author_name']))
                    <div class="d-flex align-items-center" style="gap: 0.5rem;">
                        <div class="author-avatar" style="background: {{ $authorColor }};">
                            {{ strtoupper(substr($blogDetails['author_name'], 0, 1)) }}
                        </div>
                        <p class="author-name mb-0">{{ $blogDetails['author_name'] }}</p>
                    </div>
                    <span class="meta-divider d-none d-sm-block"></span>
                    @endif

                    {{-- Date --}}
                    <span class="d-flex align-items-center">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-2">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        {{ !empty($blogDetails['created_at']) ? date('d M, Y', strtotime($blogDetails['created_at'])) : '' }}
                    </span>

                    {{-- Read time --}}
                    @php
                        $wordCount = str_word_count(strip_tags(
                            ($blogDetails['blog_description'] ?? '') .
                            ' ' . ($blogDetails['top_content'] ?? '') .
                            ' ' . ($blogDetails['bottom_content'] ?? '')
                        ));
                        $readMinutes = max(1, (int) ceil($wordCount / 200));
                    @endphp
                    <span class="d-flex align-items-center">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-2">
                            <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                        </svg>
                        {{ $readMinutes }} min read
                    </span>

                    {{-- Views --}}
                    <span class="d-flex align-items-center">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <span id="view-count">—</span>&nbsp;views
                    </span>
                </div>

                {{-- Share & Bookmark bar --}}
                <div class="d-flex align-items-center justify-content-between py-3 share-bar">
                    <div class="d-flex align-items-center" style="gap: 0.5rem;">
                        <span class="small share-label mr-1">Share:</span>
                        <button id="copy-btn" class="icon-btn" title="Copy Link">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/>
                                <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/>
                            </svg>
                            <span id="copy-tooltip">Copied!</span>
                        </button>
                    </div>

                    <button id="bookmark-btn" class="bookmark-btn">
                        <svg id="bookmark-icon" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-2">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z"/>
                        </svg>
                        <span id="bookmark-label">Save</span>
                    </button>
                </div>
            </div>

            {{-- ── ABOUT BLOG SECTION ── --}}
            @if(!empty($blogDetails['about_heading']) && !empty($blogDetails['about_blog']))
            <div class="reveal mb-5" style="transition-delay:0.15s;">
                <div class="about-blog-card">
                    <h2 class="about-blog-heading">{{ $blogDetails['about_heading'] }}</h2>
                    <div class="about-blog-rule"></div>
                    <p class="about-blog-text mb-4">{{ $blogDetails['about_blog'] }}</p>

                    @if(count($paragraphs))
                    <ul class="list-unstyled about-blog-list mb-0">
                        @foreach($paragraphs as $para)
                        <li class="d-flex align-items-start mb-2">
                            <span class="check-mark mr-2">✔</span>
                            <span>{{ $para }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            @endif

            {{-- ── ARTICLE BODY ── --}}
            <div class="prose-article">

                @if(!empty($blogDetails['heading']))
                <h2 class="reveal-x section-heading">
                    <span class="heading-bar mr-3"></span>
                    {{ $blogDetails['heading'] }}
                </h2>
                @endif

                @if(!empty($blogDetails['blog_description']))
                <div class="reveal" style="transition-delay:0.05s;">
                    {!! $blogDetails['blog_description'] !!}
                </div>
                @endif

                @if(!empty($blogDetails['top_content']))
                <h2>{{ $blogDetails['top_heading'] ?? '' }}</h2>
                <div class="reveal" style="transition-delay:0.1s;">
                    {!! $blogDetails['top_content'] !!}
                </div>
                @endif

                @if(!empty($blogDetails['bottom_content']))
                <div class="reveal" style="transition-delay:0.15s;">
                    <h2>{{ $blogDetails['bottom_heading'] ?? '' }}</h2>
                    {!! $blogDetails['bottom_content'] !!}
                </div>
                @endif

            </div>

            {{-- ── FAQ ── --}}
            @if(count($faqs))
            <div class="reveal faq-card mt-5">
                <h2 class="faq-card-title">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-2">
                        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                    </svg>
                    Frequently Asked Questions — {{ $blogDetails['name'] ?? '' }}
                </h2>
                <div id="faq-list">
                    @foreach($faqs as $faqIndex => $faq)
                    <div class="faq-item">
                        <button class="faq-trigger" data-index="{{ $faqIndex }}">
                            <span>{{ $faq['q'] }}</span>
                            <svg class="faq-chevron" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="faq-body">
                            <div class="faq-answer prose-article">
                                {!! $faq['a'] !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif


              <div class="prose-article">

          
                <h2 class="reveal-x section-heading">
                    <span class="heading-bar mr-3"></span>
                 Conclusion
                </h2>
           

                @if(!empty($blogDetails['conclusion']))
                <div class="reveal" style="transition-delay:0.05s;">
                    {!! $blogDetails['conclusion'] !!}
                </div>
                @endif

                </div>
            {{-- ── TAGS ── --}}
            @if(count($blogList))
            <div class="reveal mt-5 pt-4 tags-row">
                <div class="d-flex align-items-center flex-wrap" style="gap: 0.5rem;">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-primary mr-1">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
                        <line x1="7" y1="7" x2="7.01" y2="7"/>
                    </svg>
                    @foreach($blogList as $tag)
                        @if(!empty($tag['title']))
                        <span class="tag-chip">{{ $tag['title'] }}</span>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif

            {{-- ── AUTHOR CARD ── --}}
            @if(!empty($blogDetails['author_name']))
            <div class="reveal author-card mt-5 d-flex">
                <div class="author-avatar-lg mr-4" style="background: {{ $authorColor }};">
                    {{ strtoupper(substr($blogDetails['author_name'], 0, 1)) }}
                </div>
                <div>
                    <p class="author-card-label mb-1">Written by</p>
                    <h3 class="author-card-name mb-2">{{ $blogDetails['author_name'] }}</h3>
                    <p class="author-card-bio mb-0">
                        A seasoned expert in {{ $blogDetails['name'] ?? 'technology' }} with extensive
                        hands-on experience helping professionals upskill, certify, and advance their
                        careers in tech and enterprise systems.
                    </p>
                </div>
            </div>
            @endif

            {{-- ── BACK TO BLOG ── --}}
            <div class="reveal mt-5">
                <a href="{{ route('blog.list') }}" class="back-link">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                    Back to all articles
                </a>
            </div>

        </article>

        {{-- ══════════════════════════════════════
             SIDEBAR
        ══════════════════════════════════════ --}}
        <aside class="col-lg-4">
            <div class="sidebar-sticky">

                {{-- ── TABLE OF CONTENTS / CATEGORIES ── --}}
                @if(!empty($categories) && $categories->isNotEmpty())
                <div class="reveal-right sidebar-card mb-4">
                    <h4 class="sidebar-card-title">
                        <span class="title-dash mr-2"></span>
                        In this article
                    </h4>
                    <ul class="list-unstyled toc-list mb-0">
                        @foreach($categories as $i => $tocItem)
                        <li>
                            <a href="{{ url('blog/category/'.$tocItem->name) }}" class="toc-link">
                                <span class="d-flex align-items-center">
                                    <span class="toc-dot mr-2"></span>
                                    {{ ucwords(str_replace('-', ' ', $tocItem->name)) }}
                                </span>
                                <span class="toc-count">{{ $tocItem->count }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- ── RELATED ARTICLES ── --}}
                @if(count($blogList))
                <div class="reveal-right sidebar-card mb-4" style="transition-delay:0.1s;">
                    <h4 class="sidebar-card-title">
                        <span class="title-dash mr-2"></span>
                        Related Articles
                    </h4>
                    <div class="related-list">
                        @foreach($blogList as $i => $rel)
                        @php
                            $relGrads = [
                                'linear-gradient(135deg,#1e3a5f,#2563eb)',
                                'linear-gradient(135deg,#14532d,#16a34a)',
                                'linear-gradient(135deg,#4c1d95,#7c3aed)',
                                'linear-gradient(135deg,#7c2d12,#ea580c)',
                                'linear-gradient(135deg,#064e3b,#0f766e)',
                                'linear-gradient(135deg,#581c87,#a21caf)',
                            ];
                            $rg = $relGrads[$i % count($relGrads)];
                        @endphp
                        <div class="related-item">
                            <a href="{{ route('blog.details', $rel['slug']) }}" class="d-flex align-items-start">
                                <div class="related-thumb mr-3 img-zoom-wrap">
                                    @if(!empty($rel['img']))
                                        <div class="img-inner" style="background-image: url('{{ $rel['img'] }}');"></div>
                                    @else
                                        <div class="img-inner related-thumb-fallback" style="background: {{ $rg }};">
                                            <span>{{ strtoupper(substr($rel['name'] ?? 'Q', 0, 1)) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1 min-w-0">
                                    <p class="related-title mb-0 pl-10">{{ $rel['title'] ?? '' }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- ── NEWSLETTER ── --}}
                <div class="reveal-right newsletter-card mb-4" style="transition-delay:0.2s;">
                    <div class="newsletter-content">
                        <h4 class="newsletter-title">Never Miss a Post</h4>
                        <p class="newsletter-subtext">Join 15,000+ professionals getting weekly tech insights.</p>
                        <form id="newsletter-form">
                            <input type="email" placeholder="Your email" class="newsletter-input mb-2">
                            <button type="submit" class="newsletter-btn btn btn-block">Subscribe Free</button>
                        </form>
                    </div>
                </div>

                {{-- ── SHARE SIDEBAR ── --}}
                <div class="reveal-right sidebar-card" style="transition-delay:0.3s;">
                    <h4 class="sidebar-card-title">
                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-primary mr-2">
                            <circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/>
                            <circle cx="18" cy="19" r="3"/>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                        </svg>
                        Share this post
                    </h4>
                    <button id="copy-btn-sidebar" class="icon-btn" title="Copy Link">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/>
                            <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/>
                        </svg>
                    </button>
                </div>

            </div>
        </aside>

    </div>
</main>

<script>
(function () {

    /* ── Scroll Progress Bar ── */
    var bar = document.getElementById('scroll-progress');
    window.addEventListener('scroll', function () {
        var pct = window.scrollY / (document.documentElement.scrollHeight - window.innerHeight) || 0;
        bar.style.transform = 'scaleX(' + pct + ')';
    }, { passive: true });

    /* ── Random stable view count ── */
    var vc = document.getElementById('view-count');
    if (vc) vc.textContent = (Math.floor(Math.random() * 8000) + 1200).toLocaleString();

    /* ── IntersectionObserver — reveal on scroll ── */
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal, .reveal-x, .reveal-right').forEach(function (el) {
        observer.observe(el);
    });

    /* ── Hero Tilt (mouse parallax) ── */
    var hero = document.getElementById('hero-card');
    if (hero) {
        hero.addEventListener('mousemove', function (e) {
            var r = hero.getBoundingClientRect();
            var nx = (e.clientX - r.left) / r.width - 0.5;
            var ny = (e.clientY - r.top) / r.height - 0.5;
            hero.style.transform = 'perspective(1200px) rotateY(' + (nx * 6) + 'deg) rotateX(' + (-ny * 6) + 'deg)';
        });
        hero.addEventListener('mouseleave', function () {
            hero.style.transform = 'perspective(1200px) rotateY(0deg) rotateX(0deg)';
        });
    }

    /* ── FAQ Accordion ── */
    document.querySelectorAll('.faq-trigger').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var item = btn.closest('.faq-item');
            var body = item.querySelector('.faq-body');
            var chevron = item.querySelector('.faq-chevron');
            var isOpen = body.classList.contains('open');

            document.querySelectorAll('.faq-body').forEach(function (b) { b.classList.remove('open'); });
            document.querySelectorAll('.faq-chevron').forEach(function (c) { c.style.transform = ''; });

            if (!isOpen) {
                body.classList.add('open');
                chevron.style.transform = 'rotate(180deg)';
            }
        });
    });

    /* ── Copy Link ── */
    function copyLink(btn) {
        navigator.clipboard.writeText(window.location.href).catch(function () {});
        btn.classList.add('copied');
        setTimeout(function () { btn.classList.remove('copied'); }, 2000);
    }

    var copyBtn = document.getElementById('copy-btn');
    var tooltip = document.getElementById('copy-tooltip');
    if (copyBtn && tooltip) {
        copyBtn.addEventListener('click', function () {
            navigator.clipboard.writeText(window.location.href).catch(function () {});
            tooltip.classList.add('show');
            setTimeout(function () { tooltip.classList.remove('show'); }, 2000);
        });
    }

    var copySide = document.getElementById('copy-btn-sidebar');
    if (copySide) copySide.addEventListener('click', function () { copyLink(copySide); });

    /* ── Bookmark Toggle ── */
    var bookmarkBtn = document.getElementById('bookmark-btn');
    var bookmarkIcon = document.getElementById('bookmark-icon');
    var bookmarkLabel = document.getElementById('bookmark-label');

    if (bookmarkBtn) {
        var saved = false;
        bookmarkBtn.addEventListener('click', function () {
            saved = !saved;
            bookmarkBtn.classList.toggle('saved', saved);
            bookmarkLabel.textContent = saved ? 'Saved' : 'Save';
            bookmarkIcon.setAttribute('fill', saved ? 'white' : 'none');
        });
    }

    /* ── Newsletter form ── */
    var newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var btn = newsletterForm.querySelector('button[type="submit"]');
            var input = newsletterForm.querySelector('input[type="email"]');
            if (!input.value) return;
            btn.textContent = '✓ Subscribed!';
            btn.disabled = true;
            input.value = '';
        });
    }

})();
</script>



 
<style>
:root {
    --primary: #1e3a5f;
    --accent: #2563eb;
    --border: #e2e8f0;
    --muted: #64748b;
}
.pl-10{
    margin-left: 10px;
}
#scroll-progress {
    position: fixed; top: 0; left: 0; right: 0; height: 3px;
    background: var(--accent); transform-origin: left; transform: scaleX(0);
    z-index: 9999; transition: transform 0.08s linear; border-radius: 0 2px 2px 0;
}

/* ══════════ BREADCRUMB ══════════ */
.breadcrumb-trail { color: #9ca3af; }
.breadcrumb-link { color: #9ca3af; text-decoration: none; font-weight: 500; transition: color 0.15s ease; }
.breadcrumb-link:hover { color: #2563eb; text-decoration: none; }
.breadcrumb-current { color: #4b5563; max-width: 280px; display: inline-block; }

/* ══════════ TICKER ══════════ */
.ticker-bar { background: #1e3a8a; color: #fff; overflow: hidden; }
.ticker-live-badge {
    flex-shrink: 0; display: inline-flex; align-items: center;
    background: #3b82f6; color: #fff; padding: 0.25rem 0.75rem; border-radius: 2px;
    font-weight: 700; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.08em;
}
.ticker-viewport { overflow: hidden; }
.ticker-track { display: inline-block; white-space: nowrap; animation: ticker-scroll 28s linear infinite; will-change: transform; }
@keyframes ticker-scroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
@media (prefers-reduced-motion: reduce) { .ticker-track { animation: none; } }
.ticker-item { display: inline-flex; align-items: center; margin-right: 3rem; font-size: 0.75rem; font-weight: 500; }
.ticker-dot { color: #60a5fa; margin-right: 0.5rem; }
.ticker-link { color: #fff; text-decoration: none; transition: color 0.15s ease; }
.ticker-link:hover { color: #93c5fd; text-decoration: none; }

/* ══════════ REVEAL ══════════ */
.reveal { opacity: 0; transform: translateY(20px); transition: opacity 0.5s cubic-bezier(0.22,1,0.36,1), transform 0.5s cubic-bezier(0.22,1,0.36,1); }
.reveal.visible { opacity: 1; transform: translateY(0); }
.reveal-x { opacity: 0; transform: translateX(-16px); transition: opacity 0.4s ease, transform 0.4s ease; }
.reveal-x.visible { opacity: 1; transform: translateX(0); }
.reveal-right { opacity: 0; transform: translateX(20px); transition: opacity 0.5s ease, transform 0.5s ease; }
.reveal-right.visible { opacity: 1; transform: translateX(0); }

/* ══════════ HERO ══════════ */
.hero-card {
    border-radius: 1rem; overflow: hidden; box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    transition: transform 0.12s ease, box-shadow 0.3s ease; will-change: transform;
}
.hero-card:hover { box-shadow: 0 24px 60px rgba(37,99,235,0.18); }
.hero-thumb { position: relative; width: 100%; padding-top: 43.75%; /* ~16:7 */ background-size: cover; background-position: center; }
.hero-thumb-letter { position: absolute; top:0; left:0; right:0; bottom:0; display: flex; align-items: center; justify-content: center; }
.hero-thumb-letter span { color: rgba(255,255,255,0.2); font-weight: 900; font-size: clamp(6rem, 18vw, 14rem); line-height: 1; }
.hero-overlay { position: absolute; top:0; left:0; right:0; bottom:0; background: linear-gradient(to top, rgba(0,0,0,0.5), transparent 60%); }
.hero-badge { position: absolute; bottom: 1.5rem; left: 1.5rem; }
.hero-badge span {
    display: inline-flex; background: #3b82f6; color: #fff; font-size: 0.7rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 0.05em; padding: 0.25rem 0.75rem; border-radius: 9999px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

/* ══════════ TITLE & META ══════════ */
.article-h1 { font-size: 2rem; font-weight: 700; color: #0f172a; line-height: 1.25; }
@media (min-width: 992px) { .article-h1 { font-size: 2.5rem; } }
.meta-row { color: #9ca3af; font-size: 0.875rem; }
.author-avatar {
    width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
    color: #fff; font-weight: 700; font-size: 0.875rem; flex-shrink: 0;
}
.author-name { color: #1e293b; font-weight: 600; font-size: 0.875rem; }
.meta-divider { width: 1px; height: 2rem; background: #e5e7eb; }

.share-bar { border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb; }
.share-label { color: #9ca3af; }
.icon-btn {
    width: 36px; height: 36px; border-radius: 50%; background: #f3f4f6; border: 1px solid #e5e7eb;
    display: inline-flex; align-items: center; justify-content: center; position: relative;
    color: #374151; transition: background 0.2s ease, color 0.2s ease;
}
.icon-btn:hover, .icon-btn.copied { background: #2563eb; color: #fff; border-color: #2563eb; }
#copy-tooltip {
    position: absolute; bottom: calc(100% + 6px); left: 50%; transform: translateX(-50%);
    background: #1e293b; color: #fff; font-size: 10px; padding: 3px 8px; border-radius: 4px;
    white-space: nowrap; pointer-events: none; opacity: 0; transition: opacity 0.2s;
}
#copy-tooltip.show { opacity: 1; }

.bookmark-btn {
    display: inline-flex; align-items: center; font-size: 0.75rem; font-weight: 600;
    padding: 0.375rem 0.875rem; border-radius: 9999px; border: 1px solid #e5e7eb;
    color: #9ca3af; background: #fff; transition: border-color 0.2s ease, color 0.2s ease;
}
.bookmark-btn:hover { border-color: #3b82f6; color: #2563eb; }
.bookmark-btn.saved { background: var(--accent); color: #fff; border-color: var(--accent); }

/* ══════════ ABOUT BLOG ══════════ */
.about-blog-card { background: #f3f4f6; border: 1px solid #e5e7eb; border-radius: 0.5rem; padding: 1.5rem; }
.about-blog-heading { font-size: 1.5rem; font-weight: 600; color: #1e3a8a; }
@media (min-width: 768px) { .about-blog-heading { font-size: 1.75rem; } }
.about-blog-rule { width: 100%; height: 2px; background: #14b8a6; margin: 0.75rem 0 1.25rem; }
.about-blog-text { color: #1f2937; line-height: 1.7; }
.about-blog-list li { color: #1f2937; }
.check-mark { color: #f97316; }

/* ══════════ PROSE / SECTION HEADING ══════════ */
.section-heading { display: flex; align-items: center; font-size: 1.25rem; font-weight: 700; color: #0f172a; margin: 2.5rem 0 1rem; }
.heading-bar { width: 4px; height: 1.5rem; background: #3b82f6; border-radius: 9999px; display: inline-block; flex-shrink: 0; }

.prose-article { color: #374151; line-height: 1.8; font-size: 1.05rem; }
.prose-article h1, .prose-article h2, .prose-article h3 { color: var(--primary); font-weight: 700; margin: 2rem 0 1rem; }
.prose-article h2 { font-size: 1.35rem; }
.prose-article h3 { font-size: 1.15rem; }
.prose-article p { margin-bottom: 1.25rem; }
.prose-article ul { list-style: disc; padding-left: 1.5rem; margin-bottom: 1.25rem; }
.prose-article ol { list-style: decimal; padding-left: 1.5rem; margin-bottom: 1.25rem; }
.prose-article li { margin-bottom: 0.4rem; }
.prose-article a { color: var(--accent); text-decoration: underline; }
.prose-article strong { color: var(--primary); }
.prose-article table { width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; font-size: 0.9rem; }
.prose-article th { background: #f1f5f9; padding: 0.6rem 0.8rem; text-align: left; font-weight: 600; border: 1px solid var(--border); }
.prose-article td { padding: 0.6rem 0.8rem; border: 1px solid var(--border); }
.prose-article blockquote { border-left: 4px solid var(--accent); padding-left: 1rem; color: var(--muted); font-style: italic; margin: 1.5rem 0; }

/* ══════════ FAQ ══════════ */
.faq-card { background: #fff; border: 1px solid #f1f5f9; border-radius: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding: 1.5rem; }
.faq-card-title { display: flex; align-items: center; font-size: 1.125rem; font-weight: 700; color: #111827; margin-bottom: 1rem; }
.faq-card-title svg { color: #2563eb; }
.faq-item { border: 1px solid #f3f4f6; border-radius: 0.75rem; overflow: hidden; margin-bottom: 0.5rem; }
.faq-trigger {
    width: 100%; display: flex; align-items: center; justify-content: space-between;
    padding: 0.75rem 1rem; text-align: left; font-size: 0.875rem; font-weight: 500; color: #1f2937;
    background: #fff; border: none; cursor: pointer; transition: background 0.15s ease;
}
.faq-trigger:hover { background: #f9fafb; }
.faq-chevron { color: #9ca3af; flex-shrink: 0; transition: transform 0.3s ease; }
.faq-body { max-height: 0; overflow: hidden; transition: max-height 0.35s ease; }
.faq-body.open { max-height: 600px; }
.faq-answer { padding: 0.75rem 1rem 1rem; font-size: 0.8rem; color: #6b7280; border-top: 1px solid #f3f4f6; }

/* ══════════ TAGS ══════════ */
.tags-row { border-top: 1px solid #e5e7eb; }
.tag-chip {
    display: inline-block; padding: 0.375rem 0.75rem; background: #f3f4f6; color: #6b7280;
    font-size: 0.75rem; font-weight: 500; border-radius: 9999px; border: 1px solid #e5e7eb; cursor: pointer;
    transition: transform 0.2s cubic-bezier(0.34,1.56,0.64,1), background 0.2s ease, color 0.2s ease;
}
.tag-chip:hover { transform: scale(1.08) translateY(-2px); background: var(--accent) !important; color: #fff !important; border-color: var(--accent) !important; }

/* ══════════ AUTHOR CARD ══════════ */
.author-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: box-shadow 0.3s ease; }
.author-card:hover { box-shadow: 0 8px 36px rgba(37,99,235,0.12), 0 0 0 1px rgba(37,99,235,0.07); }
.author-avatar-lg { width: 64px; height: 64px; min-width: 64px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 1.25rem; }
.author-card-label { font-size: 0.7rem; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600; }
.author-card-name { font-size: 1.125rem; font-weight: 700; color: #0f172a; }
.author-card-bio { font-size: 0.875rem; color: #6b7280; line-height: 1.6; }

/* ══════════ BACK LINK ══════════ */
.back-link { display: inline-flex; align-items: center; color: #2563eb; font-weight: 600; text-decoration: none; transition: transform 0.2s ease; }
.back-link:hover { text-decoration: underline; color: #2563eb; transform: translateX(-4px); }

/* ══════════ SIDEBAR ══════════ */
.sidebar-sticky { position: sticky; top: 1.5rem; max-height: calc(100vh - 3rem); overflow-y: auto; padding-right: 0.25rem; }
.sidebar-sticky::-webkit-scrollbar { width: 4px; }
.sidebar-sticky::-webkit-scrollbar-track { background: transparent; }
.sidebar-sticky::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }

.sidebar-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1.25rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
.sidebar-card-title { display: flex; align-items: center; font-size: 0.875rem; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 1rem; }
.title-dash { width: 4px; height: 1rem; background: #3b82f6; border-radius: 9999px; display: inline-block; }

.toc-list li { list-style: none; }
.toc-link { display: flex; align-items: center; justify-content: space-between; padding: 0.5rem 0; font-size: 0.875rem; color: #64748b; text-decoration: none; transition: color 0.15s ease; }
.toc-link:hover { color: #2563eb; text-decoration: none; }
.toc-dot { width: 6px; height: 6px; border-radius: 50%; background: #93c5fd; flex-shrink: 0; transition: background 0.15s ease; }
.toc-link:hover .toc-dot { background: #3b82f6; }
.toc-count { background: #f1f5f9; color: #64748b; border-radius: 0.375rem; padding: 0.125rem 0.5rem; font-size: 0.75rem; font-weight: 500; }

.related-item { transition: transform 0.2s ease; margin-bottom: 1rem; }
.related-item:last-child { margin-bottom: 0; }
.related-item:hover { transform: translateX(4px); }
.related-thumb { width: 64px; height: 64px; min-width: 64px; border-radius: 0.5rem; overflow: hidden; }
.img-zoom-wrap { overflow: hidden; }
.img-inner { width: 100%; height: 100%; background-size: cover; background-position: center; transition: transform 0.5s cubic-bezier(0.22,1,0.36,1); }
.related-item:hover .img-inner { transform: scale(1.05); }
.related-thumb-fallback { display: flex; align-items: center; justify-content: center; }
.related-thumb-fallback span { color: rgba(255,255,255,0.25); font-size: 1.5rem; font-weight: 900; }
.related-title {
    font-size: 0.875rem; font-weight: 600; color: #0f172a; line-height: 1.35; transition: color 0.15s ease;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.related-item:hover .related-title { color: #2563eb; }

/* ══════════ NEWSLETTER ══════════ */
.newsletter-card { background: linear-gradient(135deg, #1e3a5f 0%, #1d4ed8 60%, #0891b2 100%); border-radius: 0.75rem; box-shadow: 0 4px 14px rgba(0,0,0,0.12); padding: 1.25rem; color: #fff; position: relative; overflow: hidden; }
.newsletter-card::before {
    content: ''; position: absolute; top: -40px; right: -40px; width: 120px; height: 120px;
    background: rgba(37,99,235,0.3); border-radius: 50%; filter: blur(30px); animation: blob-pulse 6s ease-in-out infinite;
}
@keyframes blob-pulse { 0%, 100% { transform: scale(1); opacity: 0.15; } 50% { transform: scale(1.5); opacity: 0.28; } }
.newsletter-content { position: relative; z-index: 1; }
.newsletter-title { font-size: 1rem; font-weight: 700; margin-bottom: 0.25rem; }
.newsletter-subtext { color: rgba(255,255,255,0.7); font-size: 0.75rem; margin-bottom: 1rem; line-height: 1.5; }
.newsletter-input {
    width: 100%; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: #fff;
    border-radius: 0.5rem; padding: 0.5rem 0.75rem; font-size: 0.875rem; outline: none;
}
.newsletter-input::placeholder { color: rgba(255,255,255,0.4); }
.newsletter-input:focus { border-color: #60a5fa; box-shadow: 0 0 0 2px rgba(96,165,250,0.3); background: rgba(255,255,255,0.1); color: #fff; }
.newsletter-btn { background: #3b82f6; color: #fff; font-weight: 600; padding: 0.5rem; border-radius: 0.5rem; font-size: 0.875rem; border: none; transition: transform 0.15s ease, background 0.2s ease; }
.newsletter-btn:hover { background: #60a5fa; color: #fff; transform: scale(1.02); }
</style>
 @endsection