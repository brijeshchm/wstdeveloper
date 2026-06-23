@extends('site.layouts.app')
@section('title', 'QuickDials - Trusted Local Business Listings')
@section('description', 'Explore the best services with QuickDials. Find verified businesses, contact details, reviews, ratings, photos, addresses, and trusted local service providers near you.')
@section('keywords',  'best top services, verified businesses, local business directory, QuickDials listings, reviews and ratings, nearby services, trusted businesses, contact details, local search engine')
@section('content')

<div class="listing-page bg-light min-vh-100">

    {{-- ════════════════════════════════
         PAGE HEADER
    ════════════════════════════════ --}}
    <div class="page-header-dark py-5">
        <div class="container">
            <div class="d-flex align-items-center breadcrumb-trail small mb-3">
                <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" class="mx-2">
                    <path d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-white">All Blog</span>
            </div>
            <h1 class="display-4 font-weight-bold mb-2">Explore Verified Services &amp; Experts</h1>
            <p class="lead header-subtext mb-0">High-quality services recognized and trusted across the globe</p>
        </div>
    </div>

    {{-- ════════════════════════════════
         MAIN CONTENT
    ════════════════════════════════ --}}
    <div class="container py-5">

        {{-- Search + Controls --}}
        <div class="row mb-4">
            <div class="col-md-8 mb-3 mb-md-0">
                <div class="search-input-wrap">
                    <svg width="18" height="18" class="search-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                    </svg>
                    <input id="course-search" type="text" placeholder="Search courses or keywords..."
                           class="form-control search-input" autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex" style="gap: 0.5rem;">
                    <select id="sort-select" class="form-control sort-select">
                        <option value="popular">Most Popular</option>
                        <option value="rating">Highest Rated</option>
                    </select>

                    <button id="btn-grid" class="view-btn active btn" title="Grid view">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                            <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="layout-wrap">

            {{-- ── COURSE LISTING ── --}}
            <div id="course-area">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <p class="result-summary small mb-0">
                        <span id="result-count" class="font-weight-bold result-count-number">{{ count($blogs) }}</span>
                        courses found
                    </p>
                </div>

                {{-- GRID VIEW --}}
                <div id="grid-view" class="row">
                    @if($blogs)
                    @foreach($blogs as $i => $blog)
                    <div class="col-md-6 col-xl-4 mb-4 reveal d-{{ min($i % 6, 5) }}">
                        <div class="course-card"
                             data-title="{{ strtolower($blog['title'] ?? '') }}"
                             data-name="{{ strtolower($blog['name'] ?? '') }}"
                             data-slug="{{ $blog['child_slug'] ?? '' }}"
                             data-rating="{{ $blog['rating'] ?? 0 }}"
                             data-count="{{ $blog['ratingcount'] ?? 0 }}">
                            <a href="{{ route('blog.details', $blog['slug']) }}" class="course-card-link">

                                {{-- Card image/header --}}
                                <div class="course-card-header">
                                    <h3 class="course-card-title">{{ $blog['title'] ?? '' }}</h3>
                                    <span class="course-card-badge">{{ $blog['name'] ?? '' }}</span>
                                </div>

                                {{-- Card body --}}
                                <div class="course-card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="course-card-name text-truncate">{{ $blog['title'] ?? '' }}</span>
                                        <div class="d-flex align-items-center course-rating flex-shrink-0">
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" class="mr-1">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                            <span class="course-rating-value">{{ $blog['rating'] ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex course-meta-row mb-3" style="gap: 0.75rem;">
                                        <span class="d-flex align-items-center">
                                            <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-1">
                                                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                                            </svg>
                                            {{ !empty($blog['created_at']) ? date('d, M Y', strtotime($blog['created_at'])) : '' }}
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mr-1">
                                                <circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/>
                                            </svg>
                                            Advance
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between course-card-footer pt-3">
                                        <span class="view-arrow">
                                            View Details
                                            <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" class="ml-1">
                                                <path d="M5 12h14M12 5l7 7-7 7"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12 text-center py-5">
                        <p class="text-muted h5 font-weight-medium">No blog available.</p>
                    </div>
                    @endif
                </div>

                {{-- Empty state --}}
                <div id="empty-state" class="d-none text-center py-5">
                    <p class="text-muted h5 font-weight-medium mb-2">No blog match your filters.</p>
                    <p class="text-muted small">Try adjusting your search or filters.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
