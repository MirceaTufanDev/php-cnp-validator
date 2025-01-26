<?php

namespace Phpvalidator\Exceptions;

use Exception;

class CustomValidationExeption extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
