<x-app-layout>

    <div class="container mx-auto px-4 py-6">

        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div class="min-w-0">

                <div class="mb-2 flex items-center gap-2">

                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-blue-100 px-2.5 py-1 text-xs font-medium text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                        <i class="bi bi-journal-text"></i>
                        Blog Post
                    </span>

                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400">
                        <i class="bi bi-plus-circle"></i>
                        Create
                    </span>

                </div>

                <h1 class="break-words text-2xl font-bold text-gray-900 dark:text-gray-100 sm:text-3xl">
                    Create Blog Post
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Create and publish a new blog post with content, image and publication settings.
                </p>

            </div>

            <div class="flex flex-wrap items-center gap-2">

                <a href="{{ route('admin.blogs.index') }}"
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

        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">

            @csrf

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

                <div class="space-y-6 lg:col-span-2">

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
                                        Blog Information
                                    </h2>

                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                        Enter the basic information of your blog post.
                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="p-5">

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                                <div class="min-w-0 md:col-span-2">

                                    <label for="title"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                        Blog Title

                                        <span class="text-red-500">*</span>

                                    </label>

                                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                                        placeholder="Enter blog post title" required autofocus
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                                    @error('title')
                                        <p class="mt-1 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <div class="min-w-0">

                                    <label for="category_id"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                        Category

                                        <span class="text-red-500">*</span>

                                    </label>

                                    <select name="category_id" id="category_id" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                        <option value="">
                                            Select Category
                                        </option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>

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

                                <div class="min-w-0">

                                    <label for="slug"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                        Slug

                                    </label>

                                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                        placeholder="blog-post-slug"
                                        class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        Leave empty to generate automatically from the title.
                                    </p>

                                    @error('slug')
                                        <p class="mt-1 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <div class="min-w-0 md:col-span-2">

                                    <label for="excerpt"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                        Excerpt

                                    </label>

                                    <textarea name="excerpt" id="excerpt" rows="4" placeholder="Write a short summary of this blog post..."
                                        class="mt-1 block w-full resize-y rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">{{ old('excerpt') }}</textarea>

                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        A short summary displayed on blog listings and search results.
                                    </p>

                                    @error('excerpt')
                                        <p class="mt-1 text-xs text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                            </div>

                        </div>

                    </div>

                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                            <div class="flex items-center gap-3 px-4">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">

                                    <i class="bi bi-image"></i>

                                </div>

                                <div>

                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        Featured Image
                                    </h2>

                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                        Upload the main image for this blog post.
                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="p-5">

                            <div id="imageDropZone"
                                class="relative min-h-[220px] w-full cursor-pointer overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 px-4 py-5 text-center transition hover:border-blue-400 hover:bg-blue-50/50 dark:border-gray-600 dark:bg-gray-900 dark:hover:border-blue-500 dark:hover:bg-blue-900/10">

                                <input type="file" name="featured_image" id="featured_image"
                                    accept="image/jpeg,image/png,image/webp,image/jpg" class="hidden">

                                <div id="imageUploadState">

                                    <div
                                        class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">

                                        <i class="bi bi-cloud-arrow-up text-2xl"></i>

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

                                <div id="imagePreviewState" class="hidden w-full overflow-hidden">

                                    <div class="blog-image-preview-card">

                                        <div class="blog-image-preview-frame">

                                            <img id="imagePreview" src="" alt="Featured image preview"
                                                class="blog-image-preview">

                                            <div class="blog-image-preview-footer">

                                                <div class="flex min-w-0 items-center gap-2">

                                                    <i class="bi bi-image flex-shrink-0"></i>

                                                    <span id="imageFileName" class="block min-w-0 truncate text-xs">
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

                    </div>

                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                            <div class="flex items-center gap-3 px-4">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">

                                    <i class="bi bi-file-richtext"></i>

                                </div>

                                <div>

                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        Blog Content
                                    </h2>

                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                        Write and format the complete blog article.
                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="p-5">

                            <label for="content"
                                class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">

                                Content

                                <span class="text-red-500">*</span>

                            </label>

                            <textarea name="content" id="content" rows="14" placeholder="Write your blog content here...">{{ old('content') }}</textarea>

                            @error('content')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>

                <aside class="space-y-6">

                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="border-b border-gray-200 px-4 py-4 dark:border-gray-700">

                            <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                Publication Details
                            </h2>

                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Manage the visibility of this blog post.
                            </p>

                        </div>

                        <div class="space-y-5 p-5">

                            <div>

                                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Publication Status
                                </label>

                                <div
                                    class="flex w-full items-center justify-between rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 dark:border-gray-700 dark:bg-gray-900">

                                    <div class="flex min-w-0 items-center gap-3">

                                        <div id="statusIconWrapper"
                                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-gray-200 text-gray-600 dark:bg-gray-800 dark:text-gray-400">

                                            <i id="statusIcon" class="bi bi-file-earmark-text">
                                            </i>

                                        </div>

                                        <div class="min-w-0">

                                            <p id="statusText"
                                                class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                                Inactive
                                            </p>

                                            <p id="statusDescription"
                                                class="text-xs text-gray-500 dark:text-gray-400">
                                                This post is inactive and will remain unpublished.
                                            </p>

                                        </div>

                                    </div>

                                    <label for="status" class="ml-4 flex flex-shrink-0 cursor-pointer items-center">

                                        <input type="hidden" name="status" value="draft">

                                        <input type="checkbox" name="status" id="status" value="published"
                                            {{ old('status') === 'published' ? 'checked' : '' }}
                                            class="status-checkbox">

                                        <span class="status-checkmark">
                                            <i class="bi bi-check-lg"></i>
                                        </span>

                                    </label>

                                </div>

                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                    Check the box to make this blog post active and published.
                                </p>

                                @error('status')
                                    <p class="mt-1 text-xs text-red-500">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                            <div>

                                <label for="published_at"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                                    Published At

                                </label>

                                <input type="datetime-local" name="published_at" id="published_at"
                                    value="{{ old('published_at') }}"
                                    class="mt-1 block w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

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

                    </div>

                    <div
                        class="overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="flex flex-col gap-2">

                            @can('create_blog')
                                <button type="submit"
                                    class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-500 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-blue-600">

                                    <i class="bi bi-check-lg"></i>

                                    Create Blog Post

                                </button>
                            @endcan

                            <a href="{{ route('admin.blogs.index') }}"
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
            .tox-tinymce {
                border-radius: 0.75rem !important;
                border: 1px solid #d1d5db !important;
                overflow: hidden;
            }

            .tox .tox-edit-area__iframe {
                background: #ffffff !important;
            }

            .dark .tox-tinymce {
                border-color: #374151 !important;
                background: #1f2937 !important;
            }

            .dark .tox .tox-toolbar,
            .dark .tox .tox-toolbar__primary,
            .dark .tox .tox-toolbar__overflow,
            .dark .tox .tox-menubar {
                background: #1f2937 !important;
                border-color: #374151 !important;
            }

            .dark .tox .tox-tbtn,
            .dark .tox .tox-mbtn {
                color: #d1d5db !important;
            }

            .dark .tox .tox-tbtn:hover,
            .dark .tox .tox-tbtn--enabled,
            .dark .tox .tox-mbtn:hover {
                background: #374151 !important;
            }

            .dark .tox .tox-statusbar {
                background: #1f2937 !important;
                border-color: #374151 !important;
                color: #9ca3af !important;
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
                max-width: 520px;
                height: 260px;
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
                height: 260px;
                overflow: hidden;
                background: #f3f4f6;
            }

            .dark .blog-image-preview-frame {
                background: #111827;
            }

            #imagePreview.blog-image-preview {
                display: block !important;
                width: 100% !important;
                height: 260px !important;
                max-width: 100% !important;
                max-height: 260px !important;
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

            .status-checkbox {
                position: absolute;
                opacity: 0;
                width: 0;
                height: 0;
                pointer-events: none;
            }

            .status-checkmark {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 24px;
                height: 24px;
                border: 2px solid #d1d5db;
                border-radius: 6px;
                background: #ffffff;
                color: transparent;
                transition: all 0.2s ease;
                box-sizing: border-box;
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

            .status-checkbox:focus-visible+.status-checkmark {
                outline: 2px solid #3b82f6;
                outline-offset: 2px;
            }

            .status-checkmark:hover {
                border-color: #9ca3af;
            }

            .status-checkbox:checked+.status-checkmark:hover {
                border-color: #16a34a;
                background-color: #16a34a;
            }

            .dark .status-checkmark {
                border-color: #4b5563;
                background-color: #111827;
            }

            .dark .status-checkbox:checked+.status-checkmark {
                border-color: #22c55e;
                background-color: #22c55e;
            }

            .dark .status-checkmark:hover {
                border-color: #6b7280;
            }

            @media (max-width: 640px) {

                .blog-image-preview-card {
                    max-width: 100%;
                    height: 220px;
                }

                .blog-image-preview-frame {
                    height: 220px;
                }

                #imagePreview.blog-image-preview {
                    height: 220px !important;
                    max-height: 220px !important;
                }

            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.tiny.cloud/1/rdhnj0pg5h59hi9hy2qu2sxmpz8hbffnd6iruw3xmw620qzf/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>

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

                if (typeof tinymce !== 'undefined') {

                    tinymce.init({

                        selector: '#content',

                        height: 520,

                        menubar: 'file edit view insert format tools table help',

                        plugins: [
                            'advlist',
                            'autolink',
                            'lists',
                            'link',
                            'image',
                            'charmap',
                            'preview',
                            'anchor',
                            'searchreplace',
                            'visualblocks',
                            'code',
                            'fullscreen',
                            'insertdatetime',
                            'media',
                            'table',
                            'wordcount'
                        ],

                        toolbar: [
                            'undo redo | blocks | bold italic underline strikethrough',
                            'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
                            'link image media table | blockquote | removeformat code fullscreen'
                        ],

                        branding: false,

                        promotion: false,

                        resize: true,

                        statusbar: true,

                        link_target_list: false,

                        default_link_target: '_blank',

                        content_style: `
                        body {
                            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                            font-size: 16px;
                            line-height: 1.8;
                            color: #374151;
                            padding: 18px;
                        }

                        h1, h2, h3, h4, h5, h6 {
                            color: #111827;
                            line-height: 1.3;
                        }

                        img {
                            max-width: 100%;
                            height: auto;
                            border-radius: 10px;
                        }

                        blockquote {
                            border-left: 4px solid #3b82f6;
                            padding-left: 16px;
                            margin-left: 0;
                            color: #4b5563;
                        }

                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }

                        table td,
                        table th {
                            border: 1px solid #d1d5db;
                            padding: 8px;
                        }
                    `

                    }).then(function(editors) {

                        const editor = editors[0];

                        if (!editor) {
                            return;
                        }

                        const applyDarkMode = function() {

                            const isDark =
                                document.documentElement.classList.contains('dark');

                            const body = editor.getBody();

                            if (!body) {
                                return;
                            }

                            if (isDark) {

                                body.style.backgroundColor = '#111827';
                                body.style.color = '#f3f4f6';

                            } else {

                                body.style.backgroundColor = '#ffffff';
                                body.style.color = '#374151';

                            }

                        };

                        applyDarkMode();

                        const observer = new MutationObserver(function() {
                            applyDarkMode();
                        });

                        observer.observe(
                            document.documentElement, {
                                attributes: true,
                                attributeFilter: ['class']
                            }
                        );

                    }).catch(function(error) {

                        console.error(
                            'TinyMCE initialization failed:',
                            error
                        );

                    });

                }

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

                const statusInput = document.getElementById('status');
                const publishedAtInput = document.getElementById('published_at');
                const statusText = document.getElementById('statusText');
                const statusDescription = document.getElementById('statusDescription');
                const statusIcon = document.getElementById('statusIcon');
                const statusIconWrapper = document.getElementById('statusIconWrapper');

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

                        statusText.textContent = 'Active';

                        statusDescription.textContent =
                            'This post is active and visible to visitors.';

                        statusIcon.className =
                            'bi bi-check-circle-fill';

                        statusIconWrapper.className =
                            'flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400';

                        if (
                            publishedAtInput &&
                            !publishedAtInput.value
                        ) {

                            publishedAtInput.value =
                                getCurrentDateTime();

                        }

                    } else {

                        statusText.textContent = 'Inactive';

                        statusDescription.textContent =
                            'This post is inactive and will remain unpublished.';

                        statusIcon.className =
                            'bi bi-file-earmark-text';

                        statusIconWrapper.className =
                            'flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-gray-200 text-gray-600 dark:bg-gray-800 dark:text-gray-400';

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
