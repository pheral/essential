<?php

namespace Pheral\Essential\Basement\Core;


use Pheral\Essential\Basement\HelpersTrait;
use Pheral\Essential\Client\Core as ClientCore;
use Pheral\Essential\Network\Core as NetworkCore;

class CoreHandler
{
    use HelpersTrait;

    /**
     * @return \Pheral\Essential\Basement\Core\CoreInterface
     */
    public static function make()
    {
        static::staticLoadHelpers();

        $core = is_cli() ? new ClientCore() : new NetworkCore();

        return $core->handle();
    }
}