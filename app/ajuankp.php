<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ajuankp extends Model
{
 	public $table = "ajuan_kp";
 	protected $primaryKey = 'id';
    protected $fillable =[
    	'ptk_id',
    	'peserta_didik_id',
    	'companylist_id',
    	'kelompok_pd_id',
    	'status',
    	'tanggal_mulai',
    	'tanggal_selesai',
    	'tgl_ajuan',
    	'dosbing_id'
    	];

    public function peserta_didik()
	{
		return $this->belongsTo('App\pesertadidik');
	}

	public function dosbing()
	{
		return $this->belongsTo('App\pesertadidik','dosbing_id','id');
	}

	public function kelompok_pd()
	{
		return $this->belongsTo('App\kelompok');
	}

	public function aktivitas_kerja_praktek()
	{
		return $this->hasMany('App\dailylog');
	}

	public function companylist()
	{
		return $this->belongsTo('App\companylist');
	}

}
