@props([
    'title' => 'Custom Software & Website Development Company | Areia Soft',
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

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


    <!-- Areia SEO Solutions -->
    @seoAutoPage

    <link rel="stylesheet" href="{{ asset('static/frontend/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('static/frontend/assets/css/style.css') }}" />

    <!-- Styles -->
    @livewireStyles
    @stack('styles')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YC4GW05WHR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-YC4GW05WHR');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NDB6T39B');
    </script>
    <!-- End Google Tag Manager -->
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
                <div class="footer-col footer-company">

                    <h4 itemprop="name">Areia Soft</h4>

                    <p itemprop="description">
                        Areia Soft is a software development company building custom
                        software, websites, web applications, ERP, CRM, SaaS and
                        eCommerce solutions for businesses worldwide.
                    </p>

                    <p>
                        We combine thoughtful design, modern technology and
                        business-focused engineering to create scalable digital
                        solutions that help organizations grow.
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
                        <a href="https://www.facebook.com/areiasoft" aria-label="Facebook" target="_blank">F</a>
                        <a href="https://www.linkedin.com/company/areiasoft" aria-label="LinkedIn"
                            target="_blank">🔗</a>
                        <a href="https://twitter.com/areiasoft" aria-label="Twitter" target="_blank">𝕏</a>
                        <a href="https://www.instagram.com/areiasoft" aria-label="Instagram" target="_blank">📷</a>
                        <a href="https://github.com/areiasoft" aria-label="GitHub" target="_blank">🐙</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <span>&copy; 2026 Areia Soft. All rights reserved.</span>
                <span>Head Office: Sector 12, Uttara, Dhaka - 1230</span>
            </div>
        </footer>
    </div>

    @include('layouts.partials.whatsapp')

    <script src="https://cdn.jsdelivr.net/npm/three@0.157.0/build/three.min.js"></script>
    <script src="{{ asset('static/frontend/assets/js/globee.js') }}"></script>
    <script src="{{ asset('static/frontend/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    @livewireScripts
    @stack('scripts')

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NDB6T39B" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>
