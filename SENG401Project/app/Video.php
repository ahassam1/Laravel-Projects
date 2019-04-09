<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	// inverse of protected
	protected $guarded = [];

    public function users() {
    	return $this->hasMany(User::class);
    }

    public function comments() {
    	return $this->hasMany(Comments::class);
    }
}
