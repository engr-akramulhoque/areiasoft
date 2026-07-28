<x-guest-layout>
    @push('styles')
        <style>
            /* ── Profile Hero ── */
            .profile-hero {
                padding: 10rem 2rem 3rem;
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

            .profile-hero h1 {
                font-size: clamp(2.5rem, 5vw, 4rem);
                font-weight: 800;
                letter-spacing: -0.03em;
                margin-bottom: 0.5rem;
            }

            .profile-title {
                color: var(--cyan);
                font-size: 1.1rem;
                font-weight: 500;
                margin-bottom: 1rem;
            }

            .hero-quote {
                font-size: 1.4rem;
                font-style: italic;
                color: var(--white-soft);
                max-width: 700px;
                margin: 0 auto;
            }

            .content-container {
                max-width: 1000px;
                margin: 0 auto 4rem;
                padding: 0 2rem;
            }

            .glass-card {
                background: var(--card-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                padding: 2.5rem 2rem;
                margin-bottom: 2rem;
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.5);
                transition: var(--transition);
            }

            .glass-card:hover {
                border-color: var(--glass-border-hover);
            }

            .grid-2col {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2.5rem;
                align-items: center;
            }

            /* ── Fixed Avatar with Image ── */
            .avatar-large {
                width: 200px;
                height: 270px;
                border-radius: 10%;
                background: linear-gradient(135deg,
                        var(--cyan-subtle),
                        var(--navy));
                margin: 0 auto;
                border: 3px solid var(--cyan);
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                box-shadow:
                    0 0 40px var(--cyan-glow),
                    0 0 80px rgba(0, 229, 255, 0.1);
                transition: var(--transition);
            }

            .avatar-large:hover {
                box-shadow:
                    0 0 60px var(--cyan-glow),
                    0 0 100px rgba(0, 229, 255, 0.2);
                border-color: var(--white);
            }

            .avatar-large img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
                border-radius: 10%;
            }

            /* Fallback initials if image fails */
            .avatar-placeholder {
                font-size: 3rem;
                color: var(--cyan);
                font-weight: 700;
                display: none;
            }

            .avatar-large img.error+.avatar-placeholder,
            .avatar-large:has(img[src=""]) .avatar-placeholder,
            .avatar-large:not(:has(img)) .avatar-placeholder {
                display: block;
            }

            .speech-text {
                font-size: 1.1rem;
                line-height: 1.8;
                color: var(--white-muted);
                border-left: 3px solid var(--cyan);
                padding-left: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .highlight-box {
                background: rgba(0, 229, 255, 0.05);
                border: 1px solid rgba(0, 229, 255, 0.2);
                border-radius: var(--radius-sm);
                padding: 1.5rem;
                text-align: center;
                font-weight: 600;
                color: var(--cyan);
            }

            /* Timeline */
            .timeline {
                position: relative;
                padding-left: 2rem;
            }

            .timeline::before {
                content: "";
                position: absolute;
                left: 0.8rem;
                top: 0.5rem;
                bottom: 0.5rem;
                width: 2px;
                background: linear-gradient(to bottom,
                        var(--cyan),
                        rgba(0, 229, 255, 0.2),
                        var(--cyan));
            }

            .timeline-item {
                position: relative;
                margin-bottom: 1.8rem;
                padding-left: 2rem;
            }

            .timeline-item::before {
                content: "";
                position: absolute;
                left: -1.4rem;
                top: 0.4rem;
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: var(--cyan);
                box-shadow: 0 0 12px var(--cyan-glow);
            }

            .timeline-year {
                font-size: 0.85rem;
                font-weight: 700;
                color: var(--cyan);
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }

            .timeline-desc {
                color: var(--white-muted);
                margin-top: 0.2rem;
            }

            /* Buttons */
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

            .btn-outline {
                display: inline-block;
                padding: 0.75rem 2rem;
                border: 1px solid var(--cyan);
                border-radius: 50px;
                color: var(--cyan);
                text-decoration: none;
                font-weight: 600;
                transition: var(--transition);
            }

            .btn-outline:hover {
                background: var(--cyan);
                color: var(--bg-deep);
            }

            /* ── Responsive ── */
            @media (max-width: 768px) {
                .profile-hero {
                    padding: 7rem 1.5rem 2rem;
                }

                .content-container {
                    padding: 0 1.5rem;
                }

                .avatar-large {
                    width: 150px;
                    height: 180px;
                }

                .avatar-placeholder {
                    font-size: 2.2rem;
                }

                .grid-2col {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                }

                .speech-text {
                    font-size: 1rem;
                }
            }

            @media (max-width: 480px) {
                .avatar-large {
                    width: 130px;
                    height: 130px;
                }

                .avatar-placeholder {
                    font-size: 1.8rem;
                }

                .hero-quote {
                    font-size: 1.1rem;
                }

                .glass-card {
                    padding: 1.8rem 1.2rem;
                }
            }
        </style>
    @endpush

    <!-- Profile Hero -->
    <x-common.page-title />

    <!-- Main Content -->
    <div class="content-container">
        <!-- Speech -->
        <div class="glass-card">
            <div class="grid-2col">
                <div class="avatar-large">
                    <img src="./assets/images/IA-Roni.jpeg" alt="Md.Istak Ahmmed Roni"
                        onerror="
                                this.style.display = 'none';
                                this.nextElementSibling.style.display =
                                    'flex';
                            " />
                    <span class="avatar-placeholder">AK</span>
                </div>
                <div>
                    <h2
                        style="
                                font-size: 1.6rem;
                                color: var(--cyan);
                                margin-bottom: 1rem;
                            ">
                        A Message from the CEO
                    </h2>
                    <div class="speech-text">
                        <p>
                            At Areia Soft, we believe technology should
                            amplify human potential. I founded this
                            company after spending a decade at the
                            forefront of AI research, watching brilliant
                            ideas die in the gap between concept and
                            execution. We exist to bridge that gap —
                            with relentless engineering, empathetic
                            design, and a culture of curiosity.
                        </p>
                        <p>
                            Today, our team of 120+ dreamers and doers
                            serves clients across 18 countries, but we
                            still approach every project like our first.
                            Whether it's a predictive analytics suite
                            saving millions in supply chain costs or a
                            telemedicine app connecting rural patients
                            to specialists in seconds, we measure
                            success in human impact.
                        </p>
                        <p>
                            I invite you to join us in shaping the next
                            generation of intelligent interfaces. Let's
                            build the future, together.
                        </p>
                    </div>
                    <div class="highlight-box">
                        "Every line of code we write is a promise — to
                        our clients, their users, and a better digital
                        world."
                    </div>
                </div>
            </div>
        </div>

        <!-- Career Timeline -->
        <div class="glass-card">
            <h2
                style="
                        font-size: 1.6rem;
                        color: var(--cyan);
                        margin-bottom: 1.5rem;
                    ">
                Career Highlights
            </h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-year">2026– Present</div>
                    <div class="timeline-desc">
                        Co‑founded Areia Soft, grew the team from 3 to
                        120+ with operations in 14 countries.
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-year">2022 – 2026</div>
                    <div class="timeline-desc">
                        AI Research Lead at DeepMind, contributed to
                        breakthroughs in natural language understanding
                        and reinforcement learning.
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-year">2022 – 2023</div>
                    <div class="timeline-desc">
                        Senior Product Manager at Google Cloud,
                        launching ML APIs used by over 1 million
                        developers.
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-year">2024 – 2029</div>
                    <div class="timeline-desc">
                        Ongoing Bsc in Computer Science (AI) from
                        Stanford University, published 12 papers in
                        top-tier conferences.
                    </div>
                </div>
            </div>
        </div>

        <!-- Connect -->
        <div class="glass-card" style="text-align: center">
            <h2
                style="
                        font-size: 1.6rem;
                        color: var(--cyan);
                        margin-bottom: 1rem;
                    ">
                Connect with Anika
            </h2>
            <p style="color: var(--white-muted); margin-bottom: 1.5rem">
                Follow her insights on AI leadership and product
                innovation.
            </p>
            <a href="#" class="btn-outline" style="margin-right: 1rem">🔗 LinkedIn</a>
            <a href="contact.html" class="btn-primary">Send a Message</a>
        </div>
    </div>
</x-guest-layout>
