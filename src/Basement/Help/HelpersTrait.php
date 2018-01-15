<?php

namespace Pheral\Essential\Basement\Help;

trait HelpersTrait
{
    protected $helperFile = 'helpers';

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

        if (!in_array($helperPath, $this->loadedHelpers, true) && file_exists($helperPath)) {
            require $helperPath;
            $this->loadedHelpers[] = $helperPath;
        }

        if ($ancestor = $reflector->getParentClass()) {
            $this->loadHelpersWithAncestors($ancestor);
        }
    }

    protected function loadHelpers()
    {
        $reflector = (new \ReflectionClass($this));
        $this->loadHelpersWithAncestors($reflector);
    }

    protected static function loadHelpersByStatic()
    {
        (new static())->loadHelpers();
    }
}
