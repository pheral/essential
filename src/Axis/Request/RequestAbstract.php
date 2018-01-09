<?php

namespace Pheral\Essential\Axis\Request;


abstract class RequestAbstract implements RequestInterface
{
    protected $headers = [];

    public function __construct()
    {
        $this->headers = apache_request_headers();
    }

    public function get($key, $default = null)
    {
        return arr_get($this->headers, $key, $default);
    }
}