(function () {

    /* ── IntersectionObserver reveals ── */
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); }
        });
    }, { threshold: 0.06, rootMargin: '0px 0px -30px 0px' });
    document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });

    /* ── State ── */
    var selectedSlugs = new Set();
    var currentSort   = 'popular';
    var currentSearch = '';

    /* ── DOM refs ── */
    var searchInput = document.getElementById('course-search');
    var sortSelect  = document.getElementById('sort-select');
    var gridView    = document.getElementById('grid-view');
    var emptyState  = document.getElementById('empty-state');
    var resultCount = document.getElementById('result-count');

    /* ── All cards ── */
    var allCards = Array.from(gridView.querySelectorAll('[data-title]'));

    /* ── Search ── */
    searchInput.addEventListener('input', function () {
        currentSearch = searchInput.value.toLowerCase().trim();
        applyFilters();
    });

    /* ── Sort ── */
    sortSelect.addEventListener('change', function () {
        currentSort = sortSelect.value;
        applyFilters();
    });

    /* ── Checkbox filters (safe: only if they exist) ── */
    document.querySelectorAll('.child-filter').forEach(function (cb) {
        cb.addEventListener('change', function () {
            if (cb.checked) selectedSlugs.add(cb.value);
            else selectedSlugs.delete(cb.value);
            applyFilters();
        });
    });

    /* ── Core filter + sort ── */
    function applyFilters() {
        var visible = allCards.filter(function (card) {
            var title = card.dataset.title || '';
            var name  = card.dataset.name  || '';
            var slug  = card.dataset.slug  || '';

            var matchSearch = !currentSearch ||
                title.indexOf(currentSearch) !== -1 ||
                name.indexOf(currentSearch) !== -1 ||
                slug.indexOf(currentSearch) !== -1;

            var matchCat = selectedSlugs.size === 0 || selectedSlugs.has(slug);

            return matchSearch && matchCat;
        });

        /* Sort */
        visible.sort(function (a, b) {
            if (currentSort === 'popular') return Number(b.dataset.count)  - Number(a.dataset.count);
            if (currentSort === 'rating')  return Number(b.dataset.rating) - Number(a.dataset.rating);
            return 0;
        });

        /* Hide all card wrappers, then show sorted visible ones */
        allCards.forEach(function (c) { c.closest('.col-md-6').style.display = 'none'; });

        visible.forEach(function (card) {
            var col = card.closest('.col-md-6');
            col.style.display = '';
            gridView.appendChild(col);
        });

        /* Empty state */
        emptyState.classList.toggle('d-none', visible.length > 0);
        resultCount.textContent = visible.length;

        /* Re-observe for reveal */
        visible.forEach(function (c) { c.classList.remove('visible'); io.observe(c); });
    }

    /* Initial render */
    applyFilters();

})();
</script>
<style>
.listing-page { background: #f8f9fa; }

.page-header-dark { background: #0f172a; color: #fff; }
.breadcrumb-trail { color: #94a3b8; }
.breadcrumb-link { color: #94a3b8; text-decoration: none; transition: color 0.15s ease; }
.breadcrumb-link:hover { color: #fff; text-decoration: none; }
.header-subtext { color: #cbd5e1; }

.search-input-wrap { position: relative; }
.search-icon { position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: #94a3b8; pointer-events: none; }
.search-input { padding-left: 2.5rem; border-radius: 0.75rem; border-color: #e2e8f0; height: calc(1.5em + 1.5rem + 2px); }
.search-input:focus { border-color: #818cf8; box-shadow: 0 0 0 0.2rem rgba(79,70,229,0.15); }

.sort-select { border-radius: 0.75rem; border-color: #e2e8f0; color: #334155; }
.sort-select:focus { border-color: #818cf8; box-shadow: 0 0 0 0.2rem rgba(79,70,229,0.15); }

.view-btn {
    padding: 0.65rem 0.9rem;
    border-radius: 0.75rem;
    border: 1px solid #e2e8f0;
    background: #fff;
    color: #64748b;
    transition: border-color 0.15s ease;
}
.view-btn:hover { border-color: #a5b4fc; }
.view-btn.active { background-color: #4f46e5; color: #fff; border-color: #4f46e5; }
.view-btn.active svg { color: #fff; }

.result-summary { color: #64748b; }
.result-count-number { color: #0f172a; }

/* ══════════════ COURSE CARD ══════════════ */
.course-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 0.75rem;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.course-card-link { display: flex; flex-direction: column; height: 100%; text-decoration: none; color: inherit; }
.course-card-header {
    height: 144px;
    background: linear-gradient(135deg, #f1f5f9, #eef2ff);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.25rem;
    position: relative;
    overflow: hidden;
}
.course-card-title {
    font-weight: 700; font-size: 1.125rem; color: #334155; text-align: center; line-height: 1.3;
    position: relative; z-index: 1; margin: 0;
    transition: color 0.2s ease;
}
.course-card-link:hover .course-card-title { color: #4338ca; }
.course-card-badge {
    position: absolute; top: 0.75rem; right: 0.75rem;
    padding: 0.125rem 0.5rem;
    background: rgba(255,255,255,0.9);
    color: #4338ca;
    font-size: 0.7rem; font-weight: 600;
    border-radius: 9999px;
    border: 1px solid #e0e7ff;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.course-card-body { padding: 1rem; flex: 1; display: flex; flex-direction: column; }
.course-card-name { font-size: 0.875rem; font-weight: 500; color: #334155; }
.course-rating { color: #f59e0b; }
.course-rating-value { font-size: 0.75rem; font-weight: 500; color: #334155; }
.course-meta-row { font-size: 0.75rem; color: #64748b; }
.course-card-footer { margin-top: auto; border-top: 1px solid #f1f5f9; }
.view-arrow {
    font-size: 0.75rem; font-weight: 500; color: #4f46e5;
    display: inline-flex; align-items: center;
    transition: transform 0.2s ease;
}
.course-card-link:hover .view-arrow { transform: translateX(2px); }

/* ══════════════ REVEAL ══════════════ */
.reveal {
    opacity: 0;
    transform: translateY(16px);
    transition: opacity 0.5s ease, transform 0.5s ease;
}
.reveal.visible { opacity: 1; transform: translateY(0); }
.reveal.d-0 { transition-delay: 0.00s; }
.reveal.d-1 { transition-delay: 0.06s; }
.reveal.d-2 { transition-delay: 0.12s; }
.reveal.d-3 { transition-delay: 0.18s; }
.reveal.d-4 { transition-delay: 0.24s; }
.reveal.d-5 { transition-delay: 0.30s; }
</style>
 
@endsection

 
