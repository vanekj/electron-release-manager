<?php

namespace ElectronReleaser\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
	protected $fillable = [
		'label',
		'value',
		'created_by'
	];

	public $timestamps = false;

	public function createdBy()
	{
		return $this->hasOne('ElectronReleaser\Models\User', 'id', 'created_by');
	}
}
