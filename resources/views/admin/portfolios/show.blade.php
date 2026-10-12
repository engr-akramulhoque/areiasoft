<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 py-6">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 flex items-center gap-2">
                    <span class="inline-flex items-center rounded-full bg-cyan-50 px-3 py-1 text-xs font-semibold text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300">
                        <i class="bi bi-briefcase me-1"></i>
                        Portfolio
                    </span>
                    <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                        Details
                    </span>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $portfolio->title }}
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    View complete portfolio project information.
                </p>
            </div>

            <div class="flex items-center gap-2">
                @can('edit_work')
                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-cyan-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-cyan-700">
                        <i class="bi bi-pencil-square"></i>
                        Edit Portfolio
                    </a>
                @endcan

                <a href="{{ route('admin.portfolios.index') }}"
                   class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <div class="space-y-6 lg:col-span-2">
                <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-50 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400">
                                <i class="bi bi-image text-lg"></i>
                            </div>
                            <div>
                                <h2 class="font-semibold text-gray-900 dark:text-white">Featured Image</h2>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Project preview image</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-5">
                        @if($portfolio->image)
                            <div class="overflow-hidden rounded-xl border border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-900">
                                <img src="{{ asset('storage/' . $portfolio->image) }}"
                                     alt="{{ $portfolio->title }}"
                                     class="max-h-[500px] w-full object-contain">
                            </div>

                            <div class="mt-3 flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                                <i class="bi bi-file-earmark-image"></i>
                                <span>{{ basename($portfolio->image) }}</span>
                            </div>
                        @else
                            <div class="flex min-h-[300px] items-center justify-center rounded-xl border-2 border-dashed border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-900">
                                <div class="text-center">
                                    <i class="bi bi-image text-4xl text-gray-300 dark:text-gray-600"></i>
                                    <p class="mt-3 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        No featured image available
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-50 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400">
                                <i class="bi bi-file-text text-lg"></i>
                            </div>
                            <div>
                                <h2 class="font-semibold text-gray-900 dark:text-white">Project Information</h2>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Overview and project details</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6 p-5">
                        <div>
                            <label class="mb-2 block text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                Project Title
                            </label>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $portfolio->title }}
                            </p>
                        </div>

                        <div>
                            <label class="mb-2 block text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                Slug
                            </label>
                            <div class="rounded-lg bg-gray-50 px-4 py-3 font-mono text-sm text-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                {{ $portfolio->slug }}
                            </div>
                        </div>

                        @if($portfolio->overview)
                            <div>
                                <label class="mb-2 block text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Overview
                                </label>
                                <p class="whitespace-pre-line leading-7 text-gray-600 dark:text-gray-300">
                                    {{ $portfolio->overview }}
                                </p>
                            </div>
                        @endif

                        @if($portfolio->url)
                            <div>
                                <label class="mb-2 block text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Project URL
                                </label>

                                <a href="{{ $portfolio->url }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="inline-flex max-w-full items-center gap-2 break-all rounded-lg border border-cyan-200 bg-cyan-50 px-4 py-3 text-sm font-medium text-cyan-700 transition hover:border-cyan-300 hover:bg-cyan-100 dark:border-cyan-900/50 dark:bg-cyan-900/20 dark:text-cyan-300 dark:hover:bg-cyan-900/30">
                                    <i class="bi bi-box-arrow-up-right shrink-0"></i>
                                    {{ $portfolio->url }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                @if(!empty($portfolio->description))
                    <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-50 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400">
                                    <i class="bi bi-code-slash text-lg"></i>
                                </div>
                                <div>
                                    <h2 class="font-semibold text-gray-900 dark:text-white">Project Description</h2>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Detailed project information</p>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio-content p-5 sm:p-7">
                            {!! $portfolio->description !!}
                        </div>
                    </div>
                @endif
            </div>

            <div class="space-y-6">
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-50 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400">
                                <i class="bi bi-sliders text-lg"></i>
                            </div>
                            <div>
                                <h2 class="font-semibold text-gray-900 dark:text-white">Project Settings</h2>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Visibility and classification</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5 p-5">
                        <div>
                            <span class="mb-2 block text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                Status
                            </span>

                            @if($portfolio->status)
                                <span class="inline-flex items-center gap-2 rounded-full bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 dark:bg-red-900/30 dark:text-red-400">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                    Inactive
                                </span>
                            @endif
                        </div>

                        <div>
                            <span class="mb-2 block text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                Featured
                            </span>

                            @if($portfolio->featured)
                                <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">
                                    <i class="bi bi-star-fill"></i>
                                    Featured Project
                                </span>
                            @else
                                <span class="inline-flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                    <i class="bi bi-star"></i>
                                    Standard Project
                                </span>
                            @endif
                        </div>

                        <div>
                            <span class="mb-2 block text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                Sort Order
                            </span>

                            <div class="rounded-lg bg-gray-50 px-4 py-3 text-sm font-semibold text-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                {{ $portfolio->sort_order }}
                            </div>
                        </div>
                    </div>
                </div>

                @if(!empty($portfolio->category))
                    <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-50 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400">
                                    <i class="bi bi-grid text-lg"></i>
                                </div>
                                <div>
                                    <h2 class="font-semibold text-gray-900 dark:text-white">Categories</h2>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Project classifications</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 p-5">
                            @foreach($portfolio->category as $category)
                                <span class="rounded-full border border-cyan-200 bg-cyan-50 px-3 py-1.5 text-xs font-semibold text-cyan-700 dark:border-cyan-900/50 dark:bg-cyan-900/20 dark:text-cyan-300">
                                    {{ ucfirst(str_replace(['-', '_'], ' ', $category)) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if(!empty($portfolio->tags))
                    <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-50 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400">
                                    <i class="bi bi-tags text-lg"></i>
                                </div>
                                <div>
                                    <h2 class="font-semibold text-gray-900 dark:text-white">Tags</h2>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Project technologies and keywords</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 p-5">
                            @foreach($portfolio->tags as $tag)
                                <span class="rounded-full border border-gray-200 bg-gray-50 px-3 py-1.5 text-xs font-medium text-gray-700 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-5 py-4">
                        <h2 class="font-semibold text-gray-900 dark:text-white">Record Information</h2>
                    </div>

                    <div class="space-y-4 p-5">
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Created</span>
                            <span class="text-right text-sm font-medium text-gray-800 dark:text-gray-200">
                                {{ $portfolio->created_at?->format('d M Y, h:i A') }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-sm text-gray-500 dark:text-gray-400">Updated</span>
                            <span class="text-right text-sm font-medium text-gray-800 dark:text-gray-200">
                                {{ $portfolio->updated_at?->format('d M Y, h:i A') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2 sm:flex-row lg:flex-col">
                    @can('edit_work')
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}"
                           class="inline-flex items-center justify-center gap-2 rounded-lg bg-cyan-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-cyan-700">
                            <i class="bi bi-pencil-square"></i>
                            Edit Portfolio
                        </a>
                    @endcan

                    <a href="{{ route('admin.portfolios.index') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                        <i class="bi bi-arrow-left"></i>
                        Back to Portfolios
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .portfolio-content {
                color: #4b5563;
                line-height: 1.8;
            }

            .dark .portfolio-content {
                color: #d1d5db;
            }

            .portfolio-content h1,
            .portfolio-content h2,
            .portfolio-content h3,
            .portfolio-content h4 {
                margin-top: 1.75rem;
                margin-bottom: .75rem;
                font-weight: 700;
                line-height: 1.3;
                color: #111827;
            }

            .dark .portfolio-content h1,
            .dark .portfolio-content h2,
            .dark .portfolio-content h3,
            .dark .portfolio-content h4 {
                color: #fff;
            }

            .portfolio-content h2 {
                font-size: 1.5rem;
            }

            .portfolio-content h3 {
                font-size: 1.25rem;
            }

            .portfolio-content p {
                margin-bottom: 1rem;
            }

            .portfolio-content ul,
            .portfolio-content ol {
                margin: 1rem 0 1.25rem;
                padding-left: 1.5rem;
            }

            .portfolio-content ul {
                list-style: disc;
            }

            .portfolio-content ol {
                list-style: decimal;
            }

            .portfolio-content li {
                margin-bottom: .45rem;
            }

            .portfolio-content a {
                color: #0891b2;
                text-decoration: underline;
                text-underline-offset: 3px;
            }

            .portfolio-content blockquote {
                margin: 1.5rem 0;
                border-left: 4px solid #06b6d4;
                padding: .75rem 1rem;
                background: rgba(6, 182, 212, .06);
                border-radius: 0 .5rem .5rem 0;
            }

            .portfolio-content img {
                max-width: 100%;
                height: auto;
                border-radius: .75rem;
            }

            .portfolio-content table {
                width: 100%;
                margin: 1.5rem 0;
                border-collapse: collapse;
            }

            .portfolio-content th,
            .portfolio-content td {
                border: 1px solid #e5e7eb;
                padding: .75rem;
                text-align: left;
            }

            .dark .portfolio-content th,
            .dark .portfolio-content td {
                border-color: #374151;
            }

            .dark .portfolio-content th {
                background: #111827;
            }

            @media (max-width: 640px) {
                .portfolio-content {
                    font-size: .9375rem;
                }

                .portfolio-content h2 {
                    font-size: 1.3rem;
                }

                .portfolio-content h3 {
                    font-size: 1.15rem;
                }
            }
        </style>
    @endpush
</x-app-layout>