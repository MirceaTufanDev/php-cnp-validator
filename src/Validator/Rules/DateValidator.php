<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Exceptions\ErrorMessages;

class DateValidator extends AbstractRule
{
    public function validate(string $value): void
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

        if ($century === null || !checkdate($month, $day, $century + $year)) {
            $this->logError("DateValidator failed: Invalid date components in CNP.", [
                'value' => $value,
                'yearCode' => $yearCode,
                'year' => $year,
                'month' => $month,
                'day' => $day,
            ]);
            throw new CustomValidationExeption(ErrorMessages::DATE_ERROR);
        }
    }
}
