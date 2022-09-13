<?php

namespace App\Console;

use App\Console\Commands\BonusStatusCheck;
use App\Console\Commands\EarningPercentageCheck;
use App\Console\Commands\PaymentStatusCheck;
use App\Console\Commands\RankCheck;
use App\Console\Commands\ReturnOnInvestment;
use App\Console\Commands\Withdrawal;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        PaymentStatusCheck::class,
        ReturnOnInvestment::class,
        EarningPercentageCheck::class,
        BonusStatusCheck::class,
        RankCheck::class,
        Withdrawal::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('payment_status:check')->everyTenMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
