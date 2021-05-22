<?php

namespace Tests;

use Directories\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Directories\Factory
 * @group Linux
 * @group macOS
 * @group Windows
 */
class FactoryTest extends TestCase
{

    /**
     * @covers ::create
     */
    public function testCreate()
    {
        $directory = Factory::create();
        self::assertInstanceOf('\Directories\DirectoryInterface', $directory);
    }
}
