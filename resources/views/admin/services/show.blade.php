<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        {{-- Page header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                <div class="mb-2 flex flex-wrap items-center gap-2">
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                        <i class="bi bi-grid-1x2"></i> Services
                    </span>
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-indigo-100 px-2.5 py-1 text-xs font-medium text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-400">
                        <i class="bi bi-eye"></i> Details
                    </span>
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-medium {{ $service->active ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300' }}">
                        <span
                            class="h-1.5 w-1.5 rounded-full {{ $service->active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                        {{ $service->active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
                <h1 class="break-words text-2xl font-bold text-gray-900 dark:text-gray-100 sm:text-3xl">
                    {{ $service->title }}
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Review the service details, content, image, features, and call to action.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('admin.services.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                @can('edit_service')
                    <a href="{{ route('admin.services.edit', $service) }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-blue-700">
                        <i class="bi bi-pencil-square"></i> Edit Service
                    </a>
                @endcan
                @if ($service->slug)
                    <a href="{{ route('service.show', $service->slug) }}" target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-600">
                        <i class="bi bi-box-arrow-up-right"></i> View Public Page
                    </a>
                @endif
            </div>
        </div>

        @if (session('success'))
            <div
                class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 items-start gap-6 xl:grid-cols-3">
            {{-- Main content --}}
            <div class="space-y-6 xl:col-span-2">
                {{-- Overview card --}}
                <section
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                <i class="bi bi-card-text"></i>
                            </div>
                            <div>
                                <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Service Information
                                </h2>
                                <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">Core details used across the
                                    website.</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-5 p-5">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Category</p>
                                <p class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $service->category ?: '—' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    URL Slug</p>
                                <p class="mt-1 break-all font-mono text-sm text-gray-900 dark:text-gray-100">
                                    {{ $service->slug }}</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Short Description</p>
                            <p class="mt-1 whitespace-pre-line text-sm leading-6 text-gray-700 dark:text-gray-300">
                                {{ $service->description ?: 'No description provided.' }}</p>
                        </div>

                        @if ($service->hero_description)
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Hero Description</p>
                                <p class="mt-1 whitespace-pre-line text-sm leading-6 text-gray-700 dark:text-gray-300">
                                    {{ $service->hero_description }}</p>
                            </div>
                        @endif

                        @if ($service->overview)
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Overview</p>
                                <div
                                    class="mt-2 whitespace-pre-line text-sm leading-7 text-gray-700 dark:text-gray-300">
                                    {{ $service->overview }}</div>
                            </div>
                        @endif
                    </div>
                </section>

                {{-- Metrics --}}
                @if (is_array($service->metrics) && count($service->metrics))
                    <section
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4">
                            <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100"><i
                                    class="bi bi-graph-up-arrow mr-2 text-blue-500"></i>Metrics</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-3 p-5 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($service->metrics as $metric)
                                <div class="rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                                    <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                        {{ data_get($metric, 'number', '—') }}</p>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                        {{ data_get($metric, 'label', 'Metric') }}</p>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                {{-- Features --}}
                @if (is_array($service->features) && count($service->features))
                    <section
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4">
                            <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100"><i
                                    class="bi bi-check2-square mr-2 text-blue-500"></i>Features</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-3 p-5 sm:grid-cols-2">
                            @foreach ($service->features as $feature)
                                <div class="flex items-start gap-2 text-sm text-gray-700 dark:text-gray-300">
                                    <i class="bi bi-check-circle-fill mt-0.5 text-green-500"></i>
                                    <span>{{ is_array($feature) ? data_get($feature, 'title', data_get($feature, 'text', json_encode($feature))) : $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                {{-- Technologies --}}
                @if (is_array($service->technologies) && count($service->technologies))
                    <section
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4">
                            <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100"><i
                                    class="bi bi-code-slash mr-2 text-blue-500"></i>Technologies</h2>
                        </div>
                        <div class="flex flex-wrap gap-2 p-5">
                            @foreach ($service->technologies as $technology)
                                <span
                                    class="rounded-full border border-gray-200 bg-gray-50 px-3 py-1.5 text-xs font-medium text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200">
                                    {{ is_array($technology) ? data_get($technology, 'name', data_get($technology, 'title', json_encode($technology))) : $technology }}
                                </span>
                            @endforeach
                        </div>
                    </section>
                @endif

                {{-- Benefits --}}
                @if (is_array($service->benefits) && count($service->benefits))
                    <section
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4">
                            <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100"><i
                                    class="bi bi-stars mr-2 text-blue-500"></i>Benefits</h2>
                        </div>
                        <div class="space-y-3 p-5">
                            @foreach ($service->benefits as $benefit)
                                <div class="flex items-start gap-3 rounded-lg bg-gray-50 p-3 dark:bg-gray-900/50">
                                    <i class="bi bi-check2-circle mt-0.5 text-lg text-green-500"></i>
                                    <p class="text-sm leading-6 text-gray-700 dark:text-gray-300">
                                        {{ is_array($benefit) ? data_get($benefit, 'title', data_get($benefit, 'text', json_encode($benefit))) : $benefit }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                {{-- Call to action --}}
                @if ($service->cta_title || $service->cta_text || $service->cta_button)
                    <section
                        class="overflow-hidden rounded-xl border border-blue-200 bg-blue-50 shadow-sm dark:border-blue-900/50 dark:bg-blue-900/10">
                        <div class="p-5 sm:p-6">
                            <p class="text-xs font-semibold uppercase tracking-wide text-blue-600 dark:text-blue-400">
                                Call to Action</p>
                            @if ($service->cta_title)
                                <h2 class="mt-2 text-xl font-bold text-gray-900 dark:text-gray-100">
                                    {{ $service->cta_title }}</h2>
                            @endif
                            @if ($service->cta_text)
                                <p class="mt-2 whitespace-pre-line text-sm leading-6 text-gray-700 dark:text-gray-300">
                                    {{ $service->cta_text }}</p>
                            @endif
                            @if ($service->cta_button)
                                <span
                                    class="mt-4 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white">
                                    {{ $service->cta_button }}
                                </span>
                            @endif
                        </div>
                    </section>
                @endif
            </div>

            {{-- Sidebar --}}
            <aside class="space-y-6">
                {{-- Image and icon --}}
                <section
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-5 py-4">
                        <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100"><i
                                class="bi bi-image mr-2 text-blue-500"></i>Image & Icon</h2>
                    </div>
                    <div class="space-y-4 p-5">
                        @if ($service->image)
                            @php
                                $serviceImageUrl = \Illuminate\Support\Str::startsWith($service->image, [
                                    'http://',
                                    'https://',
                                ])
                                    ? $service->image
                                    : asset('storage/' . ltrim($service->image, '/'));
                            @endphp
                            <img src="{{ $serviceImageUrl }}" alt="{{ $service->alt_text ?: $service->title }}"
                                class="max-h-64 w-full rounded-lg border border-gray-200 object-contain dark:border-gray-700"
                                loading="lazy">
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Alt Text</p>
                                <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                    {{ $service->alt_text ?: 'Not set' }}</p>
                            </div>
                        @else
                            <div
                                class="flex min-h-36 flex-col items-center justify-center rounded-lg border border-dashed border-gray-300 bg-gray-50 text-gray-400 dark:border-gray-600 dark:bg-gray-900/50">
                                <i class="bi bi-image text-3xl"></i>
                                <p class="mt-2 text-xs">No service image uploaded</p>
                            </div>
                        @endif

                        @if ($service->icon)
                            <div>
                                <p
                                    class="mb-2 text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                    Service Icon</p>
                                <div
                                    class="flex items-center justify-center rounded-xl border border-gray-200 bg-gray-50 p-3 text-blue-600 dark:border-gray-700 dark:bg-gray-900 dark:text-blue-400" style="width: 64px; height: 64px;">
                                    {!! $service->icon !!}
                                </div>
                                <p class="mt-2 break-all text-xs text-gray-500 dark:text-gray-400">SVG icon markup is
                                    stored for this service.</p>
                            </div>
                        @endif
                    </div>
                </section>

                {{-- Publishing details --}}
                <section
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-5 py-4">
                        <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100"><i
                                class="bi bi-sliders mr-2 text-blue-500"></i>Publishing Details</h2>
                    </div>
                    <dl class="space-y-4 p-5">
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-sm text-gray-500 dark:text-gray-400">Status</dt>
                            <dd>
                                <span
                                    class="rounded-full px-2.5 py-1 text-xs font-medium {{ $service->active ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300' }}">
                                    {{ $service->active ? 'Active' : 'Inactive' }}
                                </span>
                            </dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-sm text-gray-500 dark:text-gray-400">Sort Order</dt>
                            <dd class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                {{ $service->sort_order }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Service ID</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">#{{ $service->id }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Created</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                {{ $service->created_at?->format('M d, Y \a\t h:i A') ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Last Updated</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                {{ $service->updated_at?->format('M d, Y \a\t h:i A') ?? '—' }}</dd>
                        </div>
                    </dl>
                </section>
            </aside>
        </div>
    </div>
</x-app-layout>
