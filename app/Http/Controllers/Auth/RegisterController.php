<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\EarnAward;
use App\Models\Earning;
use App\Models\Point;
use App\Models\Referral;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (Auth()->user()->role_id == 1) {
            return route('admin.dashboard');

        } elseif (Auth()->user()->role_id == 2) {
            return route('user.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     */
    protected function create(array $data)
    {
        $statement = DB::select("SHOW TABLE STATUS LIKE 'users'");
        $nextId = $statement[0]->Auto_increment;
        if (array_key_exists('sponsor', $data)) {
            $referralCheck = Referral::query()->where(['referrer_name' => $data['sponsor'], 'user_id' => null])->first();


            if ($referralCheck) {
                $referralCheck->user_id = $nextId;
                $referralCheck->save();
            } else {
                $referral = new Referral();
                $referral->referrer_name = $data['sponsor'];
                $referral->user_id = $nextId;
                $referral->position = 0;
                $referral->save();
            }
        }

        $earnAward = new EarnAward();
        $earnAward->award_id = 1;
        $earnAward->user_id = $nextId;
        $earnAward->save();

        $balance = new Balance();
        $balance->user_id = $nextId;
        $balance->save();

        $earning = new Earning();
        $earning->user_id = $nextId;
        $earning->save();

        $points = new Point();
        $points->user_id = $nextId;
        $points->save();


        return User::create([
            'name' => $data['name'],
            'role_id' => $data['register_type'],
            'email' => $data['email'],
            'terms' => $data['terms'],
            'username' => $data['username'],
            'sponsor' => $data['sponsor'] ?? '',
            'rank' => 1,
            'trade_activation' => 0,
            'password' => Hash::make($data['password']),
        ]);

    }

}
