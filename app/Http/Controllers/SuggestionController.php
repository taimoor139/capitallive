<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuggestionController extends Controller
{
    public function index()
    {
        return view('user.suggestions.suggestion');
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validation) {
            $suggestion = new Suggestion();
            $suggestion->title = $request->title;
            $suggestion->description = $request->description;
            $suggestion->user_id = Auth::user()->id;
            if ($suggestion->save()) {
                return redirect()->back()->with('success', 'Suggestion submitted successfully');
            }
        }

    }
}
