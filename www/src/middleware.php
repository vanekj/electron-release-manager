<?php

// Remove trailing slash
$app->add(Psr7Middlewares\Middleware::TrailingSlash(false)->redirect(301));

// CSRF protection
$app->add($container->csrf);
