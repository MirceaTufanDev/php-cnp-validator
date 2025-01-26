<?php

use PHPUnit\Framework\TestCase;
use Phpvalidator\Validator\Rules\CountyValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;

class CountyRuleTest extends TestCase
{
    /**
     * @throws CustomValidationExeption
     */
    public function testValidCounty(): void
    {
        $rule = new CountyValidator();
        $this->assertTrue($rule->validate('1970618394432'));
    }

    public function testInvalidCounty(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('County code in CNP is invalid.');

        $rule = new CountyValidator('en');
        $rule->validate('1960997990018');
    }
}
