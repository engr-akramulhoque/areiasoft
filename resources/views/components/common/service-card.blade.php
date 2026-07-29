@php
    $services = [
        [
            'title' => 'Website Development',
            'description' =>
                'Fast, responsive, and SEO-friendly websites that enhance your online presence and drive business growth.',
            'icon' => '
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="14" rx="2"/>
                    <line x1="3" y1="8" x2="21" y2="8"/>
                    <circle cx="6" cy="6" r="0.8"/>
                    <circle cx="9" cy="6" r="0.8"/>
                    <circle cx="12" cy="6" r="0.8"/>
                </svg>',
        ],
        [
            'title' => 'Custom Software Development',
            'description' =>
                'Tailor-made software solutions that automate workflows, improve productivity, and scale with your business.',
            'icon' => '
                <svg viewBox="0 0 24 24">
                    <polyline points="8,8 4,12 8,16"/>
                    <polyline points="16,8 20,12 16,16"/>
                    <line x1="13" y1="5" x2="11" y2="19"/>
                </svg>',
        ],
        [
            'title' => 'Web Application Development',
            'description' =>
                'Secure, scalable web applications built for performance, reliability, and exceptional user experiences.',
            'icon' => '
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9"/>
                    <ellipse cx="12" cy="12" rx="4" ry="9"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <path d="M5 7h14M5 17h14"/>
                </svg>',
        ],
        [
            'title' => 'Mobile App Development',
            'description' =>
                'Native and cross-platform mobile apps that keep your business connected anytime, anywhere.',
            'icon' => '
                <svg viewBox="0 0 24 24">
                    <rect x="7" y="2.5" width="10" height="19" rx="2"/>
                    <line x1="10" y1="5" x2="14" y2="5"/>
                    <circle cx="12" cy="18" r="0.8"/>
                </svg>',
        ],
        [
            'title' => 'ERP & CRM Solutions',
            'description' =>
                'Integrated business management systems that streamline operations and strengthen customer relationships.',
            'icon' => '
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="4" width="7" height="7"/>
                    <rect x="14" y="4" width="7" height="7"/>
                    <rect x="8.5" y="14" width="7" height="7"/>
                    <line x1="10" y1="7.5" x2="14" y2="7.5"/>
                    <line x1="12" y1="11" x2="12" y2="14"/>
                </svg>',
        ],
        [
            'title' => 'eCommerce Development',
            'description' =>
                'Powerful online stores with secure payments, inventory management, and seamless shopping experiences.',
            'icon' => '
                <svg viewBox="0 0 24 24">
                    <circle cx="9" cy="19" r="1.5"/>
                    <circle cx="17" cy="19" r="1.5"/>
                    <path d="M4 5h2l2 10h10l2-7H7"/>
                </svg>',
        ],
        [
            'title' => 'UI/UX Design',
            'description' =>
                'Beautiful, intuitive interfaces designed to improve usability, engagement, and customer satisfaction.',
            'icon' => '
                <svg viewBox="0 0 24 24">
                    <path d="M12 3l7 4v10l-7 4-7-4V7z"/>
                    <circle cx="12" cy="12" r="2.5"/>
                </svg>',
        ],
        [
            'title' => 'AI & Automation Solutions',
            'description' =>
                'AI-powered software and intelligent automation that optimize operations and accelerate business innovation.',
            'icon' => '
                <svg viewBox="0 0 24 24">
                    <rect x="7" y="7" width="10" height="10" rx="2"/>
                    <circle cx="10" cy="11" r="1"/>
                    <circle cx="14" cy="11" r="1"/>
                    <path d="M10 14c1 .8 3 .8 4 0"/>
                    <line x1="12" y1="2" x2="12" y2="5"/>
                    <line x1="12" y1="19" x2="12" y2="22"/>
                    <line x1="2" y1="12" x2="5" y2="12"/>
                    <line x1="19" y1="12" x2="22" y2="12"/>
                </svg>',
        ],
        [
            'title' => 'Cloud & DevOps Solutions',
            'description' =>
                'Modern cloud infrastructure, CI/CD pipelines, containerization, and DevOps practices for secure, scalable, and reliable deployments.',
            'icon' => '
        <svg viewBox="0 0 24 24">
            <path d="M7 18h10a4 4 0 0 0 .6-8A6 6 0 0 0 6.3 8.7 4 4 0 0 0 7 18z"/>
            <polyline points="10,12 12,10 14,12"/>
            <line x1="12" y1="10" x2="12" y2="16"/>
        </svg>',
        ],
        [
            'title' => 'API Development & Integration',
            'description' =>
                'Connect your software with payment gateways, third-party services, and enterprise platforms through secure API integrations.',
            'icon' => '
        <svg viewBox="0 0 24 24">
            <path d="M8 8l-4 4 4 4"/>
            <path d="M16 8l4 4-4 4"/>
            <line x1="13" y1="5" x2="11" y2="19"/>
        </svg>',
        ],
        [
            'title' => 'Software Maintenance & Support',
            'description' =>
                'Keep your applications secure, optimized, and up to date with proactive maintenance, monitoring, and technical support.',
            'icon' => '
        <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="3"/>
            <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.2a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.2a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3h0A1.7 1.7 0 0 0 10 3.2V3a2 2 0 1 1 4 0v.2a1.7 1.7 0 0 0 1 1.5h0a1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8v0a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.2a1.7 1.7 0 0 0-1.4 1z"/>
        </svg>',
        ],
        [
            'title' => 'Digital Transformation',
            'description' =>
                'Modernize business operations with innovative digital solutions, workflow automation, and technology consulting tailored to your goals.',
            'icon' => '
        <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"/>
            <path d="M12 7v5l3 3"/>
            <path d="M8 4l4-2 4 2"/>
        </svg>',
        ],
    ];
@endphp

@foreach ($services as $service)
    <div class="service-card">
        <div class="card-icon">
            {!! $service['icon'] !!}
        </div>

        <h3>{{ $service['title'] }}</h3>

        <p>{{ $service['description'] }}</p>

        <div class="card-glow-line"></div>
    </div>
@endforeach
