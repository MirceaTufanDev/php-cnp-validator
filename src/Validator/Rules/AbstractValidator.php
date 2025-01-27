<?php

namespace Phpvalidator\Validator\Rules;

use Phpvalidator\Exceptions\CustomValidationExeption;
use Phpvalidator\Logger\LoggerInterface;

abstract class AbstractValidator
{
    protected LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     *
     * @param string $value
     * @throws CustomValidationExeption
     */
    public function validate(string $value): void
    {
        if (!$this->isValid($value)) {
            $errorMessage = $this->getErrorMessage($value);
            $this->logger->error($errorMessage, ['validator' => static::class]);
            throw new CustomValidationExeption($errorMessage);
        }
    }

    /**
     *
     * @param string $value
     * @return bool
     */
    abstract protected function isValid(string $value): bool;

    /**
     *
     * @param string $value
     * @return string
     */
    abstract protected function getErrorMessage(string $value): string;
}
