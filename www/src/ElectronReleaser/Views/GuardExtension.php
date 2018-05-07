<?php

namespace ElectronReleaser\Views;

use Slim\Csrf\Guard;

class GuardExtension extends \Twig_Extension
{
	protected $csrf;

	public function __construct(Guard $csrf)
	{
		$this->csrf = $csrf;
	}

	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('csrf_field', [$this, 'getField'])
		];
	}

	public function getField()
	{
		return "
			<input type=\"hidden\" name=\"{$this->csrf->getTokenNameKey()}\" value=\"{$this->csrf->getTokenName()}\" />
			<input type=\"hidden\" name=\"{$this->csrf->getTokenValueKey()}\" value=\"{$this->csrf->getTokenValue()}\" />
		";
	}
}
