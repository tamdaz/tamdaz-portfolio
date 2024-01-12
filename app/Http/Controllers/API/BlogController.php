<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BlogController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return BlogResource::collection(Blog::published()->with('thumbnail', 'category')->get());
    }

    public function show(Blog $blog): BlogResource
    {
        return BlogResource::make($blog);
    }
}
