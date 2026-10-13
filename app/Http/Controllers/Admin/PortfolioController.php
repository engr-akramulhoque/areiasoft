<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::ordered()->paginate(15);

        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:portfolios,slug'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,avif', 'max:5120'],
            'category' => ['nullable', 'array'],
            'category.*' => ['nullable', 'string', 'max:100'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['nullable', 'string', 'max:100'],
            'overview' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'url' => ['nullable', 'url', 'max:255'],
            'featured' => ['nullable', 'boolean'],
            'status' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['slug'] ?: $validated['title']
        );

        $validated['category'] = $this->cleanArray($validated['category'] ?? []);
        $validated['tags'] = $this->cleanArray($validated['tags'] ?? []);
        $validated['featured'] = $request->boolean('featured');
        $validated['status'] = $request->boolean('status', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $validated['image'] = $this->storeImage($request->file('image'));
        }

        Portfolio::create($validated);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:portfolios,slug,' . $portfolio->id],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,avif', 'max:5120'],
            'category' => ['nullable', 'array'],
            'category.*' => ['nullable', 'string', 'max:100'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['nullable', 'string', 'max:100'],
            'overview' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'url' => ['nullable', 'url', 'max:255'],
            'featured' => ['nullable', 'boolean'],
            'status' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['slug'] ?: $validated['title'],
            $portfolio->id
        );

        $validated['category'] = $this->cleanArray($validated['category'] ?? []);
        $validated['tags'] = $this->cleanArray($validated['tags'] ?? []);
        $validated['featured'] = $request->boolean('featured');
        $validated['status'] = $request->boolean('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $validated['image'] = $this->storeImage($request->file('image'));
        }

        $portfolio->update($validated);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio deleted successfully.');
    }

    /**
     * Toggle the portfolio status.
     */
    public function toggleStatus(Portfolio $portfolio)
    {
        $portfolio->update([
            'status' => !$portfolio->status,
        ]);

        return back()->with(
            'success',
            $portfolio->status
                ? 'Portfolio activated successfully.'
                : 'Portfolio deactivated successfully.'
        );
    }

    private function storeImage($file): string
    {
        $directory = 'uploads/portfolios';
        $filename = $file->getClientOriginalName();
        $path = $directory . '/' . $filename;

        if (Storage::disk('public')->exists($path)) {
            $extension = $file->getClientOriginalExtension();
            $name = pathinfo($filename, PATHINFO_FILENAME);
            $filename = $name . '-' . Str::uuid() . '.' . $extension;
        }

        return $file->storeAs($directory, $filename, 'public');
    }

    private function generateUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $slug = Str::slug($value);
        $original = $slug;
        $counter = 1;

        while (
            Portfolio::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }

    private function cleanArray(array $items): array
    {
        return collect($items)
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }
}