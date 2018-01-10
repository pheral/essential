<?php

namespace Pheral\Essential\Network;


use Pheral\Essential\Basement\Core\CoreAbstract;
use Pheral\Essential\Basement\Core\CoreInterface;

class Core extends CoreAbstract implements CoreInterface
{
    public function handle()
    {
        $route = request()->route();

        try {
            $response = $route->getResponse();
        } catch (\Throwable $e) {
            ddd($e->getFile().':'.$e->getLine().' "'.$e->getMessage().'"'.PHP_EOL.PHP_EOL.$e->getTraceAsString());
        }

        return $response;
    }
}