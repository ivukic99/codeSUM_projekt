<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoLesson extends Model
{
    protected $table = "video_lekcije";
	
    protected $fillable = ['Naziv', 'Opis', 'Poveznica', 'Tecaj_id'];
}
