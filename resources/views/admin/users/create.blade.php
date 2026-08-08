<x-app-layout>
    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Add User</h1>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Role Dropdown --}}
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                <select name="role" id="role"
                    class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                    shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>
                            {{ $role }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                    shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                    shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            {{-- Password --}}
            <div>
                <label for="password"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                    shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100
                    shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            {{-- Status & Admin --}}
            <div class="flex gap-4">
                {{-- Status --}}
                <input type="hidden" name="status" value="0">
                <label class="inline-flex items-center text-sm text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="status" value="1"
                        class="rounded border-gray-300 dark:border-gray-700 text-blue-600
                    focus:ring-blue-500 dark:bg-gray-900"
                        checked>
                    <span class="ml-2">Active</span>
                </label>

                {{-- Admin --}}
                <input type="hidden" name="is_admin" value="0">
                <label class="inline-flex items-center text-sm text-gray-700 dark:text-gray-300">
                    <input type="checkbox" name="is_admin" value="1"
                        class="rounded border-gray-300 dark:border-gray-700 text-blue-600
                    focus:ring-blue-500 dark:bg-gray-900">
                    <span class="ml-2">Admin</span>
                </label>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-2">
                @can('create user')
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                        <i class="bi bi-save-fill"></i> Save
                    </button>
                @endcan
                <a href="{{ route('admin.users.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm">
                    <i class="bi bi-arrow-left"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
