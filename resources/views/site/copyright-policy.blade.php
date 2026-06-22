@extends('site.layouts.app')
@section('title', 'Copyright Policy | WebSolutionTechnology - Content Usage & Protection Policy')
@section('description', 'Read the WebSolutionTechnology Copyright Policy to understand content ownership, intellectual property rights, permitted usage, copyright infringement reporting, and protection of digital content published on WebSolutionTechnology.')
@section('keywords', 'WebSolutionTechnology copyright policy, copyright protection, intellectual property rights, content usage policy, digital copyright, copyright infringement, website content protection, WebSolutionTechnology legal policy, business listing content policy, online content rights')
@section('content')

@php
    $sections = [
        ['id' => 'intro',        'title' => 'Introduction',                 'icon' => 'book-open'],
        ['id' => 'ownership',    'title' => 'Intellectual Property Rights', 'icon' => 'shield'],
        ['id' => 'prohibited',   'title' => 'Prohibited Uses',              'icon' => 'alert-circle'],
        ['id' => 'takedown',     'title' => 'Takedown Notice',              'icon' => 'scale'],
        ['id' => 'jurisdiction', 'title' => 'Jurisdiction',                 'icon' => 'globe'],
        ['id' => 'contact',      'title' => 'Contact',                      'icon' => 'mail'],
    ];

    $protectedContent = [
        'Platform software, codebase and source code',
        'User interface designs, layouts and graphics',
        'Database compilations and business listings',
        'Logos, trademarks and service marks',
        'Written content, text and documentation',
        'Images, videos, audio and multimedia content',
    ];

    $prohibitedUses = [
        'Copying or reproducing platform content',
        'Reverse engineering any software',
        'Scraping or data-mining the platform',
        'Selling or licensing platform content',
        'Framing or embedding without permission',
        'Removing copyright or trademark notices',
        'Creating derivative works without authorization',
        'Circumventing access control mechanisms',
    ];

    $takedownRequirements = [
        'A physical or electronic signature of the copyright owner or authorized agent',
        'Identification and description of the copyrighted work claimed to be infringed',
        'Identification of the infringing material with sufficient detail to locate it',
        'Your contact information (address, telephone number, and email address)',
        'A statement of good faith belief that use is not authorized by the copyright owner',
        'A statement of accuracy and authorization, under penalty of perjury',
    ];
@endphp

