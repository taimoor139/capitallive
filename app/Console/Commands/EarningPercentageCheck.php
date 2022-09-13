<?php

namespace App\Console\Commands;

use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\User;
use Illuminate\Console\Command;

class EarningPercentageCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'earning_percentage:check';

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
        $users = User::all();

        foreach ($users as $user){
            $bonuses = Bonus::query()->where('user_id', $user->id)->sum('amount');
            $earning = Earning::query()->where('user_id', $user->id)->sum('earning');

            $depositSum = Deposit::query()->where('userId' , $user->id)->sum('amount');

            $totalEarning = $bonuses + $earning;

            if($totalEarning > ($depositSum * 3)){
                $updateStatus  = User::query()->where('id', $user->id)->update([
                    'earning_status' => 0
                ]);
                $input = [
                    'email' => $user->email,
                    'name' => $user->name,
                    'subject' => 'Earning Stopped!',
                    'message' => '300% of withdrawal amount on your deposited amount is completed so your earning is stopped for now 
                    to continue Please add more deposit'
                ];
                if($updateStatus){
                    Mail::send([], [], function ($message) use ($input) {
                        $message->to($input['email'], $input['name'])
                            ->subject($input['subject'])
                            ->setBody('<!DOCTYPE html>
                                <html>
                                <head>
                                    <meta charset="utf-8">
                                    <title>'.$input['subject'].'</title>
                                </head>
                                <body>
                                <h1>'.$input['subject'].'</h1>
                                <p>'.$input['message'].'</p>
                                </body>
                                </html>', 'text/html');

                        $message->from(env('MAIL_USERNAME'));
                    });
                }
            }
        }
    }
}
