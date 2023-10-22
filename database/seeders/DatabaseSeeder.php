<?php

namespace Database\Seeders;

use App\Models\{User, Profile};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@doe.fr', // password: password
        ]);

        Profile::factory()->create([
            'name' => 'John Doe',
            'job' => 'Web developer'
        ]);
    }
}
