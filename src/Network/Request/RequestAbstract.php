<?php

namespace Pheral\Essential\Network\Request;


use Pheral\Essential\Front\Routing\Router;

abstract class RequestAbstract
{
    protected $headers = [];

    protected $input = [];

    /**
     * @var \Pheral\Essential\Front\Routing\Router
     */
    protected $router;

    public function __construct()
    {
        $this->headers = apache_request_headers();

        $this->input = $_REQUEST;

        $this->router = new Router($this);
    }

    public function header($key = null)
    {
        if ($key) {
            return element($this->headers, $key);
        }

        return $this->headers;
    }
}