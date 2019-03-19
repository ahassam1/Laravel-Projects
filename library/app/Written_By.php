<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Written_By extends Model
{
 	public function book()
 	{
 		return $this->hasMany(Book::class);
 	}
 	
 	public function author()
 	{
 		return $this->hasMany(Author::class);
 	}
}
