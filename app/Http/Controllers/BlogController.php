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

    public function show(string $id): View
    {
        return view('blogs.show', [
            'blog' => Blog::published()->findOrFail($id)
        ]);
    }
}
