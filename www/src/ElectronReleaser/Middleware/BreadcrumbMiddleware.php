<?php

namespace ElectronReleaser\Middleware;

class BreadcrumbMiddleware extends Middleware
{
	private function storeSession(array $items)
	{
		unset($_SESSION['breadcrumbs']);
		$_SESSION['breadcrumbs'] = $items;
	}

	public function __invoke($request, $response, $next)
	{
		$items = [];
		$routeName = $request->getAttribute('route')->getName();
		$router = $this->container->router;

		$items[] = [
			'name' => 'Dashboard',
			'url' => $router->pathFor('dashboard')
		];

		if ($routeName === 'dashboard') {
			$items[] = [
				'name' => 'Manage versions',
				'url' => $router->pathFor('dashboard')
			];
		}

		$this->storeSession($items);
		$this->container->view->getEnvironment()->addGlobal('breadcrumbs', $_SESSION['breadcrumbs']);

		$response = $next($request, $response);
		return $response;
	}
}
