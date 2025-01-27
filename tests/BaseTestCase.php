<?php

namespace Phpvalidator\Tests;

use PHPUnit\Framework\TestCase;
use Phpvalidator\Logger\LoggerInterface;

abstract class BaseTestCase extends TestCase
{
    protected LoggerInterface $mockLogger;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockLogger = $this->createMock(LoggerInterface::class);
    }
}
