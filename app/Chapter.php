<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = "chapter";

    public function manga()
    {
        return $this->belongsTo('App\Manga', 'manga_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\Image', 'chapter_id', 'id');
    }
    public function diffMinutes(){
        \Carbon\Carbon::setLocale('id');
        $now = \Carbon\Carbon::now();
        $selisi = $this->created_at->diffForHumans();
        return $selisi;
    }

}
