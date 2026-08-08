@props([
    'title' => 'Custom Software & Website Development Company | Areia Soft'
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('static/logos/favicon.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('static/logos/favicon.jpg') }}">
    
    <!-- Areia SEO Solutions -->
    @seoAutoPage

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('static/frontend/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('static/frontend/assets/css/style.css') }}" />

    <!-- Styles -->
    @livewireStyles
    @stack('styles')
</head>

<body>
    <canvas id="bg-canvas"></canvas>
    <div class="main-wrapper">
        <!-- Header -->
        <x-common.header />

        {{ $slot }}

        <!-- Premium Footer -->
        <footer class="premium-footer">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>Areia Soft</h4>
                    <p>
                        We engineer intelligent digital experiences at the
                        intersection of design, AI, and cloud infrastructure
                        — trusted by 200+ enterprises across 18 countries.
                    </p>
                </div>
                <div class="footer-col">
                    <h4>Useful Links</h4>
                    <a href="{{ route('service.index') }}">Services</a>
                    <a href="{{ route('work.index') }}">Our Work</a>
                    <a href="{{ route('about.index') }}">About Us</a>
                    <a href="{{ route('contact.index') }}">Contact</a>
                    <a href="{{ route('privacy.policy') }}">Privacy Policy</a>
                    <a href="{{ route('terms.conditions') }}">Terms & Conditions</a>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-icons">
                        <a href="#" aria-label="LinkedIn">🔗</a>
                        <a href="#" aria-label="Twitter">𝕏</a>
                        <a href="#" aria-label="Instagram">📷</a>
                        <a href="#" aria-label="GitHub">🐙</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <span>&copy; 2026 Areia Soft. All rights reserved.</span>
                <span>1600 Amphitheatre Parkway, Mountain View, CA
                    94043</span>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/three@0.157.0/build/three.min.js"></script>
    <script src="{{ asset('static/frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('static/frontend/assets/js/globee.js') }}"></script>

    @livewireScripts
    @stack('scripts')
</body>

</html>
