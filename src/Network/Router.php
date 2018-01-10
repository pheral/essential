<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Network\Router\Route;
use Pheral\Essential\Network\Router\RouterInterface;
use Pheral\Essential\Network\Router\RouterAbstract;

/**
 * @todo
 */
class Router extends RouterAbstract implements RouterInterface
{
    /**
     * @todo
     * @param \Pheral\Essential\Network\Request $request
     * @return \Pheral\Essential\Network\Router
     */
    protected function parse(Request $request)
    {
        $map = [
            'home.index' => [
                'controller' => 'HomeController',
                'action' => 'index',
                'params' => []
            ]
        ];

        $name = 'home.index';

        $this->current = new Route($name, element($map, $name));

        $this->set($name, $this->current);

        return $this;
    }

    /**
     * @param $name
     * @param \Pheral\Essential\Network\Router\Route $route
     * @return \Pheral\Essential\Network\Router
     */
    public function set($name, Route $route)
    {
        $this->all[$name] = $route;

        return $this;
    }

    /**
     * @param string $name
     * @return \Pheral\Essential\Network\Router\Route
     */
    public function get($name)
    {
        return element($this->all, $name);
    }

    /**
     * @return \Pheral\Essential\Network\Router\Route
     */
    public function current()
    {
        return $this->current;
    }
}