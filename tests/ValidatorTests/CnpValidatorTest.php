<?php

use PHPUnit\Framework\TestCase;
use Phpvalidator\Validator\CnpValidator;
use Phpvalidator\Validator\Rules\LengthValidator;
use Phpvalidator\Validator\Rules\NumericValidator;
use Phpvalidator\Validator\Rules\DateValidator;
use Phpvalidator\Validator\Rules\CountyValidator;
use Phpvalidator\Validator\Rules\ControlDigitValidator;
use Phpvalidator\Logger\LoggerInterface;
use Phpvalidator\Exceptions\CustomValidationExeption;

class CnpValidatorTest extends TestCase
{
    private LoggerInterface $mockLogger;

    protected function setUp(): void
    {
        $this->mockLogger = $this->createMock(LoggerInterface::class);
    }

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
        $this->expectExceptionMessage('CNP must have exactly 13 characters.');

        $rules = [new LengthValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $validator->isCnpValid('123');
    }

    public function testCnpWithNonNumericCharacters(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('CNP must contain only numeric characters.');

        $rules = [new NumericValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $validator->isCnpValid('19812abc12357');
    }

    public function testCnpWithInvalidDate(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('Date components in CNP are invalid.');

        $rules = [new DateValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $validator->isCnpValid('1981331123457');
    }

    public function testCnpWithInvalidCountyCode(): void
    {
        $this->expectException(CustomValidationExeption::class);
        $this->expectExceptionMessage('County code in CNP is invalid.');

        $rules = [new CountyValidator($this->mockLogger)];
        $validator = new CnpValidator($rules);
        $validator->isCnpValid('1981213999999');
    }
}
