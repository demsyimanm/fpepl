<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companylist extends Model
{
  public $table = "dudi";
    protected $fillable = array(
	'id_dudi',
	'nm_lemb',
	'jl',
	'jabatan_pic',
	'profil',
	'telpon',
	'jenis','pic');
	
}
