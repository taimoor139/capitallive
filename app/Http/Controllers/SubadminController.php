<?php

namespace App\Http\Controllers;

use App\Models\AssignRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SubadminController extends Controller
{
    public function index(){
        $subadmins = User::query()->where('role_id', 3)->get();
        return view('admin.subadmin.index', compact('subadmins'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.subadmin.create', compact('roles'));
    }

    public function store(Request $request){

        $validation  = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'role_id' => 3,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user &&  count($request->roles) > 0){
            for($i = 0; $i < count($request->roles); $i++ ){
                $role = new AssignRole();
                $role->user_id = $user->id;
                $role->role_id = $request->roles[$i];
                $role->save();
            }

            return redirect()->route('subadmins')->with('success', 'Subadmin created successfully!');
        } else {
            return redirect()->back()->with('danger', 'Something went wrong!');
        }
    }
}
