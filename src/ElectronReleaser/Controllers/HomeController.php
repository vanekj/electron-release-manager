<?php

namespace ElectronReleaser\Controllers;

class HomeController extends Controller
{
	public function index($request, $response, array $params)
	{
		return $this->view->render($response, 'pages/homepage.twig', $params);
	}
}
