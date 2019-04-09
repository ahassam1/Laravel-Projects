<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
	// inverse of protected
	protected $guarded = [];

	public function videos() {
		return $this->hasMany(video::class);
	}
}
