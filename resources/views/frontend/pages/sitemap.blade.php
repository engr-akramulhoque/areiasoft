<x-guest-layout>

    @push('styles')
        <style>
            /* ── Sitemap Hero ── */
            .sitemap-hero {
                padding: 10rem 2rem 4rem;
                text-align: center;
            }

            .sitemap-hero .section-label {
                font-size: 0.8rem;
                font-weight: 600;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                color: var(--cyan);
                margin-bottom: 0.8rem;
            }

            .sitemap-hero h1 {
                font-size: clamp(2.5rem, 5vw, 4rem);
                font-weight: 800;
                letter-spacing: -0.03em;
                margin-bottom: 1rem;
            }

            .sitemap-hero p {
                color: var(--white-muted);
                max-width: 650px;
                margin: 0 auto;
                font-size: 1.1rem;
                line-height: 1.7;
            }

            /* ── Sitemap Grid ── */
            .sitemap-grid {
                max-width: 1200px;
                margin: 0 auto 5rem;
                padding: 0 2rem;
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 1.5rem;
            }

            .sitemap-card {
                position: relative;
                overflow: hidden;
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 2rem;
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                box-shadow: 0 8px 40px var(--glass-shadow);
                transition: var(--transition);
            }

            .sitemap-card:hover {
                border-color: var(--glass-border-hover);
                transform: translateY(-6px);
                box-shadow:
                    0 20px 60px rgba(0, 0, 0, 0.5),
                    0 0 40px rgba(0, 229, 255, 0.08);
            }

            .sitemap-card::before {
                content: "";
                position: absolute;
                width: 180px;
                height: 180px;
                right: -100px;
                top: -100px;
                border-radius: 50%;
                background: rgba(0, 229, 255, 0.035);
                transition: var(--transition);
                pointer-events: none;
            }

            .sitemap-card:hover::before {
                transform: scale(1.4);
            }

            .sitemap-card-wide {
                grid-column: 1 / -1;
            }

            /* ── Card Header ── */
            .sitemap-card-header {
                position: relative;
                z-index: 2;
                display: flex;
                align-items: center;
                gap: 1rem;
                margin-bottom: 1.5rem;
            }

            .sitemap-icon {
                width: 50px;
                height: 50px;
                flex-shrink: 0;
                border-radius: var(--radius-sm);
                background: var(--cyan-subtle);
                border: 1px solid rgba(0, 229, 255, 0.2);
                display: flex;
                align-items: center;
                justify-content: center;
                transition: var(--transition);
            }

            .sitemap-card:hover .sitemap-icon {
                border-color: var(--cyan);
                box-shadow: 0 0 30px var(--cyan-glow);
            }

            .sitemap-icon svg {
                width: 23px;
                height: 23px;
                stroke: var(--cyan);
                fill: none;
                stroke-width: 1.7;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            .sitemap-card-header h2 {
                margin: 0 0 0.25rem;
                font-size: 1.2rem;
                font-weight: 700;
                color: var(--white);
            }

            .sitemap-card-header p {
                margin: 0;
                font-size: 0.8rem;
                color: var(--white-muted);
            }

            /* ── Sitemap Links ── */
            .sitemap-links {
                position: relative;
                z-index: 2;
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0.4rem 1.5rem;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .sitemap-card-wide .sitemap-links {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .sitemap-links li a {
                display: flex;
                align-items: center;
                gap: 0.65rem;
                min-height: 38px;
                padding: 0.4rem 0;
                color: var(--white-muted);
                text-decoration: none;
                font-size: 0.9rem;
                line-height: 1.4;
                transition: var(--transition);
            }

            .sitemap-links li a svg {
                width: 15px;
                height: 15px;
                flex-shrink: 0;
                stroke: rgba(255, 255, 255, 0.35);
                fill: none;
                stroke-width: 1.8;
                stroke-linecap: round;
                stroke-linejoin: round;
                transition: var(--transition);
            }

            .sitemap-links li a:hover {
                color: var(--cyan);
                transform: translateX(5px);
            }

            .sitemap-links li a:hover svg {
                stroke: var(--cyan);
            }

            /* ── Empty State ── */
            .sitemap-empty {
                color: var(--white-muted);
                font-size: 0.9rem;
            }

            /* ── CTA ── */
            .sitemap-cta {
                max-width: 900px;
                margin: 0 auto 5rem;
                padding: 3rem 2rem;
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                text-align: center;
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.4);
                position: relative;
                overflow: hidden;
            }

            .sitemap-cta::before {
                content: "";
                position: absolute;
                width: 220px;
                height: 220px;
                top: -130px;
                left: -100px;
                border-radius: 50%;
                border: 1px solid rgba(0, 229, 255, 0.08);
                pointer-events: none;
            }

            .sitemap-cta::after {
                content: "";
                position: absolute;
                width: 180px;
                height: 180px;
                bottom: -120px;
                right: -80px;
                border-radius: 50%;
                border: 1px solid rgba(0, 229, 255, 0.08);
                pointer-events: none;
            }

            .sitemap-cta h2 {
                position: relative;
                z-index: 2;
                font-size: 1.8rem;
                font-weight: 700;
                margin-bottom: 0.8rem;
            }

            .sitemap-cta p {
                position: relative;
                z-index: 2;
                color: var(--white-muted);
                max-width: 600px;
                margin: 0 auto 1.5rem;
                line-height: 1.6;
            }

            .sitemap-cta .btn-primary {
                position: relative;
                z-index: 2;
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

            .sitemap-cta .btn-primary:hover {
                color: var(--bg-deep);
                box-shadow: 0 0 70px rgba(0, 229, 255, 0.55);
                transform: translateY(-2px);
            }

            /* ── Bottom Glow Line ── */
            .sitemap-card-glow {
                position: absolute;
                z-index: 3;
                bottom: 0;
                left: 2rem;
                right: 2rem;
                height: 1px;
                background: linear-gradient(
                    90deg,
                    transparent,
                    rgba(0, 229, 255, 0.5),
                    transparent
                );
                transform: scaleX(0);
                transform-origin: center;
                transition: var(--transition);
            }

            .sitemap-card:hover .sitemap-card-glow {
                transform: scaleX(1);
            }

            /* ── Responsive ── */
            @media (max-width: 900px) {
                .sitemap-card-wide .sitemap-links {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }
            }

            @media (max-width: 768px) {
                .sitemap-hero {
                    padding: 7rem 1.5rem 3rem;
                }

                .sitemap-hero p {
                    font-size: 1rem;
                }

                .sitemap-grid {
                    grid-template-columns: 1fr;
                    padding: 0 1.5rem;
                    margin-bottom: 3.5rem;
                }

                .sitemap-card-wide {
                    grid-column: auto;
                }

                .sitemap-links,
                .sitemap-card-wide .sitemap-links {
                    grid-template-columns: 1fr;
                }

                .sitemap-card {
                    padding: 1.6rem;
                }

                .sitemap-cta {
                    margin: 0 1.5rem 3rem;
                    padding: 2.5rem 1.5rem;
                }
            }

            @media (max-width: 480px) {
                .sitemap-card-header {
                    align-items: flex-start;
                }

                .sitemap-icon {
                    width: 45px;
                    height: 45px;
                }

                .sitemap-card-header h2 {
                    font-size: 1.1rem;
                }
            }
        </style>
    @endpush

    <!-- Sitemap Hero -->
    <section class="sitemap-hero">
        <p class="section-label">Sitemap</p>

        <h1>Explore Areia Soft</h1>

        <p>
            Discover our digital solutions, services, projects, live demos,
            company information, and latest insights — all in one place.
        </p>
    </section>

    <!-- Sitemap Grid -->
    <div class="sitemap-grid">

        <!-- Main Pages -->
        <div class="sitemap-card">
            <div class="sitemap-card-header">
                <div class="sitemap-icon">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                    </svg>
                </div>

                <div>
                    <h2>Main Pages</h2>
                    <p>Explore the Areia Soft website</p>
                </div>
            </div>

            <ul class="sitemap-links">
                @foreach ($pages as $page)
                    <li>
                        <a href="{{ $page['url'] }}">
                            <svg viewBox="0 0 24 24">
                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>
                            {{ $page['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="sitemap-card-glow"></div>
        </div>

        <!-- Company -->
        <div class="sitemap-card">
            <div class="sitemap-card-header">
                <div class="sitemap-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M3 21h18"></path>
                        <path d="M5 21V5l7-3 7 3v16"></path>
                        <path d="M9 9h1"></path>
                        <path d="M14 9h1"></path>
                        <path d="M9 13h1"></path>
                        <path d="M14 13h1"></path>
                        <path d="M10 21v-4h4v4"></path>
                    </svg>
                </div>

                <div>
                    <h2>Company</h2>
                    <p>Learn more about Areia Soft</p>
                </div>
            </div>

            <ul class="sitemap-links">
                @foreach ($company as $item)
                    <li>
                        <a href="{{ $item['url'] }}">
                            <svg viewBox="0 0 24 24">
                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>
                            {{ $item['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="sitemap-card-glow"></div>
        </div>

        <!-- Services -->
        <div class="sitemap-card sitemap-card-wide">
            <div class="sitemap-card-header">
                <div class="sitemap-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 3v18"></path>
                        <path d="M3 12h18"></path>
                        <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                    </svg>
                </div>

                <div>
                    <h2>Our Services</h2>
                    <p>Technology solutions built around your business</p>
                </div>
            </div>

            <ul class="sitemap-links">
                @forelse ($services as $service)
                    <li>
                        <a href="{{ $service['url'] }}">
                            <svg viewBox="0 0 24 24">
                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>
                            {{ $service['title'] }}
                        </a>
                    </li>
                @empty
                    <li>
                        <span class="sitemap-empty">No services available.</span>
                    </li>
                @endforelse
            </ul>

            <div class="sitemap-card-glow"></div>
        </div>

        <!-- Live Demos -->
        <div class="sitemap-card sitemap-card-wide">
            <div class="sitemap-card-header">
                <div class="sitemap-icon">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="14" rx="2"></rect>
                        <path d="M8 21h8"></path>
                        <path d="M12 18v3"></path>
                        <path d="m10 9 5 2-5 2z"></path>
                    </svg>
                </div>

                <div>
                    <h2>Live Demos</h2>
                    <p>Explore our interactive website experiences</p>
                </div>
            </div>

            <ul class="sitemap-links">
                @forelse ($live_demos as $demo)
                    <li>
                        <a href="{{ $demo['url'] }}">
                            <svg viewBox="0 0 24 24">
                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>
                            {{ $demo['title'] }}
                        </a>
                    </li>
                @empty
                    <li>
                        <span class="sitemap-empty">No live demos available.</span>
                    </li>
                @endforelse
            </ul>

            <div class="sitemap-card-glow"></div>
        </div>
        
        <!-- Our Works -->
        <div class="sitemap-card sitemap-card-wide">
            <div class="sitemap-card-header">
                <div class="sitemap-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                        <path d="M8 7V5.5A1.5 1.5 0 0 1 9.5 4h5A1.5 1.5 0 0 1 16 5.5V7"></path>
                        <path d="M3 12h18"></path>
                        <path d="M10 12v1.5h4V12"></path>
                    </svg>
                </div>

                <div>
                    <h2>Our Works</h2>
                    <p>Explore our portfolio of completed projects</p>
                </div>
            </div>

            <ul class="sitemap-links">
                @forelse ($our_works as $work)
                    <li>
                        <a href="{{ $work['url'] }}">
                            <svg viewBox="0 0 24 24">
                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>
                            {{ $work['title'] }}
                        </a>
                    </li>
                @empty
                    <li>
                        <span class="sitemap-empty">No our works available.</span>
                    </li>
                @endforelse
            </ul>

            <div class="sitemap-card-glow"></div>
        </div>

        <!-- Blog Categories -->
        @if ($blog_categories->count())
            <div class="sitemap-card">
                <div class="sitemap-card-header">
                    <div class="sitemap-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 12v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7"></path>
                            <path d="M16 3h5v5"></path>
                            <path d="m10 14 11-11"></path>
                        </svg>
                    </div>

                    <div>
                        <h2>Blog Categories</h2>
                        <p>Browse insights by topic</p>
                    </div>
                </div>

                <ul class="sitemap-links">
                    @foreach ($blog_categories as $category)
                        <li>
                            <a href="{{ $category['url'] }}">
                                <svg viewBox="0 0 24 24">
                                    <path d="M5 12h14"></path>
                                    <path d="m13 6 6 6-6 6"></path>
                                </svg>
                                {{ $category['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="sitemap-card-glow"></div>
            </div>
        @endif

        <!-- Blogs -->
        <div class="sitemap-card">
            <div class="sitemap-card-header">
                <div class="sitemap-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z"></path>
                        <path d="M8 8h8"></path>
                        <path d="M8 12h8"></path>
                        <path d="M8 16h5"></path>
                    </svg>
                </div>

                <div>
                    <h2>Latest Blogs</h2>
                    <p>Technology, ideas and insights</p>
                </div>
            </div>

            <ul class="sitemap-links">
                @forelse ($blogs as $blog)
                    <li>
                        <a href="{{ $blog['url'] }}">
                            <svg viewBox="0 0 24 24">
                                <path d="M5 12h14"></path>
                                <path d="m13 6 6 6-6 6"></path>
                            </svg>
                            {{ $blog['title'] }}
                        </a>
                    </li>
                @empty
                    <li>
                        <span class="sitemap-empty">No blog posts available.</span>
                    </li>
                @endforelse
            </ul>

            <div class="sitemap-card-glow"></div>
        </div>

    </div>

    <!-- CTA -->
    <section class="sitemap-cta">
        <h2>Ready to Build Something Great?</h2>

        <p>
            Have an idea, business challenge, or digital project in mind?
            Let's discuss how Areia Soft can turn it into a scalable digital solution.
        </p>

        <a href="{{ route('contact.index') }}" class="btn-primary">
            Get in Touch
        </a>
    </section>

</x-guest-layout>