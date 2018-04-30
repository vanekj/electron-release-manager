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
    $view->addExtension(new Twig_Extension_Debug());
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
