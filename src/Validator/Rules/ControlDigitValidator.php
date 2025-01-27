<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Exceptions\ErrorMessages;

class ControlDigitValidator extends AbstractRule
{
    private const WEIGHTS = [2, 7, 9, 1, 4, 6, 3, 5, 8, 2, 7, 9];

    public function validate(string $value): void
    {
        $controlDigit = $this->calculateControlDigit($value);

        if (!$this->isControlDigitValid($value, $controlDigit)) {
            $this->logError(
                "ControlDigitValidator failed: Control digit mismatch.",
                ['value' => $value, 'expected' => $controlDigit, 'actual' => $value[12]]
            );
            throw new CustomValidationExeption(ErrorMessages::CONTROL_DIGIT_ERROR);
        }
    }

    private function calculateControlDigit(string $value): int
    {
        $controlSum = 0;

        for ($i = 0; $i < 12; $i++) {
            $controlSum += $value[$i] * self::WEIGHTS[$i];
        }

        $controlDigit = $controlSum % 11;

        return $controlDigit === 10 ? 1 : $controlDigit;
    }

    private function isControlDigitValid(string $value, int $controlDigit): bool
    {
        return (int)$value[12] === $controlDigit;
    }
}
