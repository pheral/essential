<?php

namespace Pheral\Essential\Basement\Core;


use Pheral\Essential\Client\Core as ClientCore;
use Pheral\Essential\Network\Core as NetworkCore;

class CoreHandler
{
    /**
     * @return \Pheral\Essential\Basement\Core\CoreInterface
     */
    public static function make()
    {
        $core = is_cli() ? new ClientCore() : new NetworkCore();

        $core->handle();

        return $core;
    }
}