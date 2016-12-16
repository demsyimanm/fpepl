<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesertadidik extends Model
{
    public $table = "peserta_didik";
    protected $primaryKey = 'id';
    protected $fillable = [
	'nm_pd',
	'jk',
	'nrp',
	'email',
	'no_hp',
	'tgl_lahir',
	'password'
	
	];

	public function ajuan_kp()
	{
		return $this->hasMany('App\ajuankp');
	}

	public function kelompokkp()
	{
		return $this->hasMany('App\kelompokkp');
	}
}
