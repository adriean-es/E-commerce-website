<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AccessControlService; // <-- YOU MUST ADD THIS LINE

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // <-- ADD THIS SINGLETON REGISTRATION -->
        $this->app->singleton(AccessControlService::class, function ($app) {
            return new AccessControlService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
