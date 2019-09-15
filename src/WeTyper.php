<?php

namespace WeTyper;

use Illuminate\Contracts\Console\Kernel as ConsoleKernelContract;
use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandlerContract;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\Http\Kernel as HttpKernelContract;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use WeTyper\Foundation\Application;
use WeTyper\Foundation\Console\Kernel as ConsoleKernel;
use WeTyper\Foundation\Exception\Handler as ExceptionHandler;
use WeTyper\Foundation\Http\Kernel as HttpKernel;

final class WeTyper
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Create a WeTyper instance.
     *
     * @param string $basePath
     * @return \WeTyper\WeTyper
     */
    public static function create(string $basePath): WeTyper
    {
        return new static($basePath);
    }

    /**
     * Create a WeTyper instance.
     *
     * @param string $basePath
     */
    protected function __construct(string $basePath)
    {
        $this->app = $this->createApplication($basePath);
    }

    /**
     * Create an application instance.
     *
     * @param string $basePath
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function createApplication(string $basePath): ApplicationContract
    {
        $app = new Application(__DIR__.'/..', $basePath);

        $this->registerBaseBindings($app);

        return $app;
    }

    /**
     * Register all basic bindings into the application.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    protected function registerBaseBindings(ApplicationContract $app): void
    {
        $app->singleton(HttpKernelContract::class, HttpKernel::class);
        $app->singleton(ConsoleKernelContract::class, ConsoleKernel::class);
        $app->singleton(ExceptionHandlerContract::class, ExceptionHandler::class);
    }

    /**
     * Get the related application instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function getApp(): ApplicationContract
    {
        return $this->app;
    }

    /**
     * Handle HTTP request.
     *
     * @param \Symfony\Component\HttpFoundation\Request|null $request
     * @return int
     */
    public function handleRequest(?SymfonyRequest $request = null): int
    {
        $kernel = static::createHttpKernel();

        $response = $kernel->handle(
            $request = $request ?? Request::capture()
        );

        $response->send();

        $kernel->terminate($request, $response);

        return $response->getStatusCode();
    }

    /**
     * Create a HTTP kernel for handle requests.
     *
     * @return \Illuminate\Contracts\Http\Kernel
     */
    protected function createHttpKernel(): HttpKernelContract
    {
        return $this->app->make(HttpKernelContract::class);
    }

    /**
     * Handle console input.
     *
     * @param \Symfony\Component\Console\Input\InputInterface|null $input
     * @param \Symfony\Component\Console\Output\OutputInterface|null $output
     * @return int
     */
    public function handleInput(?InputInterface $input = null, ?OutputInterface $output = null): int
    {
        $kernel = $this->createConsoleKernel();

        $status = $kernel->handle(
            $input = $input ?? new ArgvInput,
            $output ?? new ConsoleOutput
        );

        $kernel->terminate($input, $status);

        return $status;
    }

    /**
     * Create a console kernel to run commands.
     *
     * @return \Illuminate\Contracts\Console\Kernel
     */
    protected function createConsoleKernel(): ConsoleKernelContract
    {
        return $this->app->make(ConsoleKernelContract::class);
    }
}
