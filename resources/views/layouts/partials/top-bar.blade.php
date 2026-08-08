@php
    $contactInfo = config('areiatech.contact_info');
    $socialLinks = config('areiatech.social_links');
@endphp

<!-- Top Bar -->
<div class="topbar d-flex align-items-center dark-background">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            @foreach ($contactInfo as $contact)
                <i class="bi {{ $contact['icon'] }} d-flex align-items-center {{ !$loop->first ? 'ms-4' : '' }}">
                    <a href="{{ $contact['href'] }}">{{ $contact['text'] }}</a>
                </i>
            @endforeach
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            @foreach ($socialLinks as $social)
                <a href="{{ $social['href'] }}" class="{{ $social['class'] }}">
                    <i class="bi {{ $social['icon'] }}"></i>
                </a>
            @endforeach
        </div>
    </div>
</div>
<!-- End Top Bar -->
