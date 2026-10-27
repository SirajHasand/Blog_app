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

/*
 * All routes in this group run through the Localization middleware,
 * which sets the application language based on the user's locale
 * before any route inside is handled.
 */
Route::middleware(Localization::class)->group(function(){
    // Debug route kept commented out: returns all posts belonging to user id 2
    // Route::get('/test',function(){
    //     return User::find(2)->posts;
    // });

    // List all users — restricted to admins via the 'admin' middleware
    Route::get('/users',[UserController::class,'index'])->name('users')->middleware('admin');

    /*
     * Routes wrapped in SettingMiddleware run after the setting is loaded
     * (e.g. site logo / phone / social links from the database).
     */
    Route::middleware(SettingMiddleware::class)->group(function(){
        // Homepage: shows latest posts
        Route::get('/', [HomeController::class, 'index'])->name('home');
        // Post listing page
        Route::get('/post', [PostController::class, 'index'])->name('post');
        // Single post page — {slug} is matched against the post slug column
        Route::get('/post/{slug}', [PostController::class, 'show'])->name('show');

    });

    // Admin dashboard — user must be logged in and email-verified
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    // Language switcher: stores chosen locale in session and redirects home
    Route::get('/locale/{locale}',function($locale){
        app()->setlocale($locale);
        Session()->put('locale',$locale);
        return redirect()->route('home');
    })->name('locale');


    /*
     * Every route below requires an authenticated user ('auth' middleware).
     */
    Route::middleware('auth')->group(function () {
        // Show / edit the logged-in user's profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        // Show soft-deleted posts (trash bin)
        Route::get('trash',[PostController::class,'trash'])->name('posts.trash');
        // Permanently delete a post by ID
        Route::delete('force-delete/{id}',[PostController::class,'delete'])->name('posts.force-delete');
        // Restore a soft-deleted post by ID
        Route::get('restore/{id}',[PostController::class,'restore'])->name('posts.restore');
        // Update profile info (PATCH)
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        // Delete the logged-in user's account
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // Show the create-post form
        Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
        // Store a newly created post
        Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
        // Show the edit-post form for a given post
        Route::get('/admin/edit/{admin}', [AdminController::class, 'edit'])->name('admin.edit');
        // Update an existing post
        Route::put('/admin/update/{admin}', [AdminController::class, 'update'])->name('admin.update');
        // Delete a post
        Route::delete('/admin/delete/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
        // Show site settings page
        Route::get('setting',[SettingController::class,'index'])->name('setting.index');
        // Save site settings (logo, phone, facebook)
        Route::post('setting',[SettingController::class,'store'])->name('setting.store');
        // Admin-only user management routes (also require the 'manage-users' ability)
        Route::get('/admin/registerNewUser',[UserController::class, 'registerNewUser'])->name('registerNewUser')->middleware(['admin','can:manage-users']);
        Route::post('/admin/storeUser',[UserController::class, 'storeUser'])->name('storeUser')->middleware(['admin','can:manage-users']);

    });
});

require __DIR__.'/auth.php';
