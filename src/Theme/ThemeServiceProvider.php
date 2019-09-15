<?php

namespace WeTyper\Theme;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(ThemeServiceInterface::class, ThemeService::class);
    }
}
