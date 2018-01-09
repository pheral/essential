<?php

namespace Pheral\Essential\Basement\Core;


interface CoreInterface
{
    public function handle();

    /**
     * @return \Pheral\Essential\Basement\Request\RequestInterface
     */
    public function getRequest();
}