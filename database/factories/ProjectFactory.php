<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_published' => true,
            'project_thumb' => fake()->imageUrl(1280, 720),
            'title' => fake()->text(30),
            'description' => fake()->text(100),
            'content' => fake()->text(2048),
            'project_url' => fake()->url()
        ];
    }
}
