<?php

namespace Tests;

use Directories\Linux;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Directories\Linux
 * @group Linux
 */
class LinuxTest extends TestCase
{

    /**
     * @covers ::homeDir
     * @runInSeparateProcess
     */
    public function testHomeDir()
    {
        putenv('HOME');
        $this->expectException('\RuntimeException');
        Linux::homeDir();
    }

    /**
     * @covers ::cacheDir
     * @covers ::homeDir
     */
    public function testCacheDir()
    {
        putenv('XDG_CACHE_HOME');
        self::assertEquals(getenv('HOME') . '/.cache', Linux::cacheDir());
    }

    /**
     * @covers ::cacheDir
     */
    public function testXdgCacheDir()
    {
        $dir = '/path/to/cache';
        putenv('XDG_CACHE_HOME=' . $dir);
        self::assertEquals($dir, Linux::cacheDir());
    }

    /**
     * @covers ::dataDir
     * @covers ::dataLocalDir
     * @uses \Directories\Linux::homeDir()
     */
    public function testDataLocalDir()
    {
        putenv('XDG_DATA_HOME');
        self::assertEquals(getenv('HOME') . '/.local/share', Linux::dataLocalDir());
    }

    /**
     * @covers ::dataDir
     * @covers ::dataLocalDir
     */
    public function testXdgDataLocalDir()
    {
        $dir = '/path/to/local/share';
        putenv('XDG_DATA_HOME=' . $dir);
        self::assertEquals($dir, Linux::dataLocalDir());
    }

    /**
     * @covers ::executableDir
     * @uses \Directories\Linux::homeDir()
     * @uses \Directories\Linux::dataDir()
     */
    public function testExecutableDir()
    {
        putenv('XDG_BIN_HOME');
        putenv('XDG_DATA_HOME');
        self::assertEquals(getenv('HOME') . '/.local/bin', Linux::executableDir());
    }

    /**
     * @covers ::executableDir
     * @uses \Directories\Linux::dataDir()
     */
    public function testXdgDataExecutableDir()
    {
        $dir = '/path/to/data';
        putenv('XDG_BIN_HOME');
        putenv('XDG_DATA_HOME=' . $dir);
        self::assertEquals(dirname($dir) . '/bin', Linux::executableDir());
    }

    /**
     * @covers ::executableDir
     * @uses \Directories\Linux::dataDir()
     */
    public function testXdgBinExecutableDir()
    {
        $dir = '/path/to/bin';
        putenv('XDG_BIN_HOME=' . $dir);
        putenv('XDG_DATA_HOME');
        self::assertEquals($dir, Linux::executableDir());
    }

    /**
     * @covers ::configDir
     * @covers ::preferenceDir
     * @uses \Directories\Linux::homeDir()
     */
    public function testPreferenceDir()
    {
        putenv('XDG_CONFIG_HOME');
        self::assertEquals(getenv('HOME') . '/.config', Linux::preferenceDir());
    }

    /**
     * @covers ::configDir
     * @covers ::preferenceDir
     */
    public function testXdgPreferenceDir()
    {
        $dir = '/path/to/config';
        putenv('XDG_CONFIG_HOME=' . $dir);
        self::assertEquals($dir, Linux::preferenceDir());
    }

    /**
     * @covers ::runtimeDir
     */
    public function testRuntimeDir()
    {
        putenv('XDG_RUNTIME_DIR');
        self::assertNull(Linux::runtimeDir());
    }

    /**
     * @covers ::runtimeDir
     */
    public function testXdgRuntimeDir()
    {
        $dir = '/path/to/runtime';
        putenv('XDG_RUNTIME_DIR=' . $dir);
        self::assertEquals($dir, Linux::runtimeDir());
    }

    /**
     * @covers ::audioDir
     */
    public function testAudioDir()
    {
        self::assertNull(Linux::audioDir());
    }

    /**
     * @covers ::desktopDir
     */
    public function testDesktopDir()
    {
        self::assertNull(Linux::desktopDir());
    }

    /**
     * @covers ::documentDir
     */
    public function testDocumentDir()
    {
        self::assertNull(Linux::documentDir());
    }

    /**
     * @covers ::downloadDir
     */
    public function testDownloadDir()
    {
        self::assertNull(Linux::downloadDir());
    }

    /**
     * @covers ::fontDir
     * @uses \Directories\Linux::homeDir())
     * @uses \Directories\Linux::dataDir()
     */
    public function testFontDir()
    {
        putenv('XDG_DATA_HOME');
        self::assertEquals(
            getenv('HOME') . '/.local/share/fonts',
            Linux::fontDir()
        );
    }

    /**
     * @covers ::fontDir
     * @uses \Directories\Linux::dataDir()
     */
    public function testXdgDataFontDir()
    {
        $dir = '/path/to/local/share';
        putenv('XDG_DATA_HOME=' . $dir);
        self::assertEquals($dir . '/fonts', Linux::fontDir());
    }

    /**
     * @covers ::pictureDir
     */
    public function testPictureDir()
    {
        self::assertNull(Linux::pictureDir());
    }

    /**
     * @covers ::publicDir
     */
    public function testPublicDir()
    {
        self::assertNull(Linux::publicDir());
    }

    /**
     * @covers ::templateDir
     */
    public function testTemplateDir()
    {
        self::assertNull(Linux::templateDir());
    }

    /**
     * @covers ::videoDir
     */
    public function testVideoDir()
    {
        self::assertNull(Linux::videoDir());
    }
}
