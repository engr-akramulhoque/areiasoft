<x-app-layout>

    <div class="container mx-auto px-4 py-6">

        {{-- Header --}}
        <div class="mb-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div class="min-w-0">

                    <div class="mb-1 flex items-center gap-2">

                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/30">
                            <i class="bi bi-chat-left-text text-blue-600 dark:text-blue-400"></i>
                        </div>

                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Comment Details
                        </h1>

                    </div>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Review the comment, author information and moderation status.
                    </p>

                </div>

                <div class="flex flex-wrap items-center gap-2">

                    <a href="{{ route('admin.blog-comments.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                        <i class="bi bi-arrow-left"></i>
                        Back to Comments
                    </a>

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

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

            {{-- Main Content --}}
            <div class="space-y-6 xl:col-span-2">

                {{-- Comment Card --}}
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                    {{-- Card Header --}}
                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                            <div>

                                <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                                    Comment
                                </h2>

                                <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                    Visitor submitted content
                                </p>

                            </div>

                            {{-- Status --}}
                            @if ($comment->status === 'approved')
                                <span
                                    class="inline-flex w-fit items-center gap-1.5 rounded-full bg-green-50 px-3 py-1.5 text-xs font-semibold text-green-700 dark:bg-green-900/20 dark:text-green-300">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                    Approved
                                </span>
                            @elseif ($comment->status === 'pending')
                                <span
                                    class="inline-flex w-fit items-center gap-1.5 rounded-full bg-yellow-50 px-3 py-1.5 text-xs font-semibold text-yellow-700 dark:bg-yellow-900/20 dark:text-yellow-300">
                                    <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>
                                    Pending Review
                                </span>
                            @else
                                <span
                                    class="inline-flex w-fit items-center gap-1.5 rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 dark:bg-red-900/20 dark:text-red-300">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                    Rejected
                                </span>
                            @endif

                        </div>

                    </div>

                    {{-- Comment Body --}}
                    <div class="p-5">

                        <div
                            class="relative rounded-xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-gray-900">

                            <div class="absolute left-0 top-5 h-10 w-1 rounded-r-full bg-blue-500">
                            </div>

                            <div class="flex gap-4">

                                <div
                                    class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-sm font-bold text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                    {{ strtoupper(substr($comment->name, 0, 1)) }}
                                </div>

                                <div class="min-w-0 flex-1">

                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1">

                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                            {{ $comment->name }}
                                        </h3>

                                        <span class="text-xs text-gray-400 dark:text-gray-500">
                                            {{ $comment->email }}
                                        </span>

                                    </div>

                                    <div
                                        class="mt-1 flex flex-wrap items-center gap-2 text-xs text-gray-400 dark:text-gray-500">

                                        <span class="inline-flex items-center gap-1">
                                            <i class="bi bi-calendar3"></i>
                                            {{ $comment->created_at?->format('d M Y') }}
                                        </span>

                                        <span>•</span>

                                        <span class="inline-flex items-center gap-1">
                                            <i class="bi bi-clock"></i>
                                            {{ $comment->created_at?->format('h:i A') }}
                                        </span>

                                        @if ($comment->created_at)
                                            <span>•</span>

                                            <span>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                        @endif

                                    </div>

                                </div>

                            </div>

                            <div class="mt-6">

                                <div
                                    class="mb-2 flex items-center gap-2 text-xs font-semibold uppercase tracking-wide text-gray-400 dark:text-gray-500">
                                    <i class="bi bi-quote text-base"></i>
                                    Message
                                </div>

                                <div class="whitespace-pre-line text-sm leading-7 text-gray-700 dark:text-gray-300">
                                    {{ $comment->comment }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Blog Post --}}
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                        <div class="flex items-center justify-between gap-3">

                            <div>

                                <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                                    Related Blog Post
                                </h2>

                                <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                    The post where this comment was submitted
                                </p>

                            </div>

                            <i class="bi bi-journal-text text-lg text-gray-300 dark:text-gray-600"></i>

                        </div>

                    </div>

                    <div class="p-5">

                        @if ($comment->post)

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                                <div
                                    class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-xl bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                                    <i class="bi bi-journal-text text-xl"></i>
                                </div>

                                <div class="min-w-0 flex-1">

                                    <a href="{{ route('admin.blogs.show', $comment->post) }}"
                                        class="line-clamp-2 text-sm font-semibold text-gray-900 transition hover:text-blue-600 dark:text-white dark:hover:text-blue-400">
                                        {{ $comment->post->title }}
                                    </a>

                                    @if ($comment->post->slug)
                                        <p
                                            class="mt-1 flex items-center gap-1 truncate text-xs text-gray-400 dark:text-gray-500">
                                            <i class="bi bi-link-45deg"></i>
                                            {{ $comment->post->slug }}
                                        </p>
                                    @endif

                                </div>

                                <a href="{{ route('admin.blogs.show', $comment->post) }}"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3.5 py-2 text-xs font-semibold text-gray-700 transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 dark:hover:border-blue-700 dark:hover:bg-blue-900/30 dark:hover:text-blue-400">

                                    <i class="bi bi-eye"></i>
                                    View Post

                                </a>

                            </div>
                        @else
                            <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-4 dark:bg-gray-900">

                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-lg bg-gray-100 text-gray-400 dark:bg-gray-800 dark:text-gray-500">
                                    <i class="bi bi-journal-x"></i>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Blog post unavailable
                                    </p>

                                    <p class="mt-0.5 text-xs text-gray-400 dark:text-gray-500">
                                        The original blog post may have been removed.
                                    </p>
                                </div>

                            </div>

                        @endif

                    </div>

                </div>

                {{-- Reply Information --}}
                @if ($comment->parent_id)
                    <div
                        class="overflow-hidden rounded-xl border border-purple-200 bg-white shadow-sm dark:border-purple-800/50 dark:bg-gray-800">

                        <div
                            class="border-b border-purple-100 bg-purple-50/50 px-5 py-4 dark:border-purple-800/50 dark:bg-purple-900/10">

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-lg bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                                    <i class="bi bi-reply"></i>
                                </div>

                                <div>

                                    <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                                        Reply to Another Comment
                                    </h2>

                                    <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                        This comment is part of a comment conversation.
                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="p-5">

                            <div class="flex items-center gap-2 text-xs text-purple-600 dark:text-purple-400">

                                <i class="bi bi-diagram-3"></i>

                                <span>
                                    Parent Comment ID:
                                </span>

                                <span class="font-semibold">
                                    #{{ $comment->parent_id }}
                                </span>

                            </div>

                        </div>

                    </div>
                @endif

            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">

                {{-- Author Card --}}
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                            Comment Author
                        </h2>

                        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                            Visitor information
                        </p>

                    </div>

                    <div class="p-5">

                        <div class="flex flex-col items-center text-center">

                            <div
                                class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-100 text-2xl font-bold text-blue-600 ring-4 ring-blue-50 dark:bg-blue-900/30 dark:text-blue-400 dark:ring-blue-900/20">
                                {{ strtoupper(substr($comment->name, 0, 1)) }}
                            </div>

                            <h3 class="mt-4 text-base font-semibold text-gray-900 dark:text-white">
                                {{ $comment->name }}
                            </h3>

                            <p class="mt-1 break-all text-xs text-gray-500 dark:text-gray-400">
                                {{ $comment->email }}
                            </p>

                        </div>

                        <div class="mt-5 space-y-3 border-t border-gray-100 pt-5 dark:border-gray-700">

                            <div class="flex items-center justify-between gap-3">

                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    Comment ID
                                </span>

                                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">
                                    #{{ $comment->id }}
                                </span>

                            </div>

                            <div class="flex items-center justify-between gap-3">

                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    Type
                                </span>

                                @if ($comment->parent_id)
                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-md bg-purple-50 px-2 py-1 text-[11px] font-semibold text-purple-700 dark:bg-purple-900/20 dark:text-purple-300">
                                        <i class="bi bi-reply"></i>
                                        Reply
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 rounded-md bg-blue-50 px-2 py-1 text-[11px] font-semibold text-blue-700 dark:bg-blue-900/20 dark:text-blue-300">
                                        <i class="bi bi-chat"></i>
                                        Comment
                                    </span>
                                @endif

                            </div>

                            <div class="flex items-center justify-between gap-3">

                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    Submitted
                                </span>

                                <span class="text-right text-xs font-medium text-gray-700 dark:text-gray-300">
                                    {{ $comment->created_at?->format('d M Y, h:i A') }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Moderation --}}
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                    <div class="border-b border-gray-200 px-5 py-4 dark:border-gray-700">

                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                            Moderation
                        </h2>

                        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                            Manage publication status
                        </p>

                    </div>

                    <div class="p-5">

                        <div class="space-y-2">

                            @if ($comment->status !== 'approved')
                                @can('approve_blog_comment')
                                    <form action="{{ route('admin.blog-comments.approve', $comment) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                            class="flex w-full items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">

                                            <i class="bi bi-check-lg"></i>
                                            Approve Comment

                                        </button>

                                    </form>
                                @endcan
                            @endif

                            @if ($comment->status !== 'rejected')
                                @can('reject_blog_comment')
                                    <form action="{{ route('admin.blog-comments.reject', $comment) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit"
                                            class="flex w-full items-center justify-center gap-2 rounded-lg border border-yellow-200 bg-yellow-50 px-4 py-2.5 text-sm font-semibold text-yellow-700 transition hover:bg-yellow-100 dark:border-yellow-800/50 dark:bg-yellow-900/20 dark:text-yellow-400 dark:hover:bg-yellow-900/40">

                                            <i class="bi bi-x-lg"></i>
                                            Reject Comment

                                        </button>

                                    </form>
                                @endcan
                            @endif

                            @can('delete_blog_comment')
                                <form action="{{ route('admin.blog-comments.destroy', $comment) }}" method="POST"
                                    class="delete-comment-form">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="flex w-full items-center justify-center gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100 dark:border-red-800/50 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40">

                                        <i class="bi bi-trash3"></i>
                                        Delete Comment

                                    </button>

                                </form>
                            @endcan

                        </div>

                    </div>

                </div>

                {{-- Status Information --}}
                <div class="rounded-xl border border-gray-200 bg-gray-50 p-5 dark:border-gray-700 dark:bg-gray-900/50">

                    <div class="flex items-start gap-3">

                        <div
                            class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                            <i class="bi bi-info-circle"></i>
                        </div>

                        <div>

                            <h3 class="text-xs font-semibold text-gray-900 dark:text-white">
                                Moderation Status
                            </h3>

                            <p class="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-400">

                                @if ($comment->status === 'approved')
                                    This comment is currently visible to visitors if the blog post is published.
                                @elseif ($comment->status === 'pending')
                                    This comment is waiting for moderation and should not be publicly visible yet.
                                @else
                                    This comment has been rejected and should not be displayed publicly.
                                @endif

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const deleteForm = document.querySelector('.delete-comment-form');

                if (deleteForm) {
                    deleteForm.addEventListener('submit', function(event) {

                        const confirmed = confirm(
                            'Are you sure you want to permanently delete this comment? This action cannot be undone.'
                        );

                        if (!confirmed) {
                            event.preventDefault();
                        }

                    });
                }

                document.querySelectorAll(
                    'form[action*="approve"], form[action*="reject"]'
                ).forEach(function(form) {

                    form.addEventListener('submit', function(event) {

                        const isApprove = form.action.includes('approve');

                        const message = isApprove ?
                            'Are you sure you want to approve this comment?' :
                            'Are you sure you want to reject this comment?';

                        if (!confirm(message)) {
                            event.preventDefault();
                        }

                    });

                });

            });
        </script>
    @endpush

</x-app-layout>
