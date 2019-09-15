<?php

namespace WeTyper\Foundation\Exception;

use Throwable;

class PermissionDeniedException extends WeTyperException
{
    /**
     * All required but lost permissions.
     *
     * @var array
     */
    protected $permissions;

    /**
     * Create a permission denied exception.
     *
     * @param string $message
     * @param array $permissions
     * @param \Throwable $previous
     */
    public function __construct($message = 'Permission Denied', array $permissions = [], Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);

        $this->permissions = $permissions;
    }

    /**
     * Get all lost permissions.
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Set the lost permissions.
     *
     * @param array $permissions
     * @return $this
     */
    public function setPermissions(array $permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }
}
