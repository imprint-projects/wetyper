<?php

namespace WeTyper\Foundation\Exception;

use Throwable;

class ResourceNotFoundException extends WeTyperException
{
    /**
     * The name of the resource.
     *
     * @var string
     */
    protected $resource;

    /**
     * Create a resource not found exception.
     *
     * @param string $message
     * @param \Throwable $previous
     */
    public function __construct($message, Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }

    /**
     * Get the name of the resource.
     *
     * @return string
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set the name of the resource.
     *
     * @param string $resource
     * @return $this
     */
    public function setResource($resource)
    {
        $this->resource = $resource;

        return $this;
    }
}
