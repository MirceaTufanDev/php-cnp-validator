<?php

use PHPUnit\Framework\TestCase;
use Phpvalidator\Validator\Rules\DateValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;

class DateRuleTest extends TestCase
{
    /**
     * @throws CustomValidationExeption
     */
    public function testValidDate(): void
    {
        $rule = new DateValidator();
        $this->assertTrue($rule->validate('1960917400018')); // Data validă
    }

    public function testInvalidDate(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('Date components in CNP are invalid.');

        $rule = new DateValidator('en');
        $rule->validate('1961327400018'); // Lună invalidă (32)
    }
}
