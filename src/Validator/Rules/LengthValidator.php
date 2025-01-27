<?php

namespace Phpvalidator\Validator\Rules;

class LengthValidator extends AbstractValidator
{
    private const REQUIRED_LENGTH = 13;

    protected function isValid(string $value): bool
    {
        return strlen($value) === self::REQUIRED_LENGTH;
    }

    protected function getErrorMessage(string $value): string
    {
        return sprintf(
            "LengthValidator failed: CNP '%s' must have exactly %d characters.",
            $value,
            self::REQUIRED_LENGTH
        );
    }
}
