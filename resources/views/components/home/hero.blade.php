<section class="hero" id="hero">
    <div class="hero-content">
        <div class="hero-badge">{{ $hero['heroBadge'] }}</div>

        <h1>
            {{ $hero['heroTitleLine1'] }}<br>
            <span class="highlight">{{ $hero['heroTitleHighlight'] }}</span>
            {{ $hero['heroTitleLine2'] }}
        </h1>

        <p class="hero-subtitle">
            {{ $hero['heroSubtitle'] }}
        </p>

        <div class="hero-buttons">
            <a href="{{ route('service.index') }}"
               class="btn-primary"
               aria-label="Explore our software development services">
                {{ $hero['primaryButton'] }}
            </a>

            <a href="{{ route('contact.index') }}"
               class="btn-secondary"
               aria-label="Start your custom software development project">
                {{ $hero['secondaryButton'] }}
            </a>
        </div>
    </div>

    <div class="scroll-indicator" aria-hidden="true">
        <span>Scroll</span>
        <div class="scroll-arrow"></div>
    </div>
</section>