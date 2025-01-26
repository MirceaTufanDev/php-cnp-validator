<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\ErrorMessages;
use Phpvalidator\Validator\Interfaces\RuleInterface;
use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Translations\Translations;
use Phpvalidator\Logger\Logger;

class ControlDigitValidator implements RuleInterface
{
    private array $weights = [2, 7, 9, 1, 4, 6, 3, 5, 8, 2, 7, 9];
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
        $controlDigit = $this->calculateControlDigit($value);

        if (!$this->isControlDigitValid($value, $controlDigit)) {
            $this->logError($logger, $value);
            throw new CustomValidationExeption(ErrorMessages::CONTROL_DIGIT_ERROR);
        }

        return true;
    }

    private function calculateControlDigit(string $value): int
    {
        $controlSum = 0;

        for ($i = 0; $i < 12; $i++) {
            $controlSum += $value[$i] * $this->weights[$i];
        }

        $controlDigit = $controlSum % 11;

        return $controlDigit === 10 ? 1 : $controlDigit;
    }

    private function isControlDigitValid(string $value, int $controlDigit): bool
    {
        return (int)$value[12] === $controlDigit;
    }

    private function logError(?Logger $logger, string $value): void
    {
        if ($logger) {
            $logger->log("ControlDigitValidator failed: Control digit mismatch in '$value'.");
        }
    }
}
