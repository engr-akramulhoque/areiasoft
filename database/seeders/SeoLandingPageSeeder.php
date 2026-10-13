<?php

namespace Database\Seeders;

use App\Models\SeoLandingPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoLandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = config('landing-pages.pages', []);

        foreach ($pages as $page) {
            SeoLandingPage::updateOrCreate(
                [
                    'slug' => $page['slug'],
                ],
                [
                    'title' => $page['title'],
                    'eyebrow' => $page['eyebrow'] ?? null,

                    'hero_title' => $page['hero_title'],
                    'hero_description' => $page['hero_description'] ?? null,
                    'hero_image' => $page['hero_image'] ?? null,

                    'primary_cta' => $page['primary_cta'] ?? null,
                    'primary_cta_url' => $page['primary_cta_url'] ?? null,

                    'secondary_cta' => $page['secondary_cta'] ?? null,
                    'secondary_cta_url' => $page['secondary_cta_url'] ?? null,

                    'problem' => $page['problem'] ?? null,
                    'solution' => $page['solution'] ?? null,
                    'capabilities' => $page['capabilities'] ?? [],
                    'process' => $page['process'] ?? [],
                    'technologies' => $page['technologies'] ?? [],
                    'benefits' => $page['benefits'] ?? [],
                    'faqs' => $page['faqs'] ?? [],
                    'related_pages' => $page['related_pages'] ?? [],

                    'status' => true,
                    'sort_order' => 0,
                ]
            );
        }
    }
}
