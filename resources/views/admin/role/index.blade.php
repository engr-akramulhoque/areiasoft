<x-app-layout>
    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Roles</h1>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Actions --}}
        <div class="flex justify-end mb-4">
            @can('create role')
                <a href="{{ route('admin.roles.create') }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                    <i class="bi bi-plus-lg"></i> Add New Role
                </a>
            @endcan
        </div>

        {{-- Roles Table --}}
        <div class="overflow-x-auto rounded-lg shadow bg-white dark:bg-gray-900">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-300 dark:bg-gray-900">
                    <tr>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            #</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Role</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Permissions</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Created</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($roles as $role)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 text-xs sm:text-sm">
                            <td class="px-3 py-2 text-gray-700 dark:text-gray-300">{{ $loop->iteration }}</td>
                            <td class="px-3 py-2 font-medium text-gray-900 dark:text-gray-100">{{ $role->name }}</td>
                            <td class="px-3 py-2 font-medium text-gray-900 dark:text-gray-100">
                                {{ $role->permissions->count() }}</td>
                            <td class="px-3 py-2 text-gray-500 dark:text-gray-400">
                                {{ $role->created_at ? $role->created_at->diffForHumans() : 'Not Set' }}</td>
                            <td class="px-3 py-2 flex flex-wrap gap-1">
                                @can('view role')
                                    <a href="{{ route('admin.roles.show', $role) }}"
                                        class="flex items-center gap-1 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs sm:text-sm"
                                        title="View">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                @endcan
                                @can('edit role')
                                    <a href="{{ route('admin.roles.edit', $role) }}"
                                        class="flex items-center gap-1 px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs sm:text-sm"
                                        title="Edit">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                @endcan
                                @can('delete role')
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                        onsubmit="return confirm('Delete this role?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center gap-1 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs sm:text-sm"
                                            title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-3 py-4 text-center text-gray-500 dark:text-gray-400">
                                No roles found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
