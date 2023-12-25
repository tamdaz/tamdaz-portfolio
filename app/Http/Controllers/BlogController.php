<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    /**
     * Blog index page
     */
    public function index(): View
    {
        return view('blogs.index');
    }

    /**
     * BTS SIO page
     */
    public function btssio(): View
    {
        return view('pages.bts-sio');
    }

    /**
     * Blog show page
     */
    public function show(Blog $blog): View
    {
        if (!$blog->is_published) {
            abort(404);
        }

        return view('blogs.show', compact('blog'));
    }
}
