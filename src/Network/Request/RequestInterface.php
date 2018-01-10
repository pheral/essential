<?php

namespace Pheral\Essential\Network\Request;


interface RequestInterface
{
    /**
     * @return \Pheral\Essential\Network\Route
     */
    public function route();

    public function get($key, $default = null);

    public function all();
}