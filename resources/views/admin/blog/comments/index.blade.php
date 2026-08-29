<x-app-layout>

    <div class="container mx-auto px-4 py-6">

        {{-- Header --}}
        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="mb-1 flex items-center gap-2">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                            <i class="bi bi-chat-left-text text-blue-600 dark:text-blue-400"></i>
                        </div>

                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Blog Comments
                        </h1>
                    </div>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Review, moderate and manage comments submitted to your blog posts.
                    </p>
                </div>
            </div>
        </div>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div
                class="mb-5 flex items-start gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-300">
                <i class="bi bi-check-circle-fill mt-0.5"></i>

                <div class="text-sm font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if (session('error'))
            <div
                class="mb-5 flex items-start gap-3 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-300">
                <i class="bi bi-exclamation-triangle-fill mt-0.5"></i>

                <div class="text-sm font-medium">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div
                class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-800 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-300">

                <div class="flex items-start gap-3">
                    <i class="bi bi-exclamation-triangle-fill mt-0.5"></i>

                    <div>
                        <p class="mb-1 text-sm font-semibold">
                            Please fix the following errors:
                        </p>

                        <ul class="list-disc space-y-1 pl-5 text-xs">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        @endif

        {{-- Comments Card --}}
        <div
            class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

            {{-- Card Header --}}
            <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">

                    <div>
                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                            All Comments
                        </h2>

                        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                            {{ $comments->total() }}
                            {{ $comments->total() === 1 ? 'comment' : 'comments' }}
                            found
                        </p>
                    </div>

                    <div class="flex w-full flex-col gap-2 sm:flex-row lg:w-auto">

                        {{-- Search --}}
                        <div class="relative w-full sm:w-72">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                <i class="bi bi-search text-gray-400 dark:text-gray-500"></i>
                            </div>

                            <input type="search" id="commentSearch" autocomplete="off" placeholder="Search comments..."
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 py-2.5 pl-10 pr-10 text-sm text-gray-900 placeholder-gray-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500 dark:focus:border-blue-500 dark:focus:bg-gray-900">

                            <button type="button" id="clearCommentSearch"
                                class="absolute inset-y-0 right-0 hidden items-center pr-3 text-gray-400 transition hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300"
                                title="Clear search" aria-label="Clear search">
                                <i class="bi bi-x-circle-fill text-sm"></i>
                            </button>
                        </div>

                        {{-- Status Filter --}}
                        <form method="GET" action="{{ route('admin.blog-comments.index') }}" class="flex gap-2">

                            <select name="status" onchange="this.form.submit()"
                                class="w-full rounded-lg border border-gray-300 bg-gray-50 px-3 py-2.5 text-sm text-gray-900 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-500/20 dark:border-gray-600 dark:bg-gray-900 dark:text-white sm:w-36">

                                <option value="">
                                    All Status
                                </option>

                                <option value="pending" @selected(request('status') === 'pending')>
                                    Pending
                                </option>

                                <option value="approved" @selected(request('status') === 'approved')>
                                    Approved
                                </option>

                                <option value="rejected" @selected(request('status') === 'rejected')>
                                    Rejected
                                </option>

                            </select>

                            @if (request()->filled('status'))
                                <a href="{{ route('admin.blog-comments.index') }}"
                                    class="inline-flex items-center justify-center rounded-lg bg-gray-100 px-3 text-gray-600 transition hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
                                    title="Reset filter">
                                    <i class="bi bi-arrow-counterclockwise"></i>
                                </a>
                            @endif

                        </form>

                    </div>

                </div>
            </div>

            {{-- Statistics --}}
            <div class="border-b border-gray-200 bg-gray-50/70 px-5 py-3 dark:border-gray-700 dark:bg-gray-900/30">
                <div class="flex flex-wrap items-center gap-2">

                    <a href="{{ route('admin.blog-comments.index') }}"
                        class="inline-flex items-center gap-2 rounded-md border border-gray-200 bg-white px-3 py-1.5 text-xs font-semibold text-gray-700 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-blue-700 dark:hover:bg-blue-900/20 dark:hover:text-blue-400">

                        <i class="bi bi-chat-left-text text-blue-500"></i>

                        <span>
                            All
                        </span>

                        <span class="rounded bg-gray-100 px-1.5 py-0.5 text-[10px] dark:bg-gray-700">
                            {{ number_format($counts['all']) }}
                        </span>

                    </a>

                    <a href="{{ route('admin.blog-comments.index', ['status' => 'pending']) }}"
                        class="inline-flex items-center gap-2 rounded-md border border-yellow-200 bg-yellow-50 px-3 py-1.5 text-xs font-semibold text-yellow-700 transition hover:bg-yellow-100 dark:border-yellow-800/50 dark:bg-yellow-900/20 dark:text-yellow-400 dark:hover:bg-yellow-900/30">

                        <i class="bi bi-hourglass-split"></i>

                        <span>
                            Pending
                        </span>

                        <span class="rounded bg-yellow-100 px-1.5 py-0.5 text-[10px] dark:bg-yellow-900/40">
                            {{ number_format($counts['pending']) }}
                        </span>

                    </a>

                    <a href="{{ route('admin.blog-comments.index', ['status' => 'approved']) }}"
                        class="inline-flex items-center gap-2 rounded-md border border-green-200 bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700 transition hover:bg-green-100 dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/30">

                        <i class="bi bi-check-circle"></i>

                        <span>
                            Approved
                        </span>

                        <span class="rounded bg-green-100 px-1.5 py-0.5 text-[10px] dark:bg-green-900/40">
                            {{ number_format($counts['approved']) }}
                        </span>

                    </a>

                    <a href="{{ route('admin.blog-comments.index', ['status' => 'rejected']) }}"
                        class="inline-flex items-center gap-2 rounded-md border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 transition hover:bg-red-100 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/30">

                        <i class="bi bi-x-circle"></i>

                        <span>
                            Rejected
                        </span>

                        <span class="rounded bg-red-100 px-1.5 py-0.5 text-[10px] dark:bg-red-900/40">
                            {{ number_format($counts['rejected'] ?? 0) }}
                        </span>

                    </a>

                </div>
            </div>

            {{-- Desktop Table --}}
            <div class="hidden overflow-x-auto lg:block">

                <table class="min-w-[1150px] w-full divide-y divide-gray-200 dark:divide-gray-700">

                    <thead class="bg-gray-50 dark:bg-gray-900/70">

                        <tr>

                            <th
                                class="w-12 whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                #
                            </th>

                            <th
                                class="w-[360px] whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Comment
                            </th>

                            <th
                                class="w-[320px] whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Blog Post
                            </th>

                            <th
                                class="w-28 whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Type
                            </th>

                            <th
                                class="w-28 whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Status
                            </th>

                            <th
                                class="w-32 whitespace-nowrap px-4 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Date
                            </th>

                            <th
                                class="w-36 whitespace-nowrap px-4 py-3 text-right text-xs font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody id="commentTableBody"
                        class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">

                        @forelse ($comments as $comment)
                            <tr class="comment-row group transition hover:bg-gray-50 dark:hover:bg-gray-700/40"
                                data-search="{{ strtolower($comment->name . ' ' . $comment->email . ' ' . $comment->comment . ' ' . ($comment->post->title ?? '') . ' ' . ($comment->status ?? '')) }}">

                                {{-- Number --}}
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $comments->firstItem() + $loop->index }}
                                </td>

                                {{-- Comment --}}
                                <td class="px-4 py-4">

                                    <div class="flex w-[340px] items-start gap-3">

                                        <div
                                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                            {{ strtoupper(substr($comment->name ?? 'U', 0, 1)) }}
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <div class="truncate text-sm font-semibold text-gray-900 dark:text-white"
                                                title="{{ $comment->name }}">
                                                {{ $comment->name }}
                                            </div>

                                            <div class="mt-0.5 truncate text-xs text-gray-500 dark:text-gray-400"
                                                title="{{ $comment->email }}">
                                                {{ $comment->email }}
                                            </div>

                                            <div class="mt-1.5 line-clamp-2 text-xs leading-5 text-gray-600 dark:text-gray-300"
                                                title="{{ $comment->comment }}">
                                                {{ $comment->comment }}
                                            </div>

                                        </div>

                                    </div>

                                </td>

                                {{-- Blog Post --}}
                                <td class="px-4 py-4">

                                    @if ($comment->post)
                                        <a href="{{ route('admin.blogs.show', $comment->post) }}"
                                            class="group flex w-[300px] items-center gap-3">

                                            <div
                                                class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                                                <i class="bi bi-journal-text"></i>
                                            </div>

                                            <div class="min-w-0">

                                                <div class="truncate text-sm font-semibold text-gray-700 transition group-hover:text-blue-600 dark:text-gray-300 dark:group-hover:text-blue-400"
                                                    title="{{ $comment->post->title }}">
                                                    {{ Str::limit($comment->post->title, 42) }}
                                                </div>

                                                <div class="mt-0.5 text-xs text-gray-400 dark:text-gray-500">
                                                    Blog Post
                                                </div>

                                            </div>

                                        </a>
                                    @else
                                        <span class="text-xs italic text-gray-400 dark:text-gray-500">
                                            Blog post unavailable
                                        </span>
                                    @endif

                                </td>

                                {{-- Type --}}
                                <td class="whitespace-nowrap px-4 py-4">

                                    @if ($comment->parent_id)
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-md bg-purple-50 px-2.5 py-1.5 text-xs font-semibold text-purple-700 dark:bg-purple-900/20 dark:text-purple-300">
                                            <i class="bi bi-reply"></i>
                                            Reply
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-md bg-blue-50 px-2.5 py-1.5 text-xs font-semibold text-blue-700 dark:bg-blue-900/20 dark:text-blue-300">
                                            <i class="bi bi-chat"></i>
                                            Comment
                                        </span>
                                    @endif

                                    @if ($comment->replies_count > 0)
                                        <div class="mt-1 text-[10px] text-gray-400 dark:text-gray-500">
                                            {{ $comment->replies_count }}
                                            {{ Str::plural('reply', $comment->replies_count) }}
                                        </div>
                                    @endif

                                </td>

                                {{-- Status --}}
                                <td class="whitespace-nowrap px-4 py-4">

                                    @if ($comment->status === 'approved')
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700 dark:bg-green-900/20 dark:text-green-300">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Approved
                                        </span>
                                    @elseif ($comment->status === 'pending')
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-yellow-50 px-2.5 py-1 text-xs font-semibold text-yellow-700 dark:bg-yellow-900/20 dark:text-yellow-300">
                                            <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>
                                            Pending
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-700 dark:bg-red-900/20 dark:text-red-300">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                            Rejected
                                        </span>
                                    @endif

                                </td>

                                {{-- Date --}}
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-gray-500 dark:text-gray-400">

                                    @if ($comment->created_at)
                                        <div class="flex flex-col">

                                            <span>
                                                {{ $comment->created_at->format('d M Y') }}
                                            </span>

                                            <span class="text-xs text-gray-400 dark:text-gray-500">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>

                                        </div>
                                    @else
                                        <span class="italic">
                                            Unknown
                                        </span>
                                    @endif

                                </td>

                                {{-- Actions --}}
                                <td class="whitespace-nowrap px-4 py-4">

                                    <div class="flex items-center justify-end gap-1.5">

                                        @can('view_blog_comments')
                                            <a href="{{ route('admin.blog-comments.show', $comment) }}"
                                                class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-200 bg-white text-gray-600 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:border-blue-700 dark:hover:bg-blue-900/30 dark:hover:text-blue-400"
                                                title="View Comment" aria-label="View Comment">
                                                <i class="bi bi-eye text-sm"></i>
                                            </a>
                                        @endcan

                                        @if ($comment->status !== 'approved')
                                            @can('approve_blog_comment')
                                                <form action="{{ route('admin.blog-comments.approve', $comment) }}"
                                                    method="POST" class="inline-flex comment-action-form"
                                                    data-confirm="Are you sure you want to approve this comment?">

                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                        class="flex h-8 w-8 items-center justify-center rounded-md border border-green-200 bg-green-50 text-green-600 transition hover:bg-green-100 dark:border-green-800/50 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/40"
                                                        title="Approve Comment" aria-label="Approve Comment">
                                                        <i class="bi bi-check-lg text-sm"></i>
                                                    </button>

                                                </form>
                                            @endcan
                                        @endif

                                        @if ($comment->status !== 'rejected')
                                            @can('reject_blog_comment')
                                                <form action="{{ route('admin.blog-comments.reject', $comment) }}"
                                                    method="POST" class="inline-flex comment-action-form"
                                                    data-confirm="Are you sure you want to reject this comment?">

                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                        class="flex h-8 w-8 items-center justify-center rounded-md border border-yellow-200 bg-yellow-50 text-yellow-600 transition hover:bg-yellow-100 dark:border-yellow-800/50 dark:bg-yellow-900/20 dark:text-yellow-400 dark:hover:bg-yellow-900/40"
                                                        title="Reject Comment" aria-label="Reject Comment">
                                                        <i class="bi bi-x-lg text-sm"></i>
                                                    </button>

                                                </form>
                                            @endcan
                                        @endif

                                        @can('delete_blog_comment')
                                            <form action="{{ route('admin.blog-comments.destroy', $comment) }}"
                                                method="POST" class="inline-flex comment-action-form"
                                                data-confirm="This comment will be permanently deleted. Continue?">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border border-red-200 bg-red-50 text-red-600 transition hover:bg-red-100 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40"
                                                    title="Delete Comment" aria-label="Delete Comment">
                                                    <i class="bi bi-trash text-sm"></i>
                                                </button>

                                            </form>
                                        @endcan

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="px-4 py-16 text-center">

                                    <div
                                        class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                                        <i
                                            class="bi bi-chat-square-text text-2xl text-gray-400 dark:text-gray-500"></i>
                                    </div>

                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                        No comments found
                                    </h3>

                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        @if (request()->filled('search') || request()->filled('status'))
                                            No comments match your current filters.
                                        @else
                                            No comments have been submitted yet.
                                        @endif
                                    </p>

                                    @if (request()->filled('search') || request()->filled('status'))
                                        <a href="{{ route('admin.blog-comments.index') }}"
                                            class="mt-4 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-3.5 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                            Clear Filters
                                        </a>
                                    @endif

                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Mobile / Tablet --}}
            <div class="divide-y divide-gray-200 dark:divide-gray-700 lg:hidden">

                @forelse ($comments as $comment)
                    <div class="comment-card p-4 sm:p-5"
                        data-search="{{ strtolower($comment->name . ' ' . $comment->email . ' ' . $comment->comment . ' ' . ($comment->post->title ?? '') . ' ' . ($comment->status ?? '')) }}">

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                {{ strtoupper(substr($comment->name ?? 'U', 0, 1)) }}
                            </div>

                            <div class="min-w-0 flex-1">

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                        {{ $comment->name }}
                                    </h3>

                                    @if ($comment->status === 'approved')
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-0.5 text-[10px] font-semibold text-green-700 dark:bg-green-900/20 dark:text-green-300">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Approved
                                        </span>
                                    @elseif ($comment->status === 'pending')
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-yellow-50 px-2 py-0.5 text-[10px] font-semibold text-yellow-700 dark:bg-yellow-900/20 dark:text-yellow-300">
                                            <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>
                                            Pending
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-0.5 text-[10px] font-semibold text-red-700 dark:bg-red-900/20 dark:text-red-300">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                            Rejected
                                        </span>
                                    @endif

                                </div>

                                <p class="mt-0.5 truncate text-xs text-gray-500 dark:text-gray-400">
                                    {{ $comment->email }}
                                </p>

                            </div>

                        </div>

                        {{-- Comment --}}
                        <div class="mt-4 rounded-lg bg-gray-50 p-4 dark:bg-gray-900">

                            <div class="flex items-start gap-2">

                                <i class="bi bi-quote text-lg text-gray-300 dark:text-gray-600"></i>

                                <p class="text-sm leading-6 text-gray-700 dark:text-gray-300">
                                    {{ $comment->comment }}
                                </p>

                            </div>

                        </div>

                        {{-- Meta --}}
                        <div class="mt-4 space-y-2">

                            @if ($comment->post)
                                <a href="{{ route('admin.blogs.show', $comment->post) }}"
                                    class="flex min-w-0 items-center gap-2 text-xs text-gray-600 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400">

                                    <i class="bi bi-journal-text flex-shrink-0"></i>

                                    <span class="truncate">
                                        {{ $comment->post->title }}
                                    </span>

                                </a>
                            @endif

                            <div class="flex flex-wrap items-center gap-3 text-xs">

                                @if ($comment->parent_id)
                                    <span
                                        class="inline-flex items-center gap-1.5 text-purple-600 dark:text-purple-400">
                                        <i class="bi bi-reply"></i>
                                        Reply
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 text-blue-600 dark:text-blue-400">
                                        <i class="bi bi-chat"></i>
                                        Comment
                                    </span>
                                @endif

                                @if ($comment->replies_count > 0)
                                    <span class="inline-flex items-center gap-1.5 text-gray-500 dark:text-gray-400">
                                        <i class="bi bi-chat-dots"></i>
                                        {{ $comment->replies_count }}
                                        {{ Str::plural('reply', $comment->replies_count) }}
                                    </span>
                                @endif

                                @if ($comment->created_at)
                                    <span class="inline-flex items-center gap-1.5 text-gray-500 dark:text-gray-400">
                                        <i class="bi bi-clock"></i>
                                        {{ $comment->created_at->format('d M Y, h:i A') }}
                                    </span>
                                @endif

                            </div>

                        </div>

                        {{-- Actions --}}
                        <div class="mt-4 flex flex-wrap gap-2">

                            @can('view_blog_comments')
                                <a href="{{ route('admin.blog-comments.show', $comment) }}"
                                    class="inline-flex items-center gap-1.5 rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100 dark:bg-blue-900/20 dark:text-blue-400 dark:hover:bg-blue-900/40">
                                    <i class="bi bi-eye"></i>
                                    View
                                </a>
                            @endcan

                            @if ($comment->status !== 'approved')
                                @can('approve_blog_comment')
                                    <form action="{{ route('admin.blog-comments.approve', $comment) }}" method="POST"
                                        class="comment-action-form"
                                        data-confirm="Are you sure you want to approve this comment?">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-lg bg-green-50 px-3 py-2 text-xs font-semibold text-green-600 transition hover:bg-green-100 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/40">
                                            <i class="bi bi-check-lg"></i>
                                            Approve
                                        </button>

                                    </form>
                                @endcan
                            @endif

                            @if ($comment->status !== 'rejected')
                                @can('reject_blog_comment')
                                    <form action="{{ route('admin.blog-comments.reject', $comment) }}" method="POST"
                                        class="comment-action-form"
                                        data-confirm="Are you sure you want to reject this comment?">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 rounded-lg bg-yellow-50 px-3 py-2 text-xs font-semibold text-yellow-600 transition hover:bg-yellow-100 dark:bg-yellow-900/20 dark:text-yellow-400 dark:hover:bg-yellow-900/40">
                                            <i class="bi bi-x-lg"></i>
                                            Reject
                                        </button>

                                    </form>
                                @endcan
                            @endif

                            @can('delete_blog_comment')
                                <form action="{{ route('admin.blog-comments.destroy', $comment) }}" method="POST"
                                    class="comment-action-form"
                                    data-confirm="This comment will be permanently deleted. Continue?">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="inline-flex items-center gap-1.5 rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40">
                                        <i class="bi bi-trash"></i>
                                        Delete
                                    </button>

                                </form>
                            @endcan

                        </div>

                    </div>

                @empty

                    <div class="px-4 py-16 text-center">

                        <div
                            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                            <i class="bi bi-chat-square-text text-2xl text-gray-400 dark:text-gray-500"></i>
                        </div>

                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                            No comments found
                        </h3>

                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            No comments match your current filters.
                        </p>

                    </div>
                @endforelse

            </div>

            {{-- Client Search Empty State --}}
            <div id="commentSearchEmptyState" class="hidden px-4 py-14 text-center">

                <div
                    class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">
                    <i class="bi bi-search text-xl text-gray-400 dark:text-gray-500"></i>
                </div>

                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    No matching comments
                </h3>

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Try searching with a different name, email, comment, blog post or status.
                </p>

                <button type="button" id="resetCommentSearch"
                    class="mt-4 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-3.5 py-2 text-xs font-semibold text-white transition hover:bg-blue-700">
                    <i class="bi bi-arrow-counterclockwise"></i>
                    Clear Search
                </button>

            </div>

            {{-- Pagination --}}
            @if ($comments->hasPages())
                <div class="border-t border-gray-200 bg-gray-50 px-4 py-3 dark:border-gray-700 dark:bg-gray-900/40">

                    {{ $comments->links() }}

                </div>
            @endif

        </div>

    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const searchInput = document.getElementById('commentSearch');
                const clearButton = document.getElementById('clearCommentSearch');
                const resetButton = document.getElementById('resetCommentSearch');
                const rows = document.querySelectorAll('.comment-row');
                const cards = document.querySelectorAll('.comment-card');
                const searchEmptyState = document.getElementById('commentSearchEmptyState');

                function performSearch() {

                    if (!searchInput) {
                        return;
                    }

                    const search = searchInput.value.toLowerCase().trim();

                    let visibleRows = 0;

                    rows.forEach(function(row) {

                        const searchText = row.dataset.search || '';

                        if (searchText.includes(search)) {
                            row.style.display = '';
                            visibleRows++;
                        } else {
                            row.style.display = 'none';
                        }

                    });

                    cards.forEach(function(card) {

                        const searchText = card.dataset.search || '';

                        if (searchText.includes(search)) {
                            card.style.display = '';
                            visibleRows++;
                        } else {
                            card.style.display = 'none';
                        }

                    });

                    if (clearButton) {

                        clearButton.classList.toggle(
                            'hidden',
                            search === ''
                        );

                        clearButton.classList.toggle(
                            'flex',
                            search !== ''
                        );

                    }

                    if (searchEmptyState) {

                        searchEmptyState.classList.toggle(
                            'hidden',
                            search === '' || visibleRows !== 0
                        );

                    }

                }

                function clearSearch() {

                    if (!searchInput) {
                        return;
                    }

                    searchInput.value = '';

                    performSearch();

                    searchInput.focus();

                }

                if (searchInput) {
                    searchInput.addEventListener('input', performSearch);
                }

                if (clearButton) {
                    clearButton.addEventListener('click', clearSearch);
                }

                if (resetButton) {
                    resetButton.addEventListener('click', clearSearch);
                }

                document.querySelectorAll('.comment-action-form').forEach(function(form) {

                    form.addEventListener('submit', function(event) {

                        const message = form.dataset.confirm;

                        if (message && !confirm(message)) {
                            event.preventDefault();
                        }

                    });

                });

            });
        </script>
    @endpush

</x-app-layout>
