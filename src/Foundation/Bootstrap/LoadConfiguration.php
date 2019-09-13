<?php

namespace WeTyper\Foundation\Bootstrap;

use Closure;
use Illuminate\Contracts\Config\Repository as RepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\LoadConfiguration as BaseLoadConfiguration;
use Symfony\Component\Finder\Finder;

class LoadConfiguration extends BaseLoadConfiguration
{
    /**
     * @inheritDoc
     */
    protected function loadConfigurationFiles(Application $app, RepositoryContract $repository)
    {
        parent::loadConfigurationFiles($app, $repository);

        $this->loadEnvironmentConfigurations($app, $repository);
    }

    /**
     * Load the environment configuration items.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @param \Illuminate\Contracts\Config\Repository $repository
     */
    public function loadEnvironmentConfigurations(Application $app, RepositoryContract $repository): void
    {
        $configPath = realpath($app->basePath('config'));

        $files = $this->getConfigurationFilesInPath($configPath);

        foreach ($files as $scope => $path) {
            $items = require $path;

            foreach ($items as $key => $value) {
                $key = "{$scope}.{$key}";

                // We can use a Closure as the value, and it will be called with
                // the default configuration item. It useful for replace configurations
                // defined as array or other complex form.
                if ($value instanceof Closure) {
                    $value = $value($repository->get($key), $app);
                }

                // We can specify a deep-level configuration item using the dot in key,
                // and just to change the item.
                $repository->set($key, $value);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getConfigurationFiles(Application $app)
    {
        $configPath = realpath($app->configPath());

        return $this->getConfigurationFilesInPath($configPath);
    }

    /**
     * Get all of the configuration files in the given directory.
     *
     * @param string $configPath
     *
     * @return array
     */
    protected function getConfigurationFilesInPath(string $configPath): array
    {
        $files = [];

        if (! is_dir($configPath)) {
            return $files;
        }

        foreach (Finder::create()->files()->name('*.php')->in($configPath) as $file) {
            $directory = $this->getNestedDirectory($file, $configPath);

            $files[$directory.$file->getBasename('.php')] = $file->getRealPath();
        }

        ksort($files, SORT_NATURAL);

        return $files;
    }
}
