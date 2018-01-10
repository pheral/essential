<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Network\Request\RequestAbstract;
use Pheral\Essential\Network\Request\RequestInterface;

class Request extends RequestAbstract implements RequestInterface
{
    public function get($key, $default = null)
    {
        return element($this->input, $key, $default);
    }

    public function all()
    {
        return $this->input;
    }

    /**
     * @return \Pheral\Essential\Network\Route
     */
    public function route()
    {
        return $this->route;
    }
}