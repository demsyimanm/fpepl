<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dailylog extends Model
{
    public $table = "aktivitas_kerja_praktek";
    protected $fillable = array(
	'konten',
	'tanggal',
	'id_ajuan_kp'

	

    	);}
