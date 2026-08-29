<x-guest-layout>
    @push('styles')
        <style>
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
            }

            .page-section {
                padding: 5rem 0;
            }

            /* ── Hero ── */
            .case-hero {
                padding: 10rem 2rem 5rem;
                text-align: center;
                max-width: 1000px;
                margin: 0 auto;
            }

            .case-hero h1 {
                font-size: clamp(2.5rem, 5vw, 4.2rem);
                font-weight: 800;
                letter-spacing: -0.04em;
                line-height: 1.1;
                margin: 0.8rem 0 1.5rem;
            }

            .case-hero .highlight {
                color: var(--cyan);
            }

            .case-hero p {
                max-width: 760px;
                margin: 0 auto;
                color: var(--white-muted);
                font-size: 1.05rem;
                line-height: 1.8;
            }

            /* ── Featured Case Study ── */
            .featured-case {
                position: relative;
                overflow: hidden;
                display: grid;
                grid-template-columns: 1.1fr 0.9fr;
                gap: 3rem;
                align-items: center;
                padding: 2rem;
                background: var(--card-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                transition: var(--transition);
            }

            .featured-case:hover {
                border-color: var(--cyan);
                box-shadow: 0 0 40px var(--cyan-glow);
            }

            .featured-image {
                min-height: 400px;
                border-radius: calc(var(--radius-lg) - 5px);
                overflow: hidden;
                background:
                    linear-gradient(135deg, rgba(0, 229, 255, 0.08), rgba(10, 25, 50, 0.7)),
                    url('/static/frontend/assets/images/case-study-featured.png');
                background-size: cover;
                background-position: center;
                border: 1px solid var(--glass-border);
            }

            .featured-content {
                padding: 1rem;
            }

            .case-badge {
                display: inline-flex;
                align-items: center;
                gap: 0.4rem;
                color: var(--cyan);
                font-size: 0.75rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.12em;
                margin-bottom: 1rem;
            }

            .featured-content h2 {
                font-size: clamp(2rem, 4vw, 3rem);
                line-height: 1.15;
                font-weight: 800;
                margin-bottom: 1rem;
            }

            .featured-content p {
                color: var(--white-muted);
                line-height: 1.75;
                margin-bottom: 1.5rem;
            }

            .case-meta {
                display: flex;
                flex-wrap: wrap;
                gap: 0.6rem;
                margin-bottom: 1.8rem;
            }

            .case-tag {
                padding: 0.45rem 0.8rem;
                border-radius: 999px;
                background: var(--cyan-subtle);
                border: 1px solid var(--glass-border);
                color: var(--white-muted);
                font-size: 0.78rem;
            }

            .case-button {
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                padding: 0.8rem 1.2rem;
                border-radius: 0.7rem;
                background: var(--cyan);
                color: #06131f;
                font-weight: 700;
                text-decoration: none;
                transition: var(--transition);
            }

            .case-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px var(--cyan-glow);
                color: #06131f;
            }

            /* ── Section Heading ── */
            .section-heading {
                text-align: center;
                max-width: 700px;
                margin: 0 auto 3rem;
            }

            .section-heading h2 {
                font-size: clamp(2rem, 4vw, 3rem);
                font-weight: 800;
                margin-bottom: 0.8rem;
            }

            .section-heading p {
                color: var(--white-muted);
                line-height: 1.7;
            }

            /* ── Case Study Grid ── */
            .case-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1.8rem;
            }

            .case-card {
                overflow: hidden;
                background: var(--card-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                transition: var(--transition);
            }

            .case-card:hover {
                transform: translateY(-6px);
                border-color: var(--cyan);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            }

            .case-card-image {
                height: 260px;
                background-size: cover;
                background-position: center;
                border-bottom: 1px solid var(--glass-border);
                position: relative;
            }

            .case-card-image::after {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(to top,
                        rgba(5, 15, 28, 0.65),
                        transparent 60%);
            }

            .case-card:nth-child(1) .case-card-image {
                background-image: url('/static/frontend/assets/images/case-study-1.png');
            }

            .case-card:nth-child(2) .case-card-image {
                background-image: url('/static/frontend/assets/images/case-study-2.png');
            }

            .case-card:nth-child(3) .case-card-image {
                background-image: url('/static/frontend/assets/images/case-study-3.png');
            }

            .case-card:nth-child(4) .case-card-image {
                background-image: url('/static/frontend/assets/images/case-study-4.png');
            }

            .case-card-content {
                padding: 1.7rem;
            }

            .case-card-content .category {
                color: var(--cyan);
                font-size: 0.72rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                margin-bottom: 0.7rem;
            }

            .case-card-content h3 {
                font-size: 1.35rem;
                font-weight: 750;
                margin-bottom: 0.7rem;
            }

            .case-card-content p {
                color: var(--white-muted);
                font-size: 0.9rem;
                line-height: 1.7;
                margin-bottom: 1.2rem;
            }

            .case-card-link {
                display: inline-flex;
                align-items: center;
                gap: 0.4rem;
                color: var(--cyan);
                font-size: 0.85rem;
                font-weight: 700;
                text-decoration: none;
            }

            .case-card-link:hover {
                gap: 0.7rem;
            }

            /* ── Results ── */
            .results-section {
                text-align: center;
            }

            .results-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 1rem;
            }

            .result-card {
                padding: 2rem 1rem;
                background: var(--card-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                transition: var(--transition);
            }

            .result-card:hover {
                border-color: var(--cyan);
                transform: translateY(-4px);
            }

            .result-number {
                display: block;
                font-size: 2.2rem;
                font-weight: 800;
                color: var(--cyan);
                margin-bottom: 0.4rem;
            }

            .result-label {
                color: var(--white-muted);
                font-size: 0.85rem;
            }

            /* ── CTA ── */
            .case-cta {
                text-align: center;
                padding: 4rem 2rem;
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                background:
                    radial-gradient(circle at top,
                        var(--cyan-subtle),
                        transparent 60%),
                    var(--card-bg);
                backdrop-filter: blur(20px);
            }

            .case-cta h2 {
                font-size: clamp(2rem, 4vw, 3rem);
                font-weight: 800;
                margin-bottom: 0.8rem;
            }

            .case-cta p {
                max-width: 650px;
                margin: 0 auto 1.5rem;
                color: var(--white-muted);
                line-height: 1.7;
            }

            /* ── Responsive ── */
            @media (max-width: 900px) {
                .featured-case {
                    grid-template-columns: 1fr;
                }

                .featured-image {
                    min-height: 320px;
                }

                .results-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 768px) {
                .container {
                    padding: 0 1.2rem;
                }

                .case-hero {
                    padding: 7rem 1.5rem 3rem;
                }

                .case-grid {
                    grid-template-columns: 1fr;
                }

                .featured-case {
                    padding: 1rem;
                }

                .featured-content {
                    padding: 0.8rem;
                }

                .featured-image {
                    min-height: 240px;
                }

                .page-section {
                    padding: 3.5rem 0;
                }

                .results-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 480px) {
                .results-grid {
                    grid-template-columns: 1fr 1fr;
                    gap: 0.7rem;
                }

                .result-card {
                    padding: 1.5rem 0.7rem;
                }

                .result-number {
                    font-size: 1.8rem;
                }
            }
        </style>
    @endpush

    <!-- Hero -->
    <section class="case-hero">
        <p class="section-label">Our Case Studies</p>

        <h1>
            Turning Complex Challenges Into
            <span class="highlight">Digital Success</span>
        </h1>

        <p>
            Explore how we combine strategy, design, engineering, and
            intelligent technology to build digital products that solve
            real business problems and deliver measurable results.
        </p>
    </section>

    <!-- Featured Case Study -->
    <section class="page-section container" style="padding-top:0;">
        <div class="featured-case">

            <div class="featured-image"></div>

            <div class="featured-content">
                <span class="case-badge">
                    ★ Featured Case Study
                </span>

                <h2>
                    Transforming Business Operations With Intelligent Software
                </h2>

                <p>
                    We designed and developed a scalable digital platform
                    that streamlined workflows, automated repetitive tasks,
                    and gave the organization better visibility into its
                    day-to-day operations.
                </p>

                <div class="case-meta">
                    <span class="case-tag">Laravel</span>
                    <span class="case-tag">AI Integration</span>
                    <span class="case-tag">Dashboard</span>
                    <span class="case-tag">Automation</span>
                </div>

                <a href="#" class="case-button">
                    View Case Study
                    <span>→</span>
                </a>
            </div>

        </div>
    </section>

    <!-- Case Studies -->
    <section class="page-section container">

        <div class="section-heading">
            <p class="section-label">Selected Work</p>

            <h2>Projects That Made an Impact</h2>

            <p>
                From enterprise platforms to modern digital experiences,
                discover how our solutions helped businesses improve,
                scale, and innovate.
            </p>
        </div>

        <div class="case-grid">

            <!-- Case Study 1 -->
            <article class="case-card">
                <div class="case-card-image"></div>

                <div class="case-card-content">
                    <div class="category">Enterprise Software</div>

                    <h3>
                        Modernizing Enterprise Workflow Management
                    </h3>

                    <p>
                        A centralized platform built to simplify complex
                        business workflows, improve productivity, and
                        provide actionable operational insights.
                    </p>

                    <a href="#" class="case-card-link">
                        Explore Case Study →
                    </a>
                </div>
            </article>

            <!-- Case Study 2 -->
            <article class="case-card">
                <div class="case-card-image"></div>

                <div class="case-card-content">
                    <div class="category">Real Estate</div>

                    <h3>
                        Creating a Smarter Property Experience
                    </h3>

                    <p>
                        A modern property platform designed to showcase
                        listings, improve customer discovery, and create
                        a seamless digital experience.
                    </p>

                    <a href="#" class="case-card-link">
                        Explore Case Study →
                    </a>
                </div>
            </article>

            <!-- Case Study 3 -->
            <article class="case-card">
                <div class="case-card-image"></div>

                <div class="case-card-content">
                    <div class="category">E-Commerce</div>

                    <h3>
                        Building a Conversion-Focused Shopping Platform
                    </h3>

                    <p>
                        A high-performance e-commerce experience focused
                        on product discovery, responsive design, and a
                        frictionless purchasing journey.
                    </p>

                    <a href="#" class="case-card-link">
                        Explore Case Study →
                    </a>
                </div>
            </article>

            <!-- Case Study 4 -->
            <article class="case-card">
                <div class="case-card-image"></div>

                <div class="case-card-content">
                    <div class="category">AI & Automation</div>

                    <h3>
                        Automating Business Intelligence
                    </h3>

                    <p>
                        Intelligent automation and data-driven dashboards
                        that helped teams reduce manual work and make
                        faster, better-informed decisions.
                    </p>

                    <a href="#" class="case-card-link">
                        Explore Case Study →
                    </a>
                </div>
            </article>

        </div>
    </section>

    <!-- Results -->
    <section class="page-section container results-section">

        <div class="section-heading">
            <p class="section-label">Our Impact</p>

            <h2>Results That Matter</h2>

            <p>
                We measure success by the real improvements our digital
                solutions create for the businesses we work with.
            </p>
        </div>

        <div class="results-grid">

            <div class="result-card">
                <span class="result-number">200+</span>
                <span class="result-label">Projects Delivered</span>
            </div>

            <div class="result-card">
                <span class="result-number">14+</span>
                <span class="result-label">Countries Served</span>
            </div>

            <div class="result-card">
                <span class="result-number">98%</span>
                <span class="result-label">Client Satisfaction</span>
            </div>

            <div class="result-card">
                <span class="result-number">7+</span>
                <span class="result-label">Years of Experience</span>
            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="page-section container" style="padding-top:0;">
        <div class="case-cta">

            <p class="section-label">Have a Challenge?</p>

            <h2>Let's Build Your Success Story</h2>

            <p>
                Tell us about your business challenge, product idea, or
                digital transformation goal. Our team can help turn it
                into a scalable and impactful solution.
            </p>

            <a href="{{ url('/contact') }}" class="case-button">
                Start a Conversation
                <span>→</span>
            </a>

        </div>
    </section>

</x-guest-layout>
