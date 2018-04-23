<?php

// App container
$container = $app->getContainer();

// Twig
$container['view'] = function($c) {
	$settings = $c->get('settings')['renderer'];
	$view = new \Slim\Views\Twig($settings['template_path'], [
		'cache' => $settings['cache_path']
	]);
	$basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
	$view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
	return $view;
};
