<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
	protected $fillable = [
		'client_id',
	'nama',
	'no_account',
	'join_date'
	];
    protected $table = 'clients';
	public $timestamps = false;
}
