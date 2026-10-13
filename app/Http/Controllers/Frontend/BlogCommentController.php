<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function store(Request $request, BlogPost $blogPost): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        $blogPost->comments()->create([
            'parent_id' => null,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'comment' => $validated['comment'],
            'status' => 'pending',
        ]);

        return back()->with(
            'comment_success',
            'Your comment has been submitted and is awaiting approval.'
        );
    }

    public function reply(Request $request, BlogComment $comment): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        if ($comment->status !== 'approved') {
            abort(404);
        }

        $comment->replies()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'comment' => $validated['comment'],
            'status' => 'pending',
        ]);

        return back()->with(
            'comment_success',
            'Your reply has been submitted and is awaiting approval.'
        );
    }
}
