<?php

use Respect\Validation\Validator as v;

// App container
$container = $app->getContainer();

// Csrf protection
$container['csrf'] = function () {
	return new Slim\Csrf\Guard;
};

// Eloquent
$container['capsule'] = function ($container) {
	$capsule = new Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($container['settings']['db']);
	return $capsule;
};

// Respect
$container['validator'] = function () {
	return new ElectronReleaser\Validation\Validator;
};

// Auth
$container['auth'] = function () {
	return new ElectronReleaser\Auth\Auth;
};

// Flash
$container['flash'] = function () {
	return new Slim\Flash\Messages;
};

// Twig
$container['view'] = function ($container) {
	$view = new Slim\Views\Twig(
		$container['settings']['view']['template_path'],
		$container['settings']['view']['twig']
	);

	$view->addExtension(new Slim\Views\TwigExtension($container->router, $container->request->getUri()));
	$view->addExtension(new ElectronReleaser\Views\DebugExtension());
	$view->addExtension(new ElectronReleaser\Views\GuardExtension($container['csrf']));

	$view->getEnvironment()->addGlobal('auth', [
		'check' => $container->auth->check(),
		'user' => $container->auth->user()
	]);

	$view->getEnvironment()->addGlobal('flash', $container->flash);

	return $view;
};

// Setup custom validations
v::with('ElectronReleaser\\Validation\\Rules');

// Home controller
$container['HomeController'] = function ($container) {
	return new ElectronReleaser\Controllers\HomeController($container);
};

// Auth controller
$container['AuthController'] = function ($container) {
	return new ElectronReleaser\Controllers\AuthController($container);
};

// ManageVersions controller
$container['ManageVersionsController'] = function ($container) {
	return new ElectronReleaser\Controllers\ManageVersionsController($container);
};

// UploadTokens controller
$container['UploadTokensController'] = function ($container) {
	return new ElectronReleaser\Controllers\UploadTokensController($container);
};
