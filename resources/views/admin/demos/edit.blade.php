<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="border-b border-gray-200 px-5 py-5 dark:border-gray-700">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                                <i class="bi bi-pencil-square text-blue-600 dark:text-blue-400"></i>
                            </div>

                            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                Edit Demo
                            </h1>
                        </div>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Update the details and presentation of this Demo Library project.
                        </p>
                    </div>

                    <div class="flex flex-col gap-2 sm:flex-row">
                        @can('view_demo')
                            <a href="{{ route('admin.demos.show', $demo) }}"
                                class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                                <i class="bi bi-eye"></i>
                                View Demo
                            </a>
                        @endcan

                        <a href="{{ route('admin.demos.index') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                            <i class="bi bi-arrow-left"></i>
                            Back to Demos
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-5">
                @if ($errors->any())
                    <div
                        class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 dark:border-red-800 dark:bg-red-900/20">
                        <div class="flex items-start gap-3">
                            <i class="bi bi-exclamation-triangle-fill mt-0.5 text-red-600 dark:text-red-400"></i>

                            <div>
                                <h3 class="font-semibold text-red-800 dark:text-red-300">
                                    Please fix the following errors:
                                </h3>

                                <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700 dark:text-red-400">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.demos.update', $demo) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div>
                        <div class="mb-4 border-b border-gray-200 pb-3 dark:border-gray-700">
                            <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                Basic Information
                            </h2>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Update the main information about this demo project.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                            <div>
                                <label for="category_id"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Category <span class="text-red-500">*</span>
                                </label>

                                <select name="category_id" id="category_id" required
                                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">
                                    <option value="">Select Category</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $demo->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="title"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Demo Title <span class="text-red-500">*</span>
                                </label>

                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $demo->title) }}" required maxlength="180"
                                    placeholder="e.g. Premium Doctor Portfolio"
                                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">

                                @error('title')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="slug"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Slug
                                </label>

                                <input type="text" name="slug" id="slug"
                                    value="{{ old('slug', $demo->slug) }}" maxlength="200"
                                    placeholder="premium-doctor-portfolio"
                                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">

                                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                                    Change this only if you want to change the public demo URL.
                                </p>

                                @error('slug')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="technology"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Technology
                                </label>

                                <input type="text" name="technology" id="technology"
                                    value="{{ old('technology', $demo->technology) }}" maxlength="500"
                                    placeholder="Laravel, Bootstrap, JavaScript"
                                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">

                                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                                    Separate multiple technologies with commas.
                                </p>

                                @error('technology')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label for="short_description"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Short Description
                                </label>

                                <textarea name="short_description" id="short_description" rows="3" maxlength="500"
                                    placeholder="A short description that will appear on demo cards and previews..."
                                    class="block w-full resize-y rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">{{ old('short_description', $demo->short_description) }}</textarea>

                                <div class="mt-1.5 flex justify-end">
                                    <span id="shortDescriptionCounter" class="text-xs text-gray-400">
                                        0 / 500
                                    </span>
                                </div>

                                @error('short_description')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label for="description"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Full Description
                                </label>

                                <textarea name="description" id="description" rows="8"
                                    placeholder="Describe the project, its purpose, features, design approach, functionality, and other important details..."
                                    class="block w-full resize-y rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm leading-6 text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">{{ old('description', $demo->description) }}</textarea>

                                @error('description')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4 border-b border-gray-200 pb-3 dark:border-gray-700">
                            <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                Demo Media
                            </h2>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Replace the images used to represent this demo project.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                            <div>
                                <label for="thumbnail"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Thumbnail
                                </label>

                                <div id="thumbnailDropzone"
                                    class="relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-blue-400 dark:border-gray-600 dark:bg-gray-700/40">
                                    @if ($demo->thumbnail)
                                        <div id="thumbnailPreview" class="aspect-video w-full overflow-hidden">
                                            <img id="thumbnailPreviewImage"
                                                src="{{ asset('storage/' . $demo->thumbnail) }}"
                                                alt="{{ $demo->title }}" class="h-full w-full object-cover">
                                        </div>

                                        <div
                                            class="border-t border-gray-200 bg-white/90 px-4 py-3 dark:border-gray-600 dark:bg-gray-800/90">
                                            <label for="thumbnail"
                                                class="flex cursor-pointer items-center justify-center gap-2 text-sm font-medium text-blue-600 transition hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                                                <i class="bi bi-arrow-repeat"></i>
                                                Replace Thumbnail
                                            </label>
                                        </div>
                                    @else
                                        <div id="thumbnailPreview" class="hidden aspect-video w-full overflow-hidden">
                                            <img id="thumbnailPreviewImage" src="" alt="Thumbnail preview"
                                                class="h-full w-full object-cover">
                                        </div>

                                        <label for="thumbnail" id="thumbnailUploadArea"
                                            class="flex cursor-pointer flex-col items-center justify-center px-6 py-10 text-center">
                                            <div
                                                class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/30">
                                                <i class="bi bi-image text-xl text-blue-600 dark:text-blue-400"></i>
                                            </div>

                                            <p class="mt-3 text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                Upload thumbnail
                                            </p>

                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                                JPG, JPEG, PNG or WEBP · Max 2MB
                                            </p>
                                        </label>
                                    @endif

                                    <input type="file" name="thumbnail" id="thumbnail"
                                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" class="hidden">
                                </div>

                                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                                    Leave empty to keep the current thumbnail.
                                </p>

                                @error('thumbnail')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="preview_image"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Preview Image
                                </label>

                                <div id="previewDropzone"
                                    class="relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-purple-400 dark:border-gray-600 dark:bg-gray-700/40">
                                    @if ($demo->preview_image)
                                        <div id="previewImageContainer" class="aspect-video w-full overflow-hidden">
                                            <img id="previewImage"
                                                src="{{ asset('storage/' . $demo->preview_image) }}"
                                                alt="{{ $demo->title }} preview" class="h-full w-full object-cover">
                                        </div>

                                        <div
                                            class="border-t border-gray-200 bg-white/90 px-4 py-3 dark:border-gray-600 dark:bg-gray-800/90">
                                            <label for="preview_image"
                                                class="flex cursor-pointer items-center justify-center gap-2 text-sm font-medium text-purple-600 transition hover:text-purple-700 dark:text-purple-400 dark:hover:text-purple-300">
                                                <i class="bi bi-arrow-repeat"></i>
                                                Replace Preview Image
                                            </label>
                                        </div>
                                    @else
                                        <div id="previewImageContainer"
                                            class="hidden aspect-video w-full overflow-hidden">
                                            <img id="previewImage" src="" alt="Preview image"
                                                class="h-full w-full object-cover">
                                        </div>

                                        <label for="preview_image" id="previewUploadArea"
                                            class="flex cursor-pointer flex-col items-center justify-center px-6 py-10 text-center">
                                            <div
                                                class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-100 dark:bg-purple-900/30">
                                                <i
                                                    class="bi bi-window text-xl text-purple-600 dark:text-purple-400"></i>
                                            </div>

                                            <p class="mt-3 text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                Upload preview image
                                            </p>

                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                                JPG, JPEG, PNG or WEBP · Max 4MB
                                            </p>
                                        </label>
                                    @endif

                                    <input type="file" name="preview_image" id="preview_image"
                                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" class="hidden">
                                </div>

                                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                                    Leave empty to keep the current preview image.
                                </p>

                                @error('preview_image')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4 border-b border-gray-200 pb-3 dark:border-gray-700">
                            <h2 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                Demo Settings
                            </h2>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Configure the live preview and display settings for this demo.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                            <div class="lg:col-span-2">
                                <label for="demo_url"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Live Demo URL
                                </label>

                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="bi bi-link-45deg text-gray-400"></i>
                                    </div>

                                    <input type="url" name="demo_url" id="demo_url"
                                        value="{{ old('demo_url', $demo->demo_url) }}" maxlength="500"
                                        placeholder="https://example.com"
                                        class="block w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">
                                </div>

                                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                                    Enter the public URL where visitors can view the live project.
                                </p>

                                @error('demo_url')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="sort_order"
                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Sort Order
                                </label>

                                <input type="number" name="sort_order" id="sort_order"
                                    value="{{ old('sort_order', $demo->sort_order ?? 0) }}" min="0"
                                    step="1" placeholder="0"
                                    class="block w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">

                                <p class="mt-1.5 text-xs text-gray-500 dark:text-gray-400">
                                    Lower values appear first.
                                </p>

                                @error('sort_order')
                                    <p class="mt-1.5 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex items-end">
                                <div class="grid w-full grid-cols-1 gap-3 sm:grid-cols-2">
                                    <label for="status"
                                        class="flex cursor-pointer items-center justify-between rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-700/40">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex h-9 w-9 items-center justify-center rounded-lg bg-green-100 dark:bg-green-900/30">
                                                <i class="bi bi-check-circle text-green-600 dark:text-green-400"></i>
                                            </div>

                                            <div>
                                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                    Active
                                                </p>

                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    Show publicly
                                                </p>
                                            </div>
                                        </div>

                                        <div class="relative">
                                            <input type="hidden" name="status" value="0">

                                            <input type="checkbox" name="status" id="status" value="1"
                                                {{ old('status', $demo->status) ? 'checked' : '' }}
                                                class="peer sr-only">

                                            <div
                                                class="h-6 w-11 rounded-full bg-gray-300 transition peer-checked:bg-green-600 dark:bg-gray-600">
                                            </div>

                                            <div
                                                class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5">
                                            </div>
                                        </div>
                                    </label>

                                    <label for="featured"
                                        class="flex cursor-pointer items-center justify-between rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-700/40">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/30">
                                                <i class="bi bi-star text-amber-600 dark:text-amber-400"></i>
                                            </div>

                                            <div>
                                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                    Featured
                                                </p>

                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    Highlight this demo
                                                </p>
                                            </div>
                                        </div>

                                        <div class="relative">
                                            <input type="hidden" name="featured" value="0">

                                            <input type="checkbox" name="featured" id="featured" value="1"
                                                {{ old('featured', $demo->featured) ? 'checked' : '' }}
                                                class="peer sr-only">

                                            <div
                                                class="h-6 w-11 rounded-full bg-gray-300 transition peer-checked:bg-amber-500 dark:bg-gray-600">
                                            </div>

                                            <div
                                                class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-5 sm:flex-row sm:items-center sm:justify-end dark:border-gray-700">
                        <a href="{{ route('admin.demos.index') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                            Cancel
                        </a>

                        @can('edit_demo')
                            <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                <i class="bi bi-check2-circle"></i>
                                Update Demo
                            </button>
                        @endcan
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const titleInput = document.getElementById('title');
                const slugInput = document.getElementById('slug');

                if (titleInput && slugInput) {
                    const originalSlug = @json($demo->slug);

                    let slugManuallyChanged =
                        slugInput.value.trim() !== '' &&
                        slugInput.value.trim() !== originalSlug;

                    const generateSlug = function(value) {
                        return value
                            .toLowerCase()
                            .trim()
                            .replace(/[^a-z0-9\s-]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');
                    };

                    slugInput.addEventListener('input', function() {
                        slugManuallyChanged = true;
                        this.value = generateSlug(this.value);
                    });

                    titleInput.addEventListener('input', function() {
                        if (slugManuallyChanged) {
                            return;
                        }

                        slugInput.value = generateSlug(this.value);
                    });
                }

                const shortDescription = document.getElementById('short_description');
                const shortDescriptionCounter = document.getElementById('shortDescriptionCounter');

                function updateShortDescriptionCounter() {
                    if (!shortDescription || !shortDescriptionCounter) {
                        return;
                    }

                    shortDescriptionCounter.textContent =
                        `${shortDescription.value.length} / 500`;
                }

                if (shortDescription) {
                    shortDescription.addEventListener(
                        'input',
                        updateShortDescriptionCounter
                    );

                    updateShortDescriptionCounter();
                }

                function previewImage(input, previewContainer, preview, uploadArea) {
                    if (!input || !previewContainer || !preview) {
                        return;
                    }

                    input.addEventListener('change', function() {
                        const file = this.files && this.files[0];

                        if (!file) {
                            return;
                        }

                        if (!file.type.startsWith('image/')) {
                            this.value = '';
                            return;
                        }

                        const reader = new FileReader();

                        reader.onload = function(event) {
                            preview.src = event.target.result;
                            previewContainer.classList.remove('hidden');

                            if (uploadArea) {
                                uploadArea.classList.add('hidden');
                            }
                        };

                        reader.readAsDataURL(file);
                    });
                }

                previewImage(
                    document.getElementById('thumbnail'),
                    document.getElementById('thumbnailPreview'),
                    document.getElementById('thumbnailPreviewImage'),
                    document.getElementById('thumbnailUploadArea')
                );

                previewImage(
                    document.getElementById('preview_image'),
                    document.getElementById('previewImageContainer'),
                    document.getElementById('previewImage'),
                    document.getElementById('previewUploadArea')
                );
            });
        </script>
    @endpush
</x-app-layout>
