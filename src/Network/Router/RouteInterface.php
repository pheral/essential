<?php

namespace Pheral\Essential\Network\Router;


interface RouteInterface
{
    public function getResponse();

    public function getName();

    public function getController();

    public function getAction();

    public function getParams();
}