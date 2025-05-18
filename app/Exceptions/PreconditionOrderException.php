<?php

namespace App\Exceptions;

use Exception;

class PreconditionOrderException extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}
