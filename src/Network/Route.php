<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Network\Route\RouteInterface;
use Pheral\Essential\Network\Route\RouteAbstract;

/**
 * @todo
 */
class Route extends RouteAbstract implements RouteInterface
{
    /**
     * @todo
     * @param \Pheral\Essential\Network\Request $request
     */
    protected function parseMap(Request $request)
    {
        // TODO
        return ;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getResponse()
    {
        $controller = $this->getController();
        $action = $this->getAction();
        $params = $this->getParams();

        if (!$controller || !$action) {
            throw new \Exception('Undefined route');
        }

        return call_user_func_array([$controller, $action], $params);
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