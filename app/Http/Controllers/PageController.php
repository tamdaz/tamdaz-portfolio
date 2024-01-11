<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Jobs\SendEmail;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    /**
     * Home page
     */
    public function index(): View
    {
        return view('index', [
            'skills' => Skill::with('icon')->without('attachment')->get(),
            'experiences' => Experience::all(),
        ]);
    }

    /**
     * Certifications page
     */
    public function certifications(): RedirectResponse|View
    {
        if (App::isProduction()) {
            return redirect()->route('pages.index');
        }

        return view('pages.certifications', [
            'certifications' => [] // Certification::with('certificate')->without('attachment')->get()
        ]);
    }

    /**
     * Technology watch
     */
    public function technology_watch(): RedirectResponse|View
    {
        if (App::isProduction()) {
            return redirect()->route('pages.index');
        }

        return view('pages.technology-watch');
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
            ->with('success', 'Je vous répondrai dans les plus brefs délais')
        ;
    }

    /**
     * SECRET PAGE: components page
     */
    public function components(): View
    {
        return view('pages.components');
    }
}
