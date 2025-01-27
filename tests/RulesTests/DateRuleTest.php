<?php

use Phpvalidator\Validator\Rules\DateValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Tests\BaseTestCase;

class DateRuleTest extends BaseTestCase
{
    public function testInvalidDate(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage(
            "DateValidator failed: Invalid date components in CNP '5999999999999'."
        );

        $rule = new DateValidator($this->mockLogger);
        $rule->validate('5999999999999');
    }
}
