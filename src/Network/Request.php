<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Network\Request\RequestAbstract;
use Pheral\Essential\Network\Request\RequestInterface;

class Request extends RequestAbstract implements RequestInterface
{
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
     * @return \Pheral\Essential\Front\Routing\Router
     */
    public function router()
    {
        return $this->router;
    }
}