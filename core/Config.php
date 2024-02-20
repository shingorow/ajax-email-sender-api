<?php

namespace Core;

class Config
{
    protected static $directory = __DIR__ . '/../config/';

    public static function getConfigDirectory()
    {
        return rtrim(self::$directory, '/\\');
    }

    public static function get($route)
    {
        $values = preg_split('/\./', $route, -1, PREG_SPLIT_NO_EMPTY);
        $key = array_pop($values);
        $file = array_pop($values) . '.php';
        $path = (!empty($values)) ? implode(DIRECTORY_SEPARATOR, $values) . DIRECTORY_SEPARATOR : '';
        $baseDir = self::getConfigDirectory() . DIRECTORY_SEPARATOR;
        $config = include($baseDir . $path . $file);
        return $config[$key];
    }
}
