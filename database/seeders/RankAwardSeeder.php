<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankAwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rank_awards')->insert([
            'title' => 'STARTER',
            'left_points' => 0,
            'right_points' => 0,
            'award' => '0'
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'BRONZE',
            'left_points' => 2500,
            'right_points' => 2500,
            'award' => 100
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'SILVER',
            'left_points' => 5000,
            'right_points' => 5000,
            'award' => 150
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'GOLD',
            'left_points' => 10000,
            'right_points' => 10000,
            'award' => 200
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'PLATINUM',
            'left_points' => 20000,
            'right_points' => 20000,
            'award' => 250
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'TITANIUM',
            'left_points' => 50000,
            'right_points' => 50000,
            'award' => 500
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'EXECUTIVE',
            'left_points' => 100000,
            'right_points' => 100000,
            'award' => 750
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'SENIOR EXECUTIVE',
            'left_points' => 250000,
            'right_points' => 250000,
            'award' => 1250
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'RUBBY',
            'left_points' => 500000,
            'right_points' => 500000,
            'award' => 2000
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'DIAMOND',
            'left_points' => 1000000,
            'right_points' => 1000000,
            'award' => 3000
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'BLUE DIAMOND',
            'left_points' => 2500000,
            'right_points' => 2500000,
            'award' => 5000
        ]);

        DB::table('rank_awards')->insert([
            'title' => 'ROYAL DIAMOND',
            'left_points' => 5000000,
            'right_points' => 5000000,
            'award' => 7500
        ]);


        DB::table('rank_awards')->insert([
            'title' => 'CROWN DIAMOND',
            'left_points' => 10000000,
            'right_points' => 10000000,
            'award' => 12500
        ]);

    }
}
