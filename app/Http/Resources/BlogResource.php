<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Blog $resource
 */
class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, Blog>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'content' => $this->when($request->routeIs('api.blogs.show'), $this->resource->content),
            'thumbnail' => $this->resource->attachment()->first()->url(),
            'category' => $this->when(!$request->routeIs('api.categories.index', 'api.categories.show'), [
                'id' => $this->resource->category->id,
                'name' => $this->resource->category->name,
            ]),
            'created_at' => $this->resource->created_at
        ];
    }
}
