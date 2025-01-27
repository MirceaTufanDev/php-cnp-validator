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
        $this->expectExceptionMessage('County code in CNP is invalid.');

        $rule = new CountyValidator($this->mockLogger);
        $rule->validate('1234567899999');
    }
}
