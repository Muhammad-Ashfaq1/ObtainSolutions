@extends('layouts.public')

@section('title', 'ObtainSolutions - Software House & Digital Agency | Web, App, API & SaaS Development')
@section('meta_description', 'ObtainSolutions is a software house and digital agency specializing in custom web apps, mobile apps, APIs, and SaaS platforms. We help startups and businesses design, build, and scale digital products with PHP, Laravel, and modern frontends.')
@section('meta_keywords', 'software house, digital agency, web development agency, custom software development, laravel development company, mobile app agency, saas development company, api development services, offshore development team, product engineering, ui ux agency, pakistan software house')

@php
    $faqs = [
        ['q' => 'What does ObtainSolutions do as a software house?', 'a' => 'We are a full-service software house and digital agency. We design, develop, and maintain web applications, mobile apps, APIs, and SaaS platforms — acting as your outsourced product engineering team from idea to launch and beyond.'],
        ['q' => 'Who do you typically work with?', 'a' => 'We partner with startups building their first product, growing businesses that need a reliable dev team, and established companies modernizing legacy systems. We also support agencies that need extra engineering capacity.'],
        ['q' => 'What technologies does your agency specialize in?', 'a' => 'Our core stack is PHP & Laravel on the backend, with React, Vue, and modern JavaScript on the frontend. We also work with Node.js, MySQL/PostgreSQL, Redis, AWS, Docker, and CI/CD pipelines.'],
        ['q' => 'Can you work as an extension of our in-house team?', 'a' => 'Yes. Many clients hire us as a dedicated development partner — we join your Slack, follow your processes, and integrate with your existing codebase, designers, or product managers.'],
        ['q' => 'How does project pricing work?', 'a' => 'We offer fixed-scope quotes for well-defined projects and monthly retainers for ongoing development. After a free discovery call we provide a clear proposal with milestones, deliverables, and transparent pricing.'],
        ['q' => 'Do you handle design as well as development?', 'a' => 'Yes. Our agency covers UI/UX design, wireframing, and prototyping alongside engineering — so you get a cohesive product without juggling multiple vendors.'],
        ['q' => 'What happens after the product launches?', 'a' => 'We offer post-launch maintenance, monitoring, bug fixes, and feature development on retainer. Most clients stay with us long-term as their product evolves.'],
        ['q' => 'How do we get started?', 'a' => 'Reach out via the contact form or WhatsApp. We will schedule a free discovery call, understand your goals, and send a tailored proposal with timeline and next steps.'],
    ];
@endphp

@section('content')
<div class="scroll-progress" aria-hidden="true"><span id="scrollProgressBar"></span></div>
<nav class="navbar navbar-expand-lg landing-navbar sticky-top py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-3" href="#home">
            <img src="{{ asset('assets/img/logo.png') }}" alt="ObtainSolutions logo" width="44" height="44" style="border-radius: 0.75rem;">
            <span>
                <span class="fw-bolder fs-4 text-heading d-block lh-1">ObtainSolutions</span>
                <small class="text-muted">Software House &amp; Digital Agency</small>
            </span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar" aria-controls="publicNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="ti ti-menu-2 fs-2 text-heading"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="publicNavbar">
            <ul class="navbar-nav mx-auto align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#work">Solutions</a></li>
                <li class="nav-item"><a class="nav-link" href="#process">Process</a></li>
                <li class="nav-item"><a class="nav-link" href="#pricing">Engagements</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>

            <div class="d-flex flex-column flex-lg-row gap-2 mt-3 mt-lg-0">
                <a href="https://wa.me/923157364689" target="_blank" class="btn btn-label-secondary"><i class="ti ti-brand-whatsapp me-1"></i> WhatsApp</a>
                <a href="#contact" class="btn btn-warning">Get a Free Quote</a>
            </div>
        </div>
    </div>
</nav>

