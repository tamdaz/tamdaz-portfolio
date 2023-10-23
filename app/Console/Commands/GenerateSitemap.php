<?php

namespace App\Console\Commands;

use Spatie\Sitemap\Sitemap;
use Illuminate\Console\Command;
use App\Models\{Blog, Project};

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
        $sitemap->add('/');
        $sitemap->add('/profile');

        foreach (Blog::all()->where('is_published', '=', true) as $blog) {
            $sitemap->add("/blogs/{$blog->id}");
        }

        $sitemap->add('/contact');
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info("Sitemap has been successfully updated");
    }
}
