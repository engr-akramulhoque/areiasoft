<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">

            {{-- Title --}}
            <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Sitemap</h1>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Actions --}}
            <div class="flex justify-end mb-4">
                @can('edit_sitemap')
                    <a href="{{ route('admin.sitemap.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm transition">
                        <i class="bi bi-plus-lg mr-2"></i> Generate Sitemap
                    </a>
                @endcan
            </div>

            {{-- Sitemap Content Card --}}
            <div
                class="overflow-auto rounded-lg shadow bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700">
                <div
                    class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 font-semibold text-gray-800 dark:text-gray-200">
                    Sitemap Content
                </div>
                <div class="p-4">
                    @if ($sitemap)
                        <pre class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 p-4 rounded overflow-auto text-sm">{{ $sitemap }}</pre>
                    @else
                        <p class="text-red-600 dark:text-red-400">Sitemap not found. Please generate it first.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>