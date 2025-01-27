<?php

use Phpvalidator\Validator\Rules\ControlDigitValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Tests\BaseTestCase;

class ControlDigitRuleTest extends BaseTestCase
{
    public function testInvalidControlDigit(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage(
            "ControlDigitValidator failed: Control digit mismatch. Expected '2', got '3' in CNP '1970618394433'."
        );

        $rule = new ControlDigitValidator($this->mockLogger);
        $rule->validate('1970618394433');
    }
}
