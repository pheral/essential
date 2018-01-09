<?php

namespace Pheral\Essential;


use Pheral\Essential\Basement\Core\CoreHandler;
use Pheral\Essential\Basement\HelpersTrait;
use Pheral\Essential\Basement\Pool;

class Application
{
    use HelpersTrait;

    protected $path;

    /**
     * @var \Pheral\Essential\Basement\Core\CoreInterface
     */
    protected $core;

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

    public function handle()
    {
        $this->loadHelpers();

        Pool::set('App', $this);

        $this->handleCore();
    }

    protected function handleCore()
    {
        $this->core = CoreHandler::make();
    }

    public function getCore()
    {
        return $this->core;
    }

    /**
     * @todo replace this temporary method
     * @param $path
     */
    public function force($path)
    {
        include $this->path($path);
    }
}