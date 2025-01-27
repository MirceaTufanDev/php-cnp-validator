<?php

namespace Phpvalidator\Validator\Rules;

class CountyValidator extends AbstractValidator
{
    private const VALID_COUNTIES = [
        '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
        '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
        '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
        '31', '32', '33', '34', '35', '36', '37', '38', '39', '40',
        '41', '42', '43', '44', '45', '46', '51', '52',
    ];

    protected function isValid(string $value): bool
    {
        $countyCode = substr($value, 7, 2);
        return in_array($countyCode, self::VALID_COUNTIES, true);
    }

    protected function getErrorMessage(string $value): string
    {
        $countyCode = substr($value, 7, 2);
        return sprintf("CountyValidator failed: Invalid county code '%s' in CNP '%s'.", $countyCode, $value);
    }
}
