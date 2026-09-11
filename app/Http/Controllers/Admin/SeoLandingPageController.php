<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoLandingPage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeoLandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = SeoLandingPage::query()
            ->orderBy('sort_order')
            ->orderBy('title')
            ->paginate(20);

        return view('admin.landing-pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.landing-pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        $validated['trust_points'] = $this->arrayValue($request->input('trust_points'));
        $validated['problem'] = $this->sectionValue($request->input('problem'));
        $validated['solution'] = $this->sectionValue($request->input('solution'));
        $validated['capabilities'] = $this->arrayValue($request->input('capabilities'));
        $validated['process'] = $this->arrayValue($request->input('process'));
        $validated['technologies'] = $this->arrayValue($request->input('technologies'));
        $validated['benefits'] = $this->arrayValue($request->input('benefits'));
        $validated['faqs'] = $this->arrayValue($request->input('faqs'));
        $validated['related_pages'] = $this->arrayValue($request->input('related_pages'));

        $validated['status'] = $request->boolean('status');

        SeoLandingPage::create($validated);

        return redirect()
            ->route('admin.seo-landing-pages.index')
            ->with('success', 'SEO landing page created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SeoLandingPage $seoLandingPage)
    {
        return view('admin.landing-pages.show', [
            'page' => $seoLandingPage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeoLandingPage $seoLandingPage)
    {
        return view('admin.landing-pages.edit', [
            'page' => $seoLandingPage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeoLandingPage $seoLandingPage)
    {
        $validated = $this->validateData(
            $request,
            $seoLandingPage
        );

        $validated['trust_points'] = $this->arrayValue($request->input('trust_points'));
        $validated['problem'] = $this->sectionValue($request->input('problem'));
        $validated['solution'] = $this->sectionValue($request->input('solution'));
        $validated['capabilities'] = $this->arrayValue($request->input('capabilities'));
        $validated['process'] = $this->arrayValue($request->input('process'));
        $validated['technologies'] = $this->arrayValue($request->input('technologies'));
        $validated['benefits'] = $this->arrayValue($request->input('benefits'));
        $validated['faqs'] = $this->arrayValue($request->input('faqs'));
        $validated['related_pages'] = $this->arrayValue($request->input('related_pages'));

        $validated['status'] = $request->boolean('status');

        $seoLandingPage->update($validated);

        return redirect()
            ->route('admin.seo-landing-pages.index')
            ->with('success', 'SEO landing page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeoLandingPage $seoLandingPage)
    {
        $seoLandingPage->delete();

        return redirect()
            ->route('admin.seo-landing-pages.index')
            ->with('success', 'SEO landing page deleted successfully.');
    }

    private function validateData(
        Request $request,
        ?SeoLandingPage $seoLandingPage = null
    ): array {
        return $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('seo_landing_pages', 'slug')
                    ->ignore($seoLandingPage?->id),
            ],

            'eyebrow' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_title' => [
                'required',
                'string',
                'max:500',
            ],

            'hero_description' => [
                'nullable',
                'string',
            ],

            'hero_image' => [
                'nullable',
                'string',
                'max:500',
            ],

            'primary_cta' => [
                'nullable',
                'string',
                'max:255',
            ],

            'primary_cta_url' => [
                'nullable',
                'string',
                'max:500',
            ],

            'secondary_cta' => [
                'nullable',
                'string',
                'max:255',
            ],

            'secondary_cta_url' => [
                'nullable',
                'string',
                'max:500',
            ],

            'trust_points' => [
                'nullable',
                'array',
            ],

            'trust_points.*' => [
                'nullable',
                'string',
                'max:500',
            ],

            'problem' => [
                'nullable',
                'array',
            ],

            'problem.title' => [
                'nullable',
                'string',
                'max:500',
            ],

            'problem.text' => [
                'nullable',
                'string',
            ],

            'problem.points' => [
                'nullable',
                'array',
            ],

            'problem.points.*' => [
                'nullable',
                'string',
                'max:500',
            ],

            'solution' => [
                'nullable',
                'array',
            ],

            'solution.title' => [
                'nullable',
                'string',
                'max:500',
            ],

            'solution.text' => [
                'nullable',
                'string',
            ],

            'solution.points' => [
                'nullable',
                'array',
            ],

            'solution.points.*' => [
                'nullable',
                'string',
                'max:500',
            ],

            'capabilities' => [
                'nullable',
                'array',
            ],

            'capabilities.*.title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'capabilities.*.text' => [
                'nullable',
                'string',
            ],

            'capabilities.*.icon' => [
                'nullable',
                'string',
                'max:100',
            ],

            'process' => [
                'nullable',
                'array',
            ],

            'process.*.number' => [
                'nullable',
                'string',
                'max:50',
            ],

            'process.*.title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'process.*.text' => [
                'nullable',
                'string',
            ],

            'technologies' => [
                'nullable',
                'array',
            ],

            'technologies.*' => [
                'nullable',
                'string',
                'max:255',
            ],

            'benefits' => [
                'nullable',
                'array',
            ],

            'benefits.*' => [
                'nullable',
                'string',
                'max:500',
            ],

            'faqs' => [
                'nullable',
                'array',
            ],

            'faqs.*.question' => [
                'nullable',
                'string',
                'max:500',
            ],

            'faqs.*.answer' => [
                'nullable',
                'string',
            ],

            'related_pages' => [
                'nullable',
                'array',
            ],

            'related_pages.*' => [
                'nullable',
                'string',
                'max:255',
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
    }

    private function arrayValue(?array $value): array
    {
        if (!$value) {
            return [];
        }

        return array_values(
            array_filter(
                $value,
                fn($item) => $item !== null && $item !== ''
            )
        );
    }

    private function sectionValue(?array $value): ?array
    {
        if (!$value) {
            return null;
        }

        $points = $value['points'] ?? [];

        $value['points'] = array_values(
            array_filter(
                $points,
                fn($point) => $point !== null && $point !== ''
            )
        );

        return $value;
    }
}
