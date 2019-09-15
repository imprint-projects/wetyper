<?php

namespace WeTyper\Member;

use Illuminate\Support\ServiceProvider;

class MemberServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        parent::register();

        $this->app->singleton(MemberServiceInterface::class, MemberService::class);
    }
}
