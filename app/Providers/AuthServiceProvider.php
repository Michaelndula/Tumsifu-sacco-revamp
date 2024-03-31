<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-dashboard', function ($user) {
            // Check if the user object exists and has a valid role
            if ($user instanceof User && in_array($user->role, ['staff', 'admin', 'user'])) {
                return true;
            }
            return false;
        });
    }
}
