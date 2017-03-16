<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatabasePermission extends Model
{
    protected $table = 'database_permission';
    protected $fillable = ['user_id','action','table'];
    public $timestamps = true;
}
