<?php

namespace Pheral\Essential\Network\Router;


use Pheral\Essential\Network\Request;

abstract class RouterAbstract
{
    /**
     * @var \Pheral\Essential\Network\Router\Route
     */
    protected $current;

    protected $all = [];

    public function __construct(Request $request = null)
    {
        $this->parse($request);
    }

    /**
     * @param Request $request
     * @return \Pheral\Essential\Network\Router
     */
    abstract protected function parse(Request $request);
}