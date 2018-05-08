<?php

namespace ElectronReleaser\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use ElectronReleaser\Models\Token;

class TokenLabelExists extends AbstractRule
{
	public function validate($input)
	{
		return !Token::where('label', $input)->count();
	}
}
