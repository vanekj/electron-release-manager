<?php

namespace ElectronReleaser\Views;

use Slim\Csrf\Guard;

class GuardExtension extends \Twig_Extension
{
	protected $guard;

	public function __construct(Guard $guard)
	{
		$this->guard = $guard;
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
			<input type=\"hidden\" name=\"{$this->guard->getTokenNameKey()}\" value=\"{$this->guard->getTokenName()}\" />
			<input type=\"hidden\" name=\"{$this->guard->getTokenValueKey()}\" value=\"{$this->guard->getTokenValue()}\" />
		";
	}
}
