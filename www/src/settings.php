<?php

return [
	'settings' => [
		'displayErrorDetails' => true,
		'addContentLengthHeader' => false,
		'view' => [
			'template_path' => '../templates',
			'twig' => [
                'cache' => '../cache/twig',
                'debug' => true
            ]
		],
		'db' => [
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'electron_releaser',
			'username'  => 'electron_releaser',
			'password'  => 'electron_releaser',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => ''
		]
	]
];
