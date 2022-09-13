<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TradeactivationController extends Controller
{
    public function index()
    {
        return view('user.trade.tradeActivation');
    }

    public function status(Request $request){
        $validator = Validator::make($request->all(), [
            'status' => 'required'
        ]);
        if($validator && now()->format('l') == 'Monday'){
            $status = 0;
            if($request->status){
                $status =  1;
            }

            $update = User::query()->where('id', Auth::user()->id)->update([
                'trade_activation' => $status
            ]);
            if($update){
                return redirect()->back()->with('success', 'Status updated successfully');
            } else {

                return redirect()->back()->with('error', 'something went wrong');
            }
        }
    }
}
