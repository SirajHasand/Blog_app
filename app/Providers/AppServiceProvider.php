<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Define the 'manage-users' ability: only users with the admin role can manage users
        Gate::define('manage-users', function (User $user) {
            return $user->role === 'admin';
        });
        
    }
}
