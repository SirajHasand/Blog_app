<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    function index(){
        $roles = Role::all();
        return view('auth.user')
        ->with('page',"Users")
        ->with('users',User::with('role')->get())
        ->with('roles', $roles);
    }

    function registerNewUser(){
        Gate::authorize('manage-users');
        $roles = Role::all();
        return view('admin.registerNewUser')
        ->with('roles', $roles);
    }

    function storeUser(Request $request){
        Gate::authorize('manage-users');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->input('role_id');
        $user->save();

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->user_pic = $request->image;
        $profile->save();

        return redirect()->route('users')->with('success', 'User Added successfully.');
    }

    function updateUser(Request $request, User $user){
        Gate::authorize('manage-users');
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'role_id' => 'sometimes|exists:roles,id',
        ]);

        $data = [];
        if ($request->has('name')) $data['name'] = $request->name;
        if ($request->has('email')) $data['email'] = $request->email;
        if ($request->has('role_id')) $data['role_id'] = $request->role_id;

        $user->update($data);

        return redirect()->route('users')->with('success', 'User updated successfully.');
    }

    function destroyUser(User $user){
        Gate::authorize('manage-users');
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully.');
    }
}
