<?php

namespace Phpvalidator\Logger;

class FileLogger implements LoggerInterface
{
    private string $logFile;

    public function __construct(string $logFile)
    {
        $this->logFile = $logFile;
    }

    public function error(string $message, array $context = []): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $contextString = json_encode($context);
        file_put_contents(
            $this->logFile,
            "[$timestamp] ERROR: $message | Context: $contextString\n",
            FILE_APPEND
        );
    }
}
