<?php

namespace WeTyper\Issue;

use Illuminate\Support\ServiceProvider;

class IssueServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(IssueServiceInterface::class, IssueService::class);
    }
}
