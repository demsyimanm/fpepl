<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelompokkp extends Model
{
    public $table = "anggota_kel_pd";
    protected $fillable = array(
	'id_kel_pd',
	'id_pd1',
	'id_pd2',
	'created_at'
	);
}
