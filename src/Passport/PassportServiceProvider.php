<?php

namespace WeTyper\Passport;

use Illuminate\Support\ServiceProvider;

class PassportServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(PassportServiceInterface::class, PassportService::class);
    }
}
