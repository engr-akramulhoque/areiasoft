<x-guest-layout>
    @push('styles')
        <style>
            /* ── HERO (unchanged) ── */
            .hero {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 8rem 2rem 6rem;
                position: relative;
                text-align: center;
            }

            .hero-content {
                max-width: 850px;
                z-index: 2;
            }

            .hero-badge {
                display: inline-block;
                padding: 0.45rem 1.2rem;
                border: 1px solid var(--cyan);
                border-radius: 50px;
                font-size: 0.8rem;
                font-weight: 600;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: var(--cyan);
                margin-bottom: 2rem;
                backdrop-filter: blur(10px);
                background: rgba(0, 229, 255, 0.04);
            }

            .hero h1 {
                font-size: clamp(2.6rem, 6vw, 5rem);
                font-weight: 800;
                letter-spacing: -0.03em;
                line-height: 1.08;
                margin-bottom: 1.5rem;
                color: var(--white);
            }

            .hero h1 .highlight {
                background: linear-gradient(135deg, #00e5ff, #6ee7ff, #00b8d4);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                filter: drop-shadow(0 0 30px rgba(0, 229, 255, 0.4));
            }

            .hero-subtitle {
                font-size: 1.2rem;
                font-weight: 400;
                color: var(--white-muted);
                max-width: 550px;
                margin: 0 auto 2.5rem;
                letter-spacing: 0.01em;
            }

            .hero-buttons {
                display: flex;
                gap: 1.2rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .btn-primary {
                padding: 0.85rem 2.2rem;
                background: var(--cyan);
                color: var(--bg-deep);
                border: none;
                border-radius: 50px;
                font-weight: 700;
                font-size: 0.95rem;
                cursor: pointer;
                letter-spacing: 0.02em;
                transition: var(--transition);
                text-decoration: none;
                display: inline-block;
                box-shadow: 0 0 40px rgba(0, 229, 255, 0.3);
            }

            .btn-primary:hover {
                box-shadow: 0 0 70px rgba(0, 229, 255, 0.55);
                transform: translateY(-2px);
            }

            .btn-secondary {
                padding: 0.85rem 2.2rem;
                background: transparent;
                color: var(--white);
                border: 1px solid rgba(255, 255, 255, 0.25);
                border-radius: 50px;
                font-weight: 600;
                font-size: 0.95rem;
                cursor: pointer;
                letter-spacing: 0.02em;
                transition: var(--transition);
                text-decoration: none;
                display: inline-block;
            }

            .btn-secondary:hover {
                border-color: var(--white);
                background: rgba(255, 255, 255, 0.04);
            }

            /* ── SERVICES (unchanged) ── */
            .services {
                padding: 5rem 2rem;
                max-width: 1300px;
                margin: 0 auto;
            }

            .section-label {
                text-align: center;
                font-size: 0.8rem;
                font-weight: 600;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                color: var(--cyan);
                margin-bottom: 0.8rem;
            }

            .section-title {
                text-align: center;
                font-size: clamp(2rem, 4vw, 2.8rem);
                font-weight: 700;
                letter-spacing: -0.02em;
                margin-bottom: 3.5rem;
                color: var(--white);
            }

            .card-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
                gap: 1.5rem;
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

            .service-card::before {
                content: "";
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle at center,
                        rgba(0, 229, 255, 0.04) 0%,
                        transparent 70%);
                opacity: 0;
                transition: var(--transition);
                pointer-events: none;
            }

            .service-card:hover {
                border-color: var(--glass-border-hover);
                transform: translateY(-6px);
                box-shadow:
                    0 20px 60px rgba(0, 0, 0, 0.5),
                    0 0 40px rgba(0, 229, 255, 0.08);
            }

            .service-card:hover::before {
                opacity: 1;
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
                font-size: 1.5rem;
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
                font-size: 1.2rem;
                font-weight: 700;
                letter-spacing: -0.01em;
                margin-bottom: 0.6rem;
                color: var(--white);
            }

            .service-card p {
                font-size: 0.9rem;
                color: var(--white-muted);
                line-height: 1.55;
                font-weight: 400;
            }

            .card-glow-line {
                position: absolute;
                bottom: 0;
                left: 1.8rem;
                right: 1.8rem;
                height: 1px;
                background: linear-gradient(90deg,
                        transparent,
                        rgba(0, 229, 255, 0.5),
                        transparent);
                transform: scaleX(0);
                transform-origin: center;
                transition: var(--transition);
            }

            .service-card:hover .card-glow-line {
                transform: scaleX(1);
            }

            /* ── GLOBE (unchanged) ── */
            .globe-section {
                padding: 4rem 2rem 6rem;
                position: relative;
                text-align: center;
            }

            .globe-container {
                position: relative;
                width: 100%;
                max-width: 700px;
                height: 520px;
                margin: 0 auto;
                cursor: grab;
            }

            .globe-container:active {
                cursor: grabbing;
            }

            #globe-canvas {
                width: 100%;
                height: 100%;
                display: block;
            }

            .globe-stats {
                display: flex;
                justify-content: center;
                gap: 3rem;
                flex-wrap: wrap;
                margin-top: 2rem;
            }

            .globe-stat {
                text-align: center;
            }

            .globe-stat .stat-number {
                font-size: 2.4rem;
                font-weight: 800;
                letter-spacing: -0.02em;
                color: var(--cyan);
                display: block;
            }

            .globe-stat .stat-label {
                font-size: 0.85rem;
                color: var(--white-muted);
                font-weight: 500;
                letter-spacing: 0.03em;
            }

            /* ── NEW SECTIONS: WORK, CLIENTS, METHODOLOGY ── */
            /* Common spacing & labels */
            .work-section,
            .clients-section,
            .methodology-section {
                padding: 5rem 2rem;
                max-width: 1300px;
                margin: 0 auto;
            }

            /* Work Cards */
            .work-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
                margin-top: 1rem;
            }

            .work-card {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                overflow: hidden;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                transition: var(--transition);
                cursor: pointer;
                box-shadow: 0 8px 40px var(--glass-shadow);
                display: flex;
                flex-direction: column;
            }

            .work-card:hover {
                border-color: var(--glass-border-hover);
                transform: translateY(-8px);
                box-shadow:
                    0 20px 60px rgba(0, 0, 0, 0.6),
                    0 0 35px rgba(0, 229, 255, 0.1);
            }

            .work-image {
                height: 200px;
                background: linear-gradient(135deg, #0f1722 0%, #1a2332 100%);
                position: relative;
                overflow: hidden;
            }

            .work-image::after {
                content: "";
                position: absolute;
                inset: 0;
                background: radial-gradient(circle at 30% 40%,
                        rgba(0, 229, 255, 0.08) 0%,
                        transparent 60%);
                opacity: 0;
                transition: opacity 0.5s;
            }

            .work-card:hover .work-image::after {
                opacity: 1;
            }

            .work-image .placeholder-pattern {
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                font-weight: 300;
                color: rgba(255, 255, 255, 0.2);
                letter-spacing: 0.1em;
            }

            .work-details {
                padding: 1.5rem 1.8rem 2rem;
            }

            .work-tags {
                display: flex;
                gap: 0.5rem;
                flex-wrap: wrap;
                margin-bottom: 0.8rem;
            }

            .work-tag {
                font-size: 0.65rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                padding: 0.25rem 0.75rem;
                border-radius: 20px;
                background: rgba(0, 229, 255, 0.08);
                color: var(--cyan);
                border: 1px solid rgba(0, 229, 255, 0.2);
            }

            .work-card h3 {
                font-size: 1.3rem;
                font-weight: 700;
                letter-spacing: -0.01em;
                margin-bottom: 0.5rem;
                color: var(--white);
            }

            .work-card p {
                font-size: 0.9rem;
                color: var(--white-muted);
                line-height: 1.5;
                margin-bottom: 1rem;
            }

            .work-link {
                display: inline-flex;
                align-items: center;
                gap: 0.3rem;
                font-weight: 600;
                font-size: 0.85rem;
                color: var(--cyan);
                text-decoration: none;
                transition: gap 0.2s;
            }

            .work-link svg {
                width: 16px;
                height: 16px;
                stroke: var(--cyan);
            }

            .work-link:hover {
                gap: 0.6rem;
            }

            /* Client logos grid */
            .client-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 1.5rem;
                margin-top: 2rem;
            }

            .client-logo-item {
                background: var(--card-bg);
                backdrop-filter: blur(16px);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-md);
                padding: 1.5rem 1rem;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: var(--transition);
                aspect-ratio: 3/2;
                filter: grayscale(100%) brightness(0.8);
                position: relative;
            }

            .client-logo-item:hover {
                filter: grayscale(0%) brightness(1);
                border-color: var(--cyan);
                box-shadow: 0 0 30px rgba(0, 229, 255, 0.2);
                transform: translateY(-4px);
            }

            .client-logo-item svg {
                width: 60%;
                height: auto;
                max-height: 40px;
                fill: rgba(255, 255, 255, 0.7);
                transition: fill 0.3s;
            }

            .client-logo-item:hover svg {
                fill: var(--white);
            }

            /* Methodology stepper */
            .methodology-steps {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
                margin-top: 2.5rem;
                position: relative;
                padding-left: 1rem;
            }

            .methodology-steps::before {
                content: "";
                position: absolute;
                left: 2.35rem;
                top: 0.8rem;
                bottom: 0.8rem;
                width: 2px;
                background: linear-gradient(to bottom,
                        var(--cyan),
                        rgba(0, 229, 255, 0.2),
                        var(--cyan));
                opacity: 0.3;
            }

            .step-card {
                display: flex;
                gap: 1.8rem;
                align-items: flex-start;
                background: var(--card-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 1.8rem 2rem;
                transition: var(--transition);
                position: relative;
                z-index: 1;
            }

            .step-card:hover {
                border-color: var(--cyan);
                box-shadow: 0 0 35px rgba(0, 229, 255, 0.08);
            }

            .step-number {
                width: 3rem;
                height: 3rem;
                background: rgba(0, 229, 255, 0.08);
                border: 1px solid rgba(0, 229, 255, 0.3);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
                font-weight: 700;
                color: var(--cyan);
                flex-shrink: 0;
                transition: 0.2s;
            }

            .step-card:hover .step-number {
                background: var(--cyan);
                color: var(--bg-deep);
                box-shadow: 0 0 30px var(--cyan-glow);
            }

            .step-content h4 {
                font-size: 1.2rem;
                font-weight: 700;
                margin-bottom: 0.4rem;
                color: var(--white);
            }

            .step-content p {
                font-size: 0.9rem;
                color: var(--white-muted);
                line-height: 1.5;
            }

            /* ── SCROLL INDICATOR (unchanged) ── */
            .scroll-indicator {
                position: absolute;
                bottom: 2.5rem;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
                animation: floatDown 2s ease-in-out infinite;
                z-index: 2;
            }

            .scroll-indicator span {
                font-size: 0.7rem;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: var(--white-muted);
            }

            .scroll-arrow {
                width: 20px;
                height: 20px;
                border-right: 2px solid var(--cyan);
                border-bottom: 2px solid var(--cyan);
                transform: rotate(45deg);
                opacity: 0.7;
            }

            @keyframes floatDown {

                0%,
                100% {
                    transform: translateX(-50%) translateY(0);
                }

                50% {
                    transform: translateX(-50%) translateY(12px);
                }
            }

            /* ── RESPONSIVE ADJUSTMENTS (existing + new) ── */
            @media (max-width: 768px) {
                .hero {
                    padding: 7rem 1.2rem 4rem;
                    min-height: 90vh;
                }

                .hero h1 {
                    font-size: 2.2rem;
                }

                .card-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }

                .globe-container {
                    height: 360px;
                }

                .globe-stats {
                    gap: 1.5rem;
                }

                .globe-stat .stat-number {
                    font-size: 1.8rem;
                }

                .services {
                    padding: 3rem 1.2rem;
                }

                /* new sections mobile */
                .work-grid {
                    grid-template-columns: 1fr;
                }

                .client-grid {
                    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
                    gap: 1rem;
                }

                .methodology-steps {
                    padding-left: 0.5rem;
                }

                .methodology-steps::before {
                    left: 1.8rem;
                }

                .step-card {
                    flex-direction: column;
                    gap: 1rem;
                    padding: 1.5rem;
                }

                .step-number {
                    width: 2.5rem;
                    height: 2.5rem;
                    font-size: 1rem;
                }
            }

            @media (max-width: 480px) {
                .hero h1 {
                    font-size: 1.8rem;
                }

                .hero-subtitle {
                    font-size: 1rem;
                }

                .hero-buttons {
                    flex-direction: column;
                    align-items: center;
                }

                .globe-container {
                    height: 280px;
                }

                .work-section,
                .clients-section,
                .methodology-section {
                    padding: 3rem 1rem;
                }

                .client-grid {
                    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
                }
            }
        </style>
    @endpush

    <!-- HERO (unchanged) -->
    <section class="hero" id="hero">
        <div class="hero-content">
            <div class="hero-badge">AI-Native Engineering Firm</div>
            <h1>
                Engineering the Future,<br /><span class="highlight">One Interface</span>
                at a Time
            </h1>
            <p class="hero-subtitle">
                We craft intelligent digital experiences at the intersection of
                design, engineering, and artificial intelligence.
            </p>
            <div class="hero-buttons">
                <a href="#services" class="btn-primary">Explore Our Work</a>
                <a href="#" class="btn-secondary">Start a Project</a>
            </div>
        </div>
        <div class="scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-arrow"></div>
        </div>
    </section>

    <!-- SERVICES (unchanged) -->
    <section class="services" id="services">
        <p class="section-label">What We Do</p>
        <h2 class="section-title">End-to-End Digital Excellence</h2>
        <div class="card-grid">
            <div class="service-card">
                <div class="card-icon">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="13" rx="2" />
                        <line x1="7" y1="19" x2="17" y2="19" />
                        <line x1="12" y1="16" x2="12" y2="19" />
                        <polyline points="7,9 10,6 13,9 17,5" />
                    </svg>
                </div>
                <h3>Custom Web & Mobile Apps</h3>
                <p>
                    Scalable, high-performance applications built with cutting-edge
                    frameworks — from React Native mobile experiences to full-stack
                    web platforms.
                </p>
                <div class="card-glow-line"></div>
            </div>
            <div class="service-card">
                <div class="card-icon">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" />
                        <circle cx="12" cy="12" r="4" />
                        <line x1="12" y1="3" x2="12" y2="8" />
                        <line x1="12" y1="16" x2="12" y2="21" />
                        <line x1="3" y1="12" x2="8" y2="12" />
                        <line x1="16" y1="12" x2="21" y2="12" />
                        <line x1="5.6" y1="5.6" x2="9.2" y2="9.2" />
                        <line x1="14.8" y1="14.8" x2="18.4" y2="18.4" />
                    </svg>
                </div>
                <h3>AI & Machine Learning</h3>
                <p>
                    Custom LLM pipelines, predictive models, and intelligent
                    automation systems that transform raw data into actionable insight
                    — deployed at scale.
                </p>
                <div class="card-glow-line"></div>
            </div>
            <div class="service-card">
                <div class="card-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M6 18C6 15.8 9 14 12 14S18 15.8 18 18" />
                        <ellipse cx="12" cy="6" rx="5" ry="3" />
                        <line x1="7" y1="6" x2="7" y2="18" />
                        <line x1="17" y1="6" x2="17" y2="18" />
                        <rect x="4" y="18" width="16" height="3" rx="1" />
                    </svg>
                </div>
                <h3>Cloud Infrastructure</h3>
                <p>
                    Resilient, auto-scaling cloud architectures on AWS, GCP, and Azure
                    with Kubernetes orchestration and zero-downtime deployment
                    pipelines.
                </p>
                <div class="card-glow-line"></div>
            </div>
            <div class="service-card">
                <div class="card-icon">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="15" rx="2" />
                        <circle cx="8" cy="10.5" r="1.5" />
                        <circle cx="16" cy="10.5" r="1.5" />
                        <path d="M8 13.5C9.5 15 14.5 15 16 13.5" />
                        <line x1="12" y1="18" x2="12" y2="21" />
                        <line x1="9" y1="21" x2="15" y2="21" />
                    </svg>
                </div>
                <h3>UI/UX Design</h3>
                <p>
                    Research-driven interface design that balances aesthetic precision
                    with measurable usability — creating products people love to use
                    every day.
                </p>
                <div class="card-glow-line"></div>
            </div>
        </div>
    </section>

    <!-- GLOBE (unchanged) -->
    <section class="globe-section" id="globe">
        <p class="section-label">Global Reach</p>
        <h2 class="section-title">Impact Across Continents</h2>
        <div class="globe-container" id="globeContainer">
            <canvas id="globe-canvas"></canvas>
        </div>
        <div class="globe-stats">
            <div class="globe-stat">
                <span class="stat-number" id="statClients">200+</span><span class="stat-label">Enterprise
                    Clients</span>
            </div>
            <div class="globe-stat">
                <span class="stat-number">18</span><span class="stat-label">Countries Served</span>
            </div>
            <div class="globe-stat">
                <span class="stat-number">99.9%</span><span class="stat-label">Uptime SLA</span>
            </div>
            <div class="globe-stat">
                <span class="stat-number">50M+</span><span class="stat-label">End Users Impacted</span>
            </div>
        </div>
    </section>

    <!-- ── NEW: OUR WORK SECTION ── -->
    <section class="work-section" id="work">
        <p class="section-label">Portfolio</p>
        <h2 class="section-title">Selected Projects</h2>
        <div class="work-grid">
            <div class="work-card">
                <div class="work-image">
                    <div class="placeholder-pattern">⚡ NEXUS</div>
                </div>
                <div class="work-details">
                    <div class="work-tags">
                        <span class="work-tag">AI Platform</span><span class="work-tag">Web App</span>
                    </div>
                    <h3>Nexus Analytics Suite</h3>
                    <p>
                        Real-time predictive analytics dashboard for enterprise supply
                        chains, processing 2M+ events daily.
                    </p>
                    <a href="#" class="work-link">View Case Study
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg></a>
                </div>
            </div>
            <div class="work-card">
                <div class="work-image">
                    <div class="placeholder-pattern">📱 PULSE</div>
                </div>
                <div class="work-details">
                    <div class="work-tags">
                        <span class="work-tag">Mobile</span><span class="work-tag">HealthTech</span>
                    </div>
                    <h3>Pulse Health App</h3>
                    <p>
                        AI-driven telemedicine platform connecting 500k+ patients with
                        specialists in under 60 seconds.
                    </p>
                    <a href="#" class="work-link">View Case Study
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg></a>
                </div>
            </div>
            <div class="work-card">
                <div class="work-image">
                    <div class="placeholder-pattern">☁️ STRATOS</div>
                </div>
                <div class="work-details">
                    <div class="work-tags">
                        <span class="work-tag">Cloud</span><span class="work-tag">Infrastructure</span>
                    </div>
                    <h3>Stratos Multi-Cloud</h3>
                    <p>
                        Kubernetes-native control plane managing hybrid deployments
                        across AWS, GCP, and Azure with 99.99% uptime.
                    </p>
                    <a href="#" class="work-link">View Case Study
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg></a>
                </div>
            </div>
            <div class="work-card">
                <div class="work-image">
                    <div class="placeholder-pattern">🎨 LUMINA</div>
                </div>
                <div class="work-details">
                    <div class="work-tags">
                        <span class="work-tag">Design System</span><span class="work-tag">UI/UX</span>
                    </div>
                    <h3>Lumina Design Language</h3>
                    <p>
                        A unified design system for a fintech unicorn, accelerating
                        product velocity by 40% across 12 teams.
                    </p>
                    <a href="#" class="work-link">View Case Study
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg></a>
                </div>
            </div>
            <div class="work-card">
                <div class="work-image">
                    <div class="placeholder-pattern">☁️ STRATOS</div>
                </div>
                <div class="work-details">
                    <div class="work-tags">
                        <span class="work-tag">Cloud</span><span class="work-tag">Infrastructure</span>
                    </div>
                    <h3>Stratos Multi-Cloud</h3>
                    <p>
                        Kubernetes-native control plane managing hybrid deployments
                        across AWS, GCP, and Azure with 99.99% uptime.
                    </p>
                    <a href="#" class="work-link">View Case Study
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg></a>
                </div>
            </div>
            <div class="work-card">
                <div class="work-image">
                    <div class="placeholder-pattern">🎨 LUMINA</div>
                </div>
                <div class="work-details">
                    <div class="work-tags">
                        <span class="work-tag">Design System</span><span class="work-tag">UI/UX</span>
                    </div>
                    <h3>Lumina Design Language</h3>
                    <p>
                        A unified design system for a fintech unicorn, accelerating
                        product velocity by 40% across 12 teams.
                    </p>
                    <a href="#" class="work-link">View Case Study
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ── NEW: VALUABLE CLIENTS SECTION ── -->
    <section class="clients-section" id="clients">
        <p class="section-label">Trusted By</p>
        <h2 class="section-title">Our Valuable Clients</h2>
        <div class="client-grid">
            <!-- simple SVG logos as placeholders -->
            <div class="client-logo-item">
                <svg viewBox="0 0 120 40">
                    <rect x="15" y="8" width="28" height="24" rx="4" fill="currentColor"
                        opacity="0.7" />
                    <text x="50" y="28" font-size="16" font-weight="600" fill="currentColor">
                        Vortex
                    </text>
                </svg>
            </div>
            <div class="client-logo-item">
                <svg viewBox="0 0 120 40">
                    <circle cx="30" cy="20" r="12" fill="currentColor" opacity="0.7" />
                    <text x="50" y="26" font-size="15" font-weight="700" fill="currentColor">
                        Synth
                    </text>
                </svg>
            </div>
            <div class="client-logo-item">
                <svg viewBox="0 0 120 40">
                    <polygon points="20,8 40,20 20,32" fill="currentColor" opacity="0.7" />
                    <text x="50" y="26" font-size="15" font-weight="600" fill="currentColor">
                        Nova
                    </text>
                </svg>
            </div>
            <div class="client-logo-item">
                <svg viewBox="0 0 120 40">
                    <rect x="15" y="10" width="22" height="20" rx="10" fill="none"
                        stroke="currentColor" stroke-width="3" />
                    <text x="45" y="27" font-size="16" font-weight="600" fill="currentColor">
                        Aether
                    </text>
                </svg>
            </div>
            <div class="client-logo-item">
                <svg viewBox="0 0 120 40">
                    <path d="M20 20 L30 10 L40 20 L30 30 Z" fill="currentColor" opacity="0.7" />
                    <text x="50" y="26" font-size="15" font-weight="700" fill="currentColor">
                        Prism
                    </text>
                </svg>
            </div>
            <div class="client-logo-item">
                <svg viewBox="0 0 120 40">
                    <circle cx="24" cy="20" r="8" fill="currentColor" opacity="0.5" />
                    <circle cx="34" cy="20" r="5" fill="currentColor" />
                    <text x="48" y="27" font-size="16" font-weight="600" fill="currentColor">
                        Orbit
                    </text>
                </svg>
            </div>
            <div class="client-logo-item">
                <svg viewBox="0 0 120 40">
                    <rect x="15" y="12" width="14" height="16" rx="2" fill="currentColor"
                        opacity="0.7" />
                    <rect x="31" y="8" width="8" height="24" rx="2" fill="currentColor" />
                    <text x="50" y="26" font-size="15" font-weight="700" fill="currentColor">
                        Flux
                    </text>
                </svg>
            </div>
            <div class="client-logo-item">
                <svg viewBox="0 0 120 40">
                    <path d="M20 10 L30 20 L20 30 M30 10 L20 20 L30 30" stroke="currentColor" stroke-width="3"
                        fill="none" />
                    <text x="45" y="27" font-size="16" font-weight="600" fill="currentColor">
                        Zenith
                    </text>
                </svg>
            </div>
        </div>
    </section>

    <!-- ── NEW: OUR METHODOLOGY SECTION ── -->
    <section class="methodology-section" id="methodology">
        <p class="section-label">How We Work</p>
        <h2 class="section-title">Our Methodology</h2>
        <div class="methodology-steps">
            <div class="step-card">
                <div class="step-number">01</div>
                <div class="step-content">
                    <h4>Discovery & Strategy</h4>
                    <p>
                        We immerse ourselves in your business, conducting stakeholder
                        interviews and market analysis to define a clear product vision
                        and measurable success criteria.
                    </p>
                </div>
            </div>
            <div class="step-card">
                <div class="step-number">02</div>
                <div class="step-content">
                    <h4>Architecture & Prototyping</h4>
                    <p>
                        Our engineers design scalable system blueprints while our
                        designers craft interactive prototypes, validated through rapid
                        user testing cycles.
                    </p>
                </div>
            </div>
            <div class="step-card">
                <div class="step-number">03</div>
                <div class="step-content">
                    <h4>Agile Engineering</h4>
                    <p>
                        Two-week sprints with continuous integration, AI-assisted code
                        review, and transparent progress dashboards keep stakeholders
                        aligned and velocity high.
                    </p>
                </div>
            </div>
            <div class="step-card">
                <div class="step-number">04</div>
                <div class="step-content">
                    <h4>Launch & Optimize</h4>
                    <p>
                        We handle deployment, monitoring, and post-launch optimization
                        using real-time analytics and A/B testing to ensure every
                        release outperforms the last.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
