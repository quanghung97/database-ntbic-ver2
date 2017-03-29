<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'email','fullname','username', 'password', 'author'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
