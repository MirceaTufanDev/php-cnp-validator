<?php

use PHPUnit\Framework\TestCase;
use Phpvalidator\Validator\Rules\LengthValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;

class LengthRuleTest extends TestCase
{
    /**
     * @throws CustomValidationExeption
     */
    public function testValidLength(): void
    {
        $rule = new LengthValidator();
        $this->assertTrue($rule->validate('1234567890123'));
    }

    public function testInvalidLength(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('CNP must have exactly 13 characters.');

        $rule = new LengthValidator('en');
        $rule->validate('12345678');
    }
}
