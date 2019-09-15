<?php

namespace WeTyper\Tag;

use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(TagServiceInterface::class, TagService::class);
    }
}