<div class="copyright-page bg-light min-vh-100">

    {{-- Hero --}}
    <div class="copyright-hero position-relative border-bottom">
        <div class="container text-center py-5 py-md-5">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill mb-4 hero-badge">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                </svg>
                <span class="small font-weight-bold">Legal Documentation</span>
            </div>

            <h1 class="display-4 font-weight-bold mb-3">
                <span class="text-dark">Copyrights &amp;</span>
                <span class="shimmer-text">Policy</span>
            </h1>

            <p class="lead mx-auto mb-4 hero-subtext" style="max-width: 640px;">
                WebSolutionTechnology Pvt Ltd — Comprehensive policies governing the use of our training and certification services.
            </p>

            <div class="d-flex align-items-center justify-content-center flex-wrap" style="gap: 1.5rem;">
                <div class="d-flex align-items-center small hero-meta">
                    <span class="dot dot-violet mr-2"></span>
                    Last updated: April 2026
                </div>
                <div class="d-flex align-items-center small hero-meta">
                    <span class="dot dot-fuchsia mr-2"></span>
                    Effective immediately
                </div>
            </div>
        </div>

        {{-- Decorative wave --}}
        <svg class="hero-wave" viewBox="0 0 1440 40" fill="none" preserveAspectRatio="none">
            <path d="M0 40 C360 0 1080 0 1440 40 L1440 40 L0 40Z" fill="#fafaf9"></path>
        </svg>
    </div>

    {{-- Main content --}}
    <div class="container py-5" data-spy="scroll" data-target="#copyright-toc" data-offset="90">
        <div class="row">

            {{-- Sidebar TOC --}}
            <aside class="col-lg-3 mb-4">
                <div class="sticky-toc">
                    <div class="card border rounded-lg shadow-sm">
                        <div class="card-body">
                            <p class="text-uppercase font-weight-bold small text-muted mb-3" style="letter-spacing: 0.08em; font-size: .7rem;">
                                Table of Contents
                            </p>
                            <nav id="copyright-toc" class="nav flex-column toc-nav">
                                @foreach($sections as $section)
                                <a class="nav-link toc-link d-flex align-items-center" href="#{{ $section['id'] }}">
                                    <span class="toc-icon mr-2">
                                        @include('site.icons.' . $section['icon'], ['class' => 'icon-sm'])
                                    </span>
                                    <span>{{ $section['title'] }}</span>
                                </a>
                                @endforeach
                            </nav>
                        </div>
                    </div>

                    {{-- Quick Stats Card --}}
                    <div class="card border rounded-lg mt-3 summary-card">
                        <div class="card-body">
                            <p class="text-uppercase font-weight-bold small text-violet mb-3" style="letter-spacing: 0.08em; font-size: .7rem;">
                                Policy Summary
                            </p>
                            <div>
                                @foreach([
                                    ['Copyright Owner', 'WebSolutionTechnology Pvt Ltd'],
                                    ['Scope', 'Global'],
                                    ['Takedown', '30 days'],
                                    ['Jurisdiction', 'India'],
                                ] as [$label, $value])
                                <div class="d-flex justify-content-between align-items-center small mb-2">
                                    <span class="text-muted">{{ $label }}</span>
                                    <span class="font-weight-bold text-dark">{{ $value }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            {{-- Policy content --}}
            <main class="col-lg-9">

                {{-- Section 1 - Introduction --}}
                <section id="intro" class="policy-card card border rounded-lg shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box icon-box-violet mr-3">
                                @include('site.icons.book-open', ['class' => 'icon-md'])
                            </div>
                            <h2 class="h4 font-weight-bold text-dark mb-0">Introduction</h2>
                        </div>
                        <div class="policy-text text-secondary">
                            <p>
                                WebSolutionTechnology Pvt Ltd (<strong class="text-dark">"WebSolutionTechnology"</strong>,
                                <strong class="text-dark">"we"</strong>, <strong class="text-dark">"us"</strong>,
                                or <strong class="text-dark">"our"</strong>) respects the intellectual property rights of others
                                and expects users of our platform to do the same.
                            </p>
                            <p>
                                This Copyright Policy explains how we handle copyright-related matters on the WebSolutionTechnology platform,
                                including our procedures for addressing claims of copyright infringement and the rights and
                                responsibilities of our users regarding intellectual property.
                            </p>
                            <p class="mb-0">
                                By accessing or using the WebSolutionTechnology platform, you agree to comply with this Copyright Policy.
                                If you do not agree with any part of this policy, you must not use our services.
                            </p>
                        </div>
                    </div>
                </section>

                {{-- Section 2 - IP Ownership --}}
                <section id="ownership" class="policy-card card border rounded-lg shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box icon-box-violet mr-3">
                                @include('site.icons.shield', ['class' => 'icon-md'])
                            </div>
                            <h2 class="h4 font-weight-bold text-dark mb-0">Intellectual Property Rights</h2>
                        </div>
                        <div class="policy-text text-secondary">
                            <p>
                                The WebSolutionTechnology platform and all of its original content, features, and functionality are owned by
                                WebSolutionTechnology Pvt Ltd and are protected by international copyright, trademark, patent, trade secret,
                                and other intellectual property or proprietary rights laws.
                            </p>
                            <p>
                                Unless explicitly stated otherwise, you may not reproduce, distribute, create derivative works of,
                                publicly display, publicly perform, republish, download, store, or transmit any of the material on
                                our platform without prior written consent from WebSolutionTechnology Pvt Ltd.
                            </p>

                            <div class="protected-box rounded-lg p-4 mt-4 mb-0">
                                <p class="small font-weight-bold text-violet mb-3 d-flex align-items-center">
                                    @include('site.icons.shield', ['class' => 'icon-sm mr-2'])
                                    Protected Content Includes:
                                </p>
                                <ul class="list-unstyled small mb-0">
                                    @foreach($protectedContent as $item)
                                    <li class="d-flex align-items-start mb-2">
                                        <svg class="icon-sm text-violet mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                        </svg>
                                        <span>{{ $item }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Section 3 - Prohibited Uses --}}
                <section id="prohibited" class="policy-card card border rounded-lg shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box icon-box-red mr-3">
                                @include('site.icons.alert-circle', ['class' => 'icon-md'])
                            </div>
                            <h2 class="h4 font-weight-bold text-dark mb-0">Prohibited Uses</h2>
                        </div>
                        <div class="policy-text text-secondary">
                            <p>You agree not to use the platform for any purpose that violates applicable intellectual property laws. The following activities are strictly prohibited:</p>
                            <div class="row mt-3">
                                @foreach($prohibitedUses as $item)
                                <div class="col-sm-6 mb-3">
                                    <div class="prohibited-item d-flex align-items-start rounded p-3 small h-100">
                                        <svg class="icon-sm text-danger mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        <span>{{ $item }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Section 4 - Takedown --}}
                <section id="takedown" class="policy-card card border rounded-lg shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box icon-box-violet mr-3">
                                @include('site.icons.scale', ['class' => 'icon-md'])
                            </div>
                            <h2 class="h4 font-weight-bold text-dark mb-0">Copyright Takedown Notice</h2>
                        </div>
                        <div class="policy-text text-secondary">
                            <p>WebSolutionTechnology Pvt Ltd takes copyright infringement seriously. If you believe that any content on our platform infringes your copyright, you may submit a written takedown notice.</p>
                            <p>
                                The description of the work believed to be infringed, with adequate information to identify the work, must be provided.
                                WebSolutionTechnology responds to all valid notices within <strong class="text-dark">30 business days</strong>.
                            </p>

                            <div class="takedown-box rounded-lg p-4 mt-3 mb-0">
                                <p class="small font-weight-bold text-dark mb-3">Your notice must include:</p>
                                <div>
                                    @foreach($takedownRequirements as $i => $item)
                                    <div class="d-flex align-items-start mb-2">
                                        <span class="takedown-badge mr-3 mt-1">{{ $i + 1 }}</span>
                                        <span class="text-secondary small">{{ $item }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Section 5 - Jurisdiction --}}
                <section id="jurisdiction" class="policy-card card border rounded-lg shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box icon-box-violet mr-3">
                                @include('site.icons.globe', ['class' => 'icon-md'])
                            </div>
                            <h2 class="h4 font-weight-bold text-dark mb-0">Jurisdiction</h2>
                        </div>
                        <div class="policy-text text-secondary">
                            <p>This Copyright Policy shall be governed by and construed in accordance with the laws of India, without regard to its conflict of law provisions. WebSolutionTechnology Pvt Ltd is registered and operates under the jurisdiction of Indian law.</p>
                            <p class="mb-0">For disputes arising from this policy, you agree to submit to the exclusive jurisdiction of the courts located in Bangalore, Karnataka, India. This policy applies globally to all users of the WebSolutionTechnology platform regardless of geographic location.</p>

                            <div class="d-flex flex-wrap mt-3" style="gap: 0.6rem;">
                                @foreach(['Information Technology Act, 2000', 'Copyright Act, 1957', 'DMCA Compliant', 'GDPR Aware'] as $tag)
                                <span class="badge badge-pill jurisdiction-tag px-3 py-2">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Section 6 - Contact --}}
                <section id="contact" class="policy-card contact-card card border rounded-lg shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box icon-box-violet mr-3">
                                @include('site.icons.mail', ['class' => 'icon-md'])
                            </div>
                            <h2 class="h4 font-weight-bold text-dark mb-0">Contact Us</h2>
                        </div>
                        <div class="policy-text text-secondary">
                            <p>If you have any questions about this Copyright Policy, wish to report a copyright infringement, or need to contact us regarding intellectual property matters, please reach out to us:</p>

                            <div class="row mt-4">
                                <div class="col-sm-6 mb-3">
                                    <div class="contact-tile d-flex align-items-start rounded-lg p-3 h-100 bg-white">
                                        <div class="icon-box icon-box-violet icon-box-sm mr-3">
                                            @include('site.icons.mail', ['class' => 'icon-sm'])
                                        </div>
                                        <div>
                                            <p class="text-muted small mb-1">Copyright Officer</p>
                                            <a href="mailto:info@WebSolutionTechnology.com" class="font-weight-bold text-dark small contact-link">info@WebSolutionTechnology.com</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="contact-tile d-flex align-items-start rounded-lg p-3 h-100 bg-white">
                                        <div class="icon-box icon-box-violet icon-box-sm mr-3">
                                            @include('site.icons.globe', ['class' => 'icon-sm'])
                                        </div>
                                        <div>
                                            <p class="text-muted small mb-1">Registered Office</p>
                                            <p class="font-weight-bold text-dark small mb-0">Bangalore, Karnataka, India</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-top pt-4 mt-2">
                                <p class="small mb-0">
                                    We aim to respond to all copyright-related inquiries within
                                    <strong class="text-dark">3–5 business days</strong>.
                                    For urgent matters, please mark your email as
                                    <span class="text-violet font-weight-bold">"URGENT: COPYRIGHT"</span> in the subject line.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>

    {{-- Back to top --}}
    <button type="button" id="backToTopBtn" class="btn back-to-top-btn rounded-circle" aria-label="Back to top">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
        </svg>
    </button>
