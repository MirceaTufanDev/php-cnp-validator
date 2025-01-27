<?php

namespace Phpvalidator\Validator;

use Phpvalidator\Exceptions\CustomValidationExeption;

class CnpValidator
{
    private array $validations;

    public function __construct(array $validations)
    {
        $this->validations = $validations;
    }

    /**
     * Validates a CNP by applying all validation rules.
     *
     * @param string $value
     * @throws CustomValidationExeption
     */
    public function isCnpValid(string $value): bool
    {
        foreach ($this->validations as $validation) {
            $validation->validate($value);
        }

        return true;
    }
}
