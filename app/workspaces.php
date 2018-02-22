<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workspaces extends Model
{
    protected $fillable = ['id_client','id_room','dates','video'];
    protected $table = 'workspaces';
public $timestamps = false;
}
