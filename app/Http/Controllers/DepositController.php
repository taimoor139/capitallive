<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepositController extends Controller
{
    public function index()
    {
        return view('user.deposit.deposit');
    }
    public function depositStore(Request $request)
    {
        $request->validate([
            'accountType' => 'required',
            'currency' => 'required',
            'amount' => 'required'
        ]);

        Deposit::insert([
            'accountType' => $request->accountType,
            'Currency' => $request->currency,
            'amount' => $request->amount,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Deposit added!',
            'alert-type' => 'success'
        );

        return Redirect()->route('deposit-dashboard')->with($notification);
    }
}
