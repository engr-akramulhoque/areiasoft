<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="border-b border-gray-200 px-5 py-5 dark:border-gray-700">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                                <i class="bi bi-folder-plus text-blue-600 dark:text-blue-400"></i>
                            </div>

                            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                Create Demo Category
                            </h1>
                        </div>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Add a new category to organize your Demo Library projects.
                        </p>
                    </div>

                    <a href="{{ route('admin.demo.categories.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-gray-500 px-4 py-2 text-sm text-white transition hover:bg-gray-600">
                        <i class="bi bi-arrow-left"></i>
                        Back to Categories
                    </a>
                </div>
            </div>

            <div class="p-5">
                @if ($errors->any())
                    <div
                        class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800 dark:border-red-800 dark:bg-red-900/30 dark:text-red-300">
                        <div class="flex items-start gap-3">
                            <i class="bi bi-exclamation-triangle-fill mt-0.5"></i>

                            <div>
                                <p class="mb-1 font-semibold">
                                    Please fix the following errors:
                                </p>

                                <ul class="list-disc space-y-1 pl-5 text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.demo.categories.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Category Name <span class="text-red-500">*</span>
                            </label>

                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                placeholder="e.g. Business Websites" required autofocus maxlength="100"
                                class="mt-1 block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Slug
                            </label>

                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                placeholder="business-websites" maxlength="120"
                                class="mt-1 block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Leave empty to generate automatically from the category name.
                            </p>

                            @error('slug')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="lg:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Description
                            </label>

                            <textarea name="description" id="description" rows="5" maxlength="1000"
                                placeholder="Write a short description for this demo category..."
                                class="mt-1 block w-full resize-y rounded-lg border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">{{ old('description') }}</textarea>

                            <div class="mt-1 flex justify-between gap-3">
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Briefly describe the type of projects this category contains.
                                </p>

                                <span id="descriptionCounter" class="shrink-0 text-xs text-gray-400 dark:text-gray-500">
                                    0 / 1000
                                </span>
                            </div>

                            @error('description')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Sort Order
                            </label>

                            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                                min="0" step="1" placeholder="0"
                                class="mt-1 block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 dark:placeholder-gray-500">

                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Lower numbers appear first in category listings.
                            </p>

                            @error('sort_order')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-end">
                            <div
                                class="w-full rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900/50">
                                <div class="flex items-start gap-3">
                                    <input type="hidden" name="status" value="0">

                                    <input type="checkbox" name="status" id="status" value="1"
                                        {{ old('status', true) ? 'checked' : '' }}
                                        class="mt-0.5 h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-900">

                                    <div>
                                        <label for="status"
                                            class="cursor-pointer text-sm font-semibold text-gray-700 dark:text-gray-300">
                                            Active Category
                                        </label>

                                        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                            Active categories can be used to organize and display Demo Library projects.
                                        </p>
                                    </div>
                                </div>

                                @error('status')
                                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-col-reverse gap-2 border-t border-gray-200 pt-5 sm:flex-row sm:justify-end dark:border-gray-700">
                        <a href="{{ route('admin.demo.categories.index') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-lg bg-gray-500 px-4 py-2 text-sm text-white transition hover:bg-gray-600">
                            <i class="bi bi-arrow-left"></i>
                            Cancel
                        </a>

                        @can('create_demo_category')
                            <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                <i class="bi bi-folder-plus"></i>
                                Create Category
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
                const nameInput = document.getElementById('name');
                const slugInput = document.getElementById('slug');
                const descriptionInput = document.getElementById('description');
                const descriptionCounter = document.getElementById('descriptionCounter');

                if (nameInput && slugInput) {
                    let slugManuallyChanged = slugInput.value.trim() !== '';

                    slugInput.addEventListener('input', function() {
                        slugManuallyChanged = true;

                        this.value = this.value
                            .toLowerCase()
                            .trim()
                            .replace(/[^a-z0-9\s-]/g, '')
                            .replace(/\s+/g, '-')
                            .replace(/-+/g, '-');
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
                }

                function updateDescriptionCounter() {
                    if (!descriptionInput || !descriptionCounter) {
                        return;
                    }

                    descriptionCounter.textContent = `${descriptionInput.value.length} / 1000`;
                }

                if (descriptionInput) {
                    descriptionInput.addEventListener('input', updateDescriptionCounter);
                    updateDescriptionCounter();
                }
            });
        </script>
    @endpush

</x-app-layout>
