<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\ErrorMessages;
use Phpvalidator\Validator\Interfaces\RuleInterface;
use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Translations\Translations;
use Phpvalidator\Logger\Logger;

class CountyValidator implements RuleInterface
{
    private array $validCounties = [
        '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
        '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
        '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
        '31', '32', '33', '34', '35', '36', '37', '38', '39', '40',
        '41', '42', '43', '44', '45', '46', '51', '52',
    ];

    private string $lang;

    public function __construct(string $lang = 'en')
    {
        $this->lang = $lang;
    }

    /**
     * @throws CustomValidationExeption
     */
    public function validate(string $value, ?Logger $logger = null): bool
    {
        $countyCode = substr($value, 7, 2);
        if (!in_array($countyCode, $this->validCounties, true)) {
            if ($logger) {
                $logger->log("CountyValidator failed: County code '$countyCode' from '$value' is invalid.");
            }
            throw new CustomValidationExeption(ErrorMessages::COUNTY_ERROR);
        }
        return true;
    }
}
