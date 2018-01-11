<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Network\Request\RequestAbstract;
use Pheral\Essential\Network\Request\RequestInterface;
use Pheral\Essential\Direct\Route;

class Request extends RequestAbstract implements RequestInterface
{
    /**
     * @var \Pheral\Essential\Direct\Route|null
     */
    protected $route;

    public function make()
    {
        $this->route = Route::make($this);

        return $this;
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function get($key, $default = null)
    {
        return element($this->input, $key, $default);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->input;
    }

    /**
     * @return \Pheral\Essential\Direct\Route
     */
    public function route()
    {
        return $this->route;
    }
}