<?php

namespace Pheral\Essential\Console;


use Pheral\Essential\Basement\Core\CoreAbstract;
use Pheral\Essential\Basement\Core\CoreInterface;

class Core extends CoreAbstract implements CoreInterface
{
    public function handle()
    {
        return $this;
    }
}