<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
        Schema::defaultStringLength(191);

        // Only force HTTPS scheme in non-local environments (e.g., live production)
        if (!app()->environment('local')) {
            if (
                (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] == 1)) ||
                (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
                (isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
                config('app.env') === 'production' ||
                (config('app.url') && strpos(config('app.url'), 'https://') !== false)
            ) {
                URL::forceScheme('https');
            }
        }
    }
}
