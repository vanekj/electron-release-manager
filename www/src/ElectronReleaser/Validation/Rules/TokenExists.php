<?php

namespace ElectronReleaser\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use ElectronReleaser\Models\Token;

class TokenExists extends AbstractRule
{
	public function validate($input)
	{
		return Token::find($input);
	}
}
