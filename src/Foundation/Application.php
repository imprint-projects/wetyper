<?php

namespace WeTyper\Foundation;

use Illuminate\Foundation\Application as BaseApplication;

class Application extends BaseApplication
{
    /**
     * The WeTyper version.
     *
     * @var string
     */
    const VERSION = '1.0.0';


    /**
     * Get the version number of the application.
     *
     * @return string
     */
    public function version()
    {
        return static::VERSION;
    }
}
