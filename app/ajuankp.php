<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ajuankp extends Model
{
     public $table = "ajuan_kp";
    protected $fillable = array(
    	'id_ajuan_kp',
    	'id_ptk',
    	'id_pd',
    	'id_dudi',
    	'id_kel_pd',
    	'tgl_ajuan',
    	'status');


}
