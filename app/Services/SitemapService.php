<?php

namespace App\Services;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Demo;
use App\Models\Portfolio;
use App\Models\Service;

class SitemapService
{
    public static function get()
    {
        // Pages
        $pages = [
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Services', 'url' => route('service.index')],
            ['title' => 'Contact Us', 'url' => route('contact.index')],
            ['title' => 'Our Works', 'url' => route('work.index')],
            ['title' => 'Case Studies', 'url' => route('case-studies')],
            ['title' => 'Live Demos', 'url' => route('demo.index')],
            ['title' => 'Latest Blogs', 'url' => route('blog.index')],
        ];

        // Company
        $company = [
            ['title' => 'About Us', 'url' => route('about.index')],
            ['title' => 'Message from CEO', 'url' => route('ceo-speech')],
            ['title' => 'Global Impact', 'url' => route('global-impact')],
            ['title' => 'Privacy Policy', 'url' => route('privacy.policy')],
            ['title' => 'Terms & Conditions', 'url' => route('terms.show')],
            ['title' => 'Sitemap', 'url' => route('sitemap')],
        ];

        // Dynamic services
        $services = Service::select('title', 'slug')->cursor()->map(function ($s) {
            return [
                'title' => $s->title,
                'url' => route('service.show', $s->slug)
            ];
        });

        // Dynamic our_works
        $our_works = Portfolio::select('title', 'slug')->cursor()->map(function ($p) {
            return [
                'title' => $p->title,
                'url' => route('work.show', $p->slug)
            ];
        });
        
        // Dynamic live_demos
        $live_demos = Demo::select('title', 'slug')->cursor()->map(function ($p) {
            return [
                'title' => $p->title,
                'url' => route('demo.details', $p->slug)
            ];
        });

        // Dynamic blog_categories
        $blog_categories = BlogCategory::select('name', 'slug')->cursor()->map(function ($b) {
            return [
                'title' => $b->name,
                'url' => route('blog.category', $b->slug)
            ];
        });

        // Dynamic blogs
        $blogs = BlogPost::select('title', 'slug')->cursor()->map(function ($b) {
            return [
                'title' => $b->title,
                'url' => route('blog.show', $b->slug)
            ];
        });

        return compact('pages', 'company', 'services', 'our_works', 'blog_categories', 'blogs', 'live_demos');
    }
}
