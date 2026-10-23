<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Middleware\Localization;
use App\Http\Middleware\SettingMiddleware;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(Localization::class)->group(function(){
Route::get('/test',function(){
    return User::find(2)->posts;
});
Route::get('/users',[UserController::class,'index'])->name('users');
Route::middleware(SettingMiddleware::class)->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/post', [PostController::class, 'index'])->name('post');
    Route::get('/post/{slug}', [PostController::class, 'show'])->name('show');

});

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/locale/{locale}',function($locale){
        app()->setlocale($locale);
        Session()->put('locale',$locale);
        return redirect()->route('home');
    })->name('locale');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('trash',[PostController::class,'trash'])->name('posts.trash');
    Route::delete('force-delete/{id}',[PostController::class,'delete'])->name('posts.force-delete');
    Route::get('restore/{id}',[PostController::class,'restore'])->name('posts.restore');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{admin}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{admin}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('setting',[SettingController::class,'index'])->name('setting.index');
    Route::post('setting',[SettingController::class,'store'])->name('setting.store');
    Route::get('/admin/registerNewUser',[UserController::class, 'registerNewUser'])->name('registerNewUser');
    Route::post('/admin/storeUser',[UserController::class, 'storeUser'])->name('storeUser');

    
});
});  

require __DIR__.'/auth.php';
