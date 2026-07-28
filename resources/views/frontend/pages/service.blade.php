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
        <p class="section-label">What We Offer</p>
        <h1>End‑to‑End Digital Services</h1>
        <p>From concept to deployment, we deliver intelligent solutions that transform businesses and delight users.</p>
    </section>

    <!-- Services Grid (expanded) -->
    <div class="services-grid">
        <div class="service-card">
            <div class="card-icon"><svg viewBox="0 0 24 24">
                    <rect x="3" y="3" width="18" height="13" rx="2" />
                    <line x1="7" y1="19" x2="17" y2="19" />
                    <line x1="12" y1="16" x2="12" y2="19" />
                    <polyline points="7,9 10,6 13,9 17,5" />
                </svg></div>
            <h3>Custom Web & Mobile Apps</h3>
            <p>Scalable, high‑performance applications built with React, Next.js, Swift, and Kotlin. We craft seamless
                cross‑platform experiences that your users will love.</p>
            <div class="card-glow-line"></div>
        </div>
        <div class="service-card">
            <div class="card-icon"><svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9" />
                    <circle cx="12" cy="12" r="4" />
                    <line x1="12" y1="3" x2="12" y2="8" />
                    <line x1="12" y1="16" x2="12" y2="21" />
                    <line x1="3" y1="12" x2="8" y2="12" />
                    <line x1="16" y1="12" x2="21" y2="12" />
                    <line x1="5.6" y1="5.6" x2="9.2" y2="9.2" />
                    <line x1="14.8" y1="14.8" x2="18.4" y2="18.4" />
                </svg></div>
            <h3>AI & Machine Learning</h3>
            <p>Custom LLM pipelines, computer vision, and predictive models that turn raw data into actionable insights
                — deployed at scale with MLOps best practices.</p>
            <div class="card-glow-line"></div>
        </div>
        <div class="service-card">
            <div class="card-icon"><svg viewBox="0 0 24 24">
                    <path d="M6 18C6 15.8 9 14 12 14S18 15.8 18 18" />
                    <ellipse cx="12" cy="6" rx="5" ry="3" />
                    <line x1="7" y1="6" x2="7" y2="18" />
                    <line x1="17" y1="6" x2="17" y2="18" />
                    <rect x="4" y="18" width="16" height="3" rx="1" />
                </svg></div>
            <h3>Cloud Infrastructure</h3>
            <p>Multi‑cloud architectures on AWS, GCP, and Azure. We design resilient, auto‑scaling systems with
                Kubernetes, Terraform, and zero‑downtime pipelines.</p>
            <div class="card-glow-line"></div>
        </div>
        <div class="service-card">
            <div class="card-icon"><svg viewBox="0 0 24 24">
                    <rect x="2" y="3" width="20" height="15" rx="2" />
                    <circle cx="8" cy="10.5" r="1.5" />
                    <circle cx="16" cy="10.5" r="1.5" />
                    <path d="M8 13.5C9.5 15 14.5 15 16 13.5" />
                    <line x1="12" y1="18" x2="12" y2="21" />
                    <line x1="9" y1="21" x2="15" y2="21" />
                </svg></div>
            <h3>UI/UX Design</h3>
            <p>Research‑driven design systems that balance beauty with usability. From wireframes to interactive
                prototypes, we create experiences that convert.</p>
            <div class="card-glow-line"></div>
        </div>
        <div class="service-card">
            <div class="card-icon"><svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12,6 12,12 16,14" />
                </svg></div>
            <h3>DevOps & CI/CD</h3>
            <p>Automated deployment pipelines, monitoring, and site reliability engineering that keep your products
                running 24/7 with zero touch.</p>
            <div class="card-glow-line"></div>
        </div>
        <div class="service-card">
            <div class="card-icon"><svg viewBox="0 0 24 24">
                    <ellipse cx="12" cy="5" rx="9" ry="3" />
                    <path d="M3 5v6c0 1.7 4 3 9 3s9-1.3 9-3V5" />
                    <path d="M3 11v6c0 1.7 4 3 9 3s9-1.3 9-3v-6" />
                </svg></div>
            <h3>Data & Analytics</h3>
            <p>Big data pipelines, real‑time dashboards, and data warehousing solutions that empower your team to make
                smarter decisions faster.</p>
            <div class="card-glow-line"></div>
        </div>
        <div class="service-card">
            <div class="card-icon"><svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12,6 12,12 16,14" />
                </svg></div>
            <h3>DevOps & CI/CD</h3>
            <p>Automated deployment pipelines, monitoring, and site reliability engineering that keep your products
                running 24/7 with zero touch.</p>
            <div class="card-glow-line"></div>
        </div>
        <div class="service-card">
            <div class="card-icon"><svg viewBox="0 0 24 24">
                    <ellipse cx="12" cy="5" rx="9" ry="3" />
                    <path d="M3 5v6c0 1.7 4 3 9 3s9-1.3 9-3V5" />
                    <path d="M3 11v6c0 1.7 4 3 9 3s9-1.3 9-3v-6" />
                </svg></div>
            <h3>Data & Analytics</h3>
            <p>Big data pipelines, real‑time dashboards, and data warehousing solutions that empower your team to make
                smarter decisions faster.</p>
            <div class="card-glow-line"></div>
        </div>
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
        <a href="contact.html" class="btn-primary">Get in Touch</a>
    </div>
</x-guest-layout>
