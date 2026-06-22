@extends('site.layouts.app')
@section('title', 'Terms & Conditions | WebSolutionTechnology - User Data & Privacy Protection')
@section('description', 'Read the WebSolutionTechnology Terms & Conditions to learn how we collect, use, store, and protect user information, personal data, cookies, and business details while ensuring privacy and security on our platform.')
@section('keywords', 'WebSolutionTechnology Terms & Conditions, user data protection, privacy protection, data security policy, personal information policy, website privacy terms, cookies policy, online privacy policy, business listing privacy, WebSolutionTechnology legal policy, user information security')
@section('content')

@php
    $sections = [
        ['id' => 'terms',          'label' => 'Terms of Use'],
        ['id' => 'venue',          'label' => 'Venue Only'],
        ['id' => 'ownership',      'label' => 'Ownership'],
        ['id' => 'limitation',     'label' => 'Limitation of Liability'],
        ['id' => 'applicable-law', 'label' => 'Applicable Law'],
        ['id' => 'dispute',        'label' => 'Dispute Resolution'],
    ];
@endphp

{{-- ── Progress bar ── --}}
<div id="progress-bar" style="width:0%"></div>

{{-- ══════════════════════════
     DECORATIVE ORBS
══════════════════════════ --}}
<div class="decor-orbs">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
</div>

{{-- ══════════════════════════
     HERO
══════════════════════════ --}}
<div class="terms-hero position-relative">
    <div class="container text-center py-5 position-relative" style="z-index: 10;">

        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill mb-4 hero-badge anim-1">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            </svg>
            <span class="small font-weight-bold">Legal Documentation</span>
        </div>

        <h1 class="display-4 font-weight-bold mb-3 anim-2">
            <span class="hero-title-dark">Terms &amp;</span>
            <span class="shimmer-text"> Conditions of Use</span>
        </h1>

        <p class="lead mx-auto mb-4 anim-3 hero-subtext" style="max-width: 640px;">
            WebSolutionTechnology Pvt Ltd — Comprehensive policies governing the use of our training and certification services.
        </p>

        <div class="d-flex align-items-center justify-content-center flex-wrap anim-4" style="gap: 1.5rem;">
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

    {{-- Wave --}}
    <svg class="hero-wave" viewBox="0 0 1440 40" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
        <path d="M0 40 C360 0 1080 0 1440 40 L1440 40 L0 40Z" fill="#f7f5fb"/>
    </svg>
</div>

