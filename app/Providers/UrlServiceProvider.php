<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Contracts\Routing\UrlGenerator as UrlGeneratorContract;

class UrlServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Force override the URL generator registration
        $this->app->bind('url', function ($app) {
            $routes = $app['router']->getRoutes();
            $app->instance('routes', $routes);

            // Create a proper request instance for CLI context
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
            
            return new UrlGenerator(
                $routes,
                $request,
                $app['config']['app.asset_url']
            );
        });

        // Also register the contract
        $this->app->bind(UrlGeneratorContract::class, function ($app) {
            return $app['url'];
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
