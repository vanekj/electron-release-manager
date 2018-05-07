<?php

// Remove trailing slash
$app->add(Psr7Middlewares\Middleware::TrailingSlash(false)->redirect(301));

// CSRF protection
$app->add($container->guard);

// Validation errors
$app->add(new ElectronReleaser\Middleware\ValidationErrorsMiddleware($container));

// Persist form values
$app->add(new ElectronReleaser\Middleware\PersistInputMiddleware($container));

// Breadcrumbs
$app->add(new ElectronReleaser\Middleware\BreadcrumbMiddleware($container));
