<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	// inverse of protected
	protected $guarded = [];
	
	protected $primaryKey = 'user_id';

    public function users() {
    	return $this->hasMany(User::class);
    }

    public function comments() {
    	return $this->hasMany(Comments::class);
    }
}
