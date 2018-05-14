<?php

namespace ElectronReleaser\Controllers;

class VersionsController extends Controller
{
	public function index($request, $response, array $params)
	{
		return $this->view->render($response, 'dashboard/versions.twig', $params);
	}

	public function getNew($request, $response, array $params)
	{
		return $this->view->render($response, 'dashboard/versions.new.twig', $params);
	}

	public function postNew($request, $response)
	{
		// @TODO
	}
}
