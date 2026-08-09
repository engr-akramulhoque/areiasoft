@php
    $platforms = [
        [
            'name' => 'Clutch',
            'logo' => 'static/frontend/assets/images/trusted-companies/clutch.png',
            'url' => 'https://clutch.co/',
        ],
        [
            'name' => 'Fiverr',
            'logo' => 'static/frontend/assets/images/trusted-companies/fiverr.png',
            'url' => 'https://www.fiverr.com/',
        ],
        [
            'name' => 'Freelancer',
            'logo' => 'static/frontend/assets/images/trusted-companies/freelancer.jpg',
            'url' => 'https://www.freelancer.com/',
        ],
        [
            'name' => 'PeoplePerHour',
            'logo' => 'static/frontend/assets/images/trusted-companies/peopleperhour.jpg',
            'url' => 'https://www.peopleperhour.com/',
        ],
        [
            'name' => 'Upwork',
            'logo' => 'static/frontend/assets/images/trusted-companies/upwork.png',
            'url' => 'https://www.upwork.com/',
        ],
        [
            'name' => 'CodeCanyon',
            'logo' => 'static/frontend/assets/images/trusted-companies/codecanyon.png',
            'url' => null,
        ],
    ];
@endphp

<section class="trusted-section" aria-labelledby="trusted-title">

    <div class="trusted-heading">
        <span class="section-eyebrow">Our Professional Networks</span>

        <h2 id="trusted-title">
            Find Areia Soft Across Leading Platforms
        </h2>

        <p>
            Connect with Areia Soft through leading global technology,
            freelance and professional platforms.
        </p>
    </div>

    <div class="client-grid">

        @foreach ($platforms as $platform)
            @if (!empty($platform['url']))
                <a href="{{ $platform['url'] }}" class="client-logo-item" target="_blank" rel="noopener noreferrer"
                    aria-label="{{ $platform['name'] }}">
                @else
                    <div class="client-logo-item" aria-label="{{ $platform['name'] }}">
            @endif

            <img src="{{ asset($platform['logo']) }}" alt="{{ $platform['name'] }} logo" loading="lazy" decoding="async"
                width="180" height="80">

            @if (!empty($platform['url']))
                </a>
            @else
    </div>
    @endif
    @endforeach

    </div>

</section>

<style>
    .trusted-section {
        width: 100%;
        padding: 4rem 1.5rem;
    }

    .trusted-heading {
        max-width: 720px;
        margin: 0 auto 2.5rem;
        text-align: center;
    }

    .section-eyebrow {
        display: inline-block;
        margin-bottom: 0.75rem;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--cyan);
    }

    .trusted-heading h2 {
        margin: 0;
        font-size: clamp(1.75rem, 4vw, 2.5rem);
        line-height: 1.15;
        font-weight: 700;
    }

    .trusted-heading p {
        max-width: 620px;
        margin: 1rem auto 0;
        color: var(--text-muted, rgba(255, 255, 255, 0.65));
        font-size: 0.95rem;
        line-height: 1.7;
    }

    .client-grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 1rem;
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }

    .client-logo-item {
        min-width: 0;
        aspect-ratio: 3 / 2;
        padding: 1.25rem;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--card-bg);
        border: 1px solid var(--glass-border);
        border-radius: var(--radius-md);

        text-decoration: none;

        filter: grayscale(100%);
        opacity: 0.7;

        transition:
            transform 0.3s ease,
            border-color 0.3s ease,
            box-shadow 0.3s ease,
            opacity 0.3s ease,
            filter 0.3s ease;
    }

    .client-logo-item img {
        display: block;
        width: 100%;
        max-width: 150px;
        height: auto;
        max-height: 55px;
        object-fit: contain;
    }

    .client-logo-item:hover {
        filter: grayscale(0%);
        opacity: 1;
        border-color: var(--cyan);
        transform: translateY(-4px);
        box-shadow: 0 0 30px rgba(0, 229, 255, 0.15);
    }

    @media (max-width: 1100px) {
        .client-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .trusted-section {
            padding: 3rem 1rem;
        }

        .client-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .client-logo-item {
            padding: 1rem 0.75rem;
        }

        .client-logo-item img {
            max-width: 120px;
            max-height: 45px;
        }
    }

    @media (max-width: 480px) {
        .client-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .client-logo-item {
            aspect-ratio: 1.6 / 1;
        }
    }
</style>
