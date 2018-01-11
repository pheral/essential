<?php

namespace Pheral\Essential\Basement;


use Pheral\Essential\Basement\Core\CoreHandler;
use Pheral\Essential\Network\Request;

class Application
{
    use HelpersTrait;

    /**
     * @var string|null
     */
    protected $path;

    /**
     * @var \Pheral\Essential\Basement\Core\CoreInterface
     */
    protected $core;

    /**
     * Application constructor.
     * @param null $path
     */
    public function __construct($path = null)
    {
        if ($path) {
            $this->setPath($path);
        }

        $this->loadHelpers();
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = realpath(rtrim($path,'\/'));
    }

    /**
     * @param string $path
     * @return string
     */
    public function path($path = '')
    {
        return $this->path . ($path ? '/' . $path : '');
    }

    /**
     * @param \Pheral\Essential\Network\Request $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        $this->set('app', $this);

        $this->set('request', $request);

        $this->core = CoreHandler::make();

        return $this->core->handle();
    }

    /**
     * @param string $name
     * @param mixed|object|string $instance
     * @return mixed|null|string
     */
    public function set($name, $instance)
    {
        return Pool::set($name, $instance);
    }

    /**
     * @param string $name
     * @return mixed|null
     */
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