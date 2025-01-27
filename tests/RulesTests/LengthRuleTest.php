<?php

namespace Phpvalidator\Tests\Rules;

use Phpvalidator\Tests\BaseTestCase;
use Phpvalidator\Validator\Rules\LengthValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;

class LengthRuleTest extends BaseTestCase
{
    public function testInvalidLength(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('CNP must have exactly 13 characters.');

        $rule = new LengthValidator($this->mockLogger);
        $rule->validate('12345678');
    }
}
