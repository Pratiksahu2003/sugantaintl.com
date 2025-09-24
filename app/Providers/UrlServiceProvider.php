<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

class UrlServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Override the URL generator registration to handle null request
        $this->app->singleton('url', function ($app) {
            $routes = $app['router']->getRoutes();
            $app->instance('routes', $routes);

            // Ensure we have a valid request
            $request = $app->bound('request') ? $app['request'] : null;
            
            // If no request is bound, create one for CLI context
            if (!$request) {
                if (php_sapi_name() === 'cli') {
                    $request = Request::create('/', 'GET', [], [], [], [
                        'REQUEST_METHOD' => 'GET',
                        'REQUEST_URI' => '/',
                        'HTTP_HOST' => 'localhost',
                        'SERVER_NAME' => 'localhost',
                        'SERVER_PORT' => '80',
                    ]);
                } else {
                    $request = Request::capture();
                }
            }
            
            return new UrlGenerator(
                $routes,
                $request,
                $app['config']['app.asset_url']
            );
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
