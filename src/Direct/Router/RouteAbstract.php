<?php

namespace Pheral\Essential\Direct\Router;


use Pheral\Essential\Network\Request;

abstract class RouteAbstract
{
    protected $name;

    protected $controller;

    protected $action;

    protected $params = [];

    public function __construct($name, $settings = [])
    {
        $this->name = $name;

        $this->controller = element($settings, 'controller');

        $this->action = element($settings, 'action');

        $this->params = element($settings, 'params');
    }

    public static function make(Request $request = null)
    {
        if ($route = $request->route()) {
            return $route;
        }

        $router = new RouteManager($request);

        app()->set('router', $router);

        return $router->current();
    }
}