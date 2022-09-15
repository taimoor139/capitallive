<?php

namespace App\Console\Commands;

use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\User;
use Illuminate\Console\Command;

class ReturnOnInvestment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'return_on_investment:earning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return on Investment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (date('l') != 'Saturday' && date('l') != 'Sunday') {
            $day = date('d');
            Deposit::query()->where('status', 100)->chunk(50, function ($deposits) use ($day) {
                $days = ["Tue", "Wed", "Thu", "Fri", "Mon"];
                foreach ($deposits as $deposit) {
                    $roi = 0;
                    $balance = 0;

                    if($deposit->returnOnInvestment){
                        $roi = $deposit->returnOnInvestment->roi;
                    }

                    if ($deposit->user->earning_status == 1 && $roi ) {
                        $earning = round(($roi * $deposit->amount) / 100, 4);
                        $roi_earning = new Earning();
                        $roi_earning->user_id = $deposit->userId;
                        $roi_earning->earning = $earning;
                        $roi_earning->percentage = $roi;
                        $roi_earning->status = 100;
                        if ($roi_earning->save()) {
                            $previousBalance = Balance::query()->where('user_id', $deposit->userId)->first();
                            if ($previousBalance) {
                                $balance = $previousBalance->balance + $earning;
                            } else {
                                $balance = $earning;
                            }

                            Balance::query()->where('user_id', $deposit->userId)->update([
                                'balance' => $balance
                            ]);
                        }
                    } else if ($deposit->user->trade_activation == 0 &&
                        date('D', strtotime($deposit->user->created_at)) != "Mon" &&
                        in_array(date_format($deposit->user->created_at, 'd'), $days)
                        &&
                        ((int)now()->format('d') - ((int)date_format($deposit->user->created_at, 'd')))
                        < (4 - array_search(date_format($deposit->user->created_at, 'd'), $days)) &&
                        $roi
                    ) {

                        $earning = round(($roi * $deposit->amount) / 100, 4);
                        $roi_earning = new Earning();
                        $roi_earning->user_id = $deposit->userId;
                        $roi_earning->earning = $earning;
                        $roi_earning->percentage = $roi;
                        $roi_earning->status = 100;
                        if ($roi_earning->save()) {
                            $previousBalance = Balance::query()->where('user_id', $deposit->userId)->first();
                            if ($previousBalance) {
                                $balance = $previousBalance->balance + $earning;
                            } else {
                                $balance = $earning;
                            }

                            Balance::query()->where('user_id', $deposit->userId)->update([
                                'balance' => $balance
                            ]);
                        }
                    }
                }
            });
        }
    }
}
