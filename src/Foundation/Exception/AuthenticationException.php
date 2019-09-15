<?php

namespace WeTyper\Foundation\Exception;

use Throwable;

class AuthenticationException extends WeTyperException
{
    /**
     * Create an authentication exception.
     *
     * @param string $message
     * @param \Throwable $previous
     */
    public function __construct($message = 'Unauthenticated', Throwable $previous = null)
    {
        parent::__construct($message, 401, $previous);
    }
}
