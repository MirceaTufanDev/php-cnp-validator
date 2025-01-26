<?php

use PHPUnit\Framework\TestCase;
use Phpvalidator\Validator\Rules\ControlDigitValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;

class ControlDigitRuleTest extends TestCase
{
    /**
     * @throws CustomValidationExeption
     */
    public function testValidControlDigit(): void
    {
        $rule = new ControlDigitValidator();
        $this->assertTrue($rule->validate('1970618394432'));
    }

    public function testInvalidControlDigit(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('Control digit in CNP is invalid.');

        $rule = new ControlDigitValidator('en');
        $rule->validate('1960917400019');
    }
}
