<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \Pheral\Essential\Basement\Application(__DIR__);

$response = $app->handle(
    new \Pheral\Essential\Network\Request()
);

dd($response);