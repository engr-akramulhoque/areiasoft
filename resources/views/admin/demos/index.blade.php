<x-app-layout>
    <div class="space-y-6">
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="border-b border-gray-200 px-5 py-5 dark:border-gray-700">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <div class="flex items-center gap-3">
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                                <i class="bi bi-display text-xl text-blue-600 dark:text-blue-400"></i>
                            </div>

                            <div>
                                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                    Demo Library
                                </h1>

                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                    Manage your website and application demo projects.
                                </p>
                            </div>
                        </div>
                    </div>

                    @can('create_demo')
                        <a href="{{ route('admin.demos.create') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            <i class="bi bi-plus-lg"></i>
                            Add Demo
                        </a>
                    @endcan
                </div>
            </div>

            <div class="border-b border-gray-200 p-5 dark:border-gray-700">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div class="relative w-full md:max-w-md">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="bi bi-search text-gray-400"></i>
                        </div>

                        <input type="text" id="demoSearch" placeholder="Search demos..."
                            class="block w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-4 text-sm text-gray-900 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 dark:placeholder-gray-400" />
                    </div>

                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        Total:
                        <span class="font-semibold text-gray-800 dark:text-gray-200">
                            {{ $demos->total() }}
                        </span>
                        {{ Str::plural('demo', $demos->total()) }}
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div
                    class="mx-5 mt-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400">
                    <div class="flex items-center gap-2">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div
                    class="mx-5 mt-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 dark:border-red-800 dark:bg-red-900/20 dark:text-red-400">
                    <div class="flex items-center gap-2">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600 dark:text-gray-300">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-600 dark:bg-gray-700/50 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="whitespace-nowrap px-5 py-4">
                                Demo
                            </th>

                            <th scope="col" class="whitespace-nowrap px-5 py-4">
                                Category
                            </th>

                            <th scope="col" class="whitespace-nowrap px-5 py-4">
                                Technology
                            </th>

                            <th scope="col" class="whitespace-nowrap px-5 py-4 text-center">
                                Featured
                            </th>

                            <th scope="col" class="whitespace-nowrap px-5 py-4 text-center">
                                Status
                            </th>

                            <th scope="col" class="whitespace-nowrap px-5 py-4 text-center">
                                Sort
                            </th>

                            <th scope="col" class="whitespace-nowrap px-5 py-4 text-right">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody id="demoTableBody" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($demos as $demo)
                            <tr class="demo-row transition hover:bg-gray-50 dark:hover:bg-gray-700/30"
                                data-search="{{ strtolower(
                                    $demo->title . ' ' . ($demo->slug ?? '') . ' ' . ($demo->category?->name ?? '') . ' ' . ($demo->technology ?? ''),
                                ) }}">
                                <td class="min-w-[300px] px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="h-16 w-24 shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-100 dark:border-gray-600 dark:bg-gray-700">
                                            @if ($demo->thumbnail)
                                                <img src="{{ asset('storage/' . $demo->thumbnail) }}"
                                                    alt="{{ $demo->title }}" class="h-full w-full object-cover"
                                                    loading="lazy">
                                            @else
                                                <div class="flex h-full w-full items-center justify-center">
                                                    <i class="bi bi-image text-2xl text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="min-w-0">
                                            <div class="flex flex-wrap items-center gap-2">
                                                <a href="{{ route('admin.demos.show', $demo) }}"
                                                    class="truncate font-semibold text-gray-900 transition hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-400">
                                                    {{ $demo->title }}
                                                </a>

                                                @if ($demo->featured)
                                                    <span
                                                        class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">
                                                        <i class="bi bi-star-fill"></i>
                                                        Featured
                                                    </span>
                                                @endif
                                            </div>

                                            <p
                                                class="mt-1 max-w-[360px] truncate text-xs text-gray-500 dark:text-gray-400">
                                                /{{ $demo->slug }}
                                            </p>

                                            @if ($demo->short_description)
                                                <p
                                                    class="mt-1 max-w-[360px] truncate text-xs text-gray-500 dark:text-gray-400">
                                                    {{ $demo->short_description }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td class="whitespace-nowrap px-5 py-4">
                                    @if ($demo->category)
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-2.5 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/20 dark:text-blue-400">
                                            <i class="bi bi-folder2"></i>
                                            {{ $demo->category->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-400">
                                            —
                                        </span>
                                    @endif
                                </td>

                                <td class="max-w-[220px] px-5 py-4">
                                    @if ($demo->technology)
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach (array_slice(array_filter(array_map('trim', explode(',', $demo->technology))), 0, 3) as $technology)
                                                <span
                                                    class="rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                                                    {{ $technology }}
                                                </span>
                                            @endforeach

                                            @if (count(array_filter(array_map('trim', explode(',', $demo->technology)))) > 3)
                                                <span
                                                    class="rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-500 dark:bg-gray-700 dark:text-gray-400">
                                                    +{{ count(array_filter(array_map('trim', explode(',', $demo->technology)))) - 3 }}
                                                </span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-gray-400">
                                            —
                                        </span>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-5 py-4 text-center">
                                    @can('toggle_demo_featured')
                                        <form action="{{ route('admin.demos.toggle-featured', $demo) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                title="{{ $demo->featured ? 'Remove from featured' : 'Mark as featured' }}"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg transition {{ $demo->featured
                                                    ? 'bg-amber-100 text-amber-600 hover:bg-amber-200 dark:bg-amber-900/30 dark:text-amber-400 dark:hover:bg-amber-900/50'
                                                    : 'bg-gray-100 text-gray-400 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600' }}">
                                                <i class="bi bi-star{{ $demo->featured ? '-fill' : '' }}"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="{{ $demo->featured ? 'text-amber-500' : 'text-gray-400' }}">
                                            <i class="bi bi-star{{ $demo->featured ? '-fill' : '' }}"></i>
                                        </span>
                                    @endcan
                                </td>

                                <td class="whitespace-nowrap px-5 py-4 text-center">
                                    @can('toggle_demo_status')
                                        <form action="{{ route('admin.demos.toggle-status', $demo) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold transition {{ $demo->status
                                                    ? 'bg-green-100 text-green-700 hover:bg-green-200 dark:bg-green-900/30 dark:text-green-400 dark:hover:bg-green-900/50'
                                                    : 'bg-red-100 text-red-700 hover:bg-red-200 dark:bg-red-900/30 dark:text-red-400 dark:hover:bg-red-900/50' }}">
                                                <span
                                                    class="h-1.5 w-1.5 rounded-full {{ $demo->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                                {{ $demo->status ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold {{ $demo->status
                                                ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400'
                                                : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' }}">
                                            <span
                                                class="h-1.5 w-1.5 rounded-full {{ $demo->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                            {{ $demo->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    @endcan
                                </td>

                                <td class="whitespace-nowrap px-5 py-4 text-center">
                                    <span class="font-medium text-gray-700 dark:text-gray-300">
                                        {{ $demo->sort_order ?? 0 }}
                                    </span>
                                </td>

                                <td class="whitespace-nowrap px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        @can('view_demo')
                                            <a href="{{ route('admin.demos.show', $demo) }}" title="View Demo"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-gray-500 transition hover:bg-gray-100 hover:text-blue-600 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-blue-400">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        @endcan

                                        @can('edit_demo')
                                            <a href="{{ route('admin.demos.edit', $demo) }}" title="Edit Demo"
                                                class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-gray-500 transition hover:bg-blue-50 hover:text-blue-600 dark:text-gray-400 dark:hover:bg-blue-900/20 dark:hover:text-blue-400">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        @endcan

                                        @can('delete_demo')
                                            <form action="{{ route('admin.demos.destroy', $demo) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this demo? This action cannot be undone.');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" title="Delete Demo"
                                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-gray-500 transition hover:bg-red-50 hover:text-red-600 dark:text-gray-400 dark:hover:bg-red-900/20 dark:hover:text-red-400">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr id="emptyDemoRow">
                                <td colspan="7" class="px-5 py-16 text-center">
                                    <div class="mx-auto flex max-w-md flex-col items-center">
                                        <div
                                            class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                                            <i class="bi bi-display text-3xl text-gray-400"></i>
                                        </div>

                                        <h3 class="mt-4 text-base font-semibold text-gray-900 dark:text-gray-100">
                                            No demos found
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                            Start building your Demo Library by adding your first project.
                                        </p>

                                        @can('create_demo')
                                            <a href="{{ route('admin.demos.create') }}"
                                                class="mt-5 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                                                <i class="bi bi-plus-lg"></i>
                                                Add First Demo
                                            </a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        <tr id="noSearchResults" class="hidden">
                            <td colspan="7" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="bi bi-search text-3xl text-gray-400"></i>

                                    <p class="mt-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                                        No matching demos found
                                    </p>

                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        Try searching with a different keyword.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @if ($demos->hasPages())
                <div class="border-t border-gray-200 px-5 py-4 dark:border-gray-700">
                    {{ $demos->links() }}
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('demoSearch');
                const rows = document.querySelectorAll('.demo-row');
                const noResults = document.getElementById('noSearchResults');

                if (!searchInput) {
                    return;
                }

                searchInput.addEventListener('input', function() {
                    const search = this.value.toLowerCase().trim();
                    let visibleRows = 0;

                    rows.forEach(function(row) {
                        const content = row.dataset.search || '';
                        const matches = !search || content.includes(search);

                        row.classList.toggle('hidden', !matches);

                        if (matches) {
                            visibleRows++;
                        }
                    });

                    if (noResults) {
                        noResults.classList.toggle(
                            'hidden',
                            visibleRows > 0 || rows.length === 0
                        );
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
