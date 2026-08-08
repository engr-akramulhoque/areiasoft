@php
    $methodology = [
        'label' => 'How We Work',
        'title' => 'From Idea to Digital Success',
        'steps' => [
            [
                'number' => '01',
                'title' => 'Discovery & Planning',
                'description' =>
                    'We begin by understanding your business goals, challenges, and requirements to create a clear project roadmap.',
            ],
            [
                'number' => '02',
                'title' => 'Design & Development',
                'description' =>
                    'Our team designs intuitive user experiences and develops secure, scalable websites and software using modern technologies.',
            ],
            [
                'number' => '03',
                'title' => 'Testing & Quality Assurance',
                'description' =>
                    'Every solution is thoroughly tested to ensure performance, security, compatibility, and a seamless user experience.',
            ],
            [
                'number' => '04',
                'title' => 'Deployment & Ongoing Support',
                'description' =>
                    'After a successful launch, we provide continuous maintenance, updates, and technical support to keep your business running smoothly.',
            ],
        ],
    ];
@endphp

<section class="methodology-section" id="methodology">
    <p class="section-label">{{ $methodology['label'] }}</p>

    <h2 class="section-title">
        {{ $methodology['title'] }}
    </h2>

    <div class="methodology-steps">
        @foreach ($methodology['steps'] as $step)
            <div class="step-card">
                <div class="step-number">{{ $step['number'] }}</div>

                <div class="step-content">
                    <h3>{{ $step['title'] }}</h3>

                    <p>{{ $step['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
