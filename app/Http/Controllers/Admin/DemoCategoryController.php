<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemoCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DemoCategoryController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view_demo_category', only: ['index', 'show']),
            new Middleware('permission:create_demo_category', only: ['create', 'store']),
            new Middleware('permission:edit_demo_category', only: ['edit', 'update']),
            new Middleware('permission:delete_demo_category', only: ['destroy']),
            new Middleware('permission:toggle_demo_category_status', only: ['toggleStatus']),
        ];
    }

    public function index(): View
    {
        $categories = DemoCategory::withCount('demos')
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('admin.demos.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.demos.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'unique:demo_categories,name',
            ],
            'slug' => [
                'nullable',
                'string',
                'max:120',
                'unique:demo_categories,slug',
            ],
            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        $validated['slug'] = $this->uniqueSlug(
            $validated['slug'] ?? $validated['name']
        );

        $validated['status'] = $request->boolean('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        DemoCategory::create($validated);

        return redirect()
            ->route('admin.demo.categories.index')
            ->with('success', 'Demo category created successfully.');
    }

    public function show(DemoCategory $demoCategory): View
    {
        $demoCategory->loadCount('demos');

        return view('admin.demos.categories.show', compact('demoCategory'));
    }

    public function edit(DemoCategory $demoCategory): View
    {
        return view('admin.demos.categories.edit', compact('demoCategory'));
    }

    public function update(
        Request $request,
        DemoCategory $demoCategory
    ): RedirectResponse {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'unique:demo_categories,name,' . $demoCategory->id,
            ],
            'slug' => [
                'nullable',
                'string',
                'max:120',
                'unique:demo_categories,slug,' . $demoCategory->id,
            ],
            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        $submittedSlug = trim($validated['slug'] ?? '');

        if ($submittedSlug !== '') {
            $validated['slug'] = $this->uniqueSlug(
                $submittedSlug,
                $demoCategory->id
            );
        } else {
            $validated['slug'] = $this->uniqueSlug(
                $validated['name'],
                $demoCategory->id
            );
        }

        $validated['status'] = $request->boolean('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $demoCategory->update($validated);

        return redirect()
            ->route('admin.demo.categories.index')
            ->with('success', 'Demo category updated successfully.');
    }

    public function destroy(DemoCategory $demoCategory): RedirectResponse
    {
        if ($demoCategory->demos()->exists()) {
            return back()->with(
                'error',
                'This category cannot be deleted because it contains demos.'
            );
        }

        $demoCategory->delete();

        return redirect()
            ->route('admin.demo.categories.index')
            ->with('success', 'Demo category deleted successfully.');
    }

    public function toggleStatus(DemoCategory $demoCategory): RedirectResponse
    {
        $demoCategory->update([
            'status' => !$demoCategory->status,
        ]);

        return back()->with(
            'success',
            $demoCategory->status
                ? 'Category activated successfully.'
                : 'Category deactivated successfully.'
        );
    }

    private function uniqueSlug(
        string $value,
        ?int $ignoreId = null
    ): string {
        $slug = Str::slug($value);

        if ($slug === '') {
            $slug = 'demo-category';
        }

        $baseSlug = $slug;
        $counter = 1;

        while (
            DemoCategory::where('slug', $slug)
            ->when(
                $ignoreId !== null,
                fn($query) => $query->whereKeyNot($ignoreId)
            )
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
