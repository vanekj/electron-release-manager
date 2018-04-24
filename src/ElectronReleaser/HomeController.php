<?php

namespace ElectronReleaser;

use Slim\Views\Twig;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController
{
	private $view;

	public function __construct(Twig $view)
	{
		$this->view = $view;
	}

	public function showHomepage(Request $request, Response $response, array $params)
	{
		return $this->view->render($response, 'homepage.twig', $params);
	}
}
