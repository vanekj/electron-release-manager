<?php

$app->group('', function() {
	$this->get('/', 'ElectronReleaser\HomeController:showHomepage')->setName('homepage');
});
