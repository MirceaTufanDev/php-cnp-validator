<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Phpvalidator\Validator\CnpValidator;
use Phpvalidator\Validator\Rules\LengthValidator;
use Phpvalidator\Validator\Rules\NumericValidator;
use Phpvalidator\Validator\Rules\DateValidator;
use Phpvalidator\Validator\Rules\CountyValidator;
use Phpvalidator\Validator\Rules\ControlDigitValidator;
use Phpvalidator\Logger\FileLogger;
use Phpvalidator\Exceptions\CustomValidationExeption;

$logDirectory = __DIR__ . '/logs';
if (!is_dir($logDirectory)) {
    mkdir($logDirectory, 0777, true);
}

$logFilePath = $logDirectory . '/cnp_validation.log';
$logger = new FileLogger($logFilePath);

$rules = [
    new LengthValidator($logger),
    new NumericValidator($logger),
    new DateValidator($logger),
    new CountyValidator($logger),
    new ControlDigitValidator($logger),
];

$validator = new CnpValidator($rules);

$testCnp = '1980618394432';
echo "Validating CNP: $testCnp\n";

try {
    if ($validator->isCnpValid($testCnp)) {
        echo "CNP is valid.\n";
    }
} catch (CustomValidationExeption $e) {
    echo "Validation failed: " . $e->getMessage() . "\n";
}

echo "Check the log file at: $logFilePath\n";

