<?php

namespace ElectronReleaser\Middleware;

class AuthMiddleware extends Middleware
{
	protected $container;

	public function __invoke($request, $response, $next)
	{
		if (!$this->container->auth->check()) {
			$this->container->flash->addMessage('auth.error', 'Login required in order to access dashboard');
			return $response->withRedirect($this->container->router->pathFor('auth.login'));
		}

		$response = $next($request, $response);
		return $response;
	}
}
