<x-guest-layout :title="$demo->title . ' | Areia Soft Demo'">

    <main class="demo-details-page">

        {{-- =========================================================
        HERO
    ========================================================== --}}
        <section class="demo-detail-hero">

            <div class="detail-background-grid"></div>
            <div class="detail-glow detail-glow-one"></div>
            <div class="detail-glow detail-glow-two"></div>

            <div class="demo-container">

                {{-- Breadcrumb --}}
                <div class="demo-breadcrumb">

                    <a href="{{ route('home') }}">
                        Home
                    </a>

                    <i class="fa-solid fa-chevron-right"></i>

                    <a href="{{ route('demo.index') }}">
                        Demo Library
                    </a>

                    <i class="fa-solid fa-chevron-right"></i>

                    <span>
                        {{ $demo->title }}
                    </span>

                </div>


                {{-- Main hero --}}
                <div class="detail-hero-grid">

                    {{-- Left --}}
                    <div class="detail-introduction">

                        <div class="detail-label-row">

                            <span class="detail-category-label">

                                @if ($demo->category?->icon)
                                    <i class="{{ $demo->category->icon }}"></i>
                                @else
                                    <i class="fa-solid fa-layer-group"></i>
                                @endif

                                {{ $demo->category?->name ?? 'Website' }}

                            </span>

                            @if ($demo->featured)
                                <span class="detail-featured-label">
                                    <i class="fa-solid fa-star"></i>
                                    Featured
                                </span>
                            @endif

                        </div>


                        <h1>
                            {{ $demo->title }}
                        </h1>


                        @if ($demo->short_description)
                            <p class="detail-short-description">
                                {{ $demo->short_description }}
                            </p>
                        @else
                            <p class="detail-short-description">
                                A modern digital experience crafted by
                                Areia Soft with a strong focus on visual
                                design, usability and responsive performance.
                            </p>
                        @endif


                        {{-- Actions --}}
                        <div class="detail-action-group">

                            @if ($demo->demo_url && $demo->demo_url !== '#')
                                <a href="{{ $demo->demo_url }}" target="_blank" rel="noopener noreferrer"
                                    class="detail-btn detail-btn-primary">
                                    <span>Explore Live Demo</span>
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            @endif

                            <a href="{{ route('contact.index') }}" class="detail-btn detail-btn-secondary">
                                <span>Start a Project</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>


                        {{-- Quick information --}}
                        <div class="detail-quick-info">

                            @if ($demo->technology)
                                <div class="quick-info-item">

                                    <span>Technology</span>

                                    <strong>
                                        {{ $demo->technology }}
                                    </strong>

                                </div>
                            @endif


                            <div class="quick-info-item">

                                <span>Category</span>

                                <strong>
                                    {{ $demo->category?->name ?? 'Digital Experience' }}
                                </strong>

                            </div>


                            <div class="quick-info-item">

                                <span>Status</span>

                                <strong class="live-status">
                                    <i></i>
                                    Live Concept
                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- Right / Preview --}}
                    <div class="detail-preview-wrapper">

                        <div class="preview-decoration preview-decoration-one"></div>
                        <div class="preview-decoration preview-decoration-two"></div>

                        <div class="website-preview">

                            {{-- Browser --}}
                            <div class="browser-header">

                                <div class="browser-controls">

                                    <span></span>
                                    <span></span>
                                    <span></span>

                                </div>


                                <div class="browser-url">

                                    <i class="fa-solid fa-lock"></i>

                                    <span>
                                        {{ $demo->slug }}
                                    </span>

                                </div>


                                <div class="browser-menu">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>

                            </div>


                            {{-- Preview --}}
                            <div class="website-preview-image">

                                @if ($demo->preview_image)
                                    <img src="{{ asset('storage/' . $demo->preview_image) }}"
                                        alt="{{ $demo->title }} website preview">
                                @elseif($demo->thumbnail)
                                    <img src="{{ asset('storage/' . $demo->thumbnail) }}"
                                        alt="{{ $demo->title }} website preview">
                                @else
                                    <div class="preview-empty">

                                        <div class="preview-empty-grid"></div>

                                        <div class="preview-empty-content">

                                            <div class="preview-logo">
                                                AS
                                            </div>

                                            <span>
                                                {{ $demo->category?->name ?? 'Website' }}
                                            </span>

                                            <strong>
                                                {{ $demo->title }}
                                            </strong>

                                            <div class="preview-lines">
                                                <i></i>
                                                <i></i>
                                                <i></i>
                                            </div>

                                        </div>

                                    </div>
                                @endif

                            </div>

                        </div>


                        {{-- Floating project badge --}}
                        <div class="floating-project-badge">

                            <span class="floating-dot"></span>

                            <div>
                                <small>AREIA SOFT</small>
                                <strong>Digital Experience</strong>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        PROJECT OVERVIEW
    ========================================================== --}}
        <section class="project-overview-section">

            <div class="demo-container">

                <div class="overview-grid">

                    {{-- Content --}}
                    <div class="overview-content">

                        <span class="section-label">
                            PROJECT OVERVIEW
                        </span>

                        <h2>
                            Built around
                            <span>your audience.</span>
                        </h2>


                        @if ($demo->description)
                            <div class="project-description">
                                {!! nl2br(e($demo->description)) !!}
                            </div>
                        @else
                            <p class="project-description">
                                This demo represents a modern website
                                experience created by Areia Soft. Every
                                element is designed to provide a clean,
                                intuitive and engaging experience across
                                desktop, tablet and mobile devices.
                            </p>
                        @endif

                    </div>


                    {{-- Project information --}}
                    <aside class="project-info-card">

                        <div class="info-card-top">

                            <span>
                                PROJECT DETAILS
                            </span>

                            <div class="info-card-icon">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>

                        </div>


                        <div class="project-info-list">

                            <div class="project-info-row">

                                <span>Project</span>

                                <strong>
                                    {{ $demo->title }}
                                </strong>

                            </div>


                            <div class="project-info-row">

                                <span>Industry</span>

                                <strong>
                                    {{ $demo->category?->name ?? 'Digital' }}
                                </strong>

                            </div>


                            @if ($demo->technology)
                                <div class="project-info-row">

                                    <span>Technology</span>

                                    <strong>
                                        {{ $demo->technology }}
                                    </strong>

                                </div>
                            @endif


                            <div class="project-info-row">

                                <span>Experience</span>

                                <strong>
                                    Responsive Web
                                </strong>

                            </div>


                            <div class="project-info-row">

                                <span>Status</span>

                                <strong class="status-value">
                                    <i></i>
                                    Available
                                </strong>

                            </div>

                        </div>


                        @if ($demo->demo_url && $demo->demo_url !== '#')
                            <a href="{{ $demo->demo_url }}" target="_blank" rel="noopener noreferrer"
                                class="info-live-button">
                                <span>Open Live Demo</span>
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        @endif

                    </aside>

                </div>

            </div>

        </section>


        {{-- =========================================================
        PROJECT FEATURES
    ========================================================== --}}
        <section class="project-features-section">

            <div class="demo-container">

                <div class="features-heading">

                    <div>

                        <span class="section-label">
                            DESIGN APPROACH
                        </span>

                        <h2>
                            Made for the
                            <span>modern web.</span>
                        </h2>

                    </div>

                    <p>
                        Every demo is designed with a practical balance
                        between visual impact, usability and responsive
                        performance.
                    </p>

                </div>


                <div class="features-grid">

                    <div class="feature-card">

                        <div class="feature-number">
                            01
                        </div>

                        <div class="feature-icon">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>

                        <h3>
                            Responsive Experience
                        </h3>

                        <p>
                            Designed to provide a consistent experience
                            across desktop, tablet and mobile screens.
                        </p>

                    </div>


                    <div class="feature-card">

                        <div class="feature-number">
                            02
                        </div>

                        <div class="feature-icon">
                            <i class="fa-solid fa-wand-magic-sparkles"></i>
                        </div>

                        <h3>
                            Modern Interface
                        </h3>

                        <p>
                            Clean visual hierarchy, modern components and
                            purposeful interactions create a polished UI.
                        </p>

                    </div>


                    <div class="feature-card">

                        <div class="feature-number">
                            03
                        </div>

                        <div class="feature-icon">
                            <i class="fa-solid fa-gauge-high"></i>
                        </div>

                        <h3>
                            Performance Focused
                        </h3>

                        <p>
                            Lightweight layouts and optimized experiences
                            help create a faster and smoother website.
                        </p>

                    </div>


                    <div class="feature-card">

                        <div class="feature-number">
                            04
                        </div>

                        <div class="feature-icon">
                            <i class="fa-solid fa-code"></i>
                        </div>

                        <h3>
                            Flexible Architecture
                        </h3>

                        <p>
                            The experience can be adapted to your business,
                            brand identity and future requirements.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- =========================================================
        RELATED DEMOS
    ========================================================== --}}
        @if (isset($relatedDemos) && $relatedDemos->count())

            <section class="related-demos-section">

                <div class="demo-container">

                    <div class="related-section-heading">

                        <div>

                            <span class="section-label">
                                MORE INSPIRATION
                            </span>

                            <h2>
                                Explore more
                                <span>demos.</span>
                            </h2>

                        </div>

                        <a href="{{ route('demo.index') }}" class="view-all-demos">
                            <span>View All</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>


                    <div class="related-demos-grid">

                        @foreach ($relatedDemos as $related)
                            <a href="{{ route('demo.details', $related->slug) }}" class="related-demo-card">

                                <div class="related-demo-image">

                                    @if ($related->thumbnail)
                                        <img src="{{ asset('storage/' . $related->thumbnail) }}"
                                            alt="{{ $related->title }}" loading="lazy">
                                    @else
                                        <div class="related-image-placeholder">

                                            <i class="fa-solid fa-code"></i>

                                        </div>
                                    @endif


                                    <div class="related-image-overlay">

                                        <span>
                                            View Project
                                            <i class="fa-solid fa-arrow-up-right"></i>
                                        </span>

                                    </div>

                                </div>


                                <div class="related-demo-content">

                                    <span>
                                        {{ $related->category?->name ?? 'Demo' }}
                                    </span>

                                    <h3>
                                        {{ $related->title }}
                                    </h3>

                                    <i class="fa-solid fa-arrow-right"></i>

                                </div>

                            </a>
                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- =========================================================
        FINAL CTA
    ========================================================== --}}
        <section class="demo-final-cta">

            <div class="demo-container">

                <div class="final-cta-box">

                    <div class="final-cta-background"></div>

                    <div class="final-cta-content">

                        <span class="section-label">
                            READY TO BUILD?
                        </span>

                        <h2>
                            Let's create your
                            <span>next experience.</span>
                        </h2>

                        <p>
                            Have an idea inspired by this demo?
                            Let's transform it into a website designed
                            specifically for your business.
                        </p>

                        <div class="final-cta-actions">

                            <a href="{{ route('contact.index') }}" class="detail-btn detail-btn-primary">
                                Start Your Project
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                            <a href="{{ route('demo.index') }}" class="detail-btn detail-btn-secondary">
                                Explore More Demos
                            </a>

                        </div>

                    </div>


                    <div class="final-cta-orbit">

                        <div class="orbit-ring orbit-ring-one"></div>
                        <div class="orbit-ring orbit-ring-two"></div>

                        <div class="orbit-center">
                            AS
                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>


    @push('styles')
        <style>
            /* =========================================================
               DEMO DETAILS
               Areia Soft Design System
            ========================================================= */

            .demo-details-page {
                width: 100%;
                overflow: hidden;
            }

            .demo-container {
                width: min(1200px, calc(100% - 40px));
                margin: 0 auto;
            }


            /* =========================================================
               HERO
            ========================================================= */

            .demo-detail-hero {
                position: relative;
                padding: 125px 0 100px;
                overflow: hidden;
                border-bottom: 1px solid var(--glass-border);
                background:
                    radial-gradient(circle at 85% 30%,
                        rgba(0, 229, 255, .07),
                        transparent 30%);
            }

            .detail-background-grid {
                position: absolute;
                inset: 0;
                opacity: .35;
                pointer-events: none;
                background-image:
                    linear-gradient(rgba(0, 229, 255, .045) 1px,
                        transparent 1px),
                    linear-gradient(90deg,
                        rgba(0, 229, 255, .045) 1px,
                        transparent 1px);
                background-size: 65px 65px;
                mask-image: linear-gradient(to bottom,
                        black,
                        transparent 85%);
            }

            .detail-glow {
                position: absolute;
                border-radius: 50%;
                pointer-events: none;
                filter: blur(80px);
            }

            .detail-glow-one {
                width: 300px;
                height: 300px;
                right: -100px;
                top: 150px;
                background: rgba(0, 229, 255, .06);
            }

            .detail-glow-two {
                width: 220px;
                height: 220px;
                left: -120px;
                bottom: 50px;
                background: rgba(0, 229, 255, .035);
            }


            /* Breadcrumb */

            .demo-breadcrumb {
                position: relative;
                z-index: 3;
                display: flex;
                align-items: center;
                gap: 10px;
                min-width: 0;
                margin-bottom: 60px;
                color: var(--white-muted);
                font-size: .68rem;
            }

            .demo-breadcrumb a {
                color: var(--white-muted);
                text-decoration: none;
                transition: var(--transition);
            }

            .demo-breadcrumb a:hover {
                color: var(--cyan);
            }

            .demo-breadcrumb i {
                color: rgba(255, 255, 255, .25);
                font-size: .55rem;
            }

            .demo-breadcrumb span {
                min-width: 0;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }


            /* Hero grid */

            .detail-hero-grid {
                position: relative;
                z-index: 2;
                display: grid;
                grid-template-columns:
                    minmax(0, .82fr) minmax(0, 1.18fr);
                gap: clamp(40px, 6vw, 90px);
                align-items: center;
            }


            /* Introduction */

            .detail-label-row {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                gap: 15px;
                margin-bottom: 20px;
            }

            .detail-category-label,
            .detail-featured-label {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                font-size: .66rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .14em;
            }

            .detail-category-label {
                color: var(--cyan);
            }

            .detail-featured-label {
                color: var(--white-muted);
            }

            .detail-hero-grid h1 {
                max-width: 680px;
                margin: 0;
                color: var(--white);
                font-size: clamp(2.8rem, 5vw, 5.4rem);
                line-height: .98;
                letter-spacing: -.065em;
                font-weight: 800;
                overflow-wrap: anywhere;
            }

            .detail-short-description {
                max-width: 610px;
                margin: 25px 0 0;
                color: var(--white-muted);
                font-size: .98rem;
                line-height: 1.85;
            }


            /* Actions */

            .detail-action-group {
                display: flex;
                flex-wrap: wrap;
                gap: 11px;
                margin-top: 30px;
            }

            .detail-btn {
                min-height: 48px;
                padding: 0 19px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                border-radius: 8px;
                text-decoration: none;
                font-size: .76rem;
                font-weight: 700;
                transition: var(--transition);
            }

            .detail-btn-primary {
                color: var(--bg-deep);
                background: var(--cyan);
                border: 1px solid var(--cyan);
            }

            .detail-btn-primary:hover {
                color: var(--bg-deep);
                transform: translateY(-3px);
                box-shadow: 0 15px 35px var(--cyan-glow);
            }

            .detail-btn-secondary {
                color: var(--white-soft);
                background: var(--glass-bg);
                border: 1px solid var(--glass-border);
            }

            .detail-btn-secondary:hover {
                color: var(--cyan);
                border-color: var(--cyan);
                transform: translateY(-3px);
            }


            /* Quick information */

            .detail-quick-info {
                display: flex;
                flex-wrap: wrap;
                gap: 0;
                margin-top: 38px;
                border-top: 1px solid var(--glass-border);
                border-bottom: 1px solid var(--glass-border);
            }

            .quick-info-item {
                flex: 1 1 130px;
                min-width: 0;
                padding: 17px 18px 17px 0;
            }

            .quick-info-item+.quick-info-item {
                padding-left: 18px;
                border-left: 1px solid var(--glass-border);
            }

            .quick-info-item span {
                display: block;
                margin-bottom: 6px;
                color: var(--white-muted);
                font-size: .58rem;
                text-transform: uppercase;
                letter-spacing: .12em;
            }

            .quick-info-item strong {
                display: block;
                overflow: hidden;
                color: var(--white-soft);
                font-size: .72rem;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .live-status {
                display: flex !important;
                align-items: center;
                gap: 7px;
                color: var(--cyan) !important;
            }

            .live-status i {
                width: 6px;
                height: 6px;
                flex-shrink: 0;
                border-radius: 50%;
                background: var(--cyan);
                box-shadow: 0 0 12px var(--cyan);
            }


            /* =========================================================
               WEBSITE PREVIEW
            ========================================================= */

            .detail-preview-wrapper {
                position: relative;
                min-width: 0;
                padding: 20px;
            }

            .website-preview {
                position: relative;
                z-index: 3;
                width: 100%;
                overflow: hidden;
                border: 1px solid rgba(0, 229, 255, .18);
                border-radius: 17px;
                background: #070a10;
                box-shadow:
                    0 30px 80px rgba(0, 0, 0, .48),
                    0 0 50px rgba(0, 229, 255, .05);
                transform: perspective(1200px) rotateY(-3deg) rotateX(1.5deg);
                transition: transform .5s ease, border-color .5s ease;
            }

            .website-preview:hover {
                border-color: rgba(0, 229, 255, .4);
                transform: perspective(1200px) rotateY(0) rotateX(0) translateY(-5px);
            }

            .browser-header {
                height: 43px;
                display: grid;
                grid-template-columns: 75px minmax(0, 1fr) 40px;
                align-items: center;
                gap: 10px;
                padding: 0 13px;
                border-bottom: 1px solid rgba(255, 255, 255, .07);
                background: rgba(255, 255, 255, .025);
            }

            .browser-controls {
                display: flex;
                align-items: center;
                gap: 5px;
            }

            .browser-controls span {
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background: rgba(255, 255, 255, .28);
            }

            .browser-url {
                min-width: 0;
                height: 25px;
                padding: 0 9px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 7px;
                border: 1px solid rgba(255, 255, 255, .08);
                border-radius: 5px;
                color: rgba(255, 255, 255, .4);
                font-size: .56rem;
            }

            .browser-url i {
                color: var(--cyan);
                font-size: .5rem;
            }

            .browser-url span {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .browser-menu {
                color: rgba(255, 255, 255, .35);
                text-align: right;
                font-size: .65rem;
            }

            .website-preview-image {
                width: 100%;
                aspect-ratio: 16 / 10;
                overflow: hidden;
                background: #080b11;
            }

            .website-preview-image img {
                width: 100%;
                height: 100%;
                display: block;
                object-fit: cover;
                object-position: top center;
            }


            /* Preview placeholder */

            .preview-empty {
                position: relative;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                background:
                    radial-gradient(circle at center,
                        rgba(0, 229, 255, .1),
                        transparent 50%),
                    #080b11;
            }

            .preview-empty-grid {
                position: absolute;
                inset: 0;
                opacity: .45;
                background-image:
                    linear-gradient(rgba(0, 229, 255, .055) 1px,
                        transparent 1px),
                    linear-gradient(90deg,
                        rgba(0, 229, 255, .055) 1px,
                        transparent 1px);
                background-size: 32px 32px;
            }

            .preview-empty-content {
                position: relative;
                z-index: 2;
                width: min(70%, 300px);
                text-align: center;
            }

            .preview-logo {
                width: 55px;
                height: 55px;
                margin: 0 auto 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid rgba(0, 229, 255, .3);
                border-radius: 14px;
                color: var(--cyan);
                font-size: 1.1rem;
                font-weight: 800;
                box-shadow: 0 0 30px rgba(0, 229, 255, .07);
            }

            .preview-empty-content span {
                display: block;
                color: var(--cyan);
                font-size: .57rem;
                text-transform: uppercase;
                letter-spacing: .18em;
            }

            .preview-empty-content strong {
                display: block;
                margin-top: 7px;
                color: var(--white);
                font-size: 1.1rem;
            }

            .preview-lines {
                margin-top: 20px;
            }

            .preview-lines i {
                width: 100%;
                height: 4px;
                display: block;
                margin-bottom: 7px;
                border-radius: 10px;
                background: rgba(0, 229, 255, .09);
            }

            .preview-lines i:nth-child(2) {
                width: 75%;
                margin-left: auto;
                margin-right: auto;
            }

            .preview-lines i:nth-child(3) {
                width: 52%;
                margin-left: auto;
                margin-right: auto;
            }


            /* Preview decorations */

            .preview-decoration {
                position: absolute;
                border: 1px solid rgba(0, 229, 255, .12);
                border-radius: 50%;
                pointer-events: none;
            }

            .preview-decoration-one {
                width: 110px;
                height: 110px;
                top: -10px;
                right: -25px;
            }

            .preview-decoration-two {
                width: 180px;
                height: 180px;
                bottom: -65px;
                left: -60px;
            }

            .floating-project-badge {
                position: absolute;
                z-index: 5;
                left: -5px;
                bottom: 0;
                min-width: 185px;
                padding: 12px 14px;
                display: flex;
                align-items: center;
                gap: 10px;
                border: 1px solid rgba(0, 229, 255, .18);
                border-radius: 10px;
                background: rgba(10, 13, 20, .9);
                backdrop-filter: blur(15px);
                box-shadow: 0 15px 35px rgba(0, 0, 0, .3);
            }

            .floating-dot {
                width: 7px;
                height: 7px;
                flex-shrink: 0;
                border-radius: 50%;
                background: var(--cyan);
                box-shadow: 0 0 13px var(--cyan);
            }

            .floating-project-badge small {
                display: block;
                color: var(--cyan);
                font-size: .48rem;
                font-weight: 700;
                letter-spacing: .16em;
            }

            .floating-project-badge strong {
                display: block;
                margin-top: 2px;
                color: var(--white-soft);
                font-size: .65rem;
            }


            /* =========================================================
               OVERVIEW
            ========================================================= */

            .project-overview-section {
                padding: 110px 0;
            }

            .overview-grid {
                display: grid;
                grid-template-columns: minmax(0, 1fr) minmax(300px, 380px);
                gap: clamp(45px, 8vw, 110px);
                align-items: start;
            }

            .section-label {
                display: block;
                color: var(--cyan);
                font-size: .63rem;
                font-weight: 700;
                letter-spacing: .18em;
            }

            .overview-content h2,
            .features-heading h2,
            .related-section-heading h2 {
                margin: 13px 0 25px;
                font-size: clamp(2.2rem, 4vw, 3.6rem);
                line-height: 1;
                letter-spacing: -.055em;
            }

            .overview-content h2 span,
            .features-heading h2 span,
            .related-section-heading h2 span {
                color: var(--cyan);
            }

            .project-description {
                max-width: 720px;
                margin: 0;
                color: var(--white-muted);
                font-size: .92rem;
                line-height: 2;
            }


            /* Info card */

            .project-info-card {
                padding: 24px;
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                background: var(--card-bg);
            }

            .info-card-top {
                padding-bottom: 18px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-bottom: 1px solid var(--glass-border);
            }

            .info-card-top>span {
                color: var(--cyan);
                font-size: .6rem;
                font-weight: 700;
                letter-spacing: .16em;
            }

            .info-card-icon {
                width: 31px;
                height: 31px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid var(--glass-border);
                border-radius: 8px;
                color: var(--white-muted);
                font-size: .6rem;
            }

            .project-info-row {
                min-width: 0;
                padding: 15px 0;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 15px;
                border-bottom: 1px solid var(--glass-border);
            }

            .project-info-row span {
                flex-shrink: 0;
                color: var(--white-muted);
                font-size: .67rem;
            }

            .project-info-row strong {
                max-width: 60%;
                color: var(--white-soft);
                font-size: .7rem;
                text-align: right;
                overflow-wrap: anywhere;
            }

            .status-value {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                color: var(--cyan) !important;
            }

            .status-value i {
                width: 5px;
                height: 5px;
                flex-shrink: 0;
                border-radius: 50%;
                background: var(--cyan);
                box-shadow: 0 0 10px var(--cyan);
            }

            .info-live-button {
                width: 100%;
                min-height: 44px;
                margin-top: 20px;
                padding: 0 14px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 9px;
                border: 1px solid var(--cyan);
                border-radius: 8px;
                color: var(--cyan);
                text-decoration: none;
                font-size: .7rem;
                font-weight: 700;
                transition: var(--transition);
            }

            .info-live-button:hover {
                color: var(--bg-deep);
                background: var(--cyan);
            }


            /* =========================================================
               FEATURES
            ========================================================= */

            .project-features-section {
                padding: 100px 0;
                border-top: 1px solid var(--glass-border);
                border-bottom: 1px solid var(--glass-border);
                background:
                    radial-gradient(circle at 10% 50%,
                        rgba(0, 229, 255, .035),
                        transparent 30%);
            }

            .features-heading {
                display: flex;
                align-items: flex-end;
                justify-content: space-between;
                gap: 50px;
                margin-bottom: 45px;
            }

            .features-heading h2 {
                margin-bottom: 0;
            }

            .features-heading>p {
                max-width: 430px;
                margin: 0;
                color: var(--white-muted);
                font-size: .82rem;
                line-height: 1.8;
            }

            .features-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 15px;
            }

            .feature-card {
                position: relative;
                min-width: 0;
                padding: 25px;
                overflow: hidden;
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-md);
                background: rgba(255, 255, 255, .018);
                transition: var(--transition);
            }

            .feature-card:hover {
                transform: translateY(-5px);
                border-color: var(--glass-border-hover);
                background: rgba(255, 255, 255, .025);
            }

            .feature-number {
                position: absolute;
                top: 20px;
                right: 20px;
                color: rgba(255, 255, 255, .12);
                font-size: .62rem;
                font-weight: 700;
            }

            .feature-icon {
                width: 46px;
                height: 46px;
                margin-bottom: 22px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid rgba(0, 229, 255, .15);
                border-radius: 12px;
                color: var(--cyan);
                background: rgba(0, 229, 255, .035);
                font-size: .9rem;
            }

            .feature-card h3 {
                margin-bottom: 9px;
                font-size: .92rem;
            }

            .feature-card p {
                margin: 0;
                color: var(--white-muted);
                font-size: .72rem;
                line-height: 1.75;
            }


            /* =========================================================
               RELATED
            ========================================================= */

            .related-demos-section {
                padding: 105px 0;
            }

            .related-section-heading {
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                gap: 30px;
                margin-bottom: 35px;
            }

            .related-section-heading h2 {
                margin-bottom: 0;
            }

            .view-all-demos {
                display: inline-flex;
                align-items: center;
                gap: 9px;
                color: var(--white-muted);
                font-size: .72rem;
                font-weight: 600;
                text-decoration: none;
                transition: var(--transition);
            }

            .view-all-demos:hover {
                color: var(--cyan);
            }

            .related-demos-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }

            .related-demo-card {
                min-width: 0;
                overflow: hidden;
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                background: var(--card-bg);
                text-decoration: none;
                transition: var(--transition);
            }

            .related-demo-card:hover {
                transform: translateY(-6px);
                border-color: var(--glass-border-hover);
                box-shadow: 0 20px 55px rgba(0, 0, 0, .3);
            }

            .related-demo-image {
                position: relative;
                height: 210px;
                overflow: hidden;
                background: #080b11;
            }

            .related-demo-image img {
                width: 100%;
                height: 100%;
                display: block;
                object-fit: cover;
                transition: transform .6s ease;
            }

            .related-demo-card:hover .related-demo-image img {
                transform: scale(1.05);
            }

            .related-image-placeholder {
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--cyan);
                font-size: 1.5rem;
                background:
                    radial-gradient(circle,
                        rgba(0, 229, 255, .08),
                        transparent 55%);
            }

            .related-image-overlay {
                position: absolute;
                inset: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(5, 9, 15, .7);
                opacity: 0;
                transition: var(--transition);
            }

            .related-demo-card:hover .related-image-overlay {
                opacity: 1;
            }

            .related-image-overlay span {
                padding: 9px 14px;
                display: inline-flex;
                align-items: center;
                gap: 7px;
                border: 1px solid var(--cyan);
                border-radius: 50px;
                color: var(--cyan);
                background: rgba(10, 13, 20, .85);
                font-size: .68rem;
                font-weight: 700;
            }

            .related-demo-content {
                position: relative;
                padding: 19px;
            }

            .related-demo-content>span {
                color: var(--cyan);
                font-size: .57rem;
                text-transform: uppercase;
                letter-spacing: .13em;
            }

            .related-demo-content h3 {
                margin: 7px 30px 0 0;
                color: var(--white);
                font-size: 1rem;
                overflow-wrap: anywhere;
            }

            .related-demo-content>i {
                position: absolute;
                right: 20px;
                bottom: 22px;
                color: var(--white-muted);
                font-size: .65rem;
                transition: var(--transition);
            }

            .related-demo-card:hover .related-demo-content>i {
                color: var(--cyan);
                transform: translateX(3px);
            }


            /* =========================================================
               FINAL CTA
            ========================================================= */

            .demo-final-cta {
                padding: 0 0 110px;
            }

            .final-cta-box {
                position: relative;
                min-height: 370px;
                padding: 65px;
                overflow: hidden;
                display: flex;
                align-items: center;
                border: 1px solid rgba(0, 229, 255, .15);
                border-radius: var(--radius-lg);
                background:
                    radial-gradient(circle at 85% 50%,
                        rgba(0, 229, 255, .09),
                        transparent 35%),
                    var(--card-bg);
            }

            .final-cta-background {
                position: absolute;
                inset: 0;
                opacity: .25;
                pointer-events: none;
                background-image:
                    linear-gradient(rgba(0, 229, 255, .05) 1px,
                        transparent 1px),
                    linear-gradient(90deg,
                        rgba(0, 229, 255, .05) 1px,
                        transparent 1px);
                background-size: 40px 40px;
                mask-image: linear-gradient(90deg,
                        black,
                        transparent 80%);
            }

            .final-cta-content {
                position: relative;
                z-index: 3;
                max-width: 650px;
            }

            .final-cta-content h2 {
                margin: 13px 0 18px;
                font-size: clamp(2.2rem, 4.5vw, 4.2rem);
                line-height: 1;
                letter-spacing: -.055em;
            }

            .final-cta-content h2 span {
                color: var(--cyan);
            }

            .final-cta-content p {
                max-width: 560px;
                margin: 0 0 27px;
                color: var(--white-muted);
                font-size: .85rem;
                line-height: 1.8;
            }

            .final-cta-actions {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .final-cta-orbit {
                position: absolute;
                width: 300px;
                height: 300px;
                right: 8%;
                top: 50%;
                transform: translateY(-50%);
                pointer-events: none;
            }

            .orbit-ring {
                position: absolute;
                top: 50%;
                left: 50%;
                border: 1px solid rgba(0, 229, 255, .12);
                border-radius: 50%;
                transform: translate(-50%, -50%);
            }

            .orbit-ring-one {
                width: 180px;
                height: 180px;
            }

            .orbit-ring-two {
                width: 290px;
                height: 290px;
                border-style: dashed;
                animation: detailOrbit 25s linear infinite;
            }

            .orbit-center {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 70px;
                height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
                transform: translate(-50%, -50%);
                border: 1px solid rgba(0, 229, 255, .3);
                border-radius: 50%;
                color: var(--cyan);
                background: rgba(10, 13, 20, .8);
                box-shadow: 0 0 35px rgba(0, 229, 255, .08);
                font-size: 1rem;
                font-weight: 800;
            }

            @keyframes detailOrbit {
                to {
                    transform: translate(-50%, -50%) rotate(360deg);
                }
            }


            /* =========================================================
               LARGE TABLET
            ========================================================= */

            @media (max-width: 1100px) {

                .detail-hero-grid {
                    grid-template-columns:
                        minmax(0, .9fr) minmax(0, 1.1fr);
                    gap: 45px;
                }

                .detail-hero-grid h1 {
                    font-size: clamp(2.7rem, 5vw, 4.3rem);
                }

                .features-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

                .final-cta-orbit {
                    right: 2%;
                    opacity: .55;
                }

            }


            /* =========================================================
               TABLET
            ========================================================= */

            @media (max-width: 900px) {

                .demo-detail-hero {
                    padding-top: 110px;
                }

                .detail-hero-grid {
                    grid-template-columns: 1fr;
                    gap: 65px;
                }

                .detail-introduction {
                    max-width: 720px;
                }

                .detail-preview-wrapper {
                    width: min(100%, 800px);
                    margin: 0 auto;
                }

                .overview-grid {
                    grid-template-columns: 1fr;
                }

                .project-info-card {
                    width: min(100%, 520px);
                }

                .features-heading {
                    align-items: flex-start;
                    flex-direction: column;
                    gap: 20px;
                }

                .features-heading>p {
                    max-width: 600px;
                }

                .related-demos-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

            }


            /* =========================================================
               MOBILE
            ========================================================= */

            @media (max-width: 640px) {

                .demo-container {
                    width: min(100% - 30px, 1200px);
                }

                .demo-detail-hero {
                    padding: 100px 0 70px;
                }

                .demo-breadcrumb {
                    margin-bottom: 38px;
                    gap: 7px;
                    font-size: .6rem;
                }

                .detail-hero-grid {
                    gap: 45px;
                }

                .detail-label-row {
                    gap: 10px;
                }

                .detail-category-label,
                .detail-featured-label {
                    font-size: .58rem;
                }

                .detail-hero-grid h1 {
                    font-size: clamp(2.45rem, 13vw, 3.6rem);
                    line-height: 1;
                }

                .detail-short-description {
                    margin-top: 20px;
                    font-size: .86rem;
                    line-height: 1.8;
                }


                /* Buttons */

                .detail-action-group {
                    display: grid;
                    grid-template-columns: 1fr;
                    gap: 9px;
                }

                .detail-btn {
                    width: 100%;
                    min-height: 49px;
                }


                /* Quick info */

                .detail-quick-info {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                }

                .quick-info-item {
                    min-width: 0;
                    padding: 14px 10px 14px 0;
                }

                .quick-info-item+.quick-info-item {
                    padding-left: 10px;
                }

                .quick-info-item:nth-child(3) {
                    grid-column: 1 / -1;
                    border-top: 1px solid var(--glass-border);
                    border-left: 0;
                    padding-left: 0;
                }

                .quick-info-item strong {
                    font-size: .65rem;
                }


                /* Preview */

                .detail-preview-wrapper {
                    padding: 8px 0 25px;
                }

                .website-preview {
                    border-radius: 12px;
                    transform: none;
                }

                .website-preview:hover {
                    transform: none;
                }

                .browser-header {
                    height: 38px;
                    grid-template-columns: 48px minmax(0, 1fr) 25px;
                    gap: 6px;
                    padding: 0 9px;
                }

                .browser-controls span {
                    width: 5px;
                    height: 5px;
                }

                .browser-url {
                    height: 22px;
                    font-size: .48rem;
                }

                .floating-project-badge {
                    left: 8px;
                    bottom: 2px;
                    min-width: auto;
                    padding: 9px 11px;
                }

                .floating-project-badge small {
                    font-size: .42rem;
                }

                .floating-project-badge strong {
                    font-size: .57rem;
                }

                .preview-decoration-one {
                    right: -50px;
                }


                /* Overview */

                .project-overview-section {
                    padding: 75px 0;
                }

                .overview-content h2,
                .features-heading h2,
                .related-section-heading h2 {
                    font-size: clamp(2rem, 10vw, 2.8rem);
                }

                .project-description {
                    font-size: .84rem;
                    line-height: 1.9;
                }

                .project-info-card {
                    width: 100%;
                    padding: 20px;
                }

                .project-info-row {
                    flex-direction: column;
                    gap: 6px;
                }

                .project-info-row strong {
                    max-width: none;
                    text-align: left;
                }


                /* Features */

                .project-features-section {
                    padding: 75px 0;
                }

                .features-grid {
                    grid-template-columns: 1fr;
                    gap: 10px;
                }

                .feature-card {
                    padding: 22px;
                }


                /* Related */

                .related-demos-section {
                    padding: 75px 0;
                }

                .related-section-heading {
                    align-items: flex-start;
                    flex-direction: column;
                    gap: 18px;
                }

                .related-demos-grid {
                    grid-template-columns: 1fr;
                    gap: 13px;
                }

                .related-demo-image {
                    height: 220px;
                }


                /* CTA */

                .demo-final-cta {
                    padding-bottom: 75px;
                }

                .final-cta-box {
                    min-height: 450px;
                    padding: 40px 25px;
                    align-items: flex-start;
                }

                .final-cta-content h2 {
                    font-size: clamp(2rem, 10vw, 3rem);
                }

                .final-cta-content p {
                    font-size: .8rem;
                }

                .final-cta-actions {
                    display: grid;
                    grid-template-columns: 1fr;
                }

                .final-cta-actions .detail-btn {
                    width: 100%;
                }

                .final-cta-orbit {
                    width: 210px;
                    height: 210px;
                    right: -65px;
                    bottom: -70px;
                    top: auto;
                    transform: none;
                    opacity: .5;
                }

                .orbit-ring-one {
                    width: 130px;
                    height: 130px;
                }

                .orbit-ring-two {
                    width: 205px;
                    height: 205px;
                }

                .orbit-center {
                    width: 52px;
                    height: 52px;
                    font-size: .75rem;
                }

            }


            /* =========================================================
               SMALL MOBILE
            ========================================================= */

            @media (max-width: 380px) {

                .demo-container {
                    width: calc(100% - 24px);
                }

                .demo-detail-hero {
                    padding-top: 90px;
                }

                .detail-hero-grid h1 {
                    font-size: 2.35rem;
                }

                .detail-quick-info {
                    grid-template-columns: 1fr;
                }

                .quick-info-item,
                .quick-info-item+.quick-info-item,
                .quick-info-item:nth-child(3) {
                    grid-column: auto;
                    padding-left: 0;
                    border-left: 0;
                }

                .quick-info-item+.quick-info-item {
                    border-top: 1px solid var(--glass-border);
                }

                .floating-project-badge {
                    display: none;
                }

                .browser-menu {
                    display: none;
                }

                .browser-header {
                    grid-template-columns: 40px minmax(0, 1fr);
                }

            }
        </style>
    @endpush

</x-guest-layout>
