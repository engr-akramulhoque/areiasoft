<x-app-layout>
    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800 rounded-lg shadow">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    Create Blog Category
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Add a new category for your blog posts.
                </p>
            </div>

            <a href="{{ route('admin.blog.categories.index') }}"
                class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm transition">
                <i class="bi bi-arrow-left"></i>
                Back to Categories
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

        <form action="{{ route('admin.blog.categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                {{-- Category Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Category Name <span class="text-red-500">*</span>
                    </label>

                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        placeholder="e.g. Technology" required autofocus
                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Slug --}}
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Slug
                    </label>

                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                        placeholder="technology"
                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Leave empty to generate automatically from the category name.
                    </p>

                    @error('slug')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="lg:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Description
                    </label>

                    <textarea name="description" id="description" rows="5"
                        placeholder="Write a short description for this category..."
                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 placeholder-gray-400 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-y">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3">
                        <input type="hidden" name="status" value="0">

                        <input type="checkbox" name="status" id="status" value="1"
                            {{ old('status', true) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-900">

                        <label for="status" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Active
                        </label>

                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            Category will be available when publishing blog posts.
                        </span>
                    </div>

                    @error('status')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Buttons --}}
            <div
                class="flex flex-col-reverse sm:flex-row sm:justify-end gap-2 pt-4 border-t border-gray-200 dark:border-gray-700">

                <a href="{{ route('admin.blog.categories.index') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm transition">
                    <i class="bi bi-arrow-left"></i>
                    Cancel
                </a>

                @can('create_blog_category')
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm transition">
                        <i class="bi bi-save-fill"></i>
                        Save Category
                    </button>
                @endcan

            </div>

        </form>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const nameInput = document.getElementById('name');
                const slugInput = document.getElementById('slug');

                if (!nameInput || !slugInput) {
                    return;
                }

                let slugManuallyChanged = slugInput.value.trim() !== '';

                slugInput.addEventListener('input', function() {
                    slugManuallyChanged = true;
                });

                nameInput.addEventListener('input', function() {
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
            });
        </script>
    @endpush
</x-app-layout>
