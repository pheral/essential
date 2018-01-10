<?php

if (!function_exists('app')) {
    /**
     * @return \Pheral\Essential\Application
     */
    function app()
    {
        return \Pheral\Essential\Basement\Pool::get('app');
    }
}

if (!function_exists('request')) {
    /**
     * @return \Pheral\Essential\Network\Request
     */
    function request()
    {
        $request = app()->get('request');

        return $request;
    }
}