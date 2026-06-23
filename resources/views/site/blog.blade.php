@extends('site.layouts.app')
@section('title', 'Blog | QuickDials - Business, Education & Local Service Insights')
@section('description', 'Explore the QuickDials blog for the latest updates, business tips, education guides, career advice, local service insights, digital marketing trends, technology news, and helpful articles to grow your business and stay informed.')
@section('keywords', 'QuickDials blog, business blog India, local business tips, education articles, career guidance, digital marketing tips, technology news, startup tips, local services blog, IT training guides, business growth strategies, online business directory blog, QuickDials articles')
@section('content')
 

{{-- ═══════════════════════════════
     SCROLL PROGRESS BAR
════════════════════════════════ --}}
<div id="scroll-progress"></div>

{{-- ═══════════════════════════════
     LIVE TICKER
════════════════════════════════ --}}
@if(count($tickerArticles))
<div class="ticker-bar d-flex align-items-center py-2">
    <div class="ticker-live-badge ml-4">
        <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24" class="mr-1">
            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
        </svg>
        Live
    </div>
    <div class="ticker-viewport flex-grow-1">
        <div class="ticker-track">
            @foreach([$tickerArticles, $tickerArticles] as $group)
                @foreach($group as $item)
                <span class="ticker-item">
                    <span class="ticker-dot">•</span>
                    <a href="{{ route('blog.details', $item['slug']) }}" class="ticker-link">
                        {{ $item['title'] ?? '' }}
                    </a>
                </span>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- ═══════════════════════════════
     MAIN LAYOUT
