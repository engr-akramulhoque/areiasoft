<x-guest-layout>


    {{-- ============================================================
        PAGE STYLES
    ============================================================= --}}

    <style>
        .landing-page {
            --landing-border: rgba(255, 255, 255, 0.10);
            --landing-muted: rgba(255, 255, 255, 0.68);
            --landing-soft: rgba(255, 255, 255, 0.05);
        }

        .landing-page *,
        .landing-page *::before,
        .landing-page *::after {
            box-sizing: border-box;
        }

        .landing-page .container {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
        }

        /* ---------------------------------------------------------
           HERO
        --------------------------------------------------------- */

        .landing-hero {
            position: relative;
            overflow: hidden;
            padding: 110px 0 90px;
        }

        .landing-hero::before {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            border-radius: 50%;
            top: -240px;
            right: -120px;
            background: rgba(255, 255, 255, 0.035);
            filter: blur(20px);
            pointer-events: none;
        }

        .landing-hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(0, 0.95fr);
            align-items: center;
            gap: 70px;
        }

        .landing-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            opacity: 0.72;
        }

        .landing-eyebrow::before {
            content: "";
            width: 28px;
            height: 1px;
            background: currentColor;
            opacity: 0.7;
        }

        .landing-hero h1 {
            margin: 0;
            max-width: 760px;
            font-size: clamp(42px, 5vw, 72px);
            line-height: 1.04;
            letter-spacing: -0.04em;
        }

        .landing-hero-description {
            max-width: 680px;
            margin: 28px 0 0;
            font-size: 18px;
            line-height: 1.75;
            color: var(--landing-muted);
        }

        .landing-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 34px;
        }

        .landing-actions .btn-primary,
        .landing-actions .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .landing-actions .btn-primary:hover,
        .landing-actions .btn-secondary:hover {
            transform: translateY(-2px);
        }

        .landing-actions .btn-secondary {
            border: 1px solid var(--landing-border);
            background: var(--landing-soft);
        }

        .landing-hero-visual {
            position: relative;
        }

        .landing-hero-image {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--landing-border);
            border-radius: 24px;
            background: var(--landing-soft);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.20);
        }

        .landing-hero-image img {
            display: block;
            width: 100%;
            height: auto;
            aspect-ratio: 1 / 0.82;
            object-fit: cover;
        }

        .landing-visual-label {
            position: absolute;
            left: 20px;
            bottom: 20px;
            max-width: calc(100% - 40px);
            padding: 12px 16px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            background: rgba(0, 0, 0, 0.42);
            backdrop-filter: blur(14px);
            font-size: 13px;
            font-weight: 600;
        }

        /* ---------------------------------------------------------
           TRUST STRIP
        --------------------------------------------------------- */

        .landing-trust {
            border-top: 1px solid var(--landing-border);
            border-bottom: 1px solid var(--landing-border);
        }

        .landing-trust-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .landing-trust-item {
            padding: 24px 20px;
            border-right: 1px solid var(--landing-border);
            font-size: 14px;
            font-weight: 600;
            text-align: center;
        }

        .landing-trust-item:first-child {
            border-left: 1px solid var(--landing-border);
        }

        /* ---------------------------------------------------------
           SECTIONS
        --------------------------------------------------------- */

        .landing-section {
            padding: 100px 0;
        }

        .landing-section-header {
            max-width: 760px;
            margin-bottom: 48px;
        }

        .landing-section-label {
            margin-bottom: 12px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            opacity: 0.55;
        }

        .landing-section-header h2 {
            margin: 0;
            font-size: clamp(32px, 4vw, 50px);
            line-height: 1.1;
            letter-spacing: -0.035em;
        }

        .landing-section-header p {
            margin: 18px 0 0;
            color: var(--landing-muted);
            line-height: 1.75;
        }

        /* ---------------------------------------------------------
           PROBLEM / SOLUTION
        --------------------------------------------------------- */

        .landing-split {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .landing-card {
            padding: 34px;
            border: 1px solid var(--landing-border);
            border-radius: 18px;
            background: var(--landing-soft);
        }

        .landing-card h3 {
            margin: 0;
            font-size: 25px;
            line-height: 1.25;
        }

        .landing-card>p {
            margin: 18px 0 0;
            color: var(--landing-muted);
            line-height: 1.75;
        }

        .landing-check-list {
            display: grid;
            gap: 12px;
            margin: 25px 0 0;
            padding: 0;
            list-style: none;
        }

        .landing-check-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            line-height: 1.55;
        }

        .landing-check-list li::before {
            content: "✓";
            flex: 0 0 auto;
            margin-top: 1px;
            font-weight: 800;
        }

        /* ---------------------------------------------------------
           CAPABILITIES
        --------------------------------------------------------- */

        .landing-capabilities {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .landing-capability {
            min-height: 220px;
            padding: 30px;
            border: 1px solid var(--landing-border);
            border-radius: 18px;
            background: var(--landing-soft);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .landing-capability:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 255, 255, 0.20);
        }

        .landing-capability-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            margin-bottom: 24px;
            border: 1px solid var(--landing-border);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.04);
            font-size: 18px;
            font-weight: 700;
        }

        .landing-capability h3 {
            margin: 0;
            font-size: 20px;
        }

        .landing-capability p {
            margin: 12px 0 0;
            color: var(--landing-muted);
            line-height: 1.65;
            font-size: 14px;
        }

        /* ---------------------------------------------------------
           PROCESS
        --------------------------------------------------------- */

        .landing-process {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 0;
        }

        .landing-process-item {
            position: relative;
            padding: 30px 24px;
            border-top: 1px solid var(--landing-border);
        }

        .landing-process-item:not(:last-child) {
            border-right: 1px solid var(--landing-border);
        }

        .landing-process-number {
            margin-bottom: 26px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.1em;
            opacity: 0.45;
        }

        .landing-process-item h3 {
            margin: 0;
            font-size: 20px;
        }

        .landing-process-item p {
            margin: 12px 0 0;
            color: var(--landing-muted);
            font-size: 14px;
            line-height: 1.65;
        }

        /* ---------------------------------------------------------
           TECHNOLOGY
        --------------------------------------------------------- */

        .landing-tech-card {
            padding: 40px;
            border: 1px solid var(--landing-border);
            border-radius: 20px;
            background: var(--landing-soft);
        }

        .landing-tech-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .landing-tech-list li {
            padding: 10px 15px;
            border: 1px solid var(--landing-border);
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.035);
            font-size: 13px;
            font-weight: 600;
        }

        /* ---------------------------------------------------------
           BENEFITS
        --------------------------------------------------------- */

        .landing-benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
        }

        .landing-benefit {
            padding: 22px;
            border: 1px solid var(--landing-border);
            border-radius: 14px;
            background: var(--landing-soft);
            font-weight: 600;
        }

        /* ---------------------------------------------------------
           RELATED
        --------------------------------------------------------- */

        .landing-related-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .landing-related-card {
            display: block;
            padding: 28px;
            border: 1px solid var(--landing-border);
            border-radius: 18px;
            background: var(--landing-soft);
            color: inherit;
            text-decoration: none;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .landing-related-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 255, 255, 0.20);
        }

        .landing-related-card span {
            display: block;
            margin-bottom: 12px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            opacity: 0.45;
        }

        .landing-related-card h3 {
            margin: 0;
            font-size: 20px;
        }

        .landing-related-card p {
            margin: 10px 0 0;
            color: var(--landing-muted);
            font-size: 14px;
            line-height: 1.6;
        }

        /* ---------------------------------------------------------
           FAQ
        --------------------------------------------------------- */

        .landing-faq {
            max-width: 850px;
            margin: 0 auto;
        }

        .landing-faq details {
            border-top: 1px solid var(--landing-border);
        }

        .landing-faq details:last-child {
            border-bottom: 1px solid var(--landing-border);
        }

        .landing-faq summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            padding: 24px 0;
            cursor: pointer;
            list-style: none;
            font-size: 18px;
            font-weight: 700;
        }

        .landing-faq summary::-webkit-details-marker {
            display: none;
        }

        .landing-faq summary::after {
            content: "+";
            flex: 0 0 auto;
            font-size: 24px;
            font-weight: 400;
            opacity: 0.5;
        }

        .landing-faq details[open] summary::after {
            content: "−";
        }

        .landing-faq-answer {
            max-width: 760px;
            padding: 0 0 25px;
            color: var(--landing-muted);
            line-height: 1.75;
        }

        /* ---------------------------------------------------------
           FINAL CTA
        --------------------------------------------------------- */

        .landing-cta {
            padding: 100px 0 120px;
        }

        .landing-cta-card {
            position: relative;
            overflow: hidden;
            padding: 65px;
            border: 1px solid var(--landing-border);
            border-radius: 24px;
            background: var(--landing-soft);
            text-align: center;
        }

        .landing-cta-card::before {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            left: 50%;
            top: -260px;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.04);
            filter: blur(10px);
        }

        .landing-cta-card h2 {
            position: relative;
            margin: 0 auto;
            max-width: 760px;
            font-size: clamp(32px, 4vw, 52px);
            line-height: 1.1;
            letter-spacing: -0.035em;
        }

        .landing-cta-card p {
            position: relative;
            max-width: 650px;
            margin: 18px auto 0;
            color: var(--landing-muted);
            line-height: 1.7;
        }

        .landing-cta-card .landing-actions {
            position: relative;
            justify-content: center;
        }

        /* ---------------------------------------------------------
           RESPONSIVE
        --------------------------------------------------------- */

        @media (max-width: 1000px) {

            .landing-hero-grid {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .landing-hero {
                padding-top: 80px;
            }

            .landing-trust-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .landing-capabilities {
                grid-template-columns: repeat(2, 1fr);
            }

            .landing-process {
                grid-template-columns: repeat(2, 1fr);
            }

            .landing-process-item:nth-child(2) {
                border-right: none;
            }

            .landing-process-item:nth-child(n + 3) {
                border-top: 1px solid var(--landing-border);
            }

            .landing-benefits-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .landing-related-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {

            .landing-page .container {
                width: min(100% - 28px, 1180px);
            }

            .landing-section {
                padding: 70px 0;
            }

            .landing-hero {
                padding: 65px 0 60px;
            }

            .landing-hero h1 {
                font-size: 42px;
            }

            .landing-hero-description {
                font-size: 16px;
            }

            .landing-split,
            .landing-capabilities,
            .landing-benefits-grid,
            .landing-trust-grid,
            .landing-process {
                grid-template-columns: 1fr;
            }

            .landing-trust-item {
                border-left: 1px solid var(--landing-border);
                border-bottom: 1px solid var(--landing-border);
            }

            .landing-process-item,
            .landing-process-item:not(:last-child) {
                border-right: none;
                border-bottom: 1px solid var(--landing-border);
            }

            .landing-card,
            .landing-tech-card {
                padding: 26px;
            }

            .landing-cta-card {
                padding: 45px 25px;
            }
        }
    </style>


    {{-- ============================================================
        LANDING PAGE
    ============================================================= --}}

    <main class="landing-page">

        {{-- ========================================================
            HERO
        ========================================================= --}}

        <section class="landing-hero">
            <div class="container">

                <div class="landing-hero-grid">

                    <div class="landing-hero-content">

                        <div class="landing-eyebrow">
                            {{ $page['eyebrow'] }}
                        </div>

                        <h1>
                            {{ $page['hero_title'] }}
                        </h1>

                        <p class="landing-hero-description">
                            {{ $page['hero_description'] }}
                        </p>

                        <div class="landing-actions">

                            <a href="{{ $page['primary_cta_url'] === 'contact' ? route('contact.index') : url($page['primary_cta_url']) }}"
                                class="btn-primary">
                                {{ $page['primary_cta'] }}
                            </a>

                            <a href="{{ $page['secondary_cta_url'] === 'services' ? route('service.index') : url($page['secondary_cta_url']) }}"
                                class="btn-secondary">
                                {{ $page['secondary_cta'] }}
                            </a>

                        </div>

                    </div>


                    @if (!empty($page['hero_image']))
                        <div class="landing-hero-visual">

                            <div class="landing-hero-image">

                                <img src="{{ asset($page['hero_image']) }}" alt="{{ $page['title'] }} - Areia Soft"
                                    loading="eager">

                                <div class="landing-visual-label">
                                    {{ $page['title'] }}
                                </div>

                            </div>

                        </div>
                    @endif

                </div>

            </div>
        </section>


        {{-- ========================================================
            TRUST / CAPABILITY STRIP
        ========================================================= --}}

        @if (!empty($page['trust_points']))

            <section class="landing-trust">

                <div class="container">

                    <div class="landing-trust-grid">

                        @foreach ($page['trust_points'] as $point)
                            <div class="landing-trust-item">
                                {{ $point }}
                            </div>
                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- ========================================================
            PROBLEM → SOLUTION
        ========================================================= --}}

        <section class="landing-section">

            <div class="container">

                <div class="landing-split">

                    {{-- Problem --}}

                    <article class="landing-card">

                        <div class="landing-section-label">
                            The challenge
                        </div>

                        <h3>
                            {{ $page['problem']['title'] }}
                        </h3>

                        <p>
                            {{ $page['problem']['text'] }}
                        </p>

                        @if (!empty($page['problem']['points']))

                            <ul class="landing-check-list">

                                @foreach ($page['problem']['points'] as $point)
                                    <li>
                                        {{ $point }}
                                    </li>
                                @endforeach

                            </ul>

                        @endif

                    </article>


                    {{-- Solution --}}

                    <article class="landing-card">

                        <div class="landing-section-label">
                            Our approach
                        </div>

                        <h3>
                            {{ $page['solution']['title'] }}
                        </h3>

                        <p>
                            {{ $page['solution']['text'] }}
                        </p>

                        @if (!empty($page['solution']['points']))

                            <ul class="landing-check-list">

                                @foreach ($page['solution']['points'] as $point)
                                    <li>
                                        {{ $point }}
                                    </li>
                                @endforeach

                            </ul>

                        @endif

                    </article>

                </div>

            </div>

        </section>


        {{-- ========================================================
            CAPABILITIES
        ========================================================= --}}

        @if (!empty($page['capabilities']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            What we can build
                        </div>

                        <h2>
                            {{ $page['title'] }} capabilities for real business needs.
                        </h2>

                        <p>
                            Explore the areas where our team can design, develop and
                            integrate solutions around your requirements.
                        </p>

                    </div>


                    <div class="landing-capabilities">

                        @foreach ($page['capabilities'] as $capability)
                            <article class="landing-capability">

                                <div class="landing-capability-icon">
                                    {{ strtoupper(substr($capability['icon'] ?? '•', 0, 1)) }}
                                </div>

                                <h3>
                                    {{ $capability['title'] }}
                                </h3>

                                <p>
                                    {{ $capability['text'] }}
                                </p>

                            </article>
                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- ========================================================
            PROCESS
        ========================================================= --}}

        @if (!empty($page['process']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            How we work
                        </div>

                        <h2>
                            A structured process from idea to launch.
                        </h2>

                        <p>
                            Every project starts with understanding the problem before
                            we decide how the technology should solve it.
                        </p>

                    </div>


                    <div class="landing-process">

                        @foreach ($page['process'] as $step)
                            <article class="landing-process-item">

                                <div class="landing-process-number">
                                    {{ $step['number'] }}
                                </div>

                                <h3>
                                    {{ $step['title'] }}
                                </h3>

                                <p>
                                    {{ $step['text'] }}
                                </p>

                            </article>
                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- ========================================================
            TECHNOLOGIES
        ========================================================= --}}

        @if (!empty($page['technologies']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            Technology
                        </div>

                        <h2>
                            Technology selected around the project.
                        </h2>

                        <p>
                            We choose technologies according to the application's
                            requirements, scalability needs and long-term maintainability.
                        </p>

                    </div>


                    <div class="landing-tech-card">

                        <ul class="landing-tech-list">

                            @foreach ($page['technologies'] as $technology)
                                <li>
                                    {{ $technology }}
                                </li>
                            @endforeach

                        </ul>

                    </div>

                </div>

            </section>

        @endif


        {{-- ========================================================
            BENEFITS
        ========================================================= --}}

        @if (!empty($page['benefits']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            Why it matters
                        </div>

                        <h2>
                            Built for practical business outcomes.
                        </h2>

                    </div>


                    <div class="landing-benefits-grid">

                        @foreach ($page['benefits'] as $benefit)
                            <div class="landing-benefit">
                                {{ $benefit }}
                            </div>
                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- ========================================================
            RELATED LANDING PAGES
        ========================================================= --}}

        @if (!empty($page['related_pages']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            Explore further
                        </div>

                        <h2>
                            Related solutions from Areia Soft.
                        </h2>

                        <p>
                            Explore other areas that may complement your project.
                        </p>

                    </div>


                    <div class="landing-related-grid">

                        @foreach ($page['related_pages'] as $relatedSlug)
                            @php
                                $relatedPage = config('landing-pages.pages.' . $relatedSlug);
                            @endphp

                            @if ($relatedPage)
                                <a href="{{ url('/' . $relatedPage['slug']) }}" class="landing-related-card">

                                    <span>
                                        Related solution
                                    </span>

                                    <h3>
                                        {{ $relatedPage['title'] }}
                                    </h3>

                                    <p>
                                        {{ $relatedPage['hero_description'] }}
                                    </p>

                                </a>
                            @endif
                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- ========================================================
            FAQ
        ========================================================= --}}

        @if (!empty($page['faqs']))

            <section class="landing-section">

                <div class="container">

                    <div class="landing-section-header">

                        <div class="landing-section-label">
                            Frequently asked questions
                        </div>

                        <h2>
                            Questions about {{ $page['title'] }}.
                        </h2>

                    </div>


                    <div class="landing-faq">

                        @foreach ($page['faqs'] as $faq)
                            <details>

                                <summary>
                                    {{ $faq['question'] }}
                                </summary>

                                <div class="landing-faq-answer">
                                    {{ $faq['answer'] }}
                                </div>

                            </details>
                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- ========================================================
            FINAL CTA
        ========================================================= --}}

        <section class="landing-cta">

            <div class="container">

                <div class="landing-cta-card">

                    <h2>
                        Ready to turn your {{ strtolower($page['title']) }} idea into something useful?
                    </h2>

                    <p>
                        Tell us what you are trying to build, improve or automate.
                        We can help you define the right technical approach.
                    </p>

                    <div class="landing-actions">

                        <a href="{{ route('contact.index') }}" class="btn-primary">
                            {{ $page['primary_cta'] }}
                        </a>

                        <a href="{{ route('service.index') }}" class="btn-secondary">
                            View All Services
                        </a>

                    </div>

                </div>

            </div>

        </section>

    </main>


</x-guest-layout>
