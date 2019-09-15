<?php

namespace WeTyper\Album;

use Illuminate\Support\ServiceProvider;

class AlbumServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(AlbumServiceInterface::class, AlbumService::class);
    }
}
