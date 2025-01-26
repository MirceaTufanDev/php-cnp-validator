<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\ErrorMessages;
use Phpvalidator\Validator\Interfaces\RuleInterface;
use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Translations\Translations;
use Phpvalidator\Logger\Logger;

class LengthValidator implements RuleInterface
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
        if (strlen($value) !== 13) {
            if ($logger) {
                $logger->log("LengthValidator failed: '$value' does not have exactly 13 characters.");
            }
            throw new CustomValidationExeption(ErrorMessages::LENGTH_ERROR);
        }
        return true;
    }
}
