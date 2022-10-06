<?php

namespace App\Console\Commands;

use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\Point;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PaymentStatusCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment_status:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To check payment status from coin payment api';

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
        Deposit::query()->select('transactionId')->whereNotIn('status', [100, -1])->chunk(50, function ($depositData) {
            foreach ($depositData as $data) {
                $cpApi = new \CoinpaymentsAPI(env('CP_PRIVATE_KEY'), env('CP_PUBLIC_KEY'), 'json');
                $status = $cpApi->GetTxInfoSingle($data->transactionId);

                Deposit::query()->where('transactionId', $data->transactionId)->update([
                    'status' => $status['result']['status']
                ]);

                Transaction::query()->where('transaction_id', $data->transactionId)->update([
                    'status' => $status['result']['status']
                ]);

                if ($status['result']['status'] == 100) {

                    $deposit = Deposit::query()->where('transactionId', $data->transactionId)->first();

                    if ($deposit) {
                        $user = User::query()->where('id', $deposit->userId)->first();
                        if ($user) {
                                $directBonus = (6 * $deposit->amount) / 100;

                                if ($user->referral && $user->referral->position == 0 && $user->referral->pairStatus == 0) {
                                    $rightUnpaired = Referral::query()->where(['position' => 1, 'pairStatus' => 0, 'referrer_name' => $user->referral->referrer_name])->whereHas('deposit', function ($referralDeposit) use ($user) {
                                        $referralDeposit->where('status', 100);
                                    })->first();
                                    if ($rightUnpaired) {
                                        $parent = User::query()->where('username', $user->referral->referrer_name)->first();
                                        if ($parent) {

                                            $updateLeftReferral = Referral::query()->where('id', $user->referral->id)->update([
                                                'pairStatus' => 1,
                                                'pair_with' => $rightUnpaired->user_id
                                            ]);

                                            $updateRightReferral = Referral::query()->where('id', $rightUnpaired->id)->update([
                                                'pairStatus' => 1,
                                                'pair_with' => $user->id
                                            ]);

                                            if ($updateLeftReferral && $updateRightReferral) {
                                                $leftBp = $parent->points->left_bp + $deposit->amount;
                                                $leftRp = $parent->points->left_rp + $deposit->amount;
                                                $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                                    'left_bp' => $leftBp,
                                                    'left_rp' => $leftRp,
                                                ]);

                                                if ($updatePoints) {
                                                    if ($parent->points->right_rp && $parent->points->right_rp > $deposit->amount) {
                                                        $pairAmount = $deposit->amount;
                                                    } else {
                                                        $pairAmount = $parent->points->right_rp;
                                                    }

                                                    $networkBonus = (5 * $pairAmount) / 100;
                                                    if ($pairAmount > 0) {

                                                        $bonus = new  Bonus();
                                                        $bonus->type = 1;
                                                        $bonus->amount = $networkBonus;
                                                        $bonus->percentage = "5";
                                                        $bonus->user_id = $parent->id;
                                                        $bonus->status = 100;

                                                        if ($bonus->save()) {
                                                            Point::query()->where('user_id', $parent->id)->update([
                                                                'left_rp' => ($leftRp - $pairAmount < 0 ? 0 : $leftRp - $pairAmount),
                                                                'right_rp' => ($parent->points->right_rp - $pairAmount < 0 ? 0 : $parent->points->right_rp - $pairAmount)
                                                            ]);
                                                        }
                                                    }
                                                    $bonus = new  Bonus();
                                                    $bonus->type = 2;
                                                    $bonus->amount = $directBonus;
                                                    $bonus->percentage = "6";
                                                    $bonus->user_id = $parent->id;
                                                    $bonus->status = 100;
                                                    $bonus->save();

                                                    $previousBalance = Balance::query()->where('user_id', $parent->id)->first();
                                                    if ($previousBalance) {
                                                        $balance = $previousBalance->balance + $directBonus + $networkBonus;
                                                    } else {
                                                        $balance = $directBonus + $networkBonus;
                                                    }

                                                    $updateParentBalance = Balance::query()->where('user_id', $parent->id)->update([
                                                        'balance' => $balance
                                                    ]);

                                                    if ($parent->referral) {
                                                        $this->grandParents($parent->id, $deposit->amount, $parent->referral->position);
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        $parent = User::query()->where('username', $user->referral->referrer_name)->first();
                                        if ($parent) {
                                            $previousBalance = Balance::query()->where('user_id', $parent->id)->first();
                                            if ($previousBalance) {
                                                $balance = $previousBalance->balance + $directBonus;
                                            } else {
                                                $balance = $directBonus;
                                            }
                                            $updateParentBalance = Balance::query()->where('user_id', $parent->id)->update([
                                                'balance' => $balance
                                            ]);

                                            if ($updateParentBalance) {
                                                $bonus = new  Bonus();
                                                $bonus->type = 2;
                                                $bonus->amount = $directBonus;
                                                $bonus->percentage = "6";
                                                $bonus->user_id = $parent->id;
                                                $bonus->status = 100;
                                                $bonus->save();
                                                $previousPoints = Point::query()->where('user_id', $parent->id)->first();
                                                if ($previousPoints) {
                                                    if ($user->referral->position == 0) {
                                                        $leftBP = $previousPoints->left_bp + $deposit->amount;
                                                        $leftRP = $previousPoints->left_rp + $deposit->amount;
                                                        $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                                            'left_bp' => $leftBP,
                                                            'left_rp' => $leftRP
                                                        ]);
                                                    } else if ($user->referral->position == 1) {
                                                        $rightBP = $previousPoints->right_bp + $deposit->amount;
                                                        $rightRP = $previousPoints->right_rp + $deposit->amount;
                                                        $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                                            'right_bp' => $rightBP,
                                                            'right_rp' => $rightRP,
                                                        ]);

                                                    }
                                                }
                                            }
                                            if ($parent->referral) {
                                                $this->grandParents($parent->id, $deposit->amount, $parent->referral->position);
                                            }
                                        }
                                    }

                                    return 1;

                                }
                                if ($user->referral && $user->referral->position == 1 && $user->referral->pairStatus == 0) {
                                    $leftUnpaired = Referral::query()->where(['position' => 0, 'pairStatus' => 0, 'referrer_name' => $user->referral->referrer_name])->whereHas('deposit', function ($referralDeposit) use ($user) {
                                        $referralDeposit->where('status', 100);
                                    })->first();
                                    if ($leftUnpaired) {
                                        $parent = User::query()->where('username', $user->referral->referrer_name)->first();
                                        if ($parent) {
                                            $updateLeftReferral = Referral::query()->where('id', $user->referral->id)->update([
                                                'pairStatus' => 1,
                                                'pair_with' => $leftUnpaired->user_id
                                            ]);

                                            $updateRightReferral = Referral::query()->where('id', $leftUnpaired->id)->update([
                                                'pairStatus' => 1,
                                                'pair_with' => $user->id
                                            ]);

                                            if ($updateLeftReferral && $updateRightReferral) {
                                                $rightBp = $parent->points->right_bp + $deposit->amount;
                                                $rightRp = $parent->points->right_rp + $deposit->amount;
                                                $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                                    'right_bp' => $rightBp,
                                                    'right_rp' => $rightRp,
                                                ]);

                                                if ($updatePoints) {
                                                    if ($parent->points->left_rp && $parent->points->left_rp > $deposit->amount) {
                                                        $pairAmount = $deposit->amount;
                                                    } else {
                                                        $pairAmount = $parent->points->left_rp;
                                                    }
                                                    $networkBonus = (5 * $pairAmount) / 100;
                                                    if($pairAmount){

                                                        $bonus = new  Bonus();
                                                        $bonus->type = 1;
                                                        $bonus->amount = $networkBonus;
                                                        $bonus->percentage = "5";
                                                        $bonus->user_id = $parent->id;
                                                        $bonus->status = 100;
                                                        if ($bonus->save()) {
                                                            Point::query()->where('user_id', $parent->id)->update([
                                                                'left_rp' => ($parent->points->left_rp - $pairAmount < 0 ? 0 : $parent->points->left_rp - $pairAmount),
                                                                'right_rp' => ($rightRp - $pairAmount < 0 ? 0 : $rightRp - $pairAmount)
                                                            ]);
                                                        }
                                                    }

                                                    $bonus = new  Bonus();
                                                    $bonus->type = 2;
                                                    $bonus->amount = $directBonus;
                                                    $bonus->percentage = "6";
                                                    $bonus->user_id = $parent->id;
                                                    $bonus->status = 100;
                                                    $bonus->save();

                                                    $previousBalance = Balance::query()->where('user_id', $parent->id)->first();
                                                    if ($previousBalance) {
                                                        $balance = $previousBalance->balance + $directBonus + $networkBonus;
                                                    } else {
                                                        $balance = $directBonus + $networkBonus;
                                                    }

                                                    $updateParentBalance = Balance::query()->where('user_id', $parent->id)->update([
                                                        'balance' => $balance
                                                    ]);

                                                    if ($parent->referral) {
                                                        $this->grandParents($parent->id, $deposit->amount, $parent->referral->position);
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        $parent = User::query()->where('username', $user->referral->referrer_name)->first();
                                        if ($parent) {
                                            $previousBalance = Balance::query()->where('user_id', $parent->id)->first();
                                            if ($previousBalance) {
                                                $balance = $previousBalance->balance + $directBonus;
                                            } else {
                                                $balance = $directBonus;
                                            }
                                            $updateParentBalance = Balance::query()->where('user_id', $parent->id)->update([
                                                'balance' => $balance
                                            ]);

                                            if ($updateParentBalance) {
                                                $bonus = new  Bonus();
                                                $bonus->type = 2;
                                                $bonus->amount = $directBonus;
                                                $bonus->percentage = "6";
                                                $bonus->user_id = $parent->id;
                                                $bonus->status = 100;
                                                $bonus->save();
                                                $previousPoints = Point::query()->where('user_id', $parent->id)->first();
                                                if ($previousPoints) {
                                                    if ($user->referral->position == 0) {
                                                        $leftBP = $previousPoints->left_bp + $deposit->amount;
                                                        $leftRP = $previousPoints->left_rp + $deposit->amount;
                                                        $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                                            'left_bp' => $leftBP,
                                                            'left_rp' => $leftRP
                                                        ]);
                                                    } else if ($user->referral->position == 1) {
                                                        $rightBP = $previousPoints->right_bp + $deposit->amount;
                                                        $rightRP = $previousPoints->right_rp + $deposit->amount;
                                                        $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                                            'right_bp' => $rightBP,
                                                            'right_rp' => $rightRP,
                                                        ]);

                                                    }
                                                }
                                            }
                                            if ($parent->referral) {
                                                $this->grandParents($parent->id, $deposit->amount, $parent->referral->position);
                                            }
                                        }
                                    }
                                    return 1;

                                } else {
                                    $this->grandParents($user->id, $deposit->amount, $user->referral->position);
                                    return 1;
                                }

                            }

                    }
                }
            }
        });
    }


    public function grandParents($user_id, $amount, $position)
    {
        $parent = Referral::query()->where('user_id', $user_id)->first();
        if ($parent) {
            $parentData = User::query()->where('username', $parent->referrer_name)->first();
            if ($parentData) {

                Log::info("parent", ['child' => $user_id, 'parent' => $parentData->id, 'pos' => $position]);
                if ($position == 0) {
                    $leftBp = $parentData->points->left_bp + $amount;
                    $leftRp = $parentData->points->left_rp + $amount;
                    $updatePoints = Point::query()->where('user_id', $parentData->id)->update([
                        'left_bp' => $leftBp,
                        'left_rp' => $leftRp,
                    ]);
                    if ($updatePoints) {
                        if ($parentData->points->right_rp > 0) {
                            if ($parentData->points->right_rp > $leftRp) {
                                $pairAmount = $leftRp;
                            } else {
                                $pairAmount = $parentData->points->right_rp;
                            }
                            $networkBonus = (5 * $pairAmount) / 100;
                            $bonus = new  Bonus();
                            $bonus->type = 1;
                            $bonus->amount = $networkBonus;
                            $bonus->percentage = "5";
                            $bonus->user_id = $parentData->id;
                            $bonus->status = 100;
                            if ($bonus->save()) {
                                Point::query()->where('user_id', $parentData->id)->update([
                                    'left_rp' => (($leftRp - $pairAmount) < 0 ? 0 : $leftRp - $pairAmount),
                                    'right_rp' => (($parentData->points->right_rp - $pairAmount) < 0 ? 0 : $parentData->points->right_rp - $pairAmount)
                                ]);
                            }

                            $previousBalance = Balance::query()->where('user_id', $parentData->id)->first();
                            if ($previousBalance) {
                                $balance = $previousBalance->balance +  $networkBonus;
                            } else {
                                $balance = $networkBonus;
                            }

                            $updateParentBalance = Balance::query()->where('user_id', $parentData->id)->update([
                                'balance' => $balance
                            ]);
                        }
                    }

                }
                elseif ($position == 1) {

                    $rightBp = $parentData->points->right_bp + $amount;
                    $rightRp = $parentData->points->right_rp + $amount;
                    $updatePoints = Point::query()->where('user_id', $parentData->id)->update([
                        'right_bp' => $rightBp,
                        'right_rp' => $rightRp,
                    ]);
                    if ($updatePoints) {
                        if ($parentData->points->left_rp > 0) {

                            if ($parentData->points->left_rp > $rightRp) {
                                $pairAmount = $rightRp;
                            } else {
                                $pairAmount = $parentData->points->left_rp;
                            }

                            $networkBonus = (5 * $pairAmount) / 100;

                            $bonus = new  Bonus();
                            $bonus->type = 1;
                            $bonus->amount = $networkBonus;
                            $bonus->percentage = "5";
                            $bonus->user_id = $parentData->id;
                            $bonus->status = 100;
                            if ($bonus->save()) {
                                Point::query()->where('user_id', $parentData->id)->update([
                                    'left_rp' => (($parentData->points->left_rp - $pairAmount) < 0 ? 0 : $parentData->points->left_rp - $pairAmount),
                                    'right_rp' => (($rightRp - $pairAmount) < 0 ? 0 : $rightRp - $pairAmount)
                                ]);
                            }

                            $previousBalance = Balance::query()->where('user_id', $parentData->id)->first();
                            if ($previousBalance) {
                                $balance = $previousBalance->balance +  $networkBonus;
                            } else {
                                $balance = $networkBonus;
                            }
                        }
                    }
                }
                if($parentData->referral){

                    $this->grandParents($parentData->id, $amount, $parentData->referral->position);
                }
            }

        }
    }


}
