<?php

use PHPUnit\Framework\TestCase;
use Phpvalidator\Validator\CnpValidator;
use Phpvalidator\Validator\Rules\LengthValidator;
use Phpvalidator\Validator\Rules\NumericValidator;
use Phpvalidator\Validator\Rules\DateValidator;
use Phpvalidator\Validator\Rules\CountyValidator;
use Phpvalidator\Validator\Rules\ControlDigitValidator;
use Phpvalidator\Exceptions\CustomValidationExeption;
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
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage("LengthValidator failed: CNP '123' must have exactly 13 characters.");

        $rules = [new LengthValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $validator->isCnpValid('123');
    }

    public function testCnpWithNonNumericCharacters(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage("NumericValidator failed: CNP '19812abc12357' contains non-numeric characters.");

        $rules = [new NumericValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $validator->isCnpValid('19812abc12357');
    }

    public function testCnpWithInvalidDate(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage("DateValidator failed: Invalid date components in CNP '1981331123457'.");

        $rules = [new DateValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $validator->isCnpValid('1981331123457');
    }

    public function testCnpWithInvalidCountyCode(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage("CountyValidator failed: Invalid county code '99' in CNP '1981213999999'.");

        $rules = [new CountyValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $validator->isCnpValid('1981213999999');
    }
}
