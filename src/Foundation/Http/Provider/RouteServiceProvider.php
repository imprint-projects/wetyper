<?php

namespace WeTyper\Foundation\Http\Provider;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->registerWebRoutes();
        $this->registerApiRoutes();
        $this->registerConsoleRoutes();
    }

    /**
     * Register the "web" routes for the application.
     */
    protected function registerWebRoutes()
    {
        Route::middleware('web')
            ->namespace('WeTyper\Http\Controller')
            ->group($this->app->corePath('routes/web.php'));
    }

    /**
     * Register the "api" routes for the application.
     */
    protected function registerApiRoutes()
    {
        Route::middleware('api')
            ->namespace('WeTyper\Http\Controller\Api')
            ->group($this->app->corePath('routes/api.php'));
    }

    /**
     * Register the "console" routes for the application.
     */
    protected function registerConsoleRoutes()
    {
        Route::middleware('api')
            ->namespace('WeTyper\Http\Controller\Console')
            ->group($this->app->corePath('routes/console.php'));
    }
}
