<?php

namespace Database\Seeders;

use App\Models\Matches;
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
        for ($i = 0; $i < 9; $i++) {
            DB::table('matches')->insert([
                'home_id' => $faker->numberBetween(1, 10),
                'away_id' => $faker->numberBetween(1, 10),
                'user_id' => '1',
                'match_status' => $faker->boolean,
            ]);
        }

    }
}
