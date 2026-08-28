<x-guest-layout>
    @push('styles')
        <style>
            /* Hero */
            .project-hero {
                padding: 10rem 2rem 3rem;
                text-align: center;
            }

            .project-hero h1 {
                font-size: clamp(2.2rem, 5vw, 3.8rem);
                font-weight: 800;
                letter-spacing: -0.03em;
                margin-bottom: 1rem;
            }

            .project-hero p {
                color: var(--white-muted);
                max-width: 650px;
                margin: 0 auto;
                font-size: 1.1rem;
            }

            .project-tags {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 0.6rem;
                margin: 1.5rem 0;
            }

            .project-tag {
                font-size: 0.7rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                padding: 0.35rem 0.9rem;
                border-radius: 20px;
                background: rgba(0, 229, 255, 0.08);
                color: var(--cyan);
                border: 1px solid rgba(0, 229, 255, 0.2);
            }

            /* Content */
            .content-container {
                max-width: 1000px;
                margin: 0 auto 5rem;
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

            .project-image {
                width: 100%;
                height: 500px;
                border-radius: var(--radius-md);
                background: linear-gradient(135deg, #0F1722, #1A2332);
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 2rem;
                border: 1px solid var(--glass-border);
                overflow: hidden;
            }

            .project-image img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center top;
            }

            @media (max-width: 768px) {
                .project-image {
                    height: auto;
                    aspect-ratio: 1200 / 568;
                }

                .project-image img {
                    object-position: center center;
                }
            }

            .grid-2col {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }

            @media (max-width: 768px) {
                .grid-2col {
                    grid-template-columns: 1fr;
                }
            }

            .metric-box {
                text-align: center;
                padding: 1.5rem;
                background: rgba(0, 229, 255, 0.03);
                border-radius: var(--radius-sm);
                border: 1px solid var(--glass-border);
            }

            .metric-number {
                font-size: 2rem;
                font-weight: 800;
                color: var(--cyan);
            }

            .metric-label {
                font-size: 0.85rem;
                color: var(--white-muted);
                margin-top: 0.3rem;
            }

            .tech-stack {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
                margin-top: 1rem;
            }

            .tech-badge {
                background: rgba(0, 229, 255, 0.08);
                border: 1px solid rgba(0, 229, 255, 0.15);
                padding: 0.35rem 0.9rem;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 500;
                color: var(--cyan);
            }

            .feature-list {
                list-style: none;
                padding: 0;
            }

            .feature-list li {
                position: relative;
                padding-left: 1.8rem;
                margin-bottom: 0.7rem;
                color: var(--white-muted);
                font-size: 0.95rem;
            }

            .feature-list li::before {
                content: "✓";
                position: absolute;
                left: 0;
                color: var(--cyan);
                font-weight: 700;
            }

            .testimonial {
                font-style: italic;
                border-left: 3px solid var(--cyan);
                padding-left: 1.5rem;
                color: var(--white-soft);
                margin: 1.5rem 0;
            }

            .testimonial-author {
                font-size: 0.9rem;
                color: var(--cyan);
                margin-top: 0.5rem;
                font-style: normal;
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

            .btn-secondary {
                padding: 0.85rem 2.2rem;
                background: transparent;
                color: var(--white);
                border: 1px solid rgba(255, 255, 255, 0.25);
                border-radius: 50px;
                font-weight: 600;
                font-size: 0.95rem;
                text-decoration: none;
                transition: var(--transition);
                display: inline-block;
            }

            .btn-secondary:hover {
                border-color: var(--white);
                background: rgba(255, 255, 255, 0.04);
            }

            @media (max-width: 768px) {
                .project-hero {
                    padding: 7rem 1.5rem 2rem;
                }

                .content-container {
                    padding: 0 1.5rem;
                }
            }
        </style>
    @endpush

    {{-- Service Hero --}}
    <section class="project-hero">

        <h1>
            {{ $service['title'] }}
        </h1>

        <p>
            {{ $service['hero_description'] }}
        </p>

    </section>


    {{-- Content --}}
    <div class="content-container">

        {{-- Service Image --}}
        <div class="project-image">

            <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }} - Areia Soft" loading="eager">

        </div>


        <div class="project-tags">

            @foreach ($service['technologies'] as $technology)
                <span class="project-tag">
                    {{ $technology }}
                </span>
            @endforeach

        </div>

        {{-- Overview & Metrics --}}
        <div class="grid-2col">

            <div class="glass-card">

                <h2 style="font-size:1.6rem; color:var(--cyan); margin-bottom:1rem;">
                    Overview
                </h2>

                <p style="color:var(--white-muted); line-height:1.7;">
                    {{ $service['overview'] }}
                </p>

            </div>


            <div class="glass-card" style="display:flex; flex-direction:column; justify-content:center;">

                <div class="grid-2col" style="gap:1rem;">

                    @foreach ($service['metrics'] as $metric)
                        <div class="metric-box">

                            <div class="metric-number">
                                {{ $metric['number'] }}
                            </div>

                            <div class="metric-label">
                                {{ $metric['label'] }}
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>


        {{-- Key Features --}}
        <div class="glass-card">

            <h2 style="font-size:1.6rem; color:var(--cyan); margin-bottom:1.5rem;">
                Key Features
            </h2>

            <ul class="feature-list">

                @foreach ($service['features'] as $feature)
                    <li>
                        {{ $feature }}
                    </li>
                @endforeach

            </ul>

        </div>


        {{-- Benefits --}}
        <div class="glass-card">

            <h2 style="font-size:1.6rem; color:var(--cyan); margin-bottom:1.5rem;">
                Benefits
            </h2>

            <ul class="feature-list">

                @foreach ($service['benefits'] as $benefit)
                    <li>
                        {{ $benefit }}
                    </li>
                @endforeach

            </ul>

        </div>


        {{-- Technology Stack --}}
        <div class="glass-card">

            <h2 style="font-size:1.6rem; color:var(--cyan); margin-bottom:1rem;">
                Technology Stack
            </h2>

            <div class="tech-stack">

                @foreach ($service['technologies'] as $technology)
                    <span class="tech-badge">
                        {{ $technology }}
                    </span>
                @endforeach

            </div>

        </div>

        {{-- Related Services --}}
        <div class="glass-card">

            <h2 style="font-size:1.6rem; color:var(--cyan); margin-bottom:1rem;">
                Other Services
            </h2>

            <div class="tech-stack">

                @foreach ($services as $otherService)
                    @if ($otherService['slug'] !== $service['slug'])
                        <a href="{{ route('service.show', ['service' => $otherService['slug']]) }}" class="tech-badge">
                            {{ $otherService['title'] }}
                        </a>
                    @endif
                @endforeach

            </div>

        </div>

        {{-- CTA --}}
        <div style="text-align:center; margin-top:3rem;">

            <a href="{{ route('service.index') }}" class="btn-secondary"
                style="margin-right:1rem; margin-bottom:.5rem;">
                ← View More Services
            </a>

            <a href="{{ route('contact.index') }}" class="btn-primary">
                {{ $service['cta_button'] }}
            </a>

        </div>

    </div>
</x-guest-layout>
