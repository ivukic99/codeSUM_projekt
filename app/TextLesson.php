<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextLesson extends Model
{
	protected $table = "pismene_lekcije";
	
    protected $fillable = ['Naziv', 'Opis', 'Poveznica', 'Tecaj_id'];
}
