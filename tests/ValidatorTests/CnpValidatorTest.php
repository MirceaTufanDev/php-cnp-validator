<?php

use PHPUnit\Framework\TestCase;
use Phpvalidator\Validator\CnpValidator;
use Phpvalidator\Validator\Rules\LengthValidator;
use Phpvalidator\Validator\Rules\NumericValidator;
use Phpvalidator\Validator\Rules\DateValidator;
use Phpvalidator\Validator\Rules\CountyValidator;
use Phpvalidator\Validator\Rules\ControlDigitValidator;
use Phpvalidator\Tests\BaseTestCase;

class CnpValidatorTest extends BaseTestCase
{
    public function testValidCnp(): void
    {
        $rules = [
            new LengthValidator($this->mockLogger),
            new NumericValidator($this->mockLogger),
            new DateValidator($this->mockLogger),
            new CountyValidator($this->mockLogger),
            new ControlDigitValidator($this->mockLogger),
        ];

        $validator = new CnpValidator($rules);
        $this->assertTrue($validator->isCnpValid('1970618394432'));
    }

    public function testCnpWithInvalidLength(): void
    {
        $rules = [new LengthValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $this->assertFalse($validator->isCnpValid('123'));
    }

    public function testCnpWithNonNumericCharacters(): void
    {
        $rules = [new NumericValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $this->assertFalse($validator->isCnpValid('19812abc12357'));
    }

    public function testCnpWithInvalidDate(): void
    {
        $rules = [new DateValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $this->assertFalse($validator->isCnpValid('1981331123457'));
    }

    public function testCnpWithInvalidCountyCode(): void
    {
        $rules = [new CountyValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $this->assertFalse($validator->isCnpValid('1981213999999'));
    }
}
