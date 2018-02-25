<?php

class DatabaseException extends Exception
{
    public function __construct($message = "Database error!", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}