<?php

return [
	'settings' => [
		'displayErrorDetails' => true,
		'addContentLengthHeader' => false,
		'view' => [
			'template_path' => '../templates',
			'twig' => [
				// 'cache' => '../cache/twig',
				'cache' => false
			]
		],
		'db' => [
			'driver'    => 'mysql',
			'host'      => $_ENV['DB_HOSTNAME'],
			'database'  => $_ENV['DB_DATABASE'],
			'username'  => $_ENV['DB_USERNAME'],
			'password'  => $_ENV['DB_PASSWORD'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => ''
		]
	]
];
