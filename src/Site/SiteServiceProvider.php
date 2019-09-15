<?php

namespace WeTyper\Site;

use Illuminate\Support\ServiceProvider;

class SiteServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(SiteServiceInterface::class, SiteService::class);
    }
}
