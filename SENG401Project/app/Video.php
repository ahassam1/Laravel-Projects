<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	// inverse of protected
	protected $guarded = [];

    public function playlists() {
    	return $this->hasMany(Playlist::class);
    }
}
