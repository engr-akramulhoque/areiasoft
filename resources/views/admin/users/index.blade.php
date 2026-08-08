<x-app-layout>
    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Users</h1>

        {{-- Success message --}}
        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Actions --}}
        <div class="flex justify-end mb-4">
            @can('create user')
                <a href="{{ route('admin.users.create') }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                    <i class="bi bi-plus-lg"></i> Add New User
                </a>
            @endcan
        </div>

        {{-- Users Table --}}
        <div class="overflow-x-auto rounded-lg shadow bg-white dark:bg-gray-900">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-300 dark:bg-gray-900">
                    <tr>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            #</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Name</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Email</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Admin</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Status</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Created</th>
                        <th class="px-3 py-2 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 text-xs sm:text-sm">
                            <td class="px-3 py-2 text-gray-700 dark:text-gray-300">{{ $loop->iteration }}</td>
                            <td class="px-3 py-2 font-medium text-gray-900 dark:text-gray-100">{{ $user->name }}</td>
                            <td class="px-3 py-2 text-gray-700 dark:text-gray-300">{{ $user->email }}</td>
                            <td class="px-3 py-2 text-gray-700 dark:text-gray-300">{{ $user->is_admin ? 'Yes' : 'No' }}
                            </td>
                            <td class="px-3 py-2 text-gray-700 dark:text-gray-300">
                                {{ $user->status ? 'Active' : 'Inactive' }}</td>
                            <td class="px-3 py-2 text-gray-500 dark:text-gray-400">
                                {{ $user->created_at->diffForHumans() }}</td>
                            <td class="px-3 py-2 flex flex-wrap gap-1">
                                @can('view user')
                                    <a href="{{ route('admin.users.show', $user) }}"
                                        class="flex items-center gap-1 px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs sm:text-sm"
                                        title="View">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                @endcan
                                @can('edit user')
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="flex items-center gap-1 px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs sm:text-sm"
                                        title="Edit">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                @endcan
                                @can('delete user')
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        onsubmit="return confirm('Delete this user?')">
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
                            <td colspan="7" class="px-3 py-4 text-center text-gray-500 dark:text-gray-400">No users
                                found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $users->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
