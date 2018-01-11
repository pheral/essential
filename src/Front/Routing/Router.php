<?php

namespace Pheral\Essential\Front\Routing;


use \Pheral\Essential\Network\Request;

/**
 * @todo
 */
class Router
{
    /**
     * @var \Pheral\Essential\Front\Routing\Route
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
     * @return \Pheral\Essential\Front\Routing\Router
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
     * @param \Pheral\Essential\Front\Routing\Route $route
     * @return \Pheral\Essential\Front\Routing\Router
     */
    public function set($name, Route $route)
    {
        $this->all[$name] = $route;

        return $this;
    }

    /**
     * @param string $name
     * @return \Pheral\Essential\Front\Routing\Route
     */
    public function get($name)
    {
        return element($this->all, $name);
    }

    /**
     * @return \Pheral\Essential\Front\Routing\Route
     */
    public function current()
    {
        return $this->current;
    }
}