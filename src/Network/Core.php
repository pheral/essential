<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Axis\Core\CoreInterface;

class Core implements CoreInterface
{
    /**
     * @var \Pheral\Essential\Network\Request
     */
    protected $request;

    public function handle()
    {
        $this->request = new Request();
        // load router
        // load controller
    }

    public function getRequest()
    {
        return $this->request;
    }
}