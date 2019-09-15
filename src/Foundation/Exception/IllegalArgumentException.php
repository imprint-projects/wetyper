<?php

namespace WeTyper\Foundation\Exception;

use Throwable;

class IllegalArgumentException extends WeTyperException
{
    /**
     * The name of the argument.
     *
     * @var string
     */
    protected $argument;

    /**
     * Create an illegal argument exception.
     *
     * @param string $message
     * @param string $argument
     * @param \Throwable $previous
     */
    public function __construct($message, $argument = null, Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);

        $this->argument = $argument;
    }

    /**
     * Get the argument's name.
     *
     * @return string
     */
    public function getArgument()
    {
        return $this->argument;
    }

    /**
     * Set the name of the argument.
     *
     * @param string $argument
     * @return $this
     */
    public function setArgument($argument)
    {
        $this->argument = $argument;

        return $this;
    }
}
