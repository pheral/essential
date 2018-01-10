<?php

namespace Pheral\Essential\Basement;

class Pool
{
    private static $instance;

    protected $pool = [];

    private function __construct() {  }

    private function __clone() {  }

    protected function __wakeup() {  }

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

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

        if (!$object = self::get($name)) {
            $object = $createNew ? new $instance() : $instance;
            self::instance()->pool[$name] = $object;
        }

        return $object;
    }

    public static function get($name, $default = null)
    {
        if (!is_string($name)) {
            return null;
        }

        return element(self::instance()->pool, $name, $default);
    }
}