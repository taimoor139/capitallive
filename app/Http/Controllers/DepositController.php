<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\DepositLimit;
use App\Models\Point;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DepositController extends Controller
{
    public function index()
    {
        $fx1Limit = 0;
        $fx2Limit = 0;
        $fx3Limit = 0;

        $depositTypes = DepositLimit::all();

        $deposits = Deposit::query()->where('userId', Auth::user()->id)->get();
        $fx1 = DepositLimit::query()->where('account_type', 'CF Standard Account')->first();
        if ($fx1) {
            $fx1Limit = $fx1->limit;
        }
        $fx2 = DepositLimit::query()->where('account_type', 'CF Pro Account')->first();
        if ($fx2) {
            $fx2Limit = $fx2->limit;
        }
        $fx3 = DepositLimit::query()->where('account_type', 'CF Brokerage Account')->first();
        if ($fx3) {
            $fx3Limit = $fx3->limit;
        }
        return view('user.deposit.deposit', compact('deposits', 'fx1Limit', 'fx2Limit', 'fx3Limit',
            'depositTypes'));
    }

    public function depositStore(Request $request)
    {
        try {
            $request->validate([
                'accountType' => 'required',
                'currency' => 'required',
                'amount' => 'required'
            ]);


            $cpApi = new \CoinpaymentsAPI(env('CP_PRIVATE_KEY'), env('CP_PUBLIC_KEY'), 'json');
            $depositTransaction = $cpApi->CreateSimpleTransactionWithConversion($request->amount, 'USD', $request->currency, Auth::user()->email);

            if ($depositTransaction && !is_null($depositTransaction['result'])) {
                $status = $cpApi->GetTxInfoSingle($depositTransaction['result']['txn_id']);
                $deposit = new Deposit();
                $deposit->accountType = $request->accountType;
                $deposit->currency = $request->currency;
                $deposit->amount = $request->amount;
                $deposit->userId = Auth::user()->id;
                $deposit->transactionId = $depositTransaction['result']['txn_id'];
                $deposit->status = $status['result']['status'];
                if ($deposit->save()) {
                    $statusUrl = $depositTransaction['result']['status_url'];

                    $transaction = new Transaction();
                    $transaction->type = 'deposit';
                    $transaction->user_id = Auth::user()->id;
                    $transaction->amount = $request->amount;
                    $transaction->transaction_id = $depositTransaction['result']['txn_id'];
                    $transaction->status = $status['result']['status'];
                    $transaction->save();
                }


            }

            return $statusUrl;
        } catch (\Exception $e) {
            return 0;
        }

    }

    public function deposits()
    {
        $pageTitle = 'All Deposits';
        $deposits = Deposit::query()->with('user')->get();
        $successfulDeposits = Deposit::query()->where('status', 100)->sum('amount');
        $pendingDeposits = Deposit::query()->where('status', 0)->sum('amount');
        $rejectedDeposits = Deposit::query()->where('status', -1)->sum('amount');
        return view('admin.deposits.index', compact('deposits', 'successfulDeposits', 'pendingDeposits', 'rejectedDeposits', 'pageTitle'));
    }

    public function pendingDeposits()
    {
        $pageTitle = 'Pending Deposits';
        $deposits = Deposit::query()->where('status', 0)->get();
        return view('admin.deposits.index', compact('deposits', 'pageTitle'));
    }

    public function approvedDeposits()
    {
        $pageTitle = 'Approved Deposits';
        $deposits = Deposit::query()->where('status', 1)->get();
        return view('admin.deposits.index', compact('deposits', 'pageTitle'));
    }

    public function successfulDeposits()
    {
        $pageTitle = 'Successful Deposits';
        $deposits = Deposit::query()->where('status', 100)->get();
        return view('admin.deposits.index', compact('deposits', 'pageTitle'));
    }

    public function rejectedDeposits()
    {
        $pageTitle = 'Rejected Deposits';
        $deposits = Deposit::query()->where('status', -1)->get();
        return view('admin.deposits.index', compact('deposits', 'pageTitle'));
    }

    public function depositLimit()
    {
        $limits = DepositLimit::all();
        return view('admin.deposits.limit', compact('limits'));
    }

    public function addLimit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'account_type' => 'required',
            'limit' => 'required'
        ]);

        if ($validate) {
            $limit = new DepositLimit();
            $limit->account_type = $request->account_type;
            $limit->limit = $request->limit;
            if ($limit->save()) {
                return redirect()->back()->with('success', 'Deposit limit added Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function updateLimit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'account_type' => 'required',
            'limit' => 'required'
        ]);

        if ($validate) {
            $update = DepositLimit::query()->where('id', $request->limit_id)->update([
                'account_type' => $request->account_type,
                'limit' => $request->limit,
            ]);

            if ($update) {
                return redirect()->back()->with('success', 'Deposit limit update Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function deleteLimit($id)
    {
        $withdraw = DepositLimit::query()->where('id', $id);
        if ($withdraw) {
            $delete = $withdraw->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'Deposit limit Deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function manualDeposit()
    {
        $fx1Limit = 0;
        $fx2Limit = 0;
        $fx3Limit = 0;
        $users = User::query()->where('role_id', 2)->get();
        $fx1 = DepositLimit::query()->where('account_type', 'CF Standard Account 50$')->first();
        if ($fx1) {
            $fx1Limit = $fx1->limit;
        }
        $fx2 = DepositLimit::query()->where('account_type', 'CF Pro Account 500$')->first();
        if ($fx2) {
            $fx2Limit = $fx2->limit;
        }
        $fx3 = DepositLimit::query()->where('account_type', 'CF Brokerage Account 1000$')->first();
        if ($fx3) {
            $fx3Limit = $fx3->limit;
        }
        return view('admin.deposits.manual', compact('users', 'fx1Limit', 'fx2Limit', 'fx3Limit'));
    }

    public function addManualDeposit(Request $request)
    {
        $request->validate([
            'accountType' => 'required',
            'currency' => 'required',
            'amount' => 'required'
        ]);

        $user = User::query()->where('id', $request->user)->first();

        if ($user) {
            $deposit = new Deposit();
            $deposit->accountType = $request->accountType;
            $deposit->currency = $request->currency;
            $deposit->amount = $request->amount;
            $deposit->userId = $request->user;
            $deposit->transactionId = "manual";
            $deposit->status = 100;
            if ($deposit->save()) {
                $transaction = new Transaction();
                $transaction->type = 'deposit';
                $transaction->user_id = $request->user;
                $transaction->amount = $request->amount;
                $transaction->transaction_id = "manual";
                $transaction->status = 100;
                $transaction->save();

                $directBonus = (4 * $request->amount) / 100;


                if ($user->referral && $user->referral->position == 0 && $user->referral->pairStatus == 0) {
                    $rightUnpaired = Referral::query()->where(['position' => 1, 'pairStatus' => 0, 'referrer_name' => $deposit->referral->referrer_name])->whereHas('deposit', function ($referralDeposit) use ($request) {
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
                                $leftBp = $parent->points->left_bp + $request->amount;
                                $leftRp = $parent->points->left_rp + $request->amount;
                                $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                    'left_bp' => $leftBp,
                                    'left_rp' => $leftRp,
                                ]);

                                if ($updatePoints) {
                                    if ($parent->points->right_rp && $parent->points->right_rp > $request->amount) {
                                        $pairAmount = $request->amount;
                                    } else {
                                        $pairAmount = $parent->points->right_rp;
                                    }

                                    $networkBonus = (3 * $pairAmount) / 100;

                                    if ($pairAmount > 0) {

                                        $bonus = new  Bonus();
                                        $bonus->type = 1;
                                        $bonus->amount = $networkBonus;
                                        $bonus->percentage = "3";
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
                                    $bonus->percentage = "4";
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
                                        $this->grandParents($parent->id, $request->amount, $parent->referral->position);
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
                                $bonus->percentage = "4";
                                $bonus->user_id = $parent->id;
                                $bonus->status = 100;
                                $bonus->save();
                                $previousPoints = Point::query()->where('user_id', $parent->id)->first();
                                if ($previousPoints) {
                                    if ($user->referral->position == 0) {
                                        $leftBP = $previousPoints->left_bp + $request->amount;
                                        $leftRP = $previousPoints->left_rp + $request->amount;
                                        $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                            'left_bp' => $leftBP,
                                            'left_rp' => $leftRP
                                        ]);
                                    } else if ($user->referral->position == 1) {
                                        $rightBP = $previousPoints->right_bp + $request->amount;
                                        $rightRP = $previousPoints->right_rp + $request->amount;
                                        $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                            'right_bp' => $rightBP,
                                            'right_rp' => $rightRP,
                                        ]);

                                    }
                                }
                            }
                            if ($parent->referral) {
                                $this->grandParents($parent->id, $request->amount, $parent->referral->position);
                            }
                        }
                    }

                    Session::flash('success', 'Manual Deposit added successfully');
                    return 1;

                }
                if ($user->referral && $user->referral->position == 1 && $user->referral->pairStatus == 0) {
                    $leftUnpaired = Referral::query()->where(['position' => 0, 'pairStatus' => 0, 'referrer_name' => $user->referral->referrer_name])->whereHas('deposit', function ($referralDeposit) use ($request) {
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
                                $rightBp = $parent->points->right_bp + $request->amount;
                                $rightRp = $parent->points->right_rp + $request->amount;
                                $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                    'right_bp' => $rightBp,
                                    'right_rp' => $rightRp,
                                ]);

                                if ($updatePoints) {
                                    if ($parent->points->left_rp && $parent->points->left_rp > $request->amount) {
                                        $pairAmount = $request->amount;
                                    } else {
                                        $pairAmount = $parent->points->left_rp;
                                    }
                                    $networkBonus = (3 * $pairAmount) / 100;
                                        if($pairAmount){

                                            $bonus = new  Bonus();
                                            $bonus->type = 1;
                                            $bonus->amount = $networkBonus;
                                            $bonus->percentage = "3";
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
                                        $bonus->percentage = "4";
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
                                        $this->grandParents($parent->id, $request->amount, $parent->referral->position);
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
                                $bonus->percentage = "4";
                                $bonus->user_id = $parent->id;
                                $bonus->status = 100;
                                $bonus->save();
                                $previousPoints = Point::query()->where('user_id', $parent->id)->first();
                                if ($previousPoints) {
                                    if ($user->referral->position == 0) {
                                        $leftBP = $previousPoints->left_bp + $request->amount;
                                        $leftRP = $previousPoints->left_rp + $request->amount;
                                        $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                            'left_bp' => $leftBP,
                                            'left_rp' => $leftRP
                                        ]);
                                    } else if ($user->referral->position == 1) {
                                        $rightBP = $previousPoints->right_bp + $request->amount;
                                        $rightRP = $previousPoints->right_rp + $request->amount;
                                        $updatePoints = Point::query()->where('user_id', $parent->id)->update([
                                            'right_bp' => $rightBP,
                                            'right_rp' => $rightRP,
                                        ]);

                                    }
                                }
                            }
                            if ($parent->referral) {
                                $this->grandParents($parent->id, $request->amount, $parent->referral->position);
                            }
                        }
                    }

                    Session::flash('success', 'Manual Deposit added successfully');
                    return 1;

                } else {
                    $this->grandParents($user->id, $request->amount, $user->referral->position);
                    Session::flash('success', 'Manual Deposit added successfully');
                    return 1;
                }

            }
        }

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
                            $networkBonus = (3 * $pairAmount) / 100;
                            $bonus = new  Bonus();
                            $bonus->type = 1;
                            $bonus->amount = $networkBonus;
                            $bonus->percentage = "3";
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
                                $balance =  $networkBonus;
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

                            $networkBonus = (3 * $pairAmount) / 100;

                            $bonus = new  Bonus();
                            $bonus->type = 1;
                            $bonus->amount = $networkBonus;
                            $bonus->percentage = "3";
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
                                $balance =  $networkBonus;
                            }
                            $updateParentBalance = Balance::query()->where('user_id', $parentData->id)->update([
                                'balance' => $balance
                            ]);
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