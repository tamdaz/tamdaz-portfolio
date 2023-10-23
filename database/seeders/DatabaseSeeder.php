<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Blog, Category, Profile};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Profile::factory()->create();
        Category::factory()->createMany(3);
        Blog::factory()->createMany(6);
    }
}
