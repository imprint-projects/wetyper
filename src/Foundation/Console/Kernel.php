<?php

namespace WeTyper\Foundation\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Bootstrap\BootProviders;
use Illuminate\Foundation\Bootstrap\HandleExceptions;
use Illuminate\Foundation\Bootstrap\RegisterFacades;
use Illuminate\Foundation\Bootstrap\RegisterProviders;
use Illuminate\Foundation\Bootstrap\SetRequestForConsole;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use WeTyper\Console\Command\ManageCommand;
use WeTyper\Foundation\Bootstrap\LoadConfiguration;
use Illuminate\Console\Application as Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * The bootstrap classes for the application.
     *
     * @var array
     */
    protected $bootstrappers = [
        LoadConfiguration::class,
        HandleExceptions::class,
        RegisterFacades::class,
        SetRequestForConsole::class,
        RegisterProviders::class,
        BootProviders::class,
    ];

    /**
     * The Artisan commands provided by the application.
     *
     * @var array
     */
    protected $commands = [
        ManageCommand::class,
    ];

    /**
     * @inheritDoc
     */
    protected function schedule(Schedule $schedule)
    {
        //
    }

    /**
     * Get the Artisan application instance.
     *
     * @return \Illuminate\Console\Application
     */
    protected function getArtisan()
    {
        if ($this->artisan !== null) {
            return $this->artisan;
        }

        $artisan = new Artisan($this->app, $this->events, $this->app->version());
        $artisan->setName('WeTyper');
        $artisan->resolveCommands($this->commands);

        return $this->artisan = $artisan;
    }
}
