<x-guest-layout title="Demo Library | Areia Soft">

    <main class="demo-library-page">

        {{-- Hero --}}
        <section class="demo-library-hero">

            <div class="demo-hero-grid"></div>

            <div class="demo-hero-content">

                <div class="demo-eyebrow">
                    <span class="eyebrow-line"></span>
                    AREIA SOFT / DEMO LIBRARY
                </div>

                <h1>
                    Explore Our
                    <span>Digital Demos</span>
                </h1>

                <p>
                    Explore a curated collection of modern website experiences
                    designed for businesses, professionals, agencies and
                    growing brands.
                </p>

                <div class="demo-hero-actions">

                    <a href="#demo-categories" class="demo-primary-btn">
                        Explore Demos
                        <i class="fa-solid fa-arrow-down"></i>
                    </a>

                    <a href="{{ route('contact.index') }}" class="demo-secondary-btn">
                        Build Your Project
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>

                </div>

            </div>

            {{-- Decorative visual --}}
            <div class="demo-hero-visual">

                <div class="visual-ring ring-one"></div>
                <div class="visual-ring ring-two"></div>
                <div class="visual-ring ring-three"></div>

                <div class="visual-core">
                    <div class="core-dot"></div>
                    <span>BUILD</span>
                    <strong>BETTER</strong>
                </div>

                <div class="floating-code code-one">
                    &lt;/&gt;
                </div>

                <div class="floating-code code-two">
                    UI
                </div>

                <div class="floating-code code-three">
                    01
                </div>

            </div>

        </section>


        {{-- Library --}}
        <section class="demo-library-section" id="demo-categories">

            <div class="demo-container">

                {{-- Section heading --}}
                <div class="demo-section-heading">

                    <div>
                        <span class="section-kicker">
                            OUR COLLECTION
                        </span>

                        <h2>
                            Browse by <span>Category</span>
                        </h2>
                    </div>

                    <p>
                        Choose an industry and discover website concepts
                        crafted with usability, performance and visual
                        impact in mind.
                    </p>

                </div>


                {{-- Category navigation --}}
                @if ($categories->count())

                    <div class="demo-category-nav">

                        <button type="button" class="category-filter active" data-filter="all">
                            All Demos
                        </button>

                        @foreach ($categories as $category)
                            <button type="button" class="category-filter" data-filter="category-{{ $category->id }}">
                                {{ $category->name }}
                            </button>
                        @endforeach

                    </div>

                @endif


                {{-- Categories --}}
                <div class="demo-category-list">

                    @forelse($categories as $category)

                        @if ($category->activeDemos->count())
                            <section class="demo-category-block" data-category="category-{{ $category->id }}">

                                {{-- Category header --}}
                                <div class="category-block-header">

                                    <div class="category-title-wrap">

                                        @if ($category->icon)
                                            <div class="category-icon">
                                                <i class="{{ $category->icon }}"></i>
                                            </div>
                                        @else
                                            <div class="category-icon">
                                                <i class="fa-solid fa-layer-group"></i>
                                            </div>
                                        @endif

                                        <div>

                                            <span class="category-number">
                                                {{ str_pad($category->serial_no, 2, '0', STR_PAD_LEFT) }}
                                            </span>

                                            <h3>
                                                {{ $category->name }}
                                            </h3>

                                        </div>

                                    </div>

                                    <div class="category-meta">

                                        <span>
                                            {{ $category->activeDemos->count() }}
                                            {{ $category->activeDemos->count() === 1 ? 'Demo' : 'Demos' }}
                                        </span>

                                        <span class="meta-dot"></span>

                                        <span>
                                            Explore Collection
                                        </span>

                                    </div>

                                </div>


                                @if ($category->description)
                                    <p class="category-description">
                                        {{ $category->description }}
                                    </p>
                                @endif


                                {{-- Demo cards --}}
                                <div class="demo-grid">

                                    @foreach ($category->activeDemos as $demo)
                                        <article class="demo-card {{ $demo->featured ? 'featured-demo' : '' }}"
                                            data-demo-card>

                                            {{-- Thumbnail --}}
                                            <div class="demo-card-media">

                                                @if ($demo->thumbnail)
                                                    <img src="{{ asset('storage/' . $demo->thumbnail) }}"
                                                        alt="{{ $demo->title }}" loading="lazy">
                                                @else
                                                    <div class="demo-image-placeholder">

                                                        <div class="placeholder-grid"></div>

                                                        <div class="placeholder-content">

                                                            <span>
                                                                {{ $category->name }}
                                                            </span>

                                                            <strong>
                                                                {{ $demo->title }}
                                                            </strong>

                                                            <div class="placeholder-browser">

                                                                <div class="browser-bar">
                                                                    <i></i>
                                                                    <i></i>
                                                                    <i></i>
                                                                </div>

                                                                <div class="browser-content">

                                                                    <div></div>
                                                                    <div></div>
                                                                    <div></div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                @endif


                                                {{-- Overlay --}}
                                                <div class="demo-card-overlay">

                                                    <a href="{{ route('demo.details', $demo->slug) }}"
                                                        class="demo-preview-btn">
                                                        <i class="fa-solid fa-eye"></i>
                                                        Preview
                                                    </a>

                                                </div>


                                                {{-- Featured --}}
                                                @if ($demo->featured)
                                                    <div class="featured-badge">
                                                        <i class="fa-solid fa-star"></i>
                                                        Featured
                                                    </div>
                                                @endif

                                            </div>


                                            {{-- Card body --}}
                                            <div class="demo-card-body">

                                                <div class="demo-card-top">

                                                    <span class="demo-category-label">
                                                        {{ $category->name }}
                                                    </span>

                                                    @if ($demo->technology)
                                                        <span class="demo-tech">
                                                            {{ $demo->technology }}
                                                        </span>
                                                    @endif

                                                </div>


                                                <h4>
                                                    {{ $demo->title }}
                                                </h4>


                                                @if ($demo->short_description)
                                                    <p>
                                                        {{ $demo->short_description }}
                                                    </p>
                                                @endif


                                                <div class="demo-card-footer">

                                                    <a href="{{ route('demo.details', $demo->slug) }}"
                                                        class="demo-details-link">
                                                        View Project
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </a>

                                                    @if ($demo->demo_url && $demo->demo_url !== '#')
                                                        <a href="{{ $demo->demo_url }}" target="_blank"
                                                            rel="noopener noreferrer" class="demo-live-link"
                                                            aria-label="Open live demo">
                                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                        </a>
                                                    @endif

                                                </div>

                                            </div>

                                        </article>
                                    @endforeach

                                </div>

                            </section>
                        @endif

                    @empty

                        <div class="demo-empty-state">

                            <div class="empty-icon">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>

                            <h3>
                                Demo Collection Coming Soon
                            </h3>

                            <p>
                                We're currently preparing our latest
                                website experiences.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </section>


        {{-- CTA --}}
        <section class="demo-cta-section">

            <div class="demo-container">

                <div class="demo-cta">

                    <div class="cta-grid"></div>

                    <div class="cta-content">

                        <span class="section-kicker">
                            HAVE A PROJECT IN MIND?
                        </span>

                        <h2>
                            Let's build something
                            <span>remarkable.</span>
                        </h2>

                        <p>
                            These demos are only a starting point.
                            Tell us what you want to build and we'll
                            turn the idea into a real digital experience.
                        </p>

                        <a href="{{ route('contact.index') }}" class="demo-primary-btn">
                            Start a Conversation
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                    <div class="cta-symbol">
                        <span>AS</span>
                    </div>

                </div>

            </div>

        </section>

    </main>


    @push('styles')
        <style>
            /* =========================================================
                   DEMO LIBRARY
                ========================================================= */

            .demo-library-page {
                position: relative;
                overflow: hidden;
            }

            .demo-container {
                width: min(1200px, calc(100% - 40px));
                margin: 0 auto;
            }


            /* =========================================================
                   HERO
                ========================================================= */

            .demo-library-hero {
                min-height: 720px;
                position: relative;
                display: flex;
                align-items: center;
                overflow: hidden;
                padding: 150px 7% 100px;
                border-bottom: 1px solid var(--glass-border);
            }

            .demo-hero-grid {
                position: absolute;
                inset: 0;
                opacity: .25;
                background-image:
                    linear-gradient(rgba(0, 229, 255, .06) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(0, 229, 255, .06) 1px, transparent 1px);
                background-size: 70px 70px;
                mask-image: linear-gradient(to bottom,
                        black,
                        transparent 90%);
                pointer-events: none;
            }

            .demo-hero-content {
                width: min(680px, 100%);
                position: relative;
                z-index: 3;
            }

            .demo-eyebrow,
            .section-kicker {
                display: flex;
                align-items: center;
                gap: 10px;
                color: var(--cyan);
                font-size: .72rem;
                font-weight: 700;
                letter-spacing: .18em;
            }

            .eyebrow-line {
                width: 35px;
                height: 1px;
                background: var(--cyan);
                box-shadow: 0 0 12px var(--cyan);
            }

            .demo-hero-content h1 {
                margin: 25px 0 22px;
                max-width: 700px;
                font-size: clamp(3.2rem, 6vw, 6.4rem);
                line-height: .98;
                letter-spacing: -.065em;
                font-weight: 800;
            }

            .demo-hero-content h1 span,
            .demo-section-heading h2 span,
            .demo-cta h2 span {
                color: var(--cyan);
            }

            .demo-hero-content>p {
                max-width: 590px;
                color: var(--white-muted);
                font-size: 1.05rem;
                line-height: 1.8;
            }

            .demo-hero-actions {
                display: flex;
                align-items: center;
                gap: 14px;
                margin-top: 35px;
                flex-wrap: wrap;
            }

            .demo-primary-btn,
            .demo-secondary-btn {
                min-height: 48px;
                padding: 0 20px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                border-radius: 8px;
                text-decoration: none;
                font-size: .86rem;
                font-weight: 700;
                transition: var(--transition);
            }

            .demo-primary-btn {
                background: var(--cyan);
                color: var(--bg-deep);
                border: 1px solid var(--cyan);
            }

            .demo-primary-btn:hover {
                color: var(--bg-deep);
                transform: translateY(-3px);
                box-shadow: 0 12px 35px var(--cyan-glow);
            }

            .demo-secondary-btn {
                color: var(--white-soft);
                border: 1px solid var(--glass-border);
                background: var(--glass-bg);
            }

            .demo-secondary-btn:hover {
                color: var(--cyan);
                border-color: var(--cyan);
                transform: translateY(-3px);
            }


            /* Hero visual */

            .demo-hero-visual {
                position: absolute;
                width: 560px;
                height: 560px;
                right: 4%;
                top: 50%;
                transform: translateY(-50%);
                opacity: .8;
            }

            .visual-ring {
                position: absolute;
                inset: 50%;
                border: 1px solid rgba(0, 229, 255, .15);
                border-radius: 50%;
                transform: translate(-50%, -50%);
            }

            .ring-one {
                width: 220px;
                height: 220px;
                box-shadow: 0 0 70px rgba(0, 229, 255, .08);
            }

            .ring-two {
                width: 350px;
                height: 350px;
                border-style: dashed;
                animation: demoRotate 18s linear infinite;
            }

            .ring-three {
                width: 500px;
                height: 500px;
                border-color: rgba(0, 229, 255, .07);
                animation: demoRotateReverse 30s linear infinite;
            }

            .visual-core {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 145px;
                height: 145px;
                transform: translate(-50%, -50%);
                border: 1px solid rgba(0, 229, 255, .45);
                border-radius: 50%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: rgba(10, 13, 20, .75);
                box-shadow:
                    0 0 50px rgba(0, 229, 255, .12),
                    inset 0 0 40px rgba(0, 229, 255, .05);
            }

            .visual-core span {
                color: var(--white-muted);
                font-size: .55rem;
                letter-spacing: .2em;
            }

            .visual-core strong {
                color: var(--cyan);
                font-size: 1.2rem;
                letter-spacing: .08em;
            }

            .core-dot {
                width: 7px;
                height: 7px;
                background: var(--cyan);
                border-radius: 50%;
                box-shadow: 0 0 20px var(--cyan);
                margin-bottom: 8px;
            }

            .floating-code {
                position: absolute;
                width: 52px;
                height: 52px;
                border: 1px solid var(--glass-border);
                background: rgba(10, 13, 20, .8);
                backdrop-filter: blur(10px);
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 12px;
                color: var(--cyan);
                font-size: .75rem;
                font-weight: 700;
                box-shadow: 0 10px 30px rgba(0, 0, 0, .3);
            }

            .code-one {
                top: 15%;
                right: 22%;
            }

            .code-two {
                bottom: 18%;
                right: 15%;
            }

            .code-three {
                top: 48%;
                left: 2%;
            }

            @keyframes demoRotate {
                to {
                    transform: translate(-50%, -50%) rotate(360deg);
                }
            }

            @keyframes demoRotateReverse {
                to {
                    transform: translate(-50%, -50%) rotate(-360deg);
                }
            }


            /* =========================================================
                   LIBRARY SECTION
                ========================================================= */

            .demo-library-section {
                padding: 110px 0 80px;
            }

            .demo-section-heading {
                display: flex;
                justify-content: space-between;
                gap: 50px;
                align-items: flex-end;
                margin-bottom: 40px;
            }

            .demo-section-heading h2 {
                margin-top: 12px;
                font-size: clamp(2rem, 4vw, 3.5rem);
                line-height: 1;
                letter-spacing: -.045em;
            }

            .demo-section-heading>p {
                max-width: 430px;
                color: var(--white-muted);
                font-size: .92rem;
                line-height: 1.8;
                margin: 0;
            }


            /* Category filter */

            .demo-category-nav {
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
                margin-bottom: 75px;
                padding-bottom: 18px;
                border-bottom: 1px solid var(--glass-border);
            }

            .category-filter {
                appearance: none;
                border: 1px solid var(--glass-border);
                background: var(--glass-bg);
                color: var(--white-muted);
                padding: 9px 16px;
                border-radius: 50px;
                font-family: inherit;
                font-size: .78rem;
                cursor: pointer;
                transition: var(--transition);
            }

            .category-filter:hover,
            .category-filter.active {
                border-color: var(--cyan);
                color: var(--cyan);
                background: var(--cyan-subtle);
            }


            /* Category */

            .demo-category-block {
                margin-bottom: 90px;
            }

            .category-block-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 30px;
                margin-bottom: 12px;
            }

            .category-title-wrap {
                display: flex;
                align-items: center;
                gap: 17px;
            }

            .category-icon {
                width: 52px;
                height: 52px;
                flex-shrink: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid var(--glass-border);
                background: var(--glass-bg);
                border-radius: 14px;
                color: var(--cyan);
                font-size: 1.1rem;
                box-shadow: inset 0 0 25px rgba(0, 229, 255, .03);
            }

            .category-number {
                display: block;
                color: var(--cyan);
                font-size: .65rem;
                font-weight: 700;
                letter-spacing: .15em;
                margin-bottom: 3px;
            }

            .category-title-wrap h3 {
                font-size: 1.7rem;
                letter-spacing: -.03em;
                margin: 0;
            }

            .category-meta {
                display: flex;
                align-items: center;
                gap: 10px;
                color: var(--white-muted);
                font-size: .72rem;
                white-space: nowrap;
            }

            .meta-dot {
                width: 4px;
                height: 4px;
                border-radius: 50%;
                background: var(--cyan);
            }

            .category-description {
                color: var(--white-muted);
                font-size: .88rem;
                max-width: 700px;
                line-height: 1.75;
                margin: 0 0 25px 69px;
            }


            /* Demo grid */

            .demo-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 22px;
            }


            /* Demo card */

            .demo-card {
                min-width: 0;
                overflow: hidden;
                border: 1px solid var(--glass-border);
                background: var(--card-bg);
                border-radius: var(--radius-lg);
                transition: var(--transition);
            }

            .demo-card:hover {
                transform: translateY(-7px);
                border-color: var(--glass-border-hover);
                box-shadow:
                    0 25px 70px rgba(0, 0, 0, .35),
                    0 0 35px rgba(0, 229, 255, .05);
            }

            .demo-card-media {
                position: relative;
                height: 245px;
                overflow: hidden;
                background: #080b11;
            }

            .demo-card-media img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
                transition: transform .7s cubic-bezier(.22, .61, .36, 1);
            }

            .demo-card:hover .demo-card-media img {
                transform: scale(1.05);
            }


            /* Placeholder */

            .demo-image-placeholder {
                width: 100%;
                height: 100%;
                position: relative;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center;
                background:
                    radial-gradient(circle at 50% 20%,
                        rgba(0, 229, 255, .12),
                        transparent 50%),
                    #080b11;
            }

            .placeholder-grid {
                position: absolute;
                inset: 0;
                opacity: .5;
                background-image:
                    linear-gradient(rgba(0, 229, 255, .07) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(0, 229, 255, .07) 1px, transparent 1px);
                background-size: 30px 30px;
            }

            .placeholder-content {
                position: relative;
                z-index: 2;
                width: 72%;
                text-align: center;
            }

            .placeholder-content>span {
                display: block;
                color: var(--cyan);
                text-transform: uppercase;
                font-size: .55rem;
                letter-spacing: .18em;
                margin-bottom: 8px;
            }

            .placeholder-content>strong {
                display: block;
                color: var(--white);
                font-size: 1.1rem;
                margin-bottom: 18px;
            }

            .placeholder-browser {
                border: 1px solid rgba(255, 255, 255, .12);
                border-radius: 7px;
                overflow: hidden;
                background: rgba(255, 255, 255, .03);
                box-shadow: 0 15px 30px rgba(0, 0, 0, .4);
            }

            .browser-bar {
                height: 20px;
                display: flex;
                align-items: center;
                gap: 4px;
                padding-left: 8px;
                border-bottom: 1px solid rgba(255, 255, 255, .08);
            }

            .browser-bar i {
                width: 4px;
                height: 4px;
                border-radius: 50%;
                background: var(--white-muted);
            }

            .browser-content {
                height: 80px;
                padding: 12px;
                display: grid;
                gap: 6px;
                grid-template-columns: 1fr 1fr;
            }

            .browser-content div {
                border: 1px solid rgba(0, 229, 255, .12);
                background: rgba(0, 229, 255, .04);
                border-radius: 3px;
            }

            .browser-content div:first-child {
                grid-column: 1 / -1;
            }


            /* Card overlay */

            .demo-card-overlay {
                position: absolute;
                inset: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(5, 9, 15, .72);
                opacity: 0;
                transition: var(--transition);
            }

            .demo-card:hover .demo-card-overlay {
                opacity: 1;
            }

            .demo-preview-btn {
                display: inline-flex;
                align-items: center;
                gap: 9px;
                color: var(--cyan);
                border: 1px solid var(--cyan);
                background: rgba(10, 13, 20, .8);
                border-radius: 50px;
                padding: 10px 18px;
                font-size: .78rem;
                font-weight: 700;
                text-decoration: none;
                transform: translateY(10px);
                transition: var(--transition);
            }

            .demo-card:hover .demo-preview-btn {
                transform: translateY(0);
            }

            .demo-preview-btn:hover {
                color: var(--bg-deep);
                background: var(--cyan);
            }

            .featured-badge {
                position: absolute;
                top: 14px;
                left: 14px;
                z-index: 3;
                padding: 6px 10px;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                border: 1px solid rgba(0, 229, 255, .25);
                border-radius: 50px;
                background: rgba(10, 13, 20, .82);
                backdrop-filter: blur(10px);
                color: var(--cyan);
                font-size: .62rem;
                font-weight: 700;
            }


            /* Card body */

            .demo-card-body {
                padding: 21px;
            }

            .demo-card-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 10px;
                margin-bottom: 12px;
            }

            .demo-category-label {
                color: var(--cyan);
                font-size: .61rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .12em;
            }

            .demo-tech {
                color: var(--white-muted);
                font-size: .6rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 48%;
            }

            .demo-card-body h4 {
                font-size: 1.15rem;
                letter-spacing: -.025em;
                margin-bottom: 8px;
            }

            .demo-card-body>p {
                color: var(--white-muted);
                font-size: .78rem;
                line-height: 1.7;
                min-height: 54px;
                margin-bottom: 18px;
            }

            .demo-card-footer {
                padding-top: 16px;
                border-top: 1px solid var(--glass-border);
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .demo-details-link {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                color: var(--white-soft);
                text-decoration: none;
                font-size: .76rem;
                font-weight: 700;
                transition: var(--transition);
            }

            .demo-details-link i {
                color: var(--cyan);
                transition: var(--transition);
            }

            .demo-details-link:hover {
                color: var(--cyan);
            }

            .demo-details-link:hover i {
                transform: translateX(4px);
            }

            .demo-live-link {
                width: 32px;
                height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--white-muted);
                border: 1px solid var(--glass-border);
                border-radius: 8px;
                text-decoration: none;
                transition: var(--transition);
            }

            .demo-live-link:hover {
                color: var(--cyan);
                border-color: var(--cyan);
            }


            /* Empty */

            .demo-empty-state {
                padding: 90px 20px;
                text-align: center;
                border: 1px dashed var(--glass-border);
                border-radius: var(--radius-lg);
            }

            .empty-icon {
                width: 65px;
                height: 65px;
                margin: 0 auto 20px;
                border-radius: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid var(--glass-border);
                color: var(--cyan);
                font-size: 1.3rem;
            }

            .demo-empty-state h3 {
                margin-bottom: 8px;
            }

            .demo-empty-state p {
                color: var(--white-muted);
                margin: 0;
            }


            /* =========================================================
                   CTA
                ========================================================= */

            .demo-cta-section {
                padding: 30px 0 110px;
            }

            .demo-cta {
                position: relative;
                overflow: hidden;
                min-height: 390px;
                padding: 70px;
                display: flex;
                align-items: center;
                border: 1px solid rgba(0, 229, 255, .16);
                border-radius: var(--radius-lg);
                background:
                    radial-gradient(circle at 85% 50%,
                        rgba(0, 229, 255, .1),
                        transparent 35%),
                    var(--card-bg);
            }

            .cta-grid {
                position: absolute;
                inset: 0;
                opacity: .3;
                background-image:
                    linear-gradient(rgba(0, 229, 255, .05) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(0, 229, 255, .05) 1px, transparent 1px);
                background-size: 40px 40px;
                mask-image: linear-gradient(90deg,
                        black,
                        transparent 80%);
            }

            .cta-content {
                position: relative;
                z-index: 2;
                max-width: 650px;
            }

            .cta-content .section-kicker {
                margin-bottom: 20px;
            }

            .demo-cta h2 {
                font-size: clamp(2.3rem, 5vw, 4.5rem);
                line-height: 1;
                letter-spacing: -.055em;
                margin-bottom: 20px;
            }

            .demo-cta p {
                max-width: 570px;
                color: var(--white-muted);
                line-height: 1.8;
                font-size: .9rem;
                margin-bottom: 28px;
            }

            .cta-symbol {
                position: absolute;
                right: 10%;
                width: 230px;
                height: 230px;
                border: 1px solid rgba(0, 229, 255, .15);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 0 100px rgba(0, 229, 255, .07);
            }

            .cta-symbol::before,
            .cta-symbol::after {
                content: "";
                position: absolute;
                border: 1px solid rgba(0, 229, 255, .1);
                border-radius: 50%;
            }

            .cta-symbol::before {
                inset: 25px;
            }

            .cta-symbol::after {
                inset: 55px;
            }

            .cta-symbol span {
                position: relative;
                z-index: 2;
                color: var(--cyan);
                font-size: 2rem;
                font-weight: 800;
                letter-spacing: -.08em;
            }


            /* =========================================================
                   RESPONSIVE
                ========================================================= */

            @media (max-width: 1100px) {

                .demo-hero-visual {
                    right: -100px;
                    opacity: .35;
                }

                .demo-hero-content {
                    max-width: 620px;
                }

                .demo-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

            }


            @media (max-width: 768px) {

                .demo-library-hero {
                    min-height: auto;
                    padding: 140px 25px 90px;
                }

                .demo-hero-content h1 {
                    font-size: clamp(2.8rem, 13vw, 4.5rem);
                }

                .demo-hero-visual {
                    width: 420px;
                    height: 420px;
                    right: -190px;
                    top: 55%;
                    opacity: .18;
                }

                .demo-section-heading {
                    display: block;
                }

                .demo-section-heading>p {
                    margin-top: 20px;
                }

                .demo-category-nav {
                    margin-bottom: 55px;
                    overflow-x: auto;
                    flex-wrap: nowrap;
                    padding-bottom: 14px;
                }

                .category-filter {
                    flex-shrink: 0;
                }

                .category-block-header {
                    align-items: flex-start;
                    flex-direction: column;
                }

                .category-meta {
                    margin-left: 69px;
                }

                .category-description {
                    margin-left: 0;
                }

                .demo-grid {
                    grid-template-columns: 1fr;
                }

                .demo-cta {
                    padding: 45px 30px;
                }

                .cta-symbol {
                    width: 160px;
                    height: 160px;
                    right: -40px;
                    opacity: .5;
                }

            }


            @media (max-width: 480px) {

                .demo-container {
                    width: min(100% - 30px, 1200px);
                }

                .demo-library-section {
                    padding-top: 75px;
                }

                .demo-hero-actions {
                    flex-direction: column;
                    align-items: stretch;
                }

                .demo-primary-btn,
                .demo-secondary-btn {
                    width: 100%;
                }

                .category-title-wrap h3 {
                    font-size: 1.35rem;
                }

                .demo-card-media {
                    height: 215px;
                }

                .demo-card-body {
                    padding: 18px;
                }

                .demo-cta-section {
                    padding-bottom: 70px;
                }

                .demo-cta {
                    min-height: 430px;
                }

                .cta-symbol {
                    bottom: -50px;
                    right: -50px;
                }

            }
        </style>
    @endpush


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const filters = document.querySelectorAll('.category-filter');
                const categories = document.querySelectorAll('.demo-category-block');

                if (!filters.length || !categories.length) {
                    return;
                }

                filters.forEach(function(filter) {

                    filter.addEventListener('click', function() {

                        const target = this.dataset.filter;

                        filters.forEach(function(item) {
                            item.classList.remove('active');
                        });

                        this.classList.add('active');

                        categories.forEach(function(category) {

                            if (
                                target === 'all' ||
                                category.dataset.category === target
                            ) {
                                category.style.display = '';
                            } else {
                                category.style.display = 'none';
                            }

                        });

                        const librarySection =
                            document.querySelector('#demo-categories');

                        if (librarySection) {

                            const offset = 90;

                            const position =
                                librarySection.getBoundingClientRect().top +
                                window.scrollY -
                                offset;

                            window.scrollTo({
                                top: position,
                                behavior: 'smooth'
                            });

                        }

                    });

                });

            });
        </script>
    @endpush

</x-guest-layout>
