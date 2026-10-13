<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="space-y-6">

            <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="border-b border-gray-200 px-5 py-5 dark:border-gray-700">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                        <div class="flex items-start gap-3">
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-100 dark:bg-blue-900/30">
                                <i class="bi bi-display text-xl text-blue-600 dark:text-blue-400"></i>
                            </div>

                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        Demo Details
                                    </h1>

                                    @if ($demo->featured)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">
                                            <i class="bi bi-star-fill"></i>
                                            Featured
                                        </span>
                                    @endif

                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold {{ $demo->status
                                            ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400'
                                            : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' }}">
                                        <span
                                            class="h-1.5 w-1.5 rounded-full {{ $demo->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                        {{ $demo->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>

                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                    View complete information and configuration for this Demo Library project.
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2 sm:flex-row">
                            @if ($demo->demo_url)
                                <a href="{{ $demo->demo_url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                    Live Demo
                                </a>
                            @endif

                            @can('edit_demo')
                                <a href="{{ route('admin.demos.edit', $demo) }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>
                            @endcan

                            <a href="{{ route('admin.demos.index') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                                <i class="bi bi-arrow-left"></i>
                                Back
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-5">
                    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

                        <div class="xl:col-span-2">
                            <div
                                class="overflow-hidden rounded-2xl border border-gray-200 bg-gray-100 dark:border-gray-700 dark:bg-gray-900">
                                <div
                                    class="flex items-center gap-2 border-b border-gray-200 bg-white px-4 py-3 dark:border-gray-700 dark:bg-gray-800">
                                    <span class="h-3 w-3 rounded-full bg-red-400"></span>
                                    <span class="h-3 w-3 rounded-full bg-yellow-400"></span>
                                    <span class="h-3 w-3 rounded-full bg-green-400"></span>

                                    <div
                                        class="ml-2 flex min-w-0 flex-1 items-center rounded-md bg-gray-100 px-3 py-1.5 dark:bg-gray-700">
                                        <i class="bi bi-lock-fill mr-2 text-xs text-gray-400"></i>

                                        <span class="truncate text-xs text-gray-500 dark:text-gray-400">
                                            {{ $demo->demo_url ?: url('/live-demo/' . $demo->slug) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="relative aspect-video overflow-hidden">
                                    @if ($demo->preview_image)
                                        <img src="{{ asset('storage/' . $demo->preview_image) }}"
                                            alt="{{ $demo->title }} preview" class="h-full w-full object-cover">
                                    @elseif ($demo->thumbnail)
                                        <img src="{{ asset('storage/' . $demo->thumbnail) }}" alt="{{ $demo->title }}"
                                            class="h-full w-full object-cover">
                                    @else
                                        <div
                                            class="flex h-full w-full flex-col items-center justify-center bg-gray-100 dark:bg-gray-800">
                                            <i class="bi bi-image text-5xl text-gray-400"></i>

                                            <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">
                                                No preview image available
                                            </p>
                                        </div>
                                    @endif

                                    <div
                                        class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent p-5 pt-16">
                                        <div class="flex flex-wrap items-end justify-between gap-3">
                                            <div class="min-w-0">
                                                <span
                                                    class="inline-flex items-center gap-1.5 rounded-full bg-white/15 px-2.5 py-1 text-xs font-medium text-white backdrop-blur-md">
                                                    <i class="bi bi-folder2"></i>
                                                    {{ $demo->category?->name ?? 'Uncategorized' }}
                                                </span>

                                                <h2 class="mt-2 text-xl font-bold text-white sm:text-2xl">
                                                    {{ $demo->title }}
                                                </h2>
                                            </div>

                                            @if ($demo->demo_url)
                                                <a href="{{ $demo->demo_url }}" target="_blank"
                                                    rel="noopener noreferrer"
                                                    class="inline-flex shrink-0 items-center gap-2 rounded-lg bg-white px-4 py-2 text-sm font-semibold text-gray-900 transition hover:bg-gray-100">
                                                    <i class="bi bi-box-arrow-up-right"></i>
                                                    Open
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-5">
                            <div
                                class="rounded-xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-gray-700/30">
                                <div class="flex items-center gap-2">
                                    <i class="bi bi-info-circle text-blue-600 dark:text-blue-400"></i>

                                    <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                        Project Information
                                    </h2>
                                </div>

                                <div class="mt-5 space-y-4">
                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                            Category
                                        </p>

                                        @if ($demo->category)
                                            <a href="{{ route('admin.demo.categories.show', $demo->category) }}"
                                                class="mt-1 inline-flex items-center gap-1.5 text-sm font-semibold text-blue-600 hover:text-blue-700 dark:text-blue-400">
                                                <i class="bi bi-folder2"></i>
                                                {{ $demo->category->name }}
                                            </a>
                                        @else
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                                Uncategorized
                                            </p>
                                        @endif
                                    </div>

                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                            Slug
                                        </p>

                                        <p class="mt-1 break-all text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ $demo->slug }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                            Sort Order
                                        </p>

                                        <p class="mt-1 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            {{ $demo->sort_order ?? 0 }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                            Created
                                        </p>

                                        <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                            {{ $demo->created_at?->format('d M Y, h:i A') ?? '—' }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                            Last Updated
                                        </p>

                                        <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                            {{ $demo->updated_at?->format('d M Y, h:i A') ?? '—' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="rounded-xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-gray-700/30">
                                <div class="flex items-center gap-2">
                                    <i class="bi bi-lightning-charge text-amber-500"></i>

                                    <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                        Demo Status
                                    </h2>
                                </div>

                                <div class="mt-4 grid grid-cols-2 gap-3">
                                    <div
                                        class="rounded-lg border border-gray-200 bg-white p-3 dark:border-gray-600 dark:bg-gray-800">
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            Status
                                        </p>

                                        <p
                                            class="mt-1 text-sm font-semibold {{ $demo->status ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                            {{ $demo->status ? 'Active' : 'Inactive' }}
                                        </p>
                                    </div>

                                    <div
                                        class="rounded-lg border border-gray-200 bg-white p-3 dark:border-gray-600 dark:bg-gray-800">
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            Featured
                                        </p>

                                        <p
                                            class="mt-1 text-sm font-semibold {{ $demo->featured ? 'text-amber-600 dark:text-amber-400' : 'text-gray-500 dark:text-gray-400' }}">
                                            {{ $demo->featured ? 'Yes' : 'No' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <div class="space-y-6 lg:col-span-2">

                    @if ($demo->short_description)
                        <div
                            class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-center gap-2 border-b border-gray-200 pb-3 dark:border-gray-700">
                                <i class="bi bi-card-text text-blue-600 dark:text-blue-400"></i>

                                <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                    Short Description
                                </h2>
                            </div>

                            <p class="mt-4 text-sm leading-7 text-gray-600 dark:text-gray-300">
                                {{ $demo->short_description }}
                            </p>
                        </div>
                    @endif

                    @if ($demo->description)
                        <div
                            class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-center gap-2 border-b border-gray-200 pb-3 dark:border-gray-700">
                                <i class="bi bi-file-text text-blue-600 dark:text-blue-400"></i>

                                <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                    Project Description
                                </h2>
                            </div>

                            <div class="mt-5 whitespace-pre-line text-sm leading-7 text-gray-600 dark:text-gray-300">
                                {{ $demo->description }}
                            </div>
                        </div>
                    @endif

                    @if ($demo->technology)
                        <div
                            class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-center gap-2 border-b border-gray-200 pb-3 dark:border-gray-700">
                                <i class="bi bi-code-slash text-purple-600 dark:text-purple-400"></i>

                                <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                    Technologies
                                </h2>
                            </div>

                            <div class="mt-5 flex flex-wrap gap-2">
                                @foreach (array_filter(array_map('trim', explode(',', $demo->technology))) as $technology)
                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm font-medium text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                        <i class="bi bi-check2-circle text-blue-500"></i>
                                        {{ $technology }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($demo->demo_url)
                        <div
                            class="rounded-xl border border-blue-200 bg-blue-50 p-5 dark:border-blue-800 dark:bg-blue-900/10">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                                        <i class="bi bi-globe2 text-blue-600 dark:text-blue-400"></i>
                                    </div>

                                    <div class="min-w-0">
                                        <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            Live Demo
                                        </h2>

                                        <p class="mt-1 break-all text-xs text-gray-500 dark:text-gray-400">
                                            {{ $demo->demo_url }}
                                        </p>
                                    </div>
                                </div>

                                <a href="{{ $demo->demo_url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                                    Visit Demo
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="space-y-6">

                    <div
                        class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-center gap-2 border-b border-gray-200 pb-3 dark:border-gray-700">
                            <i class="bi bi-images text-green-600 dark:text-green-400"></i>

                            <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                Project Media
                            </h2>
                        </div>

                        <div class="mt-4 space-y-4">
                            @if ($demo->thumbnail)
                                <div>
                                    <p class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-400">
                                        Thumbnail
                                    </p>

                                    <div
                                        class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-600">
                                        <img src="{{ asset('storage/' . $demo->thumbnail) }}"
                                            alt="{{ $demo->title }} thumbnail"
                                            class="aspect-video w-full object-cover">
                                    </div>
                                </div>
                            @endif

                            @if ($demo->preview_image)
                                <div>
                                    <p class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-400">
                                        Preview Image
                                    </p>

                                    <div
                                        class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-600">
                                        <img src="{{ asset('storage/' . $demo->preview_image) }}"
                                            alt="{{ $demo->title }} preview"
                                            class="aspect-video w-full object-cover">
                                    </div>
                                </div>
                            @endif

                            @if (!$demo->thumbnail && !$demo->preview_image)
                                <div
                                    class="rounded-lg border border-dashed border-gray-300 p-6 text-center dark:border-gray-600">
                                    <i class="bi bi-image text-3xl text-gray-400"></i>

                                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                        No project images uploaded.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    @canany(['toggle_demo_status', 'toggle_demo_featured'])
                        <div
                            class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="flex items-center gap-2 border-b border-gray-200 pb-3 dark:border-gray-700">
                                <i class="bi bi-sliders text-gray-600 dark:text-gray-400"></i>

                                <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                    Quick Actions
                                </h2>
                            </div>

                            <div class="mt-4 space-y-3">
                                @can('toggle_demo_status')
                                    <form action="{{ route('admin.demos.toggle-status', $demo) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                            class="flex w-full items-center justify-between rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 text-left transition hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700/40 dark:hover:bg-gray-700">
                                            <span class="flex items-center gap-3">
                                                <i
                                                    class="bi bi-power {{ $demo->status ? 'text-green-500' : 'text-red-500' }}"></i>

                                                <span>
                                                    <span class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $demo->status ? 'Deactivate Demo' : 'Activate Demo' }}
                                                    </span>

                                                    <span class="block text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $demo->status ? 'Hide this project from the public library.' : 'Make this project visible.' }}
                                                    </span>
                                                </span>
                                            </span>

                                            <i class="bi bi-chevron-right text-gray-400"></i>
                                        </button>
                                    </form>
                                @endcan

                                @can('toggle_demo_featured')
                                    <form action="{{ route('admin.demos.toggle-featured', $demo) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                            class="flex w-full items-center justify-between rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 text-left transition hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700/40 dark:hover:bg-gray-700">
                                            <span class="flex items-center gap-3">
                                                <i
                                                    class="bi bi-star{{ $demo->featured ? '-fill' : '' }} {{ $demo->featured ? 'text-amber-500' : 'text-gray-400' }}"></i>

                                                <span>
                                                    <span class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        {{ $demo->featured ? 'Remove Featured' : 'Mark as Featured' }}
                                                    </span>

                                                    <span class="block text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $demo->featured ? 'Remove the featured highlight.' : 'Highlight this project in the library.' }}
                                                    </span>
                                                </span>
                                            </span>

                                            <i class="bi bi-chevron-right text-gray-400"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @endcanany
                </div>
            </div>

            @can('delete_demo')
                <div class="rounded-xl border border-red-200 bg-white shadow-sm dark:border-red-900/50 dark:bg-gray-800">
                    <div class="border-b border-red-100 px-5 py-4 dark:border-red-900/40">
                        <div class="flex items-center gap-2">
                            <i class="bi bi-exclamation-triangle text-red-600 dark:text-red-400"></i>

                            <h2 class="text-base font-semibold text-red-700 dark:text-red-400">
                                Danger Zone
                            </h2>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                Delete this demo
                            </h3>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Permanently remove this project and its uploaded images from the Demo Library.
                                This action cannot be undone.
                            </p>
                        </div>

                        <form action="{{ route('admin.demos.destroy', $demo) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to permanently delete this demo? This will also remove its uploaded images. This action cannot be undone.');">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-700 transition hover:bg-red-100 sm:w-auto dark:border-red-900/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/30">
                                <i class="bi bi-trash3"></i>
                                Delete Demo
                            </button>
                        </form>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
