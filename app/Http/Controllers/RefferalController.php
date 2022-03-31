<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefferalController extends Controller
{
    public function index()
    {
        return view('user.refferals.refferals');
    }
}
