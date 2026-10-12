<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">Manage robots.txt</h1>

        {{-- Success/Error Messages --}}
        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.robots.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="content" class="block mb-2 font-medium text-gray-700 dark:text-gray-200">
                    robots.txt Content
                </label>
                <textarea id="content" name="content" rows="12"
                    class="w-full p-3 rounded border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('content', $content) }}</textarea>
                @error('content')
                    <p class="text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                @can('edit_robots_txt')
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                        Save robots.txt
                    </button>
                @endcan
            </div>
        </form>

        {{-- Optional: Backup Info --}}
        <div class="mt-6 text-sm text-gray-600 dark:text-gray-400">
            <p>Previous version is automatically backed up as <code>robots-backup.txt</code>.</p>
        </div>
    </div>
</x-app-layout>