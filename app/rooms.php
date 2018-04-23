<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
	protected $primaryKey = 'room_id';
   
    protected $table = 'rooms';
    protected $fillable = [		
	'room' 
	
	];
	public $timestamps = false;
	public $incrementing = false;
}
