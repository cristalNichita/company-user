<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class AdminNotFoundException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
