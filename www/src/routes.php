<?php

use ElectronReleaser\Middleware\AuthMiddleware;

$app->redirect('/', '/dashboard');

$app->group('/dashboard', function() {
	$this->get('', 'DashboardController:index')->setName('dashboard');
})->add(new AuthMiddleware($container));

$app->group('/auth', function() {
	$this->get('/login', 'AuthController:getLogin')->setName('auth.login');
	$this->post('/login', 'AuthController:postLogin');

	$this->get('/logout', 'AuthController:getLogout')->setName('auth.logout');
});
