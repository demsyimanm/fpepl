<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelompokkp extends Model
{
    public $table = "anggota_kel_pd";
    protected $primaryKey = 'id';
    protected $fillable = [
	'peserta_didik_id',
	'peserta_didik_2_id'
	];

	public function peserta_didik()
	{
		return $this->belongsTo('App\pesertadidik');
	}

	public function peserta_didik2()
	{
		return $this->belongsTo('App\pesertadidik','peserta_didik_2_id','id');
	}

	public function kelompok_pd()
	{
		return $this->belongsTo('App\kelompok');
	}
}
