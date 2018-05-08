<?php

namespace ElectronReleaser\Middleware;

class BreadcrumbMiddleware extends Middleware
{
	public function __invoke($request, $response, $next)
	{
		$items = [];
		$routeName = $request->getAttribute('route')->getName();
		$router = $this->container->router;

		$items[] = [
			'name' => 'Dashboard',
			'url' => '/dashboard'
		];

		if ($routeName === 'dashboard.versions') {
			$items[] = [
				'name' => 'Versions'
			];
		}

		if ($routeName === 'dashboard.tokens') {
			$items[] = [
				'name' => 'Tokens'
			];
		}

		unset($_SESSION['breadcrumbs']);
		$_SESSION['breadcrumbs'] = $items;

		$this->container->view->getEnvironment()->addGlobal('breadcrumbs', $_SESSION['breadcrumbs']);

		$response = $next($request, $response);
		return $response;
	}
}
