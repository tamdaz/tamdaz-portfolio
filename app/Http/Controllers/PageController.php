<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactFormRequest;
use App\Models\{Experience, Profile, Skill};

class PageController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'profile' => Profile::findOrFail(1)
        ]);
    }

    public function profile(): View
    {
        return view('pages.profile', [
            'profile' => Profile::findOrFail(1),
            'skills' => Skill::all(),
            'periods' => Experience::all()
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function contact_send(ContactFormRequest $request): RedirectResponse
    {
        Mail::to('contact@tamdaz.fr')->send(new ContactMail($request));

        return redirect()->route('pages.contact')->with('success');
    }

    public function components(): View
    {
        return view('pages.components');
    }
}