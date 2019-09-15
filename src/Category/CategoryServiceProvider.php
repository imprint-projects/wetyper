<?php

namespace WeTyper\Category;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
    }
}
