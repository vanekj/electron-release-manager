<?php

$app->group('', function() {
	$this->get('/', 'HomeController:index')->setName('homepage');
});
