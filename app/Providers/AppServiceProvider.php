<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);

        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('subsecretario', function ($user) {
            return $user->role === 'subsecretario';
        });

        Gate::define('superAdmin', function ($user) {
            return $user->role === 'superAdmin';
        });

        Gate::define('user', function ($user) {
            return $user->role === 'user';
        });
    }
}
