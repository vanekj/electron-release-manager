<?php

namespace ElectronReleaser\Controllers;

class ManageVersionsController extends Controller
{
	public function index($request, $response, array $params)
	{
		return $this->view->render($response, 'dashboard/manage-versions.twig', $params);
	}
}
