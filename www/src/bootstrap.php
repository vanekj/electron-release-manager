<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();

$settings = require __DIR__ . '/settings.php';
$app = new Slim\App($settings);

require __DIR__ . '/dependencies.php';
require __DIR__ . '/middleware.php';
require __DIR__ . '/routes.php';

$capsule = $container['capsule'];
$capsule->setAsGlobal();
$capsule->bootEloquent();
