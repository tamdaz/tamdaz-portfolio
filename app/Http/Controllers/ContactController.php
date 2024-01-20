<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Jobs\SendEmail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;

class ContactController extends Controller
{
    /**
     * Contact page
     */
    #[Get('/contact', name: 'pages.contact')]
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Send an email message
     */
    #[Post('/contact', name: 'pages.contact_send', middleware: 'throttle:contact')]
    public function contact_send(ContactFormRequest $request): RedirectResponse
    {
        SendEmail::dispatch($request->all());

        return redirect()
            ->route('pages.contact')
            ->with('success', 'Je vous répondrai dans les plus brefs délais');
    }
}
