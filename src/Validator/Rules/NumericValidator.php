<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\ErrorMessages;
use Phpvalidator\Validator\Interfaces\RuleInterface;
use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Translations\Translations;
use Phpvalidator\Logger\Logger;

class NumericValidator implements RuleInterface
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
        if (!ctype_digit($value)) {
            if ($logger) {
                $logger->log("NumericValidator failed: '$value' contains non-numeric characters.");
            }
            throw new CustomValidationExeption(ErrorMessages::NUMERIC_ERROR);
        }
        return true;
    }
}
