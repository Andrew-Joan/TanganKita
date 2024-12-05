<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FundDonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Assuming that 'category_id' and 'user_id' are foreign keys in the database
        // Adjust the ranges according to the data you have in your 'categories' and 'users' tables

        for ($i = 0; $i < 20; $i++) {
            $amount = $faker->randomFloat(2, 100000, 500000);
            $target = $faker->randomFloat(2, $amount + 1, 1000000);

            DB::table('fund_donations')->insert([
                'title' => $faker->sentence(5),
                'category_id' => rand(1, 3),
                'image' => null,
                'user_id' => rand(1, 10),
                'amount' => $amount,
                'target' => $target,
                'description' => $faker->paragraph(2),
                'status' => 1,
                'start_date' => now(),
                'end_date' => $faker->dateTimeBetween('+1 week', '+1 month')->format('Y-m-d')
            ]);
        }
    }
}

