<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelompok extends Model
{
     public $table = "kelompok_pd";
     protected $primaryKey = 'id';
    protected $fillable = [
    	'nm_kel'];

    public function ajuan_kp()
	{
		return $this->hasMany('App\ajuankp');
	}

	public function anggota_kel_pd()
	{
		return $this->hasMany('App\kelompokkp');
	}

}
