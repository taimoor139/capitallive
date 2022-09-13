<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    public function index()
    {
        $articles = Education::query()->orderby('id', 'desc')->get();
        return view('user.education.education', compact('articles'));
    }

    public function articles(){
        if(Auth::user()->role_id == 1){
            $articles = Education::all();
        } else {
            $articles = Education::query()->where('user_id', Auth::user()->id);
        }
        return view('admin.education.index', compact('articles'));
    }

    public function create(){
        return view('admin.education.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
           'title' => 'required',
            'body' => 'required'
        ]);

        if($validator){
            $education = new Education();

            $education->title = $request->title;
            $education->body = $request->body;
            $education->user_id  = Auth::user()->id;
            if($education->save()){
                return redirect()->route('articles')->with('success', 'Education Created Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function view($id){
        $article = Education::query()->where('id', $id)->first();
        if ($article){
            return view('admin.education.edit', compact('article'));
        } else {
            return redirect()->back()->with('error', 'Not Found');
        }
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        if($validator){
            $update = Education::query()->where('id', $id)->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);
            if($update){
                return redirect()->route('articles')->with('success', 'Education updated Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function destroy($id){
        $article = Education::query()->where('id', $id);
        if($article){
            $article->delete();
            return redirect()->route('articles')->with('success', 'Article Deleted Succssfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
