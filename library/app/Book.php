<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author() {
    	return $this->hasMany(Author::class);
    }

    public function comment() {
    	return $this->hasMany(Comment::class);
    }

    public function subscription() {
    	return $this->belongsTo(Subscription::class);
    }
}