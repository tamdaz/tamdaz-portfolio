<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index', [
            'count_blogs' => Blog::count(),
        ]);
    }
}
