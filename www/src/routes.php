<?php

use ElectronReleaser\Middleware\AuthMiddleware;

$app->redirect('/', '/dashboard');
$app->redirect('/dashboard', '/dashboard/versions');

$app->group('/dashboard', function() {
	$this->get('/versions', 'VersionsController:index')->setName('dashboard.versions');

	$this->get('/versions/new', 'VersionsController:getNew')->setName('dashboard.versions.new');
	$this->post('/versions/new', 'VersionsController:postNew');

	$this->get('/tokens', 'TokensController:get')->setName('dashboard.tokens');
	$this->post('/tokens', 'TokensController:post');
})->add(new AuthMiddleware($container));

$app->group('/auth', function() {
	$this->get('/login', 'AuthController:getLogin')->setName('auth.login');
	$this->post('/login', 'AuthController:postLogin');

	$this->get('/logout', 'AuthController:getLogout')->setName('auth.logout');
})->add($container->csrf);
