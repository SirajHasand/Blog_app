<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Middleware\Localization;
use App\Http\Middleware\SettingMiddleware;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(Localization::class)->group(function(){

    Route::get('/users',[UserController::class,'index'])->name('users')->middleware(['admin','permission:user view']);

    Route::middleware(SettingMiddleware::class)->group(function(){
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/post', [PostController::class, 'index'])->name('post')->middleware('permission:post view');
        Route::get('/post/{slug}', [PostController::class, 'show'])->name('show')->middleware('permission:post view');
    });

    Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/locale/{locale}',function($locale){
        app()->setlocale($locale);
        Session()->put('locale',$locale);
        return redirect()->route('home');
    })->name('locale');
    // these routes is authorized 
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('trash',[PostController::class,'trash'])->name('posts.trash')->middleware('permission:post view');
        Route::delete('force-delete/{id}',[PostController::class,'delete'])->name('posts.force-delete')->middleware('permission:post delete');
        Route::get('restore/{id}',[PostController::class,'restore'])->name('posts.restore')->middleware('permission:post restore');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create')->middleware('permission:post create');
        Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store')->middleware('permission:post create');
        Route::get('/admin/edit/{admin}', [AdminController::class, 'edit'])->name('admin.edit')->middleware('permission:post update');
        Route::put('/admin/update/{admin}', [AdminController::class, 'update'])->name('admin.update')->middleware('permission:post update');
        Route::delete('/admin/delete/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy')->middleware('permission:post delete');
        Route::get('setting',[SettingController::class,'index'])->name('setting.index');
        Route::post('setting',[SettingController::class,'store'])->name('setting.store');
        Route::get('/admin/registerNewUser',[UserController::class, 'registerNewUser'])->name('registerNewUser')->middleware(['admin','can:manage-users']);
        Route::post('/admin/storeUser',[UserController::class, 'storeUser'])->name('storeUser')->middleware(['admin','can:manage-users']);
        Route::put('/admin/users/{user}/update',[UserController::class, 'updateUser'])->name('users.update')->middleware(['admin','can:manage-users']);
        Route::delete('/admin/users/{user}/destroy',[UserController::class, 'destroyUser'])->name('users.destroy')->middleware(['admin','can:manage-users']);

        Route::get('/admin/roles',[RoleController::class, 'index'])->name('roles.index')->middleware(['admin','permission:role manage']);
        Route::get('/admin/roles/create',[RoleController::class, 'create'])->name('roles.create')->middleware(['admin','permission:role manage']);
        Route::post('/admin/roles/store',[RoleController::class, 'store'])->name('roles.store')->middleware(['admin','permission:role manage']);
        Route::get('/admin/roles/{role}/edit',[RoleController::class, 'edit'])->name('roles.edit')->middleware(['admin','permission:role manage']);
        Route::put('/admin/roles/{role}/update',[RoleController::class, 'update'])->name('roles.update')->middleware(['admin','permission:role manage']);
        Route::delete('/admin/roles/{role}/destroy',[RoleController::class, 'destroy'])->name('roles.destroy')->middleware(['admin','permission:role manage']);
        Route::get('/admin/permissions',[PermissionController::class, 'index'])->name('permissions.index')->middleware(['admin','permission:role manage']);
    });
});

require __DIR__.'/auth.php';
