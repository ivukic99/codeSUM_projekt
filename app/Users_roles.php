<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_roles extends Model
{
    protected $table = 'users_roles';

    protected $fillable = ['user_id', 'role_id'];
}
