<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @extends Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = fake()->image(width: 1280, height: 720);
        $uploadedFile = new UploadedFile($image, 'thumbnail.jpg', 'image/jpeg');
        $path = $uploadedFile->store('public/thumbnail');
        $url = Storage::url($path);

        return [
            'is_published' => fake()->boolean(50),
            'blog_thumb' => $url,
            'title' => fake()->text(30),
            'description' => fake()->text(50),
            'content' => fake()->text(2048),
            'category_id' => rand(1, 3),
        ];
    }
}
