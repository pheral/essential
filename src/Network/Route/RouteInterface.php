<?php

namespace Pheral\Essential\Network\Route;


interface RouteInterface
{
    public function getResponse();

    public function getController();
}