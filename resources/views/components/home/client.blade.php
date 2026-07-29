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
@php
    $clients = [
        'label' => 'Trusted by Businesses',
        'title' => 'Helping Businesses Build Better Digital Products',

        'logos' => [
            [
                'image' => asset('static/frontend/assets/images/clients/bitc.png'),
                'name' => 'Babul International Training Center',
            ],
            [
                'image' => asset('static/frontend/assets/images/clients/client-2.png'),
                'name' => 'Client 2',
            ],
            [
                'image' => asset('static/frontend/assets/images/clients/client-3.png'),
                'name' => 'Client 3',
            ],
            [
                'image' => asset('static/frontend/assets/images/clients/client-4.png'),
                'name' => 'Client 4',
            ],
            [
                'image' => asset('static/frontend/assets/images/clients/client-5.png'),
                'name' => 'Client 5',
            ],
            [
                'image' => asset('static/frontend/assets/images/clients/client-6.png'),
                'name' => 'Client 6',
            ],
            [
                'image' => asset('static/frontend/assets/images/clients/client-7.png'),
                'name' => 'Client 7',
            ],
            [
                'image' => asset('static/frontend/assets/images/clients/client-8.png'),
                'name' => 'Client 8',
            ],
        ],
    ];
@endphp

<section class="clients-section" id="clients">
    <p class="section-label">{{ $clients['label'] }}</p>

    <h2 class="section-title">{{ $clients['title'] }}</h2>

    <div class="client-grid">
        @foreach ($clients['logos'] as $client)
            <div class="client-logo-item">
                <img src="{{ $client['image'] }}" alt="{{ $client['name'] }}" loading="lazy">
            </div>
        @endforeach
    </div>
</section>
