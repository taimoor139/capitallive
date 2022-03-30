<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WithdrawalController extends Controller
{
    public function index(){
        return view('user.withdrawals.withdrawals');
    }

    public function withdrawalStore(Request $request)
    {
        $request->validate([
            'account_type' => 'required',
            'currency' => 'required',
            'amount' => 'required'
        ]);

        Withdrawal::insert([
            'account_type' => $request->account_type,
            'currency' => $request->currency,
            'amount' => $request->amount,
            'withdraw_address' => $request->withdraw_address,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Withdrawal added!',
            'alert-type' => 'success'
        );

        return Redirect()->route('withdrawal-dashboard')->with($notification);
    }
}
