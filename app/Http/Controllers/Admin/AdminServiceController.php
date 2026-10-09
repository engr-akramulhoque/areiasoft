<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
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
    public function store(ServiceRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['slug'] = $this->normalizeSlug($validated['slug']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['active'] = $request->boolean('active');

        // Store uploaded images on the public disk. Keep the original filename.
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = 'services/' . $filename;

            // If a file with this name already exists, preserve it and choose a
            // unique filename to avoid overwriting another service's image.
            if (Storage::disk('public')->exists($path)) {
                $extension = $file->getClientOriginalExtension();
                $basename = pathinfo($filename, PATHINFO_FILENAME);
                $filename = $basename . '-' . Str::uuid() . ($extension ? '.' . $extension : '');
                $path = 'services/' . $filename;
            }

            $file->storeAs('services', $filename, 'public');
            $validated['image'] = $path;
        } else {
            unset($validated['image']);
        }

        Service::create($validated);

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
    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $validated = $request->validated();

        $validated['slug'] = $this->normalizeSlug($validated['slug']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['active'] = $request->boolean('active');

        // If no new upload is submitted, retain the current database image path.
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $newPath = 'services/' . $filename;
            $oldPath = $service->image;

            // Keep the original filename when it is safe to reuse. If that name
            // is already occupied by a different file, use a unique filename.
            $oldIsSamePath = is_string($oldPath)
                && ! Str::startsWith($oldPath, ['http://', 'https://'])
                && ltrim($oldPath, '/') === $newPath;

            if (
                Storage::disk('public')->exists($newPath)
                && ! $oldIsSamePath
            ) {
                $extension = $file->getClientOriginalExtension();
                $basename = pathinfo($filename, PATHINFO_FILENAME);
                $filename = $basename . '-' . Str::uuid() . ($extension ? '.' . $extension : '');
                $newPath = 'services/' . $filename;
            }

            // Store first. Only after successful storage update the database,
            // then remove the previous locally stored image if it differs.
            $file->storeAs('services', $filename, 'public');
            $validated['image'] = $newPath;

            $service->update($validated);

            if (
                is_string($oldPath)
                && $oldPath !== ''
                && ! Str::startsWith($oldPath, ['http://', 'https://'])
                && ltrim($oldPath, '/') !== $newPath
            ) {
                Storage::disk('public')->delete(ltrim($oldPath, '/'));
            }
        } else {
            // A file input is empty when the user leaves the current image alone.
            unset($validated['image']);
            $service->update($validated);
        }

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
