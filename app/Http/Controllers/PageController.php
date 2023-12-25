<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Jobs\SendEmail;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Skill;
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
            'profile' => Profile::with('avatar')->without('attachment')->first(),
            'skills' => Skill::with('icon')->without('attachment')->get(),
            'experiences' => Experience::all(),
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
