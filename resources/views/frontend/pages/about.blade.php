<x-guest-layout>
    @push('styles')
        <style>
            .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
            .page-section { padding: 5rem 0; }
            
            /* ── Hero ── */
            .about-hero {
                padding: 10rem 2rem 4rem;
                text-align: center;
            }

            .about-hero h1 {
                font-size: clamp(2.5rem, 5vw, 4rem);
                font-weight: 800;
                letter-spacing: -0.03em;
            }

            /* ── Story / Mission ── */
            .story-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2.5rem;
                align-items: center;
            }

            .story-text p {
                color: var(--white-muted);
                margin-bottom: 1rem;
                font-size: 1rem;
                line-height: 1.7;
            }

            .story-image {
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                height: 320px;
                backdrop-filter: blur(12px);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1rem;
                color: var(--white-muted);
                position: relative;
                overflow: hidden;
            }

            .story-image::before {
                content: "🌐";
                font-size: 3rem;
                opacity: 0.2;
            }

            .mission-card {
                background: var(--card-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 2.2rem;
                margin-top: 2rem;
                text-align: center;
                transition: var(--transition);
            }

            .mission-card:hover {
                border-color: var(--cyan);
                box-shadow: 0 0 35px var(--cyan-glow);
            }

            .mission-card h3 {
                color: var(--cyan);
                margin-bottom: 0.8rem;
            }

            /* ── Values ── */
            .values-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 1.5rem;
                margin-top: 1rem;
            }

            .value-card {
                background: var(--card-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 2rem 1.5rem;
                text-align: center;
                transition: var(--transition);
            }

            .value-card:hover {
                border-color: var(--cyan);
                transform: translateY(-4px);
            }

            .value-icon {
                font-size: 2rem;
                margin-bottom: 1rem;
                color: var(--cyan);
            }

            .value-card h4 {
                font-weight: 700;
                margin-bottom: 0.5rem;
            }

            .value-card p {
                color: var(--white-muted);
                font-size: 0.9rem;
            }

            /* ── Leadership ── */
            .team-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 1.8rem;
            }

            .team-member {
                background: var(--card-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 2rem 1.2rem;
                text-align: center;
                transition: var(--transition);
            }

            .team-member:hover {
                border-color: var(--cyan);
            }

            .avatar {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--cyan-subtle), var(--navy-light));
                margin: 0 auto 1rem;
                border: 2px solid var(--cyan);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                color: var(--cyan);
                font-weight: 700;
            }

            .team-member h4 {
                font-weight: 700;
            }

            .team-member .role {
                color: var(--cyan);
                font-size: 0.8rem;
                text-transform: uppercase;
                margin: 0.3rem 0;
            }

            .team-member p {
                color: var(--white-muted);
                font-size: 0.85rem;
            }

            /* ── Stats ── */
            .stats-row {
                display: flex;
                justify-content: center;
                gap: 4rem;
                flex-wrap: wrap;
                margin-top: 2rem;
            }

            .stat-item {
                text-align: center;
            }

            .stat-number {
                font-size: 2.4rem;
                font-weight: 800;
                color: var(--cyan);
            }

            .stat-label {
                color: var(--white-muted);
                font-size: 0.9rem;
            }

            /* ── Responsive ── */
            @media (max-width: 768px) {
                .container{
                    padding: 20px;
                }

                .about-hero {
                    padding: 7rem 1.5rem 2rem;
                }

                .story-grid {
                    grid-template-columns: 1fr;
                }

                .stats-row {
                    gap: 2rem;
                }
            }
        </style>
    @endpush
    <!-- Hero -->
    <section class="about-hero">
        <p class="section-label">Who We Are</p>
        <h1>Engineering the Future,<br>Driven by Curiosity.</h1>
        <p class="section-subtitle" style="margin-top:1.5rem;">We are a team of engineers, designers, and AI researchers
            dedicated to building intelligent digital experiences that shape industries.</p>
    </section>

    <!-- Our Story -->
    <section class="page-section container">
        <div class="story-grid">
            <div class="story-text">
                <h2 class="section-title" style="text-align:left;">Our Story</h2>
                <p>Founded in 2018, Areia Soft began as a small collective of engineers passionate about bridging the
                    gap between cutting‑edge AI and human‑centered design. What started in a garage in San Francisco has
                    grown into a global team of 120+ specialists, delivering enterprise‑grade solutions to Fortune 500
                    companies and agile startups alike.</p>
                <p>We believe that technology should be invisible — it should just work, elegantly. Every product we
                    ship is a testament to our relentless pursuit of performance, aesthetics, and impact.</p>
            </div>
            <div class="story-image">
                <!-- placeholder for visual -->
                <div
                    style="position:absolute; bottom:1rem; right:1rem; background:rgba(0,0,0,0.5); padding:0.5rem 1rem; border-radius:20px; font-size:0.8rem;">
                    📍 San Francisco · 2018</div>
            </div>
        </div>
    </section>

    <!-- Mission -->
    <section class="page-section container" style="padding-top:0;">
        <div class="mission-card">
            <h3>🎯 Our Mission</h3>
            <p style="max-width:700px; margin:0 auto; color:var(--white-muted);">To empower every organization with
                intelligent, scalable, and beautiful software — turning complex challenges into simple, impactful
                interfaces.</p>
        </div>
    </section>

    <!-- Core Values -->
    <section class="page-section container">
        <p class="section-label">Principles</p>
        <h2 class="section-title">Core Values</h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">⚡</div>
                <h4>Precision Engineering</h4>
                <p>We obsess over performance, clean code, and robust architecture — because reliability is a feature.
                </p>
            </div>
            <div class="value-card">
                <div class="value-icon">🎨</div>
                <h4>Design-First Thinking</h4>
                <p>Every pixel and interaction matters. We craft experiences that users love from the very first tap.
                </p>
            </div>
            <div class="value-card">
                <div class="value-icon">🤖</div>
                <h4>AI at the Core</h4>
                <p>We embed intelligence into everything we build, making software adaptive, predictive, and truly
                    smart.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🌍</div>
                <h4>Global Collaboration</h4>
                <p>Distributed across 14 countries, we bring diverse perspectives to solve problems without borders.</p>
            </div>
        </div>
    </section>

    <!-- Leadership -->
    <section class="page-section container">
        <p class="section-label">Leadership</p>
        <h2 class="section-title">Meet the Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <div class="avatar">AK</div>
                <h4>Anika Khanna</h4>
                <div class="role">CEO & Co-Founder</div>
                <p>Former AI lead at DeepMind. Visionary behind Areia's product strategy.</p>
            </div>
            <div class="team-member">
                <div class="avatar">MR</div>
                <h4>Marcus Reyes</h4>
                <div class="role">CTO</div>
                <p>Cloud-native architect with 15+ years building distributed systems at scale.</p>
            </div>
            <div class="team-member">
                <div class="avatar">SL</div>
                <h4>Sophie Laurent</h4>
                <div class="role">VP of Design</div>
                <p>Award-winning UX strategist who shaped products used by 100M+ people.</p>
            </div>
            <div class="team-member">
                <div class="avatar">DG</div>
                <h4>David Guo</h4>
                <div class="role">Head of AI</div>
                <p>PhD in machine learning. Pioneered real‑time NLP systems for financial analytics.</p>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="page-section container" style="text-align:center;">
        <div class="stats-row">
            <div class="stat-item"><span class="stat-number">120+</span><span class="stat-label">Team Members</span>
            </div>
            <div class="stat-item"><span class="stat-number">14</span><span class="stat-label">Countries</span></div>
            <div class="stat-item"><span class="stat-number">2018</span><span class="stat-label">Founded</span></div>
            <div class="stat-item"><span class="stat-number">200+</span><span class="stat-label">Clients</span></div>
        </div>
    </section>
</x-guest-layout>
