<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgrammingLesson extends Model
{
    protected $table = 'programski_zadaci';

    protected $fillable = ['Naziv', 'Opis', 'ChallengeFunkcija', 'Hint', 'Rezultat', 'Tecaj_id'];
}
