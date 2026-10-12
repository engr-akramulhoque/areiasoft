<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Services\SitemapService;

#[Signature('sitemap:generate')]
#[Description('Generate the sitemap.xml file dynamically')]
class SitemapGenerator extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();
        $data = SitemapService::get();

        $this->info('Starting sitemap generation...');

        // Lazy-load URLs: iterate and add each URL
        $addUrls = function ($items, $options = []) use ($sitemap) {
            foreach ($items as $item) {
                $url = Url::create($item['url'])
                    ->setLastModificationDate($options['lastmod'] ?? now())
                    ->setChangeFrequency($options['changefreq'] ?? 'weekly')
                    ->setPriority($options['priority'] ?? 0.8);

                $sitemap->add($url);
            }
        };

        // Add static pages & company pages
        $addUrls(array_merge($data['pages'], $data['company']), ['priority' => 1.0]);

        // Add dynamic services
        $addUrls($data['services'], ['priority' => 0.9]);

        // Add dynamic portfolios
        $addUrls($data['our_works'], ['priority' => 0.9]);

        // Add dynamic blogs
        $addUrls($data['blogs'], ['priority' => 0.7]);

        // Save sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully in lazy mode!');
    }
}
