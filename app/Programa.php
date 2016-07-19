<?php

namespace SPAL;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'programa';


    public function des(){
    	return $this->belongsTo('SPAL\Des','plant');
    }

    public function inscritos(){
    	return $this->hasMany('SPAL\Inscrito','id_programa','id');
    }

    public function encuesta(){
    	return $this->hasMany('SPAL\Encuesta','id_programa','id');
    }    
}

