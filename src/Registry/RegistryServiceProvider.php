<?php

namespace WeTyper\Registry;

use Illuminate\Support\ServiceProvider;

class RegistryServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(RegistryServiceInterface::class, RegistryService::class);
    }
}
