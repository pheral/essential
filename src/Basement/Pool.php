<?php

namespace Pheral\Essential\Basement;


class Pool
{
    protected static $pool = [];

    protected function __construct() {  }

    protected function __wakeup() {  }

    protected function __clone() {  }

    public static function set($name, $instance = null)
    {
        if (!is_string($name)) {
            return null;
        }

        $createNew = true;

        if (is_object($instance)) {
            $createNew = false;
        } elseif(!is_string($instance)) {
            $instance = $name;
        }

        if (!$object = element(self::$pool, $name)) {
            $object = $createNew ? new $instance() : $instance;
            self::$pool[$name] = $object;
        }

        return $object;
    }

    public static function get($name, $default = null)
    {
        if (!is_string($name)) {
            return null;
        }

        return element(self::$pool, $name, $default);
    }
}