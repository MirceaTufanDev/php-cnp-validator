<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\ErrorMessages;
use Phpvalidator\Validator\Interfaces\RuleInterface;
use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Logger\Logger;

class DateValidator implements RuleInterface
{
    private string $lang;

    public function __construct(string $lang = 'en')
    {
        $this->lang = $lang;
    }

    /**
     * @throws CustomValidationExeption
     */
    public function validate(string $value, ?Logger $logger = null): bool
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
            if ($logger) {
                $logger->log("DateValidator failed: Date components from '$value' are invalid.");
            }
            throw new CustomValidationExeption(ErrorMessages::DATE_ERROR);
        }
        return true;
    }
}
