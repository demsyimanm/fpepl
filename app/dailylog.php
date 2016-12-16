<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dailylog extends Model
{
    public $table = "aktivitas_kerja_praktek";
    protected $primaryKey = 'id';
    protected $fillable =[
	'konten',
	'ajuan_kp_id',
	'tanggal'

	];

    public function ajuan_kp()
	{
		return $this->belongsTo('App\ajuankp');
	}

}
