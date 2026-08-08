@php
    $heroBadge = 'Custom Software & Website Development Company';

    $heroTitleLine1 = 'Custom Software &';
    $heroTitleHighlight = 'Website Development';
    $heroTitleLine2 = 'Solutions';

    $heroSubtitle = 'Areia Soft builds high-performance websites, custom software, ERP, CRM, and AI-powered solutions that help businesses innovate, automate, and grow.';
    
    $primaryButton = 'Our Services';
    $secondaryButton = 'Start Your Project';
@endphp

<section class="hero" id="hero">
    <div class="hero-content">
        <div class="hero-badge">{{ $heroBadge }}</div>

        <h1>
            {{ $heroTitleLine1 }}<br>
            <span class="highlight">{{ $heroTitleHighlight }}</span>
            {{ $heroTitleLine2 }}
        </h1>

        <p class="hero-subtitle">
            {{ $heroSubtitle }}
        </p>

        <div class="hero-buttons">
            <a href="{{ route('service.index') }}"
               class="btn-primary"
               aria-label="Explore our software development services">
                {{ $primaryButton }}
            </a>

            <a href="{{ route('contact.index') }}"
               class="btn-secondary"
               aria-label="Start your custom software development project">
                {{ $secondaryButton }}
            </a>
        </div>
    </div>

    <div class="scroll-indicator" aria-hidden="true">
        <span>Scroll</span>
        <div class="scroll-arrow"></div>
    </div>
</section>