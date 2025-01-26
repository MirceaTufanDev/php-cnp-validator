<?php

namespace Phpvalidator\Exceptions;

class ErrorMessages
{
    public const LENGTH_ERROR = "CNP must have exactly 13 characters.";
    public const NUMERIC_ERROR = "CNP must contain only numeric characters.";
    public const DATE_ERROR = "Date components in CNP are invalid.";
    public const COUNTY_ERROR = "County code in CNP is invalid.";
    public const CONTROL_DIGIT_ERROR = "Control digit in CNP is invalid.";
}
