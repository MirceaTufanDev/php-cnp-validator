<?php

namespace Phpvalidator\Validator\Rules;

class ControlDigitValidator extends AbstractValidator
{
    private const WEIGHTS = [2, 7, 9, 1, 4, 6, 3, 5, 8, 2, 7, 9];

    protected function isValid(string $value): bool
    {
        $controlDigit = $this->calculateControlDigit($value);
        return (int)$value[12] === $controlDigit;
    }

    protected function getErrorMessage(string $value): string
    {
        $controlDigit = $this->calculateControlDigit($value);
        return sprintf(
            "ControlDigitValidator failed: Control digit mismatch. Expected '%d', got '%s' in CNP '%s'.",
            $controlDigit,
            $value[12],
            $value
        );
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
}
