<?php

namespace ElectronReleaser\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class TokenExistsException extends ValidationException
{
	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'Token does not exists.'
		]
	];
}
