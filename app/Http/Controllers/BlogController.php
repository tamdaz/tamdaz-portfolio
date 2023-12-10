<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blogs.index');
    }

    public function btssio(): View
    {
        return view('pages.bts-sio');
    }

    public function show(Blog $blog): View
    {
        if (! $blog->is_published) {
            abort(404);
        }

        return view('blogs.show', compact('blog'));
    }
}
