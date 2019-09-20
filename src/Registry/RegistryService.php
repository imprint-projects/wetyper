<?php

namespace WeTyper\Registry;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Throwable;
use WeTyper\Registry\Model\Registration;

class RegistryService implements RegistryServiceInterface
{
    /**
     * Default registration cache time.
     */
    protected const CACHE_TIME = 600;

    /**
     * Put a registration into the registry.
     *
     * @param string $module
     * @param string $key
     * @param mixed $value
     *
     * @return bool
     */
    public function putRegistration(string $module, string $key, $value): bool
    {
        DB::beginTransaction();

        try {
            $registration = Registration::query()
                ->select(['module', 'key'])
                ->firstOrCreate([
                    'module' => $module,
                    'key'    => $key
                ]);

            $registration['value'] = $value;

            Cache::put("{$key}:{$module}", $value, static::CACHE_TIME);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            throw $e;
        }

        return true;
    }

    /**
     * Get a registration based on the key.
     *
     * @param string $module
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getRegistration(string $module, string $key, $default = null)
    {
        $value = Cache::remember("{$module}:{$key}", static::CACHE_TIME, function () use ($module, $key) {
            $registration = Registration::query()
                ->where('module', $module)
                ->where('key', $key)
                ->get(['value']);

            return $registration ? $registration['value'] : null;
        });

        return $value ?? $default;
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
        DB::beginTransaction();

        try {
            Registration::query()
                ->where('module', $module)
                ->where('key', $key)
                ->delete();

            Cache::forget("{$key}:{$module}");

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            throw $e;
        }

        return true;
    }
}
