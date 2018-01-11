<?php

namespace Pheral\Essential\Front\Routing;


class Route implements RouteInterface
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

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getResponse()
    {
        $controllerShortName = $this->getController();

        $action = $this->getAction();

        if (!$controllerShortName || !$action) {
            throw new \Exception('Undefined route');
        }

        $reflectionClass = new \ReflectionClass("\\App\\Network\\Controllers\\".$controllerShortName);
        $controllerClass = $reflectionClass->getName();
        $controller = new $controllerClass();

        $reflectionMethod = new \ReflectionMethod($controller, $action);
        return $reflectionMethod->invokeArgs($controller,$this->getParams());
    }

    public function getName()
    {
        return $this->name;
    }

    public function getController()
    {

        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }
}