<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about(){
        $userCount = 0;
        $investment = 0;
        $bonuses = 0;

        $userCount = User::query()->count();
        $investment = Deposit::query()->where('status', 100)->sum('amount');
        $bonuses = Bonus::query()->where('status', 100)->sum('amount');


        return view('pages.about', compact('userCount', 'investment', 'bonuses'));
    }
    public function docs(){
        return view('pages.legalDocs');
    }
}
