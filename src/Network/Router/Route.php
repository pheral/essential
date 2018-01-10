<?php

namespace Pheral\Essential\Network\Router;


class Route extends RouteAbstract implements RouteInterface
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getResponse()
    {
        $controller = $this->getController();

        $action = $this->getAction();

        if (!$controller || !$action) {
            throw new \Exception('Undefined route');
        }

        return call_user_func_array([$controller, $action], $this->getParams());
    }

    public function getName()
    {
        return $this->name;
    }

    public function getController()
    {
        $reflector = new \ReflectionClass("\\App\\Network\\Controllers\\".$this->controller);

        return $reflector->getName();
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