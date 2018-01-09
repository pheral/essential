<?php

namespace Pheral\Essential\Client;


use Pheral\Essential\Basement\Core\CoreInterface;

class Core implements CoreInterface
{
    public function handle()
    {
        return $this;
    }

    public function getRequest() {  }
}