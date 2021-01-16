<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'tecaj';

    protected $fillable = ['Naziv', 'Opis', 'Kategorije_id', 'Kreator_id','created_at', 'updated_at'];
}
