<?php

namespace Phpvalidator\Validator\Rules;

class DateValidator extends AbstractValidator
{
    protected function isValid(string $value): bool
    {
        $yearCode = (int)substr($value, 0, 1);
        $year = (int)substr($value, 1, 2);
        $month = (int)substr($value, 3, 2);
        $day = (int)substr($value, 5, 2);

        $century = match ($yearCode) {
            1, 2, 7, 8, 9 => 1900,
            3, 4 => 1800,
            5, 6 => 2000,
            default => null,
        };

        return $century !== null && checkdate($month, $day, $century + $year);
    }

    protected function getErrorMessage(string $value): string
    {
        return sprintf("DateValidator failed: Invalid date components in CNP '%s'.", $value);
    }
}
