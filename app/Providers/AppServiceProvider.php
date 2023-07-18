<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        Gate::define('admin', function(User $user) {
            return $user->username === 'admin';
        });

        Gate::define('notAdmin', function(){
            if (!Auth::check()) return "test";
            else if (Auth::check() && Auth::user()->username !== 'admin') return "test";
            else return false;
        });
    }
}
