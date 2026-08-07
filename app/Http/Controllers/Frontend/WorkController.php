<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $portfolios = config('global.portfolios', []);

        return view('frontend.pages.work', compact('portfolios'));
    }
    
    public function show($work)
    {
        return view('frontend.pages.work-detail');
    }
}
