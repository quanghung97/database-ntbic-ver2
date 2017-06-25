<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveAccount extends Model
{
    protected $table = 'active_accounts';
    protected $fillable = ['id','user_id','token','expire'];
}
