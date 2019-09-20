<?php

namespace WeTyper\Registry;

interface RegistryServiceInterface
{
    /**
     * Put a registration into the registry.
     *
     * @param string $module
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public function putRegistration(string $module, string $key, $value): bool;

    /**
     * Get a registration based on the key.
     *
     * @param string $module
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getRegistration(string $module, string $key, $default = null);

    /**
     * Remove the specified registration from the registry.
     *
     * @param string $module
     * @param string $key
     * @return bool
     */
    public function removeRegistration(string $module, string $key): bool;
}
