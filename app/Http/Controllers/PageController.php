<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Jobs\SendEmail;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Report;
use App\Models\Skill;
use App\Models\Timeline;
use App\Models\TW;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    /**
     * Home page
     */
    public function index(): View
    {
        return view('index', [
            'skills' => Skill::with('icon')->without('attachment')->get(),
            'timelines' => [
                'experience' => Timeline::latest('date_start')
                    ->where('type', '=', 'experience')
                    ->get()
                    ->toArray(),
                'formation' => Timeline::latest('date_start')
                    ->where('type', '=', 'formation')
                    ->get()
                    ->toArray(),
            ],
        ]);
    }

    /**
     * Certifications page
     */
    public function certifications(): View
    {
        return view('pages.certifications', [
            'certifications' => Certification::with('certificate')->get(),
        ]);
    }

    /**
     * Technology watch
     */
    public function technology_watch(): View
    {
        return view('pages.technology-watch', [
            'news' => TW::all(),
        ]);
    }

    /**
     * Reports
     */
    public function reports(): View
    {
        return view('pages.reports', [
            'reports' => Report::latestReport()->with('file', 'category')->get()
        ]);
    }

    /**
     * Contact page
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Send a email message
     */
    public function contact_send(ContactFormRequest $request): RedirectResponse
    {
        SendEmail::dispatch($request->all());

        return redirect()
            ->route('pages.contact')
            ->with('success', 'Je vous répondrai dans les plus brefs délais');
    }

    /**
     * SECRET PAGE: components page
     */
    public function components(): View
    {
        return view('pages.components');
    }
}
