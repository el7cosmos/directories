<?php

namespace Directories;

class Factory
{

    /**
     * @return \Directories\DirectoryInterface
     */
    public static function create()
    {
        /** @var class-string<\Directories\DirectoryInterface> $class */
        $class = '\\Directories\\' . PHP_OS;
        return new $class();
    }
}
