<?php

namespace ElectronReleaser\Controllers;

use ElectronReleaser\Models\Token;
use Respect\Validation\Validator as v;

class TokensController extends Controller
{
	private function createToken($request, array $parameters)
	{
		$validation = $this->validator->validate($request, [
			'label' => v::notEmpty()->max(32)->tokenLabelExists()
		]);

		if (!$validation->failed()) {
			Token::create([
				'label' => $parameters['label'],
				'value' => sha1(uniqid()),
				'created_by' => $this->auth->user()->id
			]);
		}
	}

	private function deleteToken($request, array $parameters)
	{
		$validation = $this->validator->validate($request, [
			'token_id' => v::notEmpty()->numeric()->tokenExists()
		]);

		if (!$validation->failed()) {
			$foundToken = Token::find($parameters['token_id']);

			if ($foundToken) {
				$foundToken->delete();
			}
		}
	}

	public function get($request, $response)
	{
		return $this->view->render($response, 'dashboard/tokens.twig', [
			'tokens' => Token::with('createdBy')->orderBy('created_at', 'DESC')->get()
		]);
	}

	public function post($request, $response)
	{
		$parameters = $request->getParams();

		if ($parameters['action'] === 'create') {
			$this->createToken($request, $parameters);
		} else if ($parameters['action'] === 'delete') {
			$this->deleteToken($request, $parameters);
		}

		return $response->withRedirect($this->router->pathFor('dashboard.tokens'));
	}
}
