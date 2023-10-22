<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactFormRequest;
use App\Models\{Blog, Experience, Profile, Project, Skill};

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
            'profile' => Profile::findOrFail(1)
        ]);
    }

    public function skills(): View
    {
        return view('pages.skills', [
            'skills' => Skill::all()
        ]);
    }

    public function experiences(): View
    {
        return view('pages.experiences', [
            'periods' => Experience::all()
        ]);
    }

    public function projects(): View
    {
        return view('pages.articles', [
            'type' => "projects"
        ]);
    }

    public function project_show(string $id): View
    {
        return view('pages.article_show', [
            'article' => Project::published()->findOrFail($id)
        ]);
    }

    public function blogs(): View
    {
        return view('pages.articles', [
            'type' => "blogs"
        ]);
    }

    public function blog_show(string $id): View
    {
        return view('pages.article_show', [
            'article' => Blog::published()->findOrFail($id)
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