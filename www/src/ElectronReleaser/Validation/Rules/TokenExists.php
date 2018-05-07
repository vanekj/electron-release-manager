<?php

namespace ElectronReleaser\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use ElectronReleaser\Models\UploadToken;

class TokenExists extends AbstractRule
{
	public function validate($input)
	{
		return UploadToken::find($input);
	}
}
