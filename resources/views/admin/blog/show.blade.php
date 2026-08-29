<x-app-layout>

    <div class="container mx-auto px-4 py-6">

        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                <div class="min-w-0">

                    <div class="mb-2 flex flex-wrap items-center gap-2">

                        <span
                            class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                            <i class="bi bi-journal-text"></i>
                            Blog Post
                        </span>

                        @if ($blog->status === 'published')
                            <span
                                class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700 dark:bg-green-900/20 dark:text-green-300">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                Published
                            </span>
                        @else
                            <span
                                class="inline-flex items-center gap-1.5 rounded-full bg-yellow-50 px-2.5 py-1 text-xs font-semibold text-yellow-700 dark:bg-yellow-900/20 dark:text-yellow-300">
                                <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>
                                Draft
                            </span>
                        @endif

                    </div>

                    <h1
                        class="max-w-4xl break-words text-2xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-3xl">
                        {{ $blog->title }}
                    </h1>

                    <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400">
                        View and manage your blog post content and publication details.
                    </p>

                </div>

                <div class="flex flex-wrap items-center gap-2">

                    <a href="{{ route('admin.blogs.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        <i class="bi bi-arrow-left"></i>
                        Back
                    </a>

                    @can('edit_blog')
                        <a href="{{ route('admin.blogs.edit', $blog) }}"
                            class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>
                    @endcan

                </div>

            </div>
        </div>


        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">


            <main class="min-w-0 space-y-6 lg:col-span-2">


                @if ($blog->featured_image)
                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="blog-featured-image">

                            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                                loading="lazy">

                        </div>

                    </div>
                @endif


                <article
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                    <div class="p-5 sm:p-7">


                        <div class="mb-5 flex flex-wrap items-center gap-2">

                            @if ($blog->category)
                                <div class="inline-flex items-center gap-2 text-sm text-gray-600 dark:text-gray-300">

                                    <span
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                        <i class="bi bi-folder2-open"></i>
                                    </span>

                                    <span class="font-medium">
                                        {{ $blog->category->name }}
                                    </span>

                                </div>
                            @endif

                            @if ($blog->published_at)
                                <div class="inline-flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">

                                    <i class="bi bi-calendar3"></i>

                                    <span>
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                                    </span>

                                </div>

                                <div class="inline-flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">

                                    <i class="bi bi-clock"></i>

                                    <span>
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('h:i A') }}
                                    </span>

                                </div>
                            @endif

                        </div>


                        <h2
                            class="break-words text-2xl font-bold leading-tight text-gray-900 dark:text-white sm:text-3xl">
                            {{ $blog->title }}
                        </h2>


                        @if ($blog->excerpt)
                            <div
                                class="mt-5 rounded-xl border border-blue-100 bg-blue-50/60 px-4 py-4 dark:border-blue-900/40 dark:bg-blue-900/10">

                                <div class="flex gap-3">

                                    <div
                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                        <i class="bi bi-quote"></i>
                                    </div>

                                    <p class="text-sm leading-6 text-gray-600 dark:text-gray-300 sm:text-base">
                                        {{ $blog->excerpt }}
                                    </p>

                                </div>

                            </div>
                        @endif


                        <div class="my-7 border-t border-gray-200 dark:border-gray-700"></div>


                        <div class="blog-content">
                            {!! $blog->content !!}
                        </div>

                    </div>

                </article>


                @canany(['edit_blog', 'delete_blog'])
                    <div
                        class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                            <div>
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                    Manage Blog Post
                                </h3>

                                <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                    Update or remove this blog post.
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-2">

                                @can('edit_blog')
                                    <a href="{{ route('admin.blogs.edit', $blog) }}"
                                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                                        <i class="bi bi-pencil-square"></i>
                                        Edit Post
                                    </a>
                                @endcan

                                @can('delete_blog')
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST"
                                        class="delete-blog-form">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 transition hover:bg-red-100 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40">
                                            <i class="bi bi-trash3"></i>
                                            Delete
                                        </button>

                                    </form>
                                @endcan

                            </div>

                        </div>

                    </div>
                @endcanany

            </main>


            <aside class="space-y-6">


                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800 px-4">

                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                        <div class="flex items-center gap-2">

                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                <i class="bi bi-info-circle"></i>
                            </div>

                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                Publication Details
                            </h3>

                        </div>

                    </div>

                    <div class="divide-y divide-gray-100 dark:divide-gray-700">


                        <div class="flex items-center gap-3 px-5 py-4">

                            <div
                                class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg
                            {{ $blog->status === 'published'
                                ? 'bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400'
                                : 'bg-yellow-100 text-yellow-600 dark:bg-yellow-900/30 dark:text-yellow-400' }}">

                                <i
                                    class="bi {{ $blog->status === 'published' ? 'bi-check-circle-fill' : 'bi-file-earmark-text' }}"></i>

                            </div>

                            <div class="min-w-0">

                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Status
                                </p>

                                <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ ucfirst($blog->status) }}
                                </p>

                            </div>

                        </div>


                        @if ($blog->category)
                            <div class="flex items-center gap-3 px-5 py-4">

                                <div
                                    class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                    <i class="bi bi-folder2-open"></i>
                                </div>

                                <div class="min-w-0">

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Category
                                    </p>

                                    <p class="truncate text-sm font-semibold text-gray-900 dark:text-white">
                                        {{ $blog->category->name }}
                                    </p>

                                </div>

                            </div>
                        @endif


                        @if ($blog->published_at)
                            <div class="flex items-center gap-3 px-5 py-4">

                                <div
                                    class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                                    <i class="bi bi-calendar-event"></i>
                                </div>

                                <div class="min-w-0">

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Published
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                                    </p>

                                    <p class="text-xs text-gray-400 dark:text-gray-500">
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('h:i A') }}
                                    </p>

                                </div>

                            </div>
                        @endif


                        @if ($blog->created_at)
                            <div class="flex items-center gap-3 px-5 py-4">

                                <div
                                    class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                    <i class="bi bi-clock-history"></i>
                                </div>

                                <div class="min-w-0">

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Created
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                        {{ $blog->created_at->format('d M Y') }}
                                    </p>

                                    <p class="text-xs text-gray-400 dark:text-gray-500">
                                        {{ $blog->created_at->diffForHumans() }}
                                    </p>

                                </div>

                            </div>
                        @endif


                        @if ($blog->updated_at)
                            <div class="flex items-center gap-3 px-5 py-4">

                                <div
                                    class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-orange-100 text-orange-600 dark:bg-orange-900/30 dark:text-orange-400">
                                    <i class="bi bi-arrow-repeat"></i>
                                </div>

                                <div class="min-w-0">

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Updated
                                    </p>

                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">
                                        {{ $blog->updated_at->format('d M Y') }}
                                    </p>

                                    <p class="text-xs text-gray-400 dark:text-gray-500">
                                        {{ $blog->updated_at->diffForHumans() }}
                                    </p>

                                </div>

                            </div>
                        @endif

                    </div>

                </div>


                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                        <div class="flex items-center gap-2 px-4">

                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                <i class="bi bi-file-text"></i>
                            </div>

                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                Blog Information
                            </h3>

                        </div>

                    </div>

                    <div class="space-y-4 p-5">


                        <div>

                            <p class="mb-1.5 text-xs font-medium text-gray-500 dark:text-gray-400">
                                Slug
                            </p>

                            <div
                                class="rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 dark:border-gray-700 dark:bg-gray-900">

                                <p class="break-all text-xs leading-5 text-gray-600 dark:text-gray-300">
                                    {{ $blog->slug }}
                                </p>

                            </div>

                        </div>


                        @if ($blog->category)
                            <div>

                                <p class="mb-1.5 text-xs font-medium text-gray-500 dark:text-gray-400">
                                    Category
                                </p>

                                <div class="flex items-center gap-2">

                                    <span
                                        class="flex h-7 w-7 items-center justify-center rounded-md bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                        <i class="bi bi-folder2-open text-xs"></i>
                                    </span>

                                    <span class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $blog->category->name }}
                                    </span>

                                </div>

                            </div>
                        @endif


                        <div>

                            <p class="mb-1.5 text-xs font-medium text-gray-500 dark:text-gray-400">
                                Post ID
                            </p>

                            <code
                                class="inline-flex rounded-md bg-gray-100 px-2.5 py-1 text-xs text-gray-600 dark:bg-gray-900 dark:text-gray-400">
                                #{{ $blog->id }}
                            </code>

                        </div>

                    </div>

                </div>


                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                        <div class="flex items-center gap-2 px-4">

                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                                <i class="bi bi-bar-chart"></i>
                            </div>

                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                Post Overview
                            </h3>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 divide-x divide-gray-100 dark:divide-gray-700">

                        <div class="px-4 py-4 text-center">

                            <div class="text-lg font-bold text-gray-900 dark:text-white">
                                {{ $blog->comments_count ?? $blog->comments()->count() }}
                            </div>

                            <div class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Comments
                            </div>

                        </div>

                        <div class="px-4 py-4 text-center">

                            <div class="text-lg font-bold text-gray-900 dark:text-white">
                                {{ str_word_count(strip_tags($blog->content)) }}
                            </div>

                            <div class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Words
                            </div>

                        </div>

                    </div>

                </div>


                <div
                    class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">

                    <div class="flex flex-col gap-2">

                        @can('edit_blog')
                            <a href="{{ route('admin.blogs.edit', $blog) }}"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                                <i class="bi bi-pencil-square"></i>
                                Edit Blog Post
                            </a>
                        @endcan

                        <a href="{{ route('admin.blogs.index') }}"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                            <i class="bi bi-list-ul"></i>
                            All Blog Posts
                        </a>

                    </div>

                </div>

            </aside>

        </div>

    </div>


    @push('styles')
        <style>
            .blog-featured-image {
                width: 100%;
                aspect-ratio: 16 / 8;
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
            .blog-content h4,
            .blog-content h5,
            .blog-content h6 {
                color: #111827;
                font-weight: 700;
                line-height: 1.3;
                margin-top: 2rem;
                margin-bottom: 1rem;
            }

            .dark .blog-content h1,
            .dark .blog-content h2,
            .dark .blog-content h3,
            .dark .blog-content h4,
            .dark .blog-content h5,
            .dark .blog-content h6 {
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


            .blog-content pre {
                max-width: 100%;
                overflow-x: auto;
                margin: 1.5rem 0;
                padding: 1rem 1.25rem;
                border-radius: 0.75rem;
                background: #111827;
                color: #e5e7eb;
                font-size: 0.875rem;
                line-height: 1.6;
            }


            .blog-content code {
                overflow-wrap: break-word;
            }


            .blog-content table {
                width: 100%;
                margin: 1.5rem 0;
                border-collapse: collapse;
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
                max-width: 100%;
                margin: 1.5rem 0;
            }

            .blog-content figcaption {
                margin-top: 0.5rem;
                text-align: center;
                font-size: 0.875rem;
                color: #6b7280;
            }


            .blog-content iframe,
            .blog-content video {
                display: block;
                max-width: 100%;
                margin: 1.5rem auto;
                border-radius: 0.75rem;
            }


            .blog-content hr {
                margin: 2rem 0;
                border: 0;
                border-top: 1px solid #e5e7eb;
            }

            .dark .blog-content hr {
                border-color: #374151;
            }


            @media (max-width: 640px) {

                .blog-featured-image {
                    aspect-ratio: 16 / 10;
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

                .blog-content h4 {
                    font-size: 1.05rem;
                }

                .blog-content table {
                    display: block;
                    overflow-x: auto;
                    white-space: nowrap;
                }

            }
        </style>
    @endpush


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                document.querySelectorAll('.delete-blog-form').forEach(function(form) {

                    form.addEventListener('submit', function(event) {

                        const confirmed = confirm(
                            'Are you sure you want to delete this blog post? This action cannot be undone.'
                        );

                        if (!confirmed) {
                            event.preventDefault();
                        }

                    });

                });

            });
        </script>
    @endpush

</x-app-layout>
