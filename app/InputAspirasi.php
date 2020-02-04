<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputAspirasi extends Model
{
    protected $table = 'input_aspirasi';
    protected $fillable = ['id_pelaporan', 'id_penduduk', 'jenis_aspirasi', 'lokasi'];
    protected $primaryKey = 'id_pelaporan';
    public $timestamps = false;

    public function penduduk(){
    	return $this->belongsTo('App\Penduduk', 'id_penduduk');
    }

    public function statusAspirasi(){
    	return $this->hasOne('App\StatusAspirasi', 'id_pelaporan');
    }
}
