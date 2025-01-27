<?php

namespace Phpvalidator\Tests\Rules;

use Phpvalidator\Tests\BaseTestCase;
use Phpvalidator\Validator\Rules\CountyValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;

class CountyRuleTest extends BaseTestCase
{
    public function testInvalidCounty(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage(
            "CountyValidator failed: Invalid county code '89' in CNP '1234567899999'."
        );

        $rule = new CountyValidator($this->mockLogger);
        $rule->validate('1234567899999'); // Example with invalid county code
    }
}
