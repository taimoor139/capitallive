<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
        return view('user.accounts.bonousAccounts');
    }
    public function earningAccounts()
    {
        return view('user.accounts.earningAccounts');
    }
}
