<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = BlogPost::with('category')
            ->withCount('comments')
            ->latest()
            ->paginate(15);

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = BlogCategory::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => [
                'required',
                'integer',
                'exists:blog_categories,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
                'unique:blog_posts,title',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:blog_posts,slug',
            ],

            'excerpt' => [
                'nullable',
                'string',
                'max:500',
            ],

            'content' => [
                'required',
                'string',
            ],

            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);

        if (BlogPost::where('slug', $slug)->exists()) {
            $slug = $this->generateUniqueSlug($validated['title']);
        }

        $featuredImage = null;

        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image')
                ->store('blog', 'public');
        }

        $publishedAt = null;

        if ($validated['status'] === 'published') {
            $publishedAt = $validated['published_at'] ?? now();
        }

        BlogPost::create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'featured_image' => $featuredImage,
            'status' => $validated['status'],
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blog): View
    {
        $blog->load([
            'category',
            'comments' => fn($query) => $query->latest(),
        ]);

        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blog): View
    {
        $categories = BlogCategory::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blog): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => [
                'required',
                'integer',
                'exists:blog_categories,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
                'unique:blog_posts,title,' . $blog->id,
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:blog_posts,slug,' . $blog->id,
            ],

            'excerpt' => [
                'nullable',
                'string',
                'max:500',
            ],

            'content' => [
                'required',
                'string',
            ],

            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);

        if (
            BlogPost::where('slug', $slug)
            ->where('id', '!=', $blog->id)
            ->exists()
        ) {
            $slug = $this->generateUniqueSlug(
                $validated['title'],
                $blog->id
            );
        }

        $featuredImage = $blog->featured_image;

        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }

            $featuredImage = $request->file('featured_image')
                ->store('blog', 'public');
        }

        $publishedAt = null;

        if ($validated['status'] === 'published') {
            $publishedAt = $validated['published_at']
                ?? $blog->published_at
                ?? now();
        }

        $blog->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'featured_image' => $featuredImage,
            'status' => $validated['status'],
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blog): RedirectResponse
    {
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Toggle the status of the specified blog post.
     */
    public function toggleStatus(BlogPost $blog): RedirectResponse
    {
        if ($blog->status === 'published') {
            $blog->update([
                'status' => 'draft',
                'published_at' => null,
            ]);

            return back()->with(
                'success',
                'Blog post moved to draft successfully.'
            );
        }

        $blog->update([
            'status' => 'published',
            'published_at' => $blog->published_at ?? now(),
        ]);

        return back()->with(
            'success',
            'Blog post published successfully.'
        );
    }

    /**
     * Generate a unique slug for a blog post.
     */
    private function generateUniqueSlug(
        string $title,
        ?int $ignoreId = null
    ): string {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (
            BlogPost::where('slug', $slug)
            ->when(
                $ignoreId,
                fn($query) => $query->where('id', '!=', $ignoreId)
            )
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
