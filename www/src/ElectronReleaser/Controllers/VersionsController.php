<?php

namespace ElectronReleaser\Controllers;

use Respect\Validation\Validator as v;

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
		dump([
			$request->getParsedBody(),
			$request->getUploadedFiles()
		]);
		// $validation = $this->validator->validate($request, [
		// 	'name' => v::notEmpty(),
		// 	'number' => v::notEmpty(),
		// 	'channel' => v::notEmpty()->oneOf(
		// 		v::contains('latest'),
		// 		v::contains('beta'),
		// 		v::contains('alpha')
		// 	),
		// 	'release-notes' => v::notEmpty(),
		// 	'win-download' => v::extension('exe'),
		// 	'mac-download' => v::extension('dmg'),
		// 	'mac-update' => v::extension('zip')
		// ]);

		// if ($validation->failed()) {
		// 	return $response->withRedirect($this->router->pathFor('dashboard.versions.new'));
		// }
	}
}
