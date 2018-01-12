<?php

namespace Pheral\Essential\Direct;


use Pheral\Essential\Direct\Output\ViewAbstract;

class View extends ViewAbstract
{
    /**
     * @param array $data
     * @return string
     */
    public function render($data = [])
    {
        return $this->partial($data);
    }

    /**
     * @param array $data
     * @return string
     */
    public function partial($data = [])
    {
        $anotherBug = 1
        $filePath = $this->getPath();

        if (!file_exists($filePath)) {
            ddd('undefined view template', $filePath);
        }

        if ($data = array_merge($this->getData(), $data)) {
            extract($data);
        }

        ob_start();
        include $filePath;
        return ob_get_clean();
    }
}