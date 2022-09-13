<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RefferalController extends Controller
{
    public function index()
    {
        $totalLeftMembers = Referral::query()->where(['referrer_name' => Auth::user()->username, 'position' => 0])->whereNotNull(['user_id'])->count();
        $totalRightMembers = Referral::query()->where(['referrer_name' => Auth::user()->username, 'position' => 1])->whereNotNull(['user_id'])->count();
        $position = 0;
        $pairPosition = Referral::query()->where(['referrer_name' => Auth::user()->username, 'user_id' => null])->first();
        $sponsors = Referral::query()->where(['referrer_name' => Auth::user()->username])->get();
        if($pairPosition) $position = $pairPosition->position;
        return view('user.refferals.refferals', compact('totalRightMembers', 'totalLeftMembers', 'position', 'sponsors'));
    }

    public function registerReferred($referrer){
        return view('auth.register', compact('referrer'));
    }

    public function referralPosition(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                "position" => "required"
            ]);
            if ($validation) {
                $data = $request->only(['position']);
                $referral = Referral::query()->where(['referrer_name' => Auth::user()->username, 'user_id' => null])->first();
                if(!$referral)  $referral = new Referral();
                $referral->referrer_name  = Auth::user()->username;
                $referral->position = $data["position"];
                if($referral->save()){
                    return redirect()->back()->with('success',"Position changed Successfully.");
                }

            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function referrerValidation(Request $request){
        $sponsorCheck = User::query()->where('username', $request->referrerName)->first();
        if($sponsorCheck) {
            return 0;
        }  else {
            return 1;
        }
    }

    public function usernameValidation(Request $request){
        $sponsorCheck = User::query()->where('username', $request->username)->first();
        if($sponsorCheck) {
            return 1;
        }  else {
            return 0;
        }
    }
}
