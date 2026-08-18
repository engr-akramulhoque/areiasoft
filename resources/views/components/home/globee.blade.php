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