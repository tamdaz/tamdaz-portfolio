<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\RouteAttributes\Attributes\Get;

class BlogController extends Controller
{
    /**
     * Get all blogs with category.
     *
     * Get all blogs with the specified category.
     */
    #[Get('/blogs', name: 'api.blogs.index')]
    public function index(): AnonymousResourceCollection
    {
        return BlogResource::collection(
            Blog::published()->with('thumbnail', 'category')->get()
        );
    }

    /**
     * Get selected blog with more information and the specified
     * category.
     */
    #[Get('/blogs/{blog}', name: 'api.blogs.show')]
    public function show(Blog $blog): BlogResource
    {
        return BlogResource::make($blog);
    }
}
