<?php

return [
	'settings' => [
		'displayErrorDetails' => true, // Use "false" for production
		'addContentLengthHeader' => false,
		'renderer' => [
			'template_path' => __DIR__ . '/../templates/',
			'cache_path' => __DIR__ . '/../cache/'
		]
	]
];
