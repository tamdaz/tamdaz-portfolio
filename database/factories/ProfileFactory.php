<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 'avatar_id' column is an integer, user can update his profile once seeder has finished generating
        // data in the admin paneL.
        return [
            'name' => fake()->name(),
            'job' => fake()->jobTitle(),
            'avatar_id' => 0,
        ];
    }
}
