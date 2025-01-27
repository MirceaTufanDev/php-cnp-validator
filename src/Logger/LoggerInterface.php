<?php

namespace Phpvalidator\Logger;

interface LoggerInterface
{
    public function error(string $message, array $context = []): void;
}
