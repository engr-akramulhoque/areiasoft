<x-guest-layout>
    <!-- Hero -->
    <section class="page-hero">
        <p class="section-label">Portfolio</p>
        <h1>Selected Projects</h1>
        <p>Explore our latest work across AI, cloud, mobile, and design — each one crafted with precision and passion.
        </p>
    </section>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="ecommerce">E-Commerce</button>
        <button class="filter-btn" data-filter="web">Business Websites</button>
        <button class="filter-btn" data-filter="software">Business Software</button>
    </div>

    <!-- Work Grid -->
    <div class="work-grid" id="workGrid">

        @forelse ($portfolios as $portfolio)
            <div class="work-card" data-category="{{ implode(' ', $portfolio['category']) }}">

                <div class="work-image">
                    <img src="{{ \Illuminate\Support\Str::startsWith($portfolio['image'], ['http://', 'https://'])
                        ? $portfolio['image']
                        : asset($portfolio['image']) }}"
                        alt="{{ $portfolio['title'] }}" loading="lazy">
                </div>

                <div class="work-details">

                    <div class="work-tags">
                        @foreach ($portfolio['tags'] as $tag)
                            <span class="work-tag">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <h3>{{ $portfolio['title'] }}</h3>

                    <p>{{ $portfolio['description'] }}</p>

                    <a href="{{ $portfolio['url'] }}" class="work-link">
                        View Case Study
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>

                </div>

            </div>
        @empty

            <div style="grid-column:1/-1;text-align:center;">
                <h3>No portfolio found.</h3>
            </div>

        @endforelse

    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const buttons = document.querySelectorAll('.filter-btn');
                const cards = document.querySelectorAll('.work-card');

                buttons.forEach(button => {

                    button.addEventListener('click', function() {

                        buttons.forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');

                        const filter = this.dataset.filter;

                        cards.forEach(card => {

                            const categories = card.dataset.category
                                .split(' ')
                                .map(item => item.trim());

                            if (filter === 'all' || categories.includes(filter)) {

                                card.style.display = '';
                                card.style.opacity = '0';

                                setTimeout(() => {
                                    card.style.opacity = '1';
                                }, 50);

                            } else {

                                card.style.display = 'none';

                            }

                        });

                    });

                });

            });
        </script>
    @endpush

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

            .work-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
                transition: transform .5s ease;
            }

            .work-card:hover .work-image img {
                transform: scale(1.08);
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
</x-guest-layout>
