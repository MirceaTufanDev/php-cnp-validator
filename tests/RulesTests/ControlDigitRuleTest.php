<?php

use Phpvalidator\Validator\Rules\ControlDigitValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Tests\BaseTestCase;

class ControlDigitRuleTest extends BaseTestCase
{
    public function testInvalidControlDigit(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('Control digit in CNP is invalid.');

        $rule = new ControlDigitValidator($this->mockLogger);
        $rule->validate('1970618394433');
    }
}
