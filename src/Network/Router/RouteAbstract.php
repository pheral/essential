<?php

namespace Pheral\Essential\Network\Router;


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
}