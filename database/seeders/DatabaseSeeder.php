<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345'),
                'date_of_birth' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Category::insert([
            ['name' => 'Bencana Alam'],
            ['name' => 'Pendidikan'],
            ['name' => 'Kesehatan'],
        ]);
    }
}
