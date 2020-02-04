<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusAspirasi extends Model
{
    protected $table = 'status_aspirasi';
    protected $fillable = ['id_pelaporan', 'status', 'feedback'];
    protected $primaryKey = 'id_pelaporan';
    public $timestamps = false;

    public function inputAspirasi(){
    	return $this->belongsTo('App\InputAspirasi', 'id_pelaporan');
    }
}
