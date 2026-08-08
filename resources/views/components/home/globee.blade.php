@php
    $globe = [
        'label' => 'Global Presence',
        'title' => 'Delivering Digital Solutions Worldwide',
        'stats' => [
            [
                'number' => '20+',
                'label' => 'Projects Delivered',
            ],
            [
                'number' => '10+',
                'label' => 'Countries Served',
            ],
            [
                'number' => '99.9%',
                'label' => 'System Uptime',
            ],
            [
                'number' => '24/7',
                'label' => 'Technical Support',
            ],
        ],
    ];
@endphp

<section class="globe-section" id="globe">
    <p class="section-label">{{ $globe['label'] }}</p>

    <h2 class="section-title">
        {{ $globe['title'] }}
    </h2>

    <div class="globe-container" id="globeContainer">
        <canvas id="globe-canvas"></canvas>
    </div>

    <div class="globe-stats">
        @foreach($globe['stats'] as $stat)
            <div class="globe-stat">
                <span class="stat-number">{{ $stat['number'] }}</span>
                <span class="stat-label">{{ $stat['label'] }}</span>
            </div>
        @endforeach
    </div>
</section>