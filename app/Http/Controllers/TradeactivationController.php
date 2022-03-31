<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradeactivationController extends Controller
{
    public function index()
    {
        return view('user.trade.tradeActivation');
    }
}
