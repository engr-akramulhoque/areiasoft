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
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                height: 320px;
                backdrop-filter: blur(12px);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1rem;
                overflow: hidden;
                position: relative;
                color: var(--white-muted);
                background: url('/static/frontend/assets/images/our-story.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;                
            }

            .story-image::before {
                content: " ";
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
        <h1>Building Intelligent Software for a Smarter Future</h1>
        <p class="section-subtitle" style="margin-top:1.5rem;">We are a team of engineers, designers, and AI researchers
            dedicated to building intelligent digital experiences that shape industries.</p>
    </section>

    <!-- Our Story -->
    <x-about.our-story />

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
    <x-about.core-values />

    <!-- Leadership -->
    <x-about.team />

    <!-- Stats -->
    <section class="page-section container" style="text-align:center;">
        <div class="stats-row">
            <div class="stat-item"><span class="stat-number">20+</span><span class="stat-label">Team Members</span>
            </div>
            <div class="stat-item"><span class="stat-number">14</span><span class="stat-label">Countries</span></div>
            <div class="stat-item"><span class="stat-number">2018</span><span class="stat-label">Founded</span></div>
            <div class="stat-item"><span class="stat-number">200+</span><span class="stat-label">Clients</span></div>
        </div>
    </section>
</x-guest-layout>
