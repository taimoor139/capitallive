<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Earning;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use App\Models\WithdrawalLimit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WithdrawalController extends Controller
{
    public function index()
    {
        $bonusBalance = 0;
        $earningBalance = 0;
        $btcLimit = [];
        $usdtLimit = [];

        $userBonus = Bonus::query()->where(['user_id' => Auth::user()->id, 'status' => 100])->sum('amount');
        if ($userBonus) {
            $bonusBalance = $userBonus;
        }
        $userEarning = Earning::query()->where(['user_id' => Auth::user()->id, 'status' => 100])->sum(('earning'));
        if ($userEarning) {
            $earningBalance = $userEarning;
        }
        $withdrawals = Withdrawal::query()->where('userId', Auth::user()->id)->get();

        $totalBalance = Balance::query()->where('user_id', Auth::user()->id)->first();
        if ($totalBalance) {
            $totalBalance = $totalBalance->balance;
        } else {
            $totalBalance = 0;
        }
        $totalBalance = $earningBalance + $bonusBalance;
        $btc = WithdrawalLimit::query()->where('coin', 'BTC')->first();
        if ($btc) {
            $btcLimit['limit'] = $btc->limit;
            $btcLimit['fee'] = $btc->fee;
        }

        $usdt = WithdrawalLimit::query()->where('coin', 'USDT')->first();
        if ($usdt) {
            $usdtLimit['limit'] = $usdt->limit;
            $usdtLimit['fee'] = $usdt->fee;
        }

        return view('user.withdrawals.withdrawals', compact('bonusBalance', 'earningBalance', 'totalBalance', 'withdrawals', 'btcLimit', 'usdtLimit'));
    }

    public function withdrawalStore(Request $request)
    {
        $validate = $request->validate([
            'balance_account' => 'required',
            'currency' => 'required',
            'amount' => 'required'
        ]);
        if ($validate) {
            if (date('D', strtotime(now())) == "Mon") {
                $user = User::query()->where('id', Auth::user()->id)->first();

                if (Hash::check($request->password, $user->password)) {
                    Withdrawal::insert([
                        'business_account' => $request->balance_account,
                        'currency' => $request->currency,
                        'amount' => $request->amount,
                        'account_type' => $request->account_type,
                        'userId' => Auth::user()->id,
                        'withdraw_address' => $request->withdraw_address,
                        'status' => 0,
                        'password' => Hash::make($request->password),
                        'created_at' => Carbon::now()
                    ]);

                    $transaction = new Transaction();
                    $transaction->type = 'withdrawal';
                    $transaction->user_id = Auth::user()->id;
                    $transaction->amount = $request->amount;
                    $transaction->transaction_id = $request->withdraw_address;
                    $transaction->status = 0;
                    if ($transaction->save()) {
                        if ($request->balance_account == 'bonus') {
                            $bonus = new  Bonus();
                            $bonus->type = 3;
                            $bonus->from = Auth::user()->id;
                            $bonus->amount = -($request->amount);
                            $bonus->percentage = "3";
                            $bonus->user_id = Auth::user()->id;
                            $bonus->status = 100;
                            $bonus->save();
                        }
                        if ($request->balance_account == 'earning') {
                            $earning = new Earning();
                            $earning->user_id = Auth::user()->id;
                            $earning->earning = -($request->amount);
                            $earning->percentage = 100;
                            $earning->status = 100;
                            $earning->save();
                        }

                        $balance = Balance::query()->where('user_id', Auth::user()->id);
                        if ($balance) {
                            $balanceAmount = $balance->first()->balance;
                            $updateBalance = $balance->update([
                                'balance' => $balanceAmount - $request->amount
                            ]);
                        }

                    }

                    return Redirect()->route('withdrawal-dashboard')->with('success', 'Withdrawal added!');
                } else {
                    return Redirect()->route('withdrawal-dashboard')->with('error', 'Incorrect Password!');
                }
            } else {

                return Redirect()->route('withdrawal-dashboard')->with('error', 'Withdrawal only allowed on Monday!');
            }

        }

    }

    public function allWithdrawal()
    {
        $pageTitle = 'All Withdrawal';
        $withdrawals = Withdrawal::query()->with('user')->get();
        return view('admin.withdrawal.index', compact('withdrawals', 'pageTitle'));
    }

    public function pendingWithdrawal()
    {
        $pageTitle = 'Pending Withdrawal';
        $withdrawals = Withdrawal::query()->where('status', 0)->get();
        return view('admin.withdrawal.index', compact('withdrawals', 'pageTitle'));
    }

    public function approvedWithdrawal()
    {
        $pageTitle = 'Approved Withdrawal';
        $withdrawals = Withdrawal::query()->where('status', 1)->get();
        return view('admin.withdrawal.index', compact('withdrawals', 'pageTitle'));
    }

    public function rejectedWithdrawal()
    {
        $pageTitle = 'All Withdrawal';
        $withdrawals = Withdrawal::query()->where('status', -1)->get();
        return view('admin.withdrawal.index', compact('withdrawals', 'pageTitle'));
    }

    public function update(Request $request)
    {
        $validation = $request->validate([
            'status' => 'required',
        ]);
        if ($validation) {
            $update = Withdrawal::query()->where('id', $request->withdrawal_id)->update([
                'status' => $request->status
            ]);
            if ($update) {
                $amount = Withdrawal::query()->where('id', $request->withdrawal_id)->first();
                Transaction::query()->where('transaction_id', $amount->transaction_id)->update([
                    'status' => 100
                ]);
                if ($request->status == -1) {
                    $balance = Balance::query()->where('user_id', $amount->userId);
                    if ($balance) {
                        $balanceAmount = $balance->first()->balance;
                        $updateBalance = $balance->update([
                            'balance' => $balanceAmount + $amount->amount
                        ]);
                        if ($amount->business_account == 'bonus') {
                            $bonus = new  Bonus();
                            $bonus->type = 3;
                            $bonus->amount = $amount->amount;
                            $bonus->percentage = "4";
                            $bonus->user_id = $amount->userId;
                            $bonus->status = 100;
                            $bonus->save();
                        } else if ($amount->business_account == 'earning') {
                            $earning = new Earning();
                            $earning->user_id = $amount->userId;
                            $earning->earning = $amount->amount;
                            $earning->percentage = 100;
                            $earning->status = 100;
                            $earning->save();
                        }
                    }
                }
                return redirect()->back()->with('success', 'Withdrawal Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function massUpdate(Request $request)
    {
        $validation = $request->validate([
            'status' => 'required',
        ]);
        if ($validation) {
            if ($request->withdrawal_ids) $ids = explode(',', $request->withdrawal_ids);

            $update = Withdrawal::query()->whereIn('id', $ids)->update([
                'status' => $request->status
            ]);
            if ($update) {
                $amounts = Withdrawal::query()->whereIn('id', $ids)->get();
                foreach ($amounts as $amount) {
                    Transaction::query()->where('transaction_id', $amount->transaction_id)->update([
                        'status' => 100
                    ]);
                    if ($request->status == -1) {

                        $balance = Balance::query()->where('user_id', $amount->userId);
                        if ($balance) {
                            $balanceAmount = $balance->first()->balance;
                            $updateBalance = $balance->update([
                                'balance' => $balanceAmount + $amount->amount
                            ]);

                            if ($amount->business_account == 'bonus') {
                                $bonus = new  Bonus();
                                $bonus->type = 3;
                                $bonus->amount = $amount->amount;
                                $bonus->percentage = "4";
                                $bonus->user_id = $amount->userId;
                                $bonus->status = 100;
                                $bonus->save();
                            } else if ($amount->business_account == 'earning') {
                                $earning = new Earning();
                                $earning->user_id = $amount->userId;
                                $earning->earning = $amount->amount;
                                $earning->percentage = 100;
                                $earning->status = 100;
                                $earning->save();
                            }
                        }
                    }
                }


                return redirect()->back()->with('success', 'Withdrawal Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');


            }
        }
    }

    public function destroy($id)
    {
        $withdraw = Withdrawal::query()->where('id', $id);
        if ($withdraw) {
            $delete = $withdraw->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'Withdrawal Deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function withdrawalLimit()
    {
        $limits = WithdrawalLimit::all();
        return view('admin.withdrawal.limit', compact('limits'));
    }

    public function addLimit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'coin' => 'required',
            'fee' => 'required',
            'limit' => 'required'
        ]);

        if ($validate) {
            $limit = new WithdrawalLimit();
            $limit->coin = $request->coin;
            $limit->limit = $request->limit;
            $limit->fee = $request->fee;
            if ($limit->save()) {
                return redirect()->back()->with('success', 'Withdrawal limit added Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function updateLimit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'coin' => 'required',
            'fee' => 'required',
            'limit' => 'required'
        ]);

        if ($validate) {
            $update = WithdrawalLimit::query()->where('id', $request->limit_id)->update([
                'coin' => $request->coin,
                'limit' => $request->limit,
                'fee' => $request->fee,
            ]);

            if ($update) {
                return redirect()->back()->with('success', 'Withdrawal limit update Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function deleteLimit($id)
    {
        $withdraw = WithdrawalLimit::query()->where('id', $id);
        if ($withdraw) {
            $delete = $withdraw->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'Withdrawal limit Deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

}
