<?php

namespace Pheral\Essential\Basement\Core;


interface CoreInterface
{
    public function handle();

    public function getRequest();
}