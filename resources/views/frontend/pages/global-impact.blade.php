<x-guest-layout>
    @push('styles')
        <style>
            /* Hero */
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

            /* Stats grid */
            .stats-grid {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 3rem;
                max-width: 1000px;
                margin: 0 auto 4rem;
                padding: 0 2rem;
            }

            .stat-item {
                text-align: center;
            }

            .stat-number {
                font-size: 2.8rem;
                font-weight: 800;
                color: var(--cyan);
                display: block;
                line-height: 1;
            }

            .stat-label {
                font-size: 0.9rem;
                color: var(--white-muted);
                margin-top: 0.4rem;
                letter-spacing: 0.02em;
            }

            /* World map section */
            .map-section {
                max-width: 1200px;
                margin: 0 auto 4rem;
                padding: 0 2rem;
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                backdrop-filter: blur(20px);
                padding: 3rem 2rem;
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.5);
            }

            .world-map {
                width: 100%;
                height: auto;
                max-height: 350px;
                margin: 0 auto;
                display: block;
            }

            .map-dots {
                fill: var(--cyan);
                opacity: 0.9;
                animation: pulseDot 2s ease-in-out infinite;
            }

            @keyframes pulseDot {

                0%,
                100% {
                    opacity: 0.6;
                    r: 3px;
                }

                50% {
                    opacity: 1;
                    r: 5px;
                }
            }

            .map-arc {
                stroke: var(--cyan);
                stroke-width: 0.8;
                fill: none;
                opacity: 0.2;
                stroke-dasharray: 4 4;
                animation: dashFlow 10s linear infinite;
            }

            @keyframes dashFlow {
                to {
                    stroke-dashoffset: -100;
                }
            }

            .map-caption {
                text-align: center;
                color: var(--white-muted);
                margin-top: 1.5rem;
                font-size: 0.9rem;
            }

            /* Client logos (same as before) */
            .client-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 1.5rem;
                max-width: 1000px;
                margin: 2rem auto 4rem;
                padding: 0 2rem;
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

            /* CTA */
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

            @media (max-width: 768px) {
                .page-hero {
                    padding: 7rem 1.5rem 2rem;
                }

                .stats-grid {
                    gap: 2rem;
                }

                .client-grid {
                    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
                }
            }
        </style>
    @endpush

    <!-- Hero -->
    <section class="page-hero">
        <p class="section-label">Worldwide Presence</p>
        <h1>Engineering Without Borders</h1>
        <p>Our solutions power critical systems across 18 countries, touching over 50 million end users every day.</p>
    </section>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-item"><span class="stat-number">200+</span><span class="stat-label">Enterprise Clients</span>
        </div>
        <div class="stat-item"><span class="stat-number">18</span><span class="stat-label">Countries Served</span></div>
        <div class="stat-item"><span class="stat-number">50M+</span><span class="stat-label">End Users Impacted</span>
        </div>
        <div class="stat-item"><span class="stat-number">99.99%</span><span class="stat-label">Uptime Global</span>
        </div>
    </div>

    <!-- World Map Visualization -->
    <div class="map-section">
        <svg class="world-map" viewBox="0 0 1000 500" preserveAspectRatio="xMidYMid meet">
            <!-- Simplified world map outline -->
            <path
                d="M150,200 Q200,150 250,180 Q280,160 320,170 Q360,150 400,160 Q450,140 480,170 Q520,150 550,180 Q600,160 650,190 Q680,180 700,210 Q730,200 750,230 Q780,220 800,250 L820,280 Q850,300 830,330 Q800,360 750,340 Q700,380 650,350 Q600,390 550,360 Q500,400 450,370 Q400,410 350,380 Q300,420 250,390 Q200,430 180,400 Q150,380 170,340 Q140,310 160,280 Q130,250 150,200Z"
                fill="none" stroke="rgba(255,255,255,0.12)" stroke-width="1.5" />
            <!-- Glowing dots on key cities -->
            <circle cx="200" cy="200" r="3" class="map-dots" style="animation-delay: 0s;">
                <title>San Francisco</title>
            </circle>
            <circle cx="300" cy="180" r="3" class="map-dots" style="animation-delay: 0.2s;">
                <title>New York</title>
            </circle>
            <circle cx="450" cy="190" r="3" class="map-dots" style="animation-delay: 0.4s;">
                <title>London</title>
            </circle>
            <circle cx="550" cy="180" r="3" class="map-dots" style="animation-delay: 0.6s;">
                <title>Berlin</title>
            </circle>
            <circle cx="750" cy="230" r="3" class="map-dots" style="animation-delay: 0.8s;">
                <title>Dubai</title>
            </circle>
            <circle cx="780" cy="350" r="3" class="map-dots" style="animation-delay: 1s;">
                <title>Bangalore</title>
            </circle>
            <circle cx="820" cy="300" r="3" class="map-dots" style="animation-delay: 1.2s;">
                <title>Singapore</title>
            </circle>
            <circle cx="850" cy="200" r="3" class="map-dots" style="animation-delay: 1.4s;">
                <title>Tokyo</title>
            </circle>
            <circle cx="400" cy="350" r="3" class="map-dots" style="animation-delay: 1.6s;">
                <title>São Paulo</title>
            </circle>
            <circle cx="650" cy="380" r="3" class="map-dots" style="animation-delay: 0.3s;">
                <title>Sydney</title>
            </circle>
            <!-- Connection arcs (sample) -->
            <path d="M200,200 Q350,130 450,190" class="map-arc" />
            <path d="M450,190 Q600,160 550,180" class="map-arc" style="animation-delay: -3s;" />
            <path d="M550,180 Q700,180 750,230" class="map-arc" style="animation-delay: -6s;" />
            <path d="M750,230 Q820,280 780,350" class="map-arc" style="animation-delay: -1s;" />
            <path d="M450,190 Q520,280 400,350" class="map-arc" style="animation-delay: -8s;" />
        </svg>
        <p class="map-caption">Our teams collaborate across time zones to deliver 24/7 impact.</p>
    </div>

    <!-- Client logos -->
    <h2 style="text-align:center; font-size:2rem; margin-bottom:2rem;">Trusted Worldwide</h2>
    <div class="client-grid">
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <rect x="15" y="8" width="28" height="24" rx="4" fill="currentColor" opacity="0.7" />
                <text x="50" y="28" font-size="16" font-weight="600" fill="currentColor">Vortex</text>
            </svg></div>
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <circle cx="30" cy="20" r="12" fill="currentColor" opacity="0.7" /><text x="50" y="26"
                    font-size="15" font-weight="700" fill="currentColor">Synth</text>
            </svg></div>
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <polygon points="20,8 40,20 20,32" fill="currentColor" opacity="0.7" /><text x="50" y="26"
                    font-size="15" font-weight="600" fill="currentColor">Nova</text>
            </svg></div>
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <rect x="15" y="10" width="22" height="20" rx="10" fill="none"
                    stroke="currentColor" stroke-width="3" /><text x="45" y="27" font-size="16" font-weight="600"
                    fill="currentColor">Aether</text>
            </svg></div>
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <path d="M20 20 L30 10 L40 20 L30 30 Z" fill="currentColor" opacity="0.7" /><text x="50" y="26"
                    font-size="15" font-weight="700" fill="currentColor">Prism</text>
            </svg></div>
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <circle cx="24" cy="20" r="8" fill="currentColor" opacity="0.5" />
                <circle cx="34" cy="20" r="5" fill="currentColor" /><text x="48" y="27" font-size="16"
                    font-weight="600" fill="currentColor">Orbit</text>
            </svg></div>
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <rect x="15" y="12" width="14" height="16" rx="2" fill="currentColor"
                    opacity="0.7" />
                <rect x="31" y="8" width="8" height="24" rx="2" fill="currentColor" /><text x="50"
                    y="26" font-size="15" font-weight="700" fill="currentColor">Flux</text>
            </svg></div>
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <path d="M20 10 L30 20 L20 30 M30 10 L20 20 L30 30" stroke="currentColor" stroke-width="3"
                    fill="none" /><text x="45" y="27" font-size="16" font-weight="600"
                    fill="currentColor">Zenith</text>
            </svg></div>
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <rect x="15" y="12" width="14" height="16" rx="2" fill="currentColor"
                    opacity="0.7" />
                <rect x="31" y="8" width="8" height="24" rx="2" fill="currentColor" /><text x="50"
                    y="26" font-size="15" font-weight="700" fill="currentColor">Flux</text>
            </svg></div>
        <div class="client-logo-item"><svg viewBox="0 0 120 40">
                <path d="M20 10 L30 20 L20 30 M30 10 L20 20 L30 30" stroke="currentColor" stroke-width="3"
                    fill="none" /><text x="45" y="27" font-size="16" font-weight="600"
                    fill="currentColor">Zenith</text>
            </svg></div>
    </div>

    <!-- CTA -->
    <div class="cta-banner">
        <h2>Let's Create Global Impact Together</h2>
        <p>Whether you're a startup or a Fortune 500, our team is ready to scale your vision across continents.</p>
        <a href="contact.html" class="btn-primary">Start a Conversation</a>
    </div>

</x-guest-layout>
