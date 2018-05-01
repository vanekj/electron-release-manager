<?php

// App container
$container = $app->getContainer();

// Csrf protection
$container['csrf'] = function($container) {
	return new Slim\Csrf\Guard;
};

// Twig
$container['view'] = function($container) {
	$view = new Slim\Views\Twig(
		$container['settings']['view']['template_path'],
		$container['settings']['view']['twig']
	);
	$view->addExtension(new Slim\Views\TwigExtension($container->router, $container->request->getUri()));
	$view->addExtension(new ElectronReleaser\Views\DebugExtension());
	$view->addExtension(new ElectronReleaser\Views\GuardExtension($container['csrf']));
	return $view;
};

// Eloquent
$container['capsule'] = function ($container) {
	$capsule = new Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($container['settings']['db']);
	$capsule->bootEloquent();
	return $capsule;
};

// Home controller
$container['HomeController'] = function ($container) {
	return new ElectronReleaser\Controllers\HomeController($container);
};

// Auth controller
$container['AuthController'] = function ($container) {
	return new ElectronReleaser\Controllers\AuthController($container);
};

// Dashboard controller
$container['DashboardController'] = function ($container) {
	return new ElectronReleaser\Controllers\DashboardController($container);
};
