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
                max-width: 550px;
                margin: 0 auto;
                font-size: 1rem;
            }

            /* ── Filter Bar ── */
            .filter-bar {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 0.75rem;
                margin: 2rem 0 3rem;
                padding: 0 1rem;
            }

            .filter-btn {
                background: transparent;
                border: 1px solid var(--glass-border);
                border-radius: 50px;
                padding: 0.55rem 1.5rem;
                color: var(--white-muted);
                font-size: 0.85rem;
                font-weight: 500;
                cursor: pointer;
                transition: var(--transition);
                backdrop-filter: blur(10px);
            }

            .filter-btn:hover,
            .filter-btn.active {
                border-color: var(--cyan);
                color: var(--cyan);
                box-shadow: 0 0 20px var(--cyan-glow);
            }

            .filter-btn.active {
                background: rgba(0, 229, 255, 0.08);
            }

            /* ── Work Grid ── */
            .work-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
                gap: 2rem;
                max-width: 1300px;
                margin: 0 auto;
                padding: 0 2rem 5rem;
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
                display: flex;
                flex-direction: column;
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.4);
            }

            .work-card:hover {
                border-color: var(--cyan);
                transform: translateY(-8px);
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6), 0 0 35px rgba(0, 229, 255, 0.1);
            }

            .work-image {
                height: 200px;
                background: linear-gradient(135deg, #0F1722, #1A2332);
                position: relative;
                overflow: hidden;
            }

            .work-image .project-img-placeholder {
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2.5rem;
                font-weight: 300;
                color: rgba(255, 255, 255, 0.15);
                background: radial-gradient(circle at 30% 30%, rgba(0, 229, 255, 0.05) 0%, transparent 60%);
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
                font-size: 1.25rem;
                font-weight: 700;
                letter-spacing: -0.01em;
                margin-bottom: 0.5rem;
                color: var(--white);
            }

            .work-card p {
                font-size: 0.9rem;
                color: var(--white-muted);
                line-height: 1.5;
                margin-bottom: 1.2rem;
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

            /* ── Responsive ── */
            @media (max-width: 768px) {
                .page-hero {
                    padding: 7rem 1.5rem 2rem;
                }

                .work-grid {
                    grid-template-columns: 1fr;
                    padding: 0 1.5rem 4rem;
                }
            }
        </style>
    @endpush

    <!-- Hero -->
    <section class="page-hero">
        <p class="section-label">Portfolio</p>
        <h1>Selected Projects</h1>
        <p>Explore our latest work across AI, cloud, mobile, and design — each one crafted with precision and passion.
        </p>
    </section>

    <!-- Filter Bar -->
    <div class="filter-bar" id="filterBar">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="ai">AI / ML</button>
        <button class="filter-btn" data-filter="web">Web Apps</button>
        <button class="filter-btn" data-filter="mobile">Mobile</button>
        <button class="filter-btn" data-filter="cloud">Cloud</button>
        <button class="filter-btn" data-filter="design">UI/UX Design</button>
    </div>

    <!-- Work Grid -->
    <div class="work-grid" id="workGrid">
        <!-- project cards with category data -->
        <div class="work-card" data-category="ai web">
            <div class="work-image">
                <div class="project-img-placeholder">⚡ NEXUS</div>
            </div>
            <div class="work-details">
                <div class="work-tags"><span class="work-tag">AI Platform</span><span class="work-tag">Web App</span>
                </div>
                <h3>Nexus Analytics Suite</h3>
                <p>Real-time predictive analytics dashboard processing 2M+ events daily for enterprise supply chains.
                </p>
                <a href="#" class="work-link">View Case Study <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
        <div class="work-card" data-category="mobile ai">
            <div class="work-image">
                <div class="project-img-placeholder">📱 PULSE</div>
            </div>
            <div class="work-details">
                <div class="work-tags"><span class="work-tag">Mobile</span><span class="work-tag">HealthTech</span>
                </div>
                <h3>Pulse Health App</h3>
                <p>AI-driven telemedicine platform connecting 500k+ patients with specialists in under 60 seconds.</p>
                <a href="#" class="work-link">View Case Study <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
        <div class="work-card" data-category="cloud web">
            <div class="work-image">
                <div class="project-img-placeholder">☁️ STRATOS</div>
            </div>
            <div class="work-details">
                <div class="work-tags"><span class="work-tag">Cloud</span><span class="work-tag">Infrastructure</span>
                </div>
                <h3>Stratos Multi‑Cloud</h3>
                <p>Kubernetes control plane managing hybrid deployments across AWS, GCP, and Azure with 99.99% uptime.
                </p>
                <a href="#" class="work-link">View Case Study <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
        <div class="work-card" data-category="design web">
            <div class="work-image">
                <div class="project-img-placeholder">🎨 LUMINA</div>
            </div>
            <div class="work-details">
                <div class="work-tags"><span class="work-tag">Design System</span><span class="work-tag">UI/UX</span>
                </div>
                <h3>Lumina Design Language</h3>
                <p>Unified design system for a fintech unicorn, accelerating product velocity by 40% across 12 teams.
                </p>
                <a href="#" class="work-link">View Case Study <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
        <div class="work-card" data-category="ai cloud">
            <div class="work-image">
                <div class="project-img-placeholder">🧠 CORTEX</div>
            </div>
            <div class="work-details">
                <div class="work-tags"><span class="work-tag">AI</span><span class="work-tag">Cloud</span></div>
                <h3>Cortex NLP Engine</h3>
                <p>Serverless natural language processing pipeline handling 10M+ requests/day with sub‑100ms latency.
                </p>
                <a href="#" class="work-link">View Case Study <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
        <div class="work-card" data-category="mobile design">
            <div class="work-image">
                <div class="project-img-placeholder">📲 WAVE</div>
            </div>
            <div class="work-details">
                <div class="work-tags"><span class="work-tag">Mobile</span><span class="work-tag">Fintech</span></div>
                <h3>Wave Banking App</h3>
                <p>Award‑winning neobank app with gesture‑based navigation and real‑time spending insights.</p>
                <a href="#" class="work-link">View Case Study <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
        <div class="work-card" data-category="design web">
            <div class="work-image">
                <div class="project-img-placeholder">🎨 LUMINA</div>
            </div>
            <div class="work-details">
                <div class="work-tags"><span class="work-tag">Design System</span><span class="work-tag">UI/UX</span>
                </div>
                <h3>Lumina Design Language</h3>
                <p>Unified design system for a fintech unicorn, accelerating product velocity by 40% across 12 teams.
                </p>
                <a href="#" class="work-link">View Case Study <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
        <div class="work-card" data-category="ai cloud">
            <div class="work-image">
                <div class="project-img-placeholder">🧠 CORTEX</div>
            </div>
            <div class="work-details">
                <div class="work-tags"><span class="work-tag">AI</span><span class="work-tag">Cloud</span></div>
                <h3>Cortex NLP Engine</h3>
                <p>Serverless natural language processing pipeline handling 10M+ requests/day with sub‑100ms latency.
                </p>
                <a href="#" class="work-link">View Case Study <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
        <div class="work-card" data-category="mobile design">
            <div class="work-image">
                <div class="project-img-placeholder">📲 WAVE</div>
            </div>
            <div class="work-details">
                <div class="work-tags"><span class="work-tag">Mobile</span><span class="work-tag">Fintech</span></div>
                <h3>Wave Banking App</h3>
                <p>Award‑winning neobank app with gesture‑based navigation and real‑time spending insights.</p>
                <a href="#" class="work-link">View Case Study <svg viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            (function() {

                // ── Filter functionality ──
                const filterButtons = document.querySelectorAll('.filter-btn');
                const workCards = document.querySelectorAll('.work-card');
                filterButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        filterButtons.forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');
                        const filter = btn.dataset.filter;
                        workCards.forEach(card => {
                            if (filter === 'all' || card.dataset.category.includes(filter)) {
                                card.style.display = '';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                    });
                });
            })();
        </script>
    @endpush
</x-guest-layout>
