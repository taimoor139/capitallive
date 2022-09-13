<?php

namespace App\Http\Controllers;

use App\Models\EarnAward;
use App\Models\RankAward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AwardController extends Controller
{
    public function index(){
        $ranks = RankAward::all();
        $earnedUserRanks = EarnAward::query()->where('user_id', Auth::user()->id)->pluck('award_id')->toArray();
        $currentUserRank = EarnAward::query()->where('user_id', Auth::user()->id)->latest()->first();
        $nextAwardId = 1;
        $awardEarned = RankAward::query()->where('id', Auth::user()->rank)->first();
        $awardEarned = $awardEarned->award;
        if(Auth::user()->rank && Auth::user()->rank != 14){
            $nextAwardId = Auth::user()->rank + 1;
        }
        $nextAward = RankAward::query()->where('id',$nextAwardId)->first();
//        dd($nextAward);
        return view('user.awards.rankAwards', compact('ranks', 'earnedUserRanks', 'currentUserRank', 'nextAward', 'awardEarned'));
    }

    public function executiveAwards(){
        return view('user.awards.executiveAwards');
    }
}
