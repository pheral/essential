<?php

namespace Pheral\Essential\Network\Request;


interface RequestInterface
{
    /**
     * @return \Pheral\Essential\Network\Router
     */
    public function router();

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