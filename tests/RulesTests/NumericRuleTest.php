<?php

use PHPUnit\Framework\TestCase;
use Phpvalidator\Validator\Rules\NumericValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;

class NumericRuleTest extends TestCase
{
    /**
     * @throws CustomValidationExeption
     */
    public function testValidNumeric(): void
    {
        $rule = new NumericValidator();
        $this->assertTrue($rule->validate('1234567890123'));
    }

    public function testInvalidNumeric(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('CNP must contain only numeric characters.');

        $rule = new NumericValidator('en');
        $rule->validate('12345A7890123');
    }
}
