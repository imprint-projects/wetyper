<?php

namespace WeTyper\Foundation\Http;

use Illuminate\Foundation\Bootstrap\BootProviders;
use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Foundation\Bootstrap\RegisterFacades;
use Illuminate\Foundation\Bootstrap\RegisterProviders;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use WeTyper\Foundation\Bootstrap\LoadConfiguration;

class Kernel extends HttpKernel
{
    /**
     * The bootstrap classes for the application.
     *
     * @var array
     */
    protected $bootstrappers = [
        LoadConfiguration::class,
        HandleExceptions::class,
        RegisterFacades::class,
        RegisterProviders::class,
        BootProviders::class,
    ];

    /**
     * The application's middleware stack.
     *
     * @var array
     */
    protected $middleware = [];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [];
}