</div>

<script>
(function () {
    var backToTopBtn = document.getElementById('backToTopBtn');

    // Show/hide back-to-top button
    window.addEventListener('scroll', function () {
        if (window.scrollY > 400) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });

    backToTopBtn.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Bootstrap 4 Scrollspy needs jQuery + bootstrap.js loaded in your layout.
    // It listens for 'activate' on the scrollspy target and toggles styling via .active class (handled in CSS below).

    // Smooth scroll for TOC links (offset for fixed header)
    document.querySelectorAll('#copyright-toc .toc-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            var targetId = this.getAttribute('href');
            var targetEl = document.querySelector(targetId);
            if (!targetEl) return;
            e.preventDefault();
            var top = targetEl.getBoundingClientRect().top + window.scrollY - 80;
            window.scrollTo({ top: top, behavior: 'smooth' });
        });
    });
})();
</script>

 font-size: ;
<style>
    /* ===== Hero ===== */
    .copyright-hero {
        background: linear-gradient(135deg, hsl(270, 50%, 95%) 0%, hsl(290, 60%, 96%) 50%, hsl(250, 45%, 95%) 100%);
        position: relative;
        overflow: hidden;
    }
    .hero-badge {
        background: rgba(139, 92, 246, 0.1);
        color: #6d28d9;
        border: 1px solid rgba(139, 92, 246, 0.2);
    }
    .hero-subtext { color: rgba(109, 40, 217, 0.7); }
    .hero-meta { color: rgba(109, 40, 217, 0.6); }

    .dot { display: inline-block; width: 8px; height: 8px; border-radius: 50%; }
    .dot-violet { background-color: #8b5cf6; }
    .dot-fuchsia { background-color: #d946ef; }

    .hero-wave {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        width: 100%;
        display: block;
    }

    .shimmer-text {
        background: linear-gradient(90deg, #8b5cf6 0%, #d946ef 50%, #8b5cf6 100%);
        background-size: 200% 100%;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: transparent;
        animation: shimmer 3s ease-in-out infinite;
    }
    @keyframes shimmer {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    /* ===== Layout helpers ===== */
    .text-violet { color: #7c3aed; }
    .rounded-lg { border-radius: 1rem !important; }
    .icon-sm { width: 16px; height: 16px; }
    .icon-md { width: 20px; height: 20px; }
    .flex-shrink-0 { flex-shrink: 0; }

    .icon-box {
        width: 40px;
        height: 40px;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .icon-box-sm { width: 32px; height: 32px; border-radius: 0.5rem; }
    .icon-box-violet { background-color: #ede9fe; color: #7c3aed; }
    .icon-box-red { background-color: #fee2e2; color: #dc2626; }

    /* ===== Sidebar TOC ===== */
    .sticky-toc {
        position: sticky;
        top: 90px;
    }
    .toc-nav .toc-link {
        color: #6b7280;
        font-size: 0.875rem;
        padding: 0.625rem 0.75rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
    }
    .toc-nav .toc-link:hover {
        background-color: #f9fafb;
        color: #111827;
        text-decoration: none;
    }
    .toc-nav .toc-link.active {
        background-color: #f5f3ff;
        color: #7c3aed;
        font-weight: 600;
    }
    .toc-nav .toc-link .toc-icon { color: #9ca3af; }
    .toc-nav .toc-link.active .toc-icon { color: #7c3aed; }

    .summary-card {
        background: linear-gradient(135deg, #ede9fe 0%, #fdf4ff 100%);
        border-color: #ddd6fe !important;
    }

    /* ===== Policy cards ===== */
    .policy-card { transition: box-shadow 0.2s ease; }
    .policy-text p { margin-bottom: 1rem; line-height: 1.7; }

    .protected-box {
        background-color: #f5f3ff;
        border: 1px solid #ddd6fe;
    }

    .prohibited-item {
        background-color: #fef2f2;
        border: 1px solid #fee2e2;
    }

    .takedown-box {
        background-color: rgba(245, 243, 255, 0.6);
        border: 1px solid #ddd6fe;
    }
    .takedown-badge {
        width: 20px;
        height: 20px;
        min-width: 20px;
        border-radius: 50%;
        background-color: rgba(221, 214, 254, 0.6);
        color: #7c3aed;
        font-size: 0.7rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .jurisdiction-tag {
        background-color: #f5f3ff;
        color: #7c3aed;
        border: 1px solid #ddd6fe;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .contact-card {
        background: linear-gradient(135deg, #f5f3ff 0%, #ffffff 50%, #fdf4ff 100%);
        border-color: #ddd6fe !important;
    }
    .contact-tile {
        border: 1px solid #e5e7eb;
    }
    .contact-link:hover { color: #7c3aed !important; text-decoration: none; }

    /* ===== Back to top ===== */
    .back-to-top-btn {
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 44px;
        height: 44px;
        background-color: #7c3aed;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.25s ease;
        z-index: 1050;
        border: none;
    }
    .back-to-top-btn:hover { background-color: #6d28d9; color: #fff; }
    .back-to-top-btn.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
</style>
 @endsection