<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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
        // Routes publiques
        Route::middleware('web')->group(base_path('routes/web.php'));

        // Routes admin avec protection
        Route::middleware(['web', 'auth', 'admin'])
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
    }

    /**
     * Register the application services.
     */
    
}
