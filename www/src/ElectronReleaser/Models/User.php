<?php

namespace ElectronReleaser\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	public $timestamps = false;

	public function tokens()
	{
		return $this->belongsToMany('ElectronReleaser\Models\Token', 'created_by');
	}
}
