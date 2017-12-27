<?php

namespace Pheral\Essential;


class Application
{
    protected $path;

    public function __construct($path)
    {
        $this->setPath($path);
    }

    public function setPath($path)
    {
        $this->path = realpath(rtrim($path,'\/'));
    }

    public function path($path = '')
    {
        return $this->path . ($path ? '/' . $path : '');
    }

    /**
     * test
     * @param $path
     */
    public function force($path)
    {
        include $this->path($path);
    }
}