<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Ensure request is bound early - handle CLI context
        $this->app->singleton('request', function () {
            // For CLI context, create a minimal request
            if (php_sapi_name() === 'cli') {
                return Request::create('/', 'GET', [], [], [], [
                    'REQUEST_METHOD' => 'GET',
                    'REQUEST_URI' => '/',
                    'HTTP_HOST' => 'localhost',
                    'SERVER_NAME' => 'localhost',
                    'SERVER_PORT' => '80',
                ]);
            }
            return Request::capture();
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
