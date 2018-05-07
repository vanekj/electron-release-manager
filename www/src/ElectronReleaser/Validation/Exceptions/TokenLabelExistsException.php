<?php

namespace ElectronReleaser\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class TokenLabelExistsException extends ValidationException
{
	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'Token with this label already exists.'
		]
	];
}
