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
    }
}
