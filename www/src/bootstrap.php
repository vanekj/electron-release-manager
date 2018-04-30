<?php

require '../vendor/autoload.php';

session_start();

$settings = require 'settings.php';
$app = new Slim\App($settings);

require 'dependencies.php';
require 'middleware.php';
require 'routes.php';
