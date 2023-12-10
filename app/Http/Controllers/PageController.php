<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Skill;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'profile' => Profile::firstOrFail(),
        ]);
    }

    public function profile(): View
    {
        return view('pages.profile', [
            'profile' => Profile::firstOrFail(),
            'skills' => Skill::all(),
            'periods' => Experience::all(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function contact_send(ContactFormRequest $request): RedirectResponse
    {
        Mail::to($request->get('email'))->send(new ContactMail($request));

        return redirect()->route('pages.contact')
            ->with('success', 'Je vous répondrai dans les plus brefs délais');
    }

    public function components(): View
    {
        return view('pages.components');
    }
}
