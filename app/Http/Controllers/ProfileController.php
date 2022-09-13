<?php

namespace App\Http\Controllers;

use App\Models\LoginSecurity;
use App\Models\NextOfKin;
use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PragmaRX\Google2FA\Google2FA;

class ProfileController extends Controller
{
    public function index()
    {
        $points = Point::query()->where('user_id', Auth::user()->id)->first();
        return view('user.profile.myProfile', compact('points'));
    }

    public function completeProfile(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'user_id' => 'required',
                'phone' => 'required',
            ]);
            if ($validation) {
                $profile = User::query()->where('id', $request->user_id)->update([
                    'activation_status' => 1,
                    'number' => $request->phone,
                    'country' => $request->country,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'birth' => $request->dob,
                    'city' => $request->city,
                    'tax_country' => $request->tax_country,
                    'tax_identification_no' => $request->tax_identification_number,
                    'source_of_funds' => $request->source_of_funds

                ]);
                if ($profile) {
                    return redirect()->route('user.dashboard');
                }
            }

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function security()
    {
        $user = Auth::user();
        $google2faUrl = '';
        $secretKey = '';

        if ($user->loginSecurity()->exists()) {
            $google2fa = new \PragmaRX\Google2FAQRCode\Google2FA();
            $google2faUrl = $google2fa->getQRCodeInline('Captial Live', $user->email, $user->loginSecurity->google2fa_secret);
            $secretKey = $user->loginSecurity->google2fa_secret;
        }
        $data = array(
            'user' => $user,
            'secret' => $secretKey,
            'google2fa_url' => $google2faUrl
        );
        return view('user.profile.security', compact('data'));
    }

    public function generate2faSecret(Request $request)
    {

        $user = Auth::user();
        $google2fa = new \PragmaRX\Google2FAQRCode\Google2FA();

        $loginSecurity = LoginSecurity::firstOrNew(array('user_id' => $user->id));
        $loginSecurity->user_id = $user->id;
        $loginSecurity->google2fa_enable = 0;
        $loginSecurity->google2fa_secret = $google2fa->generateSecretKey();
        $loginSecurity->save();

        return redirect()->route('security')->with('success', "Secret key is generated.");
    }

    public function enable2fa(Request $request)
    {
        $user = Auth::user();
        $google2fa = new \PragmaRX\Google2FAQRCode\Google2FA();
        $secret = $request->secret;
        $validation = $google2fa->verifyKey($user->loginSecurity->google2fa_secret, $secret);

        if ($validation) {
            $user->loginSecurity->google2fa_enable = 1;
            $user->loginSecurity->save();
            return redirect()->route('security')->with('success', "2FA is enabled successfully.");
        } else {
            return redirect()->route('security')->with('error', "Invalid verification Code, Please try again.");
        }

    }

    public function disable2fa(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "Your password does not matches with your account password. Please try again.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
        ]);
        $user = Auth::user();
        $user->loginSecurity->google2fa_enable = 0;
        $user->loginSecurity->save();
        return redirect()->route('security')->with('success', "2FA is now disabled.");
    }

    public function updatePassword(Request $request)
    {
        try {
            $user = User::query()->where('id', Auth::user()->id)->first();
            if ($request->current_password != $request->password_confirmation) {
                $request->session()->flash('message.level', 'error');
                $request->session()->flash('message.content', 'New and Confirm Password are not matched');
                return redirect()->back();
            }
            if ($user && Hash::check($request->current_password, $user->password)) {
                $updatePassword = User::query()->where('id', Auth::user()->id)->update([
                    'password' => Hash::make($request->password)
                ]);
                if ($updatePassword) {
                    $request->session()->flash('message.level', 'success');
                    $request->session()->flash('message.content', 'Password changed successfully!');
                    Auth::logout();

                    return redirect()->to('/login');
                }
            } else {
                $request->session()->flash('message.level', 'error');
                $request->session()->flash('message.content', 'Current Password is not correct');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error', $e->getMessage()]);
        }

    }

    public function nextOfKin()
    {
        return view('user.profile.nextOfKin');
    }

    public function addNextOfKin(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'nok_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'relation' => 'required',
                'shipping_address' => 'required',
            ]);
            if ($validation) {
                $nok = new NextOfKin();
                $nok->user_id = Auth::user()->id;
                $nok->name = $request->nok_name;
                $nok->email = $request->email;
                $nok->phone_no = $request->phone;
                $nok->relation = $request->relation;
                $nok->shipping_address = $request->shipping_address;
                if ($nok->save()) {
                    return redirect()->back()->with('success', "Next of Kin added Successfully.");
                } else {
                    return redirect()->back()->with('error', "Something went wrong.");
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function uploadDp(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'img' => 'required',
        ]);
        if ($validation) {
            if ($request->file('img')) {
                $file = $request->file('img');
                $filename = $file->getClientOriginalName();
                $destinationPath = 'uploads/profile_pictures';
                $file->move($destinationPath, $file->getClientOriginalName());
            }

            $updateUser = User::query()->where('id', Auth::user()->id)->update([
                'image' => $filename
            ]);

            if($updateUser){
                return redirect()->back()->with('success', 'Profile Picture changed successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong! Try Again.');
            }
        }
    }

}
