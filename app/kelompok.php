<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelompok extends Model
{
     public $table = "kelompok_pd";
    protected $fillable = array(
    	'id_kel_pd',
    	'nm_kel');
}
