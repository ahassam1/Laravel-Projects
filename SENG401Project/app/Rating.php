<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

	protected $guarded = [];
	public function user() {
		return $this->belongsTo(User::class);
	}

    public function video() {
    	return $this->belongsTo(Video::class);
    }
}
