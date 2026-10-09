<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Demo;
use App\Models\DemoCategory;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $hero = [
            'heroBadge' => 'Custom Software Development Company',

            'heroTitleLine1' => 'Custom Software &',
            'heroTitleHighlight' => 'Website Development',
            'heroTitleLine2' => 'Solutions',

            'heroSubtitle' => 'Areia Soft is a custom software development company that builds high-performance websites, web applications, ERP, CRM, SaaS, eCommerce and AI-powered solutions to help businesses automate, scale and grow.',

            'primaryButton' => 'Our Services',
            'secondaryButton' => 'Start Your Project',
        ];

        $globe = [
            'label' => 'Global Presence',
            'title' => 'Delivering Digital Solutions Worldwide',
            'stats' => [
                [
                    'number' => '20+',
                    'label' => 'Projects Delivered',
                ],
                [
                    'number' => '10+',
                    'label' => 'Countries Served',
                ],
                [
                    'number' => '99.9%',
                    'label' => 'System Uptime',
                ],
                [
                    'number' => '24/7',
                    'label' => 'Technical Support',
                ],
            ],
        ];

        $portfolios = config('global.portfolios', []);
        $clients = config('global.clients', []);
        
        $services = Service::active()->orderBy('sort_order')->take(12)->get();

        return view('welcome', compact('hero', 'globe', 'services', 'clients', 'portfolios'));
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

    public function caseStudy()
    {
        return view('frontend.pages.case-study');
    }

    public function demoLibery()
    {
        $categories = DemoCategory::active()
            ->with([
                'activeDemos' => function ($query) {
                    $query->orderBy('serial_no');
                }
            ])
            ->orderBy('serial_no')
            ->get();

        return view('frontend.pages.demo-libery', compact('categories'));
    }

    public function demoDetails($slug)
    {
        $demo = Demo::active()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedDemos = Demo::active()
            ->where('demo_category_id', $demo->demo_category_id)
            ->where('id', '!=', $demo->id)
            ->orderBy('serial_no')
            ->take(3)
            ->get();

        return view('frontend.pages.demo-detail', compact(
            'demo',
            'relatedDemos'
        ));
    }
}
