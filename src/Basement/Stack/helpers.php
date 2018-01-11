<?php

if (!function_exists('app')) {
    /**
     * @return \Pheral\Essential\Basement\Application
     */
    function app()
    {
        return \Pheral\Essential\Basement\Stack\Pool::get('app');
    }
}

if (!function_exists('console')) {
    /**
     * @return \Pheral\Essential\Console\Core
     */
    function console()
    {
        return app()->get('console');
    }
}

if (!function_exists('network')) {
    /**
     * @param \Pheral\Essential\Network\Request $request
     * @return \Pheral\Essential\Network\Core
     */
    function network(\Pheral\Essential\Network\Request $request)
    {
        $app = app();

        $app->set('request', $request);

        return $app->get('network');
    }
}

if (!function_exists('request')) {
    /**
     * @return \Pheral\Essential\Network\Request
     */
    function request()
    {
        return app()->get('request');
    }
}