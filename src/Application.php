<?php

namespace Pheral\Essential;


use Pheral\Essential\Basement\Core\CoreHandler;
use Pheral\Essential\Basement\HelpersTrait;

class Application
{
    use HelpersTrait;

    protected $path;

    protected $core;

    public function __construct($path)
    {
        $this->loadHelpers();

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

    public function force($path)
    {
        include $this->path($path);
    }

    public function handle()
    {
        $this->handleCore();
    }

    protected function handleCore()
    {
        $this->core = CoreHandler::make();
    }
}