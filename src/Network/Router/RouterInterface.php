<?php

namespace Pheral\Essential\Network\Router;


interface RouterInterface
{
    /**
     * @return \Pheral\Essential\Network\Router\Route
     */
    public function current();

    /**
     * @param $name
     * @return \Pheral\Essential\Network\Router\Route
     */
    public function get($name);

    /**
     * @param $name
     * @param \Pheral\Essential\Network\Router\Route $route
     * @return \Pheral\Essential\Network\Router
     */
    public function set($name, Route $route);
}