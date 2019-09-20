<?php

namespace WeTyper\Foundation\Http\Provider;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use SplFileInfo;
use Symfony\Component\Finder\Finder;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes.
     *
     * @var string
     */
    protected $namespace = 'WeTyper\Http\Controller';

    /**
     * @inheritDoc
     */
    protected function loadRoutes()
    {
        $this->registerRoutes();
    }

    /**
     * Register the routes for the application.
     */
    protected function registerRoutes()
    {
        $files = $this->getRouteFilesInPath($this->app->corePath('routes'));

        foreach ($files as $file) {
            Route::namespace($this->namespace)
                ->prefix($file['prefix'])
                ->group($file['path']);
        }
    }

    /**
     * Get all of the route files in the given directory.
     *
     * @param string $routePath
     * @return array
     */
    protected function getRouteFilesInPath(string $routePath): array
    {
        $files = [];

        if (! is_dir($routePath)) {
            return $files;
        }

        foreach (Finder::create()->files()->name('*.php')->in($routePath) as $file) {
            $files[] = [
                'prefix' => $this->getNestedDirectory($file, $routePath),
                'path'   => $file->getRealPath(),
            ];
        }

        return $files;
    }

    /**
     * Get the route file nesting path.
     *
     * @param \SplFileInfo $file
     * @param string $routePath
     * @return string
     */
    protected function getNestedDirectory(SplFileInfo $file, string $routePath): string
    {
        $directory = $file->getPath();

        if ($nested = trim(str_replace($routePath, '', $directory), DIRECTORY_SEPARATOR)) {
            $nested = str_replace(DIRECTORY_SEPARATOR, '/', $nested);
        }

        return $nested;
    }
}
