<?php

namespace WeTyper\Photo;

use Illuminate\Support\ServiceProvider;

class PhotoServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(PhotoServiceInterface::class, PhotoService::class);
    }
}
