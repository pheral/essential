<?php

namespace Pheral\Essential\Basement\Core;


use Pheral\Essential\Basement\HelpersTrait;

abstract class CoreAbstract
{
    use HelpersTrait;

    /**
     * @var \Pheral\Essential\Network\Request|null
     */
    protected $request;

    public function __construct()
    {
        $this->loadHelpers();
    }
}