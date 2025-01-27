<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Exceptions\ErrorMessages;

class CountyValidator extends AbstractRule
{
    private const VALID_COUNTIES = [
        '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
        '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
        '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
        '31', '32', '33', '34', '35', '36', '37', '38', '39', '40',
        '41', '42', '43', '44', '45', '46', '51', '52',
    ];

    public function validate(string $value): void
    {
        $countyCode = substr($value, 7, 2);
        if (!in_array($countyCode, self::VALID_COUNTIES, true)) {
            $this->logError(
                "CountyValidator failed: Invalid county code in CNP.",
                ['value' => $value, 'countyCode' => $countyCode]
            );
            throw new CustomValidationExeption(ErrorMessages::COUNTY_ERROR);
        }
    }
}
