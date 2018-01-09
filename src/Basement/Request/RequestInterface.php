<?php

namespace Pheral\Essential\Basement\Request;


interface RequestInterface
{
    public function get($key, $default = null);
}