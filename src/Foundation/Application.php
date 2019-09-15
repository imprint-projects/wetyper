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
     * The base path for the WeTyper framework.
     *
     * @var string
     */
    protected $corePath;

    /**
     * The application namespace.
     *
     * @var string
     */
    protected $namespace = 'WeTyper';

    /**
     * Create a new WeTyper application instance.
     *
     * @param string $corePath
     * @param string $basePath
     */
    public function __construct(string $corePath, string $basePath = null)
    {
        $this->corePath = realpath($corePath);

        parent::__construct($basePath);
    }

    /**
     * @inheritDoc
     */
    public function version()
    {
        return static::VERSION.' (Laravel '.parent::VERSION.')';
    }

    /**
     * Get the base path of the WeTyper core directory.
     *
     * @param string $path Optionally, a path to append to the base path
     * @return string
     */
    public function corePath($path = '')
    {
        return $this->corePath.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * @inheritDoc
     */
    public function configPath($path = '')
    {
        return $this->corePath.DIRECTORY_SEPARATOR.'config'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * @inheritDoc
     */
    public function databasePath($path = '')
    {
        return ($this->databasePath ?: $this->corePath.DIRECTORY_SEPARATOR.'database').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * @inheritDoc
     */
    public function registerCoreContainerAliases()
    {
        parent::registerCoreContainerAliases();

        $this->alias('app', self::class);
    }

    /**
     * @inheritDoc
     */
    public function getCachedServicesPath()
    {
        return $this->storagePath().'/framework/bootstrap/services.php';
    }

    /**
     * @inheritDoc
     */
    public function getCachedPackagesPath()
    {
        return $this->storagePath().'/framework/bootstrap/packages.php';
    }

    /**
     * @inheritDoc
     */
    public function getCachedConfigPath()
    {
        return $this->storagePath().'/framework/bootstrap/config.php';
    }

    /**
     * @inheritDoc
     */
    public function getCachedRoutesPath()
    {
        return $this->storagePath().'/framework/bootstrap/routes.php';
    }

    /**
     * @inheritDoc
     */
    public function getCachedEventsPath()
    {
        return $this->storagePath().'/framework/bootstrap/events.php';
    }
}
