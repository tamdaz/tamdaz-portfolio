<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\RouteAttributes\Attributes\Get;

class CategoryController extends Controller
{
    /**
     * Get all categories with blogs included
     */
    #[Get('/categories', name: 'api.categories.index')]
    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(
            Category::with('blogs')->get()
        );
    }

    /**
     * Get all categories with blogs included
     */
    #[Get('/categories/{category}', name: 'api.categories.show')]
    public function show(Category $category): CategoryResource
    {
        return CategoryResource::make($category);
    }
}
