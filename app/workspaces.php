<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workspaces extends Model
{
	protected $primaryKey = 'workspaces_id';
    protected $fillable = ['workspaces_id','id_clients','id_room','video','dates'];
    protected $table = 'workspaces';
public $timestamps = false;
}
