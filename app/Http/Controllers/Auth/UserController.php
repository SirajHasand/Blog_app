<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return view('auth.user')
        ->with('page',"Users")
        ->with('users',User::all());
    }
}
