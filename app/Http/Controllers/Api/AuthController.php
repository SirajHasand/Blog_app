<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user || ! Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'Invalid credentials'], 401);
            
        }
        $data = [
            'user' => $user,
            'token' => $user->createToken($user->name)->plainTextToken
        ];
        return response()->json($data);
    }
}
