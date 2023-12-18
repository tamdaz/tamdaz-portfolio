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
    public function index(): View
    {
        return view('index', [
            'profile' => Profile::with('attachment')->first(),
            'skills' => Skill::with('attachment')->get(),
            'experiences' => Experience::all(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function contact_send(ContactFormRequest $request): RedirectResponse
    {
        SendEmail::dispatch($request->all());

        return redirect()
            ->route('pages.contact')
            ->with('success', 'Je vous répondrai dans les plus brefs délais');
    }

    public function components(): View
    {
        return view('pages.components');
    }
}
