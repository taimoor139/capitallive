<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\ReturnOnInvestment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function index()
    {
        $networkBonuses = 0;
        $directBonuses = 0;
        $totalBonuses = 0;
        $pendingBonuses = 0;

        $bonuses = Bonus::query()->where('user_id', Auth::user()->id)->get();
        $networkBonuses = Bonus::query()->where(['user_id' => Auth::user()->id, 'type' => 1])->sum('amount');
        $directBonuses = Bonus::query()->where(['user_id' => Auth::user()->id, 'type' => 2])->sum('amount');
        $rankBonuses = Bonus::query()->where(['user_id' => Auth::user()->id, 'type' => 3])->sum('amount');
        $totalBonuses = Bonus::query()->where(['status' => 100, 'user_id' => Auth::user()->id])->sum('amount');
        $pendingBonuses = Bonus::query()->where(['status' => 0, 'user_id' => Auth::user()->id])->sum('amount');

        return view('user.accounts.bonousAccounts', compact('bonuses', 'networkBonuses', 'rankBonuses','directBonuses', 'totalBonuses', 'pendingBonuses'));
    }
    public function earningAccounts()
    {
        $monthlyEarning = 0;
        $totalEarning = 0;
        $currentEarning = 0;


        $userMonthEarning = Earning::query()->where('user_id', Auth::user()->id)->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->sum('earning');
        if($userMonthEarning){
            $monthlyEarning = $userMonthEarning;
        }

        $userEarning = Earning::query()->where('user_id', Auth::user()->id)->sum('earning');
        if($userEarning){
            $totalEarning = $userEarning;
        }

        $userCurrentEarning = Earning::query()->where(['user_id' => Auth::user()->id, 'status' => 0])->sum('earning');
        if($userCurrentEarning){
            $currentEarning = $userCurrentEarning;
        }
        $earnings = Earning::query()->where('user_id', Auth::user()->id)->where('percentage', '!=', 0)->where('earning', '>',0)->get();

        return view('user.accounts.earningAccounts', compact('monthlyEarning', 'totalEarning', 'earnings', 'currentEarning'));
    }

    public function move(){
        $currentEarning = 0;
        $currentBalance = Balance::query()->where('user_id', Auth::user()->id)->first();
        $userCurrentEarning = Earning::query()->where(['user_id' => Auth::user()->id, 'status' => 0])->sum('earning');
        if($userCurrentEarning){
            $currentEarning = $userCurrentEarning;
        }
        if($currentBalance && $currentEarning){
            $updateBalance = Balance::query()->where('user_id', Auth::user()->id)->update([
                'balance' => $currentEarning + $currentBalance->balance
            ]);
            $updateEarning = Earning::query()->where('user_id', Auth::user()->id)->update([
                'status' => 1
            ]);
            if($updateBalance){
                return redirect()->back()->with('success', 'Earning amount successfully added to current balance!');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function earningChart(){

        $fx1 = ReturnOnInvestment::query()->where('id', 1)->first();

        $fx1Roi = $fx1->roi;
        $fx1RoiTitle = $fx1->deposit_type;

        $fx2 = ReturnOnInvestment::query()->where('id', 2)->first();

        $fx2Roi = $fx2->roi;
        $fx2RoiTitle = $fx2->deposit_type;

        $fx3 = ReturnOnInvestment::query()->where('id', 3)->first();

        $fx3Roi = $fx3->roi;
        $fx3RoiTitle = $fx3->deposit_type;


        $date = empty($date) ? Carbon::now() : Carbon::createFromDate($date);
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);

        $userDepositAmount = Deposit::query()->where(['userId' => Auth::user()->id, 'status' => 100])->whereMonth('created_at', $date->format('m'))->get();
        $fx1Deposits = [];
        $fx2Deposits = [];
        $fx3Deposits = [];

        foreach ($userDepositAmount as $deposit){
            if($deposit->accountType == 1){

                $day = date_format($deposit->created_at, 'd');
                if(array_key_exists($day, $fx1Deposits)){
                    $fx1Deposits[$day] = $fx1Deposits[$day] + round(($fx1Roi * $deposit->amount) / 100, 2);
                } else {
                    $fx1Deposits[$day] = round(($fx1Roi * $deposit->amount) / 100, 2);
                }

            } else if($deposit->accountType == 2){
                $day = date_format($deposit->created_at, 'd');
                if(array_key_exists($day, $fx1Deposits)){
                    $fx2Deposits[$day] = $fx1Deposits[$day] + round(($fx2Roi * $deposit->amount) / 100, 2);
                } else {
                    $fx2Deposits[$day] = round(($fx2Roi * $deposit->amount) / 100, 2);
                }

            }else if($deposit->accountType == 3){

                $day = date_format($deposit->created_at, 'd');
                if(array_key_exists($day, $fx1Deposits)){
                    $fx3Deposits[$day] = $fx1Deposits[$day] + round(($fx3Roi * $deposit->amount) / 100, 2);
                } else {
                    $fx3Deposits[$day] = round(($fx3Roi * $deposit->amount) / 100, 2);
                }

            }

        }

        $type1 = '<div class="calendar">';

        $type1 .= '<div class="month-year">';
        $type1 .= '<span class="month">' . $date->format('M') . '</span>';
        $type1 .= '<span class="year">' . $date->format('Y') . '</span>';
        $type1 .= '</div>';

        $type1 .= '<div class="days">';

        $dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($dayLabels as $dayLabel) {
            $type1 .= '<span class="day-label">' . $dayLabel . '</span>';
        }
        while ($startOfCalendar <= $endOfCalendar) {

            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';
            $type1 .= '<span class="day ' . $extraClass . '"><span class="content">' . $startOfCalendar->format('j') . '</span><span class="roi" style="display:'.($startOfCalendar->format('m') == $date->format('m') ? 'block' : 'none').'">' . (array_key_exists($startOfCalendar->format('j'), $fx1Deposits) ? $fx1Deposits[$startOfCalendar->format('j')] : "") . '</span></span>';
            $startOfCalendar->addDay();
        }
        $type1 .= '</div></div>';


//        Calender 2

        $date = empty($date) ? Carbon::now() : Carbon::createFromDate($date);
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);

        $type2 = '<div class="calendar">';

        $type2 .= '<div class="month-year">';
        $type2 .= '<span class="month">' . $date->format('M') . '</span>';
        $type2 .= '<span class="year">' . $date->format('Y') . '</span>';
        $type2 .= '</div>';

        $type2 .= '<div class="days">';

        $dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($dayLabels as $dayLabel) {
            $type2 .= '<span class="day-label">' . $dayLabel . '</span>';
        }

        while ($startOfCalendar <= $endOfCalendar) {

            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';
            $type2 .= '<span class="day ' . $extraClass . '"><span class="content">' . $startOfCalendar->format('j') . '</span><span class="roi" style="display:'.($startOfCalendar->format('m') == $date->format('m') ? 'block' : 'none').'">' . (array_key_exists($startOfCalendar->format('j'), $fx2Deposits) ? $fx2Deposits[$startOfCalendar->format('j')] : "") . '</span></span>';
            $startOfCalendar->addDay();
        }
        $type2 .= '</div></div>';


//        Calender 3
        $date = empty($date) ? Carbon::now() : Carbon::createFromDate($date);
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);

        $type3 = '<div class="calendar">';

        $type3 .= '<div class="month-year">';
        $type3 .= '<span class="month">' . $date->format('M') . '</span>';
        $type3 .= '<span class="year">' . $date->format('Y') . '</span>';
        $type3 .= '</div>';

        $type3 .= '<div class="days">';

        $dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($dayLabels as $dayLabel) {
            $type3 .= '<span class="day-label">' . $dayLabel . '</span>';
        }

        while ($startOfCalendar <= $endOfCalendar) {

            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';
            $type3 .= '<span class="day ' . $extraClass . '"><span class="content">' . $startOfCalendar->format('j') . '</span><span class="roi" style="display:'.($startOfCalendar->format('m') == $date->format('m') ? 'block' : 'none').'">' . (array_key_exists($startOfCalendar->format('j'), $fx3Deposits) ? $fx3Deposits[$startOfCalendar->format('j')] : "") . '</span></span>';

            $startOfCalendar->addDay();
        }
        $type3 .= '</div></div><br>';

        return view('user.accounts.earningCharts', compact( 'type1', 'type2', 'type3', 'fx1RoiTitle', 'fx2RoiTitle', 'fx3RoiTitle'));
    }
}
