<section class="work-section" id="work">
    <div class="container">

        <p class="section-label">Our Portfolio</p>
        <h2 class="section-title">Explore Our Recent Work</h2>

        <div class="work-grid">

            @forelse($portfolios as $portfolio)
                <article class="work-card">

                    <div class="work-image">
                        <img src="{{ $portfolio['image'] }}" alt="{{ $portfolio['title'] }}" loading="lazy">
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
                                <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 5L19 12L12 19" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                    </div>

                </article>

            @empty

                <div class="col-12 text-center">
                    <p>No portfolio items found.</p>
                </div>

            @endforelse

        </div>

    </div>
</section>

<style>
    /*======================================
    Portfolio Section
    ======================================*/

    .work-image {
        position: relative;
        overflow: hidden;
        aspect-ratio: 16/10;
        background: #f8fafc;
    }

    .work-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .6s ease;
    }

    .work-card:hover .work-image img {
        transform: scale(1.08);
    }
</style>
