<?php

namespace Pheral\Essential\Network\Route;


use Pheral\Essential\Network\Request;

abstract class RouteAbstract
{
    protected $controller;

    protected $action;

    protected $params = [];

    public function __construct(Request $request = null)
    {
        $this->parseMap($request);
    }

    abstract protected function parseMap(Request $request);
}