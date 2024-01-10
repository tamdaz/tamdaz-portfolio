<?php

namespace App\Http\Controllers\API;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BlogController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return BlogResource::collection(Blog::published()->with('thumbnail', 'category')->get());
    }

    /**
     * @param Blog $blog
     *
     * @return BlogResource
     */
    public function show(Blog $blog): BlogResource
    {
        return BlogResource::make($blog);
    }
}
