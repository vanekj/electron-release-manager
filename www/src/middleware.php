<?php

// Remove trailing slash
$app->add(Psr7Middlewares\Middleware::TrailingSlash(false)->redirect(301));

// Validation errors
$app->add(new ElectronReleaser\Middleware\ValidationErrorsMiddleware($container));

// Persist form values
$app->add(new ElectronReleaser\Middleware\PersistInputMiddleware($container));

// Breadcrumbs
$app->add(new ElectronReleaser\Middleware\BreadcrumbMiddleware($container));

// Route name middleware
$app->add(new ElectronReleaser\Middleware\RouteMiddleware($container));
