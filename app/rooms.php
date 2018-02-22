<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
        protected $fillable = ['id','room'];
    protected $table = 'rooms';
public $timestamps = false;
}
