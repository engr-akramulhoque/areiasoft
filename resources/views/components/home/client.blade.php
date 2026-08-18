<section class="clients-section" id="clients">
    <p class="section-label">{{ $clients['label'] }}</p>

    <h2 class="section-title">{{ $clients['title'] }}</h2>

    <div class="client-grid">
        @foreach ($clients['logos'] as $client)
            <div class="client-logo-item">
                <img src="{{ asset($client['image']) }}" alt="{{ $client['name'] }}" loading="lazy">
            </div>
        @endforeach
    </div>
</section>
