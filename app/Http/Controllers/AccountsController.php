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
        $userEarnings = Earning::query()->where(['user_id' => Auth::user()->id, 'status' => 100])->whereMonth('created_at', $date->format('m'))->get();
        $fx1Deposits = [];
        $fx2Deposits = [];
        $fx3Deposits = [];

        $type1 = '';
        $type2 = '';
        $type3 = '';

        foreach ($userEarnings as $earning){
            if($earning->earning_type == 1){

                $day = date_format($earning->created_at, 'd');
                if(array_key_exists($day, $fx1Deposits)){
                    $fx1Deposits[$day] = $fx1Deposits[$day] + $earning->earning;
                } else {
                    $fx1Deposits[$day] = $earning->earning;
                }

            } else if($earning->earning_type == 2){
                $day = date_format($earning->created_at, 'd');
                if(array_key_exists($day, $fx1Deposits)){
                    $fx2Deposits[$day] = $fx1Deposits[$day] + $earning->earning;
                } else {
                    $fx2Deposits[$day] = $earning->earning;
                }

            }else if($earning->earning_type == 3){

                $day = date_format($earning->created_at, 'd');
                if(array_key_exists($day, $fx1Deposits)){
                    $fx3Deposits[$day] = $fx1Deposits[$day] + $earning->earning;
                } else {
                    $fx3Deposits[$day] = $earning->earning;
                }

            }

        }
        while ($startOfCalendar <= $endOfCalendar) {
        
            $type1 .= '<li class="day other-month">
                            <div class="date">'. $startOfCalendar->format('d') .'</div> 
                                '.($startOfCalendar->format('m') == $date->format('m') && array_key_exists($startOfCalendar->format('d') ,$fx1Deposits) ? '<div class="event">
                                                    <div class="event-desc">$ '
                                                        .$fx1Deposits[$startOfCalendar->format('d')].
                                                    '</div>
                                                </div>' : "").' 
                            
                       </li>';

            $startOfCalendar->addDay();
        }
        
//        Calender 2
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);
        while ($startOfCalendar <= $endOfCalendar) {

            $type2 .= '<li class="day other-month">
                            <div class="date">'. $startOfCalendar->format('d') .'</div> 
                                '.($startOfCalendar->format('m') == $date->format('m') && array_key_exists($startOfCalendar->format('d') ,$fx2Deposits) ? '<div class="event">
                                                    <div class="event-desc">$ '
                                                        .$fx2Deposits[$startOfCalendar->format('d')].
                                                    '</div>
                                                </div>' : "").' 
                            
                    </li>';
            $startOfCalendar->addDay();
        }


//        Calender 3
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);
        while ($startOfCalendar <= $endOfCalendar) {
            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';
            $type3 .= '<li class="day other-month">
                            <div class="date">'. $startOfCalendar->format('d') .'</div> 
                                '.($startOfCalendar->format('m') == $date->format('m') && array_key_exists($startOfCalendar->format('d') ,$fx3Deposits) ? '<div class="event">
                                                    <div class="event-desc">$ '
                                                        .$fx3Deposits[$startOfCalendar->format('d')].
                                                    '</div>
                                                </div>' : "").' 
                            
                    </li>';

            $startOfCalendar->addDay();
        }

        return view('user.accounts.earningCharts', compact( 'type1', 'type2', 'type3', 'fx1RoiTitle', 'fx2RoiTitle', 'fx3RoiTitle', 'date'));
    }
}
