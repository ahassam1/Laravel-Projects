<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    function ratings()
    {
      return $this->hasMany(Rating::class);
    }

}
