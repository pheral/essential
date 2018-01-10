<?php

namespace Pheral\Essential;


use Pheral\Essential\Basement\Core\CoreHandler;
use Pheral\Essential\Basement\HelpersTrait;
use Pheral\Essential\Basement\Pool;
use Pheral\Essential\Network\Request;

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

    public function handle(Request $request)
    {
        $this->set('app', $this);

        $this->set('request', $request);

        $this->core = CoreHandler::make();

        return $this->core->handle();
    }

    public function set($name, $instance)
    {
        return Pool::set($name, $instance);
    }

    public function get($name)
    {
        return Pool::get($name);
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