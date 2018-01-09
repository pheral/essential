<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Basement\Core\CoreInterface;

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
        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }
}