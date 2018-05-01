<?php

use ElectronReleaser\Middleware\AuthMiddleware;

$app->get('/', 'HomeController:index')->setName('homepage');

$app->get('/auth/login', 'AuthController:getLogin')->setName('auth.login');
$app->post('/auth/login', 'AuthController:postLogin');

$app->get('/auth/logout', 'AuthController:getLogout')->setName('auth.logout');

$app->group('/dashboard', function() {
	$this->get('', 'DashboardController:index')->setName('dashboard');
})->add(new AuthMiddleware($container));
