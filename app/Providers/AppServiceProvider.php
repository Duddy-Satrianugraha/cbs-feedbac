<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        Gate::define('ultraman', function ($user) {
            return $user->hasAnyRole('99');
        });

        Gate::define('it', function ($user){
            return $user->hasAnyRoles(['98','99']);
        });

        Gate::define('Panitia', function ($user){
            return $user->hasAnyRoles(['98','99']);
        });

        Gate::define('mhs', function ($user){
            return $user->hasAnyRoles(['99', '1']);
        });
    }


}
