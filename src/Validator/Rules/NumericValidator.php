<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Exceptions\ErrorMessages;

class NumericValidator extends AbstractRule
{
    public function validate(string $value): void
    {
        if (!ctype_digit($value)) {
            $this->logError("NumericValidator failed: CNP contains non-numeric characters.", ['value' => $value]);
            throw new CustomValidationExeption(ErrorMessages::NUMERIC_ERROR);
        }
    }
}
