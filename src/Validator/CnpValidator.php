<?php

namespace Phpvalidator\Validator;

use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Logger\Logger;

class CnpValidator
{
    private array $validations;
    private ?Logger $logger;

    public function __construct(array $validations, ?Logger $logger = null)
    {
        $this->validations = $validations;
        $this->logger = $logger;
    }

    public function isCnpValid(string $value): bool
    {
        try {
            foreach ($this->validations as $validation) {
                $validation->validate($value, $this->logger);
            }
            if ($this->logger) {
                $this->logger->log("Validation succeeded for CNP: $value");
            }
            return true;
        } catch (CustomValidationExeption $e) {
            if ($this->logger) {
                $this->logger->log("Validation failed: " . $e->getMessage());
            }
            return false;
        }
    }
}
