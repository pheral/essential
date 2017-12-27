<?php

namespace Pheral\Essential;


class Application
{
    protected $path;

    public function __construct($path)
    {
        $this->setPath($path);
    }

    protected function setPath($path)
    {
        $this->path = $path;
    }
}