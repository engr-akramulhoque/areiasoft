<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SeoLandingPage;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    /**
     * Display an SEO landing page.
     */
    public function show(string $slug): View
    {
        $page = SeoLandingPage::query()->active()->where('slug', $slug)->firstOrFail();

        return view('frontend.landing-pages.show', [
            'page' => $page,
            'slug' => $slug,
        ]);
    }
}
