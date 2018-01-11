<?php

namespace Pheral\Essential\Basement;


use Pheral\Essential\Basement\Stack\Pool;
use Pheral\Essential\Helpers\HelpersTrait;

class Application
{
    use HelpersTrait;

    /**
     * @var string|null
     */
    protected $path;

    /**
     * Application constructor.
     * @param null $path
     */
    public function __construct($path = null)
    {
        $this->loadHelpers();

        if ($path) {
            $this->setPath($path);
        }

        $this->set('app', $this);
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