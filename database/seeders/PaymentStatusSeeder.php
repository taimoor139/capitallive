<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_statuses')->insert([
            'status_id' => '-2',
            'name' => 'PayPal Refund or Reversal'
        ]);

        DB::table('payment_statuses')->insert([
            'status_id' => '-1',
            'name' => 'Cancelled / Timed Out'
        ]);

        DB::table('payment_statuses')->insert([
            'status_id' => '0',
            'name' => 'Waiting for buyer funds'
        ]);

        DB::table('payment_statuses')->insert([
            'status_id' => '1',
            'name' => 'We have confirmed coin reception from the buyer'
        ]);

        DB::table('payment_statuses')->insert([
            'status_id' => '2',
            'name' => 'Queued for nightly payout'
        ]);

        DB::table('payment_statuses')->insert([
            'status_id' => '3',
            'name' => 'PayPal Pending'
        ]);

        DB::table('payment_statuses')->insert([
            'status_id' => '100',
            'name' => 'Payment Complete'
        ]);
    }
}
