<?php

namespace ElectronReleaser\Middleware;

class CsrfViewMiddleware extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		$csrf = $this->container->csrf;

		$this->container->view->getEnvironment()->addGlobal('csrf', [
			'field' => "
				<input type=\"hidden\" name=\"{$csrf->getTokenNameKey()}\" value=\"{$csrf->getTokenName()}\" />
				<input type=\"hidden\" name=\"{$csrf->getTokenValueKey()}\" value=\"{$csrf->getTokenValue()}\" />
			"
		]);

		$response = $next($request, $response);
		return $response;
	}
}
