<?php

namespace Pheral\Essential\Axis\Core;


use Pheral\Essential\Client\Core as CoreClient;
use Pheral\Essential\Network\Core as CoreNetwork;

class CoreHandler
{
    /**
     * @var \Pheral\Essential\Axis\Core\CoreInterface
     */
    protected $core;

    public function init()
    {
        $this->core = is_cli() ? new CoreClient() : new CoreNetwork();

        $this->core->handle();

        return $this;
    }

    /**
     * @return \Pheral\Essential\Axis\Core\CoreInterface
     */
    public function get()
    {
        return $this->core;
    }
}