<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services= config('areiasoft.services', []);

        return view('frontend.pages.service', compact('services'));
    }
    
    public function show(string $service)
    {
        $services = config('areiasoft.services');

        $service = collect($services)->firstWhere('slug', $service);
        abort_unless($service, 404);

        return view('frontend.pages.service-detail', compact('service', 'services'));
    }
}
