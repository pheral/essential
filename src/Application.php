<?php

namespace Pheral\Essential;


use Pheral\Essential\Basement\Core\CoreHandler;
use Pheral\Essential\Basement\HelpersTrait;
use Pheral\Essential\Basement\Pool;

class Application
{
    use HelpersTrait;

    protected $path;

    /**
     * @var \Pheral\Essential\Basement\Core\CoreInterface
     */
    protected $core;

    public function __construct($path)
    {
        $this->loadHelpers();

        $this->setPath($path);
    }

    public function setPath($path)
    {
        $this->path = realpath(rtrim($path,'\/'));
    }

    public function path($path = '')
    {
        return $this->path . ($path ? '/' . $path : '');
    }

    public function handle()
    {
        Pool::set('app', $this);

        $this->core = CoreHandler::make();
    }

    public function getRequest()
    {
        return $this->core->getRequest();
    }

    /**
     * @todo replace this temporary method
     * @param $path
     */
    public function force($path)
    {
        include $this->path($path);
    }
}