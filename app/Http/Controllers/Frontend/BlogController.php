<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display all published blog posts.
     */
    public function index(): View
    {
        $posts = BlogPost::query()
            ->with('category')
            ->published()
            ->latest('published_at')
            ->paginate(9);

        $categories = BlogCategory::query()
            ->where('status', true)
            ->withCount([
                'posts' => function ($query) {
                    $query->published();
                },
            ])
            ->orderBy('name')
            ->get();

        return view('frontend.blog.index', compact(
            'posts',
            'categories'
        ));
    }


    /**
     * Display posts belonging to a category.
     */
    public function category(string $slug): View
    {
        $category = BlogCategory::query()
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $posts = BlogPost::query()
            ->with('category')
            ->where('category_id', $category->id)
            ->published()
            ->latest('published_at')
            ->paginate(9);

        $categories = BlogCategory::query()
            ->where('status', true)
            ->withCount([
                'posts' => function ($query) {
                    $query->published();
                },
            ])
            ->orderBy('name')
            ->get();

        return view('frontend.blog.category', compact(
            'category',
            'posts',
            'categories'
        ));
    }


    /**
     * Display a single published blog post.
     */
    public function show(string $slug): View
    {
        $post = BlogPost::query()
            ->with([
                'category',
                'approvedComments' => function ($query) {
                    $query
                        ->whereNull('parent_id')
                        ->with('approvedReplies')
                        ->latest();
                },
            ])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Related Posts
        |--------------------------------------------------------------------------
        |
        | Keep this simple:
        | Show latest posts from the same category,
        | excluding the current post.
        |
        */

        $relatedPosts = BlogPost::query()
            ->with('category')
            ->published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->limit(3)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = BlogCategory::query()
            ->where('status', true)
            ->withCount([
                'posts' => function ($query) {
                    $query->published();
                },
            ])
            ->orderBy('name')
            ->get();

        return view('frontend.blog.show', compact(
            'post',
            'relatedPosts',
            'categories'
        ));
    }
}