════════════════════════════════ --}}
<main class="container py-4 py-lg-5">

    <div class="text-center mx-auto mb-4" style="max-width: 720px;">
        <h1 id="rotating-heading" class="h4 h-md-3 page-heading">
            What Would You Like to Learn Today?
        </h1>
    </div>

    <div class="row">

        {{-- ══════════════════════════════════════
             SIDEBAR — shows first on mobile in source order for SEO,
             visually reordered to the right on desktop via order classes
        ══════════════════════════════════════ --}}
        <aside class="col-lg-4 order-lg-1 mb-4">
            <div class="sidebar-sticky">

                {{-- ── CATEGORIES ── --}}
                <div class="sidebar-reveal sidebar-card mb-4">
                    <h4 class="sidebar-card-title">Topics</h4>
                    <ul class="list-unstyled topic-list mb-0">
                        @if($categories)
                        @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('category.blog',$cat->name) }}" class="topic-link">
                                <span class="d-flex align-items-center">
                                    <span class="topic-dot mr-2"></span>
                                    {{ ucfirst(str_replace('-', ' ', $cat['name'])) }}
                                </span>
                                <span class="topic-count">{{ $cat['count'] }}</span>
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>

                {{-- ── POPULAR POSTS ── --}}
                @if(!empty($popularArticles))
                <div class="sidebar-reveal sidebar-card mb-4" style="transition-delay: 0.12s;">
                    <h4 class="sidebar-card-title">Popular Reads</h4>
                    <div class="popular-list">
                        @foreach($popularArticles as $i => $article)
                        @php
                            $popGrads = [
                                'linear-gradient(135deg,#1e3a5f,#2563eb)',
                                'linear-gradient(135deg,#14532d,#16a34a)',
                                'linear-gradient(135deg,#4c1d95,#7c3aed)',
                            ];
                            $pg = $popGrads[$i % count($popGrads)];
                        @endphp
                        <div class="popular-item">
                            <a href="{{ route('blog.details', $article['slug']) }}" class="d-flex align-items-center popular-link">
                                <div class="popular-thumb mr-3">
                                       @php
                                    $blog_image = null;
                                    if (isset($article) && !empty($article->blog_image)) {
                                        $blog_image = json_decode($article->blog_image);
                                    }
                                    @endphp
                                    @if(!empty($blog_image))
                                        <div class="popular-thumb-img" style="background-image: url('{{ $blog_image->blog_image->src }}');"></div>
                                    @else
                                        <div class="popular-thumb-fallback" style="background: {{ $pg }};">
                                            <span>{{ strtoupper(substr($article['name'] ?? 'Q', 0, 1)) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="pl-10">
                                    <h5 class="popular-title">{{ $article['title'] ?? '' }}</h5>
                                    <span class="popular-date">{{ !empty($article['created_at']) ? date('d M, Y', strtotime($article['created_at'])) : '' }}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- ── TAGS ── --}}
                <div class="sidebar-reveal sidebar-card" style="transition-delay: 0.24s;">
                    <h4 class="sidebar-card-title d-flex align-items-center">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-2 tag-icon">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
                            <line x1="7" y1="7" x2="7.01" y2="7"/>
                        </svg>
                        Tags
                    </h4>
                    <div class="d-flex flex-wrap tag-wrap">
                        @if($tags)
                        @foreach($tags as $tag)
                        <a href="{{ route('blog.show') }}" class="tag-chip">{{ $tag }}</a>
                        @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </aside>

        {{-- ══════════════════════════════════════
             MAIN CONTENT
        ══════════════════════════════════════ --}}
        <div class="col-lg-8 order-lg-2">

            {{-- ── FEATURED HERO ── --}}
            @if($firstBlog)
            <article class="hero-card mb-5">
                <a href="{{ route('blog.details', $firstBlog['slug']) }}" class="hero-card-link">

                    <div class="hero-thumb-wrap">
                        @php
                        $image_banner = null;
                        if (isset($firstBlog) && !empty($firstBlog->image_banner)) {
                        $image_banner = json_decode($firstBlog->image_banner);
                        }

                        @endphp
                        @if(!empty($image_banner))
                            <div class="hero-thumb image-zoom" style="background-image: url('{{ $image_banner->image_banner->src }}');"></div>
                        @else
                            <div class="hero-thumb hero-thumb-fallback image-zoom" style="background: linear-gradient(135deg, #1e3a5f 0%, #2563eb 50%, #0891b2 100%);">
                                <span>{{ strtoupper(substr($firstBlog['name'] ?? 'Q', 0, 1)) }}</span>
                            </div>
                        @endif

                        <div class="hero-overlay"></div>

                        <div class="hero-badge">
                            <span>Featured &bull; {{ $firstBlog['name'] ?? '' }}</span>
                        </div>
                    </div>

                    <div class="hero-body">
                        <h2 class="hero-title">{{ $firstBlog['title'] ?? '' }}</h2>
                        @if(!empty($firstBlog['excerpt']))
                        <p class="hero-excerpt">{{ strip_tags($firstBlog['excerpt']) }}</p>
                        @endif
                        <div class="d-flex align-items-center hero-meta">
                            <span class="d-flex align-items-center mr-4">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>                               
                                {{ !empty($firstBlog['created_at']) ? date('d M, Y', strtotime($firstBlog['created_at'])) : '' }}
                            </span>
                            <span class="d-flex align-items-center">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-2">
                                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                                </svg>
                                
                                 {{ !empty($firstBlog['updated_at']) ? get_time(strtotime($firstBlog['updated_at'])) : '5 min read' }}
                            </span>
                        </div>
                    </div>

                </a>
            </article>
            @endif

            {{-- ── LATEST ARTICLES ── --}}
            <div>
                <h3 class="section-title mb-4">
                    <span class="title-bar mr-3"></span>
                    <span class="shimmer-heading">Latest Articles</span>
                </h3>

                <div id="articles-container">
                    @foreach($listArticles as $index => $article)
                    @php
                        $gradients = [
                            'linear-gradient(135deg,#1e3a5f 0%,#2563eb 50%,#0891b2 100%)',
                            'linear-gradient(135deg,#14532d 0%,#16a34a 50%,#0d9488 100%)',
                            'linear-gradient(135deg,#4c1d95 0%,#7c3aed 50%,#db2777 100%)',
                            'linear-gradient(135deg,#7c2d12 0%,#ea580c 50%,#d97706 100%)',
                            'linear-gradient(135deg,#1e3a5f 0%,#0f172a 50%,#2563eb 100%)',
                            'linear-gradient(135deg,#064e3b 0%,#0f766e 50%,#0284c7 100%)',
                            'linear-gradient(135deg,#581c87 0%,#a21caf 50%,#db2777 100%)',
                            'linear-gradient(135deg,#1e3a5f 0%,#1d4ed8 50%,#7c3aed 100%)',
                        ];
                        $grad = $gradients[$index % count($gradients)];
                        $hidden = $index >= 10;
                    @endphp
                    <article data-article-index="{{ $index }}"
                             class="article-item reveal-item article-card mb-4 {{ $hidden ? 'd-none' : '' }}">
                        <a href="{{ route('blog.details', $article['slug']) }}" class="article-card-link">
                            <div class="row no-gutters align-items-stretch">
                                <div class="col-sm-5">
                                    <div class="article-thumb-wrap">

                                         @php
                                    $vicons = null;
                                    if (isset($article) && !empty($article->blog_image)) {
                                        $vicons = json_decode($article->blog_image);
                                    }

                                    @endphp
                                        @if(!empty($vicons))


                                            <div class="article-thumb image-zoom" style="background-image: url('{{ $vicons->blog_image->src }}');"></div>
                                        @else
                                            <div class="article-thumb article-thumb-fallback image-zoom" style="background: {{ $grad }};">
                                                <span>{{ strtoupper(substr($article['name'] ?? 'Q', 0, 1)) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="article-body">
                                        <div class="mb-2">
                                            <span class="article-category-chip">{{ $article['name'] ?? '' }}</span>
                                        </div>
                                        <h3 class="article-title">{{ $article['title'] ?? '' }}</h3>
                                        @if(!empty($article['excerpt']))
                                        <p class="article-excerpt">{{ strip_tags($article['excerpt']) }}</p>
                                        @endif
                                        <div class="d-flex align-items-center article-meta mt-auto">
                                            <span class="d-flex align-items-center mr-3">
                                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-1">
                                                    <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/>
                                                    <line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                                                </svg>                                             
                                                {{ !empty($article['created_at']) ? date('d M, Y', strtotime($article['created_at'])) : '' }}
                                            </span>
                                            <span class="d-flex align-items-center">
                                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-1">
                                                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                                                </svg>                                               
                                                {{ !empty($article['updated_at']) ? get_time(strtotime($article['updated_at'])) : '5 min read' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                    @endforeach
                </div>

                {{-- Infinite scroll sentinel --}}
                <div id="scroll-sentinel" class="pt-4 d-flex flex-column align-items-center">
                    <div id="loading-dots" class="d-none align-items-center py-4">
                        <span class="dot-bounce"></span>
                        <span class="dot-bounce"></span>
                        <span class="dot-bounce"></span>
                    </div>
                    <p id="end-message" class="d-none end-message py-4">
                        — You've reached the end —
                    </p>
                </div>

            </div>
        </div>

    </div>
</main>

<script>
(function () {
    /* ── Scroll Progress Bar ── */
    var bar = document.getElementById('scroll-progress');
    window.addEventListener('scroll', function () {
        var scrolled = window.scrollY;
        var total = document.documentElement.scrollHeight - window.innerHeight;
        var pct = total > 0 ? scrolled / total : 0;
        bar.style.transform = 'scaleX(' + pct + ')';
    }, { passive: true });

    /* ── Reveal on scroll (IntersectionObserver) ── */
    var revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                revealObserver.unobserve(e.target);
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal-item:not(.d-none)').forEach(function (el) {
        revealObserver.observe(el);
    });

    document.querySelectorAll('.sidebar-reveal').forEach(function (el, i) {
        el.style.transitionDelay = (i * 0.12) + 's';
        revealObserver.observe(el);
    });

    /* ── Infinite Scroll ── */
    var PAGE = 10;
    var allArticles = document.querySelectorAll('.article-item');
    var visible = PAGE;
    var loading = false;

    var sentinel = document.getElementById('scroll-sentinel');
    var dots = document.getElementById('loading-dots');
    var endMsg = document.getElementById('end-message');

    if (allArticles.length <= PAGE) {
        endMsg.classList.remove('d-none');
    }

    function showMore() {
        if (loading || visible >= allArticles.length) return;
        loading = true;
        dots.classList.remove('d-none');
        dots.classList.add('d-flex');

        setTimeout(function () {
            var next = Math.min(visible + PAGE, allArticles.length);
            for (var i = visible; i < next; i++) {
                (function (el, delay) {
                    el.classList.remove('d-none');
                    setTimeout(function () {
                        revealObserver.observe(el);
                    }, delay);
                })(allArticles[i], (i - visible) * 60);
            }
            visible = next;
            loading = false;
            dots.classList.add('d-none');
            dots.classList.remove('d-flex');

            if (visible >= allArticles.length) {
                endMsg.classList.remove('d-none');
            }
        }, 800);
    }

    var sentinelObserver = new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) showMore();
    }, { rootMargin: '200px' });

    sentinelObserver.observe(sentinel);
})();
</script>

