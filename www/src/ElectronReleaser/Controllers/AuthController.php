<?php

namespace ElectronReleaser\Controllers;

use ElectronReleaser\Models\User;
use Respect\Validation\Validator as v;

class AuthController extends Controller
{
	public function getLogout($request, $response)
	{
		$this->auth->logout();
		return $response->withRedirect($this->router->pathFor('homepage'));
	}

	public function getLogin($request, $response, array $params)
	{
		return $this->view->render($response, 'pages/login.twig', $params);
	}

	public function postLogin($request, $response)
	{
		$validation = $this->validator->validate($request, [
			'email' => v::email(),
			'password' => v::noWhitespace()->notEmpty()
		]);

		if ($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('auth.login'));
		}

		$auth = $this->auth->attempt(
			$request->getParam('email'),
			$request->getParam('password')
		);

		if (!$auth) {
			$this->container->flash->addMessage('auth.error', 'Please enter valid login credentials');
			return $response->withRedirect($this->router->pathFor('auth.login'));
		}

		return $response->withRedirect($this->router->pathFor('dashboard'));
	}
}
