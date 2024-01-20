<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a sitemap for more accessibility';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $sitemap = Sitemap::create();

        $sitemap->add([
            '/', '/bts-sio', '/certifications', '/technology-watch',
            '/reports', '/blogs', '/contact',
        ]);

        $sitemap->add(Blog::published()->get());

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap has been successfully updated');
    }
}
