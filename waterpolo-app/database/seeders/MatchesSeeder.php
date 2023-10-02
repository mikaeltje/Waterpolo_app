<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(9);
        DB::table('matches')->insert([
                'home_id' => $faker->numberBetween(1, 20),
                'away_id' => $faker->numberBetween(1, 20),
            ]);
    }
}
