<?php

namespace Pheral\Essential\Axis;


class Pool
{
    protected static $pool = [];

    protected function __construct() {  }

    protected function __wakeup() {  }

    protected function __clone() {  }

    public static function set($className, $class = null)
    {
        if (!is_string($className)) {
            return null;
        }

        $createNew = true;

        if (is_object($class)) {
            $createNew = false;
        } else {
            $class = $className;
        }

        if (!$object = arr_get(self::$pool, $className)) {
            $object = $createNew ? new $class() : $class;
            self::$pool[$className] = $object;
        }

        return $object;
    }

    public static function get($className, $default = null)
    {
        if (!is_string($className)) {
            return null;
        }

        return arr_get(self::$pool, $className, $default);
    }
}