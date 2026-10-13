<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::withCount('posts')
            ->latest()
            ->paginate(15);

        return view('admin.blog.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:blog_categories,name',
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:blog_categories,slug',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $slug = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        BlogCategory::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.blog.categories.index')
            ->with('success', 'Blog category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        $blogCategory->loadCount('posts');

        $blogCategory->load([
            'posts' => function ($query) {
                $query->latest()->limit(10);
            },
        ]);

        return view('admin.blog.category.show', compact('blogCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog.category.edit', [
            'blogCategory' => $blogCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:blog_categories,name,' . $blogCategory->id,
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:blog_categories,slug,' . $blogCategory->id,
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $slug = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);

        $blogCategory->update([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('admin.blog.categories.index')
            ->with('success', 'Blog category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        if ($blogCategory->posts()->exists()) {
            return back()->with(
                'error',
                'This category cannot be deleted because it has blog posts assigned to it.'
            );
        }

        $blogCategory->delete();

        return redirect()
            ->route('admin.blog.categories.index')
            ->with('success', 'Blog category deleted successfully.');
    }

    public function toggleStatus(BlogCategory $blogCategory): RedirectResponse
    {
        $blogCategory->update([
            'status' => ! $blogCategory->status,
        ]);

        return back()->with(
            'success',
            'Category status updated successfully.'
        );
    }
}
