<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Status;
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

        Role::insert([
            ['name' => 'Pengguna'],
            ['name' => 'Administrator']
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::insert([
                'name' => $faker->name,
                'role_id' => 1,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('1234567890'),
                'date_of_birth' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        User::insert([
            'name' => 'Andrew Joan',
            'role_id' => 2,
            'email' => 'pelukguling123@gmail.com',
            'password' => bcrypt('1234567890'),
            'date_of_birth' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::insert([
            ['name' => 'Bencana Alam'],
            ['name' => 'Pendidikan'],
            ['name' => 'Kesehatan'],
        ]);

        Status::insert([
            ['name' => 'Menunggu'],
            ['name' => 'Diterima'],
            ['name' => 'Ditolak'],
            ['name' => 'Berlangsung'],
            ['name' => 'Selesai'],
        ]);
    }
}
