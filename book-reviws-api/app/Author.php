<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function writtenby() {
        return $this->hasMany(WrittenBy::class);
    }
}
