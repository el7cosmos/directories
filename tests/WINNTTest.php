<?php

namespace Tests;

use Directories\WINNT;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Directories\WINNT
 *
 * @group Windows
 */
class WINNTTest extends TestCase
{

    public static function homeProvider()
    {
        return array(
            array(false),
            array('C:\Users\test'),
        );
    }

    public static function localAppDataProvider()
    {
        return array(
            array(false),
            array('C:\Users\test\AppData\Local'),
        );
    }

    public static function appDataProvider()
    {
        return array(
            array(false),
            array('C:\Users\test\AppData\Roaming'),
        );
    }

    public static function publicProvider()
    {
        return array(
            array(false),
            array('C:\Users\Public'),
        );
    }

    /**
     * @covers ::homeDir
     * @dataProvider homeProvider
     */
    public function testHomeDir($userProfile)
    {
        $this->test('USERPROFILE', $userProfile, 'homeDir');
    }

    /**
     * @covers ::cacheDir
     * @dataProvider localAppDataProvider
     */
    public function testCacheDir($localAppData)
    {
        $this->test('LOCALAPPDATA', $localAppData, 'cacheDir');
    }

    /**
     * @covers ::configDir
     * @dataProvider appDataProvider
     */
    public function testConfigDir($appData)
    {
        $this->test('APPDATA', $appData, 'configDir');
    }

    /**
     * @covers ::dataDir
     * @dataProvider appDataProvider
     */
    public function testDataDir($appData)
    {
        $this->test('APPDATA', $appData, 'dataDir');
    }

    /**
     * @covers ::dataLocalDir
     * @dataProvider localAppDataProvider
     */
    public function testDataLocalDir($localAppData)
    {
        $this->test('LOCALAPPDATA', $localAppData, 'dataLocalDir');
    }

    /**
     * @covers ::executableDir
     */
    public function testExecutableDir()
    {
        self::assertNull(WINNT::executableDir());
    }

    /**
     * @covers ::preferenceDir
     * @dataProvider appDataProvider
     */
    public function testPreferenceDir($appData)
    {
        $this->test('APPDATA', $appData, 'preferenceDir');
    }

    /**
     * @covers ::runtimeDir
     */
    public function testRuntimeDir()
    {
        self::assertNull(WINNT::runtimeDir());
    }

    /**
     * @covers ::audioDir
     * @uses \Directories\WINNT::homeDir()
     */
    public function testAudioDir()
    {
        self::assertEquals(getenv('USERPROFILE') . DIRECTORY_SEPARATOR . 'Music', WINNT::audioDir());
    }

    /**
     * @covers ::desktopDir
     * @uses \Directories\WINNT::homeDir()
     */
    public function testDesktopDir()
    {
        self::assertEquals(getenv('USERPROFILE') . DIRECTORY_SEPARATOR . 'Desktop', WINNT::desktopDir());
    }

    /**
     * @covers ::documentDir
     * @uses \Directories\WINNT::homeDir()
     */
    public function testDocumentDir()
    {
        self::assertEquals(getenv('USERPROFILE') . DIRECTORY_SEPARATOR . 'Documents', WINNT::documentDir());
    }

    /**
     * @covers ::downloadDir
     * @uses \Directories\WINNT::homeDir()
     */
    public function testDownloadDir()
    {
        self::assertEquals(getenv('USERPROFILE') . DIRECTORY_SEPARATOR . 'Downloads', WINNT::downloadDir());
    }

    /**
     * @covers ::fontDir
     */
    public function testFontDir()
    {
        self::assertNull(WINNT::fontDir());
    }

    /**
     * @covers ::pictureDir
     * @uses \Directories\WINNT::homeDir()
     */
    public function testPictureDir()
    {
        self::assertEquals(getenv('USERPROFILE') . DIRECTORY_SEPARATOR . 'Pictures', WINNT::pictureDir());
    }

    /**
     * @covers ::publicDir
     * @dataProvider publicProvider
     */
    public function testPublicDir($public)
    {
        $this->test('PUBLIC', $public, 'publicDir');
    }

    /**
     * @covers ::templateDir
     */
    public function testTemplateDir()
    {
        self::assertEquals(
            implode(
                DIRECTORY_SEPARATOR,
                array(
                    getenv('APPDATA'),
                    'Roaming',
                    'Microsoft',
                    'Windows',
                    'Template',
                )
            ),
            WINNT::templateDir()
        );
    }

    /**
     * @covers ::videoDir
     * @uses \Directories\WINNT::homeDir()
     */
    public function testVideoDir()
    {
        self::assertEquals(getenv('USERPROFILE') . DIRECTORY_SEPARATOR . 'Videos', WINNT::videoDir());
    }

    private function test($env, $value, $method)
    {
        if ($value) {
            putenv($env . '=' . $value);
            self::assertEquals($value, WINNT::$method());
        } else {
            putenv($env);
            $this->expectException('\RuntimeException');
            WINNT::$method();
        }
    }
}
