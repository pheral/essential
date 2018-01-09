<?php

namespace Pheral\Essential;


use Pheral\Essential\Axis\Core\CoreHandler;
use Pheral\Essential\Axis\Pool;

class Application
{
    protected $path;

    public function __construct($path)
    {
        $this->setPath($path);
        $this->handleCore();
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
        dbg($this->getRequest());

        include $this->path($path);
    }

    protected function handleCore()
    {
        Pool::set('Core', (new CoreHandler())->init()->get());
    }

    /**
     * @return \Pheral\Essential\Axis\Core\CoreInterface
     */
    public function getCore()
    {
        return Pool::get('Core');
    }

    /**
     * @return \Pheral\Essential\Axis\Request\RequestInterface
     */
    public function getRequest()
    {
        return $this->getCore()->getRequest();
    }
}