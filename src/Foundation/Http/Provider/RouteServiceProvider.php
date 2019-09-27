<?php

namespace WeTyper\Foundation\Http\Provider;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The controller namespace for the application.
     *
     * @var string|null
     */
    protected $namespace = 'WeTyper\Http\Controller';

    /**
     * @inheritDoc
     */
    protected function loadRoutes()
    {
        parent::loadRoutes();

        $this->mapContentRoutes();

        $this->mapMemberRoutes();

        $this->mapAdminRoutes();
    }

    /**
     * Define the routes for the application.
     */
    protected function mapContentRoutes(): void
    {
        Route::namespace($this->namespace)
            ->group($this->app->routePath('content.php'));
    }

    /**
     * Define the routes for the application.
     */
    protected function mapMemberRoutes(): void
    {
        Route::namespace($this->namespace)
            ->group($this->app->routePath('member.php'));
    }

    /**
     * Define the routes for the application.
     */
    protected function mapAdminRoutes(): void
    {
        $prefix = config('app.admin_prefix', 'admin');

        Route::namespace($this->namespace)
            ->prefix($prefix)
            ->group($this->app->routePath('admin.php'));
    }
}
