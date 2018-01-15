<?php

namespace Pheral\Essential\Direct\Router;

use Pheral\Essential\Direct\Route;
use \Pheral\Essential\Network\Request;

/**
 * @todo
 */
class RouteManager
{
    /**
     * @var \Pheral\Essential\Direct\Route
     */
    protected $current;

    protected $all = [];

    public function __construct(Request $request = null)
    {
        $this->parse($request);
    }

    /**
     * @todo
     * @param \Pheral\Essential\Network\Request $request
     * @return \Pheral\Essential\Direct\Router\RouteManager
     */
    protected function parse(Request $request)
    {
        if ($request) {
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
        }

        return $this;
    }

    /**
     * @param $name
     * @param \Pheral\Essential\Direct\Route $route
     * @return \Pheral\Essential\Direct\Router\RouteManager
     */
    public function set($name, Route $route)
    {
        $this->all[$name] = $route;

        return $this;
    }

    /**
     * @param string $name
     * @return \Pheral\Essential\Direct\Route
     */
    public function get($name)
    {
        return element($this->all, $name);
    }

    /**
     * @return \Pheral\Essential\Direct\Route
     */
    public function current()
    {
        return $this->current;
    }
}
