<?php

namespace App;

use App\Traits\HasPermission;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'image', 'telefon', 'obrazovanje','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function permissions(){
        $this->belongsToMany(Permission::class, 'users_permissions');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function hasRole(...$roles){
        return $this->roles()->whereIn('slug', $roles)->count();
    }
    

}
