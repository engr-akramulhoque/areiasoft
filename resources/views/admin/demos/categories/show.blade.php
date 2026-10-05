<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div
            class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

            <div
                class="flex flex-col gap-3 border-b border-gray-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between dark:border-gray-700">
                <div class="px-1">
                    <div class="flex items-center gap-2">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                            <i class="bi bi-folder2-open text-blue-600 dark:text-blue-400"></i>
                        </div>

                        <h1 class="text-xl font-bold text-gray-900 dark:text-gray-100 sm:text-2xl">
                            Demo Category Details
                        </h1>
                    </div>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        View category information and associated Demo Library projects.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-2 px-1">
                    @can('edit_demo_category')
                        <a href="{{ route('admin.demo.categories.edit', $demoCategory) }}"
                            class="inline-flex items-center justify-center gap-2 rounded-md bg-yellow-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-yellow-600">
                            <i class="bi bi-pencil-fill"></i>
                            Edit
                        </a>
                    @endcan

                    <a href="{{ route('admin.demo.categories.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-md bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                        <i class="bi bi-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>

            <div class="p-5">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">

                    <div class="space-y-5 lg:col-span-2">

                        <div
                            class="rounded-lg border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-gray-900">
                            <div class="flex items-start justify-between gap-4">
                                <div class="min-w-0">
                                    <p
                                        class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        Category Name
                                    </p>

                                    <h2 class="mt-2 break-words text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        {{ $demoCategory->name }}
                                    </h2>
                                </div>

                                @if ($demoCategory->status)
                                    <span
                                        class="inline-flex shrink-0 items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Active
                                    </span>
                                @else
                                    <span
                                        class="inline-flex shrink-0 items-center gap-1.5 rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700 dark:bg-red-900/30 dark:text-red-400">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Inactive
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="rounded-lg border border-gray-200 p-5 dark:border-gray-700">
                            <div class="mb-3 flex items-center gap-2">
                                <i class="bi bi-link-45deg text-blue-500"></i>

                                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    Category Slug
                                </h3>
                            </div>

                            <div
                                class="rounded-md border border-gray-200 bg-gray-100 px-3 py-2.5 dark:border-gray-700 dark:bg-gray-900">
                                <code class="break-all text-sm text-gray-700 dark:text-gray-300">
                                    {{ $demoCategory->slug }}
                                </code>
                            </div>
                        </div>

                        <div class="rounded-lg border border-gray-200 p-5 dark:border-gray-700">
                            <div class="mb-3 flex items-center gap-2">
                                <i class="bi bi-card-text text-blue-500"></i>

                                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    Description
                                </h3>
                            </div>

                            @if ($demoCategory->description)
                                <p class="whitespace-pre-line text-sm leading-7 text-gray-600 dark:text-gray-300">
                                    {{ $demoCategory->description }}
                                </p>
                            @else
                                <p class="text-sm italic text-gray-400 dark:text-gray-500">
                                    No description has been added for this category.
                                </p>
                            @endif
                        </div>

                        <div class="rounded-lg border border-gray-200 p-5 dark:border-gray-700">
                            <div class="mb-3 flex items-center gap-2">
                                <i class="bi bi-sort-numeric-down text-blue-500"></i>

                                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    Sort Order
                                </h3>
                            </div>

                            <div
                                class="inline-flex min-w-12 items-center justify-center rounded-md bg-gray-100 px-3 py-2 text-sm font-semibold text-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                {{ $demoCategory->sort_order ?? 0 }}
                            </div>

                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                Lower numbers appear first in category listings.
                            </p>
                        </div>
                    </div>

                    <div class="space-y-5">

                        <div
                            class="rounded-lg border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-gray-900">
                            <div class="flex items-center gap-3">
                                <div
                                    class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                                    <i class="bi bi-display text-lg text-blue-600 dark:text-blue-400"></i>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Demo Projects
                                    </p>

                                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        {{ $demoCategory->demos_count ?? $demoCategory->demos()->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-lg border border-gray-200 p-5 dark:border-gray-700">
                            <h3 class="mb-4 text-sm font-semibold text-gray-900 dark:text-gray-100">
                                Category Information
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Category ID
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        #{{ $demoCategory->id }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Sort Order
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $demoCategory->sort_order ?? 0 }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Created
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $demoCategory->created_at?->format('M d, Y h:i A') ?? 'Not Set' }}
                                    </p>

                                    @if ($demoCategory->created_at)
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            {{ $demoCategory->created_at->diffForHumans() }}
                                        </p>
                                    @endif
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Last Updated
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $demoCategory->updated_at?->format('M d, Y h:i A') ?? 'Not Set' }}
                                    </p>

                                    @if ($demoCategory->updated_at)
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            {{ $demoCategory->updated_at->diffForHumans() }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @can('delete_demo_category')
                            @if (!$demoCategory->demos()->exists())
                                <div
                                    class="rounded-lg border border-red-200 bg-red-50 p-5 dark:border-red-900/50 dark:bg-red-900/10">
                                    <h3 class="mb-2 text-sm font-semibold text-red-700 dark:text-red-400">
                                        Danger Zone
                                    </h3>

                                    <p class="mb-4 text-xs text-red-600 dark:text-red-400">
                                        This action permanently deletes this demo category.
                                    </p>

                                    <form action="{{ route('admin.demo.categories.destroy', $demoCategory) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this demo category? This action cannot be undone.')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex w-full items-center justify-center gap-2 rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700">
                                            <i class="bi bi-trash-fill"></i>
                                            Delete Category
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div
                                    class="rounded-lg border border-yellow-200 bg-yellow-50 p-5 dark:border-yellow-900/50 dark:bg-yellow-900/10">
                                    <div class="flex items-start gap-3">
                                        <i
                                            class="bi bi-exclamation-triangle-fill mt-0.5 text-yellow-600 dark:text-yellow-400"></i>

                                        <div>
                                            <h3 class="text-sm font-semibold text-yellow-700 dark:text-yellow-400">
                                                Category Cannot Be Deleted
                                            </h3>

                                            <p class="mt-1 text-xs leading-5 text-yellow-600 dark:text-yellow-400">
                                                This category has demo projects assigned to it. Remove or reassign those
                                                demos before deleting the category.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>

            @if ($demoCategory->demos()->exists())
                <div class="px-5 pb-5">
                    <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700">
                        <div
                            class="border-b border-gray-200 bg-gray-50 px-4 py-3 dark:border-gray-700 dark:bg-gray-900">
                            <div class="flex items-center justify-between gap-3">
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        Demo Projects
                                    </h3>

                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        Projects currently assigned to this category.
                                    </p>
                                </div>

                                <span
                                    class="rounded-full bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                                    {{ $demoCategory->demos_count ?? $demoCategory->demos()->count() }}
                                </span>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-[850px] w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-800">
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            #
                                        </th>

                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            Demo
                                        </th>

                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            Technology
                                        </th>

                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            Status
                                        </th>

                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            Featured
                                        </th>

                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($demoCategory->demos()->latest()->limit(10)->get() as $demo)
                                        <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-800">
                                            <td class="px-4 py-3 text-xs text-gray-500 dark:text-gray-400">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="px-4 py-3">
                                                <div class="flex items-center gap-3">
                                                    @if ($demo->thumbnail)
                                                        <img src="{{ asset('storage/' . $demo->thumbnail) }}"
                                                            alt="{{ $demo->title }}"
                                                            class="h-10 w-14 rounded-md object-cover ring-1 ring-gray-200 dark:ring-gray-700">
                                                    @else
                                                        <div
                                                            class="flex h-10 w-14 items-center justify-center rounded-md bg-gray-100 dark:bg-gray-700">
                                                            <i
                                                                class="bi bi-image text-gray-400 dark:text-gray-500"></i>
                                                        </div>
                                                    @endif

                                                    <div class="min-w-0">
                                                        <div
                                                            class="truncate text-sm font-medium text-gray-900 dark:text-gray-100">
                                                            {{ $demo->title }}
                                                        </div>

                                                        <div
                                                            class="mt-1 truncate text-xs text-gray-500 dark:text-gray-400">
                                                            /{{ $demo->slug }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4 py-3">
                                                @if ($demo->technology)
                                                    <span
                                                        class="inline-flex max-w-xs rounded-md bg-gray-100 px-2 py-1 text-xs text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                                                        {{ $demo->technology }}
                                                    </span>
                                                @else
                                                    <span class="text-xs italic text-gray-400 dark:text-gray-500">
                                                        Not specified
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="px-4 py-3">
                                                @if ($demo->status)
                                                    <span
                                                        class="inline-flex rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                                        Active
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex rounded-full bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                                                        Inactive
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="px-4 py-3">
                                                @if ($demo->featured)
                                                    <span
                                                        class="inline-flex items-center gap-1 rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400">
                                                        <i class="bi bi-star-fill"></i>
                                                        Featured
                                                    </span>
                                                @else
                                                    <span class="text-xs text-gray-400 dark:text-gray-500">
                                                        Standard
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="px-4 py-3">
                                                @can('view_demo')
                                                    <a href="{{ route('admin.demos.show', $demo) }}"
                                                        class="inline-flex h-8 w-8 items-center justify-center rounded bg-blue-500 text-white transition hover:bg-blue-600"
                                                        title="View Demo" aria-label="View Demo">
                                                        <i class="bi bi-eye-fill text-xs"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
