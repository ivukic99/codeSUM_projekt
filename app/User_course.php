<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_course extends Model
{
    protected $table = 'user_tecaj';

    protected $fillable = ['id', 'Tecaj_id', 'User_id'];
}
