<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Jobs\SendEmail;
use App\Models\Certification;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\TW;
use Illuminate\Contracts\View\View;
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
            'experiences' => Experience::orderByDesc('date_start')->get(),
        ]);
    }

    /**
     * Certifications page
     */
    public function certifications(): RedirectResponse|View
    {
        return view('pages.certifications', [
            'certifications' => Certification::with('certificate')->get(),
        ]);
    }

    /**
     * Technology watch
     */
    public function technology_watch(): RedirectResponse|View
    {
        return view('pages.technology-watch', [
            'news' => TW::all(),
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
