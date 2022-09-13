<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Notification;
use App\Models\Referral;
use App\Models\ReturnOnInvestment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $balance = 0;
        $deposits = 0;
        $earning = 0;
        $totalBonuses = 0;

        $totalLeftMembers = Referral::query()->where(['referrer_name' => Auth::user()->username, 'position' => 0])->whereNotNull(['user_id'])->count();
        $totalRightMembers = Referral::query()->where(['referrer_name' => Auth::user()->username, 'position' => 1])->whereNotNull(['user_id'])->count();
        $userBalance = Balance::query()->where('user_id', Auth::user()->id)->first();
        $newJoining = Referral::query()->where(['referrer_name' => Auth::user()->username, 'position' => 0])->whereNotNull(['user_id'])->whereMonth('created_at', date('m'))->count();
        if ($userBalance && $userBalance->balance > 0) {
            $balance = $userBalance->balance;
        }
        $userDeposits = Deposit::query()->where(['userId' => Auth::user()->id, 'status' => 100])->sum('amount');
        if ($userDeposits) {
            $deposits = $userDeposits;
        }

        $transactions = Transaction::query()->where('user_id', Auth::user()->id)->get();

        $userEarning = Earning::query()->where('user_id', Auth::user()->id)->sum('earning');
        if ($userEarning) {
            $earning = $userEarning;
        }

        $totalBonuses = Bonus::query()->where(['status' => 100, 'user_id' => Auth::user()->id])->sum('amount');

        $notification = Notification::query()->latest('id')->take(1)->first();



        return view('user.home', compact('balance', 'deposits',
            'totalLeftMembers', 'totalRightMembers', 'transactions', 'earning',
            'newJoining', 'totalBonuses', 'notification'));
    }
}
