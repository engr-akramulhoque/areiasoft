<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="min-w-0">
                <div class="mb-2 flex items-center gap-2">
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                        <i class="bi bi-grid-1x2"></i> Services
                    </span>
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400">
                        <i class="bi bi-plus-circle"></i> Create
                    </span>
                </div>
                <h1 class="break-words text-2xl font-bold text-gray-900 dark:text-gray-100 sm:text-3xl">Create Service
                </h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Add a service page with SEO-friendly content, features, technologies, and a call to action.
                </p>
            </div>

            <a href="{{ route('admin.services.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-gray-500 px-4 py-2 text-sm text-white transition hover:bg-gray-600">
                <i class="bi bi-arrow-left"></i> Back to Services
            </a>
        </div>

        @if (session('success'))
            <div
                class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800 dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div
                class="mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-4 text-red-800 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-300">
                <i class="bi bi-exclamation-triangle-fill mt-0.5"></i>
                <div>
                    <p class="mb-1 text-sm font-semibold">Please fix the following errors:</p>
                    <ul class="list-disc space-y-1 pl-5 text-xs">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <div class="space-y-6 lg:col-span-2">
                    {{-- Basic information --}}
                    <section
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                    <i class="bi bi-pencil-square"></i></div>
                                <div>
                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Basic Information
                                    </h2>
                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">Service name, URL slug,
                                        category, and summary.</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-5 p-5 md:grid-cols-2">
                            <div class="md:col-span-2">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service Title
                                    <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                                    autofocus placeholder="Website Development"
                                    class="form-field mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                @error('title')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="slug"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slug <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required
                                    placeholder="website-development"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Public URL: /service/<span
                                        id="slugPreview">your-service-slug</span></p>
                                @error('slug')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="category"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                                <input type="text" name="category" id="category" value="{{ old('category') }}"
                                    placeholder="Web Development"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                @error('category')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Short
                                    Description</label>
                                <textarea name="description" id="description" rows="3"
                                    placeholder="A concise summary for service cards and previews..."
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="hero_description"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hero
                                    Description</label>
                                <textarea name="hero_description" id="hero_description" rows="4"
                                    placeholder="Explain the service and its value to potential customers..."
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('hero_description') }}</textarea>
                                @error('hero_description')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </section>

                    {{-- Content and image --}}
                    <section
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                                    <i class="bi bi-file-earmark-richtext"></i></div>
                                <div>
                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Service Page
                                        Content</h2>
                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">Main content and service
                                        image details.</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-5 p-5">
                            <div>
                                <label for="overview"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Overview</label>
                                <textarea name="overview" id="overview" rows="7"
                                    placeholder="Write the main overview content for the service detail page..."
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('overview') }}</textarea>
                                @error('overview')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div>
                                    <label for="image"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service
                                        Image</label>
                                    <input type="file" name="image" id="image"
                                        accept="image/jpeg,image/png,image/webp,image/gif"
                                        class="mt-1 block w-full cursor-pointer rounded-lg border border-gray-300 bg-white text-sm text-gray-900 shadow-sm file:mr-4 file:rounded-l-lg file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:file:bg-blue-900/30 dark:file:text-blue-300">
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Upload JPG, PNG, WEBP, or
                                        GIF. Maximum size: 4 MB.</p>
                                    @error('image')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror

                                    <div id="imagePreviewWrap" class="mt-3 hidden">
                                        <p class="mb-2 text-xs font-medium text-gray-600 dark:text-gray-300">Image
                                            preview</p>
                                        <img id="imagePreview" src="#" alt="Selected service image preview"
                                            class="max-h-64 w-full rounded-lg border border-gray-200 object-contain dark:border-gray-700">
                                        <button type="button" id="removeImagePreview"
                                            class="mt-2 inline-flex items-center gap-1 rounded-lg border border-gray-300 px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">
                                            <i class="bi bi-x-circle"></i> Remove selected image
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <label for="alt_text"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image Alt
                                        Text</label>
                                    <input type="text" name="alt_text" id="alt_text"
                                        value="{{ old('alt_text') }}"
                                        placeholder="Custom website development services"
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                    @error('alt_text')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- Repeatable list content --}}
                    <section
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400">
                                    <i class="bi bi-list-check"></i></div>
                                <div>
                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Service Details
                                    </h2>
                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">Add metrics, features,
                                        technologies, and benefits.</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-6 p-5">
                            <div>
                                <div class="mb-3 flex items-center justify-between gap-3">
                                    <div>
                                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Metrics</h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Each metric has a value and
                                            label.</p>
                                    </div>
                                    <button type="button" data-add="metrics"
                                        class="inline-flex items-center gap-1 rounded-lg border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700"><i
                                            class="bi bi-plus-lg"></i> Add Metric</button>
                                </div>
                                <div id="metricsList" class="space-y-3">
                                    @foreach (old('metrics', []) as $i => $metric)
                                        <div
                                            class="metric-row grid grid-cols-1 gap-3 rounded-lg border border-gray-200 p-3 dark:border-gray-700 sm:grid-cols-[1fr_1fr_auto]">
                                            <input name="metrics[{{ $i }}][number]"
                                                value="{{ $metric['number'] ?? '' }}" placeholder="20+"
                                                class="block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                            <input name="metrics[{{ $i }}][label]"
                                                value="{{ $metric['label'] ?? '' }}" placeholder="Projects Delivered"
                                                class="block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                            <button type="button"
                                                class="remove-row rounded-lg px-3 py-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20"
                                                aria-label="Remove metric"><i class="bi bi-trash"></i></button>
                                        </div>
                                    @endforeach
                                </div>
                                @error('metrics')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <div class="mb-3 flex items-center justify-between gap-3">
                                    <div>
                                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Features
                                        </h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Key deliverables and
                                            capabilities.</p>
                                    </div>
                                    <button type="button" data-add="features"
                                        class="inline-flex items-center gap-1 rounded-lg border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700"><i
                                            class="bi bi-plus-lg"></i> Add Feature</button>
                                </div>
                                <div id="featuresList" class="space-y-3">
                                    @foreach (old('features', []) as $i => $item)
                                        <div class="simple-row flex gap-2"><input
                                                name="features[{{ $i }}]" value="{{ $item }}"
                                                placeholder="Responsive website development"
                                                class="block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"><button
                                                type="button"
                                                class="remove-row rounded-lg px-3 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20"
                                                aria-label="Remove feature"><i class="bi bi-trash"></i></button></div>
                                    @endforeach
                                </div>
                                @error('features')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <div class="mb-3 flex items-center justify-between gap-3">
                                    <div>
                                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Technologies
                                        </h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Frameworks, tools, and
                                            platforms.</p>
                                    </div>
                                    <button type="button" data-add="technologies"
                                        class="inline-flex items-center gap-1 rounded-lg border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700"><i
                                            class="bi bi-plus-lg"></i> Add Technology</button>
                                </div>
                                <div id="technologiesList" class="space-y-3">
                                    @foreach (old('technologies', []) as $i => $item)
                                        <div class="simple-row flex gap-2"><input
                                                name="technologies[{{ $i }}]" value="{{ $item }}"
                                                placeholder="Laravel"
                                                class="block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"><button
                                                type="button"
                                                class="remove-row rounded-lg px-3 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20"
                                                aria-label="Remove technology"><i class="bi bi-trash"></i></button>
                                        </div>
                                    @endforeach
                                </div>
                                @error('technologies')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <div class="mb-3 flex items-center justify-between gap-3">
                                    <div>
                                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Benefits
                                        </h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Business outcomes and
                                            advantages.</p>
                                    </div>
                                    <button type="button" data-add="benefits"
                                        class="inline-flex items-center gap-1 rounded-lg border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700"><i
                                            class="bi bi-plus-lg"></i> Add Benefit</button>
                                </div>
                                <div id="benefitsList" class="space-y-3">
                                    @foreach (old('benefits', []) as $i => $item)
                                        <div class="simple-row flex gap-2"><input
                                                name="benefits[{{ $i }}]" value="{{ $item }}"
                                                placeholder="Improve operational efficiency"
                                                class="block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"><button
                                                type="button"
                                                class="remove-row rounded-lg px-3 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20"
                                                aria-label="Remove benefit"><i class="bi bi-trash"></i></button></div>
                                    @endforeach
                                </div>
                                @error('benefits')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </section>

                    {{-- CTA and icon --}}
                    <section
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">
                                    <i class="bi bi-mouse2"></i></div>
                                <div>
                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Call to Action
                                    </h2>
                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">Configure the closing
                                        section on the service page.</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-5 p-5 md:grid-cols-2">
                            <div>
                                <label for="cta_title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">CTA
                                    Title</label>
                                <input name="cta_title" id="cta_title" value="{{ old('cta_title') }}"
                                    placeholder="Ready to Start Your Project?"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                @error('cta_title')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="cta_button"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">CTA Button
                                    Text</label>
                                <input name="cta_button" id="cta_button" value="{{ old('cta_button') }}"
                                    placeholder="Start Your Project"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                @error('cta_button')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label for="cta_text"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">CTA Text</label>
                                <textarea name="cta_text" id="cta_text" rows="3" placeholder="Tell visitors what to do next..."
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('cta_text') }}</textarea>
                                @error('cta_text')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label for="icon"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">SVG Icon
                                    Markup</label>
                                <textarea name="icon" id="icon" rows="5"
                                    placeholder='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="..."/></svg>'
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white font-mono text-xs text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('icon') }}</textarea>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Only enter trusted SVG markup.
                                    It is rendered as HTML on your website.</p>
                                @error('icon')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </section>
                </div>

                {{-- Publishing sidebar --}}
                <aside class="space-y-6">
                    <section
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">
                            <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Publishing</h2>
                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">Choose visibility and display
                                order.</p>
                        </div>
                        <div class="space-y-5 p-5">
                            <div>
                                <label for="sort_order"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Display
                                    Order</label>
                                <input type="number" name="sort_order" id="sort_order" min="0"
                                    step="1" value="{{ old('sort_order', 0) }}"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Lower numbers appear first.
                                </p>
                                @error('sort_order')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                                <label for="active" class="flex cursor-pointer items-start gap-3">
                                    <input type="checkbox" name="active" id="active" value="1"
                                        @checked(old('active', true))
                                        class="mt-0.5 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-900">
                                    <span>
                                        <span
                                            class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Publish
                                            service</span>
                                        <span class="mt-1 block text-xs text-gray-500 dark:text-gray-400">Active
                                            services can appear on public service listings.</span>
                                    </span>
                                </label>
                                @error('active')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div
                                class="rounded-lg bg-blue-50 p-4 text-xs leading-5 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300">
                                <i class="bi bi-info-circle mr-1"></i>
                                SEO title and meta description are managed by your existing SEO solution, so they are
                                not included in this form.
                            </div>
                        </div>
                    </section>

                    <div class="flex flex-col gap-3">
                        <button type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                            <i class="bi bi-check2-circle"></i> Create Service
                        </button>
                        <a href="{{ route('admin.services.index') }}"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                            Cancel
                        </a>
                    </div>
                </aside>
            </div>
        </form>
    </div>

    <template id="metricTemplate">
        <div
            class="metric-row grid grid-cols-1 gap-3 rounded-lg border border-gray-200 p-3 dark:border-gray-700 sm:grid-cols-[1fr_1fr_auto]">
            <input data-name="number" placeholder="20+"
                class="block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
            <input data-name="label" placeholder="Projects Delivered"
                class="block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
            <button type="button"
                class="remove-row rounded-lg px-3 py-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20"
                aria-label="Remove metric"><i class="bi bi-trash"></i></button>
        </div>
    </template>

    <template id="simpleItemTemplate">
        <div class="simple-row flex gap-2">
            <input
                class="block w-full rounded-lg border-gray-300 bg-white text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
            <button type="button"
                class="remove-row rounded-lg px-3 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20"
                aria-label="Remove item"><i class="bi bi-trash"></i></button>
        </div>
    </template>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const titleInput = document.getElementById('title');
                const slugInput = document.getElementById('slug');
                const slugPreview = document.getElementById('slugPreview');
                let slugWasEdited = Boolean(slugInput && slugInput.value.trim());

                function slugify(value) {
                    return value.toString().toLowerCase().trim()
                        .replace(/[\s\W-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
                }

                function updateSlugPreview() {
                    if (slugPreview && slugInput) {
                        slugPreview.textContent = slugInput.value || 'your-service-slug';
                    }
                }

                if (slugInput) {
                    slugInput.addEventListener('input', function() {
                        slugWasEdited = true;
                        updateSlugPreview();
                    });
                }

                if (titleInput && slugInput) {
                    titleInput.addEventListener('input', function() {
                        if (!slugWasEdited || !slugInput.value.trim()) {
                            slugInput.value = slugify(titleInput.value);
                            updateSlugPreview();
                        }
                    });
                }

                updateSlugPreview();

                // Live image preview for the selected upload.
                const imageInput = document.getElementById('image');
                const imagePreviewWrap = document.getElementById('imagePreviewWrap');
                const imagePreview = document.getElementById('imagePreview');
                const removeImagePreview = document.getElementById('removeImagePreview');

                if (imageInput && imagePreviewWrap && imagePreview) {
                    imageInput.addEventListener('change', function() {
                        const file = imageInput.files && imageInput.files[0];

                        if (!file) {
                            imagePreview.removeAttribute('src');
                            imagePreviewWrap.classList.add('hidden');
                            return;
                        }

                        if (!file.type.startsWith('image/')) {
                            imageInput.value = '';
                            imagePreview.removeAttribute('src');
                            imagePreviewWrap.classList.add('hidden');
                            alert('Please select a valid image file.');
                            return;
                        }

                        if (file.size > 4 * 1024 * 1024) {
                            imageInput.value = '';
                            imagePreview.removeAttribute('src');
                            imagePreviewWrap.classList.add('hidden');
                            alert('Image size must be 4 MB or less.');
                            return;
                        }

                        const reader = new FileReader();
                        reader.onload = function(event) {
                            imagePreview.src = event.target.result;
                            imagePreviewWrap.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    });
                }

                if (removeImagePreview && imageInput && imagePreviewWrap && imagePreview) {
                    removeImagePreview.addEventListener('click', function() {
                        imageInput.value = '';
                        imagePreview.removeAttribute('src');
                        imagePreviewWrap.classList.add('hidden');
                    });
                }

                function nextIndex(container, prefix) {
                    const names = Array.from(container.querySelectorAll('[name]'))
                        .map(el => {
                            const match = el.name.match(new RegExp('^' + prefix + '\\[(\\d+)\\]'));
                            return match ? Number(match[1]) : -1;
                        });
                    return names.length ? Math.max(...names) + 1 : 0;
                }

                document.querySelectorAll('[data-add]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        const type = button.dataset.add;

                        if (type === 'metrics') {
                            const container = document.getElementById('metricsList');
                            const index = nextIndex(container, 'metrics');
                            const template = document.getElementById('metricTemplate');
                            const fragment = template.content.cloneNode(true);
                            fragment.querySelector('[data-name="number"]').name =
                                `metrics[${index}][number]`;
                            fragment.querySelector('[data-name="label"]').name =
                                `metrics[${index}][label]`;
                            container.appendChild(fragment);
                            return;
                        }

                        const container = document.getElementById(type + 'List');
                        const index = nextIndex(container, type);
                        const fragment = document.getElementById('simpleItemTemplate').content
                            .cloneNode(true);
                        const input = fragment.querySelector('input');
                        input.name = `${type}[${index}]`;

                        if (type === 'features') input.placeholder = 'Responsive website development';
                        if (type === 'technologies') input.placeholder = 'Laravel';
                        if (type === 'benefits') input.placeholder = 'Improve operational efficiency';

                        container.appendChild(fragment);
                    });
                });

                document.addEventListener('click', function(event) {
                    const removeButton = event.target.closest('.remove-row');
                    if (removeButton) {
                        const row = removeButton.closest('.metric-row, .simple-row');
                        if (row) row.remove();
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
