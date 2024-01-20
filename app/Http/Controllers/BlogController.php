<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Spatie\RouteAttributes\Attributes\Get;

class BlogController extends Controller
{
    /**
     * Blog index page
     */
    #[Get('/blogs', name: 'pages.blogs')]
    public function index(): View
    {
        return view('blogs.index');
    }

    /**
     * Blog show page
     */
    #[Get('/blogs/{blog}', name: 'pages.blogs.show')]
    public function show(Blog $blog): View
    {
        if (! $blog->is_published) {
            abort(404);
        }

        return view('blogs.show', compact('blog'));
    }
}
