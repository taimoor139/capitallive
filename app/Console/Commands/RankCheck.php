<?php

namespace App\Console\Commands;

use App\Models\Balance;
use App\Models\Bonus;
use App\Models\EarnAward;
use App\Models\RankAward;
use App\Models\User;
use Illuminate\Console\Command;

class RankCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rank:check';

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

        foreach ($users as $user) {
            if ($user->points && $user->points->right_bp && $user->points->left_bp) {

                $rank = RankAward::query()->where('left_points', '<', $user->points->left_bp)
                    ->where('right_points', '<', $user->points->right_bp);
                if ($rank) {
                    $newRank = $rank->latest('id')->first();
                    if($user->rank != $newRank->id){
                        if ($newRank) {
                            $updateUser = User::query()->where('id', $user->id)->update([
                                'rank' => $newRank->id
                            ]);
                            $balance = Balance::query()->where('user_id', $user->id);
                            if ($balance) {
                                $newBalance = $balance->first()->balance + $newRank->award;
                                $updateBalance = $balance->update([
                                    'balance' => $newBalance
                                ]);

                                $bonus = new  Bonus();
                                $bonus->type = 3;
                                $bonus->amount = $newRank->award;
                                $bonus->percentage = "100";
                                $bonus->user_id = $user->id;
                                $bonus->status = 100;
                                $bonus->save();
                            }

                        }

                        $ranks = $rank->get();
                        foreach ($ranks as $rank) {
                            $check = EarnAward::query()->where(['user_id' => $user->id, 'award_id' => $rank->id])->first();
                            if(!$check){
                                $earnAward = new EarnAward();
                                $earnAward->award_id = $rank->id;
                                $earnAward->user_id = $user->id;
                                $earnAward->save();
                            }
                        }
                    }
                    
                }
            }
        }
    }
}
