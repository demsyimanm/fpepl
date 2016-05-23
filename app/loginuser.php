<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loginuser extends Model
{
     public $table = "user";
    protected $fillable = array(
	'username',
	'id_pd',
	'password',
	'remember_token');
}
