<?php

namespace App\Console\Commands;

use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Earning;
use App\Models\Transaction;
use CoinpaymentsAPI;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Withdrawal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:withdrawal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $cpApi = new CoinpaymentsAPI(env('CP_PRIVATE_KEY'), env('CP_PUBLIC_KEY'), 'json');
        \App\Models\Withdrawal::query()->where('status', 1)->chunk(50, function ($withdrawals) use ($cpApi) {
            foreach ($withdrawals as $withdrawal) {
                $withdrawalCreate = $cpApi->CreateWithdrawal([
                    'address' => $withdrawal->withdraw_address,
                    'amount' => $withdrawal->amount,
                    'currency' => $withdrawal->currency
                ]);
                if($withdrawalCreate){
                    if(array_key_exists('error', $withdrawalCreate)){
                        $updateWithdraw = \App\Models\Withdrawal::query()->where('id', $withdrawal->id)->update([
                           'withdraw_status' => $withdrawalCreate['error'],
                            'status' => -1
                        ]);
                        Transaction::query()->where('transaction_id', $withdrawal->transaction_id)->update([
                            'status' => -1
                        ]);
                        if ($withdrawal->business_account == 'bonus') {
                            $bonus = new  Bonus();
                            $bonus->type = 3;
                            $bonus->amount = $withdrawal->amount;
                            $bonus->percentage = "4";
                            $bonus->user_id = $withdrawal->userId;
                            $bonus->status = 100;
                            $bonus->save();
                        } else if ($withdrawal->business_account == 'earning') {
                            $earning = new Earning();
                            $earning->user_id = $withdrawal->userId;
                            $earning->earning = $withdrawal->amount;
                            $earning->percentage = 100;
                            $earning->status = 100;
                            $earning->save();
                        }

                        $previousBalance = Balance::query()->where('user_id', $withdrawal->userId)->first();
                        if($previousBalance) {
                            $updateBalance = Balance::query()->where('user_id', $withdrawal->userId)->update([
                                'balance' => $previousBalance->balance + $withdrawal->amount
                            ]);
                        }
                    } else if(array_key_exists('success', $withdrawalCreate)){
                        $updateWithdraw = \App\Models\Withdrawal::query()->where('id', $withdrawal->id)->update([
                            'withdraw_status' => $withdrawalCreate['success'],
                            'status' => 100
                        ]);
                        if($updateWithdraw){
                            Transaction::query()->where('transaction_id', $withdrawal->transaction_id)->update([
                                'status' => 100
                            ]);
                            $previousBalance = Balance::query()->where('user_id', $withdrawal->userId)->first();
                            if($previousBalance){
                                $updateBalance = Balance::query()->where('user_id', $withdrawal->userId)->update([
                                    'balance' => $previousBalance->balance - $withdrawal->amount
                            ]);
                            }
                        }
                    }
                }
                Log::info('withdraw', ['status' => $withdrawalCreate['error']]);
            }
        });
    }
}
