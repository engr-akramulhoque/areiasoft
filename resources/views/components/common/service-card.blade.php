@foreach ($services as $service)
    <a href="{{ route('service.show' ,$service['slug']) }}" style="text-decoration: none;">

        <div class="service-card">
            <div class="card-icon">
                {!! $service['icon'] !!}
            </div>

            <h3>{{ $service['title'] }}</h3>

            <p>{{ $service['description'] }}</p>

            <div class="card-glow-line"></div>
        </div>
    </a>
@endforeach
