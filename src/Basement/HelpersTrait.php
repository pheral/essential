<?php

namespace Pheral\Essential\Basement;


trait HelpersTrait
{
    protected $helpersFile = 'helpers';

    protected $isLoadedHelpers;

    public function loadHelpers()
    {
        if (is_null($this->isLoadedHelpers)) {

            $reflector = (new \ReflectionClass($this));

            $dirName = dirname($reflector->getFileName());

            $helpersPath = $dirName . '/' . $this->helpersFile . '.php';

            if (file_exists($helpersPath)) {

                require_once $helpersPath;

                $this->isLoadedHelpers = true;
            }
        }

        return $this->isLoadedHelpers;
    }
}