{{-- ══════════════════════════
     MAIN CONTENT
══════════════════════════ --}}
<div class="container py-5 position-relative" style="z-index: 10;" data-spy="scroll" data-target="#terms-toc" data-offset="100">
    <div class="row">

        {{-- ── STICKY SIDEBAR ── --}}
        <aside class="col-lg-3 mb-4 d-none d-lg-block">
            <nav class="sticky-toc glass-card rounded-lg p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box icon-grad mr-2">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/>
                            <line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/>
                            <line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/>
                        </svg>
                    </div>
                    <span class="font-weight-bold small toc-heading">Contents</span>
                </div>
                <ul id="terms-toc" class="nav flex-column list-unstyled toc-nav">
                    @foreach($sections as $s)
                    <li class="nav-item">
                        <a href="#{{ $s['id'] }}" class="nav-link toc-link">
                            {{ $s['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </nav>
        </aside>

        {{-- ── CONTENT ── --}}
        <div class="col-lg-9">

            {{-- ─ Terms of Use ─ --}}
            <section id="terms" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">WebSolutionTechnology — Terms of Use</h2>
                </div>
                <div class="small section-body">
                    <p>By visiting our website or transacting with WebSolutionTechnology, you agree to these Terms of Use. Please read them carefully before using this website. By using the website or any service available on it, you agree to be bound by these terms. WebSolutionTechnology reserves the right to change these Terms at any time. Your continued use of the website constitutes acceptance of the modified Terms.</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Registrations and Certifications</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">WebSolutionTechnology acts only as a facilitator and not as an agent or partner for any third-party training or certification organization. You acknowledge that WebSolutionTechnology is only a service provider providing services related to registration, and is not responsible for any disputes arising from the certification processes or program outcomes.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Accuracy of Information</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">While WebSolutionTechnology endeavors to ensure that information is current and accurate, we do not represent or warrant that it will be accurate or complete, or that it will be suitable for your particular circumstances. You agree that our website information is for general guidance only and should not be relied upon as the sole basis for decision-making.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">User Responsibilities</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">Users are solely responsible for verifying information independently. WebSolutionTechnology shall not be liable for any errors, omissions, or inaccuracies in the content provided on the website or in connection with any action taken in reliance thereon.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ Venue Only ─ --}}
            <section id="venue" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:.3s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="3 11 22 2 13 21 11 13 3 11"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Venue Only</h2>
                </div>
                <div class="small section-body">
                    <p>WebSolutionTechnology provides its services as a venue only, not as an organizer, sponsor, or promoter of the courses, programs, or certifications listed on the website. WebSolutionTechnology merely provides a platform for candidates and training organizations to connect.</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Third-Party Services</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">Any training, certification, or associated services obtained through the WebSolutionTechnology platform are offered by independent third-party providers. WebSolutionTechnology makes no representations about the quality, safety, morality, legality, or any other aspect of services listed on the platform.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">No Endorsement</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">The listing of any training provider, certification body, or course on the WebSolutionTechnology platform does not constitute an endorsement or recommendation by WebSolutionTechnology. Users should perform their own due diligence before engaging with any service provider.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Fees and Payments</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">All fees quoted on the website are inclusive of applicable taxes unless stated otherwise. WebSolutionTechnology reserves the right to modify prices at any time without prior notice. Payment terms and cancellation policies are determined independently by service providers.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ Ownership ─ --}}
            <section id="ownership" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:.6s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Ownership</h2>
                </div>
                <div class="small section-body">
                    <p>All content on this website, including but not limited to text, graphics, logos, icons, images, audio clips, digital downloads, data compilations, and software, is the property of WebSolutionTechnology Internet Pvt Ltd or its content suppliers and is protected by applicable intellectual property laws.</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Intellectual Property Rights</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">The compilation of all content on this site is the exclusive property of WebSolutionTechnology Pvt Ltd, with copyright authorship for this collection by WebSolutionTechnology, and protected by applicable copyright laws. All trademarks and service marks on this website not owned by WebSolutionTechnology are the property of their respective owners.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">License to Use</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">WebSolutionTechnology grants you a limited, non-exclusive, revocable license to access and make personal, non-commercial use of this website. This license does not include any resale or commercial use of this site or its contents, any collection and use of any service listings or descriptions, any derivative use of the site, or any use of data mining, robots, or similar data gathering and extraction tools.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Restrictions</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">Without prior written consent of WebSolutionTechnology, no part of this website may be reproduced, distributed, framed, published, uploaded, downloaded, transmitted, or used in any commercial manner. Unauthorized use terminates the permission or license granted by WebSolutionTechnology.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ Limitation of Liability ─ --}}
            <section id="limitation" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:.9s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Limitation of Liability</h2>
                </div>
                <div class="small section-body">
                    <p>WebSolutionTechnology and its directors, officers, employees, agents, contractors, successors, and assigns shall not be liable for any indirect, incidental, special, consequential, or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from:</p>

                    <ul class="pl-4">
                        <li>Your access to or use of or inability to access or use the Service</li>
                        <li>Any conduct or content of any third party on the Service</li>
                        <li>Any content obtained from the Service</li>
                        <li>Unauthorized access, use, or alteration of your transmissions or content</li>
                        <li>Errors, inaccuracies, or omissions in any content on the Service</li>
                    </ul>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Maximum Liability</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">In no event shall WebSolutionTechnology total liability to you for all damages, losses, and causes of action exceed the amount you have paid to WebSolutionTechnology, if any, in the one (1) month period prior to the claim. Some jurisdictions do not allow the exclusion of certain warranties or the limitation or exclusion of liability for incidental or consequential damages; therefore, some of the above limitations may not apply to you.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Disclaimer of Warranties</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">The Service is provided on an "AS IS" and "AS AVAILABLE" basis without any warranties of any kind, either express or implied, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose, or non-infringement. WebSolutionTechnology does not warrant that the Service will function uninterrupted, secure, or available at any particular time or location.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ Applicable Law ─ --}}
            <section id="applicable-law" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:1.2s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 13l5.1 5.1a1 1 0 0 1 0 1.4l-1.4 1.4a1 1 0 0 1-1.4 0L11 15.8"/>
                            <path d="M4.7 15.3l-1.4-1.4a1 1 0 0 1 0-1.4l9.2-9.2a1 1 0 0 1 1.4 0l1.4 1.4a1 1 0 0 1 0 1.4L6.1 15.3a1 1 0 0 1-1.4 0z"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Applicable Law &amp; Dispute Resolution</h2>
                </div>
                <div class="small section-body">
                    <p>These Terms shall be governed by and construed in accordance with the laws of India, without regard to its conflict of law provisions. Any disputes arising from or in connection with these Terms or your use of the Service shall be subject to the exclusive jurisdiction of the courts of India.</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Jurisdiction</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">You agree that any legal action or proceeding related to the Service or these Terms shall be instituted exclusively in a court of competent jurisdiction in India. You agree and hereby submit to the personal jurisdiction of such courts for the purpose of litigating any such action or proceeding.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Consumer Protection</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">WebSolutionTechnology complies with applicable consumer protection laws. If you are a consumer (as defined under applicable law), nothing in these Terms is intended to limit your rights under consumer protection legislation.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ Dispute Resolution ─ --}}
            <section id="dispute" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:1.5s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Dispute Resolution</h2>
                </div>
                <div class="small section-body">
                    <p>Before bringing a formal dispute, you agree to first attempt to resolve it informally by contacting WebSolutionTechnology. WebSolutionTechnology will try to resolve the dispute informally within 30 days of receiving your written notice.</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Arbitration</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">If a dispute cannot be resolved informally, you and WebSolutionTechnology agree to submit to binding arbitration. The arbitration shall be conducted in English in India. The arbitrator's decision shall be final and binding and may be entered as a judgment in any court of competent jurisdiction.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Class Action Waiver</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">You agree that any arbitration or legal proceeding shall be limited to the dispute between you and WebSolutionTechnology individually. You waive any right to participate in class action lawsuits or class-wide arbitration against WebSolutionTechnology.</p>
                        </div>
                    </div>

                    {{-- Contact box --}}
                    <div class="contact-box rounded-lg p-4 mt-4">
                        <div class="d-flex align-items-start">
                            <div class="icon-box icon-grad mr-3 mt-1">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.26a2 2 0 0 1 1.95-2.18h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-weight-bold small mb-1 contact-title">Contact WebSolutionTechnology</div>
                                <p class="small mb-0 contact-text">For any questions regarding these Terms of Use or to report a dispute, please reach out to our legal team. We are committed to resolving concerns promptly and fairly.</p>
                                <div class="mt-3 d-flex flex-wrap" style="gap: 0.5rem;">
                                    @foreach(['Legal Queries', 'Support', 'Report Issue'] as $btn)
                                    <a href="#" class="btn btn-purple btn-sm rounded-pill text-white px-3">
                                        {{ $btn }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

             

        </div>{{-- /content --}}
    </div>{{-- /row --}}
</div>{{-- /container --}}

<script>
(function () {
    /* ── Scroll reveal ── */
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.scroll-reveal').forEach(function (el) {
        observer.observe(el);
    });

    /* ── Progress bar ── */
    var bar = document.getElementById('progress-bar');
    window.addEventListener('scroll', function () {
        var total = document.documentElement.scrollHeight - window.innerHeight;
        bar.style.width = total > 0 ? (window.scrollY / total * 100) + '%' : '0%';
    }, { passive: true });

    /* ── Smooth scroll for TOC links (Bootstrap 4 Scrollspy handles .active highlighting) ── */
    document.querySelectorAll('#terms-toc .toc-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            var targetId = this.getAttribute('href');
            var targetEl = document.querySelector(targetId);
            if (!targetEl) return;
            e.preventDefault();
            var top = targetEl.getBoundingClientRect().top + window.scrollY - 90;
            window.scrollTo({ top: top, behavior: 'smooth' });
        });
    });
})();
</script>


