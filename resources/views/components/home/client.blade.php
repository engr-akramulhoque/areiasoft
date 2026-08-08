<style>
    .client-logo-item {
    display: flex;
    align-items: center;
    justify-content: center;
}

.client-logo-item img {
    max-width: 150px;
    max-height: 60px;
    width: auto;
    height: auto;
    object-fit: contain;
    opacity: .75;
    transition: .35s ease;
    filter: grayscale(100%);
}

.client-logo-item:hover img {
    opacity: 1;
    filter: grayscale(0%);
    transform: scale(1.05);
}
</style>

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
