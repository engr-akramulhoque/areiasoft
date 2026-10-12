<x-guest-layout :post="$portfolio">

    @push('styles')
        <style>
            .project-hero {
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

            .project-hero h1 {
                font-size: clamp(2.2rem, 5vw, 3.8rem);
                font-weight: 800;
                letter-spacing: -0.03em;
                margin-bottom: 1rem;
            }

            .project-hero p {
                color: var(--white-muted);
                max-width: 700px;
                margin: 0 auto;
                font-size: 1.1rem;
                line-height: 1.7;
            }

            .project-tags {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 0.6rem;
                margin: 1.5rem 0 0;
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

            .back-link {
                display: inline-flex;
                align-items: center;
                gap: 0.4rem;
                color: var(--white-muted);
                text-decoration: none;
                font-size: 0.85rem;
                margin-bottom: 2rem;
                transition: color 0.2s;
            }

            .back-link:hover {
                color: var(--cyan);
            }

            .back-link svg {
                width: 16px;
                height: 16px;
                stroke: currentColor;
            }

            .content-container {
                max-width: 1100px;
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

            .project-image-wrapper {
                overflow: hidden;
                border-radius: var(--radius-md);
                border: 1px solid var(--glass-border);
                background: linear-gradient(135deg, #0F1722, #1A2332);
                margin-bottom: 2rem;
            }

            .project-image {
                display: block;
                width: 100%;
                height: auto;
                object-fit: cover;
                transition: transform 0.6s ease;
            }

            .project-image-wrapper:hover .project-image {
                transform: scale(1.025);
            }

            .grid-2col {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }

            .project-section-title {
                font-size: 1.6rem;
                color: var(--cyan);
                margin-bottom: 1rem;
            }

            .project-description {
                color: var(--white-muted);
                line-height: 1.8;
                font-size: 0.98rem;
                margin: 0;
            }

            .project-info-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .project-info-list li {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 1rem;
                padding: 0.9rem 0;
                border-bottom: 1px solid var(--glass-border);
                color: var(--white-muted);
                font-size: 0.9rem;
            }

            .project-info-list li:last-child {
                border-bottom: 0;
            }

            .project-info-label {
                color: var(--white);
                font-weight: 600;
            }

            .project-info-value {
                text-align: right;
                color: var(--white-muted);
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

            .category-list {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .category-badge {
                padding: 0.4rem 0.85rem;
                border-radius: 20px;
                background: rgba(255, 255, 255, 0.04);
                border: 1px solid var(--glass-border);
                color: var(--white-muted);
                font-size: 0.75rem;
                text-transform: capitalize;
            }

            .empty-state {
                text-align: center;
                padding: 10rem 2rem;
            }

            .empty-state h1 {
                font-size: 2.5rem;
                margin-bottom: 1rem;
            }

            .empty-state p {
                color: var(--white-muted);
                margin-bottom: 2rem;
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

            .project-link {
                color: var(--cyan);
                text-decoration: none;
                word-break: break-word;
            }

            .project-link:hover {
                text-decoration: underline;
            }

            @media (max-width: 768px) {
                .project-hero {
                    padding: 7rem 1.5rem 2rem;
                }

                .content-container {
                    padding: 0 1.5rem;
                }

                .project-image {
                    height: 280px;
                }

                .grid-2col {
                    grid-template-columns: 1fr;
                }

                .glass-card {
                    padding: 2rem 1.5rem;
                }

                .project-info-list li {
                    flex-direction: column;
                    gap: 0.35rem;
                }

                .project-info-value {
                    text-align: left;
                }

                .project-hero h1 {
                    font-size: 2.3rem;
                }
            }
        </style>
    @endpush

    @if ($portfolio)

        <section class="project-hero">
            <a href="{{ route('work.index') }}" class="back-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M19 12H5"></path>
                    <path d="m12 19-7-7 7-7"></path>
                </svg>
                Back to Portfolio
            </a>

            <p class="section-label">
                {{ implode(' · ', $portfolio->category ?? []) }}
            </p>

            <h1>{{ $portfolio->title }}</h1>

            <p>{{ $portfolio->overview }}</p>

            @if (!empty($portfolio->tags))
                <div class="project-tags">
                    @foreach ($portfolio->tags as $tag)
                        <span class="project-tag">{{ $tag }}</span>
                    @endforeach
                </div>
            @endif
        </section>

        <div class="content-container">

            <div class="project-image-wrapper">
                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}"
                    class="project-image" loading="eager">
            </div>

            <div class="grid-2col">

                <div class="glass-card">
                    <h2 class="project-section-title">Project Overview</h2>

                    <p class="project-description">
                        {{ $portfolio->overview }}
                    </p>
                </div>

                <div class="glass-card">
                    <h2 class="project-section-title">Project Information</h2>

                    <ul class="project-info-list">

                        <li>
                            <span class="project-info-label">Project</span>
                            <span class="project-info-value">
                                {{ $portfolio->title }}
                            </span>
                        </li>

                        <li>
                            <span class="project-info-label">Category</span>
                            <span class="project-info-value">
                                {{ implode(', ', $portfolio->category ?? []) }}
                            </span>
                        </li>

                        <li>
                            <span class="project-info-label">Technologies</span>
                            <span class="project-info-value">
                                {{ implode(', ', $portfolio->tags ?? []) }}
                            </span>
                        </li>

                        @if ($portfolio->url && $portfolio->url !== '#')
                            <li>
                                <span class="project-info-label">Live Website</span>
                                <span class="project-info-value">
                                    <a href="{{ $portfolio->url }}" target="_blank" rel="noopener noreferrer"
                                        class="project-link">
                                        Visit Website
                                    </a>
                                </span>
                            </li>
                        @endif

                    </ul>
                </div>

            </div>


            <div class="grid-1col">

                <div class="glass-card">
                    <h2 class="project-section-title">Project Description</h2>

                    <p class="project-description">
                        {!! $portfolio->description !!}
                    </p>
                </div>
            </div>

            @if (!empty($portfolio->tags))
                <div class="glass-card">
                    <h2 class="project-section-title">Technology & Services</h2>

                    <div class="tech-stack">
                        @foreach ($portfolio->tags as $tag)
                            <span class="tech-badge">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            @if (!empty($portfolio->category))
                <div class="glass-card">
                    <h2 class="project-section-title">Project Categories</h2>

                    <div class="category-list">
                        @foreach ($portfolio->category as $category)
                            <span class="category-badge">
                                {{ $category }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            <div style="text-align:center; margin-top:3rem;">

                <a href="{{ route('work.index') }}" class="btn-secondary" style="margin-right:1rem;">
                    ← View More Projects
                </a>

                @if ($portfolio->url && $portfolio->url !== '#')
                    <a href="{{ $portfolio->url }}" target="_blank" rel="noopener noreferrer" class="btn-primary">
                        Visit Live Website
                    </a>
                @else
                    <a href="{{ route('contact.index') }}" class="btn-primary">
                        Start a Similar Project
                    </a>
                @endif

            </div>

        </div>
    @else
        <section class="empty-state">
            <p class="section-label">Portfolio</p>
            <h1>Project Not Found</h1>
            <p>
                The portfolio project you're looking for is unavailable or no longer active.
            </p>

            <a href="{{ route('work.index') }}" class="btn-primary">
                View Our Works
            </a>
        </section>

    @endif

</x-guest-layout>
