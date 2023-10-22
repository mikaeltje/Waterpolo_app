<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('teams')->insert([
           'name' => 'heren 1'
        ]);

        DB::table('teams')->insert([
           'name' => 'heren 2'
        ]);

        DB::table('teams')->insert([
           'name' => 'heren 3'
        ]);
        DB::table('teams')->insert([
           'name' => 'heren 4'
        ]);
        DB::table('teams')->insert([
           'name' => 'heren 5'
        ]);
        DB::table('teams')->insert([
           'name' => 'dames 1'
        ]);
        DB::table('teams')->insert([
           'name' => 'dames 2'
        ]);
        DB::table('teams')->insert([
           'name' => 'dames 3'
        ]);
        DB::table('teams')->insert([
           'name' => 'dames 4'
        ]);
        DB::table('teams')->insert([
           'name' => 'dames 5'
        ]);
    }
}
