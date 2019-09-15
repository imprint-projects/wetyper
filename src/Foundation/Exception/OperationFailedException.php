<?php

namespace WeTyper\Foundation\Exception;

use Throwable;

class OperationFailedException extends WeTyperException
{
    /**
     * The operation name.
     *
     * @var string
     */
    protected $operation;

    /**
     * Create a operation failed exception.
     *
     * @param string $message
     * @param \Throwable $previous
     */
    public function __construct($message, Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }

    /**
     * Get the operation name.
     *
     * @return string
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set the operation name.
     *
     * @param string $operation
     * @return $this
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;

        return $this;
    }
}
