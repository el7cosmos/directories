<?php

namespace Directories;

class Linux implements DirectoryInterface
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
        return getenv('XDG_CACHE_HOME') ?: self::homeDir() . '/.cache';
    }

    /**
     * @inheritDoc
     */
    public static function configDir()
    {
        return getenv('XDG_CONFIG_HOME') ?: self::homeDir() . '/.config';
    }

    /**
     * @inheritDoc
     */
    public static function dataDir()
    {
        return getenv('XDG_DATA_HOME') ?: self::homeDir() . '/.local/share';
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
        return getenv('XDG_BIN_HOME') ?: dirname(self::dataDir()) . '/bin';
    }

    /**
     * @inheritDoc
     */
    public static function preferenceDir()
    {
        return self::configDir();
    }

    /**
     * @inheritDoc
     */
    public static function runtimeDir()
    {
        return getenv('XDG_RUNTIME_DIR') ?: null;
    }

    /**
     * @inheritDoc
     */
    public static function audioDir()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function desktopDir()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function documentDir()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function downloadDir()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function fontDir()
    {
        return self::dataDir() . '/fonts';
    }

    /**
     * @inheritDoc
     */
    public static function pictureDir()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function publicDir()
    {
        return null;
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
        return null;
    }
}
