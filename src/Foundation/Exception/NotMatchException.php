<?php

namespace WeTyper\Foundation\Exception;

use Throwable;

class NotMatchException extends WeTyperException
{
    /**
     * Create a data not match exception.
     *
     * @param string $message
     * @param \Throwable $previous
     */
    public function __construct($message, Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
