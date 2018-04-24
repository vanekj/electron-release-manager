<?php

// App container
$container = $app->getContainer();

// Twig
$container['view'] = function($c) {
	$view = new \Slim\Views\Twig($c['settings']['view']['template_path'], $c['settings']['view']['twig']);
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
    $view->addExtension(new Twig_Extension_Debug());
    return $view;
};

// Eloquent
$container['capsule'] = function ($c) {
	$capsule = new \Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($c['settings']['db']);
	return $capsule;
};

// Home controller
$container['ElectronReleaser\HomeController'] = function ($c) {
	return new ElectronReleaser\HomeController($c['view']);
};
