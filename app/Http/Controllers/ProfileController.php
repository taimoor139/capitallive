<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.myProfile');
    }

    public function security()
    {
        return view('user.profile.security');
    }

    public function nextOfKin()
    {
        return view('user.profile.nextOfKin');
    }
}
