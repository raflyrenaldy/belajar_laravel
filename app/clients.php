<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
        protected $fillable = ['id','nama','no_account','join_date'];
    protected $table = 'clients';
public $timestamps = false;
}
