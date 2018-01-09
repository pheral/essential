<?php

namespace Pheral\Essential\Axis\Request;


interface RequestInterface
{
    public function get($key, $default = null);
}