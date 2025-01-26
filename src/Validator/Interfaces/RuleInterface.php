<?php

namespace Phpvalidator\Validator\Interfaces;

use Phpvalidator\Logger\Logger;

interface RuleInterface
{
    public function validate(string $value, ?Logger $logger = null): bool;
}
