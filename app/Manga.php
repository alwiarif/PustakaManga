<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $table = "manga";

    public function chapter()
    {
        return $this->hasMany('App\Chapter', 'manga_id', 'id')->latest();
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre','manga_genre','manga_id','genre_id');
    }





}
