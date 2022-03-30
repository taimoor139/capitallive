<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about(){
        return view('pages.about');
    }
    public function docs(){
        return view('pages.legalDocs');
    }
}