<style>
:root {
    --primary: #1e3a5f;
    --accent: #2563eb;
    --border: #e2e8f0;
}
.pl-10{
    margin-left: 10px;
}
#scroll-progress {
    position: fixed;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: var(--accent);
    transform-origin: left;
    transform: scaleX(0);
    z-index: 9999;
    transition: transform 0.1s linear;
    border-radius: 0 2px 2px 0;
}

.page-heading { color: #0f172a; transition: opacity 0.5s ease; }

/* ══════════════ TICKER ══════════════ */
.ticker-bar { background: #1e3a8a; color: #fff; overflow: hidden; }
.ticker-live-badge {
    flex-shrink: 0;
    display: inline-flex;
    align-items: center;
    background: #3b82f6;
    color: #fff;
    padding: 0.25rem 0.75rem;
    border-radius: 2px;
    font-weight: 700;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}
.ticker-viewport { overflow: hidden; }
.ticker-track {
    display: inline-block;
    white-space: nowrap;
    animation: ticker-scroll 28s linear infinite;
    will-change: transform;
}
@keyframes ticker-scroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
@media (prefers-reduced-motion: reduce) {
    .ticker-track { animation: none; }
}
.ticker-item { display: inline-flex; align-items: center; margin-right: 3rem; font-size: 0.75rem; font-weight: 500; }
.ticker-dot { color: #60a5fa; margin-right: 0.5rem; }
.ticker-link { color: #fff; text-decoration: none; transition: color 0.15s ease; }
.ticker-link:hover { color: #93c5fd; text-decoration: none; }

/* ══════════════ REVEAL ══════════════ */
.reveal-item, .sidebar-reveal {
    opacity: 0;
    transform: translateY(24px) scale(0.97);
    transition: opacity 0.5s cubic-bezier(0.22,1,0.36,1), transform 0.5s cubic-bezier(0.22,1,0.36,1);
}
.sidebar-reveal { transform: translateX(-20px) scale(1); }
.reveal-item.visible, .sidebar-reveal.visible { opacity: 1; transform: translateY(0) scale(1); }
.sidebar-reveal.visible { transform: translateX(0); }

.article-item:nth-child(1) { transition-delay: 0.00s; }
.article-item:nth-child(2) { transition-delay: 0.10s; }
.article-item:nth-child(3) { transition-delay: 0.20s; }
.article-item:nth-child(4) { transition-delay: 0.30s; }
.article-item:nth-child(5) { transition-delay: 0.40s; }
.article-item:nth-child(n+6) { transition-delay: 0.48s; }

/* ══════════════ IMAGE ZOOM ══════════════ */
.image-zoom { transition: transform 0.6s cubic-bezier(0.22,1,0.36,1); background-size: cover; background-position: center; }
.hero-card-link:hover .image-zoom,
.article-card-link:hover .image-zoom { transform: scale(1.04); }

/* ══════════════ HERO CARD ══════════════ */
.hero-card {
    border-radius: 0.75rem;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    border: 1px solid var(--border);
    transition: box-shadow 0.5s ease, transform 0.3s ease;
}
.hero-card:hover { box-shadow: 0 20px 60px rgba(37,99,235,0.15); transform: scale(1.006); }
.hero-card-link { display: block; text-decoration: none; color: inherit; }
.hero-thumb-wrap { position: relative; width: 100%; padding-top: 50%; overflow: hidden; }
.hero-thumb { position: absolute; top:0; left:0; right:0; bottom:0; }
.hero-thumb-fallback { display: flex; align-items: center; justify-content: center; }
.hero-thumb-fallback span { color: rgba(255,255,255,0.2); font-size: 8rem; font-weight: 900; line-height: 1; }
.hero-overlay {
    position: absolute; top:0; left:0; right:0; bottom:0;
    background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
    opacity: 0.8;
}
.hero-badge { position: absolute; bottom: 1.5rem; left: 1.5rem; }
.hero-badge span {
    display: inline-flex; align-items: center;
    background: #3b82f6; color: #fff;
    font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;
    padding: 0.25rem 0.75rem; border-radius: 9999px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
.hero-body { padding: 1.5rem; background: #fff; }
@media (min-width: 768px) { .hero-body { padding: 2rem; } }
.hero-title {
    font-size: 1.5rem; font-weight: 700; color: #0f172a; margin-bottom: 1rem; line-height: 1.25;
    transition: color 0.3s ease;
}
@media (min-width: 768px) { .hero-title { font-size: 1.875rem; } }
@media (min-width: 992px) { .hero-title { font-size: 2.25rem; } }
.hero-card-link:hover .hero-title { color: #2563eb; }
.hero-excerpt {
    color: #64748b; font-size: 1.125rem; margin-bottom: 1.5rem;
    display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
}
.hero-meta { color: #94a3b8; font-size: 0.875rem; font-weight: 500; }

/* ══════════════ SECTION TITLE / SHIMMER ══════════════ */
.section-title { font-size: 1.25rem; font-weight: 700; display: flex; align-items: center; }
.title-bar { width: 2rem; height: 4px; background: #3b82f6; border-radius: 9999px; display: inline-block; }
.shimmer-heading {
    background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 50%, var(--primary) 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
    animation: shimmer-h 3s linear infinite;
}
@keyframes shimmer-h { to { background-position: 200% center; } }

/* ══════════════ ARTICLE CARD ══════════════ */
.article-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 0.75rem;
    padding: 1rem;
    transition: box-shadow 0.35s ease, transform 0.25s ease;
}
.article-card:hover { box-shadow: 0 8px 40px rgba(37,99,235,0.12), 0 0 0 1px rgba(37,99,235,0.08); transform: translateY(-3px); }
.article-card-link { display: block; text-decoration: none; color: inherit; }
.article-thumb-wrap { position: relative; width: 100%; padding-top: 66.6%; overflow: hidden; border-radius: 0.5rem; }
.article-thumb { position: absolute; top:0; left:0; right:0; bottom:0; }
.article-thumb-fallback { display: flex; align-items: center; justify-content: center; }
.article-thumb-fallback span { color: rgba(255,255,255,0.2); font-size: 3.5rem; font-weight: 900; }
.article-body { height: 100%; display: flex; flex-direction: column; justify-content: center; padding: 0.25rem 0 0.25rem 1rem; }
@media (max-width: 575.98px) { .article-body { padding: 1rem 0 0 0; } }
.article-category-chip {
    display: inline-flex; align-items: center;
    font-size: 0.75rem; font-weight: 600; color: #2563eb;
    border: 1px solid #bfdbfe; background: #eff6ff;
    padding: 0.125rem 0.625rem; border-radius: 9999px;
    transition: background 0.3s ease, color 0.3s ease;
}
.article-card-link:hover .article-category-chip { background: #2563eb; color: #fff; }
.article-title {
    font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 0.5rem;
    transition: color 0.3s ease;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    line-height: 1.35;
}
.article-card-link:hover .article-title { color: #2563eb; }
.article-excerpt {
    color: #64748b; font-size: 0.875rem; margin-bottom: 1rem;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.article-meta { color: #94a3b8; font-size: 0.75rem; font-weight: 500; }

/* ══════════════ SIDEBAR ══════════════ */
.sidebar-sticky { position: sticky; top: 1.5rem; max-height: calc(100vh - 3rem); overflow-y: auto; padding-right: 0.25rem; }
.sidebar-sticky::-webkit-scrollbar { width: 4px; }
.sidebar-sticky::-webkit-scrollbar-track { background: transparent; }
.sidebar-sticky::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }

.sidebar-card { background: #fff; border: 1px solid var(--border); border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
.sidebar-card-title { font-size: 1.125rem; font-weight: 700; color: #0f172a; margin-bottom: 1rem; border-bottom: 1px solid #f1f5f9; padding-bottom: 0.75rem; }
.tag-icon { color: #3b82f6; }

.topic-list li { list-style: none; }
.topic-link {
    display: flex; align-items: center; justify-content: space-between;
    padding: 0.5rem 0; font-size: 0.875rem; color: #64748b; text-decoration: none;
    transition: color 0.15s ease;
}
.topic-link:hover { color: #2563eb; text-decoration: none; }
.topic-dot { width: 6px; height: 6px; border-radius: 50%; background: #93c5fd; transition: background 0.15s ease; flex-shrink: 0; }
.topic-link:hover .topic-dot { background: #3b82f6; }
.topic-count { background: #f1f5f9; color: #64748b; border-radius: 0.375rem; padding: 0.125rem 0.5rem; font-size: 0.75rem; font-weight: 500; }

.popular-item { transition: transform 0.25s ease; margin-bottom: 1.25rem; }
.popular-item:last-child { margin-bottom: 0; }
.popular-item:hover { transform: translateX(4px); }
.popular-link { text-decoration: none; color: inherit; }
.popular-thumb { width: 80px; height: 80px; border-radius: 0.375rem; overflow: hidden; flex-shrink: 0; }
.popular-thumb-img { width: 100%; height: 100%; background-size: cover; background-position: center; }
.popular-thumb-fallback { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; }
.popular-thumb-fallback span { color: rgba(255,255,255,0.25); font-size: 1.75rem; font-weight: 900; }
.popular-title { font-size: 0.875rem; font-weight: 700; color: #0f172a; margin-bottom: 0.25rem; line-height: 1.3; transition: color 0.15s ease;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.popular-link:hover .popular-title { color: #2563eb; }
.popular-date { font-size: 0.75rem; color: #94a3b8; font-weight: 500; }

.tag-wrap { gap: 0.5rem; }
.tag-chip {
    display: inline-block;
    padding: 0.375rem 0.75rem;
    background: #f1f5f9; color: #64748b;
    font-size: 0.75rem; font-weight: 500;
    border-radius: 0.375rem; border: 1px solid #e2e8f0;
    text-decoration: none;
    transition: transform 0.2s cubic-bezier(0.34,1.56,0.64,1), background 0.2s ease, color 0.2s ease;
}
.tag-chip:hover {
    transform: scale(1.1) translateY(-2px);
    background: var(--accent) !important;
    color: #fff !important;
    border-color: var(--accent) !important;
    text-decoration: none;
}

/* ══════════════ LOADING DOTS ══════════════ */
.dot-bounce {
    display: inline-block;
    width: 10px; height: 10px;
    border-radius: 50%;
    background: var(--accent);
    animation: dot-b 0.7s ease-in-out infinite both;
    margin: 0 3px;
}
.dot-bounce:nth-child(2) { animation-delay: 0.15s; }
.dot-bounce:nth-child(3) { animation-delay: 0.30s; }
@keyframes dot-b {
    0%,100% { transform: translateY(0);   opacity: 0.4; }
    50%      { transform: translateY(-10px); opacity: 1; }
}
.end-message { font-size: 0.75rem; color: #94a3b8; font-weight: 500; letter-spacing: 0.1em; text-transform: uppercase; }
</style>

@endsection

  