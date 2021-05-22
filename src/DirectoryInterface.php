<?php

namespace Directories;

interface DirectoryInterface
{

    /**
     * Returns the path to the user's home directory.
     *
     * @return string
     */
    public static function homeDir();

    /**
     * Returns the path to the user's cache directory.
     *
     * @return string
     */
    public static function cacheDir();

    /**
     * Returns the path to the user's config directory.
     *
     * @return string
     */
    public static function configDir();

    /**
     * Returns the path to the user's data directory.
     *
     * @return string
     */
    public static function dataDir();

    /**
     * Returns the path to the user's local data directory.
     *
     * @return string
     */
    public static function dataLocalDir();

    /**
     * Returns the path to the user's executable directory.
     *
     * @return string|null
     */
    public static function executableDir();

    /**
     * Returns the path to the user's preference directory.
     *
     * @return string
     */
    public static function preferenceDir();

    /**
     * Returns the path to the user's runtime directory.
     *
     * @return string|null
     */
    public static function runtimeDir();

    /**
     * Returns the path to the user's audio directory.
     *
     * @return string|null
     */
    public static function audioDir();

    /**
     * Returns the path to the user's desktop directory.
     *
     * @return string|null
     */
    public static function desktopDir();

    /**
     * Returns the path to the user's document directory.
     *
     * @return string|null
     */
    public static function documentDir();

    /**
     * Returns the path to the user's download directory.
     *
     * @return string|null
     */
    public static function downloadDir();

    /**
     * Returns the path to the user's font directory.
     *
     * @return string|null
     */
    public static function fontDir();

    /**
     * Returns the path to the user's picture directory.
     *
     * @return string|null
     */
    public static function pictureDir();

    /**
     * Returns the path to the user's public directory.
     *
     * @return string|null
     */
    public static function publicDir();

    /**
     * Returns the path to the user's template directory.
     *
     * @return string|null
     */
    public static function templateDir();

    /**
     * Returns the path to the user's video directory.
     *
     * @return string|null
     */
    public static function videoDir();
}
