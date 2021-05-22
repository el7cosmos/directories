<?php

namespace Tests;

use Directories\Darwin;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Directories\Darwin
 * @group macOS
 */
class DarwinTest extends TestCase
{

    /**
     * @covers ::homeDir
     * @runInSeparateProcess
     */
    public function testHomeDir()
    {
        putenv('HOME');
        $this->expectException('\RuntimeException');
        Darwin::homeDir();
    }

    /**
     * @covers ::cacheDir
     * @covers ::homeDir
     */
    public function testCacheDir()
    {
        self::assertEquals(getenv('HOME') . '/Library/Caches', Darwin::cacheDir());
    }

    /**
     * @covers ::configDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testConfigDir()
    {
        self::assertEquals(getenv('HOME') . '/Library/Application Support', Darwin::configDir());
    }

    /**
     * @covers ::dataDir
     * @covers ::dataLocalDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testDataLocalDir()
    {
        self::assertEquals(getenv('HOME') . '/Library/Application Support', Darwin::dataLocalDir());
    }

    /**
     * @covers ::executableDir
     */
    public function testExecutableDir()
    {
        self::assertNull(Darwin::executableDir());
    }

    /**
     * @covers ::preferenceDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testPreferenceDir()
    {
        self::assertEquals(getenv('HOME') . '/Library/Preferences', Darwin::preferenceDir());
    }

    /**
     * @covers ::runtimeDir
     */
    public function testRuntimeDir()
    {
        self::assertNull(Darwin::runtimeDir());
    }

    /**
     * @covers ::audioDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testAudioDir()
    {
        self::assertEquals(getenv('HOME') . '/Music', Darwin::audioDir());
    }

    /**
     * @covers ::desktopDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testDesktopDir()
    {
        self::assertEquals(getenv('HOME') . '/Desktop', Darwin::desktopDir());
    }

    /**
     * @covers ::documentDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testDocumentDir()
    {
        self::assertEquals(getenv('HOME') . '/Documents', Darwin::documentDir());
    }

    /**
     * @covers ::downloadDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testDownloadDir()
    {
        self::assertEquals(getenv('HOME') . '/Downloads', Darwin::downloadDir());
    }

    /**
     * @covers ::fontDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testFontDir()
    {
        self::assertEquals(getenv('HOME') . '/Library/Fonts', Darwin::fontDir());
    }

    /**
     * @covers ::pictureDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testPictureDir()
    {
        self::assertEquals(getenv('HOME') . '/Pictures', Darwin::pictureDir());
    }

    /**
     * @covers ::publicDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testPublicDir()
    {
        self::assertEquals(getenv('HOME') . '/Public', Darwin::publicDir());
    }

    /**
     * @covers ::templateDir
     */
    public function testTemplateDir()
    {
        self::assertNull(Darwin::templateDir());
    }

    /**
     * @covers ::videoDir
     * @uses \Directories\Darwin::homeDir()
     */
    public function testVideoDir()
    {
        self::assertEquals(getenv('HOME') . '/Movies', Darwin::videoDir());
    }
}
