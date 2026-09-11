<x-app-layout>
    <div class="container mx-auto px-4 py-6">

        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <div class="mb-1 flex items-center gap-2">

                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                            <i class="bi bi-window-stack text-blue-600 dark:text-blue-400"></i>
                        </div>

                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            SEO Landing Pages
                        </h1>

                    </div>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Create, manage and publish SEO-focused landing pages.
                    </p>
                </div>

                @can('create_landing_page')
                    <a href="{{ route('admin.seo-landing-pages.create') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">

                        <i class="bi bi-plus-lg"></i>

                        Add Landing Page
                    </a>
                @endcan

            </div>
        </div>


        {{-- SUCCESS MESSAGE --}}

        @if (session('success'))
            <div
                class="mb-5 flex items-start gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-300">

                <i class="bi bi-check-circle-fill mt-0.5"></i>

                <div class="text-sm font-medium">
                    {{ session('success') }}
                </div>

            </div>
        @endif


        {{-- ERROR MESSAGE --}}

        @if (session('error'))
            <div
                class="mb-5 flex items-start gap-3 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-300">

                <i class="bi bi-exclamation-triangle-fill mt-0.5"></i>

                <div class="text-sm font-medium">
                    {{ session('error') }}
                </div>

            </div>
        @endif


        {{-- TABLE CARD --}}

        <div
            class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

            {{-- TABLE HEADER --}}

            <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                <div class="flex flex-col gap-3 px-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                            All Landing Pages
                        </h2>

                        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                            {{ $pages->total() }}
                            {{ $pages->total() === 1 ? 'page' : 'pages' }}
                            found
                        </p>

                    </div>


                    {{-- SEARCH --}}

                    <div class="relative w-full sm:w-80">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                            <i class="bi bi-search px-3 pt-2 text-gray-400 dark:text-gray-500"></i>
                        </div>

                        <input type="search" id="landingPageSearch" autocomplete="off"
                            placeholder="Search landing pages..."
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 py-2.5 pl-10 pr-10 text-sm text-gray-900 placeholder-gray-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500 dark:focus:border-blue-500 dark:focus:bg-gray-900">

                        <button type="button" id="clearLandingPageSearch"
                            class="absolute inset-y-0 right-0 hidden items-center pr-3 text-gray-400 transition hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300"
                            title="Clear search" aria-label="Clear search">

                            <i class="bi bi-x-circle-fill text-sm"></i>

                        </button>

                    </div>

                </div>

            </div>


            {{-- TABLE --}}

            <div class="overflow-x-auto">

                <table class="min-w-[1100px] w-full divide-y divide-gray-200 dark:divide-gray-700">

                    <thead class="bg-gray-50 dark:bg-gray-900/70">

                        <tr>

                            <th
                                class="w-12 whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                #
                            </th>

                            <th
                                class="w-[440px] whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Landing Page
                            </th>

                            <th
                                class="w-40 whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Slug
                            </th>

                            <th
                                class="w-28 whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Sections
                            </th>

                            <th
                                class="w-28 whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Order
                            </th>

                            <th
                                class="w-32 whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Status
                            </th>

                            <th
                                class="w-36 whitespace-nowrap px-4 py-3 text-right text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody id="landingPageTableBody"
                        class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">

                        @forelse ($pages as $page)
                            @php
                                $sectionCount = collect([
                                    $page->problem,
                                    $page->solution,
                                    $page->capabilities,
                                    $page->process,
                                    $page->technologies,
                                    $page->benefits,
                                    $page->faqs,
                                    $page->related_pages,
                                ])
                                    ->filter(fn($section) => !empty($section))
                                    ->count();
                            @endphp

                            <tr class="landing-page-row group transition hover:bg-gray-50 dark:hover:bg-gray-700/40"
                                data-search="{{ strtolower(
                                    $page->title .
                                        ' ' .
                                        $page->slug .
                                        ' ' .
                                        ($page->eyebrow ?? '') .
                                        ' ' .
                                        ($page->hero_title ?? '') .
                                        ' ' .
                                        ($page->hero_description ?? '') .
                                        ' ' .
                                        ($page->status ? 'active' : 'inactive'),
                                ) }}">

                                {{-- NUMBER --}}

                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500 dark:text-gray-400">

                                    {{ $pages->firstItem() + $loop->index }}

                                </td>


                                {{-- LANDING PAGE --}}

                                <td class="px-4 py-4">

                                    <div class="flex w-[420px] items-center gap-3">

                                        <div
                                            class="h-14 w-20 flex-shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-100 dark:border-gray-700 dark:bg-gray-900">

                                            @if ($page->hero_image)
                                                <img src="{{ asset($page->hero_image) }}" alt="{{ $page->title }}"
                                                    class="h-full w-full object-cover">
                                            @else
                                                <div class="flex h-full w-full items-center justify-center">

                                                    <i
                                                        class="bi bi-window text-xl text-gray-400 dark:text-gray-600"></i>

                                                </div>
                                            @endif

                                        </div>


                                        <div class="min-w-0 flex-1">

                                            <div class="truncate text-sm font-semibold text-gray-900 dark:text-white"
                                                title="{{ $page->title }}">

                                                {{ Str::limit($page->title, 45) }}

                                            </div>


                                            <div class="mt-0.5 truncate text-xs text-gray-500 dark:text-gray-400"
                                                title="{{ $page->hero_title }}">

                                                {{ Str::limit($page->hero_title, 60) }}

                                            </div>


                                            @if ($page->eyebrow)
                                                <div class="mt-1 truncate text-xs text-gray-400 dark:text-gray-500"
                                                    title="{{ $page->eyebrow }}">

                                                    {{ Str::limit($page->eyebrow, 50) }}

                                                </div>
                                            @endif

                                        </div>

                                    </div>

                                </td>


                                {{-- SLUG --}}

                                <td class="px-4 py-4">

                                    <div class="flex max-w-[160px] items-center gap-1 text-xs text-gray-500 dark:text-gray-400"
                                        title="{{ $page->slug }}">

                                        <i class="bi bi-link-45deg flex-shrink-0"></i>

                                        <span class="truncate">
                                            {{ Str::limit($page->slug, 30) }}
                                        </span>

                                    </div>

                                </td>


                                {{-- SECTIONS --}}

                                <td class="whitespace-nowrap px-4 py-4">

                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-md bg-blue-50 px-2.5 py-1.5 text-xs font-semibold text-blue-700 dark:bg-blue-900/20 dark:text-blue-300">

                                        <i class="bi bi-grid-3x3-gap"></i>

                                        {{ $sectionCount }}

                                    </span>

                                </td>


                                {{-- SORT ORDER --}}

                                <td class="whitespace-nowrap px-4 py-4">

                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-md bg-gray-100 px-2.5 py-1.5 text-xs font-semibold text-gray-700 dark:bg-gray-900 dark:text-gray-300">

                                        <i class="bi bi-sort-numeric-down"></i>

                                        {{ $page->sort_order }}

                                    </span>

                                </td>


                                {{-- STATUS --}}

                                <td class="whitespace-nowrap px-4 py-4">

                                    @if ($page->status)
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700 dark:bg-green-900/20 dark:text-green-300">

                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                            Active

                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-yellow-50 px-2.5 py-1 text-xs font-semibold text-yellow-700 dark:bg-yellow-900/20 dark:text-yellow-300">

                                            <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>

                                            Inactive

                                        </span>
                                    @endif

                                </td>


                                {{-- ACTIONS --}}

                                <td class="whitespace-nowrap px-4 py-4">

                                    <div class="flex items-center justify-end gap-1.5">

                                        {{-- VIEW --}}

                                        @can('view_landing_page')
                                            <a href="{{ route('admin.seo-landing-pages.show', $page) }}"
                                                class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-200 bg-white text-gray-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:border-blue-700 dark:hover:bg-blue-900/30 dark:hover:text-blue-400"
                                                title="View Landing Page" aria-label="View Landing Page">

                                                <i class="bi bi-eye text-sm"></i>

                                            </a>
                                        @endcan


                                        {{-- EDIT --}}

                                        @can('edit_landing_page')
                                            <a href="{{ route('admin.seo-landing-pages.edit', $page) }}"
                                                class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-200 bg-white text-gray-600 transition hover:border-yellow-300 hover:bg-yellow-50 hover:text-yellow-600 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:border-yellow-700 dark:hover:bg-yellow-900/30 dark:hover:text-yellow-400"
                                                title="Edit Landing Page" aria-label="Edit Landing Page">

                                                <i class="bi bi-pencil text-sm"></i>

                                            </a>
                                        @endcan


                                        {{-- DELETE --}}

                                        @can('delete_landing_page')
                                            <form action="{{ route('admin.seo-landing-pages.destroy', $page) }}"
                                                method="POST" class="delete-landing-page-form inline-flex">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40"
                                                    title="Delete Landing Page" aria-label="Delete Landing Page">

                                                    <i class="bi bi-trash text-sm"></i>

                                                </button>

                                            </form>
                                        @endcan

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr id="emptyLandingPageRow">

                                <td colspan="7" class="px-4 py-16 text-center">

                                    <div
                                        class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">

                                        <i class="bi bi-window-x text-2xl text-gray-400 dark:text-gray-500"></i>

                                    </div>

                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                        No landing pages found
                                    </h3>

                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        Create your first SEO landing page to start building targeted content.
                                    </p>

                                    @can('create_landing_page')
                                        <a href="{{ route('admin.seo-landing-pages.create') }}"
                                            class="mt-4 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-3.5 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">

                                            <i class="bi bi-plus-lg"></i>

                                            Create Landing Page

                                        </a>
                                    @endcan

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- SEARCH EMPTY STATE --}}

            <div id="landingPageSearchEmptyState" class="hidden px-4 py-14 text-center">

                <div
                    class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">

                    <i class="bi bi-search text-xl text-gray-400 dark:text-gray-500"></i>

                </div>

                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    No matching landing pages
                </h3>

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Try searching with a different title, slug, eyebrow, description, or status.
                </p>

                <button type="button" id="resetLandingPageSearch"
                    class="mt-4 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-3.5 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">

                    <i class="bi bi-arrow-counterclockwise"></i>

                    Clear Search

                </button>

            </div>


            {{-- PAGINATION --}}

            @if ($pages->hasPages())
                <div class="border-t border-gray-200 bg-gray-50 px-4 py-3 dark:border-gray-700 dark:bg-gray-900/40">

                    {{ $pages->links() }}

                </div>
            @endif

        </div>

    </div>


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const searchInput = document.getElementById('landingPageSearch');
                const clearButton = document.getElementById('clearLandingPageSearch');
                const resetButton = document.getElementById('resetLandingPageSearch');
                const rows = document.querySelectorAll('.landing-page-row');
                const searchEmptyState = document.getElementById('landingPageSearchEmptyState');


                function performSearch() {

                    if (!searchInput) {
                        return;
                    }

                    const search = searchInput.value.toLowerCase().trim();

                    let visibleRows = 0;


                    rows.forEach(function(row) {

                        const searchText = row.dataset.search || '';

                        if (searchText.includes(search)) {

                            row.style.display = '';
                            visibleRows++;

                        } else {

                            row.style.display = 'none';

                        }

                    });


                    if (clearButton) {

                        clearButton.classList.toggle(
                            'hidden',
                            search === ''
                        );

                        clearButton.classList.toggle(
                            'flex',
                            search !== ''
                        );

                    }


                    if (searchEmptyState) {

                        searchEmptyState.classList.toggle(
                            'hidden',
                            search === '' || visibleRows !== 0
                        );

                    }

                }


                function clearSearch() {

                    if (!searchInput) {
                        return;
                    }

                    searchInput.value = '';

                    performSearch();

                    searchInput.focus();

                }


                if (searchInput) {

                    searchInput.addEventListener(
                        'input',
                        performSearch
                    );

                }


                if (clearButton) {

                    clearButton.addEventListener(
                        'click',
                        clearSearch
                    );

                }


                if (resetButton) {

                    resetButton.addEventListener(
                        'click',
                        clearSearch
                    );

                }


                document
                    .querySelectorAll('.delete-landing-page-form')
                    .forEach(function(form) {

                        form.addEventListener('submit', function(event) {

                            if (!confirm(
                                    'Are you sure you want to delete this landing page? This action cannot be undone.'
                                )) {

                                event.preventDefault();

                            }

                        });

                    });

            });
        </script>
    @endpush

</x-app-layout>
