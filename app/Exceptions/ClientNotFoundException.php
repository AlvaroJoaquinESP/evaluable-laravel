<?php

namespace App\Exceptions;

use Exception;

class ClientNotFoundException extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}
