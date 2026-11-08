<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Error;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
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
     public function register(RegisterRequest $request){
     $user = User::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'role_id'=>2
            ]
        );
        $data = [
            'user' => $user,
            'token' => $user->createToken($user->name)->plainTextToken
        ];
        return response()->json($data);
    
        
    }
    public function logout(){
        $user = Auth() -> user();
        $user -> tokens()->delete();
        return [
            "user" => $user,
            "message" => "user logged out"
        ]
        ;

    }
     }

