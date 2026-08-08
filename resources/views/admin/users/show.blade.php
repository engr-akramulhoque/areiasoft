<x-app-layout>
    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">User Details</h1>

        <div class="flex flex-col md:flex-row gap-6">
            {{-- Profile Photo --}}
            <div class="flex-shrink-0">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                    class="w-32 h-32 rounded-full object-cover shadow-md border border-gray-300 dark:border-gray-700">
            </div>

            {{-- User Info --}}
            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</h2>
                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
                </div>

                <div>
                    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</h2>
                    <p class="text-lg text-gray-900 dark:text-gray-100">{{ $user->email }}</p>
                </div>

                <div>
                    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</h2>
                    <span
                        class="px-2 py-1 rounded {{ $user->status ? 'bg-green-200 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-200 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                        {{ $user->status ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                <div>
                    <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">Admin</h2>
                    <span
                        class="px-2 py-1 rounded {{ $user->is_admin ? 'bg-blue-200 text-blue-800 dark:bg-blue-900 dark:text-blue-300' : 'bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-300' }}">
                        {{ $user->is_admin ? 'Yes' : 'No' }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Role --}}
        <div class="mt-6">
            <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">Role</h2>
            <p class="text-lg text-gray-900 dark:text-gray-100">{{ $user->roles->pluck('name')->join(', ') }}</p>
        </div>

        {{-- Permissions --}}
        <div class="mt-4">
            <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Permissions</h2>

            @php
                $permissions = $user->getAllPermissions();
                $chunks = $permissions->chunk(4);
            @endphp

            @forelse ($chunks as $chunk)
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 mb-2">
                    @foreach ($chunk as $permission)
                        @php
                            // Get roles granting this permission
                            $rolesGranting = $user->roles
                                ->filter(function ($role) use ($permission) {
                                    return $role->permissions->contains('id', $permission->id);
                                })
                                ->pluck('name')
                                ->join(', ');
                        @endphp
                        <span
                            class="px-2 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded text-sm cursor-pointer"
                            title="Granted by: {{ $rolesGranting ?: 'Directly assigned' }}">
                            {{ $permission->name }}
                        </span>
                    @endforeach
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400">No permissions assigned.</p>
            @endforelse
        </div>

        {{-- Back Button --}}
        <div class="mt-6">
            <a href="{{ route('admin.users.index') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm">
                <i class="bi bi-arrow-left"></i> Back to Users
            </a>
        </div>
    </div>
</x-app-layout>
