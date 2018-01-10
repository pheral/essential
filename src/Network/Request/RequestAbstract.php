<?php

namespace Pheral\Essential\Network\Request;


use Pheral\Essential\Network\Router;

abstract class RequestAbstract
{
    protected $headers = [];

    protected $input = [];

    /**
     * @var \Pheral\Essential\Network\Router
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