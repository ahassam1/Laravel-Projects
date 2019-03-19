<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'ISBN', 'publication_year', 'publisher', 'subscription_status', 'timestamp', 'image',
    ];

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
