<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $fillable = ['id_penduduk', 'alamat'];
    protected $primaryKey = 'id_penduduk';
    public $timestamps = false;

    public function inputAspirasi(){
    	return $this->hasMany('App\inputAspirasi', 'id_penduduk');
    }
}
