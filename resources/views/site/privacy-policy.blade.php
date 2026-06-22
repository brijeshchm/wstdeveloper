@extends('site.layouts.app')
@section('title', 'Privacy Policy | WebSolutionTechnology - User Data & Privacy Protection')
@section('description', 'Read the WebSolutionTechnology Privacy Policy to learn how we collect, use, store, and protect your personal data under the Digital Personal Data Protection Act 2023, IT Act 2000, and applicable Indian privacy laws.')
@section('keywords', 'WebSolutionTechnology privacy policy, DPDP Act 2023 compliance, user data protection India, data security policy, personal information policy, cookies policy, online privacy policy, business listing privacy, grievance officer, data fiduciary obligations')
@section('content')

@php
    $sections = [
        ['id' => 'introduction',    'label' => 'Introduction & Scope'],
        ['id' => 'data-collection', 'label' => 'Information We Collect'],
        ['id' => 'data-usage',      'label' => 'How We Use Data'],
        ['id' => 'data-sharing',    'label' => 'Sharing & Disclosure'],
        ['id' => 'data-security',   'label' => 'Security & Retention'],
        ['id' => 'user-rights',     'label' => 'Your Rights & Grievance'],
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
<div class="privacy-hero position-relative">
    <div class="container text-center py-5 position-relative" style="z-index: 10;">

        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill mb-4 hero-badge anim-1">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <span class="small font-weight-bold">Compliant with DPDP Act 2023 &amp; IT Act 2000</span>
        </div>

        <h1 class="display-4 font-weight-bold mb-3 anim-2">
            <span class="hero-title-dark">Privacy</span>
            <span class="shimmer-text"> Policy</span>
        </h1>

        <p class="lead mx-auto mb-4 anim-3 hero-subtext" style="max-width: 640px;">
            WebSolutionTechnology Pvt. Ltd. — How we collect, use, store, and protect your personal data under the Digital Personal Data Protection Act, 2023 and all applicable Indian privacy laws.
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
            <div class="d-flex align-items-center small hero-meta">
                <span class="dot dot-indigo mr-2"></span>
                Governed by laws of India
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
<div class="container py-5 position-relative" style="z-index: 10;" data-spy="scroll" data-target="#privacy-toc" data-offset="100">
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
                <ul id="privacy-toc" class="nav flex-column list-unstyled toc-nav">
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

            {{-- ─ 1. Introduction & Scope ─ --}}
            <section id="introduction" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="16" x2="12" y2="12"/>
                            <line x1="12" y1="8" x2="12.01" y2="8"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Introduction &amp; Scope</h2>
                </div>
                <div class="small section-body">
                    <p>This Privacy Policy ("<strong>Policy</strong>") is issued by <strong>WebSolutionTechnology Pvt. Ltd.</strong> ("WebSolutionTechnology", "Company", "we", "us", or "our"), a company incorporated under the Companies Act, 2013, having its registered office in India. This Policy governs the collection, processing, storage, transfer, and protection of personal data submitted to <strong>www.websolutiontechnology.com</strong> and our mobile applications (collectively, the "Platform").</p>

                    <p>I would not list every law in one bullet list unless it directly applies to your platform’s role. For a normal software company / website privacy policy, the safest core references are:</p>
                    <ul class="pl-4">
                        <li><strong>Digital Personal Data Protection Act, 2023</strong></li>
                        <li><strong>Information Technology Act, 2000</strong></li>
                        <li><strong>SPDI Rules, 2011</strong></li>
                        <li><strong>Consumer Protection (E-Commerce) Rules, 2020 </strong> (if you sell online / take orders / subscriptions through the website)</li>
                 
                    </ul>

              

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Acceptance &amp; Consent</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">By accessing or using the Platform, you (the Data Principal) confirm that you have read, understood, and consented to this Policy. As required under <strong>Section 6 of the DPDP Act, 2023</strong>, your consent is treated as free, specific, informed, unconditional, unambiguous, and given through a clear affirmative action. You have the right to withdraw consent at any time, subject to the conditions specified under this Policy.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Updates to this Policy</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">Web Solution Technology may revise this Policy to reflect changes in applicable Indian law, regulatory guidance from the <strong>Data Protection Board of India</strong>, or business practices. Material changes will be communicated through prominent notice on the Platform or via your registered email. Continued use of the Platform after such updates constitutes acceptance.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ 2. Information We Collect ─ --}}
            <section id="data-collection" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:.3s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <ellipse cx="12" cy="5" rx="9" ry="3"/>
                            <path d="M3 5v14a9 3 0 0 0 18 0V5"/>
                            <path d="M3 12a9 3 0 0 0 18 0"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Information We Collect</h2>
                </div>
                <div class="small section-body">
                    <p>In accordance with <strong>Section 4 of the DPDP Act, 2023</strong> and the principle of data minimization, WebSolutionTechnology collects only such personal data as is necessary to provide and improve our services. Categories of data collected include:</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">I would be more careful with these:</h3>
                        <div class="pl-3 subsection-block">
                            <ul class="pl-4">
                                <li><strong>IT Rules 2021</strong> Full name, date of birth, gender, profile photo</li>
                                <li><strong>Contact data:</strong> Email address, mobile number, residential address, city, pincode</li>
                                <li><strong>Account data:</strong> Login credentials, account preferences, communication preferences</li>
                                <li><strong>Business listing data:</strong> Business name, address, services, working hours, photos, descriptions (for business owners)</li>
                                <li><strong>Customer enquiry data:</strong> Service requirements, budget, urgency, preferred location</li>
                                <li><strong>User-generated content:</strong> Reviews, ratings, comments, photos uploaded by you</li>
                                <li><strong>Communication data:</strong> Messages, complaints, support tickets exchanged with us</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">B. Sensitive Personal Data or Information (SPDI)</h3>
                        <div class="pl-3 subsection-block">
                            <p>As defined under <strong>Rule 3 of the SPDI Rules, 2011</strong>, sensitive personal data may include:</p>
                            <ul class="pl-4">
                                <li>Financial information such as bank account, credit/debit card, UPI ID — collected only at the time of payment via secure third-party gateways</li>
                                <li>Passwords (stored only in hashed/encrypted form)</li>
                                <li>Government-issued identification (Aadhaar, PAN, etc.) — collected only where required for KYC of business listings, as mandated by applicable law</li>
                            </ul>
                            <p class="mb-0">SPDI is processed only with explicit consent and in compliance with <strong>Section 43A of the IT Act, 2000</strong>.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">C. Automatically Collected Data</h3>
                        <div class="pl-3 subsection-block">
                            <ul class="pl-4">
                                <li><strong>Device information:</strong> Device type, operating system, browser type, screen resolution</li>
                                <li><strong>Network information:</strong> IP address, internet service provider, approximate geographic location</li>
                                <li><strong>Usage data:</strong> Pages visited, search queries, click patterns, time spent, referral URL</li>
                                <li><strong>Cookies &amp; similar technologies:</strong> Session cookies, preference cookies, analytics cookies (Google Analytics, etc.)</li>
                            </ul>
                            <p class="mb-0">You may manage cookie preferences through your browser settings or our cookie consent banner.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">D. Data from Third-Party Sources</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">We may receive limited information from third-party sign-in providers (such as Google), payment processors, identity verification partners, and publicly available sources — strictly to verify identity, complete transactions, or enhance service delivery.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ 3. How We Use Data ─ --}}
            <section id="data-usage" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:.6s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"/>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">How We Use Your Personal Data</h2>
                </div>
                <div class="small section-body">
                    <p>WebSolutionTechnology processes personal data strictly for specified, lawful purposes in line with the <strong>principle of purpose limitation under Section 4 of the DPDP Act, 2023</strong>. We do not process personal data beyond the purposes disclosed to you at the time of collection.</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Purposes of Processing</h3>
                        <div class="pl-3 subsection-block">
                            <ul class="pl-4">
                                <li><strong>Service delivery:</strong> Creating your account, displaying business listings, facilitating leads, processing payments</li>
                                <li><strong>Communication:</strong> Sending transactional updates, OTPs, service confirmations, customer support responses</li>
                                <li><strong>Marketing (with consent):</strong> Promotional offers, newsletters, product updates — with an opt-out option in every communication</li>
                                <li><strong>Platform improvement:</strong> Analyzing usage patterns, improving search results, fixing bugs, A/B testing</li>
                                <li><strong>Fraud prevention &amp; security:</strong> Detecting suspicious activity, preventing unauthorized access, fulfilling anti-fraud obligations</li>
                                <li><strong>Verification:</strong> Validating business listings, certifying WebSolutionTechnology Verified businesses</li>
                                <li><strong>Legal &amp; regulatory compliance:</strong> Complying with court orders, statutory authorities, tax obligations, and applicable laws of India</li>
                                <li><strong>Dispute resolution:</strong> Enforcing our Terms, handling grievances, and resolving disputes</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Lawful Basis for Processing</h3>
                        <div class="pl-3 subsection-block">
                            <p>In accordance with <strong>Section 7 of the DPDP Act, 2023</strong>, we process personal data on one or more of the following legitimate uses:</p>
                            <ul class="pl-4 mb-0">
                                <li>The specific purpose for which the Data Principal has voluntarily provided their data and has not indicated non-consent</li>
                                <li>Compliance with any judgment, decree, or order issued under Indian law</li>
                                <li>Responding to medical emergencies or threats to life or health</li>
                                <li>Performance of state functions (where applicable)</li>
                                <li>Employment-related purposes (for WebSolutionTechnology staff)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">No Automated Decision-Making</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">WebSolutionTechnology does not make solely automated decisions that produce legal or similarly significant effects on Data Principals. Any AI-assisted features (such as ranking or recommendations) are designed to inform — not replace — human judgment.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ 4. Sharing & Disclosure ─ --}}
            <section id="data-sharing" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:.9s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="18" cy="5" r="3"/>
                            <circle cx="6" cy="12" r="3"/>
                            <circle cx="18" cy="19" r="3"/>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Sharing &amp; Disclosure of Data</h2>
                </div>
                <div class="small section-body">
                    <p>WebSolutionTechnology does not sell personal data. We share personal data only in the limited circumstances described below, and only to the extent strictly necessary for the disclosed purpose.</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">A. With Listed Businesses</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">When a Data Principal submits an enquiry for a service, relevant contact and requirement information (name, mobile number, city, service required) is shared with the matched business(es) to enable direct communication. By submitting an enquiry, you consent to this disclosure.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">B. With Data Processors / Service Providers</h3>
                        <div class="pl-3 subsection-block">
                            <p>We engage trusted Data Processors under <strong>Section 8(2) of the DPDP Act, 2023</strong> bound by written contracts, including:</p>
                            <ul class="pl-4 mb-0">
                                <li>Cloud hosting providers (AWS / Google Cloud / Azure — India region)</li>
                                <li>Payment gateways (Razorpay, PayU, Cashfree, etc.) regulated by RBI</li>
                                <li>SMS, OTP, and email communication services</li>
                                <li>Analytics partners (Google Analytics — anonymized data only)</li>
                                <li>Customer support and CRM tools</li>
                                <li>KYC and identity verification partners</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">C. Legal &amp; Regulatory Disclosures</h3>
                        <div class="pl-3 subsection-block">
                            <p>We may disclose personal data when required by law, including in response to:</p>
                            <ul class="pl-4 mb-0">
                                <li>Court orders, summons, or subpoenas from any court of competent jurisdiction in India</li>
                                <li>Lawful requests from government authorities, law enforcement agencies, or regulators under the <strong>IT Act, 2000</strong>, <strong>IT Rules 2021</strong>, or other applicable laws</li>
                                <li>Tax authorities under the <strong>Income Tax Act, 1961</strong> and <strong>CGST Act, 2017</strong></li>
                                <li>Investigations into violations of our Terms or applicable laws, including the <strong>Bharatiya Nyaya Sanhita, 2023</strong></li>
                                <li>Protection of the rights, property, or safety of WebSolutionTechnology, our users, or the public</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">D. Business Transfers</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">In the event of a merger, acquisition, restructuring, or sale of assets, personal data may be transferred to the successor entity, subject to written commitments to honour this Policy and applicable law.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">E. Cross-Border Data Transfer</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">In accordance with <strong>Section 16 of the DPDP Act, 2023</strong>, personal data may be transferred outside India only to such countries or territories as notified by the Central Government and subject to specified safeguards. Currently, all primary user data is hosted within India.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ 5. Security & Retention ─ --}}
            <section id="data-security" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:1.2s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path d="M9 12l2 2 4-4"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Data Security &amp; Retention</h2>
                </div>
                <div class="small section-body">
                    <p>WebSolutionTechnology is committed to safeguarding personal data through Reasonable Security Practices and Procedures as mandated by <strong>Rule 8 of the SPDI Rules, 2011</strong> and the security obligations of a Data Fiduciary under <strong>Section 8(5) of the DPDP Act, 2023</strong>.</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Security Measures Implemented</h3>
                        <div class="pl-3 subsection-block">
                            <ul class="pl-4 mb-0">
                                <li><strong>Transport-layer encryption (TLS/SSL)</strong> for all data in transit</li>
                                <li><strong>Encryption at rest</strong> for sensitive personal data including passwords (bcrypt/argon2 hashed)</li>
                                <li><strong>Role-based access controls (RBAC)</strong> — personal data is accessed only by authorized personnel on a need-to-know basis</li>
                                <li><strong>Firewalls, intrusion detection, and anti-malware</strong> on all production systems</li>
                                <li><strong>Regular security audits &amp; vulnerability assessments</strong></li>
                                <li><strong>PCI DSS-compliant payment processing</strong> — card data is never stored on our servers</li>
                                <li><strong>Adherence to ISO/IEC 27001 information-security best practices</strong></li>
                                <li><strong>Employee training</strong> on data protection and confidentiality</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Data Breach Notification</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">In the event of any personal data breach, WebSolutionTechnology shall, in compliance with <strong>Section 8(6) of the DPDP Act, 2023</strong>, notify both the <strong>Data Protection Board of India</strong> and each affected Data Principal in the manner and within the timeframe prescribed by the Central Government.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">Retention Periods</h3>
                        <div class="pl-3 subsection-block">
                            <p>Personal data is retained only for as long as necessary to fulfil the purpose of collection, in accordance with the principle of <strong>storage limitation under Section 8(7) of the DPDP Act, 2023</strong>:</p>
                            <ul class="pl-4">
                                <li><strong>Active account data:</strong> Retained for the duration of the account</li>
                                <li><strong>Transactional records:</strong> Retained for 8 years to comply with tax and audit requirements under the Income Tax Act, 1961 and CGST Act, 2017</li>
                                <li><strong>Communication logs:</strong> 180 days from date of communication, unless required for dispute resolution</li>
                                <li><strong>Marketing data:</strong> Until consent is withdrawn</li>
                                <li><strong>Inactive accounts:</strong> Personal data is anonymized or deleted after 3 years of inactivity, unless legally required to be retained</li>
                            </ul>
                            <p class="mb-0">Upon expiry of the retention period or upon valid erasure request, personal data is securely deleted or anonymized.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">User Responsibility</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">While we deploy industry-standard safeguards, no method of transmission over the internet is 100% secure. Users are responsible for keeping login credentials confidential and notifying us immediately at <strong>security@websolutiontechnology.com</strong> in case of suspected unauthorized access.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ─ 6. Your Rights & Grievance ─ --}}
            <section id="user-rights" class="scroll-reveal glass-card rounded-lg p-4 p-md-5 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="icon-box-lg icon-grad icon-float mr-3" style="animation-delay:1.5s">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                            <polyline points="16 11 18 13 22 9"/>
                        </svg>
                    </div>
                    <h2 class="h4 font-weight-bold mb-0 section-title">Your Rights &amp; Grievance Redressal</h2>
                </div>
                <div class="small section-body">
                    <p>As a Data Principal, you have specific rights under the <strong>Digital Personal Data Protection Act, 2023</strong>. WebSolutionTechnology is committed to enabling the exercise of these rights in a free, fair, and transparent manner.</p>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">A. Your Rights Under DPDP Act, 2023</h3>
                        <div class="pl-3 subsection-block">
                            <ul class="pl-4 mb-0">
                                <li><strong>Right to Information (Section 11):</strong> Obtain a summary of personal data being processed by us and a description of activities undertaken</li>
                                <li><strong>Right to Correction &amp; Erasure (Section 12):</strong> Request correction of inaccurate or misleading data, completion of incomplete data, updation of outdated data, and erasure of personal data no longer required</li>
                                <li><strong>Right of Grievance Redressal (Section 13):</strong> File a complaint with our Grievance Officer regarding any action or inaction of WebSolutionTechnology</li>
                                <li><strong>Right to Nominate (Section 14):</strong> Nominate another individual to exercise your rights in the event of death or incapacity</li>
                                <li><strong>Right to Withdraw Consent (Section 6(4)):</strong> Withdraw consent at any time with effect prospectively; we shall cease processing within a reasonable period</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">B. How to Exercise Your Rights</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">To exercise any of the above rights, submit a written request to <strong>privacy@websolutiontechnology.com</strong> with the subject line "Data Principal Rights Request". Provide your registered email/mobile, the right you wish to exercise, and any supporting documentation. We will verify your identity and respond within a reasonable period, typically within thirty (30) days.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">C. Children's Personal Data</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">In compliance with <strong>Section 9 of the DPDP Act, 2023</strong>, WebSolutionTechnology does not knowingly process personal data of individuals under the age of 18 years without verifiable parental consent. We do not undertake tracking, behavioural monitoring, or targeted advertising directed at children. If you become aware that a child has provided us with personal data, please contact us immediately for prompt deletion.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">D. Grievance Officer</h3>
                        <div class="pl-3 subsection-block">
                            <p>In compliance with <strong>Rule 5(9) of the SPDI Rules, 2011</strong>, <strong>Rule 3(2)(a) of the IT Rules 2021</strong>, and <strong>Section 8(10) of the DPDP Act, 2023</strong>, WebSolutionTechnology has appointed a Grievance Officer to address concerns relating to personal data processing.</p>
                            <ul class="list-unstyled mt-3 mb-0">
                                <li><strong>Name:</strong> Grievance Officer, WebSolutionTechnology Pvt. Ltd.</li>
                                <li><strong>Email:</strong> info@websolutiontechnology.com</li>
                                <li><strong>Phone:</strong> +91-93-183-454-97</li>
                               
                                <li><strong>Working hours:</strong> Monday to Friday, 10:00 AM – 6:00 PM IST</li>
                            </ul>
                            <p class="mt-3 mb-0">The Grievance Officer shall acknowledge receipt within <strong>twenty-four (24) hours</strong> and resolve the grievance within <strong>fifteen (15) days</strong> from the date of receipt, as mandated under IT Rules 2021.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">E. Data Protection Board of India</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">If you remain unsatisfied with our response, you may approach the <strong>Data Protection Board of India</strong> constituted under <strong>Chapter V of the DPDP Act, 2023</strong> for adjudication. You may also lodge complaints regarding consumer rights with the <strong>National Consumer Helpline</strong> at <strong>1915</strong> or via <strong>consumerhelpline.gov.in</strong>.</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="font-weight-bold subsection-title mb-2" style="font-size: 1rem;">F. Governing Law &amp; Jurisdiction</h3>
                        <div class="pl-3 subsection-block">
                            <p class="mb-0">This Policy is governed by and construed in accordance with the laws of the Republic of India. Any disputes shall be subject to the exclusive jurisdiction of the courts at <strong>[Insert City]</strong>, India, without prejudice to the powers of the Data Protection Board of India.</p>
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
                                <div class="font-weight-bold small mb-1 contact-title">Privacy Concerns? We're Here.</div>
                                <p class="small mb-0 contact-text">For any questions, data requests, or privacy concerns, please use the channels below. We respond within 24 hours.</p>
                                <div class="mt-3 d-flex flex-wrap" style="gap: 0.5rem;">
                                    <a href="mailto:privacy@websolutiontechnology.com" class="btn btn-purple btn-sm rounded-pill text-white px-3">
                                        Privacy Requests
                                    </a>
                                    <a href="mailto:grievance@websolutiontechnology.com" class="btn btn-purple btn-sm rounded-pill text-white px-3">
                                        Grievance Officer
                                    </a>
                                    <a href="mailto:security@websolutiontechnology.com" class="btn btn-purple btn-sm rounded-pill text-white px-3">
                                        Report a Breach
                                    </a>
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
    document.querySelectorAll('#privacy-toc .toc-link').forEach(function (link) {
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
    .privacy-hero {
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
    .dot-indigo { background-color: #6366f1; }
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