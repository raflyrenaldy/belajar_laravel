<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
	protected $primaryKey = 'client_id';
    protected $table = 'clients';
	public $timestamps = false;
	public $incrementing = false;
	protected $fillable = [
		
	'nama',
	'no_account',
	'join_date'
	];

}
