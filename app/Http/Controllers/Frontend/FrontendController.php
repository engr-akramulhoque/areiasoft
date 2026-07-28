<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    
    public function about()
    {
        return view('frontend.pages.about');
    }
    
    public function globalImpact()
    {
        return view('frontend.pages.global-impact');
    }
    
    public function ceoProfile()
    {
        return view('frontend.pages.ceo-profile');
    }
    
    public function policy()
    {
        return view('frontend.pages.policy');
    }
    
    public function terms()
    {
        return view('frontend.pages.terms');
    }
}