<main>
    <section class="landing-section pt-5 pb-5" id="home">
        <div class="container">
            <div class="hero-shell p-4 p-lg-5">
                <span class="hero-glow"></span>
                <span class="hero-deco d-none d-lg-inline-flex" style="top: 2.5rem; right: 42%; animation-delay: .2s;"><i class="ti ti-code"></i></span>
                <span class="hero-deco d-none d-lg-inline-flex" style="bottom: 3rem; right: 46%; animation-delay: 1.1s;"><i class="ti ti-cloud"></i></span>
                <span class="hero-deco d-none d-lg-inline-flex" style="top: 9rem; right: 4%; animation-delay: 1.8s;"><i class="ti ti-brand-laravel"></i></span>
                <div class="row align-items-center g-4 g-xl-5 position-relative">
                    <div class="col-lg-7">
                        <span class="section-kicker mb-3 bg-white bg-opacity-10 border-0 text-white">
                            <i class="ti ti-building-skyscraper"></i>
                            Software House &amp; Digital Agency
                        </span>

                        <h1 class="hero-title fw-bold text-white mb-3">
                            Your outsourced <span class="text-gradient">product engineering team</span> for web, mobile, and SaaS.
                        </h1>

                        <p class="hero-copy text-white text-opacity-75 mb-4 hero-subtext">
                            ObtainSolutions is a software house and digital agency that designs, builds, and scales custom digital products for startups and businesses worldwide. From MVPs and client portals to full SaaS platforms — we handle strategy, UI/UX, development, and deployment so you can focus on growing your business.
                        </p>

                        <div class="hero-chip-row mb-4">
                            <span class="hero-chip"><i class="ti ti-users-group"></i> Dedicated dev teams</span>
                            <span class="hero-chip"><i class="ti ti-brand-laravel"></i> Laravel &amp; PHP specialists</span>
                            <span class="hero-chip"><i class="ti ti-palette"></i> Design + development</span>
                        </div>

                        <div class="hero-actions d-flex flex-column flex-sm-row gap-2 gap-lg-3">
                            <a href="#contact" class="btn btn-warning btn-lg">Book a Free Consultation</a>
                            <a href="#services" class="btn btn-outline-light btn-lg">Explore Our Services</a>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="hero-visual-card p-3 p-lg-4">
                            <div class="mockup-window" aria-hidden="true">
                                <div class="mockup-topbar">
                                    <span class="mockup-dot"></span>
                                    <span class="mockup-dot"></span>
                                    <span class="mockup-dot"></span>
                                    <span class="mockup-url"><i class="ti ti-lock icon-base icon-xs"></i> obtainsolutions.com/app</span>
                                </div>
                                <div class="mockup-body">
                                    <div class="mockup-stats">
                                        <div class="mockup-stat">
                                            <small>Deploys / wk</small>
                                            <div class="mockup-stat-value">24</div>
                                            <span class="mockup-trend up"><i class="ti ti-trending-up icon-base icon-xs"></i> +8</span>
                                        </div>
                                        <div class="mockup-stat">
                                            <small>Uptime</small>
                                            <div class="mockup-stat-value">99.9%</div>
                                            <span class="mockup-trend up"><i class="ti ti-trending-up icon-base icon-xs"></i> stable</span>
                                        </div>
                                        <div class="mockup-stat">
                                            <small>Open Issues</small>
                                            <div class="mockup-stat-value">3</div>
                                            <span class="mockup-trend warn"><i class="ti ti-clock icon-base icon-xs"></i> in review</span>
                                        </div>
                                    </div>
                                    <div class="mockup-chart">
                                        <span style="--h: 42%"></span>
                                        <span style="--h: 68%"></span>
                                        <span style="--h: 54%"></span>
                                        <span style="--h: 82%"></span>
                                        <span style="--h: 60%"></span>
                                        <span style="--h: 92%"></span>
                                        <span style="--h: 74%"></span>
                                    </div>
                                    <div class="mockup-rows">
                                        <div class="mockup-row">
                                            <span class="mockup-row-icon"><i class="ti ti-world-www"></i></span>
                                            <div class="mockup-row-text">
                                                <div class="mockup-row-title">Web App — Customer Portal</div>
                                                <div class="mockup-row-sub">Laravel + React · CI passing</div>
                                            </div>
                                            <span class="mockup-badge paid">Live</span>
                                        </div>
                                        <div class="mockup-row">
                                            <span class="mockup-row-icon"><i class="ti ti-api"></i></span>
                                            <div class="mockup-row-text">
                                                <div class="mockup-row-title">REST API — Payments</div>
                                                <div class="mockup-row-sub">v2 endpoints · documented</div>
                                            </div>
                                            <span class="mockup-badge wip">Building</span>
                                        </div>
                                        <div class="mockup-row">
                                            <span class="mockup-row-icon"><i class="ti ti-device-mobile"></i></span>
                                            <div class="mockup-row-text">
                                                <div class="mockup-row-title">Mobile App — Delivery</div>
                                                <div class="mockup-row-sub">Release candidate ready</div>
                                            </div>
                                            <span class="mockup-badge paid">Shipped</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="floating-panel" style="top: 2.4rem; right: -0.5rem;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="floating-panel-icon success"><i class="ti ti-circle-check"></i></span>
                                    <div>
                                        <div class="fw-semibold">Deploy successful</div>
                                        <small class="text-muted">Production updated in 42s</small>
                                    </div>
                                </div>
                            </div>

                            <div class="floating-panel" style="bottom: 2rem; left: -0.5rem;">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="floating-panel-icon info"><i class="ti ti-users"></i></span>
                                    <div>
                                        <div class="fw-semibold">Happy clients</div>
                                        <small class="text-muted">Products shipped worldwide</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-2 pt-0">
        <div class="container">
            <p class="text-center text-muted text-uppercase fw-semibold small mb-3" style="letter-spacing: .08em;">Our engineering stack &amp; tools</p>
            @php
                $stack = [
                    ['icon' => 'ti-brand-php', 'label' => 'PHP'],
                    ['icon' => 'ti-brand-laravel', 'label' => 'Laravel'],
                    ['icon' => 'ti-brand-react', 'label' => 'React'],
                    ['icon' => 'ti-brand-vue', 'label' => 'Vue'],
                    ['icon' => 'ti-brand-nodejs', 'label' => 'Node.js'],
                    ['icon' => 'ti-brand-javascript', 'label' => 'JavaScript'],
                    ['icon' => 'ti-brand-mysql', 'label' => 'MySQL'],
                    ['icon' => 'ti-brand-aws', 'label' => 'AWS'],
                    ['icon' => 'ti-brand-tailwind', 'label' => 'Tailwind'],
                    ['icon' => 'ti-brand-docker', 'label' => 'Docker'],
                ];
            @endphp
            <div class="industry-strip">
                <div class="industry-track">
                    @foreach ([0, 1] as $copy)
                        @foreach ($stack as $tech)
                            <span class="industry-chip" @if($copy === 1) aria-hidden="true" @endif>
                                <i class="ti {{ $tech['icon'] }}"></i>
                                {{ $tech['label'] }}
                            </span>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section section-soft has-deco" id="about">
        <span class="section-deco deco-cyan deco-float" style="top: 2rem; right: -2rem; font-size: 12rem;"><i class="ti ti-building"></i></span>
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-reveal="left">
                    <img src="{{ asset('assets/img/saas-services.png') }}" alt="ObtainSolutions software house team" class="img-fluid rounded-4">
                </div>
                <div class="col-lg-6" data-reveal="right">
                    <span class="section-kicker mb-3">
                        <i class="ti ti-info-circle"></i>
                        About ObtainSolutions
                    </span>
                    <h2 class="fw-bolder mb-3">A software house built for founders, product teams, and growing businesses.</h2>
                    <p class="text-muted fs-5 mb-4">
                        We are a Pakistan-based software house and digital agency serving clients locally and internationally. Our team combines product thinking, UI/UX design, and senior engineering to deliver web apps, mobile apps, APIs, and SaaS platforms that solve real business problems — not just tick feature lists.
                    </p>
                    <p class="text-muted mb-4">
                        Whether you need a full product built from scratch, extra developers to accelerate your roadmap, or a legacy system modernized on Laravel — we plug in as a reliable extension of your team and stay accountable to outcomes.
                    </p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex gap-3">
                                <span class="landing-icon flex-shrink-0"><i class="ti ti-map-pin"></i></span>
                                <div>
                                    <h6 class="mb-1">Based in Pakistan</h6>
                                    <p class="text-muted small mb-0">Serving clients worldwide with competitive rates and senior talent.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex gap-3">
                                <span class="landing-icon flex-shrink-0"><i class="ti ti-clock-24"></i></span>
                                <div>
                                    <h6 class="mb-1">Agile delivery</h6>
                                    <p class="text-muted small mb-0">Sprint-based development with weekly demos and transparent progress.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-2 pt-0">
        <div class="container">
            <p class="text-center text-muted text-uppercase fw-semibold small mb-3" style="letter-spacing: .08em;">Who we partner with</p>
            @php
                $clients = [
                    ['icon' => 'ti-rocket', 'label' => 'Startups & MVPs'],
                    ['icon' => 'ti-building-store', 'label' => 'SMBs & Enterprises'],
                    ['icon' => 'ti-shopping-cart', 'label' => 'E-commerce Brands'],
                    ['icon' => 'ti-school', 'label' => 'EdTech & LMS'],
                    ['icon' => 'ti-stethoscope', 'label' => 'Healthcare & Clinics'],
                    ['icon' => 'ti-truck-delivery', 'label' => 'Logistics & Operations'],
                    ['icon' => 'ti-chart-bar', 'label' => 'FinTech & SaaS'],
                    ['icon' => 'ti-briefcase', 'label' => 'Agencies (White-label)'],
                    ['icon' => 'ti-world', 'label' => 'International Clients'],
                ];
            @endphp
            <div class="industry-strip">
                <div class="industry-track">
                    @foreach ([0, 1] as $copy)
                        @foreach ($clients as $client)
                            <span class="industry-chip" @if($copy === 1) aria-hidden="true" @endif>
                                <i class="ti {{ $client['icon'] }}"></i>
                                {{ $client['label'] }}
                            </span>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section has-deco" id="features">
        <span class="section-deco deco-spin" style="top: -2rem; right: -3rem; font-size: 16rem;"><i class="ti ti-code"></i></span>
        <span class="deco-dots" style="bottom: 3rem; left: 2%;"></span>
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-reveal="left">
                    <span class="section-kicker mb-3">
                        <i class="ti ti-bolt"></i>
                        Why Choose Our Agency
                    </span>
                    <h2 class="fw-bolder mb-3">One team for strategy, design, development, and delivery — without the overhead of hiring in-house.</h2>
                    <p class="text-muted fs-5 mb-4">
                        Hiring and managing an internal dev team is expensive and slow. As your software house partner, we give you senior engineers, designers, and project leads on demand — with the flexibility to scale up or down as your product evolves.
                    </p>

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex gap-3">
                            <span class="landing-icon"><i class="ti ti-users-group"></i></span>
                            <div>
                                <h6 class="mb-1">Dedicated product teams</h6>
                                <p class="text-muted mb-0">Get a consistent squad of developers and a project lead who learn your product deeply — not a rotating cast of freelancers.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <span class="landing-icon"><i class="ti ti-palette"></i></span>
                            <div>
                                <h6 class="mb-1">Design + engineering under one roof</h6>
                                <p class="text-muted mb-0">UI/UX designers and developers work together from day one, so what gets designed is what gets built — beautifully.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <span class="landing-icon"><i class="ti ti-shield-check"></i></span>
                            <div>
                                <h6 class="mb-1">Enterprise-grade quality</h6>
                                <p class="text-muted mb-0">Code reviews, automated testing, CI/CD, and documentation — the standards you would expect from a top-tier agency.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="landing-card">
                                <span class="landing-icon mb-3"><i class="ti ti-rocket"></i></span>
                                <h5 class="mb-2">MVP to market fast</h5>
                                <p class="text-muted mb-0">Launch your first version in weeks, not months — validated architecture that won't need a rewrite later.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="landing-card">
                                <span class="landing-icon mb-3"><i class="ti ti-arrows-maximize"></i></span>
                                <h5 class="mb-2">Scale as you grow</h5>
                                <p class="text-muted mb-0">Add developers, features, or entire modules without rebuilding from scratch.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="landing-card">
                                <span class="landing-icon mb-3"><i class="ti ti-world"></i></span>
                                <h5 class="mb-2">Global delivery, local rates</h5>
                                <p class="text-muted mb-0">Senior engineering talent at competitive agency rates with timezone-friendly communication.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="landing-card">
                                <span class="landing-icon mb-3"><i class="ti ti-file-certificate"></i></span>
                                <h5 class="mb-2">Full IP ownership</h5>
                                <p class="text-muted mb-0">You own 100% of the code, designs, and documentation we deliver — no lock-in.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section section-soft has-deco" id="services">
        <span class="section-deco deco-cyan deco-float" style="top: 4rem; left: -2.5rem; font-size: 13rem;"><i class="ti ti-devices-code"></i></span>
        <span class="deco-road" style="top: 2.5rem; right: 8%; transform: rotate(-8deg);"></span>
        <span class="deco-blob" style="bottom: -5rem; right: -4rem;"></span>
        <div class="container">
            <div class="row align-items-start g-5">
                <div class="col-lg-4" data-reveal="left">
                    <span class="section-kicker mb-3">
                        <i class="ti ti-tools"></i>
                        Agency Services
                    </span>
                    <h2 class="fw-bolder mb-3">End-to-end software development services for every stage of your product.</h2>
                    <p class="text-muted fs-5 mb-0">
                        As a full-service digital agency, we cover everything from product discovery and UI/UX design to backend engineering, mobile apps, cloud deployment, and long-term support — so you never need to coordinate multiple vendors.
                    </p>
                </div>

                <div class="col-lg-8">
                    <div class="services-grid">
                        @foreach ([
                            'Product discovery & requirements',
                            'UI/UX design & prototyping',
                            'Custom web application development',
                            'Mobile app development (iOS & Android)',
                            'SaaS & multi-tenant platforms',
                            'REST & GraphQL API development',
                            'PHP & Laravel backend engineering',
                            'React / Vue frontend development',
                            'E-commerce & payment integrations',
                            'CRM, ERP & business automation',
                            'Cloud hosting & DevOps (AWS, Docker)',
                            'QA, testing & performance optimization',
                            'Legacy system modernization',
                            'Dedicated development teams',
                            'White-label development for agencies',
                            'Maintenance & SLA support',
                        ] as $service)
                            <div class="service-pill">
                                <span class="service-dot"></span>
                                <span class="fw-medium">{{ $service }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section has-deco" id="work">
        <span class="section-deco deco-spin" style="bottom: -3rem; left: -3rem; font-size: 15rem;"><i class="ti ti-stack-2"></i></span>
        <span class="deco-dots" style="top: 2rem; right: 3%;"></span>
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 760px;">
                <span class="section-kicker mb-3">
                    <i class="ti ti-layout-grid"></i>
                    Solutions We Deliver
                </span>
                <h2 class="fw-bolder mb-3">Digital products our agency builds for clients across industries.</h2>
                <p class="text-muted fs-5 mb-0">
                    From customer-facing apps to internal business tools — we engineer solutions that improve operations, increase revenue, and delight users.
                </p>
            </div>

            <div class="row g-3">
                @foreach ([
                    ['icon' => 'ti-world-www', 'title' => 'Web applications & portals', 'text' => 'Customer portals, admin dashboards, booking systems, and business web apps built with Laravel and modern JS.'],
                    ['icon' => 'ti-device-mobile', 'title' => 'Mobile applications', 'text' => 'Native and cross-platform mobile apps connected to robust APIs and real-time backends.'],
                    ['icon' => 'ti-cloud-cog', 'title' => 'SaaS platforms', 'text' => 'Subscription-based products with multi-tenancy, billing, roles, onboarding, and admin panels.'],
                    ['icon' => 'ti-api', 'title' => 'APIs & integrations', 'text' => 'REST/GraphQL APIs and integrations with Stripe, PayPal, Twilio, CRMs, and third-party services.'],
                    ['icon' => 'ti-shopping-cart', 'title' => 'E-commerce solutions', 'text' => 'Online stores, marketplaces, and custom checkout flows with inventory and order management.'],
                    ['icon' => 'ti-brand-laravel', 'title' => 'Laravel business systems', 'text' => 'Custom ERPs, CRMs, workflow tools, and internal systems tailored to your operations.'],
                    ['icon' => 'ti-palette', 'title' => 'UI/UX & product design', 'text' => 'Wireframes, prototypes, and polished interfaces that convert users and strengthen your brand.'],
                    ['icon' => 'ti-chart-bar', 'title' => 'Analytics & reporting', 'text' => 'Dashboards, data pipelines, and reporting tools that turn raw data into actionable insights.'],
                    ['icon' => 'ti-lifebuoy', 'title' => 'Support & evolution', 'text' => 'Post-launch maintenance, feature roadmaps, and performance tuning to keep your product competitive.'],
                ] as $item)
                    <div class="col-md-6 col-xl-4">
                        <div class="landing-card">
                            <span class="landing-icon mb-3"><i class="ti {{ $item['icon'] }}"></i></span>
                            <h5 class="mb-2">{{ $item['title'] }}</h5>
                            <p class="text-muted mb-0">{{ $item['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="landing-section section-soft has-deco" id="process">
        <span class="section-deco deco-cyan deco-float" style="top: 3rem; right: -2rem; font-size: 12rem;"><i class="ti ti-route"></i></span>
        <span class="deco-blob" style="top: -4rem; left: -5rem;"></span>
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5" data-reveal="left">
                    <span class="section-kicker mb-3">
                        <i class="ti ti-route"></i>
                        Our Agency Process
                    </span>
                    <h2 class="fw-bolder mb-3">A proven delivery framework used across every client engagement.</h2>
                    <p class="text-muted fs-5 mb-4">
                        We follow a structured yet flexible process — whether you are launching an MVP, scaling a SaaS product, or modernizing a legacy system. You stay in the loop at every stage.
                    </p>
                    <img src="{{ asset('assets/img/web-development.jpg') }}" alt="ObtainSolutions development process" class="img-fluid rounded-4">
                </div>

                <div class="col-lg-7">
                    <div class="landing-card">
                        <div class="timeline-step">
                            <span class="timeline-number">1</span>
                            <h5 class="mb-1">Discovery &amp; scoping</h5>
                            <p class="text-muted mb-0">Free consultation to understand your vision, users, budget, and timeline. We define scope and recommend the right engagement model.</p>
                        </div>
                        <div class="timeline-step">
                            <span class="timeline-number">2</span>
                            <h5 class="mb-1">Design &amp; architecture</h5>
                            <p class="text-muted mb-0">Wireframes, UI mockups, and technical architecture — approved by you before development begins.</p>
                        </div>
                        <div class="timeline-step">
                            <span class="timeline-number">3</span>
                            <h5 class="mb-1">Agile development sprints</h5>
                            <p class="text-muted mb-0">Two-week sprints with demos, code reviews, and continuous integration so you see real progress every week.</p>
                        </div>
                        <div class="timeline-step">
                            <span class="timeline-number">4</span>
                            <h5 class="mb-1">QA, launch &amp; handover</h5>
                            <p class="text-muted mb-0">Thorough testing, production deployment, documentation, and knowledge transfer to your team.</p>
                        </div>
                        <div class="timeline-step">
                            <span class="timeline-number">5</span>
                            <h5 class="mb-1">Grow &amp; iterate</h5>
                            <p class="text-muted mb-0">Ongoing retainer for new features, optimizations, and support as your product and business evolve.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section has-deco">
        <span class="deco-road" style="top: 3rem; left: 6%; transform: rotate(6deg);"></span>
        <span class="deco-dots" style="bottom: 2rem; right: 3%;"></span>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6" data-reveal="left">
                    <div class="landing-card">
                        <span class="section-kicker mb-3">
                            <i class="ti ti-briefcase"></i>
                            Business Benefits
                        </span>
                        <h3 class="fw-bolder mb-3">Why businesses hire ObtainSolutions instead of building an in-house team.</h3>
                        <div class="row g-3">
                            @foreach ([
                                'No hiring delays — start in days, not months',
                                'Senior developers at a fraction of in-house cost',
                                'Design, backend, frontend, and DevOps in one agency',
                                'Flexible scaling — ramp up or down per sprint',
                                'Proven Laravel & PHP expertise across 50+ projects',
                                'Full code ownership and transparent billing',
                            ] as $benefit)
                                <div class="col-12">
                                    <div class="d-flex gap-3">
                                        <span class="landing-icon flex-shrink-0" style="width: 2.6rem; height: 2.6rem;"><i class="ti ti-check"></i></span>
                                        <div class="fw-medium">{{ $benefit }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-reveal="right">
                    <div class="landing-card">
                        <span class="section-kicker mb-3">
                            <i class="ti ti-user-heart"></i>
                            Client Experience
                        </span>
                        <h3 class="fw-bolder mb-3">What it feels like to work with a software house that actually cares.</h3>
                        <div class="row g-3">
                            @foreach ([
                                'Free discovery call before any commitment',
                                'Weekly sprint demos with real, working software',
                                'Direct access to developers — no account-manager layers',
                                'Honest timelines and scope — no over-promising',
                                'Documentation and handover you can rely on',
                                'Long-term relationships, not one-off projects',
                            ] as $benefit)
                                <div class="col-12">
                                    <div class="d-flex gap-3">
                                        <span class="landing-icon flex-shrink-0" style="width: 2.6rem; height: 2.6rem;"><i class="ti ti-star"></i></span>
                                        <div class="fw-medium">{{ $benefit }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section pt-0">
        <div class="container">
            <div class="stats-band">
                <span class="section-deco deco-spin" style="bottom: -4rem; left: 2rem; font-size: 13rem; color: #fff; opacity: .06;"><i class="ti ti-code"></i></span>
                <div class="row g-4 text-center">
                    <div class="col-md-3 stat-item">
                        <div class="display-6 fw-bolder"><span data-count="5">5</span>+</div>
                        <div class="text-white text-opacity-75">Years as a software house</div>
                    </div>
                    <div class="col-md-3 stat-item">
                        <div class="display-6 fw-bolder"><span data-count="50">50</span>+</div>
                        <div class="text-white text-opacity-75">Products shipped for clients</div>
                    </div>
                    <div class="col-md-3 stat-item">
                        <div class="display-6 fw-bolder"><span data-count="15">15</span>+</div>
                        <div class="text-white text-opacity-75">Industries served worldwide</div>
                    </div>
                    <div class="col-md-3 stat-item">
                        <div class="display-6 fw-bolder"><span data-count="100">100</span>%</div>
                        <div class="text-white text-opacity-75">Client code ownership</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section section-soft has-deco">
        <span class="section-deco deco-spin" style="top: -2rem; left: -3rem; font-size: 13rem;"><i class="ti ti-message-star"></i></span>
        <span class="deco-blob" style="bottom: -5rem; right: -4rem;"></span>
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 760px;">
                <span class="section-kicker mb-3">
                    <i class="ti ti-message-2-star"></i>
                    What Clients Say
                </span>
                <h2 class="fw-bolder mb-3">Clients who trusted our agency to build their products.</h2>
                <p class="text-muted fs-5 mb-0">
                    From first-time founders to established businesses — here is what they say about working with ObtainSolutions.
                </p>
            </div>

            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="quote-mark">&ldquo;</div>
                            <div class="star-row">
                                <i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            ObtainSolutions acted as our entire product team. They handled design, Laravel backend, and React frontend — and delivered a polished SaaS platform on schedule.
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="landing-icon"><i class="ti ti-user"></i></span>
                            <div>
                                <h6 class="mb-0">Ahmed Khan</h6>
                                <small class="text-muted">Founder, TechStart Inc.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="quote-mark">&ldquo;</div>
                            <div class="star-row">
                                <i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            We needed a reliable offshore dev team and found one. Clear communication, solid code, and they genuinely understood our business — not just our tickets.
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="landing-icon"><i class="ti ti-user"></i></span>
                            <div>
                                <h6 class="mb-0">Sara Ahmed</h6>
                                <small class="text-muted">Product Lead, Digital Innovations</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="quote-mark">&ldquo;</div>
                            <div class="star-row">
                                <i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i><i class="ti ti-star-filled"></i>
                            </div>
                        </div>
                        <p class="text-muted mb-4">
                            Their Laravel expertise saved us months of trial and error. We got a production-ready API and admin panel that our mobile team could build on immediately.
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="landing-icon"><i class="ti ti-user"></i></span>
                            <div>
                                <h6 class="mb-0">Bilal Raza</h6>
                                <small class="text-muted">CTO, CloudTech Solutions</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section bg-white has-deco" id="pricing">
        <span class="section-deco deco-float" style="top: 3rem; right: -2rem; font-size: 12rem;"><i class="ti ti-tag"></i></span>
        <span class="deco-dots" style="bottom: 4rem; left: 2%;"></span>
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 760px;">
                <span class="section-kicker mb-3">
                    <i class="ti ti-credit-card"></i>
                    Engagement Models
                </span>
                <h2 class="fw-bolder mb-3">Flexible ways to hire our agency — from one-off projects to dedicated teams.</h2>
                <p class="text-muted fs-5 mb-0">
                    Every business is different. Pick the engagement model that matches where you are today — and switch as you grow.
                </p>
            </div>

            <div class="row g-3 align-items-stretch">
                <div class="col-lg-4">
                    <div class="plan-card">
                        <span class="badge bg-label-primary mb-3">Project</span>
                        <h4 class="fw-bolder">Fixed-Scope Build</h4>
                        <p class="text-muted">For startups and businesses with a defined MVP, website, or app to launch.</p>
                        <h3 class="fw-bolder mb-1">Get a Quote</h3>
                        <p class="text-muted mb-4">Free discovery call included</p>
                        <div class="d-flex flex-column gap-3">
                            <div>Product discovery &amp; wireframes</div>
                            <div>UI/UX design + development</div>
                            <div>Testing &amp; production deployment</div>
                            <div>30-day post-launch warranty</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="plan-card featured">
                        <span class="plan-ribbon"><i class="ti ti-flame icon-base icon-xs"></i> Most Popular</span>
                        <span class="badge bg-primary mb-3">Dedicated Team</span>
                        <h4 class="fw-bolder">Staff Augmentation</h4>
                        <p class="text-muted">Hire our developers as an extension of your team — full-time or part-time capacity.</p>
                        <h3 class="fw-bolder mb-1">Get a Quote</h3>
                        <p class="text-muted mb-4">Monthly retainer pricing</p>
                        <div class="d-flex flex-column gap-3">
                            <div>Dedicated senior developers</div>
                            <div>Integrates with your tools &amp; workflow</div>
                            <div>Flexible hours &amp; timezone overlap</div>
                            <div>Scale up or down monthly</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="plan-card">
                        <span class="badge bg-label-dark mb-3">Partnership</span>
                        <h4 class="fw-bolder">Product Partnership</h4>
                        <p class="text-muted">Ongoing development, maintenance, and feature work for live products.</p>
                        <h3 class="fw-bolder mb-1">Get a Quote</h3>
                        <p class="text-muted mb-4">Custom SLA &amp; retainer</p>
                        <div class="d-flex flex-column gap-3">
                            <div>Continuous feature development</div>
                            <div>Bug fixes &amp; performance tuning</div>
                            <div>Monitoring &amp; security updates</div>
                            <div>Priority support channel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section has-deco" id="faq">
        <span class="deco-blob" style="top: -4rem; right: -5rem;"></span>
        <span class="deco-road" style="bottom: 3.5rem; left: 5%; transform: rotate(-5deg);"></span>
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-4" data-reveal="left">
                    <span class="section-kicker mb-3">
                        <i class="ti ti-help-circle"></i>
                        Frequently Asked Questions
                    </span>
                    <h2 class="fw-bolder mb-3">Common questions about hiring a software house.</h2>
                    <p class="text-muted fs-5 mb-0">
                        Evaluating agencies? Here are answers to what founders and product managers ask us most often.
                    </p>
                </div>

                <div class="col-lg-8">
                    <div class="faq-panel">
                        <div class="accordion" id="faqAccordion">
                            @foreach ($faqs as $index => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="faq-heading-{{ $index }}">
                                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="faq-collapse-{{ $index }}">
                                            {{ $faq['q'] }}
                                        </button>
                                    </h2>
                                    <div id="faq-collapse-{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="faq-heading-{{ $index }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-muted">
                                            {{ $faq['a'] }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="landing-section pt-0" id="contact">
        <div class="container">
            <div class="contact-strip p-4 p-lg-4 mb-4">
                <span class="section-deco deco-float" style="bottom: -3rem; right: 1rem; font-size: 11rem; color: #fff; opacity: .07;"><i class="ti ti-code"></i></span>
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span class="section-kicker mb-3 bg-white text-dark">
                            <i class="ti ti-phone-call"></i>
                            Let's Talk
                        </span>
                        <h2 class="fw-bolder text-white mb-3">Ready to build something great? Tell us about your project.</h2>
                        <p class="text-white text-opacity-75 fs-5 mb-0">
                            Book a free consultation — no commitment. Share your idea and we will respond with next steps, a rough timeline, and a quote tailored to your needs.
                        </p>
                    </div>
                    <div class="col-lg-5">
                        <div class="row g-2">
                            <div class="col-sm-6">
                                <div class="contact-card">
                                    <div class="landing-icon mb-3"><i class="ti ti-mail"></i></div>
                                    <div class="fw-semibold mb-1">Email</div>
                                    <div class="text-muted small">info@obtainsolutions.com</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="contact-card">
                                    <div class="landing-icon mb-3"><i class="ti ti-brand-whatsapp"></i></div>
                                    <div class="fw-semibold mb-1">WhatsApp</div>
                                    <div class="text-muted small">+92 315 7364689</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="contact-card">
                                    <div class="landing-icon mb-3"><i class="ti ti-map-pin"></i></div>
                                    <div class="fw-semibold mb-1">Location</div>
                                    <div class="text-muted small">10/B Muhammadi Colony, Sargodha, Punjab, Pakistan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="landing-card h-100">
                        <span class="section-kicker mb-3">
                            <i class="ti ti-send"></i>
                            Send Us a Message
                        </span>
                        <h3 class="fw-bolder mb-4">Tell us about your project</h3>
                        <form id="contact-form" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Your full name" required>
                                    <div class="error-message" id="name-error"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com" required>
                                    <div class="error-message" id="email-error"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone (optional)</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="+92 300 0000000">
                                    <div class="error-message" id="phone-error"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Project inquiry" required>
                                    <div class="error-message" id="subject-error"></div>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea id="message" name="message" rows="5" class="form-control" placeholder="Tell us about your project, goals, and timeline..." required></textarea>
                                    <div class="error-message" id="message-error"></div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg" id="submit-btn">
                                        <span class="btn-text"><i class="ti ti-send me-1"></i> Send Message</span>
                                        <span class="btn-loading" style="display: none;"><i class="ti ti-loader-2 me-1"></i> Sending...</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-shell p-4 p-lg-4 h-100 d-flex flex-column justify-content-center">
                        <span class="section-kicker mb-3 bg-white text-dark">
                            <i class="ti ti-rocket"></i>
                            Prefer to Chat?
                        </span>
                        <h3 class="fw-bolder text-white mb-3">Skip the form — chat with us on WhatsApp.</h3>
                        <p class="text-white text-opacity-75 mb-4">
                            Prefer a quick conversation? Message us directly and we will respond within business hours.
                        </p>
                        <div class="d-grid gap-3">
                            <a href="https://wa.me/923157364689" target="_blank" class="btn btn-warning btn-lg" id="hero-whatsapp-btn"><i class="ti ti-brand-whatsapp me-1"></i> Chat on WhatsApp</a>
                            <a href="mailto:info@obtainsolutions.com" class="btn btn-outline-light btn-lg"><i class="ti ti-mail me-1"></i> Email Us Directly</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<a href="https://wa.me/923157364689" target="_blank" class="floating-whatsapp-btn" title="Chat with us on WhatsApp" id="whatsapp-btn">
    <i class="ti ti-brand-whatsapp"></i>
</a>

<a href="#home" id="backToTop" class="back-to-top" aria-label="Back to top">
    <i class="ti ti-arrow-up"></i>
</a>

<footer class="footer-shell pt-5 pb-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="ObtainSolutions logo" width="40" height="40" style="border-radius: 0.7rem;">
                    <div>
                        <div class="fw-bolder text-white">ObtainSolutions</div>
                        <small>Software House &amp; Digital Agency</small>
                    </div>
                </div>
                <p class="mb-3">
                    A Pakistan-based software house and digital agency specializing in web apps, mobile apps, APIs, and SaaS platforms. We help startups and businesses worldwide design, build, and scale digital products with PHP, Laravel, and modern frontends.
                </p>
                <div class="d-flex gap-2">
                    <a href="https://www.linkedin.com/company/obtain-solutions/" target="_blank" class="landing-icon bg-white bg-opacity-10 text-white"><i class="ti ti-brand-linkedin"></i></a>
                    <a href="https://github.com/Muhammad-Ashfaq1" target="_blank" class="landing-icon bg-white bg-opacity-10 text-white"><i class="ti ti-brand-github"></i></a>
                    <a href="#" class="landing-icon bg-white bg-opacity-10 text-white"><i class="ti ti-brand-x"></i></a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-2">
                <h6 class="text-white mb-3">Services</h6>
                <div class="d-flex flex-column gap-2">
                    <a href="#services">Web Development</a>
                    <a href="#services">App Development</a>
                    <a href="#services">API Services</a>
                    <a href="#services">SaaS Solutions</a>
                    <a href="#services">PHP &amp; Laravel</a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-2">
                <h6 class="text-white mb-3">Company</h6>
                <div class="d-flex flex-column gap-2">
                    <a href="#about">About Us</a>
                    <a href="#work">Solutions</a>
                    <a href="#process">Our Process</a>
                    <a href="#faq">FAQ</a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-2">
                <h6 class="text-white mb-3">Get Started</h6>
                <div class="d-flex flex-column gap-2">
                    <a href="#contact">Free Consultation</a>
                    <a href="#pricing">Engagement Models</a>
                    <a href="https://wa.me/923157364689" target="_blank">WhatsApp</a>
                    <a href="mailto:info@obtainsolutions.com">Email Us</a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-2">
                <h6 class="text-white mb-3">Contact</h6>
                <div class="d-flex flex-column gap-2">
                    <a href="mailto:info@obtainsolutions.com">info@obtainsolutions.com</a>
                    <a href="tel:+923157364689">+92 315 7364689</a>
                    <span>Mon-Sat | 9:00 AM - 6:00 PM</span>
                </div>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
            <p class="mb-0">&copy; {{ now()->year }} ObtainSolutions. All rights reserved.</p>
            <p class="mb-0">Software House &amp; Digital Agency — Sargodha, Pakistan</p>
        </div>
    </div>
</footer>
@endsection

@section('scripts')
@php
    $structuredData = [
        [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => config('app.name'),
            'url' => url('/'),
            'logo' => asset('assets/img/logo.png'),
            'slogan' => 'Software House & Digital Agency',
        ],
        [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($faqs)->map(fn ($faq) => [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ])->values()->all(),
        ],
    ];
@endphp
@foreach ($structuredData as $schema)
<script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endforeach
<script>
    (function () {
        var navbar = document.querySelector('.landing-navbar');
        var backToTop = document.getElementById('backToTop');
        var progressBar = document.getElementById('scrollProgressBar');
        var onScroll = function () {
            if (navbar) navbar.classList.toggle('is-scrolled', window.scrollY > 24);
            if (backToTop) backToTop.classList.toggle('is-visible', window.scrollY > 600);
            if (progressBar) {
                var max = document.documentElement.scrollHeight - window.innerHeight;
                progressBar.style.width = (max > 0 ? (window.scrollY / max) * 100 : 0) + '%';
            }
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        var counters = document.querySelectorAll('[data-count]');
        if (counters.length && 'IntersectionObserver' in window && !reduceMotion) {
            var counterObserver = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;
                    counterObserver.unobserve(entry.target);
                    var el = entry.target;
                    var target = parseInt(el.getAttribute('data-count'), 10) || 0;
                    var start = null;
                    var step = function (ts) {
                        if (!start) start = ts;
                        var progress = Math.min((ts - start) / 1400, 1);
                        el.textContent = Math.round(target * (1 - Math.pow(1 - progress, 3)));
                        if (progress < 1) requestAnimationFrame(step);
                    };
                    el.textContent = '0';
                    requestAnimationFrame(step);
                });
            }, { threshold: 0.5 });
            counters.forEach(function (el) { counterObserver.observe(el); });
        }

        if (window.bootstrap && bootstrap.ScrollSpy) {
            new bootstrap.ScrollSpy(document.body, { target: '#publicNavbar', rootMargin: '-30% 0px -60% 0px' });
        }

        var targets = document.querySelectorAll('.landing-card, .service-pill, .testimonial-card, .plan-card, .stats-band, .timeline-step, .contact-card, [data-reveal]');
        if (!('IntersectionObserver' in window) || !targets.length) return;
        targets.forEach(function (el) {
            el.classList.add('reveal');
            var direction = el.getAttribute('data-reveal');
            if (direction === 'left') el.classList.add('reveal-left');
            if (direction === 'right') el.classList.add('reveal-right');
            var node = el;
            while (node.parentElement && node.parentElement.children.length === 1) node = node.parentElement;
            var siblings = node.parentElement ? node.parentElement.children : [node];
            var index = Array.prototype.indexOf.call(siblings, node);
            el.style.transitionDelay = Math.min(Math.max(index, 0), 5) * 70 + 'ms';
        });
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });
        targets.forEach(function (el) { observer.observe(el); });
    })();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function isMobileDevice() {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || window.innerWidth <= 768;
        }
        function getWhatsAppUrl() {
            var phoneNumber = '923157364689';
            var message = 'Hello! I would like to discuss a project with you.';
            return isMobileDevice()
                ? 'https://wa.me/' + phoneNumber + '?text=' + encodeURIComponent(message)
                : 'https://web.whatsapp.com/send?phone=' + phoneNumber + '&text=' + encodeURIComponent(message);
        }
        document.querySelectorAll('#whatsapp-btn, #hero-whatsapp-btn').forEach(function (button) {
            button.href = getWhatsAppUrl();
            button.addEventListener('click', function (e) {
                e.preventDefault();
                var url = getWhatsAppUrl();
                if (isMobileDevice()) window.location.href = url; else window.open(url, '_blank');
            });
        });
        window.addEventListener('resize', function () {
            var url = getWhatsAppUrl();
            document.querySelectorAll('#whatsapp-btn, #hero-whatsapp-btn').forEach(function (b) { b.href = url; });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.toastr) {
            toastr.options = { timeOut: 4000, progressBar: true, closeButton: true, positionClass: 'toast-top-right' };
        }
        var contactForm = document.getElementById('contact-form');
        if (!contactForm) return;
        var submitBtn = document.getElementById('submit-btn');
        var btnText = submitBtn.querySelector('.btn-text');
        var btnLoading = submitBtn.querySelector('.btn-loading');

        function showError(fieldId, message) {
            var errorDiv = document.getElementById(fieldId + '-error');
            if (errorDiv) { errorDiv.textContent = message; errorDiv.style.display = 'block'; }
        }
        function clearErrors() {
            document.querySelectorAll('.error-message').forEach(function (div) { div.textContent = ''; div.style.display = 'none'; });
        }
        function setLoading(loading) {
            btnText.style.display = loading ? 'none' : 'inline-block';
            btnLoading.style.display = loading ? 'inline-block' : 'none';
            submitBtn.disabled = loading;
        }

        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            clearErrors();
            setLoading(true);
            var formData = new FormData(contactForm);
            fetch('{{ route("contact.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(function (response) { return response.json(); })
            .then(function (data) {
                setLoading(false);
                if (data.success) {
                    if (window.toastr) toastr.success(data.message, 'Success!'); else alert(data.message);
                    contactForm.reset();
                } else if (data.errors) {
                    Object.keys(data.errors).forEach(function (field) { showError(field, data.errors[field][0]); });
                } else if (window.toastr) {
                    toastr.error(data.message, 'Error!');
                }
            })
            .catch(function () {
                setLoading(false);
                if (window.toastr) toastr.error('Something went wrong. Please try again.', 'Error!');
            });
        });
    });
</script>
@endsection
