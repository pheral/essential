<?php

namespace Pheral\Essential\Basement;


trait HelpersTrait
{
    protected $helpersFile = 'helpers';

    protected $isObjectHelpers;

    protected static $isStaticHelpers;

    public function loadHelpers()
    {
        if (is_null($this->isObjectHelpers)) {

            $reflector = (new \ReflectionClass($this));

            $dirName = dirname($reflector->getFileName());

            $helpersPath = $dirName . '/' . $this->helpersFile . '.php';

            if (file_exists($helpersPath)) {

                require_once $helpersPath;

                $this->isObjectHelpers = true;
            }
        }

        return $this->isObjectHelpers;
    }

    public static function staticLoadHelpers()
    {
        if (is_null(static::$isStaticHelpers)) {

            static::$isStaticHelpers = (new static())->loadHelpers();
        }

        return static::$isStaticHelpers;
    }
}