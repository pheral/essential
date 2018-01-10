<?php

namespace Pheral\Essential\Basement;


trait HelpersTrait
{
    protected $helperFile = 'helpers';

    protected $isObjectHelpers;

    protected static $isStaticHelpers;

    protected $loadedHelpers = [];

    protected function isHelperLoaded($helperPath)
    {
        return in_array($helperPath, $this->loadedHelpers, true);
    }

    protected function loadHelpersWithAncestors(\ReflectionClass $reflector = null)
    {
        if (!$reflector) {

            return;
        }

        $dirName = dirname($reflector->getFileName());

        $helperPath = $dirName . '/' . $this->helperFile . '.php';

        if (file_exists($helperPath) && !in_array($helperPath, $this->loadedHelpers, true)) {

            require_once $helperPath;

            $this->loadedHelpers[] = $helperPath;
        }

        if ($ancestor = $reflector->getParentClass()) {

            $this->loadHelpersWithAncestors($ancestor);
        }
    }

    public function loadHelpers($class = null)
    {
        $reflector = (new \ReflectionClass($class ?? $this));

        $this->loadHelpersWithAncestors($reflector);
    }

    public static function loadHelpersByStatic()
    {
        (new static())->loadHelpers();
    }
}