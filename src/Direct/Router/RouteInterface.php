<?php

namespace Pheral\Essential\Direct\Router;

interface RouteInterface
{
    public function getResponse();

    public function getName();

    public function getController();

    public function getAction();

    public function getParams();
}