<x-guest-layout>
    @push('styles')
        <style>
            /* ── Page Hero ── */
            .page-hero {
                padding: 10rem 2rem 4rem;
                text-align: center;
            }

            .section-label {
                font-size: 0.8rem;
                font-weight: 600;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                color: var(--cyan);
                margin-bottom: 0.8rem;
            }

            .page-hero h1 {
                font-size: clamp(2.5rem, 5vw, 4rem);
                font-weight: 800;
                letter-spacing: -0.03em;
                margin-bottom: 1rem;
            }

            .page-hero p {
                color: var(--white-muted);
                max-width: 600px;
                margin: 0 auto;
                font-size: 1.1rem;
            }

            /* ── Services Grid ── */
            .services-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.8rem;
                max-width: 1300px;
                margin: 0 auto 4rem;
                padding: 0 2rem;
            }

            .service-card {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 2.2rem 1.8rem;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                transition: var(--transition);
                position: relative;
                overflow: hidden;
                cursor: default;
                box-shadow: 0 8px 40px var(--glass-shadow);
            }

            .service-card:hover {
                border-color: var(--glass-border-hover);
                transform: translateY(-6px);
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 40px rgba(0, 229, 255, 0.08);
            }

            .card-icon {
                width: 50px;
                height: 50px;
                border-radius: var(--radius-sm);
                background: var(--cyan-subtle);
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1.4rem;
                border: 1px solid rgba(0, 229, 255, 0.2);
                transition: var(--transition);
            }

            .service-card:hover .card-icon {
                box-shadow: 0 0 30px var(--cyan-glow);
                border-color: var(--cyan);
            }

            .card-icon svg {
                width: 24px;
                height: 24px;
                stroke: var(--cyan);
                fill: none;
                stroke-width: 1.8;
            }

            .service-card h3 {
                font-size: 1.25rem;
                font-weight: 700;
                letter-spacing: -0.01em;
                margin-bottom: 0.6rem;
                color: var(--white);
            }

            .service-card p {
                font-size: 0.9rem;
                color: var(--white-muted);
                line-height: 1.55;
            }

            .card-glow-line {
                position: absolute;
                bottom: 0;
                left: 1.8rem;
                right: 1.8rem;
                height: 1px;
                background: linear-gradient(90deg, transparent, rgba(0, 229, 255, 0.5), transparent);
                transform: scaleX(0);
                transform-origin: center;
                transition: var(--transition);
            }

            .service-card:hover .card-glow-line {
                transform: scaleX(1);
            }

            /* ── Process Section ── */
            .process-section {
                max-width: 1000px;
                margin: 0 auto 4rem;
                padding: 0 2rem;
            }

            .process-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1.5rem;
                margin-top: 2rem;
            }

            .process-card {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 1.8rem 1.5rem;
                backdrop-filter: blur(16px);
                text-align: center;
                transition: var(--transition);
            }

            .process-card:hover {
                border-color: var(--cyan);
            }

            .process-number {
                font-size: 2rem;
                font-weight: 800;
                color: var(--cyan);
                margin-bottom: 0.5rem;
            }

            .process-card h4 {
                font-weight: 700;
                margin-bottom: 0.5rem;
            }

            .process-card p {
                font-size: 0.9rem;
                color: var(--white-muted);
            }

            /* ── CTA Banner ── */
            .cta-banner {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 3rem 2rem;
                margin: 0 2rem 4rem;
                max-width: 900px;
                margin-inline: auto;
                backdrop-filter: blur(20px);
                text-align: center;
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.4);
            }

            .cta-banner h2 {
                font-size: 1.8rem;
                margin-bottom: 1rem;
            }

            .cta-banner p {
                color: var(--white-muted);
                margin-bottom: 1.5rem;
            }

            .btn-primary {
                display: inline-block;
                padding: 0.85rem 2.2rem;
                background: var(--cyan);
                color: var(--bg-deep);
                border-radius: 50px;
                font-weight: 700;
                font-size: 0.95rem;
                text-decoration: none;
                transition: var(--transition);
                box-shadow: 0 0 40px rgba(0, 229, 255, 0.3);
            }

            .btn-primary:hover {
                box-shadow: 0 0 70px rgba(0, 229, 255, 0.55);
                transform: translateY(-2px);
            }

            /* ── Responsive ── */
            @media (max-width: 768px) {
                .services-grid {
                    grid-template-columns: 1fr;
                    padding: 0 1.5rem;
                }

                .process-grid {
                    grid-template-columns: 1fr;
                }

                .cta-banner {
                    margin: 0 1.5rem 3rem;
                }
            }
        </style>
    @endpush

    <!-- Hero -->
    <section class="page-hero">
        <p class="section-label">Our Services</p>
        <h1>Custom Software & Website Development Services</h1>
        <p>
            From modern websites to enterprise software, AI-powered solutions, ERP, CRM, and mobile applications, we
            build scalable digital products tailored to your business goals.
        </p>
    </section>

    <!-- Services Grid -->
    <div class="services-grid">
        <x-common.service-card />
    </div>

    <!-- Our Approach -->
    <div class="process-section">
        <p class="section-label" style="text-align:center;">How We Deliver</p>
        <h2 style="text-align:center; font-size:2rem; margin-bottom:1rem;">A Proven Process</h2>
        <div class="process-grid">
            <div class="process-card">
                <div class="process-number">01</div>
                <h4>Discovery</h4>
                <p>We learn your goals, users, and market to define a clear roadmap.</p>
            </div>
            <div class="process-card">
                <div class="process-number">02</div>
                <h4>Design & Prototype</h4>
                <p>Interactive prototypes tested with real users to validate concepts.</p>
            </div>
            <div class="process-card">
                <div class="process-number">03</div>
                <h4>Agile Build</h4>
                <p>Two‑week sprints with continuous integration and transparent dashboards.</p>
            </div>
            <div class="process-card">
                <div class="process-number">04</div>
                <h4>Launch & Grow</h4>
                <p>We handle deployment, monitoring, and post‑launch optimization.</p>
            </div>
        </div>
    </div>

    <!-- CTA Banner -->
    <div class="cta-banner">
        <h2>Ready to Start Your Project?</h2>
        <p>Let's discuss how Areia Soft can bring your vision to life. We'll reply within one business day.</p>
        <a href="{{ route('contact.index') }}" class="btn-primary">Get in Touch</a>
    </div>
</x-guest-layout>
