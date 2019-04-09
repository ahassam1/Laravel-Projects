<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	// inverse of protected
	protected $guarded = [];

	public function user() {
		return $this->belongsTo(User::class);
	}

    public function playlist() {
    	return $this->belongsTo(Video::class);
    }
}
