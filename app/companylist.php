<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companylist extends Model
{
	  public $table = "companylist";
	  protected $primaryKey = 'id';
    protected $fillable = [
		'nm_lemb',
		'jl',
		'pic',
		'jabatan_pic',
		'profil',
		'telpon',
		'jenis'
	];
	
	public function ajuan_kp()
	{
		return $this->hasMany('App\ajuankp');
	}
}
