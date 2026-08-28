<x-guest-layout>
    <!-- HERO -->
    <x-home.hero :hero="$hero" />

    <!-- SERVICES -->
    <section class="services" id="services">
        <p class="section-label">What We Build</p>
        <h2 class="section-title">Scalable Software, Websites & AI Solutions</h2>
        <div class="card-grid">
            <x-common.service-card :services="$services" />
        </div>
    </section>

    <!-- GLOBE -->
    <x-home.globee :globe="$globe" />

    <!-- OUR WORK SECTION -->
    <x-home.our-work :portfolios="$portfolios" />

    <!-- METHODOLOGY -->
    <x-home.methodology />

    <!-- CLIENTS -->
    <x-home.client :clients="$clients" />

    @push('styles')
        <style>
            /* SERVICES */
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

            /* GLOBE SECTION */
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

            /* WORK, CLIENTS, METHODOLOGY */
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

            .client-logo-item img {
                max-width: 150px;
                max-height: 60px;
                width: auto;
                height: auto;
                object-fit: contain;
                opacity: .75;
                transition: .35s ease;
                filter: grayscale(100%);
            }

            .client-logo-item:hover img {
                opacity: 1;
                filter: grayscale(0%);
                transform: scale(1.05);
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

            /* SCROLL INDICATOR */
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

            /* RESPONSIVE ADJUSTMENTS */
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
                    font-size: 0.9rem;
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
</x-guest-layout>
