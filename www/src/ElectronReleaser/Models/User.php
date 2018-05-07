<?php

namespace ElectronReleaser\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	public $timestamps = false;

	public function uploadTokens()
	{
		return $this->belongsToMany('ElectronReleaser\Models\UploadToken', 'created_by');
	}
}
