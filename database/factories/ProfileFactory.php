<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
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
        $image = fake()->image(width: 512, height: 512);
        $uploadedFile = new UploadedFile($image, 'profile.jpg', 'image/jpeg');
        $path = $uploadedFile->store('public/profiles');
        $url = Storage::url($path);

        return [
            'name' => fake()->name(),
            'job' => fake()->jobTitle(),
            'content' => fake()->text(512),
            'img_profile' => $url,
        ];
    }
}
