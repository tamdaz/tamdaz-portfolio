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
        $displayContent = $this->when($request->routeIs('api.blogs.show'), $this->resource->content);
        $displayCategory = $this->when(! $request->routeIs('api.categories.index', 'api.categories.show'), [
            'id' => $this->resource->category->id,
            'name' => $this->resource->category->name,
        ]);

        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'content' => $displayContent,
            'thumbnail' => $this->resource->thumbnail->url,
            'category' => $displayCategory,
            'created_at' => $this->resource->created_at,
        ];
    }
}
