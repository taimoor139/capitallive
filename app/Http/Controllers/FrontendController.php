<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about(){
        return view('pages.about');
    }
    public function docs(){
        return view('pages.legalDocs');
    }
}
