<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">
                        <i class="bi bi-search"></i>
                        SEO Landing Page
                    </span>

                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                        <i class="bi bi-eye"></i>
                        Preview
                    </span>
                </div>

                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $page->title }}
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Review landing page content and configuration.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('admin.seo-landing-pages.index') }}"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>

                @can('edit_landing_page')
                    <a href="{{ route('admin.seo-landing-pages.edit', $page) }}"
                        class="inline-flex items-center gap-2 rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-white transition hover:opacity-90">
                        <i class="bi bi-pencil-square"></i>
                        Edit
                    </a>
                @endcan
            </div>
        </div>
    </x-slot>

    @php
        $trustPoints = $page->trust_points ?? [];
        $problem = $page->problem ?? [];
        $solution = $page->solution ?? [];
        $capabilities = $page->capabilities ?? [];
        $process = $page->process ?? [];
        $technologies = $page->technologies ?? [];
        $benefits = $page->benefits ?? [];
        $faqs = $page->faqs ?? [];
        $relatedPages = $page->related_pages ?? [];
    @endphp

    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <div class="space-y-6 lg:col-span-2">

                    <div
                        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                        <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                    <i class="bi bi-info-circle text-lg"></i>
                                </div>

                                <div>
                                    <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                        Basic Information
                                    </h2>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        General landing page information.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">
                            <div>
                                <p
                                    class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Title
                                </p>
                                <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $page->title }}
                                </p>
                            </div>

                            <div>
                                <p
                                    class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Slug
                                </p>
                                <p class="mt-1 break-all text-sm text-gray-700 dark:text-gray-300">
                                    /{{ $page->slug }}
                                </p>
                            </div>

                            @if ($page->eyebrow)
                                <div class="md:col-span-2">
                                    <p
                                        class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                        Eyebrow
                                    </p>
                                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                        {{ $page->eyebrow }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div
                        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                        <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                    <i class="bi bi-image text-lg"></i>
                                </div>

                                <div>
                                    <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                        Hero Section
                                    </h2>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Main landing page introduction.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6 p-6">
                            <div>
                                <p
                                    class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Hero Title
                                </p>
                                <h3 class="mt-2 text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $page->hero_title }}
                                </h3>
                            </div>

                            @if ($page->hero_description)
                                <div>
                                    <p
                                        class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                        Hero Description
                                    </p>
                                    <p
                                        class="mt-2 whitespace-pre-line text-sm leading-7 text-gray-600 dark:text-gray-300">
                                        {{ $page->hero_description }}
                                    </p>
                                </div>
                            @endif

                            @if ($page->hero_image)
                                <div>
                                    <p
                                        class="mb-2 text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                        Hero Image
                                    </p>

                                    <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700">
                                        <img src="{{ asset($page->hero_image) }}" alt="{{ $page->hero_title }}"
                                            class="h-auto max-h-80 w-full object-cover">
                                    </div>

                                    <p class="mt-2 break-all text-xs text-gray-500 dark:text-gray-400">
                                        {{ $page->hero_image }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if ($page->primary_cta || $page->secondary_cta || count($trustPoints))
                        <div
                            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                        <i class="bi bi-megaphone text-lg"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                            CTA & Trust Points
                                        </h2>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Conversion actions and trust indicators.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6 p-6">
                                @if ($page->primary_cta || $page->primary_cta_url)
                                    <div class="rounded-xl border border-gray-200 p-4 dark:border-gray-700">
                                        <p
                                            class="mb-3 text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            Primary CTA
                                        </p>

                                        <div class="flex flex-wrap items-center gap-3">
                                            @if ($page->primary_cta)
                                                <span
                                                    class="rounded-lg bg-primary px-3 py-2 text-sm font-semibold text-white">
                                                    {{ $page->primary_cta }}
                                                </span>
                                            @endif

                                            @if ($page->primary_cta_url)
                                                <span class="break-all text-sm text-gray-600 dark:text-gray-300">
                                                    {{ $page->primary_cta_url }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if ($page->secondary_cta || $page->secondary_cta_url)
                                    <div class="rounded-xl border border-gray-200 p-4 dark:border-gray-700">
                                        <p
                                            class="mb-3 text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            Secondary CTA
                                        </p>

                                        <div class="flex flex-wrap items-center gap-3">
                                            @if ($page->secondary_cta)
                                                <span
                                                    class="rounded-lg border border-gray-300 px-3 py-2 text-sm font-semibold text-gray-700 dark:border-gray-600 dark:text-gray-200">
                                                    {{ $page->secondary_cta }}
                                                </span>
                                            @endif

                                            @if ($page->secondary_cta_url)
                                                <span class="break-all text-sm text-gray-600 dark:text-gray-300">
                                                    {{ $page->secondary_cta_url }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if (count($trustPoints))
                                    <div>
                                        <p
                                            class="mb-3 text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            Trust Points
                                        </p>

                                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                                            @foreach ($trustPoints as $point)
                                                @if ($point)
                                                    <div
                                                        class="flex items-start gap-2 rounded-lg bg-gray-50 p-3 dark:bg-gray-800">
                                                        <i class="bi bi-check-circle-fill mt-0.5 text-primary"></i>
                                                        <span class="text-sm text-gray-700 dark:text-gray-300">
                                                            {{ $point }}
                                                        </span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if ($problem)
                        <div
                            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-50 text-red-600 dark:bg-red-500/10 dark:text-red-400">
                                        <i class="bi bi-exclamation-circle text-lg"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                            Problem Section
                                        </h2>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Customer problems addressed by the service.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-5 p-6">
                                @if (!empty($problem['title']))
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                                        {{ $problem['title'] }}
                                    </h3>
                                @endif

                                @if (!empty($problem['text']))
                                    <p class="whitespace-pre-line text-sm leading-7 text-gray-600 dark:text-gray-300">
                                        {{ $problem['text'] }}
                                    </p>
                                @endif

                                @if (!empty($problem['points']))
                                    <div class="space-y-2">
                                        @foreach ($problem['points'] as $point)
                                            @if ($point)
                                                <div
                                                    class="flex items-start gap-3 rounded-lg bg-gray-50 p-3 dark:bg-gray-800">
                                                    <i class="bi bi-arrow-right-circle mt-0.5 text-primary"></i>
                                                    <span class="text-sm text-gray-700 dark:text-gray-300">
                                                        {{ $point }}
                                                    </span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if ($solution)
                        <div
                            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                        <i class="bi bi-lightbulb text-lg"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                            Solution Section
                                        </h2>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            How your service solves customer problems.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-5 p-6">
                                @if (!empty($solution['title']))
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                                        {{ $solution['title'] }}
                                    </h3>
                                @endif

                                @if (!empty($solution['text']))
                                    <p class="whitespace-pre-line text-sm leading-7 text-gray-600 dark:text-gray-300">
                                        {{ $solution['text'] }}
                                    </p>
                                @endif

                                @if (!empty($solution['points']))
                                    <div class="space-y-2">
                                        @foreach ($solution['points'] as $point)
                                            @if ($point)
                                                <div
                                                    class="flex items-start gap-3 rounded-lg bg-gray-50 p-3 dark:bg-gray-800">
                                                    <i class="bi bi-check2-circle mt-0.5 text-primary"></i>
                                                    <span class="text-sm text-gray-700 dark:text-gray-300">
                                                        {{ $point }}
                                                    </span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if (count($capabilities))
                        <div
                            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                        <i class="bi bi-grid text-lg"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                            Capabilities
                                        </h2>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Key capabilities included in the service.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 p-6 md:grid-cols-2">
                                @foreach ($capabilities as $capability)
                                    @if (is_array($capability))
                                        <div class="rounded-xl border border-gray-200 p-5 dark:border-gray-700">
                                            <div class="flex items-start gap-3">
                                                @if (!empty($capability['icon']))
                                                    <div
                                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 text-primary">
                                                        <i class="{{ $capability['icon'] }} text-lg"></i>
                                                    </div>
                                                @endif

                                                <div class="min-w-0">
                                                    @if (!empty($capability['title']))
                                                        <h3 class="font-semibold text-gray-900 dark:text-white">
                                                            {{ $capability['title'] }}
                                                        </h3>
                                                    @endif

                                                    @if (!empty($capability['text']))
                                                        <p
                                                            class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">
                                                            {{ $capability['text'] }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if (count($process))
                        <div
                            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                        <i class="bi bi-diagram-3 text-lg"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                            Process
                                        </h2>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Delivery process and workflow.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4 p-6">
                                @foreach ($process as $step)
                                    @if (is_array($step))
                                        <div
                                            class="flex gap-4 rounded-xl border border-gray-200 p-5 dark:border-gray-700">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-bold text-white">
                                                {{ $step['number'] ?? $loop->iteration }}
                                            </div>

                                            <div class="min-w-0">
                                                @if (!empty($step['title']))
                                                    <h3 class="font-semibold text-gray-900 dark:text-white">
                                                        {{ $step['title'] }}
                                                    </h3>
                                                @endif

                                                @if (!empty($step['text']))
                                                    <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-300">
                                                        {{ $step['text'] }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if (count($technologies) || count($benefits))
                        <div
                            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                        <i class="bi bi-code-slash text-lg"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                            Technologies & Benefits
                                        </h2>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Technology stack and customer benefits.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6 p-6">
                                @if (count($technologies))
                                    <div>
                                        <p
                                            class="mb-3 text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            Technologies
                                        </p>

                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($technologies as $technology)
                                                @if ($technology)
                                                    <span
                                                        class="rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm font-medium text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                                        {{ $technology }}
                                                    </span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (count($benefits))
                                    <div>
                                        <p
                                            class="mb-3 text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                            Benefits
                                        </p>

                                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                                            @foreach ($benefits as $benefit)
                                                @if ($benefit)
                                                    <div
                                                        class="flex items-start gap-2 rounded-lg bg-gray-50 p-3 dark:bg-gray-800">
                                                        <i class="bi bi-check-lg mt-0.5 text-primary"></i>
                                                        <span class="text-sm text-gray-700 dark:text-gray-300">
                                                            {{ $benefit }}
                                                        </span>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if (count($faqs))
                        <div
                            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                        <i class="bi bi-question-circle text-lg"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                            FAQs
                                        </h2>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Frequently asked questions.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($faqs as $faq)
                                    @if (is_array($faq))
                                        <div class="p-6">
                                            @if (!empty($faq['question']))
                                                <h3 class="font-semibold text-gray-900 dark:text-white">
                                                    {{ $faq['question'] }}
                                                </h3>
                                            @endif

                                            @if (!empty($faq['answer']))
                                                <p
                                                    class="mt-2 whitespace-pre-line text-sm leading-6 text-gray-600 dark:text-gray-300">
                                                    {{ $faq['answer'] }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if (count($relatedPages))
                        <div
                            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                        <i class="bi bi-link-45deg text-lg"></i>
                                    </div>

                                    <div>
                                        <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                            Related Pages
                                        </h2>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Related landing page slugs.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 p-6">
                                @foreach ($relatedPages as $relatedPage)
                                    @if ($relatedPage)
                                        <span
                                            class="rounded-lg bg-gray-50 px-3 py-2 text-sm font-medium text-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                            /{{ $relatedPage }}
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="space-y-6">

                    <div
                        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                        <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                    <i class="bi bi-sliders text-lg"></i>
                                </div>

                                <div>
                                    <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                        Publication Details
                                    </h2>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Page visibility and ordering.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-5 p-6">
                            <div>
                                <p
                                    class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Status
                                </p>

                                <div class="mt-2">
                                    @if ($page->status)
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700 dark:bg-green-500/10 dark:text-green-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Active
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:bg-gray-800 dark:text-gray-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <p
                                    class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Sort Order
                                </p>

                                <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $page->sort_order }}
                                </p>
                            </div>

                            <div>
                                <p
                                    class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Created
                                </p>

                                <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $page->created_at?->format('F d, Y h:i A') }}
                                </p>
                            </div>

                            <div>
                                <p
                                    class="text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Last Updated
                                </p>

                                <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $page->updated_at?->format('F d, Y h:i A') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                        <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
                                    <i class="bi bi-bar-chart text-lg"></i>
                                </div>

                                <div>
                                    <h2 class="text-base font-bold text-gray-900 dark:text-white">
                                        Content Summary
                                    </h2>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Available content sections.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            @php
                                $summary = [
                                    'Trust Points' => count($trustPoints),
                                    'Problem Points' => count($problem['points'] ?? []),
                                    'Solution Points' => count($solution['points'] ?? []),
                                    'Capabilities' => count($capabilities),
                                    'Process Steps' => count($process),
                                    'Technologies' => count($technologies),
                                    'Benefits' => count($benefits),
                                    'FAQs' => count($faqs),
                                    'Related Pages' => count($relatedPages),
                                ];
                            @endphp

                            @foreach ($summary as $label => $count)
                                <div class="flex items-center justify-between px-6 py-3">
                                    <span class="text-sm text-gray-600 dark:text-gray-300">
                                        {{ $label }}
                                    </span>

                                    <span
                                        class="inline-flex min-w-7 items-center justify-center rounded-full bg-gray-100 px-2 py-1 text-xs font-bold text-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                        {{ $count }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div
                        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
                        <div class="p-6">
                            @can('edit_landing_page')
                                <a href="{{ route('admin.seo-landing-pages.edit', $page) }}"
                                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2.5 text-sm font-semibold text-white transition hover:opacity-90">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit Landing Page
                                </a>
                            @endcan

                            <a href="{{ route('admin.seo-landing-pages.index') }}"
                                class="mt-2 flex w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                                <i class="bi bi-arrow-left"></i>
                                Back to Landing Pages
                            </a>

                            @can('delete_landing_page')
                                <form action="{{ route('admin.seo-landing-pages.destroy', $page) }}" method="POST"
                                    class="mt-2"
                                    onsubmit="return confirm('Are you sure you want to delete this landing page?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="flex w-full items-center justify-center gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100 dark:border-red-500/20 dark:bg-red-500/10 dark:text-red-400 dark:hover:bg-red-500/20">
                                        <i class="bi bi-trash"></i>
                                        Delete Landing Page
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
