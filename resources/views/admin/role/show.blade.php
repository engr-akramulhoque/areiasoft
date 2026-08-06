<x-app-layout>
    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Role Details</h1>

        {{-- Role Info --}}
        <div class="mb-6 space-y-2">
            <p class="text-gray-700 dark:text-gray-300">
                <span class="font-semibold">Role Name:</span>
                <span class="ml-1 capitalize">{{ $role->name }}</span>
            </p>
            <p class="text-gray-700 dark:text-gray-300">
                <span class="font-semibold">Created:</span>
                <span class="ml-1">{{ $role->created_at->diffForHumans() }}</span>
            </p>
        </div>

        {{-- Permissions --}}
        <div>
            <h2 class="text-lg font-semibold mb-3 text-gray-900 dark:text-gray-100">Permissions</h2>

            @if ($role->permissions->isNotEmpty())
                <div class="space-y-3">
                    @foreach ($role->permissions->pluck('name')->chunk(4) as $chunk)
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                            @foreach ($chunk as $permission)
                                <span
                                    class="inline-block px-3 py-1 text-xs font-medium rounded-full 
                                             bg-blue-100 text-blue-800 
                                             dark:bg-blue-900 dark:text-blue-300">
                                    {{ $permission }}
                                </span>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400">No permissions assigned.</p>
            @endif
        </div>

        {{-- Actions --}}
        <div class="mt-6 flex gap-2">
            @can('edit role')
                <a href="{{ route('admin.roles.edit', $role) }}"
                    class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                    <i class="bi bi-pencil-fill"></i> Edit
                </a>
            @endcan

            <a href="{{ route('admin.roles.index') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>
</x-app-layout>
