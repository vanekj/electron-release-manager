<?php

namespace ElectronReleaser\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use ElectronReleaser\Models\UploadToken;

class TokenLabelExists extends AbstractRule
{
	public function validate($input)
	{
		return !UploadToken::where('label', $input)->count();
	}
}
