<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
            <div
                class="px-5 py-4 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="px-4">
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-gray-100">
                        Blog Category Details
                    </h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        View category information and associated blog posts.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-2 px-4">
                    @can('edit_blog_category')
                        <a href="{{ route('admin.blog.categories.edit', $blogCategory) }}"
                            class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 text-sm font-medium transition">
                            <i class="bi bi-pencil-fill"></i>
                            Edit
                        </a>
                    @endcan

                    <a href="{{ route('admin.blog.categories.index') }}"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 text-sm font-medium transition">
                        <i class="bi bi-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>

            <div class="p-5">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                    <div class="lg:col-span-2 space-y-5">
                        <div
                            class="p-5 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p
                                        class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                        Category Name
                                    </p>

                                    <h2 class="mt-2 text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        {{ $blogCategory->name }}
                                    </h2>
                                </div>

                                @if ($blogCategory->status)
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 text-xs font-semibold">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Active
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 text-xs font-semibold">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Inactive
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="p-5 rounded-lg border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="bi bi-link-45deg text-blue-500"></i>
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    Category Slug
                                </h3>
                            </div>

                            <div
                                class="px-3 py-2.5 rounded-md bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-700">
                                <code class="text-sm text-gray-700 dark:text-gray-300 break-all">
                                    {{ $blogCategory->slug }}
                                </code>
                            </div>
                        </div>

                        <div class="p-5 rounded-lg border border-gray-200 dark:border-gray-700">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="bi bi-card-text text-blue-500"></i>
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    Description
                                </h3>
                            </div>

                            @if ($blogCategory->description)
                                <p class="text-sm leading-7 text-gray-600 dark:text-gray-300 whitespace-pre-line">
                                    {{ $blogCategory->description }}
                                </p>
                            @else
                                <p class="text-sm italic text-gray-400 dark:text-gray-500">
                                    No description has been added for this category.
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div
                            class="p-5 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-11 h-11 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                                    <i class="bi bi-file-earmark-text text-blue-600 dark:text-blue-400 text-lg"></i>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Blog Posts
                                    </p>

                                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        {{ $blogCategory->posts_count ?? $blogCategory->posts()->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 rounded-lg border border-gray-200 dark:border-gray-700">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-4">
                                Category Information
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Category ID
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        #{{ $blogCategory->id }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Created
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $blogCategory->created_at?->format('M d, Y h:i A') ?? 'Not Set' }}
                                    </p>

                                    @if ($blogCategory->created_at)
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            {{ $blogCategory->created_at->diffForHumans() }}
                                        </p>
                                    @endif
                                </div>

                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Last Updated
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $blogCategory->updated_at?->format('M d, Y h:i A') ?? 'Not Set' }}
                                    </p>

                                    @if ($blogCategory->updated_at)
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            {{ $blogCategory->updated_at->diffForHumans() }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @can('delete_blog_category')
                            @if (!$blogCategory->posts()->exists())
                                <div
                                    class="p-5 rounded-lg border border-red-200 dark:border-red-900/50 bg-red-50 dark:bg-red-900/10">
                                    <h3 class="text-sm font-semibold text-red-700 dark:text-red-400 mb-2">
                                        Danger Zone
                                    </h3>

                                    <p class="text-xs text-red-600 dark:text-red-400 mb-4">
                                        This action permanently deletes this category.
                                    </p>

                                    <form action="{{ route('admin.blog.categories.destroy', $blogCategory) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm font-medium transition">
                                            <i class="bi bi-trash-fill"></i>
                                            Delete Category
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div
                                    class="p-5 rounded-lg border border-yellow-200 dark:border-yellow-900/50 bg-yellow-50 dark:bg-yellow-900/10">
                                    <div class="flex items-start gap-3">
                                        <i
                                            class="bi bi-exclamation-triangle-fill text-yellow-600 dark:text-yellow-400 mt-0.5"></i>

                                        <div>
                                            <h3 class="text-sm font-semibold text-yellow-700 dark:text-yellow-400">
                                                Category Cannot Be Deleted
                                            </h3>

                                            <p class="mt-1 text-xs leading-5 text-yellow-600 dark:text-yellow-400">
                                                This category has blog posts assigned to it. Remove or reassign those posts
                                                before deleting the category.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>

            @if ($blogCategory->posts()->exists())
                <div class="px-5 pb-5">
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <div
                            class="px-4 py-3 bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between gap-3">
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        Recent Blog Posts
                                    </h3>

                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        Posts currently assigned to this category.
                                    </p>
                                </div>

                                <span
                                    class="px-2.5 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400 text-xs font-semibold">
                                    {{ $blogCategory->posts()->count() }}
                                </span>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-800">
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            #
                                        </th>

                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            Title
                                        </th>

                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            Status
                                        </th>

                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            Published
                                        </th>

                                        <th
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400">
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($blogCategory->posts()->latest()->limit(10)->get() as $post)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                            <td class="px-4 py-3 text-xs text-gray-500 dark:text-gray-400">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="px-4 py-3">
                                                <div class="font-medium text-sm text-gray-900 dark:text-gray-100">
                                                    {{ $post->title }}
                                                </div>

                                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                    /{{ $post->slug }}
                                                </div>
                                            </td>

                                            <td class="px-4 py-3">
                                                @if ($post->status === 'published')
                                                    <span
                                                        class="inline-flex px-2 py-1 rounded-full bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 text-xs font-medium">
                                                        Published
                                                    </span>
                                                @elseif ($post->status === 'draft')
                                                    <span
                                                        class="inline-flex px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400 text-xs font-medium">
                                                        Draft
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex px-2 py-1 rounded-full bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300 text-xs font-medium">
                                                        {{ ucfirst($post->status) }}
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="px-4 py-3 text-xs text-gray-500 dark:text-gray-400">
                                                {{ $post->published_at?->format('M d, Y') ?? 'Not Published' }}
                                            </td>

                                            <td class="px-4 py-3">
                                                @can('view_blog')
                                                    <a href="{{ route('admin.blogs.show', $post) }}"
                                                        class="inline-flex items-center justify-center w-8 h-8 bg-blue-500 text-white rounded hover:bg-blue-600 transition"
                                                        title="View Post">
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
