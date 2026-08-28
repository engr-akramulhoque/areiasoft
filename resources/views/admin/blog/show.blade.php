<x-app-layout>

    <div class="container mx-auto px-4 py-6">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

            <div class="min-w-0">

                <div class="flex items-center gap-2 mb-2">

                    <span
                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">

                        <i class="bi bi-journal-text"></i>

                        Blog Post

                    </span>

                    @if ($blog->status === 'published')
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">

                            <i class="bi bi-check-circle-fill"></i>

                            Published

                        </span>
                    @else
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">

                            <i class="bi bi-file-earmark-text"></i>

                            Draft

                        </span>
                    @endif

                </div>

                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-gray-100 break-words">
                    {{ $blog->title }}
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    View blog post details and published content.
                </p>

            </div>

            <div class="flex flex-wrap items-center gap-2">

                <a href="{{ route('admin.blogs.index') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm transition">

                    <i class="bi bi-arrow-left"></i>

                    Back

                </a>

                @can('edit_blog')
                    <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm transition">

                        <i class="bi bi-pencil-square"></i>

                        Edit

                    </a>
                @endcan

            </div>

        </div>


        {{-- Main Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


            {{-- Article --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Featured Image --}}
                @if ($blog->featured_image)
                    <div
                        class="overflow-hidden rounded-xl bg-white dark:bg-gray-800 shadow border border-gray-200 dark:border-gray-700">

                        <div class="blog-featured-image">

                            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                                loading="lazy">

                        </div>

                    </div>
                @endif


                {{-- Article Content --}}
                <article
                    class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 overflow-hidden">

                    <div class="p-5 sm:p-7">

                        {{-- Article Meta --}}
                        <div
                            class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-gray-500 dark:text-gray-400 mb-5">

                            @if ($blog->category)
                                <div class="inline-flex items-center gap-1.5">

                                    <i class="bi bi-folder2-open text-blue-500"></i>

                                    <span class="font-medium text-gray-700 dark:text-gray-300">
                                        {{ $blog->category->name }}
                                    </span>

                                </div>
                            @endif

                            @if ($blog->published_at)
                                <div class="inline-flex items-center gap-1.5">

                                    <i class="bi bi-calendar3"></i>

                                    <span>
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') }}
                                    </span>

                                </div>

                                <div class="inline-flex items-center gap-1.5">

                                    <i class="bi bi-clock"></i>

                                    <span>
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('h:i A') }}
                                    </span>

                                </div>
                            @endif

                        </div>


                        {{-- Title --}}
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-gray-100 leading-tight">

                            {{ $blog->title }}

                        </h2>


                        {{-- Excerpt --}}
                        @if ($blog->excerpt)
                            <div
                                class="mt-5 p-4 rounded-lg bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700">

                                <p class="text-sm sm:text-base leading-7 text-gray-600 dark:text-gray-300">

                                    {{ $blog->excerpt }}

                                </p>

                            </div>
                        @endif


                        {{-- Divider --}}
                        <div class="my-6 border-t border-gray-200 dark:border-gray-700"></div>


                        {{-- Content --}}
                        <div class="blog-content">

                            {!! $blog->content !!}

                        </div>

                    </div>

                </article>

            </div>


            {{-- Sidebar --}}
            <aside class="lg:col-span-1 space-y-6">


                {{-- Publication Card --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 overflow-hidden">

                    <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-700">

                        <h3 class="font-semibold text-gray-900 dark:text-gray-100">
                            Publication Details
                        </h3>

                    </div>

                    <div class="p-5 space-y-4">

                        {{-- Status --}}
                        <div class="flex items-center justify-between gap-3">

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg
                                {{ $blog->status === 'published'
                                    ? 'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400'
                                    : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300' }}">

                                    <i
                                        class="bi {{ $blog->status === 'published' ? 'bi-check-circle-fill' : 'bi-file-earmark-text' }}"></i>

                                </div>

                                <div>

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Status
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">

                                        {{ ucfirst($blog->status) }}

                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Category --}}
                        @if ($blog->category)
                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">

                                    <i class="bi bi-folder2-open"></i>

                                </div>

                                <div class="min-w-0">

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Category
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate">
                                        {{ $blog->category->name }}
                                    </p>

                                </div>

                            </div>
                        @endif


                        {{-- Published Date --}}
                        @if ($blog->published_at)
                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">

                                    <i class="bi bi-calendar-event"></i>

                                </div>

                                <div>

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Published At
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">

                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y h:i A') }}

                                    </p>

                                </div>

                            </div>
                        @endif


                        {{-- Created --}}
                        @if ($blog->created_at)
                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">

                                    <i class="bi bi-clock-history"></i>

                                </div>

                                <div>

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Created
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">

                                        {{ $blog->created_at->format('M d, Y h:i A') }}

                                    </p>

                                </div>

                            </div>
                        @endif


                        {{-- Updated --}}
                        @if ($blog->updated_at)
                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-orange-100 text-orange-600 dark:bg-orange-900/30 dark:text-orange-400">

                                    <i class="bi bi-arrow-repeat"></i>

                                </div>

                                <div>

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Last Updated
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">

                                        {{ $blog->updated_at->format('M d, Y h:i A') }}

                                    </p>

                                </div>

                            </div>
                        @endif

                    </div>

                </div>


                {{-- Blog Information --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 overflow-hidden">

                    <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-700">

                        <h3 class="font-semibold text-gray-900 dark:text-gray-100">
                            Blog Information
                        </h3>

                    </div>

                    <div class="p-5 space-y-4">

                        {{-- Slug --}}
                        <div>

                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">
                                Slug
                            </p>

                            <div class="flex items-center gap-2">

                                <div
                                    class="min-w-0 flex-1 rounded-lg bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 px-3 py-2">

                                    <p class="text-sm text-gray-700 dark:text-gray-300 break-all">
                                        {{ $blog->slug }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Category --}}
                        @if ($blog->category)
                            <div>

                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    Category
                                </p>

                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $blog->category->name }}
                                </p>

                            </div>
                        @endif

                    </div>

                </div>


                {{-- Actions --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-200 dark:border-gray-700 p-5">

                    <div class="flex flex-col gap-2">

                        @can('edit_blog')
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                class="inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm font-medium transition">

                                <i class="bi bi-pencil-square"></i>

                                Edit Blog Post

                            </a>
                        @endcan

                        @can('delete_blog')
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this blog post?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm font-medium transition">

                                    <i class="bi bi-trash3"></i>

                                    Delete Blog Post

                                </button>

                            </form>
                        @endcan

                    </div>

                </div>

            </aside>

        </div>

    </div>


    @push('styles')
        <style>
            /* ==========================================
                   FEATURED IMAGE
                ========================================== */

            .blog-featured-image {
                width: 100%;
                height: 360px;
                overflow: hidden;
                background: #f3f4f6;
            }

            .dark .blog-featured-image {
                background: #111827;
            }

            .blog-featured-image img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }


            /* ==========================================
                   BLOG CONTENT
                ========================================== */

            .blog-content {
                color: #374151;
                font-size: 16px;
                line-height: 1.85;
                overflow-wrap: break-word;
                word-break: normal;
            }

            .dark .blog-content {
                color: #d1d5db;
            }

            .blog-content p {
                margin-top: 0;
                margin-bottom: 1.25rem;
            }

            .blog-content h1,
            .blog-content h2,
            .blog-content h3,
            .blog-content h4 {
                color: #111827;
                font-weight: 700;
                line-height: 1.3;
                margin-top: 2rem;
                margin-bottom: 1rem;
            }

            .dark .blog-content h1,
            .dark .blog-content h2,
            .dark .blog-content h3,
            .dark .blog-content h4 {
                color: #f3f4f6;
            }

            .blog-content h1 {
                font-size: 2rem;
            }

            .blog-content h2 {
                font-size: 1.65rem;
            }

            .blog-content h3 {
                font-size: 1.35rem;
            }

            .blog-content h4 {
                font-size: 1.15rem;
            }

            .blog-content ul,
            .blog-content ol {
                margin-top: 1rem;
                margin-bottom: 1.25rem;
                padding-left: 1.75rem;
            }

            .blog-content ul {
                list-style-type: disc;
            }

            .blog-content ol {
                list-style-type: decimal;
            }

            .blog-content li {
                margin-bottom: 0.5rem;
            }

            .blog-content a {
                color: #2563eb;
                text-decoration: underline;
                text-underline-offset: 2px;
            }

            .dark .blog-content a {
                color: #60a5fa;
            }

            .blog-content blockquote {
                margin: 1.5rem 0;
                padding: 1rem 1.25rem;
                border-left: 4px solid #3b82f6;
                background: #f3f4f6;
                color: #4b5563;
                border-radius: 0 0.5rem 0.5rem 0;
            }

            .dark .blog-content blockquote {
                background: #1f2937;
                color: #d1d5db;
            }

            .blog-content table {
                width: 100%;
                margin: 1.5rem 0;
                border-collapse: collapse;
                overflow: hidden;
                border-radius: 0.5rem;
            }

            .blog-content th,
            .blog-content td {
                border: 1px solid #d1d5db;
                padding: 0.75rem;
                text-align: left;
            }

            .dark .blog-content th,
            .dark .blog-content td {
                border-color: #374151;
            }

            .blog-content th {
                background: #f3f4f6;
                font-weight: 600;
            }

            .dark .blog-content th {
                background: #1f2937;
            }

            .blog-content img {
                display: block;
                max-width: 100%;
                height: auto;
                margin: 1.5rem auto;
                border-radius: 0.75rem;
            }

            .blog-content figure {
                margin: 1.5rem 0;
            }

            .blog-content figcaption {
                margin-top: 0.5rem;
                text-align: center;
                font-size: 0.875rem;
                color: #6b7280;
            }


            /* ==========================================
                   RESPONSIVE
                ========================================== */

            @media (max-width: 640px) {

                .blog-featured-image {
                    height: 240px;
                }

                .blog-content {
                    font-size: 15px;
                    line-height: 1.75;
                }

                .blog-content h1 {
                    font-size: 1.6rem;
                }

                .blog-content h2 {
                    font-size: 1.4rem;
                }

                .blog-content h3 {
                    font-size: 1.2rem;
                }

                .blog-content table {
                    display: block;
                    overflow-x: auto;
                    white-space: nowrap;
                }

            }
        </style>
    @endpush

</x-app-layout>
