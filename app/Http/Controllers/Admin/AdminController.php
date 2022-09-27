<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Bonus;
use App\Models\Deposit;
use App\Models\Referral;
use App\Models\ReturnOnInvestment;
use App\Models\User;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id == 1){
            $users = User::query()->where('role_id', '!=', 1)->count();
        }
        else{
            $users = User::query()->whereNotIn('role_id',  [1, 3])->count();
        }

        $usersBalance = Balance::query()->sum('balance');
        $verifiedUsers = User::query()->where('activation_status', 1)->where('role_id', '!=', 1)->count();
        $bannedUsers = User::query()->where('status', 1)->where('role_id', '!=', 1)->count();
        $totalInvestment = Deposit::query()->where('status', 100)->sum('amount');

        $date = Carbon::now()->subDays(7);

        $last7DaysInvestment = Deposit::query()->where('status', 100)->where('created_at', '=>', $date)->sum('amount');

        $totalReferralBonus = Bonus::query()->sum('amount');

        $totalRejectDeposit = Deposit::query()->where('status', -1)->sum('amount');
        $totalPendingDeposit = Deposit::query()->whereNotIn('status', [100, -1])->sum('amount');

        $result = [];
        $roles = Auth::user()->assignRoles->pluck('role_id')->toArray();

        for ($i = 3; $i > -1; $i--){
            $date = Carbon::now()->subMonths($i);
            $depositAmount = Deposit::query()->where('status', 100)->whereMonth('created_at', $date)->sum('amount');
            $withdrawAmount = Withdrawal::query()->whereMonth( 'created_at' , $date)->sum('amount');

            $result[] = [$date->getTranslatedShortMonthName(), $depositAmount, $withdrawAmount];
        }

        $totalWithdraw = Withdrawal::query()->sum('amount');
        $totalPendingWithdraw = Withdrawal::query()->where('status', 0)->count();


        $newUsers = User::query()->whereNotIn('role_id',  [1, 3])->latest('id')->take(6)->get();


        return view('admin.home', compact('users', 'usersBalance',
            'verifiedUsers', 'bannedUsers', 'totalInvestment', 'last7DaysInvestment', 'totalReferralBonus',
            'totalRejectDeposit', 'totalPendingDeposit', 'result', 'totalWithdraw', 'newUsers', 'roles', 'totalPendingWithdraw'));
    }

    public function profile(){
        return view('admin.profile.myProfile');
    }

    public function users()
    {
        if(Auth::user()->role_id == 1){
            $users = User::query()->where('role_id', '!=', 1)->get();
        }
        else{
            $users = User::query()->whereNotIn('role_id',  [1, 3])->get();
        }

        return view('admin.users.index', compact('users'));
    }

    public function viewUser($id)
    {
        $user = User::query()->where('id', $id)->first();
        $directBonus = Bonus::query()->where(['user_id' =>  $id, 'type' => 4])->sum('amount');
        $networkBonus = Bonus::query()->where(['user_id' =>  $id, 'type' => 3])->sum('amount');
        $leftMembers = Referral::query()->with('user')->where(['referrer_name' => $user->username, 'position' => 0])->get();
        $rightMembers = Referral::query()->with('user')->where(['referrer_name' => $user->username, 'position' => 1])->get();


        return view('admin.users.view', compact('user', 'networkBonus', 'directBonus', 'leftMembers', 'rightMembers'));
    }

    public function activeUsers()
    {
        if(Auth::user()->role_id == 1){
            $activeUsers = User::query()->where('status', null)->where('role_id', '!=', 1)->get();
        }
        else{
            $activeUsers = User::query()->where('status', null)->whereNotIn('role_id',  [1, 3])->get();
        }

        return view('admin.users.active', compact('activeUsers'));
    }

    public function bannedUsers()
    {
        if(Auth::user()->role_id == 1){
            $bannedUsers = User::query()->where('status', 1)->where('role_id', '!=', 1)->get();
        }
        else{
            $bannedUsers = User::query()->where('status', 1)->whereNotIn('role_id',  [1, 3])->get();
        }

        return view('admin.users.banned', compact('bannedUsers'));
    }

    public function emailUnverified()
    {
        if(Auth::user()->role_id == 1){
            $unverifiedUsers = User::query()->where('activation_status', null)->where('role_id', '!=', 1)->get();
        }
        else{
            $unverifiedUsers = User::query()->where('activation_status', null)->whereNotIn('role_id',  [1, 3])->get();
        }

        return view('admin.users.unverified', compact('unverifiedUsers'));
    }

    public function sendEmail(){
        return view('admin.users.sendEmail');
    }

    public function updateUser(Request $request, $userId){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'confirmed'],
            'address' => ['required', 'string', 'confirmed'],
            'country' => ['required'],
            'city' => ['required'],

        ]);

        $status = '';
        if(!$request->status){
            $status = 1;
        } else {
            $status = '';
        }
        if($validator){
            $update = User::query()->where('id', $userId)->update([
               'name' => $request->name,
                'email' => $request->email,
                'number' => $request->mobile,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'status' =>$status
            ]);
            $balance = Balance::query()->where('user_id', $userId);
            if($request->balance && $balance){
                $previousBalance = $balance->first()->balance;
                $balance->update([
                    'balance' => $request->balance
                ]);

                $userBonus = ($previousBalance ? $request->balance - $previousBalance : $request->balance);
                if($userBonus){
                    $bonus = new Bonus();
                    $bonus->type = 5;
                    $bonus->from = Auth::user()->id;
                    $bonus->amount = $userBonus;
                    $bonus->percentage = 100;
                    $bonus->status = 100;
                    $bonus->user_id = $userId;
                    $bonus->save();
                }
            }
            if($update){
                return redirect()->back()->with('success', 'User updated successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }
    }

    public function sendEmails(Request $request){
        $validator = Validator::make($request->all(), [
            'subject' => ['required', 'string'],
            'message' => ['required'],

        ]);


        if($validator){
            $url = '';
            if($request->file('attachment')){
                $attachment = $request->file('attachment');
                $filename = time() . '.' .$attachment->getClientOriginalExtension();
                $attachment->move(base_path() . '/storage/app/public', $filename);
                $url = base_path() . '/storage/app/public/'.$filename;
            }
            $mail_data = [
                'subject' => $request->subject,
                'message' => $request->message,
                'attachment' => $url
            ];

            $job = (new \App\Jobs\SendEmail($mail_data))
                ->delay(now()->addSeconds(2));

            dispatch($job);

            return redirect()->back()->with('success', 'Email sent to all users successfully');
        }
    }

    public function sendSingleEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'subject' => ['required', 'string'],
            'message' => ['required'],

        ]);

        if($validator){
            $url = '';
            if($request->file('attachment')){
                $attachment = $request->file('attachment');
                $filename = time() . '.' .$attachment->getClientOriginalExtension();
                $attachment->move(base_path() . '/storage/app/public', $filename);
                $url =  base_path() . '/storage/app/public/'.$filename;
            }

            $mail_data = [
                'subject' => $request->subject,
                'message' => $request->message,
                'to' => $request->useremail,
                'attachment' => $url
            ];
            Mail::send([], [], function ($message) use ($mail_data) {
                $message->to($mail_data['to'], $mail_data['to'])
                    ->subject($mail_data['subject'])
                    ->setBody('<!DOCTYPE html>
                                <html>
                                <head>
                                    <meta charset="utf-8">
                                    <title>'.$mail_data['subject'].'</title>
                                </head>
                                <body>
                                <h1>'.$mail_data['subject'].'</h1>
                                <p>'.$mail_data['message'].'</p>
                                </body>
                                </html>', 'text/html');
                if($mail_data['attachment']) $message->attach(\Swift_Attachment::fromPath($mail_data['attachment']));

                $message->from(env('MAIL_USERNAME'));
            });

            return redirect()->back()->with('success', 'Email sent  successfully');
        }
    }

    public function earningCharts(){
        $charts = ReturnOnInvestment::all();

        return view('admin.earningCharts.index', compact('charts'));
    }

    public function updateRoi(Request $request){

        $validator = Validator::make($request->all(), [
            'type' => ['required'],
            'roi' => ['required'],

        ]);

        if($validator) {
            $update = ReturnOnInvestment::query()->where('deposit_type', $request->type)->update([
                'roi' => $request->roi
            ]);
            if($update){
                return redirect()->route('earning-charts')->with('success', 'Return on Investment updated successfully');
            } else {
                return redirect()->route('earning-charts')->with('error', 'Something went wrong');
            }
        }


    }

    public function uploadProfile(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);
        if ($validation) {
            if ($request->file('img')) {
                $file = $request->file('img');
                $filename = $file->getClientOriginalName();
                $destinationPath = 'uploads/profile_pictures';
                $file->move($destinationPath, $file->getClientOriginalName());

                $updateUser = User::query()->where('id', Auth::user()->id)->update([
                    'image' => $filename,
                    'name' => $request->name,
                    'email' => $request->email
                ]);

                if($updateUser){
                    return redirect()->back()->with('success', 'Profile updated successfully');
                } else {
                    return redirect()->back()->with('error', 'Something went wrong! Try Again.');
                }

            }else {

                $updateUser = User::query()->where('id', Auth::user()->id)->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);

                if($updateUser){
                    return redirect()->back()->with('success', 'Profile updated successfully');
                } else {
                    return redirect()->back()->with('error', 'Something went wrong! Try Again.');
                }
            }


        }
    }

    public function updateAdminPassword(){
        return view('auth.admin.reset');
    }

    public function updatePassword(Request $request)
    {
            $user = User::query()->where('id', Auth::user()->id)->first();
            if ($request->password != $request->password_confirmation) {
                return redirect()->back()->with('error', 'New and Confirm Password are not matched');
            }
            if ($user && Hash::check($request->current_password, $user->password)) {
                $updatePassword = User::query()->where('id', Auth::user()->id)->update([
                    'password' => Hash::make($request->password)
                ]);
                if ($updatePassword) {
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Password changed successfully!');
                    Auth::logout();

                    return redirect()->to('/admin/login');
                }
            } else {
                $request->session()->flash('message.level', 'error');
                $request->session()->flash('message.content', 'Current Password is not correct');
                return redirect()->back();
            }

    }

}
