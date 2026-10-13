<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;

class WorkController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::active()->orderBy('sort_order')->get();

        return view('frontend.pages.work', compact('portfolios'));
    }
    
    public function show(string $slug)
    {
        $portfolio = Portfolio::active()->where('slug', $slug)->first();

        return view('frontend.pages.work-detail', compact('portfolio'));
    }
}
