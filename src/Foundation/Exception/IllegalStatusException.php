<?php

namespace WeTyper\Foundation\Exception;

use Throwable;

class IllegalStatusException extends WeTyperException
{
    /**
     * Current status.
     *
     * @var int
     */
    protected $status;

    /**
     * Create an illegal status exception.
     *
     * @param string $message
     * @param int $status
     * @param \Throwable $previous
     */
    public function __construct($message, $status = 0, Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);

        $this->status = $status;
    }

    /**
     * Get current status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set current status.
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
