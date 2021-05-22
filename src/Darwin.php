<?php

namespace Directories;

class Darwin implements DirectoryInterface
{
    /**
     * @var string
     */
    private static $home;

    /**
     * @inheritDoc
     */
    public static function homeDir()
    {
        if (!self::$home) {
            $home = getenv('HOME');
            if (!$home) {
                throw new \RuntimeException('The HOME environment variable must be set');
            }

            self::$home = $home;
        }

        return self::$home;
    }

    /**
     * @inheritDoc
     */
    public static function cacheDir()
    {
        return self::homeDir() . '/Library/Caches';
    }

    /**
     * @inheritDoc
     */
    public static function configDir()
    {
        return self::homeDir() . '/Library/Application Support';
    }

    /**
     * @inheritDoc
     */
    public static function dataDir()
    {
        return self::homeDir() . '/Library/Application Support';
    }

    /**
     * @inheritDoc
     */
    public static function dataLocalDir()
    {
        return self::dataDir();
    }

    /**
     * @inheritDoc
     */
    public static function executableDir()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function preferenceDir()
    {
        return self::homeDir() . '/Library/Preferences';
    }

    /**
     * @inheritDoc
     */
    public static function runtimeDir()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function audioDir()
    {
        return self::homeDir() . '/Music';
    }

    /**
     * @inheritDoc
     */
    public static function desktopDir()
    {
        return self::homeDir() . '/Desktop';
    }

    /**
     * @inheritDoc
     */
    public static function documentDir()
    {
        return self::homeDir() . '/Documents';
    }

    /**
     * @inheritDoc
     */
    public static function downloadDir()
    {
        return self::homeDir() . '/Downloads';
    }

    /**
     * @inheritDoc
     */
    public static function fontDir()
    {
        return self::homeDir() . '/Library/Fonts';
    }

    /**
     * @inheritDoc
     */
    public static function pictureDir()
    {
        return self::homeDir() . '/Pictures';
    }

    /**
     * @inheritDoc
     */
    public static function publicDir()
    {
        return self::homeDir() . '/Public';
    }

    /**
     * @inheritDoc
     */
    public static function templateDir()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function videoDir()
    {
        return self::homeDir() . '/Movies';
    }
}
