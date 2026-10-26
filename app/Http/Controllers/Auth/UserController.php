<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    function index(){
        return view('auth.user')
        ->with('page',"Users")
        ->with('users',User::all());
    }
    function registerNewUser(){
        Gate::authorize('manage-users');
        return view('admin.registerNewUser');
    }
    function storeUser(Request $request){
        Gate::authorize('manage-users');
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->input('role', 'editor');
    
        $user->save();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->user_pic = $request->image;
        $profile->save();

        return redirect()->route('users')->with('success', 'User Added successfully.');
    }
}
