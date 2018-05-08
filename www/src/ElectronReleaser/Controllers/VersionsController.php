<?php

namespace ElectronReleaser\Controllers;

class VersionsController extends Controller
{
	public function index($request, $response, array $params)
	{
		return $this->view->render($response, 'dashboard/versions.twig', $params);
	}
}
