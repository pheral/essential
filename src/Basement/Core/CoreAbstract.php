<?php

namespace Pheral\Essential\Basement\Core;


use Pheral\Essential\Basement\HelpersTrait;

abstract class CoreAbstract
{
    use HelpersTrait;

    public function __construct()
    {
        $this->loadHelpers();
    }
}