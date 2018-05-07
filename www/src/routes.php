<?php

use ElectronReleaser\Middleware\AuthMiddleware;

$app->redirect('/', '/dashboard');
$app->redirect('/dashboard', '/dashboard/manage-versions');

$app->group('/dashboard', function() {
	$this->get('/manage-versions', 'ManageVersionsController:index')->setName('dashboard.manage-versions');

	$this->get('/upload-tokens', 'UploadTokensController:get')->setName('dashboard.upload-tokens');
	$this->post('/upload-tokens', 'UploadTokensController:post');
})->add(new AuthMiddleware($container));

$app->group('/auth', function() {
	$this->get('/login', 'AuthController:getLogin')->setName('auth.login');
	$this->post('/login', 'AuthController:postLogin');

	$this->get('/logout', 'AuthController:getLogout')->setName('auth.logout');
})->add($container->csrf);
