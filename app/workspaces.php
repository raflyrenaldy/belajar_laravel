<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workspaces extends Model
{
    protected $fillable = ['id_clients','id_room','video'];
    protected $table = 'workspaces';
public $timestamps = false;
}
