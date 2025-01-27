<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Exceptions\ErrorMessages;

class LengthValidator extends AbstractRule
{
    public function validate(string $value): void
    {
        if (strlen($value) !== 13) {
            $this->logError("LengthValidator failed: CNP does not have exactly 13 characters.", ['value' => $value]);
            throw new CustomValidationExeption(ErrorMessages::LENGTH_ERROR);
        }
    }
}
