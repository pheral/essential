<?php

namespace Pheral\Essential\Network\Request;


interface RequestInterface
{
    /**
     * @return \Pheral\Essential\Direct\Route
     */
    public function route();

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @return array
     */
    public function all();
}