<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Artisan;

class SitemapController extends Controller implements HasMiddleware
{
    /**
     * Define middleware for this controller class.
     *
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view_sitemap', only: ['index']),
            new Middleware('permission:edit_sitemap', only: ['create']),
        ];
    }

    public function index()
    {
        $sitemapPath = public_path('sitemap.xml');

        $sitemap = file_exists($sitemapPath) ? file_get_contents($sitemapPath) : null;

        return view('admin.sitemap.index', compact('sitemap'));
    }

    public function create()
    {
        Artisan::call('sitemap:generate');

        return redirect()->route('admin.sitemap.index')->with('success', 'Sitemap generated successfully!');
    }
}
