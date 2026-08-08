<x-app-layout>
    <div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Edit Role</h1>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.roles.update', $role) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Role Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $role->name) }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 
                              dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            {{-- Permissions --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Permissions</label>

                {{-- Select All --}}
                <div class="mt-2 mb-3">
                    <label class="inline-flex items-center text-sm text-gray-700 dark:text-gray-300">
                        <input type="checkbox" id="select-all"
                            class="rounded border-gray-300 dark:border-gray-700 text-blue-600 focus:ring-blue-500 dark:bg-gray-900">
                        <span class="ml-2">Select All / Deselect All</span>
                    </label>
                </div>

                <div class="space-y-3">
                    @foreach ($permissions->chunk(4) as $chunk)
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                            @foreach ($chunk as $permission)
                                <label class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 text-sm">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission }}"
                                        @if ($role->permissions->pluck('name')->contains($permission)) checked @endif
                                        class="permission-checkbox rounded border-gray-300 dark:border-gray-700 text-blue-600 
                                                  focus:ring-blue-500 dark:bg-gray-900">
                                    <span>{{ $permission }}</span>
                                </label>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex gap-2">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                    <i class="bi bi-save-fill"></i> Update
                </button>
                <a href="{{ route('admin.roles.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm">
                    <i class="bi bi-arrow-left"></i> Cancel
                </a>
            </div>
        </form>
    </div>

    {{-- Select All Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectAll = document.getElementById("select-all");
            const checkboxes = document.querySelectorAll(".permission-checkbox");

            // If all individual permissions are already checked, auto-check Select All
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
            selectAll.checked = allChecked;

            selectAll.addEventListener("change", function() {
                checkboxes.forEach(cb => cb.checked = selectAll.checked);
            });

            checkboxes.forEach(cb => {
                cb.addEventListener("change", function() {
                    selectAll.checked = Array.from(checkboxes).every(c => c.checked);
                });
            });
        });
    </script>
</x-app-layout>
