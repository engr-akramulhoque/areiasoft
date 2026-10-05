<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demo;
use App\Models\DemoCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DemoController extends Controller implements HasMiddleware
{
    /**
     * Define controller middleware.
     *
     * @return array<int, Middleware>
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view_demo', only: ['index', 'show']),
            new Middleware('permission:create_demo', only: ['create', 'store']),
            new Middleware('permission:edit_demo', only: ['edit', 'update']),
            new Middleware('permission:delete_demo', only: ['destroy']),
            new Middleware('permission:toggle_demo_status', only: ['toggleStatus']),
            new Middleware('permission:toggle_demo_featured', only: ['toggleFeatured']),
        ];
    }

    /**
     * Display the demo listing.
     */
    public function index(): View
    {
        $demos = Demo::with('category')
            ->latest()
            ->paginate(20);

        return view('admin.demos.index', compact('demos'));
    }

    /**
     * Show the demo creation form.
     */
    public function create(): View
    {
        $categories = DemoCategory::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.demos.create', compact('categories'));
    }

    /**
     * Store a newly created demo.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateData($request);

        $validated['slug'] = $this->uniqueSlug(
            $validated['slug'] ?? $validated['title']
        );

        $validated['status'] = $request->boolean('status');
        $validated['featured'] = $request->boolean('featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('demos/thumbnails', 'public');
        }

        if ($request->hasFile('preview_image')) {
            $validated['preview_image'] = $request->file('preview_image')
                ->store('demos/previews', 'public');
        }

        Demo::create($validated);

        return redirect()
            ->route('admin.demos.index')
            ->with('success', 'Demo created successfully.');
    }

    /**
     * Display the specified demo.
     */
    public function show(Demo $demo): View
    {
        $demo->load('category');

        return view('admin.demos.show', compact('demo'));
    }

    /**
     * Show the demo edit form.
     */
    public function edit(Demo $demo): View
    {
        $categories = DemoCategory::where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('admin.demos.edit', compact('demo', 'categories'));
    }

    /**
     * Update the specified demo.
     */
    public function update(Request $request, Demo $demo): RedirectResponse
    {
        $validated = $this->validateData($request, $demo->id);

        $requestedSlug = trim($validated['slug'] ?? '');

        if (
            $demo->title !== $validated['title'] ||
            ($requestedSlug !== '' && $requestedSlug !== $demo->slug)
        ) {
            $validated['slug'] = $this->uniqueSlug(
                $requestedSlug !== '' ? $requestedSlug : $validated['title'],
                $demo->id
            );
        } else {
            $validated['slug'] = $demo->slug;
        }

        $validated['status'] = $request->boolean('status');
        $validated['featured'] = $request->boolean('featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('thumbnail')) {
            $this->deleteFile($demo->thumbnail);

            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('demos/thumbnails', 'public');
        }

        if ($request->hasFile('preview_image')) {
            $this->deleteFile($demo->preview_image);

            $validated['preview_image'] = $request->file('preview_image')
                ->store('demos/previews', 'public');
        }

        $demo->update($validated);

        return redirect()
            ->route('admin.demos.index')
            ->with('success', 'Demo updated successfully.');
    }

    /**
     * Remove the specified demo.
     */
    public function destroy(Demo $demo): RedirectResponse
    {
        $this->deleteFile($demo->thumbnail);
        $this->deleteFile($demo->preview_image);

        $demo->delete();

        return redirect()
            ->route('admin.demos.index')
            ->with('success', 'Demo deleted successfully.');
    }

    /**
     * Toggle the demo status.
     */
    public function toggleStatus(Demo $demo): RedirectResponse
    {
        $demo->update([
            'status' => !$demo->status,
        ]);

        return back()->with(
            'success',
            $demo->status
                ? 'Demo activated successfully.'
                : 'Demo deactivated successfully.'
        );
    }

    /**
     * Toggle the featured status.
     */
    public function toggleFeatured(Demo $demo): RedirectResponse
    {
        $demo->update([
            'featured' => !$demo->featured,
        ]);

        return back()->with(
            'success',
            $demo->featured
                ? 'Demo marked as featured.'
                : 'Demo removed from featured.'
        );
    }

    /**
     * Validate demo request data.
     */
    private function validateData(Request $request, ?int $demoId = null): array
    {
        $slugRule = 'unique:demos,slug';

        if ($demoId) {
            $slugRule .= ',' . $demoId;
        }

        return $request->validate([
            'category_id' => [
                'required',
                'exists:demo_categories,id',
            ],
            'title' => [
                'required',
                'string',
                'max:180',
            ],
            'slug' => [
                'nullable',
                'string',
                'max:200',
                $slugRule,
            ],
            'short_description' => [
                'nullable',
                'string',
                'max:500',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
            'preview_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],
            'demo_url' => [
                'nullable',
                'url',
                'max:500',
            ],
            'technology' => [
                'nullable',
                'string',
                'max:500',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
            'featured' => [
                'nullable',
                'boolean',
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);
    }

    /**
     * Generate a unique demo slug.
     */
    private function uniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $slug = Str::slug($value);

        if ($slug === '') {
            $slug = 'demo';
        }

        $baseSlug = $slug;
        $counter = 1;

        while (
            Demo::where('slug', $slug)
            ->when(
                $ignoreId,
                fn($query) => $query->whereKeyNot($ignoreId)
            )
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }

    /**
     * Delete a stored demo file.
     */
    private function deleteFile(?string $path): void
    {
        if (
            $path &&
            Storage::disk('public')->exists($path)
        ) {
            Storage::disk('public')->delete($path);
        }
    }
}
