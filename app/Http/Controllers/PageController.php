<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Certification;
use App\Models\Report;
use App\Models\Skill;
use App\Models\Timeline;
use App\Models\TW;
use Illuminate\Contracts\View\View;
use Spatie\RouteAttributes\Attributes\Get;

class PageController extends Controller
{
    /**
     * Home page
     */
    #[Get('/', name: 'pages.home')]
    public function index(): View
    {
        return view('index', [
            'skills' => Skill::with('icon')->without('attachment')->get(),
            'timelines' => [
                'experience' => Timeline::filterByType('experience')->toArray(),
                'formation' => Timeline::filterByType('formation')->toArray(),
            ],
        ]);
    }

    /**
     * BTS SIO page
     */
    #[Get('/bts-sio', name: 'pages.bts-sio')]
    public function btssio(): View
    {
        return view('pages.bts-sio');
    }

    /**
     * Certifications page
     */
    #[Get('/certifications', name: 'pages.certifications')]
    public function certifications(): View
    {
        return view('pages.certifications', [
            'certifications' => Certification::with('certificate')->get(),
        ]);
    }

    /**
     * Technology watch
     */
    #[Get('/technology-watch', name: 'pages.tw')]
    public function technology_watch(): View
    {
        return view('pages.technology-watch', [
            'news' => TW::all(),
        ]);
    }

    /**
     * Reports
     */
    #[Get('/reports', name: 'pages.reports')]
    public function reports(): View
    {
        return view('pages.reports', [
            'reports' => Report::latestReport()->with('file', 'category')->get(),
        ]);
    }

    /**
     * SECRET PAGE: components page
     */
    #[Get('/components', name: 'pages.components')]
    public function components(): View
    {
        return view('pages.components');
    }

    #[Get('/sitemap', name: 'pages.sitemap')]
    public function sitemap(): View
    {
        [$blogs, $reports, $tw] = [
            Category::usedFor('blogs')->with('blogs')->latest('created_at')->get(),
            Category::usedFor('reports')->with('reports.file')->get(),
            TW::all(),
        ];

        return view('sitemap', compact('blogs', 'reports', 'tw'));
    }
}
