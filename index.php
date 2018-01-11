<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \Pheral\Essential\Basement\Application();

$app->set('console', \Pheral\Essential\Console\Core::class);

$app->set('network', \Pheral\Essential\Network\Core::class);

$network = network(
    new \Pheral\Essential\Network\Request()
);

$response = $network->handle();

dd($response);