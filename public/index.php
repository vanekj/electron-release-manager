<?php

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

session_start();

$settings = require 'src/settings.php';
$app = new \Slim\App($settings);

require 'src/dependencies.php';
require 'src/middleware.php';
require 'src/routes.php';

$capsule = $app->getContainer()->get('capsule');
$capsule->bootEloquent();

$app->run();
