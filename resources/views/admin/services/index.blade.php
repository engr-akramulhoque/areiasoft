<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-1 flex items-center gap-2">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                        <i class="bi bi-grid-1x2 text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Services</h1>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Create, organize, and manage the services displayed on your website.
                </p>
            </div>

            @can('create_service')
                <a href="{{ route('admin.services.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    <i class="bi bi-plus-lg"></i> Add Service
                </a>
            @endcan
        </div>

        @if (session('success'))
            <div
                class="mb-5 flex items-start gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-300">
                <i class="bi bi-check-circle-fill mt-0.5"></i>
                <div class="text-sm font-medium">{{ session('success') }}</div>
            </div>
        @endif

        @if (session('error'))
            <div
                class="mb-5 flex items-start gap-3 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-300">
                <i class="bi bi-exclamation-triangle-fill mt-0.5"></i>
                <div class="text-sm font-medium">{{ session('error') }}</div>
            </div>
        @endif

        @if ($errors->any())
            <div
                class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-300">
                <p class="text-sm font-semibold">Please check the following errors:</p>
                <ul class="mt-2 list-inside list-disc text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div
            class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                <div class="flex flex-col gap-3 px-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">All Services</h2>
                        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                            {{ $services->total() }} {{ $services->total() === 1 ? 'service' : 'services' }} found
                        </p>
                    </div>

                    <div class="relative w-full sm:w-80">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                            <i class="bi bi-search text-gray-400 dark:text-gray-500"></i>
                        </div>
                        <input type="search" id="serviceSearch" autocomplete="off" placeholder="Search services..."
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 py-2.5 pl-10 pr-10 text-sm text-gray-900 placeholder-gray-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500 dark:focus:border-blue-500 dark:focus:bg-gray-900">
                        <button type="button" id="clearServiceSearch"
                            class="absolute inset-y-0 right-0 hidden items-center pr-3 text-gray-400 transition hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300"
                            title="Clear search" aria-label="Clear search">
                            <i class="bi bi-x-circle-fill text-sm"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-[1000px] w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-900/70">
                        <tr>
                            <th
                                class="whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                #</th>
                            <th
                                class="whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Service</th>
                            <th
                                class="whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Slug</th>
                            <th
                                class="whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Category</th>
                            <th
                                class="whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Order</th>
                            <th
                                class="whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Status</th>
                            <th
                                class="whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Created</th>
                            <th
                                class="whitespace-nowrap px-4 py-3 text-right text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($services as $service)
                            <tr class="service-row group transition hover:bg-gray-50 dark:hover:bg-gray-700/40"
                                data-search="{{ strtolower($service->title . ' ' . $service->slug . ' ' . ($service->category ?? '') . ' ' . ($service->description ?? '')) }}">
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $services->firstItem() + $loop->index }}
                                </td>

                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center overflow-hidden rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                            @if ($service->icon)
                                                <span
                                                    class="flex h-full w-full items-center justify-center [&>svg]:h-5 [&>svg]:w-5">
                                                    {!! $service->icon !!}
                                                </span>
                                            @else
                                                <i class="bi bi-grid-1x2"></i>
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <div class="truncate text-sm font-semibold text-gray-900 dark:text-white">
                                                {{ $service->title }}</div>
                                            <div
                                                class="mt-0.5 max-w-sm truncate text-xs text-gray-500 dark:text-gray-400">
                                                {{ Str::limit($service->description, 60) ?: 'No description' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="whitespace-nowrap px-4 py-4">
                                    <code
                                        class="rounded-md bg-gray-100 px-2.5 py-1 text-xs text-gray-600 dark:bg-gray-900 dark:text-gray-400">{{ $service->slug }}</code>
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ $service->category ?: 'Uncategorized' }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ $service->sort_order }}
                                </td>

                                <td class="whitespace-nowrap px-4 py-4">
                                    @if ($service->active)
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700 dark:bg-green-900/20 dark:text-green-300">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span> Active
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span> Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col">
                                        <span>{{ $service->created_at?->format('d M Y') ?? 'Not Set' }}</span>
                                        @if ($service->created_at)
                                            <span
                                                class="text-xs text-gray-400 dark:text-gray-500">{{ $service->created_at->diffForHumans() }}</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="whitespace-nowrap px-4 py-4">
                                    <div class="flex items-center justify-end gap-1.5">
                                        @can('view_service')
                                            <a href="{{ route('admin.services.show', $service) }}"
                                                class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-200 bg-white text-gray-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:border-blue-700 dark:hover:bg-blue-900/30 dark:hover:text-blue-400"
                                                title="View service" aria-label="View service">
                                                <i class="bi bi-eye text-sm"></i>
                                            </a>
                                        @endcan

                                        @can('edit_service')
                                            <a href="{{ route('admin.services.edit', $service) }}"
                                                class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-200 bg-white text-gray-600 transition hover:border-yellow-300 hover:bg-yellow-50 hover:text-yellow-600 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:border-yellow-700 dark:hover:bg-yellow-900/30 dark:hover:text-yellow-400"
                                                title="Edit service" aria-label="Edit service">
                                                <i class="bi bi-pencil text-sm"></i>
                                            </a>

                                            <form action="{{ route('admin.services.toggle-status', $service) }}"
                                                method="POST" class="inline-flex">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border transition {{ $service->active ? 'border-gray-200 bg-white text-gray-600 hover:border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600' : 'border-green-200 bg-green-50 text-green-600 hover:bg-green-100 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/40' }}"
                                                    title="{{ $service->active ? 'Deactivate service' : 'Activate service' }}"
                                                    aria-label="{{ $service->active ? 'Deactivate service' : 'Activate service' }}">
                                                    <i
                                                        class="bi {{ $service->active ? 'bi-toggle-on' : 'bi-toggle-off' }} text-base"></i>
                                                </button>
                                            </form>
                                        @endcan

                                        @can('delete_service')
                                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                                class="delete-service-form inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40"
                                                    title="Delete service" aria-label="Delete service">
                                                    <i class="bi bi-trash text-sm"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-16 text-center">
                                    <div
                                        class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                                        <i class="bi bi-grid-1x2 text-2xl text-gray-400 dark:text-gray-500"></i>
                                    </div>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">No services found
                                    </h3>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Add your first service to
                                        display it in the admin panel.</p>
                                    @can('create_service')
                                        <a href="{{ route('admin.services.create') }}"
                                            class="mt-4 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-3.5 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">
                                            <i class="bi bi-plus-lg"></i> Create Service
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div id="searchEmptyState" class="hidden px-4 py-14 text-center">
                <div
                    class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                    <i class="bi bi-search text-xl text-gray-400 dark:text-gray-500"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">No matching services</h3>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Try searching with a different service name, slug, category, or description.
                </p>
                <button type="button" id="resetServiceSearch"
                    class="mt-4 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-3.5 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">
                    <i class="bi bi-arrow-counterclockwise"></i> Clear Search
                </button>
            </div>

            @if ($services->hasPages())
                <div class="border-t border-gray-200 bg-gray-50 px-4 py-3 dark:border-gray-700 dark:bg-gray-900/40">
                    {{ $services->links('pagination::tailwind') }}
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('serviceSearch');
                const clearButton = document.getElementById('clearServiceSearch');
                const resetButton = document.getElementById('resetServiceSearch');
                const rows = document.querySelectorAll('.service-row');
                const searchEmptyState = document.getElementById('searchEmptyState');

                function performSearch() {
                    if (!searchInput) return;

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
                        clearButton.classList.toggle('hidden', search === '');
                        clearButton.classList.toggle('flex', search !== '');
                    }

                    if (searchEmptyState) {
                        searchEmptyState.classList.toggle('hidden', search === '' || visibleRows > 0);
                    }
                }

                function clearSearch() {
                    if (!searchInput) return;
                    searchInput.value = '';
                    performSearch();
                    searchInput.focus();
                }

                if (searchInput) searchInput.addEventListener('input', performSearch);
                if (clearButton) clearButton.addEventListener('click', clearSearch);
                if (resetButton) resetButton.addEventListener('click', clearSearch);

                document.querySelectorAll('.delete-service-form').forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!confirm(
                                'Are you sure you want to delete this service? This action cannot be undone.'
                                )) {
                            event.preventDefault();
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
