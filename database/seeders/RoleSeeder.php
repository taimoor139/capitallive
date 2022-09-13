<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'users',
        ]);
        DB::table('roles')->insert([
            'name' => 'deposits',
        ]);
        DB::table('roles')->insert([
            'name' => 'withdrawals',
        ]);
        DB::table('roles')->insert([
            'name' => 'support',
        ]);
        DB::table('roles')->insert([
            'name' => 'earning-charts',
        ]);
        DB::table('roles')->insert([
            'name' => 'notification',
        ]);
        DB::table('roles')->insert([
            'name' => 'education',
        ]);
        DB::table('roles')->insert([
            'name' => 'education',
        ]);
    }
}
