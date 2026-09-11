<x-app-layout>

    <div class="container mx-auto px-4 py-6">

        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div class="min-w-0">

                <div class="mb-2 flex items-center gap-2">

                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                        <i class="bi bi-window-stack"></i>
                        SEO Landing Page
                    </span>

                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400">
                        <i class="bi bi-plus-circle"></i>
                        Create
                    </span>

                </div>

                <h1 class="break-words text-2xl font-bold text-gray-900 dark:text-gray-100 sm:text-3xl">
                    Create SEO Landing Page
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Create a structured, conversion-focused landing page for your SEO campaigns.
                </p>

            </div>

            <div class="flex flex-wrap items-center gap-2">

                <a href="{{ route('admin.seo-landing-pages.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-gray-500 px-4 py-2 text-sm text-white transition hover:bg-gray-600">

                    <i class="bi bi-arrow-left"></i>
                    Back

                </a>

            </div>

        </div>

        @if ($errors->any())

            <div
                class="mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-4 text-red-800 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-300">

                <i class="bi bi-exclamation-triangle-fill mt-0.5"></i>

                <div>

                    <p class="mb-1 text-sm font-semibold">
                        Please fix the following errors:
                    </p>

                    <ul class="list-disc space-y-1 pl-5 text-xs">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            </div>

        @endif

        <form action="{{ route('admin.seo-landing-pages.store') }}" method="POST" class="space-y-6">

            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <div class="space-y-6 lg:col-span-2">

                    {{-- Basic Information --}}
                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                            <div class="flex items-center gap-3 px-4">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">

                                    <i class="bi bi-pencil-square"></i>

                                </div>

                                <div>

                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        Page Information
                                    </h2>

                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                        Enter the basic information for this landing page.
                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="p-5">

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                <div class="md:col-span-2">

                                    <label for="title"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                        Page Title

                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                                        placeholder="Website Development" required autofocus
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                                    @error('title')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div>

                                    <label for="slug"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                        Slug

                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                        placeholder="website-development" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        URL-friendly page identifier.
                                    </p>

                                    @error('slug')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div>

                                    <label for="eyebrow"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                        Eyebrow

                                    </label>

                                    <input type="text" name="eyebrow" id="eyebrow" value="{{ old('eyebrow') }}"
                                        placeholder="Professional Web Solutions"
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                                    @error('eyebrow')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Hero --}}
                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                            <div class="flex items-center gap-3 px-4">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">

                                    <i class="bi bi-stars"></i>

                                </div>

                                <div>

                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        Hero Section
                                    </h2>

                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                        Configure the main content visitors see first.
                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="space-y-5 p-5">

                            <div>

                                <label for="hero_title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                    Hero Title

                                    <span class="text-red-500">*</span>

                                </label>

                                <input type="text" name="hero_title" id="hero_title" value="{{ old('hero_title') }}"
                                    placeholder="Build High-Performance Websites That Grow Your Business" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                                @error('hero_title')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror

                            </div>

                            <div>

                                <label for="hero_description"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                    Hero Description

                                </label>

                                <textarea name="hero_description" id="hero_description" rows="4"
                                    placeholder="Describe your service and the value it provides..."
                                    class="mt-1 block w-full resize-y rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">{{ old('hero_description') }}</textarea>

                                @error('hero_description')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror

                            </div>

                            <div>

                                <label for="hero_image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                    Hero Image

                                </label>

                                <input type="text" name="hero_image" id="hero_image" value="{{ old('hero_image') }}"
                                    placeholder="website/assets/images/services/website-development.webp"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    Enter the public image path.
                                </p>

                                @error('hero_image')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- CTA --}}
                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                            <div class="flex items-center gap-3 px-4">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">

                                    <i class="bi bi-mouse2"></i>

                                </div>

                                <div>

                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        Call To Action
                                    </h2>

                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                        Configure the primary and secondary actions.
                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="p-5">

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                <div>

                                    <label for="primary_cta"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Primary CTA
                                    </label>

                                    <input type="text" name="primary_cta" id="primary_cta"
                                        value="{{ old('primary_cta') }}" placeholder="Get Started"
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('primary_cta')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div>

                                    <label for="primary_cta_url"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Primary CTA URL
                                    </label>

                                    <input type="text" name="primary_cta_url" id="primary_cta_url"
                                        value="{{ old('primary_cta_url') }}" placeholder="/contact"
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('primary_cta_url')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div>

                                    <label for="secondary_cta"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Secondary CTA
                                    </label>

                                    <input type="text" name="secondary_cta" id="secondary_cta"
                                        value="{{ old('secondary_cta') }}" placeholder="View Our Work"
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('secondary_cta')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror

                                </div>

                                <div>

                                    <label for="secondary_cta_url"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Secondary CTA URL
                                    </label>

                                    <input type="text" name="secondary_cta_url" id="secondary_cta_url"
                                        value="{{ old('secondary_cta_url') }}" placeholder="/portfolio"
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-green-500 focus:ring-green-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('secondary_cta_url')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Trust Points --}}
                    <div class="form-section">

                        <div class="section-header">

                            <div
                                class="section-icon bg-yellow-100 text-yellow-600 dark:bg-yellow-900/30 dark:text-yellow-400">
                                <i class="bi bi-patch-check"></i>
                            </div>

                            <div>
                                <h2 class="section-title">Trust Points</h2>
                                <p class="section-description">
                                    Add short trust signals displayed near the hero section.
                                </p>
                            </div>

                        </div>

                        <div class="section-body">

                            <div id="trustPointsContainer" class="space-y-3">

                                @forelse (old('trust_points', []) as $point)
                                    <div class="repeater-item">

                                        <input type="text" name="trust_points[]" value="{{ $point }}"
                                            placeholder="Experienced development team" class="form-input">

                                        <button type="button" class="remove-button remove-repeater">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>

                                @empty

                                    <div class="repeater-item">

                                        <input type="text" name="trust_points[]"
                                            placeholder="Experienced development team" class="form-input">

                                        <button type="button" class="remove-button remove-repeater">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>
                                @endforelse

                            </div>

                            <button type="button" data-container="trustPointsContainer"
                                data-template="trustPointTemplate" class="add-button add-repeater">

                                <i class="bi bi-plus-circle"></i>
                                Add Trust Point

                            </button>

                        </div>

                    </div>


                    {{-- Problem --}}
                    <div class="form-section">

                        <div class="section-header">

                            <div class="section-icon bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400">
                                <i class="bi bi-exclamation-circle"></i>
                            </div>

                            <div>
                                <h2 class="section-title">Problem Section</h2>
                                <p class="section-description">
                                    Explain the problems your target customers are facing.
                                </p>
                            </div>

                        </div>

                        <div class="section-body space-y-5">

                            <div>

                                <label class="form-label">Section Title</label>

                                <input type="text" name="problem[title]" value="{{ old('problem.title') }}"
                                    placeholder="Why businesses struggle with their websites" class="form-input">

                            </div>

                            <div>

                                <label class="form-label">Section Text</label>

                                <textarea name="problem[text]" rows="4" placeholder="Explain the customer problem..." class="form-input">{{ old('problem.text') }}</textarea>

                            </div>

                            <div>

                                <label class="form-label">Problem Points</label>

                                <div id="problemPointsContainer" class="space-y-3">

                                    @forelse (old('problem.points', []) as $point)
                                        <div class="repeater-item">

                                            <input type="text" name="problem[points][]"
                                                value="{{ $point }}" placeholder="Slow website performance"
                                                class="form-input">

                                            <button type="button" class="remove-button remove-repeater">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </div>

                                    @empty

                                        <div class="repeater-item">

                                            <input type="text" name="problem[points][]"
                                                placeholder="Slow website performance" class="form-input">

                                            <button type="button" class="remove-button remove-repeater">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </div>
                                    @endforelse

                                </div>

                                <button type="button" data-container="problemPointsContainer"
                                    data-template="problemPointTemplate" class="add-button add-repeater">

                                    <i class="bi bi-plus-circle"></i>
                                    Add Problem Point

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- Solution --}}
                    <div class="form-section">

                        <div class="section-header">

                            <div
                                class="section-icon bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">
                                <i class="bi bi-lightbulb"></i>
                            </div>

                            <div>
                                <h2 class="section-title">Solution Section</h2>
                                <p class="section-description">
                                    Explain how your service solves those problems.
                                </p>
                            </div>

                        </div>

                        <div class="section-body space-y-5">

                            <div>

                                <label class="form-label">Section Title</label>

                                <input type="text" name="solution[title]" value="{{ old('solution.title') }}"
                                    placeholder="A better approach to modern web development" class="form-input">

                            </div>

                            <div>

                                <label class="form-label">Section Text</label>

                                <textarea name="solution[text]" rows="4" placeholder="Explain your solution..." class="form-input">{{ old('solution.text') }}</textarea>

                            </div>

                            <div>

                                <label class="form-label">Solution Points</label>

                                <div id="solutionPointsContainer" class="space-y-3">

                                    @forelse (old('solution.points', []) as $point)
                                        <div class="repeater-item">

                                            <input type="text" name="solution[points][]"
                                                value="{{ $point }}"
                                                placeholder="Responsive and conversion-focused design"
                                                class="form-input">

                                            <button type="button" class="remove-button remove-repeater">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </div>

                                    @empty

                                        <div class="repeater-item">

                                            <input type="text" name="solution[points][]"
                                                placeholder="Responsive and conversion-focused design"
                                                class="form-input">

                                            <button type="button" class="remove-button remove-repeater">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </div>
                                    @endforelse

                                </div>

                                <button type="button" data-container="solutionPointsContainer"
                                    data-template="solutionPointTemplate" class="add-button add-repeater">

                                    <i class="bi bi-plus-circle"></i>
                                    Add Solution Point

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- Capabilities --}}
                    <div class="form-section">

                        <div class="section-header">

                            <div
                                class="section-icon bg-indigo-100 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400">
                                <i class="bi bi-grid-3x3-gap"></i>
                            </div>

                            <div>
                                <h2 class="section-title">Capabilities</h2>
                                <p class="section-description">
                                    Add the key services or capabilities offered.
                                </p>
                            </div>

                        </div>

                        <div class="section-body">

                            <div id="capabilitiesContainer" class="space-y-4">

                                @forelse (old('capabilities', []) as $index => $capability)
                                    <div class="repeater-card">

                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                                            <div>
                                                <label class="form-label">Title</label>

                                                <input type="text" name="capabilities[{{ $index }}][title]"
                                                    value="{{ $capability['title'] ?? '' }}"
                                                    placeholder="Custom Web Development" class="form-input">
                                            </div>

                                            <div>
                                                <label class="form-label">Icon</label>

                                                <input type="text" name="capabilities[{{ $index }}][icon]"
                                                    value="{{ $capability['icon'] ?? '' }}"
                                                    placeholder="bi-code-slash" class="form-input">
                                            </div>

                                            <div class="md:col-span-2">
                                                <label class="form-label">Description</label>

                                                <textarea name="capabilities[{{ $index }}][text]" rows="3" placeholder="Describe this capability..."
                                                    class="form-input">{{ $capability['text'] ?? '' }}</textarea>
                                            </div>

                                        </div>

                                        <button type="button" class="remove-card remove-repeater">

                                            <i class="bi bi-trash"></i>
                                            Remove

                                        </button>

                                    </div>

                                @empty

                                    <div class="repeater-card">

                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                                            <div>
                                                <label class="form-label">Title</label>

                                                <input type="text" name="capabilities[0][title]"
                                                    placeholder="Custom Web Development" class="form-input">
                                            </div>

                                            <div>
                                                <label class="form-label">Icon</label>

                                                <input type="text" name="capabilities[0][icon]"
                                                    placeholder="bi-code-slash" class="form-input">
                                            </div>

                                            <div class="md:col-span-2">
                                                <label class="form-label">Description</label>

                                                <textarea name="capabilities[0][text]" rows="3" placeholder="Describe this capability..." class="form-input"></textarea>
                                            </div>

                                        </div>

                                        <button type="button" class="remove-card remove-repeater">

                                            <i class="bi bi-trash"></i>
                                            Remove

                                        </button>

                                    </div>
                                @endforelse

                            </div>

                            <button type="button" id="addCapability" class="add-button">

                                <i class="bi bi-plus-circle"></i>
                                Add Capability

                            </button>

                        </div>

                    </div>


                    {{-- Process --}}
                    <div class="form-section">

                        <div class="section-header">

                            <div class="section-icon bg-cyan-100 text-cyan-600 dark:bg-cyan-900/30 dark:text-cyan-400">
                                <i class="bi bi-list-check"></i>
                            </div>

                            <div>
                                <h2 class="section-title">Development Process</h2>
                                <p class="section-description">
                                    Define the steps customers can expect.
                                </p>
                            </div>

                        </div>

                        <div class="section-body">

                            <div id="processContainer" class="space-y-4">

                                @forelse (old('process', []) as $index => $process)
                                    <div class="repeater-card">

                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                                            <div>
                                                <label class="form-label">Number</label>

                                                <input type="text" name="process[{{ $index }}][number]"
                                                    value="{{ $process['number'] ?? '' }}" placeholder="01"
                                                    class="form-input">
                                            </div>

                                            <div class="md:col-span-2">
                                                <label class="form-label">Title</label>

                                                <input type="text" name="process[{{ $index }}][title]"
                                                    value="{{ $process['title'] ?? '' }}"
                                                    placeholder="Discovery & Planning" class="form-input">
                                            </div>

                                            <div class="md:col-span-3">
                                                <label class="form-label">Description</label>

                                                <textarea name="process[{{ $index }}][text]" rows="3" placeholder="Describe this process step..."
                                                    class="form-input">{{ $process['text'] ?? '' }}</textarea>
                                            </div>

                                        </div>

                                        <button type="button" class="remove-card remove-repeater">

                                            <i class="bi bi-trash"></i>
                                            Remove

                                        </button>

                                    </div>

                                @empty

                                    <div class="repeater-card">

                                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                                            <div>
                                                <label class="form-label">Number</label>

                                                <input type="text" name="process[0][number]" placeholder="01"
                                                    class="form-input">
                                            </div>

                                            <div class="md:col-span-2">
                                                <label class="form-label">Title</label>

                                                <input type="text" name="process[0][title]"
                                                    placeholder="Discovery & Planning" class="form-input">
                                            </div>

                                            <div class="md:col-span-3">
                                                <label class="form-label">Description</label>

                                                <textarea name="process[0][text]" rows="3" placeholder="Describe this process step..." class="form-input"></textarea>
                                            </div>

                                        </div>

                                        <button type="button" class="remove-card remove-repeater">

                                            <i class="bi bi-trash"></i>
                                            Remove

                                        </button>

                                    </div>
                                @endforelse

                            </div>

                            <button type="button" id="addProcess" class="add-button">

                                <i class="bi bi-plus-circle"></i>
                                Add Process Step

                            </button>

                        </div>

                    </div>


                    {{-- Technologies --}}
                    <div class="form-section">

                        <div class="section-header">

                            <div
                                class="section-icon bg-orange-100 text-orange-600 dark:bg-orange-900/30 dark:text-orange-400">
                                <i class="bi bi-cpu"></i>
                            </div>

                            <div>
                                <h2 class="section-title">Technologies</h2>
                                <p class="section-description">
                                    Add technologies, frameworks and platforms used.
                                </p>
                            </div>

                        </div>

                        <div class="section-body">

                            <div id="technologiesContainer" class="space-y-3">

                                @forelse (old('technologies', []) as $technology)
                                    <div class="repeater-item">

                                        <input type="text" name="technologies[]" value="{{ $technology }}"
                                            placeholder="Laravel" class="form-input">

                                        <button type="button" class="remove-button remove-repeater">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>

                                @empty

                                    <div class="repeater-item">

                                        <input type="text" name="technologies[]" placeholder="Laravel"
                                            class="form-input">

                                        <button type="button" class="remove-button remove-repeater">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>
                                @endforelse

                            </div>

                            <button type="button" data-container="technologiesContainer"
                                data-template="technologyTemplate" class="add-button add-repeater">

                                <i class="bi bi-plus-circle"></i>
                                Add Technology

                            </button>

                        </div>

                    </div>


                    {{-- Benefits --}}
                    <div class="form-section">

                        <div class="section-header">

                            <div
                                class="section-icon bg-emerald-100 text-emerald-600 dark:bg-emerald-900/30 dark:text-emerald-400">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>

                            <div>
                                <h2 class="section-title">Benefits</h2>
                                <p class="section-description">
                                    Highlight the business benefits customers receive.
                                </p>
                            </div>

                        </div>

                        <div class="section-body">

                            <div id="benefitsContainer" class="space-y-3">

                                @forelse (old('benefits', []) as $benefit)
                                    <div class="repeater-item">

                                        <input type="text" name="benefits[]" value="{{ $benefit }}"
                                            placeholder="Better website performance" class="form-input">

                                        <button type="button" class="remove-button remove-repeater">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>

                                @empty

                                    <div class="repeater-item">

                                        <input type="text" name="benefits[]"
                                            placeholder="Better website performance" class="form-input">

                                        <button type="button" class="remove-button remove-repeater">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>
                                @endforelse

                            </div>

                            <button type="button" data-container="benefitsContainer" data-template="benefitTemplate"
                                class="add-button add-repeater">

                                <i class="bi bi-plus-circle"></i>
                                Add Benefit

                            </button>

                        </div>

                    </div>


                    {{-- FAQs --}}
                    <div class="form-section">

                        <div class="section-header">

                            <div
                                class="section-icon bg-violet-100 text-violet-600 dark:bg-violet-900/30 dark:text-violet-400">
                                <i class="bi bi-question-circle"></i>
                            </div>

                            <div>
                                <h2 class="section-title">Frequently Asked Questions</h2>
                                <p class="section-description">
                                    Add questions and answers related to this landing page.
                                </p>
                            </div>

                        </div>

                        <div class="section-body">

                            <div id="faqsContainer" class="space-y-4">

                                @forelse (old('faqs', []) as $index => $faq)
                                    <div class="repeater-card">

                                        <div class="space-y-4">

                                            <div>
                                                <label class="form-label">Question</label>

                                                <input type="text" name="faqs[{{ $index }}][question]"
                                                    value="{{ $faq['question'] ?? '' }}"
                                                    placeholder="How long does development take?" class="form-input">
                                            </div>

                                            <div>
                                                <label class="form-label">Answer</label>

                                                <textarea name="faqs[{{ $index }}][answer]" rows="4" placeholder="Write the answer..."
                                                    class="form-input">{{ $faq['answer'] ?? '' }}</textarea>
                                            </div>

                                        </div>

                                        <button type="button" class="remove-card remove-repeater">

                                            <i class="bi bi-trash"></i>
                                            Remove FAQ

                                        </button>

                                    </div>

                                @empty

                                    <div class="repeater-card">

                                        <div class="space-y-4">

                                            <div>
                                                <label class="form-label">Question</label>

                                                <input type="text" name="faqs[0][question]"
                                                    placeholder="How long does development take?" class="form-input">
                                            </div>

                                            <div>
                                                <label class="form-label">Answer</label>

                                                <textarea name="faqs[0][answer]" rows="4" placeholder="Write the answer..." class="form-input"></textarea>
                                            </div>

                                        </div>

                                        <button type="button" class="remove-card remove-repeater">

                                            <i class="bi bi-trash"></i>
                                            Remove FAQ

                                        </button>

                                    </div>
                                @endforelse

                            </div>

                            <button type="button" id="addFaq" class="add-button">

                                <i class="bi bi-plus-circle"></i>
                                Add FAQ

                            </button>

                        </div>

                    </div>


                    {{-- Related Pages --}}
                    <div class="form-section">

                        <div class="section-header">

                            <div class="section-icon bg-pink-100 text-pink-600 dark:bg-pink-900/30 dark:text-pink-400">
                                <i class="bi bi-link-45deg"></i>
                            </div>

                            <div>
                                <h2 class="section-title">Related Pages</h2>
                                <p class="section-description">
                                    Add the slugs of related landing pages for internal linking.
                                </p>
                            </div>

                        </div>

                        <div class="section-body">

                            <div id="relatedPagesContainer" class="space-y-3">

                                @forelse (old('related_pages', []) as $relatedPage)
                                    <div class="repeater-item">

                                        <input type="text" name="related_pages[]" value="{{ $relatedPage }}"
                                            placeholder="software-development" class="form-input">

                                        <button type="button" class="remove-button remove-repeater">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>

                                @empty

                                    <div class="repeater-item">

                                        <input type="text" name="related_pages[]"
                                            placeholder="software-development" class="form-input">

                                        <button type="button" class="remove-button remove-repeater">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>
                                @endforelse

                            </div>

                            <button type="button" data-container="relatedPagesContainer"
                                data-template="relatedPageTemplate" class="add-button add-repeater">

                                <i class="bi bi-plus-circle"></i>
                                Add Related Page

                            </button>

                        </div>

                    </div>

                </div>


                {{-- Sidebar --}}
                <aside class="space-y-6">

                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="border-b border-gray-200 px-4 py-4 dark:border-gray-700">

                            <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                Publication Details
                            </h2>

                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Manage the visibility and ordering of this page.
                            </p>

                        </div>

                        <div class="space-y-5 p-5">

                            <div>

                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Page Status
                                </label>

                                <div
                                    class="flex w-full items-center justify-between rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 dark:border-gray-700 dark:bg-gray-900">

                                    <div class="flex min-w-0 items-center gap-3">

                                        <div id="statusIconWrapper"
                                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">

                                            <i id="statusIcon" class="bi bi-check-circle-fill"></i>

                                        </div>

                                        <div class="min-w-0">

                                            <p id="statusText"
                                                class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                Active
                                            </p>

                                            <p id="statusDescription"
                                                class="text-xs text-gray-500 dark:text-gray-400">
                                                This page is active and visible to visitors.
                                            </p>

                                        </div>

                                    </div>

                                    <label for="status" class="ml-4 flex flex-shrink-0 cursor-pointer items-center">

                                        <input type="hidden" name="status" value="0">

                                        <input type="checkbox" name="status" id="status" value="1"
                                            {{ old('status', true) ? 'checked' : '' }} class="status-checkbox">

                                        <span class="status-checkmark">
                                            <i class="bi bi-check-lg"></i>
                                        </span>

                                    </label>

                                </div>

                                @error('status')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror

                            </div>


                            <div>

                                <label for="sort_order"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                    Sort Order

                                </label>

                                <input type="number" name="sort_order" id="sort_order" min="0"
                                    value="{{ old('sort_order', 0) }}"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    Lower numbers appear first.
                                </p>

                                @error('sort_order')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </div>


                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="flex flex-col gap-2">

                            @can('create_landing_page')
                                <button type="submit"
                                    class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-500 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-blue-600">

                                    <i class="bi bi-check-lg"></i>

                                    Create Landing Page

                                </button>
                            @endcan

                            <a href="{{ route('admin.seo-landing-pages.index') }}"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-gray-500 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-gray-600">

                                <i class="bi bi-x-lg"></i>

                                Cancel

                            </a>

                        </div>

                    </div>

                </aside>

            </div>

        </form>

    </div>


    @push('styles')
        <style>
            .form-section {
                overflow: hidden;
                border: 1px solid #e5e7eb;
                border-radius: 0.75rem;
                background: #ffffff;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            }

            .dark .form-section {
                border-color: #374151;
                background: #1f2937;
            }

            .section-header {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                border-bottom: 1px solid #e5e7eb;
                padding: 1rem 1.25rem;
            }

            .dark .section-header {
                border-color: #374151;
            }

            .section-icon {
                display: flex;
                height: 2.25rem;
                width: 2.25rem;
                flex-shrink: 0;
                align-items: center;
                justify-content: center;
                border-radius: 0.5rem;
            }

            .section-title {
                font-size: 0.875rem;
                font-weight: 600;
                color: #111827;
            }

            .dark .section-title {
                color: #f3f4f6;
            }

            .section-description {
                margin-top: 0.125rem;
                font-size: 0.75rem;
                color: #6b7280;
            }

            .dark .section-description {
                color: #9ca3af;
            }

            .section-body {
                padding: 1.25rem;
            }

            .form-label {
                display: block;
                margin-bottom: 0.25rem;
                font-size: 0.875rem;
                font-weight: 500;
                color: #374151;
            }

            .dark .form-label {
                color: #d1d5db;
            }

            .form-input {
                display: block;
                width: 100%;
                border-radius: 0.5rem;
                border: 1px solid #d1d5db;
                background: #ffffff;
                color: #111827;
                font-size: 0.875rem;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            }

            .form-input:focus {
                border-color: #3b82f6;
                outline: none;
                box-shadow: 0 0 0 1px #3b82f6;
            }

            .dark .form-input {
                border-color: #374151;
                background: #111827;
                color: #f3f4f6;
            }

            .dark .form-input::placeholder {
                color: #6b7280;
            }

            .repeater-item {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .repeater-item .form-input {
                flex: 1;
            }

            .repeater-card {
                position: relative;
                border: 1px solid #e5e7eb;
                border-radius: 0.75rem;
                background: #f9fafb;
                padding: 1rem;
            }

            .dark .repeater-card {
                border-color: #374151;
                background: #111827;
            }

            .remove-button {
                display: flex;
                height: 2.5rem;
                width: 2.5rem;
                flex-shrink: 0;
                align-items: center;
                justify-content: center;
                border-radius: 0.5rem;
                background: #fee2e2;
                color: #dc2626;
                transition: all 0.2s ease;
            }

            .remove-button:hover {
                background: #fecaca;
            }

            .dark .remove-button {
                background: rgba(127, 29, 29, 0.25);
                color: #f87171;
            }

            .remove-card {
                display: inline-flex;
                align-items: center;
                gap: 0.375rem;
                margin-top: 1rem;
                border-radius: 0.5rem;
                background: #fee2e2;
                padding: 0.4rem 0.7rem;
                font-size: 0.75rem;
                font-weight: 500;
                color: #dc2626;
                transition: all 0.2s ease;
            }

            .remove-card:hover {
                background: #fecaca;
            }

            .dark .remove-card {
                background: rgba(127, 29, 29, 0.25);
                color: #f87171;
            }

            .add-button {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                margin-top: 0.75rem;
                border-radius: 0.5rem;
                background: #eff6ff;
                padding: 0.5rem 0.75rem;
                font-size: 0.75rem;
                font-weight: 500;
                color: #2563eb;
                transition: all 0.2s ease;
            }

            .add-button:hover {
                background: #dbeafe;
            }

            .dark .add-button {
                background: rgba(30, 64, 175, 0.2);
                color: #60a5fa;
            }

            .status-checkbox {
                position: absolute;
                width: 0;
                height: 0;
                opacity: 0;
                pointer-events: none;
            }

            .status-checkmark {
                display: flex;
                height: 24px;
                width: 24px;
                align-items: center;
                justify-content: center;
                border: 2px solid #d1d5db;
                border-radius: 6px;
                background: #ffffff;
                color: transparent;
                transition: all 0.2s ease;
            }

            .status-checkmark i {
                font-size: 15px;
                font-weight: 700;
                line-height: 1;
            }

            .status-checkbox:checked+.status-checkmark {
                border-color: #22c55e;
                background-color: #22c55e;
                color: #ffffff;
            }

            .dark .status-checkmark {
                border-color: #4b5563;
                background-color: #111827;
            }

            .dark .status-checkbox:checked+.status-checkmark {
                border-color: #22c55e;
                background-color: #22c55e;
            }

            @media (max-width: 640px) {

                .section-header {
                    padding: 1rem;
                }

                .section-body {
                    padding: 1rem;
                }

                .repeater-card {
                    padding: 0.875rem;
                }

            }
        </style>
    @endpush


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const titleInput = document.getElementById('title');
                const slugInput = document.getElementById('slug');

                if (titleInput && slugInput) {

                    let slugManuallyEdited = slugInput.value.trim() !== '';

                    titleInput.addEventListener('input', function() {

                        if (slugManuallyEdited) {
                            return;
                        }

                        slugInput.value = this.value
                            .toLowerCase()
                            .trim()
                            .replace(/[^a-z0-9\s-]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');

                    });

                    slugInput.addEventListener('input', function() {
                        slugManuallyEdited = this.value.trim() !== '';
                    });

                }


                function escapeHtml(value) {

                    return String(value ?? '')
                        .replace(/&/g, '&amp;')
                        .replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;')
                        .replace(/"/g, '&quot;')
                        .replace(/'/g, '&#039;');

                }


                function addSimpleRepeater(containerId, name, placeholder) {

                    const container = document.getElementById(containerId);

                    if (!container) {
                        return;
                    }

                    const item = document.createElement('div');

                    item.className = 'repeater-item';

                    item.innerHTML = `
                        <input
                            type="text"
                            name="${name}"
                            placeholder="${escapeHtml(placeholder)}"
                            class="form-input"
                        >

                        <button type="button" class="remove-button remove-repeater">
                            <i class="bi bi-trash"></i>
                        </button>
                    `;

                    container.appendChild(item);

                }


                document.addEventListener('click', function(event) {

                    const removeButton = event.target.closest('.remove-repeater');

                    if (removeButton) {

                        const parent =
                            removeButton.closest('.repeater-item, .repeater-card');

                        if (parent) {
                            parent.remove();
                        }

                        return;
                    }


                    const repeaterButton =
                        event.target.closest('.add-repeater');

                    if (!repeaterButton) {
                        return;
                    }

                    const containerId =
                        repeaterButton.dataset.container;

                    const templateId =
                        repeaterButton.dataset.template;

                    const container =
                        document.getElementById(containerId);

                    const template =
                        document.getElementById(templateId);

                    if (!container || !template) {
                        return;
                    }

                    container.insertAdjacentHTML(
                        'beforeend',
                        template.innerHTML
                    );

                });


                document.getElementById('addCapability')
                    ?.addEventListener('click', function() {

                        const container =
                            document.getElementById('capabilitiesContainer');

                        if (!container) {
                            return;
                        }

                        const index =
                            container.querySelectorAll('.repeater-card').length;

                        container.insertAdjacentHTML(
                            'beforeend',
                            `
                            <div class="repeater-card">

                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                                    <div>
                                        <label class="form-label">Title</label>

                                        <input
                                            type="text"
                                            name="capabilities[${index}][title]"
                                            placeholder="Custom Web Development"
                                            class="form-input"
                                        >
                                    </div>

                                    <div>
                                        <label class="form-label">Icon</label>

                                        <input
                                            type="text"
                                            name="capabilities[${index}][icon]"
                                            placeholder="bi-code-slash"
                                            class="form-input"
                                        >
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="form-label">Description</label>

                                        <textarea
                                            name="capabilities[${index}][text]"
                                            rows="3"
                                            placeholder="Describe this capability..."
                                            class="form-input"
                                        ></textarea>
                                    </div>

                                </div>

                                <button
                                    type="button"
                                    class="remove-card remove-repeater">

                                    <i class="bi bi-trash"></i>
                                    Remove

                                </button>

                            </div>
                            `
                        );

                    });


                document.getElementById('addProcess')
                    ?.addEventListener('click', function() {

                        const container =
                            document.getElementById('processContainer');

                        if (!container) {
                            return;
                        }

                        const index =
                            container.querySelectorAll('.repeater-card').length;

                        container.insertAdjacentHTML(
                            'beforeend',
                            `
                            <div class="repeater-card">

                                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                                    <div>
                                        <label class="form-label">Number</label>

                                        <input
                                            type="text"
                                            name="process[${index}][number]"
                                            placeholder="01"
                                            class="form-input"
                                        >
                                    </div>

                                    <div class="md:col-span-2">
                                        <label class="form-label">Title</label>

                                        <input
                                            type="text"
                                            name="process[${index}][title]"
                                            placeholder="Discovery & Planning"
                                            class="form-input"
                                        >
                                    </div>

                                    <div class="md:col-span-3">
                                        <label class="form-label">Description</label>

                                        <textarea
                                            name="process[${index}][text]"
                                            rows="3"
                                            placeholder="Describe this process step..."
                                            class="form-input"
                                        ></textarea>
                                    </div>

                                </div>

                                <button
                                    type="button"
                                    class="remove-card remove-repeater">

                                    <i class="bi bi-trash"></i>
                                    Remove

                                </button>

                            </div>
                            `
                        );

                    });


                document.getElementById('addFaq')
                    ?.addEventListener('click', function() {

                        const container =
                            document.getElementById('faqsContainer');

                        if (!container) {
                            return;
                        }

                        const index =
                            container.querySelectorAll('.repeater-card').length;

                        container.insertAdjacentHTML(
                            'beforeend',
                            `
                            <div class="repeater-card">

                                <div class="space-y-4">

                                    <div>
                                        <label class="form-label">Question</label>

                                        <input
                                            type="text"
                                            name="faqs[${index}][question]"
                                            placeholder="How long does development take?"
                                            class="form-input"
                                        >
                                    </div>

                                    <div>
                                        <label class="form-label">Answer</label>

                                        <textarea
                                            name="faqs[${index}][answer]"
                                            rows="4"
                                            placeholder="Write the answer..."
                                            class="form-input"
                                        ></textarea>
                                    </div>

                                </div>

                                <button
                                    type="button"
                                    class="remove-card remove-repeater">

                                    <i class="bi bi-trash"></i>
                                    Remove FAQ

                                </button>

                            </div>
                            `
                        );

                    });


                function updateStatusUI() {

                    const statusInput =
                        document.getElementById('status');

                    const statusText =
                        document.getElementById('statusText');

                    const statusDescription =
                        document.getElementById('statusDescription');

                    const statusIcon =
                        document.getElementById('statusIcon');

                    const statusIconWrapper =
                        document.getElementById('statusIconWrapper');

                    if (!statusInput) {
                        return;
                    }

                    if (statusInput.checked) {

                        statusText.textContent = 'Active';

                        statusDescription.textContent =
                            'This page is active and visible to visitors.';

                        statusIcon.className =
                            'bi bi-check-circle-fill';

                        statusIconWrapper.className =
                            'flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400';

                    } else {

                        statusText.textContent = 'Inactive';

                        statusDescription.textContent =
                            'This page is inactive and hidden from visitors.';

                        statusIcon.className =
                            'bi bi-file-earmark-text';

                        statusIconWrapper.className =
                            'flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-gray-200 text-gray-600 dark:bg-gray-800 dark:text-gray-400';

                    }

                }


                const statusInput =
                    document.getElementById('status');

                if (statusInput) {

                    statusInput.addEventListener(
                        'change',
                        updateStatusUI
                    );

                    updateStatusUI();

                }

            });
        </script>


        {{-- Repeater Templates --}}

        <template id="trustPointTemplate">
            <div class="repeater-item">

                <input type="text" name="trust_points[]" placeholder="Experienced development team"
                    class="form-input">

                <button type="button" class="remove-button remove-repeater">
                    <i class="bi bi-trash"></i>
                </button>

            </div>
        </template>


        <template id="problemPointTemplate">
            <div class="repeater-item">

                <input type="text" name="problem[points][]" placeholder="Slow website performance"
                    class="form-input">

                <button type="button" class="remove-button remove-repeater">
                    <i class="bi bi-trash"></i>
                </button>

            </div>
        </template>


        <template id="solutionPointTemplate">
            <div class="repeater-item">

                <input type="text" name="solution[points][]" placeholder="Responsive and conversion-focused design"
                    class="form-input">

                <button type="button" class="remove-button remove-repeater">
                    <i class="bi bi-trash"></i>
                </button>

            </div>
        </template>


        <template id="technologyTemplate">
            <div class="repeater-item">

                <input type="text" name="technologies[]" placeholder="Laravel" class="form-input">

                <button type="button" class="remove-button remove-repeater">
                    <i class="bi bi-trash"></i>
                </button>

            </div>
        </template>


        <template id="benefitTemplate">
            <div class="repeater-item">

                <input type="text" name="benefits[]" placeholder="Better website performance" class="form-input">

                <button type="button" class="remove-button remove-repeater">
                    <i class="bi bi-trash"></i>
                </button>

            </div>
        </template>


        <template id="relatedPageTemplate">
            <div class="repeater-item">

                <input type="text" name="related_pages[]" placeholder="software-development" class="form-input">

                <button type="button" class="remove-button remove-repeater">
                    <i class="bi bi-trash"></i>
                </button>

            </div>
        </template>
    @endpush

</x-app-layout>
