<?php

use Psr7Middlewares\Middleware;

$app->add(Middleware::TrailingSlash(false)->redirect(301));
