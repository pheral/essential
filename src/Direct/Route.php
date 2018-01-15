<?php

namespace Pheral\Essential\Direct;

use Pheral\Essential\Direct\Router\RouteAbstract;
use Pheral\Essential\Direct\Router\RouteInterface;

class Route extends RouteAbstract implements RouteInterface
{
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
        return $reflectionMethod->invokeArgs($controller, $this->getParams());
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
