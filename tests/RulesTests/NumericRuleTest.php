<?php

namespace Phpvalidator\Tests\Rules;

use Phpvalidator\Tests\BaseTestCase;
use Phpvalidator\Validator\Rules\NumericValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;

class NumericRuleTest extends BaseTestCase
{
    public function testInvalidNumeric(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage(
            "NumericValidator failed: CNP '1234abc890123' contains non-numeric characters."
        );

        $rule = new NumericValidator($this->mockLogger);
        $rule->validate('1234abc890123');
    }
}
