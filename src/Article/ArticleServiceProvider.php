<?php

namespace WeTyper\Article;

use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(ArticleServiceInterface::class, ArticleService::class);
    }
}
