<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminServiceController extends Controller
{
    /**
     * Display all services.
     */
    public function index(): View
    {
        $services = Service::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the create service form.
     */
    public function create(): View
    {
        $service = new Service();

        return view('admin.services.create', compact('service'));
    }

    /**
     * Store a new service.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validated($request);

        $validated['slug'] = $this->normalizeSlug($validated['slug']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['active'] = $request->boolean('active');

        $service = Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display a single service in the admin panel.
     */
    public function show(Service $service): View
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the edit service form.
     */
    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update an existing service.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validated($request);

        $validated['slug'] = $this->normalizeSlug($validated['slug']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['active'] = $request->boolean('active');

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Delete a service.
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    /**
     * Activate or deactivate a service.
     */
    public function toggleStatus(Service $service): RedirectResponse
    {
        $service->update([
            'active' => ! $service->active,
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                $service->active
                    ? 'Service activated successfully.'
                    : 'Service deactivated successfully.'
            );
    }

    /**
     * Normalize slug without changing its intended URL text.
     */
    private function normalizeSlug(string $slug): string
    {
        return Str::slug($slug);
    }
}
