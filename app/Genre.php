<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function mangas()
    {
        return $this->belongsToMany('App\Manga');
    }
}
