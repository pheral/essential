<?php


if (!function_exists('pool')) {
    function pool($name, $instance = null)
    {
        if (func_num_args() > 1) {
            return \Pheral\Essential\Basement\Pool::set($name, $instance);
        } else {
            return \Pheral\Essential\Basement\Pool::get($name);
        }
    }
}

if (!function_exists('app')) {
    /**
     * @return \Pheral\Essential\Application
     */
    function app()
    {
        return pool('app');
    }
}

if (!function_exists('request')) {
    /**
     * @return \Pheral\Essential\Basement\Request\RequestInterface
     */
    function request()
    {
        return app()->getRequest();
    }
}