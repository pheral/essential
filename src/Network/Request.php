<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Basement\Request\RequestInterface;

class Request implements RequestInterface
{
    protected $headers = [];

    public function __construct()
    {
        $this->headers = apache_request_headers();
    }

    public function get($key, $default = null)
    {
        return element($this->headers, $key, $default);
    }
}