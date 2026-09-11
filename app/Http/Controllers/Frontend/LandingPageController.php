<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    /**
     * Display an SEO landing page.
     */
    public function show(string $slug): View
    {
        $pages = config('landing-pages.pages');

        if (!isset($pages[$slug])) {
            abort(404);
        }

        $page = $pages[$slug];

        return view('frontend.landing-pages.show', [
            'page' => $page,
            'slug' => $slug,
        ]);
    }
}
