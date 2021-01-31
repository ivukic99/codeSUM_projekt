<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishedLesson extends Model
{
    protected $table = "rijeseni_zadaci";

    protected $fillable = ['Kviz_id', 'Tecaj_id', 'User_id', 'Programski_zadaci_id', 'Pismene_lekcije_id', 'Video_lekcije_id'];
}
