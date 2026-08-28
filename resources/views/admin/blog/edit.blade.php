<x-app-layout>

    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800 rounded-lg shadow">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">

            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    Edit Blog Post
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Update and manage your blog post.
                </p>
            </div>

            <a href="{{ route('admin.blogs.index') }}"
                class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm transition">
                <i class="bi bi-arrow-left"></i>
                Back to Blogs
            </a>

        </div>

        @if ($errors->any())

            <div
                class="mb-6 p-4 rounded-lg bg-red-100 border border-red-200 text-red-800 dark:bg-red-900/30 dark:border-red-800 dark:text-red-300">

                <div class="flex items-start gap-3">

                    <i class="bi bi-exclamation-triangle-fill mt-0.5"></i>

                    <div>

                        <p class="font-semibold mb-1">
                            Please fix the following errors:
                        </p>

                        <ul class="list-disc pl-5 text-sm space-y-1">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif

        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                {{-- Blog Title --}}
                <div class="min-w-0">

                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Blog Title <span class="text-red-500">*</span>
                    </label>

                    <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                        placeholder="Enter blog post title" required autofocus
                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                    @error('title')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Category --}}
                <div class="min-w-0">

                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Category <span class="text-red-500">*</span>
                    </label>

                    <select name="category_id" id="category_id" required
                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                        <option value="">
                            Select Category
                        </option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('category_id')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Slug --}}
                <div class="min-w-0">

                    <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Slug
                    </label>

                    <input type="text" name="slug" id="slug" value="{{ old('slug', $blog->slug) }}"
                        placeholder="blog-post-slug"
                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Leave empty to generate automatically from the title.
                    </p>

                    @error('slug')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Featured Image --}}
                <div class="min-w-0">

                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Featured Image
                    </label>

                    <div id="imageDropZone"
                        class="relative w-full min-h-[180px] cursor-pointer overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 px-4 py-5 text-center transition hover:border-blue-400 hover:bg-blue-50/50 dark:border-gray-600 dark:bg-gray-900 dark:hover:border-blue-500 dark:hover:bg-blue-900/10">

                        <input type="file" name="featured_image" id="featured_image"
                            accept="image/jpeg,image/png,image/webp,image/jpg" class="hidden">

                        {{-- Upload State --}}
                        <div id="imageUploadState" class="{{ $blog->featured_image ? 'hidden' : '' }}">

                            <div
                                class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">

                                <i class="bi bi-cloud-arrow-up text-xl"></i>

                            </div>

                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                Drop your image here
                            </p>

                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                or
                                <span class="font-semibold text-blue-600 dark:text-blue-400">
                                    click to browse
                                </span>
                            </p>

                            <p class="mt-2 text-[11px] text-gray-400 dark:text-gray-500">
                                JPG, PNG or WEBP · Maximum 5MB
                            </p>

                        </div>

                        {{-- Preview State --}}
                        <div id="imagePreviewState"
                            class="{{ $blog->featured_image ? '' : 'hidden' }} w-full overflow-hidden">

                            <div class="blog-image-preview-card">

                                <div class="blog-image-preview-frame">

                                    <img id="imagePreview"
                                        src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : '' }}"
                                        alt="Featured image preview" class="blog-image-preview">

                                    <div class="blog-image-preview-footer">

                                        <div class="flex min-w-0 items-center gap-2">

                                            <i class="bi bi-image flex-shrink-0"></i>

                                            <span id="imageFileName" class="block min-w-0 truncate text-xs">
                                                {{ $blog->featured_image ? basename($blog->featured_image) : '' }}
                                            </span>

                                        </div>

                                        <button type="button" id="removeImage"
                                            class="ml-3 flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-md bg-white/20 text-white transition hover:bg-red-500"
                                            title="Remove image">

                                            <i class="bi bi-x-lg text-xs"></i>

                                        </button>

                                    </div>

                                </div>

                            </div>

                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                Click or drop another image to replace it.
                            </p>

                        </div>

                    </div>

                    <p id="imageError" class="mt-1 hidden text-xs text-red-500">
                    </p>

                    @error('featured_image')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Excerpt --}}
                <div class="lg:col-span-2 min-w-0">

                    <label for="excerpt" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Excerpt
                    </label>

                    <textarea name="excerpt" id="excerpt" rows="4" placeholder="Write a short summary of this blog post..."
                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 placeholder-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-y">{{ old('excerpt', $blog->excerpt) }}</textarea>

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        A short summary displayed on blog listings and search results.
                    </p>

                    @error('excerpt')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Blog Content --}}
                <div class="lg:col-span-2 min-w-0">

                    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Blog Content <span class="text-red-500">*</span>
                    </label>

                    <textarea name="content" id="content" rows="12" placeholder="Write your blog content here...">{{ old('content', $blog->content) }}</textarea>

                    @error('content')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Publication Status --}}
                <div class="min-w-0">

                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Publication Status
                    </label>

                    <div
                        class="flex items-center justify-between w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-3">

                        <div class="flex items-center gap-3 min-w-0">

                            <div id="statusIconWrapper"
                                class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-gray-200 text-gray-600 dark:bg-gray-800 dark:text-gray-400">

                                <i id="statusIcon" class="bi bi-file-earmark-text">
                                </i>

                            </div>

                            <div class="min-w-0">

                                <p id="statusText" class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                    Draft
                                </p>

                                <p id="statusDescription" class="text-xs text-gray-500 dark:text-gray-400">
                                    This post will remain unpublished.
                                </p>

                            </div>

                        </div>

                        <label for="status"
                            class="relative inline-flex flex-shrink-0 cursor-pointer items-center ml-4">

                            <input type="hidden" name="status" value="draft">

                            <input type="checkbox" id="status" name="status" value="published"
                                {{ old('status', $blog->status) === 'published' ? 'checked' : '' }}
                                class="peer sr-only">

                            <span
                                class="relative h-6 w-11 rounded-full bg-gray-300 transition-colors duration-200 peer-checked:bg-blue-500 dark:bg-gray-700">

                                <span
                                    class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white shadow transition-transform duration-200 peer-checked:translate-x-5">
                                </span>

                            </span>

                        </label>

                    </div>

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Enable the switch to publish the blog post.
                    </p>

                    @error('status')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Published At --}}
                <div class="min-w-0">

                    <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Published At
                    </label>

                    <input type="datetime-local" name="published_at" id="published_at"
                        value="{{ old('published_at', $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('Y-m-d\TH:i') : '') }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Leave empty if the post is not ready to be published.
                    </p>

                    @error('published_at')
                        <p class="mt-1 text-xs text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

            {{-- Buttons --}}
            <div
                class="flex flex-col-reverse sm:flex-row sm:justify-end gap-2 pt-4 border-t border-gray-200 dark:border-gray-700">

                <a href="{{ route('admin.blogs.index') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm transition">

                    <i class="bi bi-arrow-left"></i>
                    Cancel

                </a>

                @can('edit_blog')
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm transition">

                        <i class="bi bi-check-lg"></i>
                        Update Blog Post

                    </button>
                @endcan

            </div>

        </form>

    </div>

    @push('styles')
        <style>
            .ck-editor__editable {
                min-height: 350px;
            }

            .ck.ck-editor__main>.ck-editor__editable {
                background-color: #ffffff;
                color: #111827;
                border-color: #d1d5db;
            }

            .ck.ck-toolbar {
                border-color: #d1d5db !important;
                background: #f9fafb !important;
            }

            .ck.ck-editor__editable:focus {
                border-color: #3b82f6 !important;
                box-shadow: 0 0 0 1px #3b82f6 !important;
            }

            .dark .ck.ck-editor__main>.ck-editor__editable {
                background-color: #111827;
                color: #f3f4f6;
                border-color: #374151;
            }

            .dark .ck.ck-toolbar {
                background: #1f2937 !important;
                border-color: #374151 !important;
            }

            .dark .ck.ck-button,
            .dark .ck.ck-toolbar__separator {
                color: #d1d5db;
            }

            .dark .ck.ck-button:hover,
            .dark .ck.ck-button.ck-on {
                background: #374151 !important;
            }

            .dark .ck.ck-editor__editable::placeholder {
                color: #6b7280;
            }

            #imageDropZone {
                position: relative;
                width: 100%;
                max-width: 100%;
                overflow: hidden;
                box-sizing: border-box;
            }

            #imageDropZone.drag-over {
                border-color: #3b82f6;
                background-color: rgba(59, 130, 246, 0.06);
            }

            .dark #imageDropZone.drag-over {
                border-color: #60a5fa;
                background-color: rgba(59, 130, 246, 0.10);
            }

            #imagePreviewState {
                position: relative;
                width: 100%;
                max-width: 100%;
                overflow: hidden;
                box-sizing: border-box;
            }

            .blog-image-preview-card {
                position: relative;
                width: 100%;
                max-width: 420px;
                height: 220px;
                margin: 0 auto;
                overflow: hidden;
                border-radius: 10px;
                border: 1px solid #e5e7eb;
                background: #ffffff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
                box-sizing: border-box;
            }

            .dark .blog-image-preview-card {
                border-color: #374151;
                background: #1f2937;
            }

            .blog-image-preview-frame {
                position: relative;
                width: 100%;
                height: 220px;
                overflow: hidden;
                background: #f3f4f6;
            }

            .dark .blog-image-preview-frame {
                background: #111827;
            }

            #imagePreview.blog-image-preview {
                display: block !important;
                width: 100% !important;
                height: 220px !important;
                max-width: 100% !important;
                max-height: 220px !important;
                min-width: 0 !important;
                min-height: 0 !important;
                object-fit: cover !important;
                object-position: center !important;
                margin: 0 !important;
                padding: 0 !important;
                border: 0 !important;
                box-sizing: border-box !important;
            }

            .blog-image-preview-footer {
                position: absolute;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 5;
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                min-height: 44px;
                padding: 8px 10px;
                color: #ffffff;
                background: rgba(0, 0, 0, 0.65);
                backdrop-filter: blur(5px);
                box-sizing: border-box;
            }

            #imageFileName {
                max-width: calc(100% - 45px);
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            @media (max-width: 640px) {

                .blog-image-preview-card {
                    max-width: 100%;
                    height: 200px;
                }

                .blog-image-preview-frame {
                    height: 200px;
                }

                #imagePreview.blog-image-preview {
                    height: 200px !important;
                    max-height: 200px !important;
                }

            }

            #status {
                position: absolute;
                opacity: 0;
                pointer-events: none;
            }

            #status+span {
                display: block;
                flex-shrink: 0;
            }

            #status:focus-visible+span {
                outline: 2px solid #3b82f6;
                outline-offset: 2px;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                /* ==========================================
                   SLUG GENERATOR
                ========================================== */

                const titleInput = document.getElementById('title');
                const slugInput = document.getElementById('slug');

                if (titleInput && slugInput) {

                    let slugManuallyChanged = slugInput.value.trim() !== '';

                    slugInput.addEventListener('input', function() {
                        slugManuallyChanged = true;
                    });

                    titleInput.addEventListener('input', function() {

                        if (slugManuallyChanged) {
                            return;
                        }

                        slugInput.value = this.value
                            .toLowerCase()
                            .trim()
                            .replace(/[^a-z0-9\s-]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');

                    });

                }


                /* ==========================================
                   CKEDITOR
                ========================================== */

                const contentElement = document.getElementById('content');

                if (contentElement) {

                    ClassicEditor
                        .create(contentElement, {

                            toolbar: {
                                items: [
                                    'heading',
                                    '|',
                                    'bold',
                                    'italic',
                                    'underline',
                                    'strikethrough',
                                    '|',
                                    'link',
                                    'bulletedList',
                                    'numberedList',
                                    '|',
                                    'blockQuote',
                                    'insertTable',
                                    '|',
                                    'undo',
                                    'redo'
                                ]
                            },

                            heading: {
                                options: [{
                                        model: 'paragraph',
                                        title: 'Paragraph',
                                        class: 'ck-heading_paragraph'
                                    },
                                    {
                                        model: 'heading1',
                                        view: 'h1',
                                        title: 'Heading 1',
                                        class: 'ck-heading_heading1'
                                    },
                                    {
                                        model: 'heading2',
                                        view: 'h2',
                                        title: 'Heading 2',
                                        class: 'ck-heading_heading2'
                                    },
                                    {
                                        model: 'heading3',
                                        view: 'h3',
                                        title: 'Heading 3',
                                        class: 'ck-heading_heading3'
                                    }
                                ]
                            },

                            table: {
                                contentToolbar: [
                                    'tableColumn',
                                    'tableRow',
                                    'mergeTableCells'
                                ]
                            },

                            link: {
                                addTargetToExternalLinks: true,
                                defaultProtocol: 'https://'
                            }

                        })
                        .catch(error => {
                            console.error('CKEditor initialization failed:', error);
                        });

                }


                /* ==========================================
                   FEATURED IMAGE
                ========================================== */

                const dropZone = document.getElementById('imageDropZone');
                const imageInput = document.getElementById('featured_image');
                const uploadState = document.getElementById('imageUploadState');
                const previewState = document.getElementById('imagePreviewState');
                const imagePreview = document.getElementById('imagePreview');
                const imageFileName = document.getElementById('imageFileName');
                const removeImage = document.getElementById('removeImage');
                const imageError = document.getElementById('imageError');

                const maxFileSize = 5 * 1024 * 1024;

                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];


                function showImageError(message) {

                    if (!imageError) {
                        return;
                    }

                    imageError.textContent = message;
                    imageError.classList.remove('hidden');

                }


                function clearImageError() {

                    if (!imageError) {
                        return;
                    }

                    imageError.textContent = '';
                    imageError.classList.add('hidden');

                }


                function showPreview(file) {

                    clearImageError();

                    if (!file) {
                        return;
                    }

                    if (!allowedTypes.includes(file.type)) {

                        showImageError(
                            'Please select a JPG, PNG, or WEBP image.'
                        );

                        imageInput.value = '';

                        return;
                    }

                    if (file.size > maxFileSize) {

                        showImageError(
                            'The featured image must not exceed 5MB.'
                        );

                        imageInput.value = '';

                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(event) {

                        imagePreview.src = event.target.result;

                        imageFileName.textContent = file.name;

                        uploadState.classList.add('hidden');

                        previewState.classList.remove('hidden');

                    };

                    reader.readAsDataURL(file);

                }


                if (dropZone && imageInput) {

                    dropZone.addEventListener('click', function(event) {

                        if (event.target.closest('#removeImage')) {
                            return;
                        }

                        imageInput.click();

                    });


                    imageInput.addEventListener('change', function() {

                        const file = this.files[0];

                        if (file) {
                            showPreview(file);
                        }

                    });


                    dropZone.addEventListener('dragenter', function(event) {

                        event.preventDefault();

                        dropZone.classList.add('drag-over');

                    });


                    dropZone.addEventListener('dragover', function(event) {

                        event.preventDefault();

                        dropZone.classList.add('drag-over');

                    });


                    dropZone.addEventListener('dragleave', function(event) {

                        event.preventDefault();

                        if (!dropZone.contains(event.relatedTarget)) {
                            dropZone.classList.remove('drag-over');
                        }

                    });


                    dropZone.addEventListener('drop', function(event) {

                        event.preventDefault();

                        dropZone.classList.remove('drag-over');

                        const files = event.dataTransfer.files;

                        if (!files || !files.length) {
                            return;
                        }

                        const file = files[0];

                        const dataTransfer = new DataTransfer();

                        dataTransfer.items.add(file);

                        imageInput.files = dataTransfer.files;

                        showPreview(file);

                    });

                }


                /* ==========================================
                   REMOVE / CLEAR IMAGE
                ========================================== */

                if (removeImage) {

                    removeImage.addEventListener('click', function(event) {

                        event.preventDefault();
                        event.stopPropagation();

                        imageInput.value = '';

                        imagePreview.src = '';

                        imageFileName.textContent = '';

                        previewState.classList.add('hidden');

                        uploadState.classList.remove('hidden');

                        clearImageError();

                    });

                }


                /* ==========================================
                   PUBLICATION STATUS
                ========================================== */

                const statusInput = document.getElementById('status');
                const publishedAtInput = document.getElementById('published_at');
                const statusText = document.getElementById('statusText');
                const statusDescription = document.getElementById('statusDescription');
                const statusIcon = document.getElementById('statusIcon');


                function getCurrentDateTime() {

                    const now = new Date();

                    const year = now.getFullYear();

                    const month = String(
                        now.getMonth() + 1
                    ).padStart(2, '0');

                    const day = String(
                        now.getDate()
                    ).padStart(2, '0');

                    const hours = String(
                        now.getHours()
                    ).padStart(2, '0');

                    const minutes = String(
                        now.getMinutes()
                    ).padStart(2, '0');

                    return `${year}-${month}-${day}T${hours}:${minutes}`;

                }


                function updateStatusUI() {

                    if (!statusInput) {
                        return;
                    }

                    if (statusInput.checked) {

                        statusText.textContent = 'Published';

                        statusDescription.textContent =
                            'This post will be published and visible to visitors.';

                        statusIcon.className =
                            'bi bi-check-circle-fill text-blue-500';

                        if (
                            publishedAtInput &&
                            !publishedAtInput.value
                        ) {

                            publishedAtInput.value =
                                getCurrentDateTime();

                        }

                    } else {

                        statusText.textContent = 'Draft';

                        statusDescription.textContent =
                            'This post will remain unpublished.';

                        statusIcon.className =
                            'bi bi-file-earmark-text';

                    }

                }


                if (statusInput) {

                    statusInput.addEventListener(
                        'change',
                        updateStatusUI
                    );

                    updateStatusUI();

                }

            });
        </script>
    @endpush

</x-app-layout>
