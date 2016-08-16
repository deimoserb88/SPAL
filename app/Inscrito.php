<?php

namespace SPAL;

use Illuminate\Database\Eloquent\Model;

class Inscrito extends Model
{

    protected $fillable = [
        'id_programa',
        'insc',
        'anio',
    ];


    public function programa(){
    	return $this->belongsTo('SPAL\Programa','id_programa');
    }
}
