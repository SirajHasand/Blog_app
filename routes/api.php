<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// api.php files where you can define your API routes. These routes are loaded by the RouteServiceProvider within a group which is assigned the "api" middleware group. Enjoy building your API!
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/post',PostController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);

Route::middleware('auth:api')->group(function(){

    Route::post('/logout',[AuthController::class, 'logout']);
});