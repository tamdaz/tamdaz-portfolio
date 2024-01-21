<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Category;
use Tests\TestCase;

class APITest extends TestCase
{
    /**
     * @test
     */
    public function test_api_blog(): void
    {
        $blog = Blog::first();

        $this->get(
            route('api.blogs.index')
        )->assertStatus(200);

        $this->get(
            route('api.blogs.show', compact('blog'))
        )->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_api_category(): void
    {
        $category = Category::first();

        $this->get(
            route('api.categories.index')
        )->assertStatus(200);

        $this->get(
            route('api.categories.show', compact('category'))
        )->assertStatus(200);
    }
}
