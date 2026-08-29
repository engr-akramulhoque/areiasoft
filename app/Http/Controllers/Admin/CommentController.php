<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(Request $request): View
    {
        $validated = $request->validate([
            'status' => ['nullable', 'in:pending,approved'],
            'search' => ['nullable', 'string', 'max:255'],
        ]);

        $query = BlogComment::query()
            ->with([
                'post:id,title,slug',
                'parent:id,name',
            ])
            ->withCount('replies');

        if (!empty($validated['status'])) {
            $query->where('status', $validated['status']);
        }

        if (!empty($validated['search'])) {
            $search = $validated['search'];

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('comment', 'like', "%{$search}%");
            });
        }

        $comments = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $counts = [
            'all' => BlogComment::count(),
            'pending' => BlogComment::pending()->count(),
            'approved' => BlogComment::approved()->count(),
        ];

        return view('admin.blog.comments.index', compact(
            'comments',
            'counts'
        ));
    }

    public function show(BlogComment $comment): View
    {
        $comment->load([
            'post',
            'parent',
            'replies' => function ($query) {
                $query->latest();
            },
        ]);

        return view('admin.blog.comments.show', compact('comment'));
    }

    public function approve(BlogComment $comment): RedirectResponse
    {
        $comment->update([
            'status' => 'approved',
        ]);

        return back()->with(
            'success',
            'Comment approved successfully.'
        );
    }

    public function reject(BlogComment $comment): RedirectResponse
    {
        /*
         * Reject means permanently deleting the comment.
         */
        $comment->delete();

        return redirect()
            ->route('admin.blog-comments.index')
            ->with(
                'success',
                'Comment rejected and deleted successfully.'
            );
    }

    public function destroy(BlogComment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()
            ->route('admin.blog-comments.index')
            ->with(
                'success',
                'Comment deleted successfully.'
            );
    }
}
