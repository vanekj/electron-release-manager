<?php

namespace ElectronReleaser\Controllers;

class DashboardController extends Controller
{
	public function index($request, $response, array $params)
	{
		return $this->view->render($response, 'dashboard/index.twig', $params);
	}
}
