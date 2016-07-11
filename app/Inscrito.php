<?php

namespace SPAL;

use Illuminate\Database\Eloquent\Model;

class Inscrito extends Model
{
    public function programa(){
    	return $this->belongsTo('SPAL\Programa','id_programa');
    }
}
