<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Basement\Core\CoreAbstract;
use Pheral\Essential\Basement\Core\CoreInterface;

class Core extends CoreAbstract implements CoreInterface
{
    public function handle()
    {
        $this->request = new Request();

        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }
}