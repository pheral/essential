<?php

namespace Pheral\Essential\Network\Request;

abstract class RequestAbstract
{
    protected $headers = [];

    protected $input = [];

    public function __construct()
    {
        $this->headers = apache_request_headers();

        $this->input = $_REQUEST;
    }

    public function header($key = null)
    {
        if ($key) {
            return element($this->headers, $key);
        }

        return $this->headers;
    }
}
