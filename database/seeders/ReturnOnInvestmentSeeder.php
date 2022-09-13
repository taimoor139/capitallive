<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReturnOnInvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('return_on_investments')->insert([
            'deposit_type' => '1fx',
            'roi' => '0.25',
        ]);

        DB::table('return_on_investments')->insert([
            'deposit_type' => '2fx',
            'roi' => '0.30',
        ]);

        DB::table('return_on_investments')->insert([
            'deposit_type' => '3fx',
            'roi' => '0.35',
        ]);
    }
}
