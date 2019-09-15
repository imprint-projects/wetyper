<?php

namespace WeTyper\Registry;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Throwable;
use WeTyper\Registry\Model\Registration;

class RegistryService implements RegistryServiceInterface
{
    /**
     * The cache driver.
     *
     * @var \Illuminate\Contracts\Cache\Store
     */
    protected $cache;

    /**
     * Create a registry service.
     *
     * @param \Illuminate\Contracts\Cache\Store $cache
     */
    public function __construct(Store $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Put a registration into the registry.
     *
     * @param string $module
     * @param string $key
     * @param mixed $value
     *
     * @return array
     */
    public function putRegistration(string $module, string $key, $value): array
    {
        DB::beginTransaction();

        try {
            $registration = Registration::query()
                ->firstOrCreate([
                    'module' => $module,
                    'key'    => $key
                ]);

            $registration['value'] = $value;


            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            throw $e;
        }


    }

    /**
     * Put all given registrations into the registry.
     *
     * @param string $module
     * @param array $registrations
     *
     * @return array
     */
    public function putRegistrations(string $module, array $registrations): array
    {
        // TODO: Implement putRegistrations() method.
    }

    /**
     * Get a registration based on the key.
     *
     * @param string $module
     * @param string $key
     *
     * @return mixed
     */
    public function getRegistration(string $module, string $key)
    {
        // TODO: Implement getRegistration() method.
    }

    /**
     * Get all associated registrations based on the given key.
     *
     * @param string $module
     * @param array $keys
     *
     * @return array
     */
    public function getRegistrations(string $module, array $keys): array
    {
        // TODO: Implement getRegistrations() method.
    }

    /**
     * Remove the specified registration from the registry.
     *
     * @param string $module
     * @param string $key
     *
     * @return bool
     */
    public function removeRegistration(string $module, string $key): bool
    {
        // TODO: Implement removeRegistration() method.
    }

    /**
     * Remove all given registrations.
     *
     * @param string $module
     * @param array $keys
     *
     * @return bool
     */
    public function removeRegistrations(string $module, array $keys): bool
    {
        // TODO: Implement removeRegistrations() method.
    }
}
