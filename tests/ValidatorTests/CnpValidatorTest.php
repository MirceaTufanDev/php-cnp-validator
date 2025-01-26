<?php

use PHPUnit\Framework\TestCase;
use Phpvalidator\Validator\CnpValidator;
use Phpvalidator\Validator\Rules\{LengthValidator, NumericValidator, DateValidator, CountyValidator, ControlDigitValidator};
use Phpvalidator\Logger\Logger;

class CnpValidatorTest extends TestCase
{
    private function createValidator(): CnpValidator
    {
        $logger = new Logger('test_validation.log');

        $validations = [
            new LengthValidator(),
            new NumericValidator(),
            new DateValidator(),
            new CountyValidator(),
            new ControlDigitValidator(),
        ];

        return new CnpValidator($validations, $logger);
    }

    public function testValidCnp(): void
    {
        $validator = $this->createValidator();
        $this->assertTrue($validator->isCnpValid('2860221130327'));
    }

    public function testInvalidCnp(): void
    {
        $validator = $this->createValidator();
        $this->assertFalse($validator->isCnpValid('1960917400019'));
    }

    public function testCnpWithInvalidLength(): void
    {
        $validator = $this->createValidator();
        $this->assertFalse($validator->isCnpValid('12345'));
    }

    public function testCnpWithNonNumericCharacters(): void
    {
        $validator = $this->createValidator();
        $this->assertFalse($validator->isCnpValid('12345A7890123'));
    }

    public function testCnpWithInvalidDate(): void
    {
        $validator = $this->createValidator();
        $this->assertFalse($validator->isCnpValid('1961327400018'));
    }

    public function testCnpWithInvalidCountyCode(): void
    {
        $validator = $this->createValidator();
        $this->assertFalse($validator->isCnpValid('1960917990018'));
    }
}
