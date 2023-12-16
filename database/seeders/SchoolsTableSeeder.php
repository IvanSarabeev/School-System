<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('bg_BG');

        foreach (range(1, 50) as $index) {
            \App\Models\School::create([
                'name' => $faker->company,
                'staff' => $faker->numberBetween(10, 100),
                'students' => $faker->numberBetween(50, 1000),
                'rating' => $faker->numberBetween(4, 10),
                'city' => $faker->city,
            ]);
        }
    }
}