<style>
    body { background: #f7f5fb; }

    /* ── Progress bar ── */
    #progress-bar {
        position: fixed;
        top: 0; left: 0;
        height: 3px;
        z-index: 1051;
        background: linear-gradient(90deg, #7c3aed, #d946ef, #6366f1);
        transition: width .15s ease;
    }

    /* ── Decorative orbs ── */
    .decor-orbs {
        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        pointer-events: none;
        overflow: hidden;
        z-index: 0;
    }
    .orb {
        position: absolute;
        border-radius: 50%;
    }
    .orb-1 {
        top: 80px; right: 10%;
        width: 384px; height: 384px;
        opacity: .2;
        background: radial-gradient(circle, #c4b5fd, transparent 70%);
        animation: orbFloat1 9s ease-in-out infinite;
    }
    .orb-2 {
        bottom: 160px; left: 5%;
        width: 320px; height: 320px;
        opacity: .15;
        background: radial-gradient(circle, #f0abfc, transparent 70%);
        animation: orbFloat2 12s ease-in-out infinite;
    }
    .orb-3 {
        top: 60%; right: 20%;
        width: 256px; height: 256px;
        opacity: .1;
        background: radial-gradient(circle, #a5b4fc, transparent 70%);
    }
    @keyframes orbFloat1 {
        0%, 100% { transform: translateY(0) scale(1); }
        50%      { transform: translateY(-30px) scale(1.05); }
    }
    @keyframes orbFloat2 {
        0%, 100% { transform: translateY(0) scale(1); }
        50%      { transform: translateY(20px) scale(0.97); }
    }

    /* ── Hero ── */
    .terms-hero {
        background: linear-gradient(135deg, #ede9fe 0%, #fae8ff 50%, #e0e7ff 100%);
        border-bottom: 1px solid rgba(139, 92, 246, .1);
        overflow: hidden;
    }
    .hero-badge {
        background: rgba(139, 92, 246, .1);
        color: #6d28d9;
        border: 1px solid rgba(139, 92, 246, .2);
    }
    .hero-title-dark { color: #2e1065; }
    .hero-subtext { color: #5b21b6; opacity: .8; }
    .hero-meta { color: #6d28d9; opacity: .75; }
    .dot { display: inline-block; width: 8px; height: 8px; border-radius: 50%; }
    .dot-violet { background-color: #7c3aed; }
    .dot-fuchsia { background-color: #c026d3; }
    .hero-wave {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        width: 100%;
        display: block;
    }

    .shimmer-text {
        background: linear-gradient(90deg, #7c3aed, #c026d3, #6366f1, #7c3aed);
        background-size: 400px 100%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        animation: shimmer 4s linear infinite;
    }
    @keyframes shimmer {
        0%   { background-position: -400px 0; }
        100% { background-position: 400px 0; }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .anim-1 { animation: fadeInUp .5s ease both .1s; }
    .anim-2 { animation: fadeInUp .5s ease both .2s; }
    .anim-3 { animation: fadeInUp .5s ease both .3s; }
    .anim-4 { animation: fadeInUp .5s ease both .4s; }

    /* ── Glass card ── */
    .glass-card {
        background: rgba(255, 255, 255, .72);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(139, 92, 246, .12);
        box-shadow: 0 4px 24px rgba(139, 92, 246, .07);
    }
    .rounded-lg { border-radius: 1rem !important; }

    /* ── Scroll reveal ── */
    .scroll-reveal {
        opacity: 0;
        transform: translateY(22px);
        transition: opacity .55s ease, transform .55s ease;
    }
    .scroll-reveal.visible {
        opacity: 1;
        transform: none;
    }

    /* ── Icon boxes ── */
    .icon-grad {
        background: linear-gradient(135deg, #7c3aed, #c026d3);
    }
    .icon-box {
        width: 32px; height: 32px;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .icon-box-lg {
        width: 48px; height: 48px;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .icon-box-xl {
        width: 56px; height: 56px;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 24px rgba(139, 92, 246, .3);
    }
    @keyframes floatIcon {
        0%, 100% { transform: translateY(0); }
        50%      { transform: translateY(-5px); }
    }
    .icon-float { animation: floatIcon 3s ease-in-out infinite; }

    /* ── Section text ── */
    .section-title { color: #3b1d6b; }
    .section-body  { color: #564a6e; line-height: 1.7; }
    .section-body p { margin-bottom: .85rem; }
    .subsection-title { color: #5b3a8a; }
    .subsection-block {
        border-left: 2px solid #ddd6fe;
        padding-left: 1rem;
    }

    /* ── Sidebar TOC ── */
    .sticky-toc {
        position: sticky;
        top: 100px;
    }
    .toc-heading { color: #2e1f47; }
    .toc-nav .toc-link {
        font-size: 0.875rem;
        padding: 0.5rem 0.75rem;
        border-radius: 0.75rem;
        color: #8b7aa3;
        transition: all .2s ease;
    }
    .toc-nav .toc-link:hover {
        color: #7c3aed;
        text-decoration: none;
    }
    .toc-nav .toc-link.active {
        background: linear-gradient(135deg, #ede9fe, #fae8ff);
        color: #6d28d9;
        font-weight: 600;
    }

    /* ── Contact box ── */
    .contact-box {
        background: linear-gradient(135deg, #f5f0ff, #fdf0ff);
        border: 1px solid rgba(139, 92, 246, .2);
    }
    .contact-title { color: #5b21b6; }
    .contact-text { color: #6d6080; }

    .btn-purple {
        background: linear-gradient(135deg, #7c3aed, #c026d3);
        border: none;
        font-weight: 600;
        font-size: 0.75rem;
        transition: all .2s ease;
    }
    .btn-purple:hover {
        opacity: .88;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(124, 58, 237, .3);
    }

    .footer-meta { color: #9b8fae; }
</style>
 @endsection

 