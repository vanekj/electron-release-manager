<?php

namespace ElectronReleaser\Controllers;

use Slim\Views\Twig;

class Controller
{
	protected $container;

	public function __construct($container)
	{
		$this->container = $container;
	}

	public function __get($property)
	{
		$containerProperty = $this->container->{$property};

		if ($containerProperty) {
			return $containerProperty;
		}
	}
}
