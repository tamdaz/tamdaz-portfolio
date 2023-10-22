<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index', [
            'counts' => [
                'projects' => Project::all()->only(['id'])->count(),
                'blogs' => Blog::all()->only(['id'])->count()
            ]
        ]);
    }
}
