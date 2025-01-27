<?php

namespace Phpvalidator\Validator\Rules;

class NumericValidator extends AbstractValidator
{
    protected function isValid(string $value): bool
    {
        return ctype_digit($value);
    }

    protected function getErrorMessage(string $value): string
    {
        return sprintf("NumericValidator failed: CNP '%s' contains non-numeric characters.", $value);
    }
}
