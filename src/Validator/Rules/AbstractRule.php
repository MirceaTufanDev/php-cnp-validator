<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Logger\LoggerInterface;
use Phpvalidator\Exceptions\CustomValidationExeption;

abstract class AbstractRule
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Validates the given value.
     *
     * @param string $value
     * @throws CustomValidationExeption
     */
    abstract public function validate(string $value): void;

    /**
     * Logs an error message using the logger.
     *
     * @param string $message
     * @param array $context
     */
    protected function logError(string $message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }
}
