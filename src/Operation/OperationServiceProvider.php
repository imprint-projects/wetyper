<?php

namespace WeTyper\Operation;

use Illuminate\Support\ServiceProvider;

class OperationServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(OperationServiceInterface::class, OperationService::class);
    }
}
