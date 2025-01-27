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
     *
     * @param string $value
     */
    public function isCnpValid(string $value): bool
    {
        foreach ($this->validations as $validation) {
            try {
                $validation->validate($value);
            } catch (CustomValidationExeption $e) {
                return false;
            }
        }

        return true;
    }
}
