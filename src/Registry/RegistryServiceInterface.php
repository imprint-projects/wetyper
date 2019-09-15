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
     *
     * @return array
     */
    public function putRegistration(string $module, string $key, $value): array;

    /**
     * Put all given registrations into the registry.
     *
     * @param string $module
     * @param array $registrations
     *
     * @return array
     */
    public function putRegistrations(string $module, array $registrations): array;

    /**
     * Get a registration based on the key.
     *
     * @param string $module
     * @param string $key
     *
     * @return mixed
     */
    public function getRegistration(string $module, string $key);

    /**
     * Get all associated registrations based on the given key.
     *
     * @param string $module
     * @param array $keys
     *
     * @return array
     */
    public function getRegistrations(string $module, array $keys): array;

    /**
     * Remove the specified registration from the registry.
     *
     * @param string $module
     * @param string $key
     *
     * @return bool
     */
    public function removeRegistration(string $module, string $key): bool;

    /**
     * Remove all given registrations.
     *
     * @param string $module
     * @param array $keys
     *
     * @return bool
     */
    public function removeRegistrations(string $module, array $keys): bool;
}
