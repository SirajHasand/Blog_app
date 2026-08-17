<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name("home");
Route::get('/post',[PostController::class,'index'])->name("post");
Route::resource('/admin',AdminController::class); 
Route::get('/admin/delete/{admin}',[AdminController::class,'destroy'])->name('delete');
Route::get('/post/{slug}',[PostController::class,'show'])->name('show');