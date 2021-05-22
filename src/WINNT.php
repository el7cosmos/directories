<?php

namespace Directories;

class WINNT implements DirectoryInterface
{
    /**
     * @inheritDoc
     */
    public static function homeDir()
    {
        if ($return = getenv('USERPROFILE')) {
            return $return;
        }
        throw new \RuntimeException('The USERPROFILE environment variable must be set');
    }

    /**
     * @inheritDoc
     */
    public static function cacheDir()
    {
        if ($return = getenv('LOCALAPPDATA')) {
            return $return;
        }
        throw new \RuntimeException('The LOCALAPPDATA environment variable must be set');
    }

    /**
     * @inheritDoc
     */
    public static function configDir()
    {
        if ($return = getenv('APPDATA')) {
            return $return;
        }
        throw new \RuntimeException('The APPDATA environment variable must be set');
    }

    /**
     * @inheritDoc
     */
    public static function dataDir()
    {
        if ($return = getenv('APPDATA')) {
            return $return;
        }
        throw new \RuntimeException('The APPDATA environment variable must be set');
    }

    /**
     * @inheritDoc
     */
    public static function dataLocalDir()
    {
        if ($return = getenv('LOCALAPPDATA')) {
            return $return;
        }
        throw new \RuntimeException('The LOCALAPPDATA environment variable must be set');
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
        if ($return = getenv('APPDATA')) {
            return $return;
        }
        throw new \RuntimeException('The APPDATA environment variable must be set');
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
        return self::homeDir() . DIRECTORY_SEPARATOR . 'Music';
    }

    /**
     * @inheritDoc
     */
    public static function desktopDir()
    {
        return self::homeDir() . DIRECTORY_SEPARATOR . 'Desktop';
    }

    /**
     * @inheritDoc
     */
    public static function documentDir()
    {
        return self::homeDir() . DIRECTORY_SEPARATOR . 'Documents';
    }

    /**
     * @inheritDoc
     */
    public static function downloadDir()
    {
        return self::homeDir() . DIRECTORY_SEPARATOR . 'Downloads';
    }

    /**
     * @inheritDoc
     */
    public static function fontDir()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public static function pictureDir()
    {
        return self::homeDir() . DIRECTORY_SEPARATOR . 'Pictures';
    }

    /**
     * @inheritDoc
     */
    public static function publicDir()
    {
        if ($return = getenv('PUBLIC')) {
            return $return;
        }
        throw new \RuntimeException('The PUBLIC environment variable must be set');
    }

    /**
     * @inheritDoc
     */
    public static function templateDir()
    {
        return implode(
            DIRECTORY_SEPARATOR,
            array(
                getenv('APPDATA'),
                'Roaming',
                'Microsoft',
                'Windows',
                'Template',
            )
        );
    }

    /**
     * @inheritDoc
     */
    public static function videoDir()
    {
        return self::homeDir() . DIRECTORY_SEPARATOR . 'Videos';
    }
}
