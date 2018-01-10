<?php

namespace Pheral\Essential\Network\Request;


use Pheral\Essential\Network\Route;

abstract class RequestAbstract
{
    protected $headers = [];

    protected $input = [];

    /**
     * @var \Pheral\Essential\Network\Route
     */
    protected $route;

    public function __construct()
    {
        $this->headers = apache_request_headers();

        $this->input = $_REQUEST;

        $this->route = new Route($this);
    }

    public function header($key = null)
    {
        if ($key) {
            return element($this->headers, $key);
        }

        return $this->headers;
    }
}