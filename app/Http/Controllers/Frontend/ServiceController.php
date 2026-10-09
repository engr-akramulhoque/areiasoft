<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('sort_order')->get();

        return view('frontend.pages.service', compact('services'));
    }

    public function show(string $service)
    {
        $service = Service::active()->where('slug', $service)->firstOrFail();
        
        $services = Service::active()->orderBy('sort_order')->get();

        return view('frontend.pages.service-detail', compact('service', 'services'));
    }
}
