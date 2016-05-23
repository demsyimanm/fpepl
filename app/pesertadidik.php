<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesertadidik extends Model
{
    public $table = "peserta_didik";
    protected $fillable = array(
	'id_pd',
	'nm_pd',
	'tgl_lahir',
	'nim',
	'email',
	'no_hp');
}
